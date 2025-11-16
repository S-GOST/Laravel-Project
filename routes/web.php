<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\comprobanteController;
use App\Http\Controllers\informeController;
use App\Http\Controllers\historialController;

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

Route::get('/tecnicos', [tecnicosController::class, 'index'])->name('tecnicos.index');
Route::post('/tecnicos', [tecnicosController::class, 'store'])->name('tecnicos.store');
Route::get('/tecnicos/{or}/edit', [tecnicosController::class, 'edit'])->name('tecnicos.edit');
Route::put('/tecnicos/{idT}', [tecnicosController::class, 'update'])->name('tecnicos.update');
Route::delete('/tecnicos/{idT}', [tecnicosController::class, 'destroy'])->name('tecnicos.destroy');


Route::get('/comprobante', [comprobanteController::class, 'index'])->name('comprobante.index');
Route::post('/comprobante', [comprobanteController::class, 'store'])->name('comprobante.store');
Route::get('/comprobante/{or}/edit', [comprobanteController::class, 'edit'])->name('comprobante.edit');
Route::put('/comprobante/{idT}', [comprobanteController::class, 'update'])->name('comprobante.update');
Route::delete('/comprobante/{idT}', [conprobanteController::class, 'destroy'])->name('comprobante.destroy');


Route::get('/informe', [informeController::class, 'index'])->name('informe.index');
Route::post('/informe', [informeController::class, 'store'])->name('informe.store');
Route::get('/informe/{or}/edit', [informeController::class, 'edit'])->name('informe.edit');
Route::put('/informe/{idT}', [informeController::class, 'update'])->name('informe.update');
Route::delete('/informe/{idT}', [informeController::class, 'destroy'])->name('informe.destroy');


Route::get('/historial', [historialController::class, 'index'])->name('historial.index');
Route::post('/historial', [historialController::class, 'store'])->name('historial.store');
Route::get('/historial/{or}/edit', [historialController::class, 'edit'])->name('historial.edit');
Route::put('/historial/{idT}', [historialController::class, 'update'])->name('historial.update');
Route::delete('/historial/{idT}', [historialController::class, 'destroy'])->name('historial.destroy');