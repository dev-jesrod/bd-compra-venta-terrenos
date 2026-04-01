<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;

class CuentaController extends Controller
{
    public function index()
    {
        // Trae cuentas con cliente y vendedor + usuario
        $cuentas = Cuenta::with([
            'cliente.usuario',
            'vendedor.usuario'
        ])->get();

        return view('cuentas.index', compact('cuentas'));
    }
}