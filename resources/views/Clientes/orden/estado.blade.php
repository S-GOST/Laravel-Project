<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de la Orden </title>
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
        
        .status-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .order-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        
        .order-number {
            color: #ff6600;
            font-weight: bold;
        }
        
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto 40px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 20px;
            width: 4px;
            background-color: #dee2e6;
            border-radius: 2px;
        }
        
        .timeline-item {
            position: relative;
            padding-left: 60px;
            margin-bottom: 30px;
        }
        
        .timeline-icon {
            position: absolute;
            left: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #dee2e6;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 2;
        }
        
        .timeline-item.active .timeline-icon {
            background-color: #ff6600;
            color: white;
        }
        
        .timeline-item.completed .timeline-icon {
            background-color: #28a745;
            color: white;
        }
        
        .timeline-content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
        
        .timeline-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }
        
        .timeline-date {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 10px;
        }
        
        .timeline-description {
            color: #555;
            margin-bottom: 0;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-proceso {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .status-completado {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-espera {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .order-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
        }
        
        .detail-item {
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-label {
            font-weight: 600;
            color: #555;
            min-width: 150px;
        }
        
        .detail-value {
            color: #333;
        }
        
        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
            padding: 10px 25px;
            font-weight: 600;
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
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .order-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .order-header .btn {
                margin-top: 15px;
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
                            <a href="{{ route('cliente.orden.estado') }}" class="active">
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
                        <h2 class="mb-0">Estado de la Orden</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Buscador de Órdenes -->
                    <div class="status-card mb-4">
                        <h4 class="mb-4">Buscar Orden</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresa el número de orden (ej: OS-2024-001)" id="orderSearch">
                                    <button class="btn btn-primary" type="button" id="searchBtn">
                                        <i class="fas fa-search me-2"></i> Buscar
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="orderFilter">
                                    <option value="">Todas las órdenes</option>
                                    <option value="pendiente">Pendientes</option>
                                    <option value="proceso">En Proceso</option>
                                    <option value="completado">Completadas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Estado Actual -->
                    <div class="status-card">
                        <div class="order-header">
                            <div>
                                <h3 class="order-title">Orden <span class="order-number">#OS-2024-001</span></h3>
                                <p class="text-muted mb-0">Mantenimiento Preventivo - KTM 1290 Super Duke R</p>
                            </div>
                            <div>
                                <span class="status-badge status-proceso">En Proceso</span>
                            </div>
                        </div>
                        
                        <!-- Línea de Tiempo -->
                        <div class="timeline">
                            <div class="timeline-item completed">
                                <div class="timeline-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Orden Creada</div>
                                    <div class="timeline-date">10 de Mayo, 2024 - 09:15 AM</div>
                                    <p class="timeline-description">Tu orden ha sido registrada en nuestro sistema.</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item completed">
                                <div class="timeline-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Confirmada</div>
                                    <div class="timeline-date">10 de Mayo, 2024 - 10:30 AM</div>
                                    <p class="timeline-description">Hemos confirmado tu orden y la hemos programado.</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item completed">
                                <div class="timeline-icon">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Vehículo Recibido</div>
                                    <div class="timeline-date">12 de Mayo, 2024 - 09:00 AM</div>
                                    <p class="timeline-description">Tu vehículo ha sido recibido en nuestro taller.</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="fas fa-wrench"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">En Reparación</div>
                                    <div class="timeline-date">12 de Mayo, 2024 - 10:00 AM (En curso)</div>
                                    <p class="timeline-description">Nuestros técnicos están realizando el mantenimiento preventivo.</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Pruebas de Calidad</div>
                                    <div class="timeline-date">Próximo paso</div>
                                    <p class="timeline-description">Realizaremos pruebas de calidad para asegurar el funcionamiento óptimo.</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Completada</div>
                                    <div class="timeline-date">Pendiente</div>
                                    <p class="timeline-description">Tu vehículo estará listo para ser retirado.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Detalles de la Orden -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="order-details">
                                    <h5 class="mb-3">Detalles del Servicio</h5>
                                    
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Vehículo:</div>
                                        <div class="detail-value ms-3">KTM 1290 Super Duke R</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Matrícula:</div>
                                        <div class="detail-value ms-3">1234-ABC</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Tipo de Servicio:</div>
                                        <div class="detail-value ms-3">Mantenimiento Preventivo</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Fecha de Ingreso:</div>
                                        <div class="detail-value ms-3">12/05/2024</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Fecha Estimada Entrega:</div>
                                        <div class="detail-value ms-3">15/05/2024</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="order-details">
                                    <h5 class="mb-3">Información de Contacto</h5>
                                    
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Técnico Asignado:</div>
                                        <div class="detail-value ms-3">Carlos Rodríguez</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Teléfono Taller:</div>
                                        <div class="detail-value ms-3">+34 912 345 678</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Email Contacto:</div>
                                        <div class="detail-value ms-3">taller@ktmrocketservice.com</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Ubicación:</div>
                                        <div class="detail-value ms-3">Taller Central - Calle Motores 123</div>
                                    </div>
                                    <div class="detail-item d-flex">
                                        <div class="detail-label">Horario:</div>
                                        <div class="detail-value ms-3">L-V: 9:00-18:00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Acciones -->
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-outline-primary" id="contactBtn">
                                <i class="fas fa-phone-alt me-2"></i> Contactar al Técnico
                            </button>
                            <button class="btn btn-primary" id="updateBtn">
                                <i class="fas fa-sync-alt me-2"></i> Actualizar Estado
                            </button>
                        </div>
                    </div>
                    
                    <!-- Historial de Actualizaciones -->
                    <div class="status-card">
                        <h4 class="mb-4">Historial de Actualizaciones</h4>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Actualización</th>
                                        <th>Responsable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12/05/2024 10:00</td>
                                        <td><span class="status-badge status-proceso">En Proceso</span></td>
                                        <td>Iniciado mantenimiento preventivo. Cambio de aceite y filtros realizado.</td>
                                        <td>Carlos Rodríguez</td>
                                    </tr>
                                    <tr>
                                        <td>12/05/2024 09:30</td>
                                        <td><span class="status-badge status-proceso">En Proceso</span></td>
                                        <td>Diagnóstico inicial completado. Sin anomalías detectadas.</td>
                                        <td>Carlos Rodríguez</td>
                                    </tr>
                                    <tr>
                                        <td>12/05/2024 09:00</td>
                                        <td><span class="status-badge status-pendiente">Recibido</span></td>
                                        <td>Vehículo recibido en taller. Programado para mantenimiento.</td>
                                        <td>Recepción</td>
                                    </tr>
                                    <tr>
                                        <td>10/05/2024 10:30</td>
                                        <td><span class="status-badge status-pendiente">Confirmada</span></td>
                                        <td>Orden confirmada y programada para el 12/05/2024.</td>
                                        <td>Sistema</td>
                                    </tr>
                                    <tr>
                                        <td>10/05/2024 09:15</td>
                                        <td><span class="status-badge status-pendiente">Creada</span></td>
                                        <td>Orden creada por el cliente a través del sistema web.</td>
                                        <td>Sistema</td>
                                    </tr>
                                </tbody>
                            </table>
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
            const searchBtn = document.getElementById('searchBtn');
            const orderSearch = document.getElementById('orderSearch');
            const orderFilter = document.getElementById('orderFilter');
            const contactBtn = document.getElementById('contactBtn');
            const updateBtn = document.getElementById('updateBtn');
            
            // Manejar búsqueda de orden
            searchBtn.addEventListener('click', function() {
                const orderNumber = orderSearch.value.trim();
                
                if (orderNumber) {
                    // Aquí iría la lógica para buscar la orden
                    alert(`Buscando orden: ${orderNumber}`);
                    // En una aplicación real, aquí se haría una petición AJAX
                } else {
                    alert('Por favor, ingresa un número de orden');
                }
            });
            
            // Manejar filtro de órdenes
            orderFilter.addEventListener('change', function() {
                const filterValue = this.value;
                
                if (filterValue) {
                    // Aquí iría la lógica para filtrar órdenes
                    alert(`Filtrando órdenes: ${filterValue}`);
                    // En una aplicación real, aquí se haría una petición AJAX
                }
            });
            
            // Manejar botón de contacto
            contactBtn.addEventListener('click', function() {
                // Simular contacto con técnico
                alert('Redirigiendo a opciones de contacto...\n\nTeléfono: +34 912 345 678\nEmail: taller@ktmrocketservice.com\n\nTambién puedes usar nuestro chat en vivo.');
            });
            
            // Manejar botón de actualizar
            updateBtn.addEventListener('click', function() {
                // Simular actualización de estado
                alert('Actualizando estado de la orden...\n\nEstado actualizado correctamente.');
                
                // Aquí iría la lógica para actualizar el estado
                // En una aplicación real, aquí se haría una petición AJAX
            });
            
            // Permitir búsqueda con Enter
            orderSearch.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchBtn.click();
                }
            });
        });
    </script>
</body>
</html>