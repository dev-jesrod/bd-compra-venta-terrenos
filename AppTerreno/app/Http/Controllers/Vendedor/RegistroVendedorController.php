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
            'apellido2'       => ['nullable', 'string', 'max:45'],
            'sexo'            => ['required', 'in:M,F'],
            'fechaNacimiento' => ['required', 'date'],
            'curp'            => ['required', 'string', 'size:18', 'unique:usuarios,curp'],
            'telefono'        => ['required', 'string', 'max:10', 'unique:usuarios,telefono'],
            'email'           => ['required', 'string', 'email', 'max:80', 'unique:usuarios,email'],
            'password'        => ['required', 'string', 'min:8', 'confirmed'],
            'rfc'             => ['required', 'string', 'max:13', 'unique:dato_vendedores,rfc'],
            'utilidad'        => ['required', 'numeric', 'min:0'],
        ], [
            'nombre.required'            => 'El nombre es obligatorio.',
            'apellido1.required'         => 'El primer apellido es obligatorio.',
            'sexo.in'                    => 'El sexo debe ser Masculino o Femenino.',
            'fechaNacimiento.required'   => 'La fecha de nacimiento es obligatoria.',
            'curp.size'                  => 'La CURP debe tener exactamente 18 caracteres.',
            'curp.unique'                => 'Esta CURP ya está registrada.',
            'telefono.unique'            => 'Este número de teléfono ya está registrado.',
            'email.unique'               => 'Este correo electrónico ya está registrado.',
            'password.min'               => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'         => 'Las contraseñas no coinciden.',
            'rfc.unique'                 => 'Este RFC ya está registrado.',
            'utilidad.numeric'           => 'La utilidad debe ser un valor numérico.',
        ]);

        try {
            DB::beginTransaction();

            $usuario = new Usuario();
            $usuario->tipoUsuario    = 'vendedor';
            $usuario->nombre         = $request->nombre;
            $usuario->apellido1      = $request->apellido1;
            $usuario->apellido2      = $request->apellido2 ?? '';
            $usuario->sexo           = $request->sexo;
            $usuario->fechaNacimiento = $request->fechaNacimiento;
            $usuario->contrasena     = Hash::make($request->password);
            $usuario->estado         = true;
            $usuario->curp           = $request->curp;
            $usuario->telefono       = $request->telefono;
            $usuario->email          = $request->email;
            $usuario->save();

            $datoVendedor = new DatoVendedor();
            $datoVendedor->idUsuario = $usuario->idUsuario;
            $datoVendedor->rfc       = $request->rfc;
            $datoVendedor->utilidad  = $request->utilidad;
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
