<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrador - KTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Exo+2:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --ktm-orange: #FF6600;
            --ktm-orange-dark: #E55A00;
            --ktm-black: #0A0A0A;
            --ktm-dark: #1A1A1A;
            --ktm-gray: #2D2D2D;
            --ktm-light: #F8F9FA;
            --ktm-accent: #FF8C42;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
            min-height: 100vh;
            font-family: 'Exo 2', 'Segoe UI', sans-serif;
            display: flex;
            padding: 0;
            position: relative;
            overflow: hidden;
        }
        
        .image-section {
            flex: 1;
            background: linear-gradient(rgba(10, 10, 10, 0.85), rgba(26, 26, 26, 0.9)), 
                        url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=987&q=80');
            background-size: cover;
            background-position: center;
            display: none;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        @media (min-width: 992px) {
            .image-section {
                display: flex;
            }
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 102, 0, 0.1), transparent 30%),
                        linear-gradient(135deg, rgba(0, 0, 0, 0.8), transparent 50%);
            z-index: 1;
        }
        
        .image-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }
        
        .ktm-badge-large {
            display: inline-block;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-orange-dark));
            color: white;
            font-weight: 800;
            font-size: 1.8rem;
            padding: 10px 25px;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(255, 102, 0, 0.3);
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .image-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 3.5rem;
            color: white;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }
        
        .image-title span {
            color: var(--ktm-orange);
        }
        
        .image-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 500px;
            line-height: 1.6;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 2.5rem 0;
        }
        
        .features-list li {
            color: white;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }
        
        .features-list li i {
            color: var(--ktm-orange);
            margin-right: 15px;
            font-size: 1.3rem;
            background: rgba(255, 102, 0, 0.1);
            padding: 10px;
            border-radius: 50%;
        }
        
        .form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            min-height: 100vh;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 102, 0, 0.15);
            position: relative;
            top: -17px;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-dark) 100%);
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-accent));
        }
        
        .ktm-logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-orange-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            box-shadow: 
                0 8px 25px rgba(255, 102, 0, 0.4),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .ktm-logo span {
            color: white;
            font-weight: 800;
            font-size: 1.8rem;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: -1px;
            position: relative;
            z-index: 1;
        }
        
        .login-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: var(--ktm-orange);
            font-weight: 600;
            font-size: 1rem;
        }
        
        .login-body {
            padding: 2.2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--ktm-gray);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .input-group-ktm {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .input-group-ktm:focus-within {
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.2);
            transform: translateY(-2px);
        }
        
        .input-group-ktm .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 14px 18px 14px 48px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .input-group-ktm .form-control:focus {
            border-color: var(--ktm-orange);
            box-shadow: none;
        }
        
        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ktm-gray);
            font-size: 1.1rem;
            z-index: 4;
            transition: all 0.3s ease;
        }
        
        .input-group-ktm:focus-within .input-icon {
            color: var(--ktm-orange);
        }
        
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-orange-dark));
            border: none;
            border-radius: 12px;
            padding: 15px 20px;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(255, 102, 0, 0.3);
        }
        
        .btn-ktm:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 102, 0, 0.4);
            color: white;
        }
        
        .btn-ktm:active {
            transform: translateY(-1px);
        }
        
        .btn-ktm::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: left 0.7s ease;
        }
        
        .btn-ktm:hover::after {
            left: 100%;
        }
        
        .btn-ktm i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .error-alert {
            background: rgba(220, 53, 69, 0.08);
            border: 2px solid rgba(220, 53, 69, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: slideIn 0.4s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .login-footer {
            text-align: center;
            margin-top: 1.8rem;
            padding-top: 1.2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .login-footer p {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 0;
        }
        
        .security-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 1rem;
        }
        
        .security-badge i {
            margin-right: 6px;
        }
    </style>
</head>

<body>
    
    <div class="image-section animate-panel">
        <div class="image-overlay"></div>
        <div class="image-content">
            <div class="ktm-badge-large">S-GOST</div>
            <h1 class="image-title">Gestión <span>ordenes servicio</span> Técnicos ROCKET SERVICE
            </h1>
            <p class="image-subtitle">
                Accede al panel de control completo para gestionar usuarios, 
                configuraciones y monitorizar el rendimiento del sistema en tiempo real.
            </p>
            
            <ul class="features-list">
                <li><i class="fas fa-tachometer-alt"></i>Panel de control en tiempo real</li>
                <li><i class="fas fa-user-shield"></i>Gestión de usuarios y permisos</li>
                <li><i class="fas fa-chart-line"></i>Reportes y estadísticas avanzadas</li>
                <li><i class="fas fa-cogs"></i>Configuración del sistema</li>
                <li><i class="fas fa-history"></i>Historial de actividades</li>
            </ul>
        </div>
    </div>

    <div class="form-section">
        <div class="login-container">
            <div class="login-card">

<div class="login-header text-center mb-4">
    <!-- Imagen pequeña encima -->
    <img src="{{ asset('img/rock.png') }}" 
         alt="Rock Logo" 
         class="mb-3"
         style="width:70px; height:auto; filter: drop-shadow(0 0 8px #ff6600);">

    <h2 style="font-weight:700; color:#fff;">Acceso Administrador</h2>
    <p style="color:#ccc;">Credenciales Requeridas</p>
</div>
                
                <div class="login-body">

                    @if ($errors->any())
                        <div class="error-alert">
                            <strong>
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Credenciales incorrectas
                            </strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.login.post') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <div class="form-group">
                            <label class="form-label">Usuario</label>
                            <div class="input-group-ktm">
                                <i class="fas fa-user input-icon"></i>
                                <input 
                                    type="text" 
                                    name="usuario" 
                                    class="form-control" 
                                    placeholder="Ingresa tu usuario"
                                    required
                                    value="{{ old('usuario') }}"
                                >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Contraseña</label>
                            <div class="input-group-ktm">
                                <i class="fas fa-lock input-icon"></i>
                                <input 
                                    type="password" 
                                    name="contrasena" 
                                    class="form-control" 
                                    placeholder="Ingresa tu contraseña"
                                    required
                                >
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-ktm" id="submitBtn">
                            <i class="fas fa-sign-in-alt"></i> Ingresar al Sistema
                        </button>
                    </form>
                    
                    <div class="login-footer">
                        <p><i class="fas fa-shield-alt me-2"></i>Sistema seguro - Acceso restringido</p>
                        <div class="security-badge">
                            <i class="fas fa-lock"></i>
                            Conexión segura SSL
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('submitBtn');
            btn.classList.add('btn-loading');
            btn.disabled = true;
        });
    </script>

</body>
</html>
