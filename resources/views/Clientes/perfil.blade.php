<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - KTM Rocket Service</title>
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
        
        .profile-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6600, #ff8c42);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            margin-right: 30px;
        }
        
        .profile-info h3 {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .profile-info p {
            color: #666;
            margin-bottom: 10px;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 12px 15px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
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
        
        .info-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-label {
            font-weight: 600;
            color: #555;
            min-width: 150px;
        }
        
        .info-value {
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
            
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-avatar {
                margin-right: 0;
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
                            <a href="{{ route('cliente.perfil') }}" class="active">
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
                        <h2 class="mb-0">Mi Perfil</h2>
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al Dashboard
                        </a>
                    </div>
                    
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="profile-info">
                                <h3>{{ $cliente->nombre ?? 'Nombre de Cliente' }}</h3>
                                <p>{{ $cliente->email ?? 'cliente@ejemplo.com' }}</p>
                                <p class="text-muted">Cliente desde: {{ $cliente->fecha_registro ?? 'Enero 2023' }}</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('cliente.perfil.actualizar') }}" method="POST" id="profileForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre ?? 'Nombre de Cliente' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email ?? 'cliente@ejemplo.com' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono ?? '+34 123 456 789' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion ?? 'Calle Principal 123, Ciudad' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI/NIE</label>
                                    <input type="text" class="form-control" id="dni" name="dni" value="{{ $cliente->dni ?? '12345678A' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $cliente->fecha_nacimiento ?? '1990-01-01' }}">
                                </div>
                            </div>
                            
                            <h5 class="mt-4 mb-3">Cambiar Contraseña</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="password_actual" class="form-label">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="password_actual" name="password_actual">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="nueva_password" class="form-label">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="nueva_password" name="nueva_password">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="confirmar_password" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="confirmar_password" name="confirmar_password">
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary" id="cancelBtn">
                                    <i class="fas fa-times me-2"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="profile-card">
                        <h4 class="mb-4">Información Adicional</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item d-flex">
                                    <div class="info-label">ID de Cliente:</div>
                                    <div class="info-value ms-3">{{ $cliente->id ?? 'CL-2023-001' }}</div>
                                </div>
                                <div class="info-item d-flex">
                                    <div class="info-label">Tipo de Cliente:</div>
                                    <div class="info-value ms-3">Particular</div>
                                </div>
                                <div class="info-item d-flex">
                                    <div class="info-label">Estado de Cuenta:</div>
                                    <div class="info-value ms-3">
                                        <span class="badge bg-success">Activa</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item d-flex">
                                    <div class="info-label">Total Órdenes:</div>
                                    <div class="info-value ms-3">24</div>
                                </div>
                                <div class="info-item d-flex">
                                    <div class="info-label">Servicios Activos:</div>
                                    <div class="info-value ms-3">3</div>
                                </div>
                                <div class="info-item d-flex">
                                    <div class="info-label">Membresía:</div>
                                    <div class="info-value ms-3">Premium</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profile-card">
                        <h4 class="mb-4">Mis Vehículos</h4>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Matrícula</th>
                                        <th>Año</th>
                                        <th>Último Servicio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>KTM 1290 Super Duke R</td>
                                        <td>1234-ABC</td>
                                        <td>2022</td>
                                        <td>10/05/2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>KTM 790 Adventure</td>
                                        <td>5678-DEF</td>
                                        <td>2021</td>
                                        <td>15/04/2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <button class="btn btn-outline-primary mt-3">
                            <i class="fas fa-plus me-2"></i> Agregar Nuevo Vehículo
                        </button>
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
            const profileForm = document.getElementById('profileForm');
            const cancelBtn = document.getElementById('cancelBtn');
            
            // Manejar envío del formulario (ya no se necesita preventDefault porque es un formulario real)
            // profileForm.addEventListener('submit', function(e) {
            //     e.preventDefault();
            //     // Aquí iría la lógica para guardar los cambios
            //     alert('Cambios guardados correctamente');
            //     // En una aplicación real, aquí se enviaría el formulario al servidor
            // });
            
            // Manejar botón cancelar
            cancelBtn.addEventListener('click', function() {
                if (confirm('¿Estás seguro de que quieres cancelar los cambios?')) {
                    // Recargar la página para descartar cambios
                    window.location.reload();
                }
            });
        });
    </script>
</body>
</html>