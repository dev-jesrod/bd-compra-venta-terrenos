<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentoController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;
            
            if (!$vendedor) {
                return back()->with('error', 'Perfil de vendedor no encontrado.');
            }

            // Get all documents for this vendor
            $documentos = Documento::where('idVendedor', $vendedor->idVendedor)->get();
            
            // Calculate trust level (20% for each approved document)
            $aprobadosCount = $documentos->where('estado', 'APROBADO')->count();
            $trustLevel = min($aprobadosCount * 20, 100);

            // Separate by type for easy display in Blade
            $ineDoc = $documentos->where('nombre', 'INE')->first();
            $curpDoc = $documentos->where('nombre', 'CURP')->first();
            $rfcDoc = $documentos->where('nombre', 'RFC')->first();
            $comprobanteDoc = $documentos->where('nombre', 'Comprobante Domicilio')->first();
            $satDoc = $documentos->where('nombre', 'Opinión SAT')->first();

            return view('vendedor.documentos', compact(
                'vendedor',
                'documentos', 
                'trustLevel', 
                'ineDoc', 
                'curpDoc', 
                'rfcDoc', 
                'comprobanteDoc', 
                'satDoc'
            ));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar los documentos: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|in:INE,CURP,RFC,Comprobante Domicilio,Opinión SAT',
            'archivo' => 'required|file|mimes:pdf,jpeg,jpg,png|max:2048',
        ], [
            'nombre.required' => 'El tipo de documento es obligatorio.',
            'nombre.in' => 'El tipo de documento no es válido.',
            'archivo.required' => 'Debes cargar un archivo.',
            'archivo.mimes' => 'El archivo debe ser de tipo: pdf, jpeg, jpg o png.',
            'archivo.max' => 'El archivo no debe pesar más de 2MB.',
        ]);

        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;

            if (!$vendedor) {
                return back()->with('error', 'Perfil de vendedor no encontrado.');
            }

            $nombreDoc = $request->input('nombre');
            $archivo = $request->file('archivo');

            // --- Validación básica Opción B ---
            $esValido = true;
            $motivoRechazo = null;

            // 1. Validar tamaño mínimo de 50KB
            if ($archivo->getSize() < 51200) { // 50 * 1024
                $esValido = false;
                $motivoRechazo = 'El documento es demasiado pequeño (debe ser mayor a 50KB). Suba una copia de mejor calidad.';
            }

            // 2. Validar resolución de imagen
            if ($esValido && in_array($archivo->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])) {
                $imageSize = getimagesize($archivo->getRealPath());
                if ($imageSize) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width < 600 || $height < 400) {
                        $esValido = false;
                        $motivoRechazo = "La resolución de la imagen es muy baja ({$width}x{$height}px). Debe ser al menos de 600x400px para garantizar legibilidad.";
                    }
                } else {
                    $esValido = false;
                    $motivoRechazo = 'El archivo de imagen está corrupto o no es válido.';
                }
            }

            // Unique name for the file
            $extension = $archivo->getClientOriginalExtension();
            $timestamp = now()->timestamp;
            $random = Str::random(4);
            $slugName = Str::slug($nombreDoc);
            $filename = "{$slugName}_{$timestamp}_{$random}.{$extension}";

            // Store in public disk under documentos/{idUsuario}
            $path = $archivo->storeAs("documentos/{$user->idUsuario}", $filename, 'public');

            // Find existing document or create new
            $documento = Documento::where('idVendedor', $vendedor->idVendedor)
                                  ->where('nombre', $nombreDoc)
                                  ->first();

            $estadoInicial = $esValido ? 'PENDIENTE' : 'RECHAZADO';

            if ($documento) {
                // Delete old file if it exists
                if ($documento->ruta_archivo) {
                    Storage::disk('public')->delete($documento->ruta_archivo);
                }

                // Update existing record
                $documento->update([
                    'ruta_archivo' => $path,
                    'estado' => $estadoInicial,
                    'motivo_rechazo' => $motivoRechazo
                ]);
            } else {
                // Create new record
                Documento::create([
                    'idVendedor' => $vendedor->idVendedor,
                    'nombre' => $nombreDoc,
                    'ruta_archivo' => $path,
                    'estado' => $estadoInicial,
                    'motivo_rechazo' => $motivoRechazo
                ]);
            }

            if (!$esValido) {
                return back()->with('error', 'El documento "' . $nombreDoc . '" ha sido rechazado automáticamente. Motivo: ' . $motivoRechazo);
            }

            return back()->with('success', 'El documento "' . $nombreDoc . '" ha sido subido correctamente y está en revisión.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al subir el documento: ' . $e->getMessage());
        }
    }

    /**
     * Simulated admin document validation for demo and development.
     */
    public function simularValidacion(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string|in:APROBADO,RECHAZADO',
            'motivo_rechazo' => 'required_if:estado,RECHAZADO|nullable|string|max:255',
        ], [
            'estado.required' => 'El estado de la validación es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
            'motivo_rechazo.required_if' => 'Debes proporcionar un motivo de rechazo si el documento es rechazado.',
        ]);

        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;

            if (!$vendedor) {
                return back()->with('error', 'Perfil de vendedor no encontrado.');
            }

            // Validar que el documento realmente pertenezca a este vendedor (Seguridad #4)
            $documento = Documento::where('idVendedor', $vendedor->idVendedor)->findOrFail($id);
            
            $estado = $request->input('estado');
            $motivo = $estado === 'RECHAZADO' ? $request->input('motivo_rechazo') : null;

            $documento->update([
                'estado' => $estado,
                'motivo_rechazo' => $motivo,
            ]);

            $mensaje = $estado === 'APROBADO' 
                ? 'Documento "' . $documento->nombre . '" aprobado con éxito.' 
                : 'Documento "' . $documento->nombre . '" rechazado con motivo: ' . $motivo;

            return back()->with('success', $mensaje);
        } catch (\Exception $e) {
            return back()->with('error', 'Error al procesar la validación: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            $vendedor = $user->vendedor;

            if (!$vendedor) {
                return back()->with('error', 'Perfil de vendedor no encontrado.');
            }

            // Validar propiedad
            $documento = Documento::where('idVendedor', $vendedor->idVendedor)->findOrFail($id);

            // Eliminar el archivo físico
            if ($documento->ruta_archivo) {
                Storage::disk('public')->delete($documento->ruta_archivo);
            }

            // Eliminar el registro
            $documento->delete();

            return back()->with('success', 'Documento "' . $documento->nombre . '" retirado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al retirar el documento: ' . $e->getMessage());
        }
    }
}
