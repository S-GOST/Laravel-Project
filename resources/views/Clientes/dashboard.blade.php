<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            height: 100%;
        }
        
        .card-icon {
            font-size: 2.5rem;
            color: #ff6600;
            margin-bottom: 15px;
        }
        
        .card-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .card-text {
            color: #666;
            font-size: 0.9rem;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #ff6600, #ff8c42);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .welcome-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .welcome-text {
            opacity: 0.9;
        }
        
        .status-badge {
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
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/rock.png') }}" alt="KTM Logo">
                <span class="ms-2"> ROCKET SERVICE</span>
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
                            <a href="#" class="active">
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
                            <a href="{{ route('cliente.servicios') }}">
                                <i class="fas fa-tools"></i> Mis servicios
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-8">
                <div class="main-content">
                    <!-- Welcome Section -->
                    <div class="welcome-section">
                        <div class="welcome-title">¡Bienvenido de vuelta!</div>
                        <div class="welcome-text">
                            Aquí puedes gestionar todos tus servicios, ver el estado de tus órdenes y acceder a tu historial completo.
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-card">
                                <div class="card-icon">
                                    <i class="fas fa-wrench"></i>
                                </div>
                                <div class="card-title">Órdenes Activas</div>
                                <div class="display-6 fw-bold">3</div>
                                <div class="card-text">En proceso de reparación</div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-card">
                                <div class="card-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="card-title">Próxima Cita</div>
                                <div class="display-6 fw-bold">15</div>
                                <div class="card-text">Mayo, 10:00 AM</div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-card">
                                <div class="card-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="card-title">Servicios Realizados</div>
                                <div class="display-6 fw-bold">24</div>
                                <div class="card-text">Desde tu registro</div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-card">
                                <div class="card-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="card-title">Valoración</div>
                                <div class="display-6 fw-bold">4.8</div>
                                <div class="card-text">Basado en 12 reseñas</div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="dashboard-card">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <span>Órdenes Recientes</span>
                                    <a href="{{ route('cliente.historial') }}" class="btn btn-sm btn-outline-primary">Ver Todas</a>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>N° Orden</th>
                                                <th>Servicio</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#OS-2024-001</td>
                                                <td>Mantenimiento Preventivo</td>
                                                <td>10/05/2024</td>
                                                <td><span class="status-badge status-active">En Proceso</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-secondary">Ver Detalles</a></td>
                                            </tr>
                                            <tr>
                                                <td>#OS-2024-002</td>
                                                <td>Diagnóstico Eléctrico</td>
                                                <td>05/05/2024</td>
                                                <td><span class="status-badge status-pending">Pendiente</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-secondary">Ver Detalles</a></td>
                                            </tr>
                                            <tr>
                                                <td>#OS-2024-003</td>
                                                <td>Reparación de Motor</td>
                                                <td>28/04/2024</td>
                                                <td><span class="status-badge status-active">Completado</span></td>
                                                <td><a href="#" class="btn btn-sm btn-outline-secondary">Ver Detalles</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="dashboard-card">
                                <div class="card-title">Próximas Citas</div>
                                
                                <div class="mb-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3 text-center">
                                            <div class="bg-light rounded p-2">
                                                <div class="fw-bold text-primary">15</div>
                                                <div class="small">MAY</div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Mantenimiento Programado</div>
                                            <div class="small text-muted">10:00 AM - 12:00 PM</div>
                                            <div class="small">KTM Taller Central</div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3 text-center">
                                            <div class="bg-light rounded p-2">
                                                <div class="fw-bold text-primary">22</div>
                                                <div class="small">MAY</div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Revisión de Seguridad</div>
                                            <div class="small text-muted">09:00 AM - 10:30 AM</div>
                                            <div class="small">KTM Taller Central</div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 text-center">
                                            <div class="bg-light rounded p-2">
                                                <div class="fw-bold text-primary">30</div>
                                                <div class="small">MAY</div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fw-bold">Instalación Accesorios</div>
                                            <div class="small text-muted">02:00 PM - 04:00 PM</div>
                                            <div class="small">KTM Taller Central</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <a href="{{ route('cliente.citas') }}" class="btn btn-outline-primary w-100 mt-3">
                                    <i class="fas fa-calendar-plus me-2"></i> Agendar Nueva Cita
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="dashboard-card">
                                <div class="card-title">Acciones Rápidas</div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-outline-primary w-100 py-3">
                                            <i class="fas fa-plus-circle fa-2x mb-2"></i><br>
                                            Nueva Orden
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <a href="{{ route('cliente.productos') }}" class="btn btn-outline-success w-100 py-3">
                                            <i class="fas fa-box fa-2x mb-2"></i><br>
                                            Mis Productos
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <a href="{{ route('cliente.servicios') }}" class="btn btn-outline-warning w-100 py-3">
                                            <i class="fas fa-tools fa-2x mb-2"></i><br>
                                            Mis Servicios
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <a href="{{ route('cliente.informes') }}" class="btn btn-outline-info w-100 py-3">
                                            <i class="fas fa-chart-line fa-2x mb-2"></i><br>
                                            Ver Informes
                                        </a>
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
        // Activar el elemento del menú actual
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.nav-menu a');
            
            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>