<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terreno;
use App\Models\Lead;
use App\Models\Documento;
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
            
            // Count metrics
            $totalProspectos = Lead::whereIn('idTerreno', $terrenosIds)->where('estado', 'NUEVO')->count();
            $terrenosActivos = $terrenos->where('estado', 'DISPONIBLE')->count();
            $apartadosActivos = $terrenos->where('estado', 'RESERVADO')->count();
            
            // Dynamic view stats simulation based on terrenos
            $totalVistas = $terrenos->count() * 342 + 120; // Simulated dynamic view counts

            // Calculate trust level based on approved documents
            $documentos = Documento::where('idVendedor', $vendedor->idVendedor)->get();
            $aprobadosCount = $documentos->where('estado', 'APROBADO')->count();
            $trustLevel = $aprobadosCount * 20;

            // Fetch specific document states for the dashboard banner
            $ineDoc = $documentos->where('nombre', 'INE')->first();
            $rfcDoc = $documentos->where('nombre', 'RFC')->first();
            $curpDoc = $documentos->where('nombre', 'CURP')->first();
            $comprobanteDoc = $documentos->where('nombre', 'Comprobante Domicilio')->first();
            $satDoc = $documentos->where('nombre', 'Opinión SAT')->first();

            $noContent = $terrenos->isEmpty();

            return view('vendedor.dashboard', compact(
                'terrenos', 
                'noContent', 
                'totalProspectos', 
                'totalVistas', 
                'terrenosActivos',
                'apartadosActivos', 
                'trustLevel', 
                'vendedor',
                'ineDoc',
                'rfcDoc',
                'curpDoc',
                'comprobanteDoc',
                'satDoc'
            ));

        } catch (\Exception $e) {
            return view('vendedor.dashboard')->with([
                'noContent' => true, 
                'error' => 'Error al cargar el contenido: ' . $e->getMessage()
            ]);
        }
    }
}
