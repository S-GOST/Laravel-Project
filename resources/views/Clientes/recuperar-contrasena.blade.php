<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña </title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
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
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-dark) 50%, #2a2a2a 100%);
            font-family: 'Montserrat', sans-serif;
            color: var(--ktm-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Líneas de velocidad */
        .speed-lines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 2px,
                    rgba(255, 102, 0, 0.05) 2px,
                    rgba(255, 102, 0, 0.05) 4px
                );
            animation: speedEffect 20s linear infinite;
            z-index: -2;
        }
        
        @keyframes speedEffect {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50px); }
        }
        
        /* Efecto de neón naranja */
        .ktm-glow {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 102, 0, 0.15) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            filter: blur(60px);
            z-index: -1;
            animation: pulseOrange 3s ease-in-out infinite;
        }
        
        @keyframes pulseOrange {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.5; }
        }
        
        .container-ktm {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }
        
        /* Logo KTM */
        .ktm-logo-container {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .ktm-logo-badge {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-orange-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 
                0 0 30px rgba(255, 102, 0, 0.6),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
            animation: rotateBadge 20s linear infinite;
        }
        
        .ktm-logo-badge::before {
            content: '';
            position: absolute;
            width: 110px;
            height: 110px;
            border: 2px solid rgba(255, 102, 0, 0.4);
            border-radius: 50%;
            animation: pulseRing 2s ease-out infinite;
        }
        
        @keyframes rotateBadge {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulseRing {
            0% { transform: scale(0.8); opacity: 1; }
            100% { transform: scale(1.2); opacity: 0; }
        }
        
        .ktm-logo-badge img {
            width: 50px;
            height: 50px;
            filter: brightness(0) invert(1);
        }
        
        .ktm-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(255, 102, 0, 0.3);
        }
        
        .ktm-subtitle {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        /* Tarjeta KTM */
        .ktm-card {
            background: rgba(26, 26, 26, 0.9);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            box-shadow: 
                0 10px 40px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            animation: cardSlideUp 0.8s ease-out;
        }
        
        @keyframes cardSlideUp {
            from { 
                opacity: 0; 
                transform: translateY(50px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }
        
        .ktm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-accent));
        }
        
        .ktm-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .ktm-header-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: rgba(255, 102, 0, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 102, 0, 0.4);
            position: relative;
            box-shadow: 0 0 20px rgba(255, 102, 0, 0.3);
        }
        
        .ktm-header-icon::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid rgba(255, 140, 66, 0.4);
            animation: rotate 4s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .ktm-header-icon i {
            font-size: 2rem;
            color: var(--ktm-orange);
        }
        
        .ktm-header h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: white;
        }
        
        .ktm-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }
        
        /* Campo de formulario KTM */
        .ktm-input-group {
            position: relative;
            margin-bottom: 30px;
        }
        
        .ktm-input-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .ktm-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 102, 0, 0.3);
            border-radius: 12px;
            padding: 15px 20px 15px 50px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .ktm-input:focus {
            outline: none;
            border-color: var(--ktm-orange);
            box-shadow: 
                0 0 20px rgba(255, 102, 0, 0.4),
                inset 0 0 10px rgba(255, 102, 0, 0.1);
            background: rgba(255, 102, 0, 0.05);
        }
        
        .ktm-input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ktm-orange);
            z-index: 2;
            font-size: 1.2rem;
        }
        
        .ktm-input-border {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
            pointer-events: none;
        }
        
        .ktm-input-border::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-accent));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .ktm-input:focus ~ .ktm-input-border::before {
            opacity: 0.1;
        }
        
        /* Botón KTM */
        .ktm-button {
            width: 100%;
            background: linear-gradient(135deg, var(--ktm-orange), var(--ktm-orange-dark));
            border: none;
            border-radius: 12px;
            padding: 18px 30px;
            color: #000;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.4);
        }
        
        .ktm-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent
            );
            transition: left 0.4s ease;
        }
        
        .ktm-button:hover::before {
            left: 0;
        }
        
        .ktm-button:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 10px 30px rgba(255, 102, 0, 0.6),
                0 0 25px rgba(255, 102, 0, 0.4);
        }
        
        .ktm-button:active {
            transform: translateY(0);
        }
        
        .ktm-button-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        /* Alertas KTM */
        .ktm-alert {
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid;
            animation: alertSlideIn 0.5s ease;
            backdrop-filter: blur(10px);
        }
        
        @keyframes alertSlideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .ktm-alert-success {
            border-left-color: var(--ktm-orange);
            background: rgba(255, 102, 0, 0.1);
        }
        
        .ktm-alert-danger {
            border-left-color: #ff4444;
            background: rgba(255, 68, 68, 0.1);
        }
        
        .ktm-alert-icon {
            font-size: 1.5rem;
            margin-right: 15px;
        }
        
        /* Enlaces KTM */
        .ktm-links {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .ktm-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin: 0 5px 10px;
        }
        
        .ktm-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 102, 0, 0.1);
            transition: left 0.3s ease;
        }
        
        .ktm-link:hover::before {
            left: 0;
        }
        
        .ktm-link:hover {
            color: white;
            transform: translateY(-2px);
        }
        
        /* Información adicional */
        .ktm-info-box {
            background: rgba(26, 26, 26, 0.7);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .ktm-info-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--ktm-orange), var(--ktm-accent));
        }
        
        .ktm-info-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--ktm-orange);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .ktm-info-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        /* Footer KTM */
        .ktm-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .ktm-security-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 102, 0, 0.1);
            color: var(--ktm-orange);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .ktm-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .ktm-back-link:hover {
            color: white;
            background: rgba(255, 102, 0, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container-ktm {
                padding: 15px;
            }
            
            .ktm-card {
                padding: 30px 20px;
            }
            
            .ktm-title {
                font-size: 2rem;
            }
            
            .ktm-button {
                padding: 15px 20px;
                font-size: 1rem;
            }
            
            .ktm-footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
        
        /* Partículas naranjas */
        .ktm-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Animaciones para elementos */
        .ktm-slide-up {
            animation: ktmSlideUp 0.6s ease forwards;
            opacity: 0;
        }
        
        .ktm-slide-up:nth-child(1) { animation-delay: 0.1s; }
        .ktm-slide-up:nth-child(2) { animation-delay: 0.2s; }
        .ktm-slide-up:nth-child(3) { animation-delay: 0.3s; }
        
        @keyframes ktmSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Fondo KTM -->
    <div class="speed-lines"></div>
    <div class="ktm-glow"></div>
    <div class="ktm-particles" id="ktmParticles"></div>
    
    <div class="container-ktm">
        <!-- Logo KTM -->
        <div class="ktm-logo-container ktm-slide-up">
            <div class="ktm-logo-badge">
                <img src="{{ asset('img/rock.png') }}" alt="KTM Logo">
            </div>
            <h1 class="ktm-title">ROCKET SERVICE</h1>
            <p class="ktm-subtitle">Sistema de Gestión de Clientes</p>
        </div>
        
        <!-- Card de recuperación -->
        <div class="ktm-card">
            <!-- Header -->
            <div class="ktm-header ktm-slide-up">
                <div class="ktm-header-icon">
                    <i class="bi bi-key"></i>
                </div>
                <h4>Recuperar Contraseña</h4>
                <p>Ingresa tu email para recibir el enlace de recuperación</p>
            </div>
            
            <!-- Mensajes -->
            @if(session('status'))
                <div class="ktm-alert ktm-alert-success ktm-slide-up">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill ktm-alert-icon"></i>
                        <div>
                            <h6 class="mb-1">¡Enlace Enviado!</h6>
                            <p class="mb-0">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="ktm-alert ktm-alert-danger ktm-slide-up">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill ktm-alert-icon"></i>
                        <div>
                            <h6 class="mb-1">¡Error de Validación!</h6>
                            <ul class="mb-0 ps-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('cliente.password.email') }}" id="passwordResetForm">
                @csrf

                <div class="ktm-input-group ktm-slide-up">
                    <label for="email">
                        <i class="bi bi-envelope me-2"></i>Correo Electrónico
                    </label>
                    <div class="position-relative">
                        <input type="email" 
                               class="ktm-input" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="ejemplo@correo.com"
                               required
                               autocomplete="email"
                               autofocus>
                        <i class="bi bi-at ktm-input-icon"></i>
                        <div class="ktm-input-border"></div>
                    </div>
                    <div class="mt-2" style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem;">
                        <i class="bi bi-info-circle me-1"></i>
                        Te enviaremos un enlace seguro para restablecer tu contraseña
                    </div>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="ktm-button ktm-slide-up" id="submitBtn">
                    <div class="ktm-button-content">
                        <i class="bi bi-send"></i>
                        <span id="buttonText">Enviar Enlace de Recuperación</span>
                        <span id="buttonSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                    </div>
                </button>
            </form>

            <!-- Enlaces -->
            <div class="ktm-links ktm-slide-up">
                <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 20px;">
                    ¿Recordaste tu contraseña?
                </p>
                <a href="{{ route('cliente.login') }}" class="ktm-link">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Iniciar Sesión</span>
                </a>
                <p style="color: rgba(255, 255, 255, 0.6); margin: 20px 0;">
                    ¿No tienes una cuenta?
                </p>
                <a href="{{ route('cliente.registro') }}" class="ktm-link">
                    <i class="bi bi-person-plus"></i>
                    <span>Regístrate Aquí</span>
                </a>
            </div>

            <!-- Footer -->
            <div class="ktm-footer ktm-slide-up">
                <div class="ktm-security-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Seguridad KTM</span>
                </div>
                <a href="{{ route('home') }}" class="ktm-back-link">
                    <i class="bi bi-arrow-left"></i>
                    <span>Volver al Inicio</span>
                </a>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="ktm-info-box ktm-slide-up">
            <div class="ktm-info-title">
                <i class="bi bi-clock-history"></i>
                <span>Información Importante</span>
            </div>
            <p class="ktm-info-text">
                <strong>Proceso de recuperación:</strong><br>
                1. Recibirás un email con un enlace único de KTM<br>
                2. El enlace es válido por 60 minutos<br>
                3. Haz clic en el enlace para crear una nueva contraseña<br>
                4. Revisa tu carpeta de spam si no encuentras el email
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Prevenir doble envío del formulario
        document.getElementById('passwordResetForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const buttonText = document.getElementById('buttonText');
            const buttonSpinner = document.getElementById('buttonSpinner');
            
            // Deshabilitar botón y mostrar spinner
            submitBtn.disabled = true;
            buttonText.textContent = 'Enviando...';
            buttonSpinner.classList.remove('d-none');
            
            // Efecto visual de carga
            submitBtn.style.opacity = '0.8';
            
            return true;
        });

        // Crear partículas naranjas KTM
        function createKtmParticles() {
            const container = document.getElementById('ktmParticles');
            if (!container) return;
            
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                const size = Math.random() * 4 + 2;
                const color = Math.random() > 0.7 ? '#FF8C42' : '#FF6600';
                const opacity = Math.random() * 0.5 + 0.3;
                
                particle.style.position = 'absolute';
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.background = color;
                particle.style.borderRadius = '50%';
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.top = `${Math.random() * 100}vh`;
                particle.style.opacity = opacity;
                particle.style.filter = `blur(${size / 2}px)`;
                particle.style.zIndex = '-1';
                
                // Animación con movimiento en diagonal
                const duration = Math.random() * 15 + 10;
                const delay = Math.random() * 5;
                const xMovement = (Math.random() - 0.5) * 150;
                
                particle.style.animation = `
                    ktmFloat ${duration}s ${delay}s linear infinite,
                    ktmPulse ${duration / 3}s ${delay}s ease-in-out infinite alternate
                `;
                
                particle.style.setProperty('--x-move', `${xMovement}px`);
                particle.style.setProperty('--y-move', `-${window.innerHeight + 100}px`);
                
                container.appendChild(particle);
            }
            
            // Añadir keyframes para la animación
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ktmFloat {
                    0% {
                        transform: translate(0, 0);
                        opacity: 0;
                    }
                    10% {
                        opacity: var(--opacity, 0.5);
                    }
                    90% {
                        opacity: var(--opacity, 0.5);
                    }
                    100% {
                        transform: translate(var(--x-move), var(--y-move));
                        opacity: 0;
                    }
                }
                
                @keyframes ktmPulse {
                    0% {
                        transform: scale(1);
                    }
                    100% {
                        transform: scale(1.1);
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // Efecto de entrada para campos KTM
        function initKtmInputEffects() {
            const inputs = document.querySelectorAll('.ktm-input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
                
                // Validación en tiempo real
                input.addEventListener('input', function() {
                    if (this.id === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (this.value && !emailRegex.test(this.value)) {
                            this.style.borderColor = '#ff4444';
                            this.style.boxShadow = '0 0 20px rgba(255, 68, 68, 0.4)';
                        } else if (this.value) {
                            this.style.borderColor = '#FF6600';
                            this.style.boxShadow = '0 0 20px rgba(255, 102, 0, 0.4)';
                        } else {
                            this.style.borderColor = 'rgba(255, 102, 0, 0.3)';
                            this.style.boxShadow = 'none';
                        }
                    }
                });
            });
        }

        // Efecto de hover para botones KTM
        function initKtmButtonEffects() {
            const buttons = document.querySelectorAll('.ktm-button');
            
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const ripple = document.createElement('span');
                    ripple.style.position = 'absolute';
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    ripple.style.width = '0';
                    ripple.style.height = '0';
                    ripple.style.background = 'radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%)';
                    ripple.style.borderRadius = '50%';
                    ripple.style.transform = 'translate(-50%, -50%)';
                    ripple.style.animation = 'ktmRipple 0.6s ease-out';
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
            
            // Añadir keyframes para efecto ripple
            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
                @keyframes ktmRipple {
                    0% {
                        width: 0;
                        height: 0;
                        opacity: 1;
                    }
                    100% {
                        width: 200px;
                        height: 200px;
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);
        }

        // Inicialización cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            // Crear partículas KTM
            createKtmParticles();
            
            // Iniciar efectos KTM
            initKtmInputEffects();
            initKtmButtonEffects();
            
            // Auto-focus en el campo de email
            const emailInput = document.getElementById('email');
            if (emailInput) {
                setTimeout(() => {
                    emailInput.focus();
                }, 300);
            }
            
            // Activar animaciones de entrada KTM
            const slideElements = document.querySelectorAll('.ktm-slide-up');
            slideElements.forEach(element => {
                element.style.animationPlayState = 'running';
            });
            
            // Efecto de brillo aleatorio en el logo
            const logoBadge = document.querySelector('.ktm-logo-badge');
            if (logoBadge) {
                setInterval(() => {
                    logoBadge.style.boxShadow = 
                        '0 0 40px rgba(255, 102, 0, 0.8), inset 0 0 20px rgba(255, 255, 255, 0.1)';
                    setTimeout(() => {
                        logoBadge.style.boxShadow = 
                            '0 0 30px rgba(255, 102, 0, 0.6), inset 0 0 20px rgba(255, 255, 255, 0.1)';
                    }, 1000);
                }, 5000);
            }
        });

        // Validación del formulario
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Manejar errores de validación KTM
        function showKtmValidationError(message) {
            // Eliminar errores anteriores
            const existingAlert = document.querySelector('.ktm-alert-danger');
            if (existingAlert) {
                existingAlert.remove();
            }
            
            const errorDiv = document.createElement('div');
            errorDiv.className = 'ktm-alert ktm-alert-danger ktm-slide-up';
            errorDiv.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill ktm-alert-icon"></i>
                    <div>
                        <h6 class="mb-1">¡Atención KTM!</h6>
                        <p class="mb-0">${message}</p>
                    </div>
                </div>
            `;
            
            const form = document.getElementById('passwordResetForm');
            form.parentNode.insertBefore(errorDiv, form);
            
            // Activar animación
            errorDiv.style.animationPlayState = 'running';
            
            // Efecto de shake en el campo de email
            const emailInput = document.getElementById('email');
            emailInput.style.borderColor = '#ff4444';
            emailInput.style.boxShadow = '0 0 20px rgba(255, 68, 68, 0.4)';
            emailInput.classList.add('shake');
            
            setTimeout(() => {
                emailInput.classList.remove('shake');
            }, 500);
            
            // Remover después de 5 segundos
            setTimeout(() => {
                errorDiv.style.opacity = '0';
                errorDiv.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    if (errorDiv.parentNode) {
                        errorDiv.remove();
                    }
                }, 300);
            }, 5000);
            
            // Enfocar el campo de email
            emailInput.focus();
        }

        // Añadir animación shake
        const shakeStyle = document.createElement('style');
        shakeStyle.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            
            .shake {
                animation: shake 0.5s ease;
            }
        `;
        document.head.appendChild(shakeStyle);

        // Validar antes de enviar
        document.getElementById('passwordResetForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            
            if (!email) {
                e.preventDefault();
                showKtmValidationError('Por favor ingresa tu correo electrónico de KTM');
                return false;
            }
            
            if (!validateEmail(email)) {
                e.preventDefault();
                showKtmValidationError('Por favor ingresa un correo electrónico válido');
                return false;
            }
            
            return true;
        });

        // Mostrar éxito después del envío (simulación)
        if (window.location.search.includes('success=true')) {
            const successDiv = document.createElement('div');
            successDiv.className = 'ktm-alert ktm-alert-success ktm-slide-up';
            successDiv.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill ktm-alert-icon"></i>
                    <div>
                        <h6 class="mb-1">¡Éxito KTM!</h6>
                        <p class="mb-0">Se ha enviado el enlace de recuperación a tu correo.</p>
                    </div>
                </div>
            `;
            
            const form = document.getElementById('passwordResetForm');
            form.parentNode.insertBefore(successDiv, form);
            
            // Activar animación
            successDiv.style.animationPlayState = 'running';
        }
    </script>
</body>
</html>