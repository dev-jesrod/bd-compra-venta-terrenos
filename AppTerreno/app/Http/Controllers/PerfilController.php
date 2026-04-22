<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatoVendedor;

class PerfilController extends Controller
{
    public function usuario()
    {
        $usuario = User::first();
        return view('perfilUsuario', compact('usuario'));
    }

    public function vendedor()
    {
        $vendedor = DatoVendedor::with('usuario')->first();
        return view('perfilVendedor', compact('vendedor'));
    }
}