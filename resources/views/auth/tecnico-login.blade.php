<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Técnico | KTM System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-orange-glow: #ff8533;
            --ktm-orange-light: rgba(255, 102, 0, 0.1);
            --ktm-black: #000000;
            --ktm-dark: #0a0a0a;
            --ktm-gray: #1a1a1a;
            --ktm-border: #333;
            --text-light: #ffffff; /* Cambiado a blanco puro */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--ktm-black);
            font-family: 'Rajdhani', sans-serif;
            color: var(--text-light); /* Ahora es blanco */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Botón de volver al inicio */
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
            background: rgba(255, 102, 0, 0.2);
            border: 2px solid var(--ktm-orange);
            border-radius: 50px;
            padding: 10px 20px;
            color: white; /* Cambiado a blanco */
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            backdrop-filter: blur(5px);
        }

        .home-btn:hover {
            background: var(--ktm-orange);
            color: white; /* Se mantiene blanco en hover */
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
        }

        /* Efecto de partículas animadas */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background-color: var(--ktm-orange);
            border-radius: 50%;
            opacity: 0;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 0.3;
            }
            90% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }

        /* Contenedor principal */
        .login-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            z-index: 10;
        }

        /* Tarjeta de login */
        .login-card {
            background: linear-gradient(145deg, var(--ktm-dark), var(--ktm-gray));
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7),
                        0 0 0 1px rgba(255, 102, 0, 0.1),
                        0 0 50px rgba(255, 102, 0, 0.2);
            position: relative;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            animation: cardAppear 0.8s ease-out forwards;
            opacity: 0;
            color: white; /* Asegurar que todo el texto sea blanco */
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8),
                        0 0 0 1px rgba(255, 102, 0, 0.2),
                        0 0 80px rgba(255, 102, 0, 0.3);
        }

        @keyframes cardAppear {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Efecto de borde animado */
        .login-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, 
                var(--ktm-orange), 
                #d45c07ff, 
                var(--ktm-orange), 
                #ffcc00);
            border-radius: 22px;
            z-index: -1;
            animation: borderGlow 3s linear infinite;
            background-size: 400% 400%;
        }

        @keyframes borderGlow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Encabezado */
        .login-header {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
        }

        .logo-container {
            display: inline-block;
            margin-bottom: 20px;
            position: relative;
        }

        .logo {
            width: 85px;
            height: 85px;
            filter: drop-shadow(0 0 10px var(--ktm-orange));
            animation: pulseLogo 4s infinite alternate;
        }

        @keyframes pulseLogo {
            0%, 100% {
                filter: drop-shadow(0 0 10px var(--ktm-orange));
            }
            50% {
                filter: drop-shadow(0 0 20px var(--ktm-orange-glow));
            }
        }

        .login-header h1 {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            letter-spacing: 1px;
            color: white; /* Cambiado a blanco */
            text-transform: uppercase;
            margin-bottom: 8px;
            text-shadow: 0 0 10px rgba(255, 102, 0, 0.5);
        }

        .login-header p {
            color: white; /* Cambiado a blanco */
            font-size: 1rem;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        /* Estilos de alerta */
        .alert-danger {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 50, 50, 0.4);
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            animation: shake 0.5s ease;
            backdrop-filter: blur(5px);
            color: white; /* Texto de alerta en blanco */
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .alert-danger i {
            color: white; /* Ícono en blanco */
            margin-right: 12px;
            font-size: 1.2rem;
        }

        /* Campos de formulario */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ktm-orange);
            font-size: 1.2rem;
            z-index: 2;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--ktm-border);
            border-radius: 12px;
            color: white; /* Texto de input en blanco */
            padding: 16px 20px 16px 55px;
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6); /* Placeholder más claro */
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: var(--ktm-orange);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.2);
            outline: none;
            color: white; /* Mantener blanco al focus */
        }

        .form-control:focus + .input-icon {
            color: var(--ktm-orange-glow);
            animation: iconPulse 1s infinite alternate;
        }

        @keyframes iconPulse {
            from {
                transform: translateY(-50%) scale(1);
            }
            to {
                transform: translateY(-50%) scale(1.1);
            }
        }

        /* Botón de mostrar/ocultar contraseña */
        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7); /* Icono en blanco semitransparente */
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
            z-index: 3;
        }

        .toggle-password:hover {
            color: white; /* Blanco sólido al hover */
        }

        /* Botón de envío */
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange), #ff5500);
            color: white; /* Texto del botón en blanco */
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 18px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .btn-ktm::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }

        .btn-ktm:hover {
            background: linear-gradient(135deg, #ff8533, #ff5500);
            box-shadow: 0 10px 25px rgba(255, 102, 0, 0.4);
            transform: translateY(-3px);
            color: white; /* Mantener blanco en hover */
        }

        .btn-ktm:hover::before {
            left: 100%;
        }

        .btn-ktm:active {
            transform: translateY(0);
        }

        .btn-ktm i {
            margin-right: 10px;
            color: white; /* Icono del botón en blanco */
        }

        /* Pie de página */
        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 102, 0, 0.2);
            color: white; /* Cambiado a blanco */
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .login-footer span {
            color: var(--ktm-orange);
            font-weight: 600;
        }

        /* Efecto de carga */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--ktm-orange);
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-container {
                padding: 15px;
            }
            
            .login-card {
                padding: 30px 25px;
            }
            
            .login-header h1 {
                font-size: 1.8rem;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .home-btn {
                top: 10px;
                left: 10px;
                padding: 8px 15px;
                font-size: 0.9rem;
            }
        }

        /* Modo oscuro adicional */
        .dark-mode-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white; /* Icono en blanco */
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 100;
        }
    </style>
