<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\RegistroUserController;
use App\Http\Controllers\TerrenoController;


/* |-------------------------------------------------------------------------- | Rutas de Autenticación |-------------------------------------------------------------------------- */
//* Terreno

Route::get('/terrenos', [TerrenoController::class, 'index'])->name('terrenos.index');

// Login
Route::get('/login', [UserLoginController::class , 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class , 'login']);

// Registro
Route::get('/registro', [RegistroUserController::class , 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegistroUserController::class , 'store'])->name('registro.store');

// Logout
Route::post('/logout', [UserLoginController::class , 'logout'])->name('logout');

/* |-------------------------------------------------------------------------- | Rutas Protegidas (requieren autenticación) |-------------------------------------------------------------------------- */

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
            return view('homePage');
        }
        )->name('home');
    });
