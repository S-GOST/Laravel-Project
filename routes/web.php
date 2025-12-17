<?php

use Illuminate\Support\Facades\Route;

// =======================================
// CONTROLADORES
// =======================================
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MotosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\OrdenServicioController;
use App\Http\Controllers\DetallesOrdenServicioController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\HistorialController;
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
// RUTA PARA EL ERROR DE "LOGIN" 
// =======================================
Route::get('/login', function() {
    return redirect()->route('cliente.login');
})->name('login');

// =======================================
// CHECKOUT – DATOS DEL CLIENTE 
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
// ÁREA ADMIN — PROTEGIDA CON auth:admin
// =======================================
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/panel', fn() => view('layouts.panel'))->name('panel');

    // CORRECCIÓN: Agregar la ruta del dashboard del admin
    Route::get('/dashboard', fn() => view('Administradores.administradores'))->name('admin.dashboard');

    // CRUD Administradores
    Route::resource('administradores', AdministradoresController::class)
        ->parameters(['administradores' => 'idA']);

    // CRUD TÉCNICOS COMPLETO (ÁREA ADMIN)
    Route::prefix('tecnicos')->name('admin.tecnicos.')->group(function () {
        Route::get('/', [TecnicosController::class, 'index'])->name('index');
        Route::get('/crear', [TecnicosController::class, 'create'])->name('create');
        Route::post('/', [TecnicosController::class, 'store'])->name('store');
        Route::get('/{idT}', [TecnicosController::class, 'show'])->name('show');
        Route::get('/{idT}/editar', [TecnicosController::class, 'edit'])->name('edit');
        Route::put('/{idT}', [TecnicosController::class, 'update'])->name('update');
        Route::delete('/{idT}', [TecnicosController::class, 'destroy'])->name('destroy');
    });

    // CRUD CLIENTES COMPLETO (SOLO PARA ADMIN)
    Route::prefix('clientes')->name('admin.clientes.')->group(function () {
        Route::get('/', [ClienteController::class, 'index'])->name('index');
        Route::get('/crear', [ClienteController::class, 'create'])->name('create');
        Route::post('/', [ClienteController::class, 'store'])->name('store');
        Route::get('/{id}', [ClienteController::class, 'show'])->name('show');
        Route::get('/{id}/editar', [ClienteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ClienteController::class, 'update'])->name('update');
        Route::delete('/{id}', [ClienteController::class, 'destroy'])->name('destroy');
        
        // Ruta para ver motos del cliente (específica para admin)
        Route::get('/{id}/motos', [ClienteController::class, 'verMotosCliente'])->name('motos');
    });
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
// ÁREA TÉCNICO — PROTEGIDA CON auth:tecnico
// =======================================
Route::prefix('tecnico')->middleware('auth:tecnico')->group(function () {
    Route::get('/dashboard', fn() => view('Administradores.Tecnicos.dashboard'))->name('Administradores.Tecnicos.dashboard');
    
    Route::get('/perfil', [TecnicosController::class, 'perfil'])->name('tecnico.perfil');
    Route::put('/perfil/actualizar', [TecnicosController::class, 'actualizarPerfil'])->name('tecnico.perfil.actualizar');
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
    
    // Informes y avances
    Route::get('/informes', [ClienteController::class, 'informes'])->name('cliente.informes');
    Route::get('/informe/{id}', [ClienteController::class, 'verInforme'])->name('informe.ver');
    
    // Historial de servicios
    Route::get('/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
    
    // Gestión de citas
    Route::get('/citas', [ClienteController::class, 'citas'])->name('cliente.citas');
    Route::post('/citas/agendar', [ClienteController::class, 'agendarCita'])->name('citas.agendar');
    
    // Productos del cliente
    Route::get('/productos', [ClienteController::class, 'productos'])->name('cliente.productos');
    
    // Servicios del cliente
    Route::get('/servicios', [ClienteController::class, 'servicios'])->name('cliente.servicios');
    
    // Ver motos del cliente autenticado
    Route::get('/mis-motos', [ClienteController::class, 'verMisMotos'])->name('cliente.mis.motos');
});

// =======================================
// CRUD GENERALES (ACCESO PÚBLICO O PROTEGIDO SI LO DEFINES)
// =======================================

// MOTOS
Route::resource('motos', MotosController::class)->parameters(['motos' => 'idM']);

// SERVICIOS
Route::resource('servicios', ServiciosController::class)->parameters(['servicios' => 'idS']);

// PRODUCTOS
Route::resource('productos', ProductosController::class)->parameters(['productos' => 'idP']);

// ORDEN SERVICIO
Route::resource('orden_servicio', orden_servicioController::class)->parameters(['orden_servicio' => 'idO']);

// DETALLES ORDEN
Route::resource('detalles_orden_servicio', detalles_orden_servicioController::class)->parameters(['detalles_orden_servicio' => 'idDOS']);

// INFORME
Route::resource('informe', InformeController::class)->parameters(['informe' => 'idI']);

// COMPROBANTE
Route::resource('comprobante', ComprobanteController::class)->parameters(['comprobante' => 'idC']);

// HISTORIAL
Route::resource('historial', HistorialController::class)->parameters(['historial' => 'idH']);