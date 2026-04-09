<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registro',function (){
    return view('registro');
});