<?php

namespace App\Http\Controllers;

use App\Models\Terreno;

class DetalleTerrenoController extends Controller
{
    public function show($id)
    {
        $terreno = Terreno::findOrFail($id);

        return view('terrenos.detalle', compact('terreno'));
    }
}