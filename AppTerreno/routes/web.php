<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registro',function (){
    return view('registro');
});