<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Orden de Servicio - KTM Rocket Service</title>
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
        
        .form-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .form-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .form-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6600, #ff8c42);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 20px;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }
        
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #dee2e6;
            z-index: 1;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #dee2e6;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        
        .step.active .step-number {
            background-color: #ff6600;
            color: white;
        }
        
        .step.completed .step-number {
            background-color: #28a745;
            color: white;
        }
        
        .step-label {
            font-size: 0.9rem;
            color: #6c757d;
            text-align: center;
        }
        
        .step.active .step-label {
            color: #ff6600;
            font-weight: 600;
        }
        
        .form-section {
            margin-bottom: 40px;
        }
        
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 12px 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.25);
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
        
        .service-option {
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .service-option:hover {
            border-color: #ff6600;
            background-color: rgba(255, 102, 0, 0.05);
        }
        
        .service-option.selected {
            border-color: #ff6600;
            background-color: rgba(255, 102, 0, 0.1);
        }
        
        .service-icon {
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
            
            .step-indicator {
                flex-wrap: wrap;
            }
            
            .step {
                width: 50%;
                margin-bottom: 20px;
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
                        <li><a class="dropdown-item" href="{{ route('cliente.logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión</a></li>
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
                            <a href="{{ route('cliente.orden.nueva') }}" class="active">
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Nueva Orden de Servicio</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Indicador de Pasos -->
                    <div class="step-indicator">
                        <div class="step active" id="step1">
                            <div class="step-number">1</div>
                            <div class="step-label">Vehículo</div>
                        </div>
                        <div class="step" id="step2">
                            <div class="step-number">2</div>
                            <div class="step-label">Servicio</div>
                        </div>
                        <div class="step" id="step3">
                            <div class="step-number">3</div>
                            <div class="step-label">Detalles</div>
                        </div>
                        <div class="step" id="step4">
                            <div class="step-number">4</div>
                            <div class="step-label">Confirmación</div>
                        </div>
                    </div>
                    
                    <form id="orderForm">
                        <!-- Paso 1: Selección de Vehículo -->
                        <div class="form-card" id="step1Content">
                            <div class="form-header">
                                <div class="form-icon">
                                    <i class="fas fa-motorcycle"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Seleccionar Vehículo</h4>
                                    <p class="text-muted mb-0">Elige el vehículo que necesita servicio</p>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h5 class="section-title">Mis Vehículos</h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option vehicle-option" data-vehicle="ktm-1290">
                                            <div class="service-icon">
                                                <i class="fas fa-motorcycle"></i>
                                            </div>
                                            <h5>KTM 1290 Super Duke R</h5>
                                            <p class="text-muted">Matrícula: 1234-ABC</p>
                                            <p class="text-muted">Año: 2022</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option vehicle-option" data-vehicle="ktm-790">
                                            <div class="service-icon">
                                                <i class="fas fa-motorcycle"></i>
                                            </div>
                                            <h5>KTM 790 Adventure</h5>
                                            <p class="text-muted">Matrícula: 5678-DEF</p>
                                            <p class="text-muted">Año: 2021</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="fas fa-plus me-2"></i> Agregar Nuevo Vehículo
                                    </button>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <div></div> <!-- Espacio vacío para alinear botón a la derecha -->
                                <button type="button" class="btn btn-primary next-step" data-next="2">
                                    Siguiente <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Paso 2: Tipo de Servicio -->
                        <div class="form-card d-none" id="step2Content">
                            <div class="form-header">
                                <div class="form-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Seleccionar Servicio</h4>
                                    <p class="text-muted mb-0">Elige el tipo de servicio que necesitas</p>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h5 class="section-title">Tipos de Servicio</h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option service-type-option" data-service="mantenimiento">
                                            <div class="service-icon">
                                                <i class="fas fa-oil-can"></i>
                                            </div>
                                            <h5>Mantenimiento Preventivo</h5>
                                            <p class="text-muted">Cambio de aceite, filtros y revisión general</p>
                                            <p class="fw-bold">Desde €120</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option service-type-option" data-service="reparacion">
                                            <div class="service-icon">
                                                <i class="fas fa-wrench"></i>
                                            </div>
                                            <h5>Reparación General</h5>
                                            <p class="text-muted">Reparación de averías y componentes dañados</p>
                                            <p class="fw-bold">Desde €80 (diagnóstico)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option service-type-option" data-service="diagnostico">
                                            <div class="service-icon">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <h5>Diagnóstico Técnico</h5>
                                            <p class="text-muted">Análisis completo con equipo especializado</p>
                                            <p class="fw-bold">€60</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="service-option service-type-option" data-service="personalizado">
                                            <div class="service-icon">
                                                <i class="fas fa-cogs"></i>
                                            </div>
                                            <h5>Servicio Personalizado</h5>
                                            <p class="text-muted">Selecciona los servicios específicos que necesitas</p>
                                            <p class="fw-bold">Variable</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="urgente">
                                        <label class="form-check-label" for="urgente">
                                            <span class="fw-bold">Servicio Urgente</span> (prioridad en agenda, recargo del 20%)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary prev-step" data-prev="1">
                                    <i class="fas fa-arrow-left me-2"></i> Anterior
                                </button>
                                <button type="button" class="btn btn-primary next-step" data-next="3">
                                    Siguiente <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Paso 3: Detalles Adicionales -->
                        <div class="form-card d-none" id="step3Content">
                            <div class="form-header">
                                <div class="form-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Detalles del Servicio</h4>
                                    <p class="text-muted mb-0">Proporciona información adicional sobre el problema</p>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="mb-4">
                                    <label for="descripcion" class="form-label">Descripción del Problema</label>
                                    <textarea class="form-control" id="descripcion" rows="4" placeholder="Describe con detalle el problema o lo que quieres que revisemos..."></textarea>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="sintomas" class="form-label">Síntomas Observados</label>
                                    <textarea class="form-control" id="sintomas" rows="3" placeholder="¿Qué síntomas has notado? (ruidos, vibraciones, pérdidas, etc.)"></textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha_preferida" class="form-label">Fecha Preferida</label>
                                        <input type="date" class="form-control" id="fecha_preferida">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="horario_preferido" class="form-label">Horario Preferido</label>
                                        <select class="form-select" id="horario_preferido">
                                            <option value="">Seleccionar horario</option>
                                            <option value="manana">Mañana (9:00 - 12:00)</option>
                                            <option value="tarde">Tarde (12:00 - 15:00)</option>
                                            <option value="tarde2">Tarde (15:00 - 18:00)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">¿Cómo nos conociste?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="referencia" id="ref_recomendacion" value="recomendacion">
                                            <label class="form-check-label" for="ref_recomendacion">Recomendación</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="referencia" id="ref_web" value="web">
                                            <label class="form-check-label" for="ref_web">Sitio Web</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="referencia" id="ref_redes" value="redes">
                                            <label class="form-check-label" for="ref_redes">Redes Sociales</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="referencia" id="ref_otro" value="otro">
                                            <label class="form-check-label" for="ref_otro">Otro</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary prev-step" data-prev="2">
                                    <i class="fas fa-arrow-left me-2"></i> Anterior
                                </button>
                                <button type="button" class="btn btn-primary next-step" data-next="4">
                                    Siguiente <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Paso 4: Confirmación -->
                        <div class="form-card d-none" id="step4Content">
                            <div class="form-header">
                                <div class="form-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Confirmar Orden</h4>
                                    <p class="text-muted mb-0">Revisa los detalles y confirma tu orden</p>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Revisa cuidadosamente los detalles de tu orden antes de confirmar.
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Resumen de la Orden</h5>
                                        <div class="card border-0 bg-light">
                                            <div class="card-body">
                                                <p><strong>Vehículo:</strong> <span id="summaryVehicle">KTM 1290 Super Duke R</span></p>
                                                <p><strong>Servicio:</strong> <span id="summaryService">Mantenimiento Preventivo</span></p>
                                                <p><strong>Fecha Preferida:</strong> <span id="summaryDate">15/05/2024</span></p>
                                                <p><strong>Horario:</strong> <span id="summaryTime">Mañana (9:00 - 12:00)</span></p>
                                                <p><strong>Servicio Urgente:</strong> <span id="summaryUrgent">No</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Estimación de Costo</h5>
                                        <div class="card border-0 bg-light">
                                            <div class="card-body">
                                                <p><strong>Servicio Básico:</strong> <span class="float-end">€120.00</span></p>
                                                <p><strong>Recargo Urgente:</strong> <span class="float-end">€0.00</span></p>
                                                <p><strong>Materiales (estimado):</strong> <span class="float-end">€45.00</span></p>
                                                <hr>
                                                <p><strong>Total Estimado:</strong> <span class="float-end fw-bold">€165.00</span></p>
                                                <p class="small text-muted">* El costo final puede variar según diagnóstico</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            Acepto los <a href="#" class="text-primary">términos y condiciones</a> del servicio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary prev-step" data-prev="3">
                                    <i class="fas fa-arrow-left me-2"></i> Anterior
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i> Confirmar Orden
                                </button>
                            </div>
                        </div>
                    </form>
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
            let currentStep = 1;
            const orderForm = document.getElementById('orderForm');
            
            // Manejar selección de vehículo
            document.querySelectorAll('.vehicle-option').forEach(option => {
                option.addEventListener('click', function() {
                    // Remover selección previa
                    document.querySelectorAll('.vehicle-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    
                    // Seleccionar actual
                    this.classList.add('selected');
                    
                    // Actualizar resumen
                    document.getElementById('summaryVehicle').textContent = 
                        this.querySelector('h5').textContent;
                });
            });
            
            // Seleccionar primer vehículo por defecto
            document.querySelector('.vehicle-option').click();
            
            // Manejar selección de servicio
            document.querySelectorAll('.service-type-option').forEach(option => {
                option.addEventListener('click', function() {
                    // Remover selección previa
                    document.querySelectorAll('.service-type-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    
                    // Seleccionar actual
                    this.classList.add('selected');
                    
                    // Actualizar resumen
                    document.getElementById('summaryService').textContent = 
                        this.querySelector('h5').textContent;
                });
            });
            
            // Seleccionar primer servicio por defecto
            document.querySelector('.service-type-option').click();
            
            // Manejar botones de siguiente/anterior
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));
                    goToStep(nextStep);
                });
            });
            
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    goToStep(prevStep);
                });
            });
            
            function goToStep(step) {
                // Ocultar todos los pasos
                for (let i = 1; i <= 4; i++) {
                    document.getElementById(`step${i}Content`).classList.add('d-none');
                    document.getElementById(`step${i}`).classList.remove('active', 'completed');
                }
                
                // Mostrar paso actual
                document.getElementById(`step${step}Content`).classList.remove('d-none');
                
                // Actualizar indicador de pasos
                for (let i = 1; i < step; i++) {
                    document.getElementById(`step${i}`).classList.add('completed');
                }
                
                document.getElementById(`step${step}`).classList.add('active');
                
                currentStep = step;
            }
            
            // Manejar envío del formulario
            orderForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validar términos
                if (!document.getElementById('terms').checked) {
                    alert('Debes aceptar los términos y condiciones para continuar');
                    return;
                }
                
                // Aquí iría la lógica para enviar el formulario
                alert('Orden creada exitosamente. Número de orden: #OS-2024-024');
                
                // Redirigir al dashboard
                setTimeout(() => {
                    window.location.href = "{{ route('cliente.dashboard') }}";
                }, 2000);
            });
            
            // Actualizar resumen con fecha actual
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 2);
            
            const formattedDate = tomorrow.toLocaleDateString('es-ES');
            document.getElementById('summaryDate').textContent = formattedDate;
            document.getElementById('fecha_preferida').valueAsDate = tomorrow;
            
            // Manejar checkbox de servicio urgente
            document.getElementById('urgente').addEventListener('change', function() {
                const urgentText = this.checked ? 'Sí (+20%)' : 'No';
                document.getElementById('summaryUrgent').textContent = urgentText;
            });
            
            // Manejar cambio de horario
            document.getElementById('horario_preferido').addEventListener('change', function() {
                const timeText = this.options[this.selectedIndex].text;
                document.getElementById('summaryTime').textContent = timeText;
            });
            
            // Establecer horario por defecto
            document.getElementById('horario_preferido').value = 'manana';
            document.getElementById('summaryTime').textContent = 'Mañana (9:00 - 12:00)';
        });
    </script>
</body>
</html>