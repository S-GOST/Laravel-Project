<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\AdministradoresController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return 'esta es otra ruta';
});

Route::get('/administradores', [administradoresController::class, 'index'])->name('administradores.index');
Route::post('/administradores', [administradoresController::class, 'store'])->name('administradores.store');
Route::get('/clientes', [clientesController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [clientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{or}/edit', [clientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{or}', [clientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [clientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('/orden_servicio', [orden_servicioController::class, 'index'])->name('orden_servicio.index');
Route::post('/orden_servicio', [orden_servicioController::class, 'store'])->name('orden_servicio.store');
Route::get('/orden_servicio/{or}/edit', [orden_servicioController::class, 'edit'])->name('orden_servicio.edit');
Route::put('/orden_servicio/{or}', [orden_servicioController::class, 'update'])->name('orden_servicio.update');