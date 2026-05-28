<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function usuario()
    {
        return view('perfilUsuario');
    }

    public function vendedor()
    {
        return view('perfilVendedor');
    }
}