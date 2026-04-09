<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terreno;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        try {
            // Logica placeholder para guardar terreno
            // Aqui se requerira validacion y almacenamiento de propiedades
            return redirect()->route('vendedor.terrenos.index')->with('success', 'Terreno publicado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al publicar terreno: ' . $e->getMessage())->withInput();
        }
    }
}
