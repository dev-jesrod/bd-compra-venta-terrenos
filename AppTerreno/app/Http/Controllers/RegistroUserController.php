<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class RegistroUserController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validación en el Controlador (Asegura que la petición HTTP trae los datos correctos)
        $datosValidados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes,email',
            'password' => 'required|string|min:8',
        ]);

        // 2. Delegar la creación y lógica interna al Modelo
        $cliente = Cliente::registrarUsuario($datosValidados);

        // 3. Iniciar sesión automáticamente después de registrarse
        Auth::login($cliente);

        // 4. Redirigir a la página principal
        return redirect('/');
    }
}
