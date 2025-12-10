<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Informe</title>
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
        
        .report-detail-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .report-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
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
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .info-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ff6600;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .info-item {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
        }
        
        .info-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }
        
        .info-value {
            color: #333;
        }
        
        .progress-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
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
        
        .task-list {
            list-style: none;
            padding: 0;
        }
        
        .task-item {
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 6px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .task-completed {
            background-color: #f0fff4;
            border-color: #d4edda;
        }
        
        .task-in-progress {
            background-color: #f0f8ff;
            border-color: #cce5ff;
        }
        
        .task-pending {
            background-color: #fffcf0;
            border-color: #fff3cd;
        }
        
        .check-icon {
            color: #28a745;
        }
        
        .clock-icon {
            color: #ffc107;
        }
        
        .time-icon {
            color: #17a2b8;
        }
        
        .technician-comments {
            background-color: #f8f9fa;
            border-left: 4px solid #ff6600;
            padding: 20px;
            border-radius: 0 6px 6px 0;
            margin: 20px 0;
        }
        
        .comment-author {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        
        .comment-date {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .comment-text {
            color: #333;
            line-height: 1.6;
        }
        
        .document-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        
        .document-item {
            flex: 1;
            min-width: 200px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
        }
        
        .document-icon {
            font-size: 2rem;
            color: #ff6600;
            margin-bottom: 10px;
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
            }
            
            .info-grid {
                grid-template-columns: 1fr;
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
                    <!-- Botones de navegación -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <a href="{{ route('cliente.informes') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i> Volver a Informes
                            </a>
                        </div>
                        <div>
                            <button class="btn btn-primary" id="printBtn">
                                <i class="fas fa-print me-2"></i> Imprimir Informe
                            </button>
                        </div>
                    </div>
                    
                    <!-- Información del Informe -->
                    <div class="report-detail-card">
                        <div class="report-header">
                            <div>
                                <div class="report-title">Informe #INF-2024-001</div>
                                <div class="text-muted">Orden de Servicio: #OS-2024-001</div>
                            </div>
                            <div>
                                <span class="status-badge status-en-proceso">En Proceso</span>
                            </div>
                        </div>
                        
                        <!-- Información Básica -->
                        <div class="info-section">
                            <div class="info-title">Información del Servicio</div>
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Cliente</div>
                                    <div class="info-value">{{ $cliente->nombre ?? 'Nombre de Cliente' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Vehículo</div>
                                    <div class="info-value">KTM 1290 Super Duke R</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Tipo de Servicio</div>
                                    <div class="info-value">Mantenimiento Preventivo</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Fecha de Ingreso</div>
                                    <div class="info-value">10/05/2024</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Técnico Asignado</div>
                                    <div class="info-value">Juan Pérez</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Fecha Estimada Entrega</div>
                                    <div class="info-value">15/05/2024</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Progreso -->
                        <div class="progress-section">
                            <div class="progress-label">
                                <span>Progreso del Servicio</span>
                                <span>65%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%"></div>
                            </div>
                        </div>
                        
                        <!-- Descripción del Trabajo -->
                        <div class="info-section">
                            <div class="info-title">Descripción del Trabajo</div>
                            <p>
                                Mantenimiento preventivo completo de la motocicleta que incluye cambio de aceite, 
                                revisión del sistema de frenos, ajuste de cadena, verificación de sistemas eléctricos 
                                y comprobación general de seguridad.
                            </p>
                        </div>
                        
                        <!-- Tareas Realizadas -->
                        <div class="info-section">
                            <div class="info-title">Tareas Realizadas</div>
                            <ul class="task-list">
                                <li class="task-item task-completed">
                                    <div>
                                        <i class="fas fa-check-circle check-icon me-2"></i>
                                        <strong>Cambio de aceite y filtro</strong>
                                        <div class="small text-muted mt-1">Completado: 10/05/2024</div>
                                    </div>
                                    <span class="badge bg-success">Completado</span>
                                </li>
                                <li class="task-item task-completed">
                                    <div>
                                        <i class="fas fa-check-circle check-icon me-2"></i>
                                        <strong>Revisión de frenos</strong>
                                        <div class="small text-muted mt-1">Completado: 11/05/2024</div>
                                    </div>
                                    <span class="badge bg-success">Completado</span>
                                </li>
                                <li class="task-item task-in-progress">
                                    <div>
                                        <i class="fas fa-clock clock-icon me-2"></i>
                                        <strong>Ajuste y lubricación de cadena</strong>
                                        <div class="small text-muted mt-1">En progreso</div>
                                    </div>
                                    <span class="badge bg-primary">En Proceso</span>
                                </li>
                                <li class="task-item task-pending">
                                    <div>
                                        <i class="fas fa-hourglass-half time-icon me-2"></i>
                                        <strong>Comprobación de sistemas eléctricos</strong>
                                        <div class="small text-muted mt-1">Pendiente</div>
                                    </div>
                                    <span class="badge bg-warning">Pendiente</span>
                                </li>
                                <li class="task-item task-pending">
                                    <div>
                                        <i class="fas fa-hourglass-half time-icon me-2"></i>
                                        <strong>Prueba de funcionamiento</strong>
                                        <div class="small text-muted mt-1">Pendiente</div>
                                    </div>
                                    <span class="badge bg-warning">Pendiente</span>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Comentarios del Técnico -->
                        <div class="technician-comments">
                            <div class="comment-author">Juan Pérez - Técnico Especialista</div>
                            <div class="comment-date">Última actualización: 12/05/2024 14:30</div>
                            <div class="comment-text">
                                "Se ha completado el cambio de aceite y filtros. Durante la revisión de frenos, 
                                se detectó desgaste en las pastillas delanteras que requerirán sustitución. 
                                Se recomienda cambiar las pastillas de freno delanteras por seguridad. 
                                El costo adicional estimado es de €45 incluyendo mano de obra."
                            </div>
                        </div>
                        
                        <!-- Partes y Repuestos -->
                        <div class="info-section">
                            <div class="info-title">Partes y Repuestos Utilizados</div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Aceite sintético 10W-50 KTM</td>
                                            <td>2 litros</td>
                                            <td>€25.00</td>
                                            <td>€50.00</td>
                                        </tr>
                                        <tr>
                                            <td>Filtro de aceite original KTM</td>
                                            <td>1 unidad</td>
                                            <td>€18.00</td>
                                            <td>€18.00</td>
                                        </tr>
                                        <tr>
                                            <td>Lubricante para cadena</td>
                                            <td>1 unidad</td>
                                            <td>€12.00</td>
                                            <td>€12.00</td>
                                        </tr>
                                        <tr>
                                            <td>Pastillas de freno delanteras (recomendadas)</td>
                                            <td>1 juego</td>
                                            <td>€35.00</td>
                                            <td>€35.00</td>
                                        </tr>
                                        <tr class="table-light">
                                            <td colspan="3" class="text-end fw-bold">Subtotal Repuestos:</td>
                                            <td class="fw-bold">€115.00</td>
                                        </tr>
                                        <tr class="table-light">
                                            <td colspan="3" class="text-end fw-bold">Mano de Obra:</td>
                                            <td class="fw-bold">€50.00</td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <td colspan="3" class="text-end fw-bold">Total Estimado:</td>
                                            <td class="fw-bold">€165.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Documentos -->
                        <div class="info-section">
                            <div class="info-title">Documentos Adjuntos</div>
                            <div class="document-section">
                                <div class="document-item">
                                    <i class="fas fa-file-pdf document-icon"></i>
                                    <div class="fw-bold">Informe Técnico Completo</div>
                                    <div class="small text-muted mb-2">PDF - 1.2 MB</div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download me-1"></i> Descargar
                                    </button>
                                </div>
                                <div class="document-item">
                                    <i class="fas fa-file-invoice-dollar document-icon"></i>
                                    <div class="fw-bold">Presupuesto Detallado</div>
                                    <div class="small text-muted mb-2">PDF - 0.8 MB</div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download me-1"></i> Descargar
                                    </button>
                                </div>
                                <div class="document-item">
                                    <i class="fas fa-images document-icon"></i>
                                    <div class="fw-bold">Fotos del Proceso</div>
                                    <div class="small text-muted mb-2">ZIP - 4.5 MB</div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download me-1"></i> Descargar
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Botones de Acción -->
                        <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                            <div>
                                <button class="btn btn-outline-primary me-2" id="contactTechnician">
                                    <i class="fas fa-comment-dots me-2"></i> Contactar al Técnico
                                </button>
                                <button class="btn btn-outline-secondary" id="requestUpdate">
                                    <i class="fas fa-sync-alt me-2"></i> Solicitar Actualización
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-primary" id="approveWork">
                                    <i class="fas fa-check-circle me-2"></i> Aprobar Trabajo
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Instrucciones -->
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle me-2"></i> Instrucciones</h6>
                        <p class="mb-0">
                            1. Revisa detenidamente el informe y los trabajos realizados.<br>
                            2. Si tienes alguna duda, contacta al técnico asignado.<br>
                            3. Una vez que estés satisfecho con el trabajo, aprueba el informe para continuar con el proceso.<br>
                            4. Puedes descargar todos los documentos relacionados con este servicio.
                        </p>
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
            
            // Imprimir informe
            document.getElementById('printBtn').addEventListener('click', function() {
                window.print();
            });
            
            // Contactar al técnico
            document.getElementById('contactTechnician').addEventListener('click', function() {
                alert('Se abrirá el sistema de mensajería para contactar al técnico Juan Pérez.');
            });
            
            // Solicitar actualización
            document.getElementById('requestUpdate').addEventListener('click', function() {
                alert('Se ha enviado una solicitud de actualización del informe al técnico.');
            });
            
            // Aprobar trabajo
            document.getElementById('approveWork').addEventListener('click', function() {
                if (confirm('¿Estás seguro de que deseas aprobar el trabajo realizado? Esta acción no se puede deshacer.')) {
                    alert('El trabajo ha sido aprobado. Se procederá con la finalización del servicio.');
                    // En una implementación real, aquí se enviaría una petición al servidor
                }
            });
            
            // Descargar documentos
            document.querySelectorAll('.btn-outline-primary').forEach(button => {
                if (button.textContent.includes('Descargar')) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        alert('El documento se está descargando.');
                    });
                }
            });
        });
    </script>
</body>
</html>