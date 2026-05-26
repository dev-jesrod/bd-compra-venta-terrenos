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
            $trustLevel = $aprobadosCount * 20;

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

            if ($documento) {
                // Delete old file if it exists
                if ($documento->ruta_archivo) {
                    Storage::disk('public')->delete($documento->ruta_archivo);
                }

                // Update existing record and reset state to PENDIENTE
                $documento->update([
                    'ruta_archivo' => $path,
                    'estado' => 'PENDIENTE',
                    'motivo_rechazo' => null
                ]);
            } else {
                // Create new record
                Documento::create([
                    'idVendedor' => $vendedor->idVendedor,
                    'nombre' => $nombreDoc,
                    'ruta_archivo' => $path,
                    'estado' => 'PENDIENTE',
                    'motivo_rechazo' => null
                ]);
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
            $documento = Documento::findOrFail($id);
            
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
}
