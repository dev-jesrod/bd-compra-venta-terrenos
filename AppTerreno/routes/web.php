<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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

/* |-------------------------------------------------------------------------- | Rutas Protegidas (requieren autenticación) |-------------------------------------------------------------------------- */

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
            return view('homePage');
        }
        )->name('home');
    });
=======
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\CuentaController;

Route::get('/cuentas', [CuentaController::class, 'index']);
Route::post('/terrenos', [TerrenoController::class, 'store'])->name('terrenos.store');

Route::get('/terrenos/create', function () {
    return view('create');
});
>>>>>>> dataBase
