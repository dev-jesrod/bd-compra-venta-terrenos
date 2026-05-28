<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Terreno;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            
            // Get all terrain IDs owned by this seller
            $terrenos = Terreno::where('idUsuario', $user->idUsuario)->get();
            $terrenosIds = $terrenos->pluck('idTerreno');
            
            // Eager load the terrain relationship to prevent N+1 query problems
            $leads = Lead::with('terreno')
                ->whereIn('idTerreno', $terrenosIds)
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Real metrics
            $totalVistas = Terreno::where('idUsuario', $user->idUsuario)
                ->withCount('visitas')
                ->get()
                ->sum('visitas_count');
            
            $whatsappConsultas = $leads->count();
            $apartadosIntenciones = $terrenos->where('estado', 'RESERVADO')->count();
            
            return view('vendedor.leads', compact(
                'leads',
                'totalVistas',
                'whatsappConsultas',
                'apartadosIntenciones'
            ));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar los leads: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string|in:NUEVO,CONTACTADO,DESCARTADO',
        ], [
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ]);

        try {
            $user = Auth::user();
            $lead = Lead::findOrFail($id);
            
            // Security check: ensure the terrain belongs to the logged-in seller
            $terreno = Terreno::where('idTerreno', $lead->idTerreno)
                ->where('idUsuario', $user->idUsuario)
                ->first();

            if (!$terreno) {
                return back()->with('error', 'No tienes permiso para actualizar este prospecto.');
            }

            $lead->update([
                'estado' => $request->input('estado')
            ]);

            return back()->with('success', 'El estado del prospecto se actualizó a ' . $request->input('estado') . ' con éxito.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el prospecto: ' . $e->getMessage());
        }
    }
}