</head>
<body>
    <!-- Botón para volver al inicio -->
    <a href="{{ route('index') }}" class="home-btn">
        <i class="fas fa-home"></i> Volver al Inicio
    </a>

    <!-- Botón para modo oscuro (opcional) -->
    <div class="dark-mode-toggle" id="darkModeToggle">
        <i class="bi bi-moon-stars"></i>
    </div>

    <!-- Efecto de partículas -->
    <div class="particles" id="particles"></div>

    <!-- Contenedor principal -->
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-container">
                    <img src="{{ asset('img/rock.png') }}" alt="KTM Logo" class="logo">
                </div>
                <h1>Acceso Técnico</h1>
                <p>Ingrese sus credenciales de acceso</p>
            </div>

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('tecnico.login.post') }}" method="POST" id="loginForm">
                @csrf
                
                <!-- Campo de usuario -->
                <div class="form-group">
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input 
                            type="text" 
                            name="usuario" 
                            class="form-control" 
                            placeholder="Usuario o Email"
                            value="{{ old('usuario') }}"
                            required
                            autocomplete="username"
                            autofocus>
                    </div>
                </div>
                
                <!-- Campo de contraseña -->
                <div class="form-group">
                    <div class="input-with-icon">
                        <i class="fas fa-key input-icon"></i>
                        <input 
                            type="password" 
                            name="contrasena" 
                            id="passwordInput"
                            class="form-control" 
                            placeholder="Contraseña"
                            required
                            autocomplete="current-password">
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Botón de envío -->
                <button type="submit" class="btn-ktm" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i> Ingresar al Sistema
                </button>
            </form>
            
            <!-- Pie de página -->
            <div class="login-footer">
                © {{ date('Y') }} <span>KTM System</span> — Todos los derechos reservados
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Crear partículas animadas
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 25;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamaño aleatorio
                const size = Math.random() * 6 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Posición inicial aleatoria
                particle.style.left = `${Math.random() * 100}%`;
                
                // Retraso de animación aleatorio
                particle.style.animationDelay = `${Math.random() * 15}s`;
                
                // Duración de animación aleatoria
                const duration = Math.random() * 10 + 15;
                particle.style.animationDuration = `${duration}s`;
                
                // Opacidad aleatoria
                particle.style.opacity = Math.random() * 0.5 + 0.1;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Alternar visibilidad de contraseña
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Cambiar ícono
            const icon = this.querySelector('i');
            if (type === 'text') {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Manejo del envío del formulario
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        
        loginForm.addEventListener('submit', function(e) {
            // Validación básica
            const usuario = this.querySelector('input[name="usuario"]').value.trim();
            const contrasena = this.querySelector('input[name="contrasena"]').value.trim();
            
            if (!usuario || !contrasena) {
                e.preventDefault();
                // Efecto de shake en campos vacíos
                if (!usuario) {
                    this.querySelector('input[name="usuario"]').classList.add('is-invalid');
                    setTimeout(() => {
                        this.querySelector('input[name="usuario"]').classList.remove('is-invalid');
                    }, 1000);
                }
                if (!contrasena) {
                    passwordInput.classList.add('is-invalid');
                    setTimeout(() => {
                        passwordInput.classList.remove('is-invalid');
                    }, 1000);
                }
                return;
            }
            
            // Efecto de carga en el botón
            submitBtn.innerHTML = '<span class="loading"></span> Autenticando...';
            submitBtn.disabled = true;
            
            // Simular tiempo de carga (solo para demostración)
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Ingresar al Sistema';
                submitBtn.disabled = false;
            }, 2000);
        });
        
        // Efecto de validación en tiempo real
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.add('has-value');
                } else {
                    this.classList.remove('has-value');
                }
            });
            
            // Efecto al enfocar
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.classList.remove('focused');
            });
        });
        
        // Inicializar partículas al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Efecto de aparición progresiva
            setTimeout(() => {
                document.querySelector('.login-card').style.opacity = '1';
            }, 100);
        });
        
        // Función para modo oscuro (opcional, ya estamos en modo oscuro)
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('light-mode');
            const icon = this.querySelector('i');
            
            if (document.body.classList.contains('light-mode')) {
                icon.classList.remove('bi-moon-stars');
                icon.classList.add('bi-sun');
                document.body.style.backgroundColor = '#f5f5f5';
                document.querySelector('.login-card').style.background = 'linear-gradient(145deg, #ffffff, #e6e6e6)';
                document.querySelector('.login-card').style.color = '#333';
            } else {
                icon.classList.remove('bi-sun');
                icon.classList.add('bi-moon-stars');
                document.body.style.backgroundColor = '';
                document.querySelector('.login-card').style.background = '';
                document.querySelector('.login-card').style.color = '';
            }
        });
    </script>
</body>
</html>