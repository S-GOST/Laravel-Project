<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avances de Informes - KTM Rocket Service</title>
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
        
        .status-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-en-proceso {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-completado {
            background-color: #d4edda;
            color: #155724;
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
        
        .report-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }
        
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .report-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }
        
        .report-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        .report-description {
            color: #555;
            margin-bottom: 15px;
        }
        
        .report-technician {
            font-style: italic;
            color: #777;
            margin-bottom: 15px;
        }
        
        .progress-section {
            margin: 20px 0;
        }
        
        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .progress-bar {
            height: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #ff6600;
            border-radius: 5px;
            transition: width 0.6s ease;
        }
        
        .no-reports {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .no-reports i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ccc;
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
        
        .report-details {
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
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .report-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .report-header .status-badge {
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
                            <a href="{{ route('cliente.informes') }}" class="active">
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
                        <h2 class="mb-0">Avances de Informes</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Filtros -->
                    <div class="filter-section">
                        <div class="filter-title">Filtrar por Estado:</div>
                        <div class="d-flex flex-wrap">
                            <button class="btn btn-outline-primary btn-filter active" data-filter="all">Todos</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="pendiente">Pendientes</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="en-proceso">En Proceso</button>
                            <button class="btn btn-outline-primary btn-filter" data-filter="completado">Completados</button>
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">Informes de Mis Órdenes de Servicio</div>
                        
                        <p class="text-muted mb-4">
                            Aquí puedes ver los informes y avances de las órdenes de servicio que tienes en curso. 
                            Cada informe detalla el progreso, las observaciones del técnico y las próximas acciones.
                        </p>
                        
                        <!-- Lista de Informes -->
                        <div id="reports-container">
                            <!-- Ejemplo de Informe 1 -->
                            <div class="report-item" data-status="en-proceso">
                                <div class="report-header">
                                    <div>
                                        <div class="report-title">Orden #OS-2024-001 - Mantenimiento Preventivo</div>
                                        <div class="report-date">Última actualización: 12/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="status-badge status-en-proceso">En Proceso</span>
                                    </div>
                                </div>
                                
                                <div class="progress-section">
                                    <div class="progress-label">
                                        <span>Progreso de la Reparación</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 65%"></div>
                                    </div>
                                </div>
                                
                                <div class="report-description">
                                    <strong>Descripción del Avance:</strong> Se ha completado el cambio de aceite y filtros. 
                                    Se están revisando los frenos y el sistema de suspensión. Se detectó desgaste en las pastillas de freno delanteras.
                                </div>
                                
                                <div class="report-technician">
                                    <strong>Técnico asignado:</strong> Juan Pérez - Especialista en Mecánica General
                                </div>
                                
                                <div class="report-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Próxima Acción:</div>
                                        <div class="detail-value">Cambio de pastillas de freno delanteras</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Fecha Estimada:</div>
                                        <div class="detail-value">15/05/2024</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Coste Estimado:</div>
                                        <div class="detail-value">€120 (incluye mano de obra y repuestos)</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-download me-2"></i> Descargar PDF
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-comment me-2"></i> Consultar al Técnico
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Ejemplo de Informe 2 -->
                            <div class="report-item" data-status="completado">
                                <div class="report-header">
                                    <div>
                                        <div class="report-title">Orden #OS-2024-003 - Reparación de Motor</div>
                                        <div class="report-date">Completado: 05/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="status-badge status-completado">Completado</span>
                                    </div>
                                </div>
                                
                                <div class="progress-section">
                                    <div class="progress-label">
                                        <span>Progreso de la Reparación</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%"></div>
                                    </div>
                                </div>
                                
                                <div class="report-description">
                                    <strong>Descripción del Avance:</strong> Reparación completada con éxito. 
                                    Se sustituyó la junta de culata y se rectificaron las válvulas. 
                                    El motor ha pasado todas las pruebas de compresión y funcionamiento.
                                </div>
                                
                                <div class="report-technician">
                                    <strong>Técnico asignado:</strong> Carlos Rodríguez - Especialista en Motores
                                </div>
                                
                                <div class="report-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Trabajos Realizados:</div>
                                        <div class="detail-value">Sustitución junta culata, rectificación válvulas, cambio aceite</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Garantía:</div>
                                        <div class="detail-value">12 meses en reparación de motor</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Coste Final:</div>
                                        <div class="detail-value">€450 (presupuesto respetado)</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-download me-2"></i> Descargar PDF
                                    </a>
                                    <a href="#" class="btn btn-outline-success">
                                        <i class="fas fa-star me-2"></i> Valorar Servicio
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Ejemplo de Informe 3 -->
                            <div class="report-item" data-status="pendiente">
                                <div class="report-header">
                                    <div>
                                        <div class="report-title">Orden #OS-2024-002 - Diagnóstico Eléctrico</div>
                                        <div class="report-date">Creado: 08/05/2024</div>
                                    </div>
                                    <div>
                                        <span class="status-badge status-pendiente">Pendiente de Diagnóstico</span>
                                    </div>
                                </div>
                                
                                <div class="progress-section">
                                    <div class="progress-label">
                                        <span>Progreso del Diagnóstico</span>
                                        <span>15%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 15%"></div>
                                    </div>
                                </div>
                                
                                <div class="report-description">
                                    <strong>Descripción del Avance:</strong> La moto ha sido recibida en el taller. 
                                    Se ha realizado una inspección inicial y se está preparando el equipo de diagnóstico eléctrico.
                                </div>
                                
                                <div class="report-technician">
                                    <strong>Técnico asignado:</strong> María López - Especialista en Electricidad
                                </div>
                                
                                <div class="report-details">
                                    <div class="detail-item">
                                        <div class="detail-label">Próxima Acción:</div>
                                        <div class="detail-value">Diagnóstico completo del sistema eléctrico</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Fecha Estimada:</div>
                                        <div class="detail-value">20/05/2024</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">Síntomas Reportados:</div>
                                        <div class="detail-value">Problemas con el arranque y luces intermitentes</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="#" class="btn btn-primary me-2">
                                        <i class="fas fa-download me-2"></i> Descargar PDF
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fas fa-comment me-2"></i> Consultar al Técnico
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Si no hay informes -->
                            <div class="no-reports d-none" id="no-reports-message">
                                <i class="fas fa-file-alt"></i>
                                <h4>No hay informes disponibles</h4>
                                <p>No se encontraron informes de avances para tus órdenes de servicio con el filtro seleccionado.</p>
                                <a href="{{ route('cliente.orden.nueva') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus-circle me-2"></i> Crear Nueva Orden
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Información Adicional -->
                    <div class="dashboard-card">
                        <h5 class="mb-3">¿Qué es un informe de avance?</h5>
                        <p class="text-muted">
                            Un informe de avance es un documento que detalla el progreso de la reparación o servicio de tu motocicleta. 
                            Incluye información sobre las tareas realizadas, las piezas utilizadas, las observaciones del técnico y los próximos pasos.
                            Estos informes se actualizan regularmente para mantenerte informado sobre el estado de tu orden.
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-clipboard-check fa-2x text-primary mb-3"></i>
                                    <h6>Seguimiento en Tiempo Real</h6>
                                    <p class="small text-muted">Observa el progreso de tu reparación con actualizaciones periódicas.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-euro-sign fa-2x text-primary mb-3"></i>
                                    <h6>Transparencia en Costes</h6>
                                    <p class="small text-muted">Conoce los costes estimados y finales de cada reparación.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-headset fa-2x text-primary mb-3"></i>
                                    <h6>Comunicación Directa</h6>
                                    <p class="small text-muted">Consulta cualquier duda directamente con el técnico asignado.</p>
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
            
            // Filtrado de informes
            const filterButtons = document.querySelectorAll('.btn-filter');
            const reportItems = document.querySelectorAll('.report-item');
            const noReportsMessage = document.getElementById('no-reports-message');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    let visibleCount = 0;
                    
                    // Filtrar informes
                    reportItems.forEach(item => {
                        const status = item.getAttribute('data-status');
                        
                        if (filter === 'all' || status === filter) {
                            item.style.display = 'block';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Mostrar/ocultar mensaje de no hay informes
                    if (visibleCount === 0) {
                        noReportsMessage.classList.remove('d-none');
                    } else {
                        noReportsMessage.classList.add('d-none');
                    }
                });
            });
            
            // Simular descarga de PDF
            document.querySelectorAll('.btn-primary').forEach(button => {
                if (button.textContent.includes('Descargar PDF')) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        alert('El informe se está descargando en formato PDF. En una implementación real, se descargaría el archivo.');
                    });
                }
            });
            
            // Simular consulta al técnico
            document.querySelectorAll('.btn-outline-primary').forEach(button => {
                if (button.textContent.includes('Consultar al Técnico')) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        alert('Redirigiendo al sistema de mensajería para consultar con el técnico asignado.');
                    });
                }
            });
        });
    </script>
</body>
</html>