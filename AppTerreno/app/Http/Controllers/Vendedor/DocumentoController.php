<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;

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

            $documentos = Documento::where('idVendedor', $vendedor->idVendedor)->get();
            return view('vendedor.documentos', compact('documentos'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar los documentos: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            // Logica para subir archivo
            // Esto manejará la carga de RFCs si el vendedor no lo subió antes.
            return back()->with('success', 'Documento subido correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al subir documento: ' . $e->getMessage());
        }
    }
}
