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
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PerfilController;

Route::get('/cuentas', [CuentaController::class, 'index']);

Route::post('/terrenos', [TerrenoController::class, 'store'])->name('terrenos.store');

Route::get('/terrenos/create', function () {
    return view('create');
});

Route::get('/perfil-usuario', [PerfilController::class, 'usuario']);
Route::get('/perfil-vendedor', [PerfilController::class, 'vendedor']);

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/terrenos', [TerrenoController::class, 'index'])->name('terrenos.index');

Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);

Route::get('/registro', [RegistroVendedorController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegistroVendedorController::class, 'store'])->name('registro.store');

Route::get('/registro-cliente', [RegistroClienteController::class, 'showRegistrationForm'])->name('registro.cliente');
Route::post('/registro-cliente', [RegistroClienteController::class, 'store'])->name('registro.cliente.store');

Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Vendedor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'rol:vendedor'])
    ->prefix('vendedor')
    ->name('vendedor.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/mis-propiedades', [TerrenoVendedorController::class, 'index'])->name('terrenos.index');

        Route::get('/publicar-terreno', [TerrenoVendedorController::class, 'create'])->name('terrenos.create');

        Route::post('/publicar-terreno', [TerrenoVendedorController::class, 'store'])->name('terrenos.store');

        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');

        Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');

        Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
});