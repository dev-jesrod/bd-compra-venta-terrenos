<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarContrasenaController extends Controller
{
    public function showForm()
    {
        return view('recuperarcontra');
    }

    public function enviarEnlace(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        return back()->with('status', 'Se ha enviado un enlace de simulación de restablecimiento a su correo electrónico.');
    }
}
