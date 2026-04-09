<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terreno;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            
            // Check if there's an associated vendor profile
            $vendedor = $user->vendedor;
            
            if (!$vendedor) {
                return view('vendedor.dashboard')->with('noContent', true);
            }

            // Get terrains and leads for this vendor
            $terrenos = Terreno::where('idUsuario', $user->idUsuario)->get();
            $terrenosIds = $terrenos->pluck('idTerreno');
            $leads = Lead::whereIn('idTerreno', $terrenosIds)->get();

            $noContent = $terrenos->isEmpty() && $leads->isEmpty();

            return view('vendedor.dashboard', compact('terrenos', 'leads', 'noContent'));

        } catch (\Exception $e) {
            // Emulate error
            return view('vendedor.dashboard')->with([
                'noContent' => true, 
                'error' => 'Error al cargar el contenido: ' . $e->getMessage()
            ]);
        }
    }
}
