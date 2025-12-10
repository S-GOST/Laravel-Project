<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Servicios</title>
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
        
        .service-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }
        
        .service-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .service-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }
        
        .service-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        .service-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-completed {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .service-details {
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
        
        .no-services {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .no-services i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ccc;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .service-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .service-header .service-status {
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
                <span class="ms-2">ROCKECT SERVICE</span>
            </a>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
                       id="userDropdown" data-bs-toggle="dropdown">
                        <div class="me-3">
                            <strong>{{ Auth::user()->Nombre ?? Auth::guard('admin')->user()->Nombre ?? 'Usuario' }}</strong>
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

                    @php
                        $clienteAuth = Auth::guard('cliente')->user();
                    @endphp

                    <div class="user-name">{{ $clienteAuth->Nombre ?? 'Nombre de Cliente' }}</div>
                    <div class="user-email">{{ $clienteAuth->Correo ?? 'cliente@ejemplo.com' }}</div>

                    <div class="mt-2">
                        <span class="status-badge status-active">Cliente Activo</span>
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
                            <a href="{{ route('cliente.productos') }}">
                                <i class="fas fa-box"></i> Mis productos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.servicios') }}" class="active">
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
                        <h2 class="mb-0">Mis Servicios</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Filtros -->
                    <div class="filter-section">
                        <div class="filter-title">Filtrar por Estado:</div>
                        <div class="d-flex flex-wrap">
                            <button class="btn btn-outline-primary btn-filter active" data-filter="all">Todos</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="active">Activos</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="pending">Pendientes</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="completed">Completados</button>
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">Servicios Contratados</div>
                        
                        <p class="text-muted mb-4">
                            Aquí puedes ver todos los servicios que has contratado con KTM Rocket Service, 
                            incluyendo servicios activos, pendientes y completados.
                        </p>
                        
                        <!-- Lista de Servicios -->
                        <div id="services-container">
                            <!-- Servicio 1 -->
                            <div class="service-item" data-status="active">
                                <div class="service-header">
                                    <div>
                                        <div class="service-title">Plan de Mantenimiento Premium</div>
                                        <div class="service-date">Contratado: 15/03/2024 - Vence: 15/03/2025</div>
                                    </div>
                                    <div>
                                        <span class="service-status status-active">Activo</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Descripción:</strong> Plan de mantenimiento anual que incluye 4 revisiones completas, cambio de aceite y filtros, y diagnóstico general.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Motocicleta:</strong> KTM 1290 Super Duke R</p>
                                    </div>
                                </div>
                                
                                <div class="service-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Costo Total:</div>
                                        <div class="detail-value">€600 (€50/mes)</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Revisiones Restantes:</div>
                                        <div class="detail-value">3 de 4</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Próxima Revisión:</div>
                                        <div class="detail-value">15/06/2024</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Técnico Asignado:</div>
                                        <div class="detail-value">Juan Pérez</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-calendar me-2"></i> Agendar Revisión
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-file-invoice me-2"></i> Ver Detalles
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Servicio 2 -->
                            <div class="service-item" data-status="completed">
                                <div class="service-header">
                                    <div>
                                        <div class="service-title">Reparación de Motor Completa</div>
                                        <div class="service-date">Realizado: 05/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="service-status status-completed">Completado</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Descripción:</strong> Reparación completa del motor incluyendo sustitución de junta de culata, rectificación de válvulas y cambio de aceite.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Motocicleta:</strong> KTM 790 Adventure</p>
                                    </div>
                                </div>
                                
                                <div class="service-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Costo Total:</div>
                                        <div class="detail-value">€450</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Garantía:</div>
                                        <div class="detail-value">12 meses en reparación</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Técnico:</div>
                                        <div class="detail-value">Carlos Rodríguez</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Valoración:</div>
                                        <div class="detail-value">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            (5.0)
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-outline-success me-2">
                                        <i class="fas fa-download me-2"></i> Descargar Factura
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-history me-2"></i> Ver Historial
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Servicio 3 -->
                            <div class="service-item" data-status="pending">
                                <div class="service-header">
                                    <div>
                                        <div class="service-title">Instalación Sistema de Navegación</div>
                                        <div class="service-date">Programado: 30/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="service-status status-pending">Pendiente</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Descripción:</strong> Instalación de sistema de navegación GPS Garmin Zumo XT con integración completa en el sistema eléctrico de la motocicleta.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Motocicleta:</strong> KTM 390 Duke</p>
                                    </div>
                                </div>
                                
                                <div class="service-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Costo Estimado:</div>
                                        <div class="detail-value">€350 (incluye dispositivo e instalación)</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Duración Estimada:</div>
                                        <div class="detail-value">3-4 horas</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Técnico Asignado:</div>
                                        <div class="detail-value">María López</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Estado:</div>
                                        <div class="detail-value">Esperando confirmación de disponibilidad de repuesto</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-phone me-2"></i> Contactar Técnico
                                    </a>
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-times me-2"></i> Cancelar Servicio
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Si no hay servicios -->
                            <div class="no-services d-none" id="no-services-message">
                                <i class="fas fa-tools"></i>
                                <h4>No hay servicios disponibles</h4>
                                <p>No se encontraron servicios con el filtro seleccionado.</p>
                                <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus-circle me-2"></i> Contratar Nuevo Servicio
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Servicios Adicionales Disponibles -->
                    <div class="dashboard-card">
                        <div class="card-title">Servicios Adicionales Disponibles</div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body">
                                        <h5 class="card-title">Lavado y Detallado Premium</h5>
                                        <p class="card-text">Lavado completo, descontaminación de pintura, pulido y encerado para dejar tu moto como nueva.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€80</span>
                                            <span class="text-muted"> / servicio</span>
                                        </div>
                                        <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-outline-primary w-100">Contratar</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body">
                                        <h5 class="card-title">Almacenamiento Invernal</h5>
                                        <p class="card-text">Preparación para almacenamiento invernal incluyendo estabilización de combustible, mantenimiento de batería y más.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€120</span>
                                            <span class="text-muted"> / temporada</span>
                                        </div>
                                        <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-outline-primary w-100">Contratar</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border">
                                    <div class="card-body">
                                        <h5 class="card-title">Curso de Conducción Segura</h5>
                                        <p class="card-text">Curso práctico de 4 horas para mejorar tus habilidades de conducción y seguridad en carretera.</p>
                                        <div class="mb-3">
                                            <span class="fw-bold text-primary">€150</span>
                                            <span class="text-muted"> / persona</span>
                                        </div>
                                        <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-outline-primary w-100">Contratar</a>
                                    </div>
                                </div>
                            </div>
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
            
            // Filtrado de servicios
            const filterButtons = document.querySelectorAll('.btn-filter');
            const serviceItems = document.querySelectorAll('.service-item');
            const noServicesMessage = document.getElementById('no-services-message');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    let visibleCount = 0;
                    
                    // Filtrar servicios
                    serviceItems.forEach(item => {
                        const status = item.getAttribute('data-status');
                        
                        if (filter === 'all' || status === filter) {
                            item.style.display = 'block';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Mostrar/ocultar mensaje de no hay servicios
                    if (visibleCount === 0) {
                        noServicesMessage.classList.remove('d-none');
                    } else {
                        noServicesMessage.classList.add('d-none');
                    }
                });
            });
        });
    </script>
</body>
</html>