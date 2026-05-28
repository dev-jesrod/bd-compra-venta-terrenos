<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;
use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{
    public function index()
    {
        try {
            $terrenos = Terreno::disponible()
                ->with('usuario.vendedor.documentos')
                ->where('estado_verificacion', 'APROBADO')
                ->latest()
                ->take(4)
                ->get();

            return view('homePage', compact('terrenos'));

        } catch (\Exception $e) {
            Log::error('Error al cargar el HomePage: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            return view('homePage', ['terrenos' => collect()]);
        }
    }
}