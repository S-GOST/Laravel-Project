<?php

use Illuminate\Support\Facades\Route;

// IMPORTAR TODOS LOS CONTROLADORES
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\tecnicosController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\motosController;
use App\Http\Controllers\serviciosController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\detalles_orden_servicioController;
use App\Http\Controllers\informeController;
use App\Http\Controllers\comprobanteController;
use App\Http\Controllers\historialController;

// IMPORTAR CONTROLADORES DE AUTENTICACIÓN
use App\Http\Controllers\Auth\AdminAuthController;

// Página principal
Route::get('/', function () {
    return view('layouts.Panel');
});

// ======================
// ÁREA DE ADMINISTRADOR
// ======================

// RUTAS PÚBLICAS (login/registro admin)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/registro', [AdminAuthController::class, 'showRegisterForm'])->name('admin.registro');
Route::post('/admin/registro', [AdminAuthController::class, 'registro'])->name('admin.registro.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// GRUPO /admin
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('administradores.dashboard');
    })->name('admin.dashboard');

    // PANEL
    Route::get('/panel', function () {
        return view('layouts.Panel');
    })->name('panel');

    // CRUD Administradores
    Route::get('/administradores', [AdministradoresController::class, 'index'])->name('administradores.index');
    Route::post('/administradores', [AdministradoresController::class, 'store'])->name('administradores.store');
    Route::get('/administradores/{idA}/edit', [AdministradoresController::class, 'edit'])->name('administradores.edit');
    Route::put('/administradores/{idA}', [AdministradoresController::class, 'update'])->name('administradores.update');
    Route::delete('/administradores/{idA}', [AdministradoresController::class, 'destroy'])->name('administradores.destroy');

    // CRUD Técnicos
    Route::get('/tecnicos', [tecnicosController::class, 'index'])->name('tecnicos.index');
    Route::post('/tecnicos', [tecnicosController::class, 'store'])->name('tecnicos.store');
    Route::get('/tecnicos/{idT}/edit', [tecnicosController::class, 'edit'])->name('tecnicos.edit');
    Route::put('/tecnicos/{idT}', [tecnicosController::class, 'update'])->name('tecnicos.update');
    Route::delete('/tecnicos/{idT}', [tecnicosController::class, 'destroy'])->name('tecnicos.destroy');

    // CRUD Clientes
    Route::get('/clientes', [clientesController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [clientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit', [clientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [clientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}', [clientesController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/clientes/{id}/motos', [clientesController::class, 'verMotosCliente'])->name('vermotosCliente');

    // CRUD Motos
    Route::get('/motos', [motosController::class, 'index'])->name('motos.index');
    Route::post('/motos', [motosController::class, 'store'])->name('motos.store');
    Route::get('/motos/{idM}/edit', [motosController::class, 'edit'])->name('motos.edit');
    Route::put('/motos/{idM}', [motosController::class, 'update'])->name('motos.update');
    Route::delete('/motos/{idM}', [motosController::class, 'destroy'])->name('motos.destroy');

    // CRUD Servicios
    Route::get('/servicios', [serviciosController::class, 'index'])->name('servicios.index');
    Route::post('/servicios', [serviciosController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{idS}/edit', [serviciosController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{idS}', [serviciosController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{idS}', [serviciosController::class, 'destroy'])->name('servicios.destroy');

    // CRUD Productos
    Route::get('/productos', [productosController::class, 'index'])->name('productos.index');
    Route::post('/productos', [productosController::class, 'store'])->name('productos.store');
    Route::get('/productos/{idT}/edit', [productosController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{idT}', [productosController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{idT}', [productosController::class, 'destroy'])->name('productos.destroy');

    // CRUD Orden de servicio
    Route::get('/orden_servicio', [orden_servicioController::class, 'index'])->name('orden_servicio.index');
    Route::post('/orden_servicio', [orden_servicioController::class, 'store'])->name('orden_servicio.store');
    Route::get('/orden_servicio/{idO}/edit', [orden_servicioController::class, 'edit'])->name('orden_servicio.edit');
    Route::put('/orden_servicio/{idO}', [orden_servicioController::class, 'update'])->name('orden_servicio.update');
    Route::delete('/orden_servicio/{idO}', [orden_servicioController::class, 'destroy'])->name('orden_servicio.destroy');

    // CRUD Detalles orden
    Route::get('/detalles_orden_servicio', [detalles_orden_servicioController::class, 'index'])->name('detalles_orden_servicio.index');
    Route::post('/detalles_orden_servicio', [detalles_orden_servicioController::class, 'store'])->name('detalles_orden_servicio.store');
    Route::get('/detalles_orden_servicio/{id}/edit', [detalles_orden_servicioController::class, 'edit'])->name('detalles_orden_servicio.edit');
    Route::put('/detalles_orden_servicio/{idDOS}', [detalles_orden_servicioController::class, 'update'])->name('detalles_orden_servicio.update');
    Route::delete('/detalles_orden_servicio/{idDOS}', [detalles_orden_servicioController::class, 'destroy'])->name('detalles_orden_servicio.destroy');

    // CRUD Informe
    Route::get('/informe', [informeController::class, 'index'])->name('informe.index');
    Route::post('/informe', [informeController::class, 'store'])->name('informe.store');
    Route::get('/informe/{id}/edit', [informeController::class, 'edit'])->name('informe.edit');
    Route::put('/informe/{idI}', [informeController::class, 'update'])->name('informe.update');
    Route::delete('/informe/{idI}', [informeController::class, 'destroy'])->name('informe.destroy');

    // CRUD Comprobante
    Route::get('/comprobante', [comprobanteController::class, 'index'])->name('comprobante.index');
    Route::post('/comprobante', [comprobanteController::class, 'store'])->name('comprobante.store');
    Route::get('/comprobante/{idC}/edit', [comprobanteController::class, 'edit'])->name('comprobante.edit');
    Route::put('/comprobante/{idC}', [comprobanteController::class, 'update'])->name('comprobante.update');
    Route::delete('/comprobante/{idC}', [comprobanteController::class, 'destroy'])->name('comprobante.destroy');

    // CRUD Historial
    Route::get('/historial', [historialController::class, 'index'])->name('historial.index');
    Route::post('/historial', [historialController::class, 'store'])->name('historial.store');
    Route::get('/historial/{idH}/edit', [historialController::class, 'edit'])->name('historial.edit');
    Route::put('/historial/{idH}', [historialController::class, 'update'])->name('historial.update');
    Route::delete('/historial/{idH}', [historialController::class, 'destroy'])->name('historial.destroy');

});
