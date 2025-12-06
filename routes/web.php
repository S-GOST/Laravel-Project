    <?php

    use Illuminate\Support\Facades\Route;

    // =======================================
    // IMPORTAR CONTROLADORES
    // =======================================
    use App\Http\Controllers\AdministradoresController;
    use App\Http\Controllers\TecnicosController;
    use App\Http\Controllers\clientesController;
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

    // Controladores de Autenticación
    use App\Http\Controllers\Auth\AdminAuthController;
    use App\Http\Controllers\Auth\TecnicoAuthController;
    // routes/web.php



    // Ruta para ver el carrito
    Route::get('/carrito', [CartController::class, 'show'])->name('carrito.show');

    // Ruta para agregar al carrito
    Route::post('/carrito/agregar', [CartController::class, 'add'])->name('carrito.add');

    // Ruta para quitar del carrito
    Route::delete('/carrito/remover/{id}', [CartController::class, 'remove'])->name('carrito.remove');

    // Ruta para actualizar cantidad
    Route::put('/carrito/actualizar/{id}', [CartController::class, 'update'])->name('carrito.update');

    // Ruta para el checkout (formulario de datos)
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    // Ruta para procesar checkout
    Route::post('/checkout/procesar', [CheckoutController::class, 'store'])->name('checkout.store');
    // =======================================
    // RUTA PRINCIPAL
    // =======================================
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('/carrito', function () {
        return view('carrito');
    })->name('carrito');

    Route::get('/home', function () {
        return view('index');
    })->name('home');

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    // Recibir los datos del cliente
    Route::post('/checkout', function (Illuminate\Http\Request $request) {

    $request->validate([
        'nombre' => 'required|string',
        'documento' => 'required|string',
        'telefono' => 'required|string',
        'direccion' => 'required|string',
    ]);

    session([
        'cliente' => [
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]
    ]);

    return redirect()->route('confirmacion');
    })->name('checkout.store');

    Route::get('/confirmacion', function () {
        return view('confirmacion');
    })->name('confirmacion');
    // =======================================
    // SOLUCIÓN AL ERROR "Route [login] not defined"
    // =======================================
    Route::get('/login', function () {
        return redirect()->route('admin.login');
    })->name('login');

// =======================================
// AUTENTICACIÓN ADMINISTRADOR
// =======================================
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/admin/registro', [AdminAuthController::class, 'showRegisterForm'])->name('admin.registro');
    Route::post('/admin/registro', [AdminAuthController::class, 'registro'])->name('admin.registro.post');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// =======================================
// AUTENTICACIÓN TÉCNICO
// =======================================
    Route::get('/tecnico/login', [TecnicoAuthController::class, 'showLoginForm'])->name('tecnico.login');
    Route::post('/tecnico/login', [TecnicoAuthController::class, 'login'])->name('tecnico.login.post');
    Route::get('/tecnico/logout', [TecnicoAuthController::class, 'logout'])->name('tecnico.logout');
    Route::post('/tecnico/logout', [TecnicoAuthController::class, 'logout'])->name('tecnico.logout');

// =======================================
// ÁREA DE ADMINISTRADOR
// =======================================
    Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // DASHBOARD ADMIN
    Route::get('/dashboard', fn() => view('administradores.dashboard'))->name('admin.dashboard');

    Route::get('/panel', fn() => view('layouts.Panel'))->name('panel');

    // CRUD ADMINISTRADORES
    Route::get('/administradores', [AdministradoresController::class, 'index'])->name('administradores.index');
    Route::post('/administradores', [AdministradoresController::class, 'store'])->name('administradores.store');
    Route::get('/administradores/{idA}/edit', [AdministradoresController::class, 'edit'])->name('administradores.edit');
    Route::put('/administradores/{idA}', [AdministradoresController::class, 'update'])->name('administradores.update');
    Route::delete('/administradores/{idA}', [AdministradoresController::class, 'destroy'])->name('administradores.destroy');
});

