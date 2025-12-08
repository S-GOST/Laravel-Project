<?php

use Illuminate\Support\Facades\Route;

// =======================================
// CONTROLADORES
// =======================================
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\motosController;
use App\Http\Controllers\serviciosController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\orden_servicioController;
use App\Http\Controllers\detalles_orden_servicioController;
use App\Http\Controllers\informeController;
use App\Http\Controllers\comprobanteController;
use App\Http\Controllers\historialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\TecnicoAuthController;
use App\Http\Controllers\Auth\ClienteAuthController;


// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', fn() => view('index'))->name('index');
Route::get('/home', fn() => view('index'))->name('home');

Route::get('/carrito', fn() => view('carrito'))->name('carrito');
Route::get('/checkout', fn() => view('checkout'))->name('checkout');


// =======================================
// CHECKOUT – DATOS DEL CLIENTE (MEJORADO)
// =======================================
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/confirmacion', fn() => view('confirmacion'))
    ->name('confirmacion');


// =======================================
// AUTENTICACIÓN — ADMIN
// =======================================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/registro', [AdminAuthController::class, 'showRegisterForm'])->name('admin.registro');
    Route::post('/registro', [AdminAuthController::class, 'registro'])->name('admin.registro.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});



// =======================================
// AUTENTICACIÓN — TÉCNICO
// =======================================
Route::prefix('tecnico')->group(function () {
    Route::get('/login', [TecnicoAuthController::class, 'showLoginForm'])->name('tecnico.login');
    Route::post('/login', [TecnicoAuthController::class, 'login'])->name('tecnico.login.post');
    Route::post('/logout', [TecnicoAuthController::class, 'logout'])->name('tecnico.logout');
});



// =======================================
// AUTENTICACIÓN — CLIENTE
// ======================================= 
Route::prefix('cliente')->group(function () {
    Route::get('/login', [ClienteAuthController::class, 'showLoginForm'])->name('cliente.login');
    Route::post('/login', [ClienteAuthController::class, 'login'])->name('cliente.login.post');

    Route::get('/registro', [ClienteAuthController::class, 'showRegistroForm'])->name('cliente.registro');
    Route::post('/registro', [ClienteAuthController::class, 'register'])->name('cliente.registro.post');

    Route::get('/recuperar-contrasena', [ClienteAuthController::class, 'showPasswordRequestForm'])->name('cliente.password.request');
    Route::post('/recuperar-contrasena', [ClienteAuthController::class, 'sendPasswordResetEmail'])->name('cliente.password.email');

    Route::post('/logout', [ClienteAuthController::class, 'logout'])->name('cliente.logout');
});



// =======================================
// ÁREA ADMIN — PROTEGIDA CON auth:admin
// =======================================
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', fn() => view('administradores.dashboard'))->name('admin.dashboard');
    Route::get('/panel', fn() => view('layouts.Panel'))->name('panel');

    // CRUD Administradores
    Route::resource('administradores', AdministradoresController::class)
        ->parameters(['administradores' => 'idA']);
});



// =======================================
// ÁREA TÉCNICO — PROTEGIDA CON auth:tecnico
// =======================================
Route::prefix('tecnico')->middleware('auth:tecnico')->group(function () {
    Route::get('/dashboard', fn() => view('tecnicos.dashboard'))->name('tecnico.dashboard');
    
    // PERFIL
    Route::resource('tecnicos', TecnicosController::class)
        ->parameters(['tecnicos' => 'idT']);
});



    // =======================================
    // ÁREA CLIENTE — PROTEGIDA CON auth:cliente
    // =======================================
    Route::prefix('cliente')->middleware('auth:cliente')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');

    // PERFIL
    Route::get('/perfil', [ClienteController::class, 'perfil'])->name('cliente.perfil');
    Route::post('/perfil/actualizar', [ClienteController::class, 'actualizarPerfil'])->name('cliente.perfil.actualizar');

    // Gestión de órdenes
    Route::get('/orden/nueva', [ClienteController::class, 'nuevaOrden'])->name('cliente.orden.nueva');
    Route::post('/orden/crear', [ClienteController::class, 'crearOrden'])->name('orden.crear');
    Route::get('/orden/estado', [ClienteController::class, 'estadoOrden'])->name('cliente.orden.estado');
    Route::get('/orden/detalle/{id}', [ClienteController::class, 'detalleOrden'])->name('orden.detalle');
    
    // Informes y avances - CORREGIDO
    Route::get('/informes', [ClienteController::class, 'informes'])->name('cliente.informes');
    Route::get('/informe/{id}', [ClienteController::class, 'verInforme'])->name('informe.ver');
    
    // Historial de servicios
    Route::get('/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
    
    // Gestión de citas
    Route::get('/citas', [ClienteController::class, 'citas'])->name('cliente.citas');
    Route::post('/citas/agendar', [ClienteController::class, 'agendarCita'])->name('citas.agendar');
    
    // Productos del cliente
    Route::get('/productos', [ClienteController::class, 'productos'])->name('cliente.productos');
    
    // Servicios del cliente - CORREGIDO
    Route::get('/servicios', [ClienteController::class, 'servicios'])->name('cliente.servicios');
    
    // Cerrar sesión
    Route::post('/logout', [ClienteController::class, 'logout'])->name('cliente.logout');

    // CRUD CLIENTE
    Route::resource('clientes', ClienteController::class)
        ->parameters(['clientes' => 'id']);

    // Ver motos del cliente
    Route::get('/clientes/{id}/motos', [ClienteController::class, 'verMotosCliente'])->name('vermotosCliente');
});



// =======================================
// CRUD GENERALES (ACCESO PÚBLICO O PROTEGIDO SI LO DEFINES)
// =======================================

// MOTOS
Route::resource('motos', motosController::class)->parameters(['motos' => 'idM']);

// SERVICIOS
Route::resource('servicios', serviciosController::class)->parameters(['servicios' => 'idS']);

// PRODUCTOS
Route::resource('productos', productosController::class)->parameters(['productos' => 'idP']);

// ORDEN SERVICIO
Route::resource('orden_servicio', orden_servicioController::class)->parameters(['orden_servicio' => 'idO']);

// DETALLES ORDEN
Route::resource('detalles_orden_servicio', detalles_orden_servicioController::class)->parameters(['detalles_orden_servicio' => 'idDOS']);

// INFORME
Route::resource('informe', informeController::class)->parameters(['informe' => 'idI']);

// COMPROBANTE
Route::resource('comprobante', comprobanteController::class)->parameters(['comprobante' => 'idC']);

// HISTORIAL
Route::resource('historial', historialController::class)->parameters(['historial' => 'idH']);