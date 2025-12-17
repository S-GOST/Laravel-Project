<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Gestión | KTM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Colores KTM */
        :root {
            --ktm-orange: #FF6D1F;
            --ktm-orange-light: #ff8a4d;
            --ktm-dark: #0c0c0c;
            --ktm-gray: #1a1a1a;
            --ktm-gray-light: #2a2a2a;
        }

        body {
            background: var(--ktm-dark);
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        header {
            background: linear-gradient(90deg, var(--ktm-dark) 0%, var(--ktm-gray) 100%);
            border-bottom: 3px solid var(--ktm-orange);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 100;
        }

        .logo-img {
            width: 140px;
            filter: drop-shadow(0 0 8px rgba(255, 109, 31, 0.8));
            transition: all 0.3s ease;
        }

        .logo-img:hover {
            transform: scale(1.05);
        }

        .wrapper {
            display: flex;
            min-height: calc(100vh - 80px);
        }

        /* Sidebar mejorado */
        #sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--ktm-gray) 0%, var(--ktm-dark) 100%);
            color: #fff;
            padding: 20px 0;
            border-right: 3px solid var(--ktm-orange);
            box-shadow: 4px 0 15px rgba(255, 109, 31, 0.3);
            position: relative;
            z-index: 90;
            transition: all 0.3s ease;
        }

        #sidebar h5 {
            color: var(--ktm-orange);
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 109, 31, 0.3);
            position: relative;
        }

        #sidebar h5:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 25%;
            width: 50%;
            height: 2px;
            background: var(--ktm-orange);
            box-shadow: 0 0 8px var(--ktm-orange);
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            font-size: 15px;
            font-weight: 500;
            color: #ddd;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 109, 31, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .menu-link i {
            margin-right: 15px;
            color: var(--ktm-orange);
            font-size: 18px;
            width: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .menu-link:hover, .menu-link.active {
            background: linear-gradient(90deg, rgba(255, 109, 31, 0.2) 0%, transparent 100%);
            color: #fff;
            box-shadow: inset 4px 0 0 var(--ktm-orange);
            padding-left: 30px;
        }

        .menu-link:hover i, .menu-link.active i {
            color: #fff;
            transform: scale(1.1);
        }

        .menu-link:after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: all 0.5s ease;
        }

        .menu-link:hover:after {
            left: 100%;
        }

        /* Contenido principal */
        #content {
            flex-grow: 1;
            padding: 30px;
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.9) 0%, rgba(12, 12, 12, 0.95) 100%);
            position: relative;
        }

        #content:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMTA5LDMxLDAuMDUpIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI3BhdHRlcm4pIi8+PC9zdmc+');
            opacity: 0.3;
            z-index: -1;
        }

        h1 {
            color: var(--ktm-orange);
            font-weight: 700;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--ktm-orange);
            box-shadow: 0 0 8px var(--ktm-orange);
        }

        h3 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Workspace mejorado */
        #workspace {
            background: var(--ktm-gray);
            border: 2px solid rgba(255, 109, 31, 0.25);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 109, 31, 0.15);
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        #workspace:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-light));
            box-shadow: 0 0 10px var(--ktm-orange);
        }

        /* Tarjetas de métricas */
        .metric-card {
            background: linear-gradient(135deg, var(--ktm-gray) 0%, var(--ktm-gray-light) 100%);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--ktm-orange);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255, 109, 31, 0.2);
        }

        .metric-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            background: rgba(255, 109, 31, 0.1);
            border-radius: 0 0 0 80px;
        }

        .metric-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--ktm-orange);
            margin-bottom: 5px;
        }

        .metric-label {
            font-size: 0.9rem;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .metric-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.8rem;
            color: rgba(255, 109, 31, 0.3);
        }

        /* Botones KTM */
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(255, 109, 31, 0.3);
            transition: all 0.3s ease;
        }

        .btn-ktm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 109, 31, 0.4);
            color: white;
        }

        .btn-ktm-outline {
            background: transparent;
            border: 2px solid var(--ktm-orange);
            color: var(--ktm-orange);
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-ktm-outline:hover {
            background: var(--ktm-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 109, 31, 0.3);
        }

        /* Tablas KTM */
        .table-ktm {
            background: var(--ktm-gray-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .table-ktm thead {
            background: linear-gradient(90deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);
            color: white;
        }

        .table-ktm tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
        }

        .table-ktm tbody tr:hover {
            background: rgba(255, 109, 31, 0.1);
        }

        /* Scrollbar KTM mejorado */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: var(--ktm-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--ktm-orange), var(--ktm-orange-light));
            border-radius: 6px;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--ktm-orange-light), var(--ktm-orange));
        }

        /* Responsive */
        @media (max-width: 992px) {
            .wrapper {
                flex-direction: column;
            }
            
            #sidebar {
                width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 3px solid var(--ktm-orange);
            }
            
            #content {
                padding: 20px;
            }
        }

        /* Animaciones */
        @keyframes glow {
            0% { box-shadow: 0 0 5px rgba(255, 109, 31, 0.5); }
            50% { box-shadow: 0 0 20px rgba(255, 109, 31, 0.8); }
            100% { box-shadow: 0 0 5px rgba(255, 109, 31, 0.5); }
        }

        .glow-effect {
            animation: glow 2s infinite;
        }
        .ktm-alert {
            background: #ff6600;
            color: #fff;
            padding: 18px;
            border-radius: 10px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            animation: vibrar 0.2s linear 3, fadeOut 1s ease 2s forwards;
        }

        @keyframes vibrar {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            20% { transform: translate(-2px, 0px) rotate(1deg); }
            40% { transform: translate(2px, -1px) rotate(-1deg); }
        }

        @keyframes fadeOut {
            to { opacity: 0; }
        }
    </style>
