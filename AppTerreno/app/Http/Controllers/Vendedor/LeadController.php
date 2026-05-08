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
            $terrenosIds = Terreno::where('idUsuario', $user->idUsuario)->pluck('idTerreno');
            $leads = Lead::whereIn('idTerreno', $terrenosIds)->get();
            
            return view('vendedor.leads', compact('leads'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar los leads: ' . $e->getMessage());
        }
    }
}
