<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;
use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{
    /**
     * Muestra la página principal pública.
     * Accesible sin autenticación.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Terrenos destacados para mostrar en el HomePage
            $terrenosDestacados = Terreno::latest()->take(3)->get();

            return view('homePage', compact('terrenosDestacados'));

        } catch (\Exception $e) {
            Log::error('Error al cargar el HomePage: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            // Devuelve la vista con lista vacía; el frontend maneja el estado vacío
            return view('homePage', ['terrenosDestacados' => collect()]);
        }
    }
}
