<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Cliente - SOMEMAS</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-light: #ff8333;
            --bg-dark: #0d0d0d;
            --bg-dark-2: #141414;
            --text-light: #eaeaea;
            --bg-gradient: linear-gradient(135deg, var(--bg-dark) 0%, #1a1a1a 100%);
        }

        body {
            background: var(--bg-gradient);
            font-family: 'Montserrat', sans-serif;
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Partículas de fondo */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .card-pro {
            background: rgba(20, 20, 20, 0.92);
            border: 1px solid rgba(255, 102, 0, 0.35);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.8),
                0 0 0 1px rgba(255, 102, 0, 0.1);
            border-radius: 20px;
            padding: 35px;
            animation: fadeInSlideUp 0.8s ease-out;
            backdrop-filter: blur(15px);
            position: relative;
            z-index: 1;
        }

        @keyframes fadeInSlideUp {
            from { 
                opacity: 0; 
                transform: translateY(40px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        .card-header {
            background: linear-gradient(135deg, 
                rgba(15, 15, 15, 0.95) 0%, 
                rgba(255, 102, 0, 0.85) 100%);
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 35px;
            box-shadow: 
                0 12px 35px rgba(255, 102, 0, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            border: none;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 150%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.1) 50%, 
                transparent 100%
            );
            animation: shineEffect 3.5s infinite linear;
        }

        @keyframes shineEffect {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .header-icon {
            background: rgba(255, 255, 255, 0.1);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .header-icon i {
            font-size: 2rem;
            color: white;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: white;
            font-size: 1.9rem;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
        }

        .card-header .subtitle {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 400;
            margin-top: 10px;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #ddd;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .input-group {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .input-group:hover {
            transform: translateY(-2px);
        }

        .input-group-text {
            background: linear-gradient(135deg, #2a2a2a, #222) !important;
            border: 2px solid #333 !important;
            border-right: none !important;
            color: var(--ktm-orange) !important;
            padding: 0.85rem 1rem;
            min-width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        input, select {
            background: linear-gradient(135deg, #222, #1b1b1b) !important;
            border: 2px solid #333 !important;
            border-radius: 14px !important;
            color: var(--text-light) !important;
            padding: 0.85rem 1rem !important;
            transition: all 0.3s ease;
            font-size: 1rem;
            font-weight: 500;
        }

        input:focus, select:focus {
            border-color: var(--ktm-orange) !important;
            box-shadow: 
                0 0 0 4px rgba(255, 102, 0, 0.15),
                inset 0 0 10px rgba(255, 102, 0, 0.05) !important;
            transform: translateY(-1px);
            background: linear-gradient(135deg, #282828, #222) !important;
        }

        .input-group:focus-within .input-group-text {
            background: linear-gradient(135deg, #333, #2a2a2a) !important;
            border-color: var(--ktm-orange) !important;
        }

        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-light));
            color: #000;
            font-weight: 800;
            padding: 16px 35px;
            border-radius: 14px;
            border: none;
            box-shadow: 
                0 10px 25px rgba(255, 102, 0, 0.4),
                0 0 15px rgba(255, 102, 0, 0.2);
            transition: all 0.3s ease;
            font-size: 1.15rem;
            letter-spacing: 0.8px;
            width: 100%;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-transform: uppercase;
        }

        .btn-ktm::before {
            content: '';
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
            transition: 0.8s;
        }

        .btn-ktm:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 
                0 15px 35px rgba(255, 102, 0, 0.6),
                0 0 20px rgba(255, 102, 0, 0.3);
        }

        .btn-ktm:hover::before {
            left: 100%;
        }

        .btn-ktm:active {
            transform: translateY(-1px);
        }

        .password-strength-container {
            margin-top: 10px;
        }

        .password-strength {
            height: 6px;
            background: #333;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 8px;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            transition: all 0.4s ease;
            border-radius: 3px;
        }

        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            font-weight: 500;
        }

        .login-link {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .logo {
            color: var(--ktm-orange);
            font-size: 2.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 
                0 0 20px rgba(255, 102, 0, 0.7),
                0 0 40px rgba(255, 102, 0, 0.3);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--ktm-orange), 
                transparent);
        }

        .logo span {
            color: var(--text-light);
            position: relative;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1rem;
            margin-top: 12px;
            letter-spacing: 2px;
        }

        .section-title {
            color: var(--ktm-orange);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 102, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .password-toggle-btn {
            background: transparent;
            border: none;
            color: #888;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle-btn:hover {
            color: var(--ktm-orange);
        }

        .progress-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-light));
            z-index: 1000;
            transition: width 0.3s ease;
        }

        @media (max-width: 768px) {
            .card-pro {
                padding: 25px;
                margin: 0 15px;
            }
            
            .logo {
                font-size: 2.2rem;
            }
            
            .card-header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Indicador de progreso -->
    <div class="progress-indicator" id="progressIndicator"></div>

    <!-- Partículas de fondo -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                
                <!-- Logo -->

                <!-- Card de Registro -->
                <div class="card-pro">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="ktm-header text-center mb-4">
                            <div class="ktm-logo-container d-flex justify-content-center align-items-center">
                                <div class="ktm-logo-badge me-3">
                                    <img src="{{ asset('img/rock.png') }}" alt="ROCK Logo" class="ktm-logo-img" style="width: 50px; height: 50px; margin-right: 10px;">
                                </div>
                                <div class="ktm-logo-text">
                                    <h1 class="ktm-logo-title mb-0"><span class="ktm-orange-text"></span></h1>
                                </div>
                            </div>
                        </div>
                        <h4>Registro de Cliente</h4>
                        <p class="subtitle">Crea tu cuenta para acceder a nuestros servicios</p>
                    </div>

                    <!-- Mensajes de Error/Success -->
                    @if($errors->any())
                    <div class="alert alert-danger animate__animated animate__shakeX">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Por favor corrige los siguientes errores:</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success animate__animated animate__fadeIn">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Formulario -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('cliente.registro.post') }}" id="registroForm">
                            @csrf

                            <!-- Información Personal -->
                            <div class="section-title">
                                <i class="bi bi-person-circle"></i>
                                Información Personal
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">
                                            <i class="bi bi-person"></i> Nombre Completo *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="nombre" 
                                                   name="nombre" 
                                                   value="{{ old('nombre') }}"
                                                   placeholder="Juan Pérez"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="bi bi-envelope"></i> Correo Electrónico *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" 
                                                   class="form-control" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email') }}"
                                                   placeholder="ejemplo@correo.com"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">
                                            <i class="bi bi-telephone"></i> Teléfono *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" 
                                                   class="form-control" 
                                                   id="telefono" 
                                                   name="telefono" 
                                                   value="{{ old('telefono') }}"
                                                   placeholder="+57 300 123 4567"
                                                   required
                                                   pattern="[0-9+\-\s]+">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">
                                            <i class="bi bi-geo-alt"></i> Dirección
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-geo-alt"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="direccion" 
                                                   name="direccion" 
                                                   value="{{ old('direccion') }}"
                                                   placeholder="Carrera 10 #20-30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tipo de Documento -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo_documento">
                                            <i class="bi bi-card-text"></i> Tipo de Documento *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-card-text"></i>
                                            </span>
                                            <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                                <option value="">Seleccionar...</option>
                                                <option value="Cedula" {{ old('tipo_documento') == 'Cedula' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                                <option value="Pasaporte" {{ old('tipo_documento') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                                <option value="Cedula_Extranjeria" {{ old('tipo_documento') == 'Cedula_Extranjeria' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                                <option value="NIT" {{ old('tipo_documento') == 'NIT' ? 'selected' : '' }}>NIT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numero_documento">
                                            <i class="bi bi-123"></i> Número de Documento *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-123"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="numero_documento" 
                                                   name="numero_documento" 
                                                   value="{{ old('numero_documento') }}"
                                                   placeholder="123456789"
                                                   required
                                                   pattern="[0-9]+"
                                                   title="Solo números permitidos">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Credenciales de Acceso -->
                            <div class="section-title">
                                <i class="bi bi-shield-lock"></i>
                                Credenciales de Acceso
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usuario">
                                            <i class="bi bi-person-badge"></i> Nombre de Usuario *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-person-badge"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="usuario" 
                                                   name="usuario" 
                                                   value="{{ old('usuario') }}"
                                                   placeholder="juanperez2024"
                                                   required
                                                   pattern="[a-zA-Z0-9]+"
                                                   title="Solo letras y números">
                                        </div>
                                        <small class="form-text">Mínimo 4 caracteres, solo letras y números</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <i class="bi bi-key"></i> Contraseña *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-key"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control" 
                                                   id="password" 
                                                   name="password" 
                                                   placeholder="••••••••"
                                                   required
                                                   minlength="8">
                                            <button type="button" class="password-toggle-btn" onclick="togglePassword('password', this)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <div class="password-strength-container">
                                            <div class="password-strength">
                                                <div class="strength-meter" id="passwordStrength"></div>
                                            </div>
                                            <div class="strength-text" id="strengthText"></div>
                                        </div>
                                        <small class="form-text">Mínimo 8 caracteres, con mayúsculas, minúsculas y números</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                            <i class="bi bi-key-fill"></i> Confirmar Contraseña *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-key-fill"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control" 
                                                   id="password_confirmation" 
                                                   name="password_confirmation" 
                                                   placeholder="••••••••"
                                                   required
                                                   minlength="8">
                                            <button type="button" class="password-toggle-btn" onclick="togglePassword('password_confirmation', this)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <small id="passwordMatch" class="form-text"></small>
                                    </div>
                                </div>
                            </div>

                            <!-- Términos y Condiciones -->
                            <div class="form-group form-check mt-4">
                                <input type="checkbox" class="form-check-input" id="terminos" name="terminos" required>
                                <label class="form-check-label" for="terminos">
                                    Acepto los <a href="#" class="text-decoration-underline" onclick="showTerms()">términos y condiciones</a> y la <a href="#" class="text-decoration-underline" onclick="showPrivacy()">política de privacidad</a>
                                </label>
                            </div>

                            <!-- Botón de Registro -->
                            <button type="submit" class="btn btn-ktm mt-4" id="submitBtn">
                                <i class="bi bi-person-plus"></i>
                                <span id="btnText">Crear Cuenta de Cliente</span>
                                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                            </button>

                        </form>

                        <!-- Enlace a Login -->
                        <div class="login-link">
                            <p class="mb-2">
                                ¿Ya tienes una cuenta?
                            </p>
                            <a href="{{ route('cliente.login') }}" class="btn btn-outline-ktm">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Términos y Condiciones -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">
                        <i class="bi bi-file-text me-2"></i>Términos y Condiciones
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de términos y condiciones -->
                    <p>Aquí van los términos y condiciones del servicio...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Política de Privacidad -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title">
                        <i class="bi bi-shield-check me-2"></i>Política de Privacidad
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de política de privacidad -->
                    <p>Aquí va la política de privacidad...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar/ocultar contraseña
        function togglePassword(fieldId, button) {
            const input = document.getElementById(fieldId);
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        // Verificar fortaleza de contraseña
        function checkPasswordStrength(password) {
            const meter = document.getElementById('passwordStrength');
            const text = document.getElementById('strengthText');
            let strength = 0;
            let feedback = '';
            
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[a-z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            
            meter.style.width = strength + '%';
            
            if (strength < 25) {
                meter.style.background = '#dc3545';
                text.textContent = 'Muy débil';
                text.style.color = '#dc3545';
            } else if (strength < 50) {
                meter.style.background = '#ff6b6b';
                text.textContent = 'Débil';
                text.style.color = '#ff6b6b';
            } else if (strength < 75) {
                meter.style.background = '#ffc107';
                text.textContent = 'Moderada';
                text.style.color = '#ffc107';
            } else if (strength < 100) {
                meter.style.background = '#51cf66';
                text.textContent = 'Fuerte';
                text.style.color = '#51cf66';
            } else {
                meter.style.background = '#198754';
                text.textContent = 'Muy fuerte';
                text.style.color = '#198754';
            }
            
            // Verificar coincidencia de contraseñas
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('passwordMatch');
            
            if (confirmPassword && password !== confirmPassword) {
                matchText.textContent = '✗ Las contraseñas no coinciden';
                matchText.style.color = '#dc3545';
            } else if (confirmPassword) {
                matchText.textContent = '✓ Las contraseñas coinciden';
                matchText.style.color = '#198754';
            } else {
                matchText.textContent = '';
            }
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });

        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            checkPasswordStrength(password);
        });

        // Mostrar modales
        function showTerms() {
            new bootstrap.Modal(document.getElementById('termsModal')).show();
            return false;
        }

        function showPrivacy() {
            new bootstrap.Modal(document.getElementById('privacyModal')).show();
            return false;
        }

        // Prevenir doble envío del formulario
        document.getElementById('registroForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            
            submitBtn.disabled = true;
            btnText.textContent = 'Creando cuenta...';
            btnSpinner.classList.remove('d-none');
            
            // Mostrar progreso
            const progress = document.getElementById('progressIndicator');
            progress.style.width = '100%';
            
            return true;
        });

        // Validación en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[required], select[required]');
            const form = document.getElementById('registroForm');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value && this.hasAttribute('required')) {
                        this.style.borderColor = '#dc3545';
                        this.parentElement.classList.add('animate__animated', 'animate__headShake');
                        setTimeout(() => {
                            this.parentElement.classList.remove('animate__headShake');
                        }, 1000);
                    } else {
                        this.style.borderColor = '#333';
                    }
                });
                
                input.addEventListener('input', function() {
                    this.style.borderColor = '#333';
                });
            });

            // Animación de progreso al hacer scroll
            window.addEventListener('scroll', updateProgressIndicator);
        });

        function updateProgressIndicator() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById("progressIndicator").style.width = scrolled + "%";
        }

        // Crear partículas de fondo
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                const size = Math.random() * 3 + 1;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.background = 'rgba(255, 102, 0, ' + (Math.random() * 0.3 + 0.1) + ')';
                particle.style.borderRadius = '50%';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.opacity = '0';
                
                // Animación
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 5;
                particle.style.animation = `float ${duration}s ${delay}s linear infinite`;
                
                container.appendChild(particle);
            }
            
            // Añadir keyframes para la animación
            const style = document.createElement('style');
            style.textContent = `
                @keyframes float {
                    0% {
                        transform: translateY(0) translateX(0);
                        opacity: 0;
                    }
                    10% {
                        opacity: 1;
                    }
                    90% {
                        opacity: 1;
                    }
                    100% {
                        transform: translateY(-100vh) translateX(calc(var(--x) * 100px));
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // Inicializar partículas cuando la página cargue
        window.addEventListener('load', createParticles);
    </script>

    <style>
        .btn-outline-ktm {
            border: 2px solid var(--ktm-orange);
            color: var(--ktm-orange);
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-ktm:hover {
            background: var(--ktm-orange);
            color: black;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
        }
        
        .animate__animated {
            animation-duration: 1s;
        }
        
        .text-decoration-underline {
            text-decoration: underline;
            color: var(--ktm-light);
        }
        
        .text-decoration-underline:hover {
            color: white;
        }
    </style>
</body>
</html>