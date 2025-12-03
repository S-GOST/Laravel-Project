<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SOMEMAS</title>
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

        /* Logo reemplazado por imagen */
        .navbar-brand::before {
            content: "";
            display: inline-block;
            width: 40px;
            height: 40px;
            background-image: url('img/rock.png');
            background-size: cover;
            background-position: center;
            margin-right: 12px;
            border-radius: 4px;
        }

        .navbar-brand::after {
            content: ""; /* quitamos texto KTM */
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

        /* TARJETA PRINCIPAL */
        .ktm-card {
            background: rgba(45, 45, 45, 0.8);
            border-radius: 16px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
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

        .card-header-ktm::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .card-header-ktm h5 {
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* CONTENIDO DE LA TARJETA */
        .info-container {
            padding: 30px;
        }

        .info-item {
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid var(--ktm-orange);
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 0 8px 8px 0;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(255, 102, 0, 0.1);
            transform: translateX(5px);
        }

        .info-item i {
            color: var(--ktm-orange);
            font-size: 1.2rem;
            width: 30px;
            margin-right: 15px;
        }

        .info-item strong {
            color: var(--ktm-orange-light);
            min-width: 180px;
            display: inline-block;
        }

        .info-item span {
            color: #ddd;
            font-weight: 500;
        }

        /* BOTÓN PANEL */
        .btn-panel-ktm {
            background: linear-gradient(90deg, var(--ktm-orange) 0%, var(--ktm-accent) 100%);
            color: #000;
            font-weight: 800;
            font-size: 1.2rem;
            padding: 16px 40px;
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
            margin-top: 20px;
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
            font-size: 1.4rem;
        }

        /* ELEMENTOS DECORATIVOS KTM */
        .ktm-badge {
            display: inline-block;
            background: var(--ktm-orange);
            color: #000;
            font-weight: 800;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.9rem;
            margin-left: 10px;
            vertical-align: middle;
        }

        .ktm-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
            margin: 25px 0;
        }

        /* MOTOCROSS ELEMENT */
        .motocross-icon {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 4rem;
            color: rgba(255, 102, 0, 0.1);
            z-index: 1;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-item strong {
                min-width: auto;
                margin-bottom: 5px;
            }

            .motocross-icon {
                display: none;
            }

            .btn-panel-ktm {
                width: 100%;
                padding: 14px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-ktm sticky-top">
        <div class="container">
                <img src="{{ asset('img/rock.png') }}" 
         alt="Rock Logo" 
         class="mb-3"
         style="width:70px; height:auto; filter: drop-shadow(0 0 10px #ff6600);">
            <a class="navbar-brand" href="#">
                ¡Hola!<span class="ktm-badge">BIENVENIDO</span>
            </a>
            
            <div class="navbar-nav ms-auto align-items-center">
                <div class="nav-item">
                    <span class="navbar-text me-4 d-none d-md-block">
                        <i class="fas fa-user-circle me-2"></i>
                        <strong>{{ Auth::guard('admin')->user()->Nombre }}</strong>
                    </span>
                </div>
                
                <div class="nav-item">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
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
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="ktm-card">
                    <div class="card-header-ktm">
                        <h5>
                            <i class="fas fa-id-card me-3"></i>
                            INFORMACIÓN DEL ADMINISTRADOR
                        </h5>
                        <div class="motocross-icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                    </div>
                    
                    <div class="info-container">
                        <div class="info-item">
                            <i class="fas fa-id-badge"></i>
                            <strong>ID Administrador:</strong>
                            <span>{{ Auth::guard('admin')->user()->ID_ADMINISTRADOR }}</span>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-user"></i>
                            <strong>Nombre:</strong>
                            <span>{{ Auth::guard('admin')->user()->Nombre }}</span>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <strong>Correo Electrónico:</strong>
                            <span>{{ Auth::guard('admin')->user()->Correo }}</span>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-file-alt"></i>
                            <strong>Tipo de Documento:</strong>
                            <span>{{ Auth::guard('admin')->user()->TipoDocumento }}</span>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <strong>Teléfono:</strong>
                            <span>{{ Auth::guard('admin')->user()->Telefono }}</span>
                        </div>
                        
                        <div class="ktm-divider"></div>
                        
                        <div class="text-center">
                            <a href="{{ route('panel') }}" class="btn btn-panel-ktm">
                                <i class="fas fa-tachometer-alt me-2"></i> Ir al Panel de Gestión
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            
                            <p class="mt-3 text-muted">
                                <i class="fas fa-info-circle me-2"></i>
                                Accede al panel completo para gestionar todos los aspectos del sistema
                            </p>
                        </div>
                    </div>
                </div>

                <!-- TARJETAS ADICIONALES -->
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="ktm-card h-100">
                            <div class="info-container text-center">
                                <i class="fas fa-users fa-3x mb-3" style="color: var(--ktm-orange);"></i>
                                <h5 class="fw-bold">Usuarios Activos</h5>
                                <h2 class="fw-bold" style="color: var(--ktm-orange);">8</h2>
                                <p class="text-muted">Gestionados en el sistema</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="ktm-card h-100">
                            <div class="info-container text-center">
                                <i class="fas fa-cogs fa-3x mb-3" style="color: var(--ktm-orange);"></i>
                                <h5 class="fw-bold">Sistema</h5>
                                <h2 class="fw-bold" style="color: var(--ktm-orange);">Operativo</h2>
                                <h5 class="fw-bold">Windows</h5>
                                <p class="text-muted">Estado: <span class="text-success">✓ Estable</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="ktm-card h-100">
                            <div class="info-container text-center">
                                <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--ktm-orange);"></i>
                                <h5 class="fw-bold">Seguridad</h5>
                                <h2 class="fw-bold" style="color: var(--ktm-orange);">Alta</h2>
                                <p class="text-muted">Protección activada</p>
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
                    | <i class="fas fa-copyright mx-2"></i> 2025 Todos los derechos reservados
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
            // Hover info-items
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach(item => {
                item.addEventListener('mouseenter', () => item.style.boxShadow = '0 5px 15px rgba(255, 102, 0, 0.2)');
                item.addEventListener('mouseleave', () => item.style.boxShadow = 'none');
            });

            // Botón panel
            const mainButton = document.querySelector('.btn-panel-ktm');
            if(mainButton){
                mainButton.addEventListener('click', function(){
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Redirigiendo...';
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-tachometer-alt me-2"></i> Ir al Panel de Gestión <i class="fas fa-arrow-right ms-2"></i>';
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
                    if(result.isConfirmed) logoutForm.submit();
                });
            });
        });
    </script>
</body>
</html>
