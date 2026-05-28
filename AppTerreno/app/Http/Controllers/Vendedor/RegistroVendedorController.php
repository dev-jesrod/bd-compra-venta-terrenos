<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\DatoVendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegistroVendedorController extends Controller
{
    /**
     * Muestra el formulario de registro de vendedor.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showRegistrationForm()
    {
        // Si ya está logueado, redirigir al dashboard
        if (Auth::check()) {
            return redirect()->route(Auth::user()->tipoUsuario === 'vendedor'
                ? 'vendedor.dashboard'
                : 'home'
            );
        }

        return view('RegistroVendedor');
    }

    /**
     * Procesa y almacena el registro de un nuevo vendedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'          => ['required', 'string', 'max:45'],
            'apellido1'       => ['required', 'string', 'max:45'],
            'telefono'        => ['required', 'string', 'max:10', 'unique:usuarios,telefono'],
            'email'           => ['required', 'string', 'email', 'max:80', 'unique:usuarios,email'],
            'password'        => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nombre.required'            => 'El nombre es obligatorio.',
            'apellido1.required'         => 'El primer apellido es obligatorio.',
            'telefono.unique'            => 'Este número de teléfono ya está registrado.',
            'email.unique'               => 'Este correo electrónico ya está registrado.',
            'password.min'               => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'         => 'Las contraseñas no coinciden.',
        ]);

        try {
            DB::beginTransaction();

            $usuario = new Usuario();
            $usuario->tipoUsuario    = 'vendedor';
            $usuario->nombre         = $request->nombre;
            $usuario->apellido1      = $request->apellido1;
            $usuario->apellido2      = '';
            $usuario->sexo           = 'M';
            $usuario->fechaNacimiento = '2000-01-01';
            $usuario->contrasena     = Hash::make($request->password);
            $usuario->estado         = true;
            $usuario->curp           = 'SELLER' . strtoupper(\Illuminate\Support\Str::random(12)); // 18 chars unique CURP
            $usuario->telefono       = $request->telefono;
            $usuario->email          = $request->email;
            $usuario->save();

            $datoVendedor = new DatoVendedor();
            $datoVendedor->idUsuario = $usuario->idUsuario;
            $datoVendedor->rfc       = 'XAXX010101' . strtoupper(\Illuminate\Support\Str::random(3)); // 13 chars RFC
            $datoVendedor->utilidad  = 20.0; // 20% max utility by default
            $datoVendedor->save();

            DB::commit();

            Auth::login($usuario);

            return redirect()->route('vendedor.dashboard');

        } catch (\Exception $e) {
            DB::rollBack();

            // Loggear el error real internamente, nunca al usuario
            Log::error('Error al registrar vendedor: ' . $e->getMessage(), [
                'email'     => $request->email,
                'exception' => $e,
            ]);

            return back()
                ->with('error', 'Ocurrió un error al completar el registro. Inténtalo de nuevo.')
                ->withInput($request->except(['password', 'password_confirmation']));
        }
    }
}
