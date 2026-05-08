<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;

class TerrenoController extends CuentaController
{
    public function store(Request $request)
{
  
    $request->validate([
        'idUsuario' => 'required|integer',
        'nombre' => 'required|string|max:255',
        'estado' => 'required|string|max:100',
        'largo' => 'required|numeric|min:1',
        'ancho' => 'required|numeric|min:1',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
    ]);

  
    $terreno = new Terreno();
    $terreno->idUsuario = $request->idUsuario;
    $terreno->nombre = $request->nombre;
    $terreno->estado = $request->estado;
    $terreno->largo = $request->largo;
    $terreno->ancho = $request->ancho;
    $terreno->descripcion = $request->descripcion;
    $terreno->precio = $request->precio;

    $terreno->save();

    return redirect()->back()->with('success', 'Terreno registrado correctamente');
}
}