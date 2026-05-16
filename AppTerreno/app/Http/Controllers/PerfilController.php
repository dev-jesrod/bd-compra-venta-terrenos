<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function usuario()
    {
        return view('perfil.usuario');
    }

    public function vendedor()
    {
        return view('perfil.vendedor');
    }
}