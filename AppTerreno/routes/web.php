<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [ LoginController::class, 'login'] );

Route::get('/registro',function (){
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

Route::get('/properties', function() {
    return view('homePage');
})->name('properties.index');

Route::get('/properties/catalog', function() {
    return view('homePage');
})->name('properties.catalog');

Route::get('/properties/{slug}', function($slug) {
    return view('detalles-terreno');
})->name('properties.show');

Route::get('/projects', function() {
    return view('homePage');
})->name('projects.index');

Route::get('/sustainability', function() {
    return view('homePage');
})->name('sustainability.index');

Route::get('/about', function() {
    return view('homePage');
})->name('about.index');

Route::get('/contact', function() {
    return view('homePage');
})->name('contact');

Route::get('/faq', function() {
    return view('homePage');
})->name('faq');

Route::get('/privacy', function() {
    return view('homePage');
})->name('privacy');

Route::get('/register', function() {
    return view('registro');
})->name('register');

Route::post('/register', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Registro no implementado']);
})->name('register.store');

Route::get('/password/reset', function() {
    return view('recuperarcontra');
})->name('password.request');

Route::post('/listings', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Listings store no implementado']);
})->name('listings.store');

Route::post('/vendedor/terrenos', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Vendedor terrains store no implementado']);
})->name('vendedor.terrenos.store');
