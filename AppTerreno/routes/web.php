<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RegistroUserController;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login']);

// Registro
Route::get('/registro', [RegistroUserController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegistroUserController::class, 'store'])->name('registro.store');

// Logout
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren autenticación)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('homePage');
    })->name('home');
});
