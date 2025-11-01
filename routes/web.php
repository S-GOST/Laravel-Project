<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradoresModeloController;
use App\Http\Controllers\orden_servicioController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/administradores', function () {
    return view('administradores');
});

Route::get('/orden_servicio', [orden_servicioController::class, 'index']);


