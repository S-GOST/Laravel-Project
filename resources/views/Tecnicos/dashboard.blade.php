<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Tecnicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --ktm-orange: #FF6600;
            --ktm-orange-light: #FF8C42;
            --ktm-black: #1A1A1A;
            --ktm-gray: #2D2D2D;
            --ktm-light-gray: #F5F5F5;
            --ktm-accent: #E84910;
        }

        body {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23FF6600' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }

        /* NAVBAR */
        .navbar-ktm {
            background: rgba(26, 26, 26, 0.95) !important;
            border-bottom: 3px solid var(--ktm-orange);
            backdrop-filter: blur(10px);
            padding: 12px 0;
            box-shadow: 0 4px 20px rgba(255, 102, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            color: #fff !important;
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 40px;
            height: 40px;
            margin-right: 12px;
            border-radius: 4px;
        }

        .navbar-text {
            color: #ddd !important;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .navbar-text strong {
            color: var(--ktm-orange);
        }

        .btn-logout {
            background: transparent;
            border: 2px solid var(--ktm-orange);
            color: var(--ktm-orange);
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: var(--ktm-orange);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
        }

        /* CONTENEDOR PRINCIPAL */
        .main-container {
            padding: 30px 0;
        }

        /* BARRA LATERAL */
        .sidebar {
            background: rgba(45, 45, 45, 0.8);
            border-radius: 16px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            backdrop-filter: blur(10px);
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            height: fit-content;
        }

        .user-profile {
            text-align: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 102, 0, 0.2);
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-accent));
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: #000;
            font-weight: bold;
            border: 4px solid rgba(255, 255, 255, 0.1);
        }

        .user-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 5px;
        }

        .user-role {
            color: var(--ktm-orange);
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* MENÚ LATERAL */
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #ddd;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 102, 0, 0.15);
            color: #fff;
            border-left: 4px solid var(--ktm-orange);
            transform: translateX(5px);
        }

        .sidebar-menu i {
            width: 25px;
            margin-right: 15px;
            font-size: 1.2rem;
            color: var(--ktm-orange);
        }

        .sidebar-menu span {
            font-weight: 500;
            flex-grow: 1;
        }

        .menu-badge {
            background: var(--ktm-orange);
            color: #000;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        /* CONTENIDO PRINCIPAL */
        .content-area {
            padding-left: 30px;
        }

        .ktm-card {
            background: rgba(45, 45, 45, 0.8);
            border-radius: 16px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
            height: 100%;
        }

        .ktm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 102, 0, 0.2);
        }

        .card-header-ktm {
            background: linear-gradient(90deg, var(--ktm-black) 0%, var(--ktm-orange) 100%);
            border-bottom: 3px solid var(--ktm-orange);
            padding: 20px 30px;
            position: relative;
            overflow: hidden;
        }

        .card-header-ktm h3 {
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .card-content {
            padding: 30px;
        }

        /* MÓDULOS DE GESTIÓN */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .module-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .module-card:hover {
            border-color: var(--ktm-orange);
            background: rgba(255, 102, 0, 0.1);
            transform: translateY(-5px);
        }

        .module-icon {
            font-size: 2.5rem;
            color: var(--ktm-orange);
            margin-bottom: 15px;
            background: rgba(255, 102, 0, 0.1);
            width: 70px;
            height: 70px;
            line-height: 70px;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .module-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .module-desc {
            color: #aaa;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* CHECKBOXES */
        .checklist {
            margin-top: 25px;
        }

        .check-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .check-item:hover {
            background: rgba(255, 102, 0, 0.1);
            border-left: 4px solid var(--ktm-orange);
            transform: translateX(5px);
        }

        .check-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            accent-color: var(--ktm-orange);
            cursor: pointer;
        }

        .check-item label {
            font-weight: 500;
            color: #ddd;
            cursor: pointer;
            flex-grow: 1;
        }

        .check-status {
            background: var(--ktm-orange);
            color: #000;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-left: 10px;
        }

        /* SEPARADOR */
        .ktm-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
            margin: 25px 0;
        }

        /* BOTÓN PANEL */
        .btn-panel-ktm {
            background: linear-gradient(90deg, var(--ktm-orange) 0%, var(--ktm-accent) 100%);
            color: #000;
            font-weight: 800;
            font-size: 1.1rem;
            padding: 14px 30px;
            border-radius: 50px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.4);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .btn-panel-ktm::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .btn-panel-ktm:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 102, 0, 0.6);
            color: #000;
        }

        .btn-panel-ktm:hover::before {
            left: 100%;
        }

        .btn-panel-ktm i {
            margin-left: 10px;
            font-size: 1.2rem;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .content-area {
                padding-left: 0;
                margin-top: 30px;
            }
            
            .modules-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .modules-grid {
                grid-template-columns: 1fr;
            }
            
            .user-avatar {
                width: 100px;
                height: 100px;
                font-size: 2rem;
            }
            
            .user-name {
                font-size: 1.5rem;
            }
        }

        /* ESTADÍSTICAS */
        .stats-card {
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--ktm-orange);
            margin: 10px 0;
        }

        .stats-label {
            color: #ddd;
            font-weight: 500;
            font-size: 1rem;
        }

        /* Información del usuario en navbar */
        .user-info-navbar {
            background: rgba(255, 102, 0, 0.1);
            padding: 5px 15px;
            border-radius: 20px;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-ktm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/rock.png') }}" alt="Rock Logo" class="logo-img">
                ¡Hola! BIENVENIDO
            </a>
            
            <div class="navbar-nav ms-auto align-items-center">
                <div class="nav-item">
                    <span class="navbar-text me-4 d-none d-md-block user-info-navbar">
                        <i class="fas fa-user-circle me-2"></i>
                        <strong>{{ Auth::user()->Nombre ?? Auth::guard('tecnico')->user()->Nombre ?? 'Usuario' }}</strong>
                    </span>
                </div>
                
                <div class="nav-item">
                    <form id="logout-form" action="{{ route('tecnico.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="button" id="btnSalir" class="btn btn-logout">
                            <i class="fa-solid fa-power-off me-2"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container main-container">
        <div class="row">
            <!-- BARRA LATERAL -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <!-- Mostrar iniciales del usuario -->
                            @php
                                $userName = Auth::user()->Nombre ?? Auth::guard('admin')->user()->Nombre ?? 'Usuario';
                                $initials = '';
                                $nameParts = explode(' ', $userName);
                                foreach($nameParts as $part) {
                                    if(!empty($part)) {
                                        $initials .= strtoupper(substr($part, 0, 1));
                                    }
                                }
                                if(strlen($initials) > 2) {
                                    $initials = substr($initials, 0, 2);
                                }
                            @endphp
                            {{ $initials }}
                        </div>
                        <h2 class="user-name">{{ $userName }}</h2>
                        <div class="user-role">
                            <i class="fas fa-shield-alt me-2"></i>
                            @if(Auth::guard('admin')->check())
                                Tecnico del Sistema
                            @elseif(Auth::check())
                                Usuario Autenticado
                            @else
                                Invitado
                            @endif
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                        <li>
                            <a href="#" class="active">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Panel de inicio</span>
                                <span class="menu-badge">ACTIVO</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-cog"></i>
                                <span>Configuración</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-history"></i>
                                <span>Historial</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-question-circle"></i>
                                <span>Ayuda y Soporte</span>
                            </a>
                        </li>
                    </ul>

                    <div class="stats-card">
                        <div class="stats-number">
                            @php
                                // Esto es un ejemplo, deberías obtener el número real de usuarios
                                $activeUsers = 8; // Reemplazar con consulta real
                            @endphp
                            {{ $activeUsers }}
                        </div>
                        <div class="stats-label">Usuarios Activos</div>
                        <p class="mt-2" style="color: #aaa; font-size: 0.9rem;">En el sistema actualmente</p>
                    </div>
                </div>
            </div>

            <!-- CONTENIDO PRINCIPAL -->
            <div class="col-lg-8 content-area">
                <!-- TARJETA PRINCIPAL -->
                <div class="ktm-card">
                    <div class="card-header-ktm">
                        <h3>
                            <i class="fas fa-tasks me-3"></i>
                            MÓDULOS DE GESTIÓN
                        </h3>
                    </div>
                    
                    <div class="card-content">
                        <h4 class="mb-4" style="color: var(--ktm-orange); font-weight: 700;">
                            <i class="fas fa-list-check me-2"></i>Gestionar usuarios
                        </h4>
                        
                        <div class="modules-grid">
                            <div class="module-card">
                                <div class="module-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <h4 class="module-title">Órdenes de Servicio</h4>
                                <p class="module-desc">Crear, editar y gestionar órdenes de servicio técnico</p>
                            </div>
                            
                            <div class="module-card">
                                <div class="module-icon">
                                    <i class="fas fa-user-gear"></i>
                                </div>
                                <h4 class="module-title">Técnicos</h4>
                                <p class="module-desc">Administrar técnicos y asignar servicios</p>
                            </div>
                            
                            <div class="module-card">
                                <div class="module-icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <h4 class="module-title">Productos</h4>
                                <p class="module-desc">Gestionar inventario y catálogo de productos</p>
                            </div>
                            
                            <div class="module-card">
                                <div class="module-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h4 class="module-title">Reportes</h4>
                                <p class="module-desc">Estadísticas y reportes del sistema</p>
                            </div>
                        </div>

                        <div class="ktm-divider"></div>

                        <div class="checklist">
                            <div class="check-item">
                                <input type="checkbox" id="check1">
                                <label for="check1">Gestionar orden servicio</label>
                                <span class="check-status">PENDIENTE</span>
                            </div>
                            
                            <div class="check-item">
                                <input type="checkbox" id="check2">
                                <label for="check2">Gestionar técnicos</label>
                                <span class="check-status">PENDIENTE</span>
                            </div>
                            
                            <div class="check-item">
                                <input type="checkbox" id="check3">
                                <label for="check3">Gestionar productos</label>
                                <span class="check-status">PENDIENTE</span>
                            </div>
                            
                            <div class="check-item">
                                <input type="checkbox" id="check4">
                                <label for="check4">Reportes y estadísticas</label>
                                <span class="check-status">PENDIENTE</span>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-panel-ktm">
                                <i class="fas fa-play me-2"></i> Iniciar Gestión
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- TARJETA DE INFORMACIÓN -->
                <div class="ktm-card">
                    <div class="card-header-ktm">
                        <h3>
                            <i class="fas fa-info-circle me-3"></i>
                            INFORMACIÓN DEL SISTEMA
                        </h3>
                    </div>
                    
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <i class="fas fa-server"></i>
                                    <strong>Estado del Sistema:</strong>
                                    <span class="text-success">✓ Operativo</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <i class="fas fa-shield"></i>
                                    <strong>Seguridad:</strong>
                                    <span class="text-success">Alta</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <i class="fas fa-desktop"></i>
                                    <strong>Sistema Operativo:</strong>
                                    <span>Windows</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <strong>Última Actualización:</strong>
                                    <span>Hoy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center py-4" style="border-top: 1px solid rgba(255, 102, 0, 0.2);">
        <div class="container">
            <p class="mb-2" style="color: #aaa;">
                <strong>S-GOST</strong> - Sistema y gestión de órdenes de servicio técnicos Rocket Service 
                <span class="d-block d-md-inline">
                    | <i class="fas fa-copyright mx-2"></i> {{ date('Y') }} Todos los derechos reservados
                </span>
            </p>
            <p style="color: var(--ktm-orange-light); font-size: 0.9rem;">
                <i class="fas fa-bolt me-2"></i>Potenciado con tecnología
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hover en módulos
            const modules = document.querySelectorAll('.module-card');
            modules.forEach(module => {
                module.addEventListener('mouseenter', () => {
                    module.style.transform = 'translateY(-8px)';
                    module.style.boxShadow = '0 15px 30px rgba(255, 102, 0, 0.3)';
                });
                module.addEventListener('mouseleave', () => {
                    module.style.transform = 'translateY(0)';
                    module.style.boxShadow = 'none';
                });
            });

            // Checkboxes interactivos
            const checkboxes = document.querySelectorAll('.check-item input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const status = this.parentElement.querySelector('.check-status');
                    if (this.checked) {
                        status.textContent = 'COMPLETADO';
                        status.style.background = '#4CAF50';
                    } else {
                        status.textContent = 'PENDIENTE';
                        status.style.background = 'var(--ktm-orange)';
                    }
                });
            });

            // Botón de gestión
            const btnGestion = document.querySelector('.btn-panel-ktm');
            if(btnGestion){
                btnGestion.addEventListener('click', function(){
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Procesando...';
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-play me-2"></i> Iniciar Gestión <i class="fas fa-arrow-right ms-2"></i>';
                        Swal.fire({
                            title: 'Gestión Iniciada',
                            text: 'Los módulos están ahora disponibles',
                            icon: 'success',
                            background: '#1a1a1a',
                            color: '#fff',
                            confirmButtonColor: '#FF6D1F'
                        });
                    }, 1500);
                });
            }

            // Logout SweetAlert
            const btnSalir = document.getElementById('btnSalir');
            const logoutForm = document.getElementById('logout-form');
            btnSalir.addEventListener('click', function() {
                Swal.fire({
                    title: '¿Cerrar sesión?',
                    text: 'Tu sesión actual se cerrará.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, salir',
                    cancelButtonText: 'Cancelar',
                    background: '#1a1a1a',
                    color: '#fff',
                    confirmButtonColor: '#FF6D1F',
                    cancelButtonColor: '#555',
                }).then(result => {
                    if(result.isConfirmed) {
                        logoutForm.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>