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

            $totalProspectos = $leads->count();
            // Placeholder metrics for views and active reservations since they aren't fully modeled yet
            $totalVistas = 0;
            $apartadosActivos = 0;

            $hasRfc = !empty($vendedor->rfc);
            $trustLevel = $hasRfc ? 33 : 0;

            return view('vendedor.dashboard', compact('terrenos', 'leads', 'noContent', 'totalProspectos', 'totalVistas', 'apartadosActivos', 'hasRfc', 'trustLevel', 'vendedor'));

        } catch (\Exception $e) {
            // Emulate error
            return view('vendedor.dashboard')->with([
                'noContent' => true, 
                'error' => 'Error al cargar el contenido: ' . $e->getMessage()
            ]);
        }
    }
}
