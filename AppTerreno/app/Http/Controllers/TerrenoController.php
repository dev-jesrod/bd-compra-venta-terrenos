<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;

class TerrenoController extends Controller
{
    public function Filtro(Request $request)
    {
        $query = Terreno::query();


        // Filtro por nombre 
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        //  Filtro por ubicación
        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        // Filtro por estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Precio mínimo
        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        // Precio máximo
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $terrenos = $query->get();

        return view('terrenos.index', compact('terrenos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idUsuario' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'largo' => 'required|numeric|min:1',
            'ancho' => 'required|numeric|min:1',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $terreno = new Terreno();
        $terreno->idUsuario = $request->idUsuario;
        $terreno->nombre = $request->nombre;
        $terreno->ubicacion = $request->ubicacion;
        $terreno->estado = $request->estado;
        $terreno->largo = $request->largo;
        $terreno->ancho = $request->ancho;
        $terreno->descripcion = $request->descripcion;
        $terreno->precio = $request->precio;

        $terreno->save();

        return redirect()->back()->with('success', 'Terreno registrado correctamente');
    }
}