// =======================================
// ÁREA DE TÉCNICO (prefijo técnico con panel incluido)
// =======================================
Route::prefix('tecnico')->middleware('auth:tecnico')->group(function () {

      Route::get('/dashboard', fn() => view('tecnicos.dashboard'))->name('tecnico.dashboard');

    // ✅ Muestra la entidad Técnicos en el mismo panel
    Route::get('/tecnicos', [TecnicosController::class, 'index'])->name('tecnicos.index');
    Route::post('/tecnicos', [TecnicosController::class, 'store'])->name('tecnicos.store');
    Route::get('/tecnicos/{idT}/edit', [TecnicosController::class, 'edit'])->name('tecnicos.edit');
    Route::put('/tecnicos/{idT}', [TecnicosController::class, 'update'])->name('tecnicos.update');
    Route::delete('/tecnicos/{idT}', [TecnicosController::class, 'destroy'])->name('tecnicos.destroy');
});
    // CRUD CLIENTES
    Route::get('/clientes', [clientesController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [clientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit', [clientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [clientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}', [clientesController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/clientes/{id}/motos', [clientesController::class, 'verMotosCliente'])->name('vermotosCliente');

    // CRUD MOTOS
    Route::get('/motos', [motosController::class, 'index'])->name('motos.index');
    Route::post('/motos', [motosController::class, 'store'])->name('motos.store');
    Route::get('/motos/{idM}/edit', [motosController::class, 'edit'])->name('motos.edit');
    Route::put('/motos/{idM}', [motosController::class, 'update'])->name('motos.update');
    Route::delete('/motos/{idM}', [motosController::class, 'destroy'])->name('motos.destroy');

    // CRUD SERVICIOS
    Route::get('/servicios', [serviciosController::class, 'index'])->name('servicios.index');
    Route::post('/servicios', [serviciosController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{idS}/edit', [serviciosController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{idS}', [serviciosController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{idS}', [serviciosController::class, 'destroy'])->name('servicios.destroy');

    // CRUD PRODUCTOS
    Route::get('/productos', [productosController::class, 'index'])->name('productos.index');
    Route::post('/productos', [productosController::class, 'store'])->name('productos.store');
    Route::get('/productos/{idP}/edit', [productosController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{idP}', [productosController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{idP}', [productosController::class, 'destroy'])->name('productos.destroy');

    // CRUD ORDEN SERVICIO
    Route::get('/orden_servicio', [orden_servicioController::class, 'index'])->name('orden_servicio.index');
    Route::post('/orden_servicio', [orden_servicioController::class, 'store'])->name('orden_servicio.store');
    Route::get('/orden_servicio/{idO}/edit', [orden_servicioController::class, 'edit'])->name('orden_servicio.edit');
    Route::put('/orden_servicio/{idO}', [orden_servicioController::class, 'update'])->name('orden_servicio.update');
    Route::delete('/orden_servicio/{idO}', [orden_servicioController::class, 'destroy'])->name('orden_servicio.destroy');

    // CRUD DETALLES ORDEN
    Route::get('/detalles_orden_servicio', [detalles_orden_servicioController::class, 'index'])->name('detalles_orden_servicio.index');
    Route::post('/detalles_orden_servicio', [detalles_orden_servicioController::class, 'store'])->name('detalles_orden_servicio.store');
    Route::get('/detalles_orden_servicio/{id}/edit', [detalles_orden_servicioController::class, 'edit'])->name('detalles_orden_servicio.edit');
    Route::put('/detalles_orden_servicio/{idDOS}', [detalles_orden_servicioController::class, 'update'])->name('detalles_orden_servicio.update');
    Route::delete('/detalles_orden_servicio/{idDOS}', [detalles_orden_servicioController::class, 'destroy'])->name('detalles_orden_servicio.destroy');

    // CRUD INFORME
    Route::get('/informe', [informeController::class, 'index'])->name('informe.index');
    Route::post('/informe', [informeController::class, 'store'])->name('informe.store');
    Route::get('/informe/{id}/edit', [informeController::class, 'edit'])->name('informe.edit');
    Route::put('/informe/{idI}', [informeController::class, 'update'])->name('informe.update');
    Route::delete('/informe/{idI}', [informeController::class, 'destroy'])->name('informe.destroy');

    // CRUD COMPROBANTE
    Route::get('/comprobante', [comprobanteController::class, 'index'])->name('comprobante.index');
    Route::post('/comprobante', [comprobanteController::class, 'store'])->name('comprobante.store');
    Route::get('/comprobante/{idC}/edit', [comprobanteController::class, 'edit'])->name('comprobante.edit');
    Route::put('/comprobante/{idC}', [comprobanteController::class, 'update'])->name('comprobante.update');
    Route::delete('/comprobante/{idC}', [comprobanteController::class, 'destroy'])->name('comprobante.destroy');

    // CRUD HISTORIAL
    Route::get('/historial', [historialController::class, 'index'])->name('historial.index');
    Route::post('/historial', [historialController::class, 'store'])->name('historial.store');
    Route::get('/historial/{idH}/edit', [historialController::class, 'edit'])->name('historial.edit');
    Route::put('/historial/{idH}', [historialController::class, 'update'])->name('historial.update');
    Route::delete('/historial/{idH}', [historialController::class, 'destroy'])->name('historial.destroy');