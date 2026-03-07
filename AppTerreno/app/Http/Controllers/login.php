<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class loginController
{
    function shoLogin(){
        return view('testLogin');
    }
    

    public function autenticacion(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request -> session()->regenerate();
            return redirect('/Testhome');
        }
        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
            'password' => 'Credenciales incorrectas'
        ]) -> onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/Testhome')->with('info', 'Sesión cerrada correctamente.');
    }

}
