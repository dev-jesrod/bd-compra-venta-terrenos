<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RegistroUserController;


Route::get('/', function () {
    return view('homePage');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserLoginController::class , 'login']);

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::post('/registro', [RegistroUserController::class , 'store'])->name('registro.store');
