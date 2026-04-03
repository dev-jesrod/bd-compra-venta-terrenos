<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\RegistroUserController;

/* |-------------------------------------------------------------------------- | Rutas de Autenticación |-------------------------------------------------------------------------- */

// Login
Route::get('/login', [UserLoginController::class , 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class , 'login']);

// Registro
Route::get('/registro', [RegistroUserController::class , 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegistroUserController::class , 'store'])->name('registro.store');

// Logout
Route::post('/logout', [UserLoginController::class , 'logout'])->name('logout');
/* |--------------------------------------------------------------------------
 | Rutas Protegidas (Requieren Autenticación)
 |-------------------------------------------------------------------------- */
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
            return view('homePage');
        }
        )->name('home');    });