</head>

<body>

<header class="d-flex justify-content-between align-items-center p-3">
    <div class="d-flex align-items-center">
        <img src="{{ asset('img/rock.png') }}" class="logo-img me-3">
        <h2 class="mb-0 d-none d-md-block" style="color: var(--ktm-orange); font-weight: 700;">PANEL DE GESTIÓN</h2>
    </div>

    <div class="d-flex align-items-center">
        <span class="me-3 d-none d-md-block">Administrador</span>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="button" id="btnSalir" class="btn btn-ktm">
                <i class="fa-solid fa-power-off me-2"></i> Cerrar sesión
            </button>
        </form>
    </div>
</header>

<div class="wrapper">
    <nav id="sidebar">
        <h5 class="text-center">MENÚ DE GESTIÓN</h5>

        <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>
        <a href="{{ route('administradores.index') }}" class="menu-link {{ request()->is('admin/administradores*') ? 'active' : '' }}">
            <i class="fa-solid fa-user-shield"></i> Administradores
        </a>
        <a href="{{ route('admin.tecnicos.index') }}" class="menu-link {{ request()->is('admin/tecnicos*') ? 'active' : '' }}">
            <i class="fa-solid fa-user-gear"></i> Técnicos
        </a>
        <a href="{{ route('admin.clientes.index') }}" class="menu-link {{ request()->is('admin/clientes*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i> Clientes
        </a>
        <a href="{{ route('motos.index') }}" class="menu-link {{ request()->is('motos*') ? 'active' : '' }}">
            <i class="fa-solid fa-motorcycle"></i> Motos
        </a>
        <a href="{{ route('servicios.index') }}" class="menu-link {{ request()->is('servicios*') ? 'active' : '' }}">
            <i class="fa-solid fa-screwdriver-wrench"></i> Servicios
        </a>
        <a href="{{ route('productos.index') }}" class="menu-link {{ request()->is('productos*') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i> Productos
        </a>
        <a href="{{ route('orden_servicio.index') }}" class="menu-link {{ request()->is('orden_servicio*') ? 'active' : '' }}">
            <i class="fa-solid fa-file-signature"></i> Órdenes de Servicio
        </a>
        <a href="{{ route('detalles_orden_servicio.index') }}" class="menu-link {{ request()->is('detalles_orden_servicio*') ? 'active' : '' }}">
            <i class="fa-solid fa-list-check"></i> Detalles Orden
        </a>
        <a href="{{ route('informe.index') }}" class="menu-link {{ request()->is('informe*') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-pie"></i> Informe
        </a>
        <a href="{{ route('comprobante.index') }}" class="menu-link {{ request()->is('comprobante*') ? 'active' : '' }}">
            <i class="fa-solid fa-receipt"></i> Comprobantes
        </a>
        <a href="{{ route('historial.index') }}" class="menu-link {{ request()->is('historial*') ? 'active' : '' }}">
            <i class="fa-solid fa-clock-rotate-left"></i> Historial
        </a>
    </nav>

    <div id="content">
        @yield('content')
    </div>
