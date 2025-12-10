<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
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
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-completado {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-cancelado {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .status-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-en-proceso {
            background-color: #cce5ff;
            color: #004085;
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
        
        .total-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            flex: 1;
            margin: 0 10px 10px 0;
            min-width: 150px;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6600;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }
        
        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
        }
        
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 10px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .total-stats {
                flex-direction: column;
            }
            
            .stat-item {
                margin: 0 0 10px 0;
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
                            <a href="{{ route('cliente.historial') }}" class="active">
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
                        <h2 class="mb-0">Historial de Servicios</h2>
                        <div>
                            <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary me-2">
                                <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                            </a>
                            <button class="btn btn-primary" id="exportBtn">
                                <i class="fas fa-download me-2"></i> Exportar Historial
                            </button>
                        </div>
                    </div>
                    
                    <!-- Estadísticas -->
                    <div class="total-stats">
                        <div class="stat-item">
                            <div class="stat-value">24</div>
                            <div class="stat-label">Total Servicios</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">€4,850</div>
                            <div class="stat-label">Total Invertido</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.8</div>
                            <div class="stat-label">Valoración Promedio</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">12</div>
                            <div class="stat-label">Meses como Cliente</div>
                        </div>
                    </div>
                    
                    <!-- Filtros -->
                    <div class="filter-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="filter-title">Filtrar por Estado:</div>
                                <div class="d-flex flex-wrap">
                                    <button class="btn btn-outline-primary btn-filter active" data-filter="all">Todos</button>
                                    <button class="btn btn-outline-primary btn-filter" data-filter="completado">Completados</button>
                                    <button class="btn btn-outline-primary btn-filter" data-filter="en-proceso">En Proceso</button>
                                    <button class="btn btn-outline-primary btn-filter" data-filter="cancelado">Cancelados</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="filter-title">Filtrar por Año:</div>
                                <div class="d-flex flex-wrap">
                                    <button class="btn btn-outline-primary btn-filter" data-year="all">Todos</button>
                                    <button class="btn btn-outline-primary btn-filter" data-year="2024">2024</button>
                                    <button class="btn btn-outline-primary btn-filter" data-year="2023">2023</button>
                                    <button class="btn btn-outline-primary btn-filter" data-year="2022">2022</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabla de Historial -->
                    <div class="dashboard-card">
                        <div class="card-title">Todos mis Servicios</div>
                        
                        <div class="table-responsive">
                            <table id="historialTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>N° Orden</th>
                                        <th>Servicio</th>
                                        <th>Fecha</th>
                                        <th>Vehículo</th>
                                        <th>Técnico</th>
                                        <th>Estado</th>
                                        <th>Coste</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Servicio 1 -->
                                    <tr data-status="completado" data-year="2024">
                                        <td>#OS-2024-001</td>
                                        <td>Mantenimiento Preventivo</td>
                                        <td>10/05/2024</td>
                                        <td>KTM 1290 Super Duke R</td>
                                        <td>Juan Pérez</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€120</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="1">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 2 -->
                                    <tr data-status="completado" data-year="2024">
                                        <td>#OS-2024-003</td>
                                        <td>Reparación de Motor</td>
                                        <td>05/05/2024</td>
                                        <td>KTM 790 Adventure</td>
                                        <td>Carlos Rodríguez</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€450</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="3">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 3 -->
                                    <tr data-status="en-proceso" data-year="2024">
                                        <td>#OS-2024-002</td>
                                        <td>Diagnóstico Eléctrico</td>
                                        <td>01/05/2024</td>
                                        <td>KTM 1290 Super Duke R</td>
                                        <td>María López</td>
                                        <td><span class="status-badge status-en-proceso">En Proceso</span></td>
                                        <td>€80</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="2">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 4 -->
                                    <tr data-status="completado" data-year="2024">
                                        <td>#OS-2024-004</td>
                                        <td>Cambio de Neumáticos</td>
                                        <td>20/04/2024</td>
                                        <td>KTM 790 Adventure</td>
                                        <td>Pedro Gómez</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€320</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="4">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 5 -->
                                    <tr data-status="completado" data-year="2023">
                                        <td>#OS-2023-012</td>
                                        <td>Revisión General</td>
                                        <td>15/12/2023</td>
                                        <td>KTM 1290 Super Duke R</td>
                                        <td>Juan Pérez</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€180</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="12">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 6 -->
                                    <tr data-status="cancelado" data-year="2023">
                                        <td>#OS-2023-011</td>
                                        <td>Instalación Accesorios</td>
                                        <td>10/11/2023</td>
                                        <td>KTM 790 Adventure</td>
                                        <td>Ana Martínez</td>
                                        <td><span class="status-badge status-cancelado">Cancelado</span></td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="11">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 7 -->
                                    <tr data-status="completado" data-year="2023">
                                        <td>#OS-2023-010</td>
                                        <td>Limpieza y Lubricación</td>
                                        <td>25/10/2023</td>
                                        <td>KTM 1290 Super Duke R</td>
                                        <td>Carlos Rodríguez</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€95</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="10">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Servicio 8 -->
                                    <tr data-status="completado" data-year="2023">
                                        <td>#OS-2023-009</td>
                                        <td>Reparación de Frenos</td>
                                        <td>15/09/2023</td>
                                        <td>KTM 790 Adventure</td>
                                        <td>María López</td>
                                        <td><span class="status-badge status-completado">Completado</span></td>
                                        <td>€210</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary ver-detalle" data-id="9">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Resumen de Costes -->
                        <div class="mt-4 pt-3 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Resumen de Costes</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Servicios Completados (22):</span>
                                        <span class="fw-bold">€4,775</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Servicios en Proceso (1):</span>
                                        <span class="fw-bold">€80</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Servicios Cancelados (1):</span>
                                        <span class="fw-bold">€0</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 pt-2 border-top">
                                        <span class="fw-bold">Total Invertido:</span>
                                        <span class="fw-bold text-primary">€4,855</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Servicios Más Frecuentes</h5>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span>Mantenimiento Preventivo</span>
                                            <span class="fw-bold">8 veces</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span>Cambio de Neumáticos</span>
                                            <span class="fw-bold">4 veces</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" style="width: 40%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span>Reparación de Motor</span>
                                            <span class="fw-bold">3 veces</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal para Ver Detalles -->
                    <div class="modal fade" id="detalleModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detalles del Servicio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="detalleContenido">
                                        <!-- Contenido dinámico se cargará aquí -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="descargarComprobante">
                                        <i class="fas fa-download me-2"></i> Descargar Comprobante
                                    </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar DataTable
            const table = $('#historialTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                },
                pageLength: 10,
                order: [[2, 'desc']] // Ordenar por fecha descendente
            });
            
            // Activar el elemento del menú actual
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.nav-menu a');
            
            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
            
            // Filtrado por estado
            const filterButtons = document.querySelectorAll('.btn-filter[data-filter]');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones de estado
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    
                    if (filter === 'all') {
                        table.columns().search('').draw();
                    } else {
                        // Filtrar por estado en la columna 5 (índice 4)
                        table.column(5).search(filter).draw();
                    }
                });
            });
            
            // Filtrado por año
            const yearButtons = document.querySelectorAll('.btn-filter[data-year]');
            
            yearButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones de año
                    yearButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');
                    
                    const year = this.getAttribute('data-year');
                    
                    if (year === 'all') {
                        table.columns().search('').draw();
                    } else {
                        // Filtrar por año en la columna de fecha (índice 2)
                        table.column(2).search(year).draw();
                    }
                });
            });
            
            // Manejar clic en botón "Ver Detalle"
            document.querySelectorAll('.ver-detalle').forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-id');
                    cargarDetalleServicio(serviceId);
                });
            });
            
            // Función para cargar detalles del servicio
            function cargarDetalleServicio(id) {
                // Datos de ejemplo - en producción vendría de una petición AJAX
                const servicios = {
                    1: {
                        titulo: "Orden #OS-2024-001 - Mantenimiento Preventivo",
                        fecha: "10/05/2024",
                        vehiculo: "KTM 1290 Super Duke R",
                        tecnico: "Juan Pérez",
                        estado: "Completado",
                        coste: "€120",
                        descripcion: "Mantenimiento preventivo completo que incluye cambio de aceite, filtros, revisión de frenos y ajuste de cadena.",
                        trabajos: [
                            "Cambio de aceite de motor",
                            "Sustitución del filtro de aceite",
                            "Revisión y ajuste de frenos",
                            "Ajuste y lubricación de cadena",
                            "Comprobación de niveles de fluidos"
                        ],
                        repuestos: [
                            "Aceite sintético 10W-50 (2 litros)",
                            "Filtro de aceite original KTM",
                            "Lubricante para cadena"
                        ],
                        garantia: "6 meses en mano de obra"
                    },
                    2: {
                        titulo: "Orden #OS-2024-002 - Diagnóstico Eléctrico",
                        fecha: "01/05/2024",
                        vehiculo: "KTM 1290 Super Duke R",
                        tecnico: "María López",
                        estado: "En Proceso",
                        coste: "€80",
                        descripcion: "Diagnóstico completo del sistema eléctrico para identificar problemas de arranque y luces intermitentes.",
                        trabajos: [
                            "Diagnóstico con escáner OBD",
                            "Comprobación del sistema de carga",
                            "Revisión de batería y alternador",
                            "Inspección de cableado principal"
                        ],
                        repuestos: [],
                        garantia: "No aplica - en diagnóstico"
                    }
                };
                
                const servicio = servicios[id] || servicios[1];
                
                // Construir contenido HTML
                const contenido = `
                    <h6>${servicio.titulo}</h6>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Fecha del Servicio:</strong><br>
                                ${servicio.fecha}
                            </div>
                            <div class="mb-3">
                                <strong>Vehículo:</strong><br>
                                ${servicio.vehiculo}
                            </div>
                            <div class="mb-3">
                                <strong>Técnico Asignado:</strong><br>
                                ${servicio.tecnico}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Estado:</strong><br>
                                <span class="status-badge status-${servicio.estado.toLowerCase().replace(' ', '-')}">${servicio.estado}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Coste del Servicio:</strong><br>
                                <span class="fw-bold text-primary">${servicio.coste}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Garantía:</strong><br>
                                ${servicio.garantia}
                            </div>
                        </div>
                    </div>
                    
                    <h6 class="mt-4">Descripción del Servicio</h6>
                    <p>${servicio.descripcion}</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Trabajos Realizados</h6>
                            <ul>
                                ${servicio.trabajos.map(trabajo => `<li>${trabajo}</li>`).join('')}
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Repuestos Utilizados</h6>
                            ${servicio.repuestos.length > 0 ? 
                                `<ul>${servicio.repuestos.map(repuesto => `<li>${repuesto}</li>`).join('')}</ul>` : 
                                '<p class="text-muted">No se utilizaron repuestos adicionales.</p>'}
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-light rounded">
                        <h6>Observaciones del Técnico</h6>
                        <p class="mb-0">"El vehículo se encuentra en buen estado general. Se recomienda revisar los neumáticos en los próximos 1,000 km."</p>
                    </div>
                `;
                
                document.getElementById('detalleContenido').innerHTML = contenido;
                
                // Mostrar el modal
                const modal = new bootstrap.Modal(document.getElementById('detalleModal'));
                modal.show();
            }
            
            // Exportar historial
            document.getElementById('exportBtn').addEventListener('click', function() {
                alert('La exportación del historial se ha iniciado. Recibirás un correo con el archivo PDF en breve.');
                // En una implementación real, aquí se haría una petición AJAX para generar el PDF
            });
            
            // Descargar comprobante
            document.getElementById('descargarComprobante').addEventListener('click', function() {
                alert('El comprobante se está descargando en formato PDF.');
                // En una implementación real, se descargaría el archivo PDF del comprobante
            });
        });
    </script>
</body>
</html>