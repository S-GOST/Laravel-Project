<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - KTM Rocket Service</title>
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
        
        .appointment-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            background-color: #fff;
        }
        
        .appointment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .appointment-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }
        
        .appointment-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        .appointment-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                margin-bottom: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .appointment-header {
                flex-direction: column;
                align-items: flex-start;
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
                            <a href="{{ route('cliente.citas') }}" class="active">
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
                        <h2 class="mb-0">Agendar Cita</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <!-- Mensajes -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="dashboard-card">
                                <div class="card-title">Nueva Cita</div>
                                
                                <form action="{{ route('citas.agendar') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tipo_servicio" class="form-label">Tipo de Servicio *</label>
                                            <select class="form-select" id="tipo_servicio" name="tipo_servicio" required>
                                                <option value="">Seleccione un servicio</option>
                                                <option value="mantenimiento_preventivo">Mantenimiento Preventivo</option>
                                                <option value="mantenimiento_correctivo">Mantenimiento Correctivo</option>
                                                <option value="diagnostico">Diagnóstico General</option>
                                                <option value="reparacion_motor">Reparación de Motor</option>
                                                <option value="sistema_electrico">Sistema Eléctrico</option>
                                                <option value="sistema_frenos">Sistema de Frenos</option>
                                                <option value="suspension">Suspensión</option>
                                                <option value="otros">Otros</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="moto" class="form-label">Motocicleta *</label>
                                            <select class="form-select" id="moto" name="moto" required>
                                                <option value="">Seleccione una moto</option>
                                                <option value="ktm_1290_super_duke">KTM 1290 Super Duke R</option>
                                                <option value="ktm_790_adventure">KTM 790 Adventure</option>
                                                <option value="ktm_390_duke">KTM 390 Duke</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fecha" class="form-label">Fecha *</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" required min="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="hora" class="form-label">Hora *</label>
                                            <select class="form-select" id="hora" name="hora" required>
                                                <option value="">Seleccione una hora</option>
                                                <option value="09:00">09:00 AM</option>
                                                <option value="10:00">10:00 AM</option>
                                                <option value="11:00">11:00 AM</option>
                                                <option value="12:00">12:00 PM</option>
                                                <option value="14:00">02:00 PM</option>
                                                <option value="15:00">03:00 PM</option>
                                                <option value="16:00">04:00 PM</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="descripcion" class="form-label">Descripción del Problema o Servicio</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describa el problema o servicio que necesita..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-calendar-plus me-2"></i> Agendar Cita
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Próximas Citas -->
                            <div class="dashboard-card mt-4">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <span>Mis Próximas Citas</span>
                                    <span class="badge bg-primary">3 citas</span>
                                </div>
                                
                                <div id="appointments-list">
                                    <div class="appointment-item">
                                        <div class="appointment-header">
                                            <div>
                                                <div class="appointment-title">Mantenimiento Programado</div>
                                                <div class="appointment-date">15 de Mayo, 2024 - 10:00 AM</div>
                                            </div>
                                            <span class="appointment-status status-confirmed">Confirmada</span>
                                        </div>
                                        <p><strong>Motocicleta:</strong> KTM 1290 Super Duke R</p>
                                        <p><strong>Servicio:</strong> Mantenimiento preventivo general</p>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-sm btn-outline-secondary me-2">Reagendar</button>
                                            <button class="btn btn-sm btn-outline-danger">Cancelar</button>
                                        </div>
                                    </div>
                                    
                                    <div class="appointment-item">
                                        <div class="appointment-header">
                                            <div>
                                                <div class="appointment-title">Revisión de Seguridad</div>
                                                <div class="appointment-date">22 de Mayo, 2024 - 09:00 AM</div>
                                            </div>
                                            <span class="appointment-status status-pending">Pendiente</span>
                                        </div>
                                        <p><strong>Motocicleta:</strong> KTM 790 Adventure</p>
                                        <p><strong>Servicio:</strong> Revisión completa de sistemas de seguridad</p>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-sm btn-outline-secondary me-2">Reagendar</button>
                                            <button class="btn btn-sm btn-outline-danger">Cancelar</button>
                                        </div>
                                    </div>
                                    
                                    <div class="appointment-item">
                                        <div class="appointment-header">
                                            <div>
                                                <div class="appointment-title">Instalación Accesorios</div>
                                                <div class="appointment-date">30 de Mayo, 2024 - 02:00 PM</div>
                                            </div>
                                            <span class="appointment-status status-confirmed">Confirmada</span>
                                        </div>
                                        <p><strong>Motocicleta:</strong> KTM 390 Duke</p>
                                        <p><strong>Servicio:</strong> Instalación de luces auxiliares y guardabarros</p>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-sm btn-outline-secondary me-2">Reagendar</button>
                                            <button class="btn btn-sm btn-outline-danger">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <!-- Información del Taller -->
                            <div class="dashboard-card">
                                <div class="card-title">Información del Taller</div>
                                
                                <div class="mb-3">
                                    <h6><i class="fas fa-map-marker-alt text-primary me-2"></i> Ubicación</h6>
                                    <p class="mb-2">KTM Taller Central</p>
                                    <p class="text-muted small">Calle de la Moto 123, Madrid, España</p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6><i class="fas fa-clock text-primary me-2"></i> Horario de Atención</h6>
                                    <p class="mb-1"><strong>Lunes a Viernes:</strong> 9:00 - 18:00</p>
                                    <p class="mb-1"><strong>Sábados:</strong> 9:00 - 14:00</p>
                                    <p class="mb-0"><strong>Domingos:</strong> Cerrado</p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6><i class="fas fa-phone text-primary me-2"></i> Contacto</h6>
                                    <p class="mb-1"><strong>Teléfono:</strong> +34 91 123 45 67</p>
                                    <p class="mb-0"><strong>Email:</strong> taller@ktmrocketservice.com</p>
                                </div>
                                
                                <div>
                                    <h6><i class="fas fa-info-circle text-primary me-2"></i> Notas Importantes</h6>
                                    <ul class="small text-muted">
                                        <li>Las citas deben agendarse con al menos 24 horas de antelación.</li>
                                        <li>Por favor, llegue 10 minutos antes de su cita.</li>
                                        <li>Cancelaciones con menos de 24 horas pueden tener cargos.</li>
                                        <li>Traer documentación de la motocicleta.</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Calendario -->
                            <div class="dashboard-card mt-4">
                                <div class="card-title">Calendario</div>
                                
                                <div id="calendar-preview" class="text-center">
                                    <div class="mb-2">
                                        <button id="prev-month" class="btn btn-sm btn-outline-primary"><i class="fas fa-chevron-left"></i></button>
                                        <span class="mx-3 fw-bold" id="current-month">Mayo 2024</span>
                                        <button id="next-month" class="btn btn-sm btn-outline-primary"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <div class="calendar-grid">
                                        <!-- Este es un calendario simple, en una app real usarías una librería -->
                                        <div class="d-flex justify-content-between small text-muted mb-2">
                                            <span>L</span><span>M</span><span>X</span><span>J</span><span>V</span><span>S</span><span>D</span>
                                        </div>
                                        <div class="calendar-days">
                                            <!-- Días del mes - simplificado -->
                                            <!-- En una implementación real, generarías los días dinámicamente -->
                                            <span class="day empty"></span>
                                            <span class="day">1</span>
                                            <span class="day">2</span>
                                            <span class="day">3</span>
                                            <span class="day">4</span>
                                            <span class="day">5</span>
                                            <span class="day">6</span>
                                            <span class="day">7</span>
                                            <span class="day">8</span>
                                            <span class="day">9</span>
                                            <span class="day">10</span>
                                            <span class="day">11</span>
                                            <span class="day">12</span>
                                            <span class="day">13</span>
                                            <span class="day">14</span>
                                            <span class="day appointment-day">15</span>
                                            <span class="day">16</span>
                                            <span class="day">17</span>
                                            <span class="day">18</span>
                                            <span class="day">19</span>
                                            <span class="day">20</span>
                                            <span class="day">21</span>
                                            <span class="day appointment-day">22</span>
                                            <span class="day">23</span>
                                            <span class="day">24</span>
                                            <span class="day">25</span>
                                            <span class="day">26</span>
                                            <span class="day">27</span>
                                            <span class="day">28</span>
                                            <span class="day">29</span>
                                            <span class="day appointment-day">30</span>
                                            <span class="day">31</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3 small text-muted">
                                    <p class="mb-1"><span class="badge bg-primary me-1"></span> Días con citas programadas</p>
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
            
            // Manejo de fechas mínimas en el formulario
            const fechaInput = document.getElementById('fecha');
            if (fechaInput) {
                // Establecer la fecha mínima como hoy
                const today = new Date().toISOString().split('T')[0];
                fechaInput.setAttribute('min', today);
                
                // Establecer una fecha por defecto (por ejemplo, mañana)
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                const tomorrowFormatted = tomorrow.toISOString().split('T')[0];
                fechaInput.value = tomorrowFormatted;
            }
            
            // Calendario simple - navegación de meses (simulada)
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                              "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            
            let currentMonth = 4; // Mayo (0-indexed)
            let currentYear = 2024;
            
            document.getElementById('prev-month')?.addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                updateCalendarDisplay();
            });
            
            document.getElementById('next-month')?.addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                updateCalendarDisplay();
            });
            
            function updateCalendarDisplay() {
                document.getElementById('current-month').textContent = 
                    `${monthNames[currentMonth]} ${currentYear}`;
            }
            
            // Manejo de cancelación de citas
            document.querySelectorAll('.btn-outline-danger').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('¿Está seguro de que desea cancelar esta cita?')) {
                        // Aquí iría la lógica para cancelar la cita
                        const appointmentItem = this.closest('.appointment-item');
                        appointmentItem.style.opacity = '0.5';
                        this.disabled = true;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Cancelando...';
                        
                        // Simular una solicitud AJAX
                        setTimeout(() => {
                            appointmentItem.remove();
                            alert('Cita cancelada correctamente');
                        }, 1000);
                    }
                });
            });
        });
    </script>
    
    <style>
        .calendar-grid {
            font-size: 0.9rem;
        }
        
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        
        .day {
            padding: 8px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .day:hover {
            background-color: #f0f0f0;
        }
        
        .appointment-day {
            background-color: #ff6600;
            color: white;
            font-weight: bold;
        }
        
        .day.empty {
            visibility: hidden;
        }
    </style>
</body>
</html>