</div>

<div id="ktmMessage" class="ktm-alert" style="display:none;">
    Acción realizada con éxito 🏍️🔥
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Activar elemento del menú al hacer clic
    document.addEventListener('DOMContentLoaded', function() {
        const menuLinks = document.querySelectorAll('.menu-link');
        
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                menuLinks.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    
    document.getElementById('btnSalir').addEventListener('click', function () {
        Swal.fire({
            title: "¿Salir del sistema?",
            text: "Tu sesión será cerrada.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF6D1F",
            cancelButtonColor: "#333",
            confirmButtonText: "Sí, salir",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
    
    function showKTMMessage() {
        document.getElementById('ktmMessage').style.display = 'block';
    }
    
    // Verificar si hay mensajes de éxito en la sesión
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#FF6D1F',
            timer: 3000
        });
    @endif
    
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#FF6D1F'
        });
    @endif
</script>
<!-- MODAL DASHBOARD -->
<div class="modal fade" id="dashboardModal" tabindex="-1" aria-labelledby="dashboardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background: var(--ktm-gray); color: white;">
            <div class="modal-header" style="background: linear-gradient(90deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-gauge-high me-2"></i> Dashboard - Resumen del Sistema
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Estadísticas principales -->
                    <div class="col-md-3 mb-4">
                        <div class="metric-card text-center">
                            <div class="metric-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="metric-value" id="clientesCount">0</div>
                            <div class="metric-label">Clientes</div>
                            <small class="text-muted">Registrados en el sistema</small>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="metric-card text-center">
                            <div class="metric-icon">
                                <i class="fa-solid fa-motorcycle"></i>
                            </div>
                            <div class="metric-value" id="motosCount">0</div>
                            <div class="metric-label">Motos</div>
                            <small class="text-muted">Registradas</small>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="metric-card text-center">
                            <div class="metric-icon">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <div class="metric-value" id="serviciosCount">0</div>
                            <div class="metric-label">Servicios</div>
                            <small class="text-muted">Realizados este mes</small>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="metric-card text-center">
                            <div class="metric-icon">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                            </div>
                            <div class="metric-value" id="ordenesCount">0</div>
                            <div class="metric-label">Órdenes</div>
                            <small class="text-muted">Pendientes</small>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow" style="background: var(--ktm-gray-light);">
                            <div class="card-header" style="background: rgba(255, 109, 31, 0.2);">
                                <h6 class="mb-0"><i class="fa-solid fa-chart-line me-2"></i> Actividad Reciente</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush" id="actividadList">
                                    <li class="list-group-item" style="background: transparent; color: #ccc; border-color: rgba(255,255,255,0.1);">
                                        <i class="fa-solid fa-clock me-2"></i> Cargando actividad...
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow" style="background: var(--ktm-gray-light);">
                            <div class="card-header" style="background: rgba(255, 109, 31, 0.2);">
                                <h6 class="mb-0"><i class="fa-solid fa-bell me-2"></i> Notificaciones</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush" id="notificacionesList">
                                    <li class="list-group-item" style="background: transparent; color: #ccc; border-color: rgba(255,255,255,0.1);">
                                        <i class="fa-solid fa-check-circle me-2"></i> Sistema funcionando correctamente
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-info border-0" style="background: rgba(23, 162, 184, 0.2);">
                            <i class="fa-solid fa-lightbulb me-2"></i>
                            <strong>Consejo:</strong> Usa el menú lateral para navegar entre las diferentes secciones del sistema.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid rgba(255, 109, 31, 0.2);">
                <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark me-1"></i> Cerrar
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-ktm">
                    <i class="fa-solid fa-external-link-alt me-1"></i> Ir al Dashboard Completo
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>