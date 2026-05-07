<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
/*use Illuminate\Container\Attributes\Auth;*/
use Illuminate\Http\Request;

class LoginController extends Controller{
    

    //Validacion para saber si existe en la base de datos
    public function login( Request $request){

        $credenciales = $request->only('email', 'contrasena');

        //Validacion de usuario
        if( Auth::attempt( $credenciales ) ){

            return redirect()->intended( 'home' );
        }

        return back()->withErrors( [
            'email' => 'El correo electronico proporcionado no existe',
        ] );

    }//fin-login
}