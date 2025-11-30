{{-- resources/views/auth/admin-login.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrador - KTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-black: #000000;
            --ktm-gray: #2a2a2a;
            --ktm-light: #f8f9fa;
        }
        
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-gray) 100%);
            padding: 3rem 2rem 2rem;
            text-align: center;
            position: relative;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .ktm-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: var(--ktm-orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 8px 20px rgba(255, 102, 0, 0.3);
        }
        
        .login-header h1 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }
        
        .login-header .subtitle {
            color: var(--ktm-orange);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        .login-body {
            padding: 2.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--ktm-gray);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            display: block;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            border-color: var(--ktm-orange);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
            background: white;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 3;
        }
        
        .input-with-icon .form-control {
            padding-left: 45px;
        }
        
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange) 0%, #e65c00 100%);
            border: none;
            border-radius: 10px;
            padding: 14px 20px;
            font-weight: 600;
            color: white;
            font-size: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-ktm:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 102, 0, 0.3);
            background: linear-gradient(135deg, #e65c00 0%, var(--ktm-orange) 100%);
        }
        
        .register-section {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }
        
        .register-link {
            color: var(--ktm-orange);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .register-link:hover {
            color: var(--ktm-black);
        }
        
        .error-alert {
            border-radius: 10px;
            border: 1px solid rgba(220, 53, 69, 0.2);
            background: rgba(220, 53, 69, 0.05);
        }
        
        .security-notice {
            background: rgba(255, 102, 0, 0.05);
            border: 1px solid rgba(255, 102, 0, 0.2);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: #666;
        }
        
        .security-notice i {
            color: var(--ktm-orange);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="header-content">
                    <div class="ktm-logo">KTM</div>
                    <h1>KTM</h1>
                    <div class="subtitle">Sistema de Administración</div>
                </div>
            </div>
            
            <div class="login-body">
                @if ($errors->any())
                    <div class="alert alert-danger error-alert mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Error de acceso</strong>
                        </div>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach ($errors->all() as $error)
                                <li class="small">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="Usuario" class="form-label">Usuario</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" 
                                   class="form-control" 
                                   id="Usuario" 
                                   name="Usuario" 
                                   required 
                                   value="{{ old('Usuario') }}"
                                   placeholder="Ingrese su usuario">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Contrasena" class="form-label">Contraseña</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" 
                                   class="form-control" 
                                   id="Contrasena" 
                                   name="Contrasena" 
                                   required 
                                   placeholder="Ingrese su contraseña">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-ktm">
                        <i class="fas fa-sign-in-alt me-2"></i> Acceder al sistema
                    </button>
                </form>
                
                <div class="register-section">
                    <a href="{{ route('admin.registro') }}" class="register-link">
                        <i class="fas fa-user-plus me-1"></i> Crear nueva cuenta de administrador
                    </a>
                </div>
                
                <div class="security-notice">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-shield-alt me-2 mt-1"></i>
                        <div>
                            <strong>Acceso restringido</strong><br>
                            Esta área está reservada exclusivamente para personal autorizado de KTM.
                        </div>
                    </div>
                </div>
                
                <div class="footer-text">
                    &copy; {{ date('Y') }} KTM Management System
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>