<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [ LoginController::class, 'login'] );

Route::get('/registro',function (){
    return view('registro');
<<<<<<< HEAD
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

Route::get('/recuperar-contrasena', function() {
    return view('recuperarcontra');
});

Route::post('/recuperar-contrasena', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Link enviado a tu correo']);
})->name('password.email');

Route::get('/properties', function() {
    return view('homePage');
})->name('properties.index');

Route::get('/properties/catalog', function() {
    return view('homePage');
})->name('properties.catalog');

Route::get('/properties/{slug}', function($slug) {
    return view('detalles-terreno');
})->name('properties.show');

Route::get('/projects', function() {
    return view('homePage');
})->name('projects.index');

Route::get('/sustainability', function() {
    return view('homePage');
})->name('sustainability.index');

Route::get('/about', function() {
    return view('homePage');
})->name('about.index');

Route::get('/contact', function() {
    return view('homePage');
})->name('contact');

Route::get('/faq', function() {
    return view('homePage');
})->name('faq');

Route::get('/privacy', function() {
    return view('homePage');
})->name('privacy');

Route::get('/register', function() {
    return view('registro');
})->name('register');

Route::post('/register', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Registro no implementado']);
})->name('register.store');

Route::get('/password/reset', function() {
    return view('recuperarcontra');
})->name('password.request');

Route::post('/listings', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Listings store no implementado']);
})->name('listings.store');

Route::post('/vendedor/terrenos', function(Illuminate\Http\Request $request) {
    return response()->json(['message' => 'Vendedor terrains store no implementado']);
})->name('vendedor.terrenos.store');
=======
=======
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
>>>>>>> database
});
>>>>>>> dataBase
