<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerrenoRequest;
use App\Models\Terreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TerrenoVendedorController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $terrenos = Terreno::where('idUsuario', $user->idUsuario)->get();
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

            $datos = $request->validated();

            $datos['idUsuario'] = $user->idUsuario;
            $datos['estado'] = 'DISPONIBLE';
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
            $terreno = Terreno::with('usuario')->findOrFail($id);
            return view('vendedor.mostrar-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terreno no encontrado');
        }
    }

    public function edit(string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->id())->findOrFail($id);
            return view('vendedor.editar-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terreno no encontrado');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $terreno = Terreno::where('idUsuario', auth()->id())->findOrFail($id);

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
            $terreno = Terreno::where('idUsuario', auth()->id())->findOrFail($id);

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
}