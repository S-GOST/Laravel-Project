<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Productos - KTM Rocket Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos generales (similares a las otras vistas) */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-brand img {
            height: 40px;
        }
        
        .sidebar {
            background-color: #ffffff;
            min-height: calc(100vh - 56px);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px 0;
        }
        
        .main-content {
            padding: 30px;
            min-height: calc(100vh - 56px);
        }
        
        .user-info {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        
        .user-name {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 10px;
        }
        
        .user-email {
            color: #666;
            font-size: 0.9rem;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .nav-menu li {
            margin: 5px 0;
        }
        
        .nav-menu a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        
        .nav-menu a:hover {
            background-color: #f8f9fa;
            border-left-color: #ff6600;
            color: #ff6600;
        }
        
        .nav-menu a.active {
            background-color: #f8f9fa;
            border-left-color: #ff6600;
            color: #ff6600;
        }
        
        .nav-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .card-title {
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            font-size: 1.5rem;
        }
        
        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
        }
        
        .btn-primary:hover {
            background-color: #e55a00;
            border-color: #e55a00;
        }
        
        .btn-outline-primary {
            color: #ff6600;
            border-color: #ff6600;
        }
        
        .btn-outline-primary:hover {
            background-color: #ff6600;
            border-color: #ff6600;
        }
        
        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }
        
        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .product-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }
        
        .product-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        .product-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-shipped {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .product-details {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .detail-item {
            display: flex;
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: 600;
            min-width: 150px;
            color: #555;
        }
        
        .detail-value {
            color: #333;
        }
        
        .filter-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .filter-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .btn-filter {
            margin-right: 10px;
            margin-bottom: 10px;
        }
        
        .no-products {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .no-products i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ccc;
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .product-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .product-header .product-status {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('cliente.dashboard') }}">
                <img src="{{ asset('img/rock.png') }}" alt="KTM Logo">
                <span class="ms-2">KTM Rocket Service</span>
            </a>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
                       id="userDropdown" data-bs-toggle="dropdown">
                        <div class="me-3">
                            <div class="fw-bold">{{ $cliente->nombre ?? 'Nombre de Cliente' }}</div>
                            <div class="small">Cliente</div>
                        </div>
                        <i class="fas fa-user-circle fa-2x"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('cliente.perfil') }}"><i class="fas fa-user me-2"></i> Mi Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('cliente.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4">
                <div class="sidebar">
                    <div class="user-info">
                        <i class="fas fa-user-circle fa-4x text-muted"></i>
                        <div class="user-name">{{ $cliente->nombre ?? 'Nombre de Cliente' }}</div>
                        <div class="user-email">{{ $cliente->email ?? 'cliente@ejemplo.com' }}</div>
                        <div class="mt-2">
                            <span class="badge bg-success">Cliente Activo</span>
                        </div>
                    </div>
                    
                    <ul class="nav-menu mt-4">
                        <li>
                            <a href="{{ route('cliente.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.orden.nueva') }}">
                                <i class="fas fa-plus-circle"></i> Crear nuevo orden de servicio
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.orden.estado') }}">
                                <i class="fas fa-clipboard-check"></i> Ver estado de la orden
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.informes') }}">
                                <i class="fas fa-chart-line"></i> Avances de Informes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.historial') }}">
                                <i class="fas fa-history"></i> Historial servicios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.citas') }}">
                                <i class="fas fa-calendar-alt"></i> Agendar cita
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.productos') }}" class="active">
                                <i class="fas fa-box"></i> Mis productos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.servicios') }}">
                                <i class="fas fa-tools"></i> Mis servicios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.perfil') }}">
                                <i class="fas fa-user"></i> Mi Perfil
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-8">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Mis Productos</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Filtros -->
                    <div class="filter-section">
                        <div class="filter-title">Filtrar por Estado:</div>
                        <div class="d-flex flex-wrap">
                            <button class="btn btn-outline-primary btn-filter active" data-filter="all">Todos</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="delivered">Entregados</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="shipped">Enviados</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="pending">Pendientes</button>
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">Productos Comprados</div>
                        
                        <p class="text-muted mb-4">
                            Aquí puedes ver todos los productos que has comprado en KTM Rocket Service, 
                            incluyendo repuestos, accesorios y equipamiento.
                        </p>
                        
                        <!-- Lista de Productos -->
                        <div id="products-container">
                            <!-- Producto 1 -->
                            <div class="product-item" data-status="delivered">
                                <div class="product-header">
                                    <div>
                                        <div class="product-title">Kit de Mantenimiento KTM 1290</div>
                                        <div class="product-date">Comprado: 10/05/2024 - Entregado: 12/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="product-status status-delivered">Entregado</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-image-placeholder bg-light d-flex align-items-center justify-content-center rounded" style="height: 150px;">
                                            <i class="fas fa-box-open fa-3x text-muted"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Descripción:</strong> Kit completo de mantenimiento para KTM 1290 Super Duke R, incluye aceite, filtros y juntas.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Motocicleta:</strong> KTM 1290 Super Duke R</p>
                                            </div>
                                        </div>
                                        
                                        <div class="product-details">
                                            <div class="detail-item">
                                                <div class="detail-label">Número de Pedido:</div>
                                                <div class="detail-value">#PED-2024-001</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Costo Total:</div>
                                                <div class="detail-value">€120</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Método de Entrega:</div>
                                                <div class="detail-value">Entrega a domicilio</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Garantía:</div>
                                                <div class="detail-value">6 meses</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-outline-success me-2">
                                        <i class="fas fa-download me-2"></i> Descargar Factura
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-redo me-2"></i> Comprar de Nuevo
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Producto 2 -->
                            <div class="product-item" data-status="shipped">
                                <div class="product-header">
                                    <div>
                                        <div class="product-title">Sistema de Navegación Garmin Zumo XT</div>
                                        <div class="product-date">Comprado: 05/05/2024 - Enviado: 08/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="product-status status-shipped">Enviado</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-image-placeholder bg-light d-flex align-items-center justify-content-center rounded" style="height: 150px;">
                                            <i class="fas fa-map-marked-alt fa-3x text-muted"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Descripción:</strong> Navegador GPS resistente al agua diseñado específicamente para motocicletas con pantalla táctil de 5.5".</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Motocicleta:</strong> KTM 390 Duke</p>
                                            </div>
                                        </div>
                                        
                                        <div class="product-details">
                                            <div class="detail-item">
                                                <div class="detail-label">Número de Pedido:</div>
                                                <div class="detail-value">#PED-2024-002</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Costo Total:</div>
                                                <div class="detail-value">€350</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Número de Seguimiento:</div>
                                                <div class="detail-value">TRK-789654123</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Empresa de Transporte:</div>
                                                <div class="detail-value">DHL Express</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-shipping-fast me-2"></i> Rastrear Pedido
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-headset me-2"></i> Contactar Soporte
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Producto 3 -->
                            <div class="product-item" data-status="pending">
                                <div class="product-header">
                                    <div>
                                        <div class="product-title">Equipamiento de Seguridad: Chaqueta + Guantes</div>
                                        <div class="col-md-3">
                                        <div class="product-image-placeholder bg-light d-flex align-items-center justify-content-center rounded" style="height: 150px;">
                                            <i class="fas fa-tshirt fa-3x text-muted"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Descripción:</strong> Chaqueta de cuero con protecciones y guantes de invierno resistentes al agua.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Talla:</strong> Chaqueta: L, Guantes: M</p>
                                            </div>
                                        </div>
                                        
                                        <div class="product-details">
                                            <div class="detail-item">
                                                <div class="detail-label">Número de Pedido:</div>
                                                <div class="detail-value">#PED-2024-003</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Costo Total:</div>
                                                <div class="detail-value">€280</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Estado del Pago:</div>
                                                <div class="detail-value">Confirmado</div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="detail-label">Tiempo Estimado:</div>
                                                <div class="detail-value">7-10 días hábiles</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-edit me-2"></i> Modificar Pedido
                                    </a>
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-times me-2"></i> Cancelar Pedido
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tienda Online -->
                    <div class="dashboard-card">
                        <div class="card-title">Tienda Online - Productos Recomendados</div>
                        
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fas fa-oil-can fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">Aceite Motul 7100</h5>
                                        <p class="card-text small">Aceite sintético 10W-50 para altas prestaciones.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€25</span>
                                            <span class="text-muted"> / litro</span>
                                        </div>
                                        <button class="btn btn-outline-primary w-100">Añadir al Carrito</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fas fa-tint fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">Líquido de Frenos</h5>
                                        <p class="card-text small">Líquido de frenos DOT 4 de alta temperatura.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€15</span>
                                            <span class="text-muted"> / 500ml</span>
                                        </div>
                                        <button class="btn btn-outline-primary w-100">Añadir al Carrito</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fas fa-filter fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">Filtro de Aire K&N</h5>
                                        <p class="card-text small">Filtro de aire de alto flujo, lavable y reutilizable.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€45</span>
                                        </div>
                                        <button class="btn btn-outline-primary w-100">Añadir al Carrito</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fas fa-bolt fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">Batería Yuasa</h5>
                                        <p class="card-text small">Batería de gel de 12V, mantenimiento libre.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€85</span>
                                        </div>
                                        <button class="btn btn-outline-primary w-100">Añadir al Carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-store me-2"></i> Visitar Tienda Completa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">KTM Rocket Service © 2024 - Todos los derechos reservados</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Sistema de Gestión de Clientes - Versión 1.0</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Activar el elemento del menú actual
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.nav-menu a');
            
            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
            
            // Filtrado de productos
            const filterButtons = document.querySelectorAll('.btn-filter');
            const productItems = document.querySelectorAll('.product-item');
            const noProductsMessage = document.getElementById('no-products-message');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    let visibleCount = 0;
                    
                    // Filtrar productos
                    productItems.forEach(item => {
                        const status = item.getAttribute('data-status');
                        
                        if (filter === 'all' || status === filter) {
                            item.style.display = 'block';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Mostrar/ocultar mensaje de no hay productos
                    if (visibleCount === 0) {
                        noProductsMessage.classList.remove('d-none');
                    } else {
                        noProductsMessage.classList.add('d-none');
                    }
                });
            });
        });
    </script>
</body>
</html>