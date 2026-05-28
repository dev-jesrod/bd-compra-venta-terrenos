<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerrenoRequest;
use App\Models\Terreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Documento;

class TerrenoVendedorController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $query = Terreno::where('idUsuario', $user->idUsuario);
            
            if ($request->filled('query')) {
                $q = $request->input('query');
                $query->where('nombre', 'LIKE', "%{$q}%");
            }
            
            $terrenos = $query->get();
            return view('vendedor.mis-propiedades', compact('terrenos'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar propiedades: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('vendedor.publicar-terreno');
    }

    public function store(StoreTerrenoRequest $request)
    {
        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;

            if (!$vendedor) {
                return back()->with('error', 'Debe registrar sus datos de vendedor antes de publicar un terreno.');
            }

            // Validar nivel de confianza del 80%
            $documentos = Documento::where('idVendedor', $vendedor->idVendedor)->get();
            $aprobadosCount = $documentos->where('estado', 'APROBADO')->count();
            $trustLevel = min($aprobadosCount * 20, 100);

            if ($trustLevel < 80) {
                return back()
                    ->with('error', "No puede publicar terrenos. Requiere al menos el 80% de sus documentos autorizados (Actualmente tiene {$trustLevel}%).")
                    ->withInput();
            }

            $datos = $request->validated();

            $datos['idUsuario'] = $user->idUsuario;
            $datos['estado'] = 'DISPONIBLE';
            $datos['estado_verificacion'] = 'PENDIENTE';
            $datos['superficie'] = $datos['largo'] * $datos['ancho'];
            $datos['fechaCompra'] = now()->toDateString();

            $imagenesPaths = [];

            if ($request->hasFile('imagenes')) {
                $imagenes = $request->file('imagenes');
                $idUsuario = $user->idUsuario;

                foreach ($imagenes as $imagen) {
                    $extension = $imagen->getClientOriginalExtension();
                    $timestamp = now()->timestamp;
                    $random = Str::random(4);
                    $filename = "{$timestamp}_{$random}.{$extension}";

                    $path = $imagen->storeAs("terrenos/{$idUsuario}", $filename, 'public');

                    $imagenesPaths[] = "terrenos/{$idUsuario}/" . $filename;
                }
            }

            if (!empty($imagenesPaths)) {
                $datos['imagenes'] = $imagenesPaths;
            }

            $terreno = Terreno::create($datos);

            return redirect()
                ->route('vendedor.terrenos.index')
                ->with('success', 'Terreno publicado correctamente');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error al publicar terreno: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(string $id)
    {
        try {
            // Filtrar por idUsuario para que solo el propietario pueda ver/editar
            $terreno = Terreno::where('idUsuario', auth()->user()->idUsuario)->findOrFail($id);
            return view('vendedor.editar-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terreno no encontrado o sin autorización');
        }
    }

    public function edit(string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->user()->idUsuario)->findOrFail($id);
            return view('vendedor.editar-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terreno no encontrado o sin autorización');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;

            if (!$vendedor) {
                return back()->with('error', 'Debe registrar sus datos de vendedor.');
            }

            // Validar nivel de confianza del 80%
            $documentos = Documento::where('idVendedor', $vendedor->idVendedor)->get();
            $aprobadosCount = $documentos->where('estado', 'APROBADO')->count();
            $trustLevel = min($aprobadosCount * 20, 100);

            if ($trustLevel < 80) {
                return back()->with('error', "No puede actualizar terrenos. Requiere al menos el 80% de sus documentos autorizados (Actualmente tiene {$trustLevel}%).");
            }

            $terreno = Terreno::where('idUsuario', $user->idUsuario)->findOrFail($id);

            $validated = $request->validate([
                'nombre' => 'required|string|max:100',
                'ubicacion' => 'required|string|max:255',
                'descripcion' => 'required|string|max:1000',
                'precio' => 'required|numeric|min:1',
                'largo' => 'required|numeric|min:0.01',
                'ancho' => 'required|numeric|min:0.01',
                'superficie' => 'nullable|numeric',
                'zonificacion' => 'nullable|string|max:50',
                'pendiente' => 'nullable|string|max:50',
            ]);

            $validated['superficie'] = $validated['largo'] * $validated['ancho'];

            $terreno->update($validated);

            return redirect()->route('vendedor.terrenos.index')->with('success', 'Terreno actualizado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->user()->idUsuario)->findOrFail($id);

            if ($terreno->imagenes) {
                foreach ($terreno->imagenes as $imagen) {
                    Storage::disk('public')->delete($imagen);
                }
            }

            $terreno->delete();

            return redirect()->route('vendedor.terrenos.index')->with('success', 'Terreno eliminado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    public function validarForm(string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->user()->idUsuario)->findOrFail($id);
            return view('vendedor.validar-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terreno no encontrado o sin autorización');
        }
    }

    public function validar(Request $request, string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->user()->idUsuario)->findOrFail($id);

            $validated = $request->validate([
                'estado_verificacion' => 'required|in:APROBADO,RECHAZADO',
                'motivo_rechazo' => 'required_if:estado_verificacion,RECHAZADO|nullable|string|max:500',
            ]);

            $terreno->estado_verificacion = $validated['estado_verificacion'];
            $terreno->motivo_rechazo = $validated['estado_verificacion'] === 'RECHAZADO'
                ? $validated['motivo_rechazo']
                : null;
            $terreno->save();

            $mensaje = $validated['estado_verificacion'] === 'APROBADO'
                ? 'Terreno verificado correctamente. Ahora es visible en el catálogo.'
                : 'Terreno rechazado. Revise el motivo y corrija los datos.';

            return redirect()->route('vendedor.terrenos.index')->with('success', $mensaje);
        } catch (\Exception $e) {
            return back()->with('error', 'Error al validar terreno: ' . $e->getMessage());
        }
    }
}