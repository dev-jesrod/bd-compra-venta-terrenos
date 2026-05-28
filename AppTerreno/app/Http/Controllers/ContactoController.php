<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Terreno;

class ContactoController extends Controller
{
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'nullable|string',
        ]);

        try {
            $terreno = Terreno::findOrFail($id);

            Lead::create([
                'idTerreno' => $terreno->idTerreno,
                'nombre' => $validated['nombre'],
                'email' => $validated['email'],
                'telefono' => $validated['telefono'] ?? null,
                'mensaje' => $validated['mensaje'] ?? null,
                'estado' => 'NUEVO',
            ]);

            return back()->with('success', 'Mensaje enviado correctamente. El vendedor se pondrá en contacto contigo.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        }
    }
}
