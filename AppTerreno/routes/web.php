<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\Vendedor\RegistroVendedorController;
use App\Http\Controllers\Cliente\RegistroClienteController;
use App\Http\Controllers\Vendedor\DashboardController;
use App\Http\Controllers\Vendedor\TerrenoVendedorController;
use App\Http\Controllers\Vendedor\LeadController;
use App\Http\Controllers\Vendedor\DocumentoController;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\PerfilController;

/* |------------------------ | Rutas de Autenticación |-------------------------------------------------------------------------- */
//* Usuario y Vendedor

Route::get('/perfil-usuario', [PerfilController::class, 'usuario']);
Route::get('/perfil-vendedor', [PerfilController::class, 'vendedor']);

//* Terreno
use App\Http\Controllers\Cliente\DashboardController as ClienteDashboardController;

/* |--------------------------------------------------------------------------
 | Rutas Públicas (sin autenticación)
 |-------------------------------------------------------------------------- */

// HomePage — accesible para todos
Route::get('/', [HomePageController::class, 'index'])->name('home');

// Terrenos - Catálogo (requiere autenticación)
Route::get('/terrenos', [TerrenoController::class, 'index'])
    ->middleware('auth')
    ->name('terrenos.index');

// Terrenos detalle - Requiere autenticación
Route::get('/terrenos/{id}', [TerrenoController::class, 'show'])
    ->middleware('auth')
    ->name('terrenos.show');

// Login
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);

// Registro — Vendedor
Route::get('/registro', [RegistroVendedorController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegistroVendedorController::class, 'store'])->name('registro.store');

// Registro — Cliente (usuario normal)
Route::get('/registro-cliente', [RegistroClienteController::class, 'showRegistrationForm'])->name('registro.cliente');
Route::post('/registro-cliente', [RegistroClienteController::class, 'store'])->name('registro.cliente.store');

// Logout
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


// Rutas para el vendedor
Route::middleware(['auth', 'rol:vendedor'])->prefix('vendedor')->name('vendedor.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Terrenos (mis propiedades y publicar)
    Route::get('/mis-propiedades', [TerrenoVendedorController::class, 'index'])->name('terrenos.index');
    Route::get('/publicar-terreno', [TerrenoVendedorController::class, 'create'])->name('terrenos.create');
    Route::post('/publicar-terreno', [TerrenoVendedorController::class, 'store'])->name('terrenos.store');
    Route::get('/terrenos/{id}', [TerrenoVendedorController::class, 'show'])->name('terrenos.show');
    Route::get('/terrenos/{id}/editar', [TerrenoVendedorController::class, 'edit'])->name('terrenos.edit');
    Route::put('/terrenos/{id}', [TerrenoVendedorController::class, 'update'])->name('terrenos.update');
    Route::delete('/terrenos/{id}', [TerrenoVendedorController::class, 'destroy'])->name('terrenos.destroy');

    // Leads
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::put('/leads/{id}', [LeadController::class, 'update'])->name('leads.update');

    // Documentos
    Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');
    Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
    Route::post('/documentos/simular/{id}', [DocumentoController::class, 'simularValidacion'])->name('documentos.simular');
});

// Rutas para el cliente
Route::middleware(['auth', 'rol:cliente'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteDashboardController::class, 'index'])->name('dashboard');
});


