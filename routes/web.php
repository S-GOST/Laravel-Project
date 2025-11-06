<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradoresModeloController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\AdministradoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orden_servicio', [orden_servicioController::class, 'index'])->name('orden_servicio');
Route::get('/administradores', [AdministradoresController::class, 'index'])->name('administradores');

