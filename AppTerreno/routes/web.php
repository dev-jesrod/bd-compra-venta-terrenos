<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homePage');
});

Route::get('/login', function () {
    return view('login');
});

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
