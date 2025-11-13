<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\motosController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return 'esta es otra ruta';
});

Route::get('/administradores', [administradoresController::class, 'index'])->name('administradores.index');
Route::post('/administradores', [administradoresController::class, 'store'])->name('administradores.store');
Route::get('/administradores/{or}/edit', [administradoresController::class, 'edit'])->name('administradores.edit');
Route::put('/administradores/{or}', [administradoresController::class, 'update'])->name('administradores.update');
Route::delete('/administradores/{id}', [administradoresController::class, 'destroy'])->name('administradores.destroy');

Route::get('/clientes', [clientesController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [clientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{or}/edit', [clientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{or}', [clientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [clientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('/orden_servicio', [orden_servicioController::class, 'index'])->name('orden_servicio.index');
Route::post('/orden_servicio', [orden_servicioController::class, 'store'])->name('orden_servicio.store');
Route::get('/orden_servicio/{or}/edit', [orden_servicioController::class, 'edit'])->name('orden_servicio.edit');
Route::put('/orden_servicio/{or}', [orden_servicioController::class, 'update'])->name('orden_servicio.update');
Route::delete('/orden_servicio/{idA}', [orden_servicioController::class, 'destroy'])->name('orden_servicio.destroy');

Route::get('/motos', [motosController::class, 'index'])->name('motos.index');
Route::post('/motos', [motosController::class, 'store'])->name('motos.store');
Route::get('/motos/{or}/edit', [motosController::class, 'edit'])->name('motos.edit');
Route::put('/motos/{idM}', [motosController::class, 'update'])->name('motos.update');
Route::delete('/motos/{idM}', [motosController::class, 'destroy'])->name('motos.destroy');

Route::get('/ubicacion', [ubicacionController::class, 'index'])->name('ubicacion.index');
Route::post('/ubicacion', [ubicacionController::class, 'store'])->name('ubicacion.store');
Route::get('/ubicacion/{or}/edit', [ubicacionController::class, 'edit'])->name('ubicacion.edit');
Route::put('/ubicacion/{idM}', [ubicacionController::class, 'update'])->name('ubicacion.update');
Route::delete('/ubicacion/{idM}', [ubicacionController::class, 'destroy'])->name('ubicacion.destroy');