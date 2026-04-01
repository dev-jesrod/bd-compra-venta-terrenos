<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\CuentaController;

Route::get('/cuentas', [CuentaController::class, 'index']);
Route::post('/terrenos', [TerrenoController::class, 'store'])->name('terrenos.store');

Route::get('/terrenos/create', function () {
    return view('create');
});
