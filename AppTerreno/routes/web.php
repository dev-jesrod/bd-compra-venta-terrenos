<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homePage');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/dashboard', function () {
    return view('vendedor.dashboard');
});

Route::get('/publicar-terreno', function() {
    return view('vendedor.publicar-terreno');
});

Route::get('/mis-propiedades', function() {
    return view('vendedor.mis-propiedades');
});

Route::get('/leads', function() {
    return view('vendedor.leads');
});

Route::get('/documentos', function() {
    return view('vendedor.documentos');
});

Route::get('/recuperar-contrasena', function() {
    return view('recuperarcontra');
});

Route::post('/recuperar-contrasena', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Link enviado a tu correo']);
})->name('password.email');
