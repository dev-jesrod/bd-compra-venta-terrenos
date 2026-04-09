<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\DatoVendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistroVendedorController extends Controller
{
    /**
     * Muestra el formulario de registro de usuario.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('RegistroVendedor');
    }

    /**
     * Procesa y almacena el registro de un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'apellido1' => 'required|string|max:45',
            'apellido2' => 'nullable|string|max:45',
            'sexo' => 'required|in:M,F',
            'fechaNacimiento' => 'required|date',
            'curp' => 'required|string|max:18|unique:usuarios,curp',
            'telefono' => 'required|string|max:10|unique:usuarios,telefono',
            'email' => 'required|string|email|max:80|unique:usuarios,email',
            'password' => 'required|string|min:8',
            'rfc' => 'required|string|max:13|unique:dato_vendedores,rfc',
            'utilidad' => 'required|numeric|min:0'
        ]);

        try {
            DB::beginTransaction();

            $usuario = new Usuario();
            $usuario->tipoUsuario = 'vendedor';
            $usuario->nombre = $request->nombre;
            $usuario->apellido1 = $request->apellido1;
            $usuario->apellido2 = $request->apellido2 ?? '';
            $usuario->sexo = $request->sexo;
            $usuario->fechaNacimiento = $request->fechaNacimiento;
            $usuario->contrasena = Hash::make($request->password);
            $usuario->estado = true;
            $usuario->curp = $request->curp;
            $usuario->telefono = $request->telefono;
            $usuario->email = $request->email;
            $usuario->save();

            $datoVendedor = new DatoVendedor();
            $datoVendedor->idUsuario = $usuario->idUsuario;
            $datoVendedor->rfc = $request->rfc;
            $datoVendedor->utilidad = $request->utilidad;
            $datoVendedor->save();

            DB::commit();

            Auth::login($usuario);

            return redirect()->route('vendedor.dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Ocurrió un error al registrar el vendedor: ' . $e->getMessage())->withInput();
        }
    }
}
