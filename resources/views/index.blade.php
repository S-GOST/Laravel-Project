<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTM Rocket Service | Sistema de Gestión</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Inter:wght@300;400;500&family=Orbitron:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --ktm-orange: #FF6600;
            --ktm-orange-glow: #FF8C00;
            --ktm-dark: #0A0A0A;
            --ktm-dark-card: #111111;
            --ktm-gray-dark: #1A1A1A;
            --ktm-gray-medium: #2A2A2A;
            --ktm-gray-light: #CCCCCC;
            --ktm-accent: #FF8C00;
            --ktm-glow: rgba(255, 102, 0, 0.4);
            --ktm-glow-strong: rgba(255, 102, 0, 0.7);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--ktm-dark);
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Fondo avanzado con partículas */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(255, 102, 0, 0.03) 0%, transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(255, 102, 0, 0.02) 0%, transparent 25%),
                radial-gradient(circle at 50% 50%, rgba(255, 102, 0, 0.01) 0%, transparent 35%),
                linear-gradient(180deg, var(--ktm-dark) 0%, #0d0d0d 100%);
            z-index: -2;
        }
        
        /* Barra de navegación mejorada */
        .navbar-premium {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 102, 0, 0.2);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand img {
            height: 50px;
            filter: drop-shadow(0 0 10px var(--ktm-glow));
        }
        
        .nav-user-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .nav-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-login {
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            color: var(--ktm-orange);
        }
        
        .btn-login:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.2);
            color: white;
        }
        
        .btn-register {
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-glow));
            border: 1px solid var(--ktm-orange);
            color: white;
        }
        
        .btn-register:hover {
            background: linear-gradient(90deg, var(--ktm-orange-glow), #ffa64d);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.4);
            color: white;
        }
        
        .btn-cart {
            background: rgba(42, 42, 42, 0.8);
            border: 1px solid rgba(255, 102, 0, 0.2);
            color: white;
            position: relative;
            padding: 10px 15px;
        }
        
        .btn-cart:hover {
            background: rgba(255, 102, 0, 0.1);
            border-color: var(--ktm-orange);
            transform: translateY(-2px);
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--ktm-orange);
            color: white;
            font-size: 0.8rem;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .ktm-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0;
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            overflow: hidden;
        }
        
        /* Header premium */
        .ktm-header {
            text-align: center;
            padding: 80px 20px 60px;
            position: relative;
            background: linear-gradient(180deg, rgba(10, 10, 10, 0.9) 0%, transparent 100%);
        }
        
        .ktm-logo-container {
            margin-bottom: 30px;
            position: relative;
        }
        
        .ktm-logo {
            height: 120px;
            filter: drop-shadow(0 0 20px var(--ktm-glow-strong));
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        
        .ktm-logo:hover {
            transform: scale(1.08);
            filter: drop-shadow(0 0 30px var(--ktm-glow-strong));
        }
        
        .ktm-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: transparent;
            background: linear-gradient(90deg, #fff, var(--ktm-orange));
            -webkit-background-clip: text;
            background-clip: text;
            margin-bottom: 20px;
            position: relative;
            text-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
        }
        
        .ktm-subtitle {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            color: var(--ktm-gray-light);
            max-width: 800px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }
        
        .ktm-title-line {
            width: 250px;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
            margin: 0 auto 40px auto;
            border-radius: 2px;
            box-shadow: 0 0 20px var(--ktm-glow);
            position: relative;
            overflow: hidden;
        }
        
        .ktm-title-line::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        /* Main content */
        .main-content {
            padding: 0 20px 60px;
            flex: 1;
        }
        
        /* Secciones de servicios */
        .services-section {
            margin-bottom: 80px;
        }
        
        .section-header {
            margin-bottom: 40px;
            text-align: center;
            position: relative;
        }
        
        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .section-subtitle {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-orange);
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        
        .section-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
        }
        
        /* Grid de servicios */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .service-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 30px 25px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            border-color: var(--ktm-orange);
            box-shadow: 
                0 15px 35px rgba(255, 102, 0, 0.2),
                0 0 30px rgba(255, 102, 0, 0.1);
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--ktm-orange), var(--ktm-orange-glow));
        }
        
        .service-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 102, 0, 0.1);
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: var(--ktm-orange);
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
            background: rgba(255, 102, 0, 0.2);
        }
        
        .service-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            color: white;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .service-desc {
            color: var(--ktm-gray-light);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 20px;
            flex: 1;
        }
        
        .service-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            color: var(--ktm-orange);
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .btn-service {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 8px;
            color: var(--ktm-orange);
            text-decoration: none;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        
        .btn-service:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.2);
            color: white;
        }
        
        /* Sección de información */
        .info-section {
            margin: 60px 0;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .info-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 35px 30px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(255, 102, 0, 0.08), transparent 70%);
            border-radius: 50%;
        }
        
        .info-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-orange);
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .info-title i {
            background: rgba(255, 102, 0, 0.15);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.5rem;
        }
        
        .info-content {
            color: var(--ktm-gray-light);
            font-size: 1.05rem;
            line-height: 1.7;
        }
        
        /* Acceso al sistema */
        .access-section {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.95), rgba(10, 10, 10, 0.95));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 20px;
            padding: 50px 40px;
            margin: 80px 0 40px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.6),
                0 0 40px rgba(255, 102, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        
        .access-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 102, 0, 0.05), transparent 60%);
        }
        
        .access-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.2rem;
            color: white;
            margin-bottom: 40px;
            font-weight: 700;
            letter-spacing: 2px;
            position: relative;
        }
        
        .access-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
        }
        
        .access-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            position: relative;
            z-index: 2;
        }
        
        .access-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 35px 30px;
            background: linear-gradient(145deg, rgba(42, 42, 42, 0.9), rgba(34, 34, 34, 0.9));
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 15px;
            color: white;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 1.3rem;
            min-width: 250px;
            text-align: center;
        }
        
        .access-btn:hover {
            background: linear-gradient(145deg, rgba(255, 102, 0, 0.2), rgba(255, 140, 0, 0.15));
            border-color: var(--ktm-orange);
            transform: translateY(-10px) scale(1.05);
            box-shadow: 
                0 20px 40px rgba(255, 102, 0, 0.25),
                0 0 40px rgba(255, 102, 0, 0.1);
            color: white;
        }
        
        .access-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--ktm-orange);
            transition: all 0.3s ease;
        }
        
        .access-btn:hover .access-icon {
            transform: scale(1.2);
            color: var(--ktm-orange-glow);
        }
        
        .access-role {
            font-size: 1rem;
            color: var(--ktm-gray-light);
            margin-top: 10px;
            font-weight: 500;
        }
        
        /* Línea divisoria */
        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 102, 0, 0.3), transparent);
            margin: 80px 0;
            width: 100%;
        }
        
        /* Footer premium */
        .ktm-footer {
            margin-top: 80px;
            text-align: center;
            width: 100%;
            color: var(--ktm-gray-light);
            font-size: 0.9rem;
            padding: 50px 20px 30px;
            border-top: 1px solid rgba(255, 102, 0, 0.1);
            position: relative;
            background: rgba(10, 10, 10, 0.9);
        }
        
        .footer-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
            text-align: left;
        }
        
        .footer-item {
            display: flex;
            flex-direction: column;
        }
        
        .footer-title {
            font-family: 'Orbitron', sans-serif;
            color: var(--ktm-orange);
            font-size: 1.3rem;
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .footer-item p {
            margin-bottom: 10px;
            color: var(--ktm-gray-light);
            line-height: 1.6;
        }
        
        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(42, 42, 42, 0.8);
            border-radius: 50%;
            color: var(--ktm-gray-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-social a:hover {
            background: rgba(255, 102, 0, 0.2);
            color: var(--ktm-orange);
            transform: translateY(-3px);
        }
        
        .copyright {
            font-size: 0.85rem;
            color: #777;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .copyright p {
            margin-bottom: 10px;
        }
        
        /* Efecto de partículas */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--ktm-orange);
            border-radius: 50%;
            opacity: 0.3;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .ktm-title {
                font-size: 2.4rem;
            }
            
            .access-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .access-btn {
                width: 100%;
                max-width: 400px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-brand img {
                height: 40px;
            }
            
            .nav-user-actions {
                gap: 10px;
            }
            
            .nav-btn {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            
            .ktm-header {
                padding: 60px 20px 40px;
            }
            
            .ktm-title {
                font-size: 2rem;
            }
            
            .ktm-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .section-subtitle {
                font-size: 1.5rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-info {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }
            
            .footer-item {
                text-align: center;
                align-items: center;
            }
        }
        
        @media (max-width: 576px) {
            .ktm-title {
                font-size: 1.7rem;
                letter-spacing: 2px;
            }
            
            .section-title {
                font-size: 1.7rem;
            }
            
            .access-section {
                padding: 40px 20px;
            }
            
            .access-title {
                font-size: 1.8rem;
            }
        }
    </style>
    
    <!-- Agregar CSS para el buscador -->
    <style>
        /* Estructura de la barra de navegación */
        .navbar-premium .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 0;
            gap: 20px;
        }
        
        /* Buscador KTM */
        .ktm-search-container {
            flex: 1;
            max-width: 500px;
            min-width: 200px;
            position: relative;
        }
        
        .ktm-search-form {
            position: relative;
            width: 100%;
        }
        
        .search-input-group {
            display: flex;
            align-items: center;
            background: var(--ktm-gray-medium);
            border: 2px solid rgba(255, 102, 0, 0.3);
            border-radius: 30px;
            padding: 5px 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(255, 102, 0, 0.1);
        }
        
        .search-input-group:focus-within {
            border-color: var(--ktm-orange);
            box-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
            transform: translateY(-1px);
        }
        
        .search-icon {
            color: var(--ktm-orange);
            font-size: 1.2rem;
            margin-right: 10px;
            flex-shrink: 0;
        }
        
        .ktm-search-input {
            background: transparent;
            border: none;
            color: var(--ktm-gray-light);
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            padding: 8px 0;
            width: 100%;
            outline: none;
        }
        
        .ktm-search-input::placeholder {
            color: #888;
        }
        
        .ktm-search-btn {
            background: var(--ktm-orange);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            margin-left: 5px;
        }
        
        .ktm-search-btn:hover {
            background: var(--ktm-orange-glow);
            transform: scale(1.05);
        }
        
        .ktm-search-btn i {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        /* Sugerencias de búsqueda */
        .search-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--ktm-gray-dark);
            border: 2px solid var(--ktm-orange);
            border-top: none;
            border-radius: 0 0 15px 15px;
            margin-top: -2px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }
        
        .search-suggestion-item {
            padding: 12px 15px;
            color: var(--ktm-gray-light);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .search-suggestion-item:hover {
            background: rgba(255, 102, 0, 0.1);
            color: var(--ktm-orange);
        }
        
        .search-suggestion-item:last-child {
            border-bottom: none;
        }
        
        .suggestion-icon {
            color: var(--ktm-orange);
            font-size: 1rem;
        }
        
        .suggestion-text {
            flex: 1;
        }
        
        .suggestion-category {
            background: rgba(255, 102, 0, 0.2);
            color: var(--ktm-orange);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .navbar-left {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
                width: 100%;
                margin-bottom: 15px;
            }
            
            .navbar-brand {
                text-align: center;
            }
            
            .ktm-search-container {
                max-width: 100%;
            }
            
            .nav-user-actions {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .search-input-group {
                padding: 5px 10px;
            }
            
            .ktm-search-input {
                font-size: 0.9rem;
            }
            
            .ktm-search-btn {
                width: 32px;
                height: 32px;
            }
        }
    </style>
</head>
<body>
    <!-- Partículas de fondo -->
    <div class="particles" id="particles"></div>
    
    <!-- Barra de navegación -->
    <nav class="navbar navbar-premium">
        <div class="container">
            <!-- Logo y buscador -->
            <div class="navbar-left">
                <div class="navbar-brand">
                    <img src="{{ asset('img/rock.png') }}" alt="KTM Rocket Service Logo">
                </div>
                
                <!-- Buscador KTM -->
                <div class="ktm-search-container">
                    <form class="ktm-search-form" id="searchForm">
                        <div class="search-input-group">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" 
                                   class="form-control ktm-search-input" 
                                   id="searchInput" 
                                   placeholder="Buscar servicios, repuestos, diagnósticos..."
                                   aria-label="Buscar">
                            <button type="submit" class="ktm-search-btn">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                        <div class="search-suggestions" id="searchSuggestions">
                            <!-- Sugerencias se cargarán aquí -->
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="nav-user-actions">
                <a href="{{ route('carrito') }}" class="nav-btn btn-cart">
                    <i class="bi bi-cart3"></i>
                    <span>Carrito</span>
                    <span class="cart-count" id="cartCount">0</span>
                </a>
                <a href="{{ route('cliente.login') }}" class="nav-btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Iniciar Sesión</span>
                </a>
                <a href="{{ route('cliente.registro') }}" class="nav-btn btn-register">
                    <i class="bi bi-person-plus"></i>
                    <span>Registrarse</span>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="ktm-container">
        <!-- Header principal -->
        <header class="ktm-header">
            <div class="container">
                <h1 class="ktm-title">SISTEMA GESTIÓN ÓRDENES DE SERVICIO TÉCNICO</h1>
                <p class="ktm-subtitle">
                    Plataforma integral para la gestión de servicios técnicos especializados en motocicletas KTM de alta cilindrada.
                    Accede a nuestro sistema profesional para administrar todas tus operaciones de mantenimiento y reparación.
                </p>
                <div class="ktm-title-line"></div>
            </div>
        </header>
        
        <!-- Contenido principal -->
        <main class="main-content">
            <div class="container">
                <!-- Sección Mantenimiento -->
                <section class="services-section" id="mantenimiento">
                    <div class="section-header">
                        <h2 class="section-title">Mantenimiento</h2>
                        <h3 class="section-subtitle">Categorías</h3>
                    </div>
                    
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="service-name">Mantenimiento Preventivo</h4>
                            <p class="service-desc">Inspecciones programadas y mantenimiento regular para prevenir fallos y optimizar el rendimiento de tu motocicleta.</p>
                            <div class="service-price">€120.00</div>
                            <button class="btn-service add-to-cart-btn" 
                               data-id="mantenimiento_preventivo"
                               data-name="Mantenimiento Preventivo"
                               data-price="120.00"
                               data-category="Mantenimiento">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-wrench-adjustable"></i>
                            </div>
                            <h4 class="service-name">Mantenimiento Correctivo</h4>
                            <p class="service-desc">Reparación de fallas y averías existentes para restaurar la funcionalidad completa de tu motocicleta.</p>
                            <div class="service-price">€200.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="mantenimiento_correctivo"
                               data-name="Mantenimiento Correctivo"
                               data-price="200.00"
                               data-category="Mantenimiento">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <h4 class="service-name">Mantenimiento Predictivo</h4>
                            <p class="service-desc">Monitoreo y análisis avanzado para anticipar fallas y programar intervenciones antes de que ocurran problemas.</p>
                            <div class="service-price">€180.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="mantenimiento_predictivo"
                               data-name="Mantenimiento Predictivo"
                               data-price="180.00"
                               data-category="Mantenimiento">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <h4 class="service-name">Mantenimiento Proactivo</h4>
                            <p class="service-desc">Mejoras continuas y optimización del rendimiento para maximizar la vida útil y el desempeño de tu motocicleta.</p>
                            <div class="service-price">€250.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="mantenimiento_proactivo"
                               data-name="Mantenimiento Proactivo"
                               data-price="250.00"
                               data-category="Mantenimiento">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </section>
                
                <div class="section-divider"></div>
                
                <!-- Sección Reparaciones -->
                <section class="services-section" id="reparaciones">
                    <div class="section-header">
                        <h2 class="section-title">Reparaciones</h2>
                        <h3 class="section-subtitle">Categorías</h3>
                    </div>
                    
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-tools"></i>
                            </div>
                            <h4 class="service-name">Reparaciones por Daños</h4>
                            <p class="service-desc">Reparación integral de daños estructurales y funcionales causados por accidentes o uso intensivo.</p>
                            <div class="service-price">€350.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="reparaciones_danios"
                               data-name="Reparaciones por Daños"
                               data-price="350.00"
                               data-category="Reparaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-gear"></i>
                            </div>
                            <h4 class="service-name">Motorización y Transmisión</h4>
                            <p class="service-desc">Reparación y ajuste de motores, cajas de cambios, embragues y sistemas de transmisión completa.</p>
                            <div class="service-price">€500.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="motorizacion_transmision"
                               data-name="Motorización y Transmisión"
                               data-price="500.00"
                               data-category="Reparaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <h4 class="service-name">Electrónica y Sistemas de Control</h4>
                            <p class="service-desc">Diagnóstico y reparación de sistemas electrónicos, ECU, inyección electrónica y controles digitales.</p>
                            <div class="service-price">€300.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="electronica_control"
                               data-name="Electrónica y Sistemas de Control"
                               data-price="300.00"
                               data-category="Reparaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-palette"></i>
                            </div>
                            <h4 class="service-name">Carrocería y Personalización</h4>
                            <p class="service-desc">Reparación de carrocería, pintura personalizada y modificaciones estéticas a medida.</p>
                            <div class="service-price">€400.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="carroceria_personalizacion"
                               data-name="Carrocería y Personalización"
                               data-price="400.00"
                               data-category="Reparaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </section>
                
                <div class="section-divider"></div>
                
                <!-- Sección Diagnósticos -->
                <section class="services-section" id="diagnosticos">
                    <div class="section-header">
                        <h2 class="section-title">Diagnósticos</h2>
                        <h3 class="section-subtitle">Categorías</h3>
                    </div>
                    
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <h4 class="service-name">Diagnóstico de Emisiones y Rendimiento</h4>
                            <p class="service-desc">Análisis de emisiones, consumo de combustible y rendimiento general del motor.</p>
                            <div class="service-price">€150.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="diagnostico_emisiones"
                               data-name="Diagnóstico de Emisiones y Rendimiento"
                               data-price="150.00"
                               data-category="Diagnósticos">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="service-name">Diagnóstico de Seguridad y Dinámica</h4>
                            <p class="service-desc">Evaluación de sistemas de frenos, suspensión, neumáticos y estabilidad dinámica.</p>
                            <div class="service-price">€180.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="diagnostico_seguridad"
                               data-name="Diagnóstico de Seguridad y Dinámica"
                               data-price="180.00"
                               data-category="Diagnósticos">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <h4 class="service-name">Diagnóstico Eléctrico</h4>
                            <p class="service-desc">Comprobación de sistemas eléctricos, batería, alternador y cableado completo.</p>
                            <div class="service-price">€120.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="diagnostico_electrico"
                               data-name="Diagnóstico Eléctrico"
                               data-price="120.00"
                               data-category="Diagnósticos">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-gear-wide"></i>
                            </div>
                            <h4 class="service-name">Diagnóstico Mecánico</h4>
                            <p class="service-desc">Inspección completa de componentes mecánicos, desgastes y ajustes necesarios.</p>
                            <div class="service-price">€160.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="diagnostico_mecanico"
                               data-name="Diagnóstico Mecánico"
                               data-price="160.00"
                               data-category="Diagnósticos">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </section>
                
                <div class="section-divider"></div>
                
                <!-- Sección Instalaciones -->
                <section class="services-section" id="instalaciones">
                    <div class="section-header">
                        <h2 class="section-title">Instalaciones</h2>
                        <h3 class="section-subtitle">Categorías</h3>
                    </div>
                    
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-wrench"></i>
                            </div>
                            <h4 class="service-name">Instalación Personalizada</h4>
                            <p class="service-desc">Instalación de componentes y accesorios específicos según tus necesidades y preferencias.</p>
                            <div class="service-price">€100.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="instalacion_personalizada"
                               data-name="Instalación Personalizada"
                               data-price="100.00"
                               data-category="Instalaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-shield-shaded"></i>
                            </div>
                            <h4 class="service-name">Instalaciones de Seguridad</h4>
                            <p class="service-desc">Montaje de sistemas de seguridad, alarmas, bloqueadores y dispositivos antitheft.</p>
                            <div class="service-price">€200.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="instalaciones_seguridad"
                               data-name="Instalaciones de Seguridad"
                               data-price="200.00"
                               data-category="Instalaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h4 class="service-name">Instalaciones de Rendimiento</h4>
                            <p class="service-desc">Montaje de componentes para mejorar el rendimiento: escapes, filtros, reprogramaciones.</p>
                            <div class="service-price">€350.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="instalaciones_rendimiento"
                               data-name="Instalaciones de Rendimiento"
                               data-price="350.00"
                               data-category="Instalaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-stars"></i>
                            </div>
                            <h4 class="service-name">Accesorios Personalizados</h4>
                            <p class="service-desc">Instalación de accesorios estéticos y funcionales para personalizar tu motocicleta.</p>
                            <div class="service-price">€150.00</div>
                            <button class="btn-service add-to-cart-btn"
                               data-id="accesorios_personalizados"
                               data-name="Accesorios Personalizados"
                               data-price="150.00"
                               data-category="Instalaciones">
                                <i class="bi bi-cart-plus"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                </section>
                
                <div class="section-divider"></div>
                
                <!-- Sección de información -->
                <section class="info-section">
                    <div class="info-grid">
                        <div class="info-card">
                            <h3 class="info-title">
                                <i class="bi bi-rocket-takeoff"></i>
                                KTM ROCKET SERVICE
                            </h3>
                            <div class="info-content">
                                <p>Venta de repuestos originales para motos KTM de gama alta. Mantenimiento y reparación con enfoque en alta cilindrada. Especialistas certificados y tecnología de última generación para garantizar el máximo rendimiento de tu motocicleta.</p>
                                <p class="mt-3">Contamos con taller especializado y herramientas de diagnóstico avanzadas para atender cualquier necesidad de tu KTM.</p>
                            </div>
                        </div>
                        
                        <div class="info-card">
                            <h3 class="info-title">
                                <i class="bi bi-shield-lock"></i>
                                Política de Privacidad
                            </h3>
                            <div class="info-content">
                                <p><strong>2025</strong></p>
                                <p>Todos los derechos reservados. Protección de datos garantizada bajo normativa internacional.</p>
                                <p class="mt-3">Nuestro compromiso con la privacidad y seguridad de la información de nuestros clientes es fundamental. Implementamos las mejores prácticas de seguridad en todos nuestros procesos.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Acceso al sistema -->
                <section class="access-section">
                    <h3 class="access-title">Acceso al Sistema de Gestión</h3>
                    <div class="access-buttons">
                        <a href="{{ route('admin.login') }}" class="access-btn">
                            <i class="bi bi-person-badge-fill access-icon"></i>
                            <span>Administrador</span>
                            <span class="access-role">Acceso completo al sistema</span>
                        </a>
                        <a href="{{ route('tecnico.login') }}" class="access-btn">
                            <i class="bi bi-tools access-icon"></i>
                            <span>Técnico Especializado</span>
                            <span class="access-role">Gestión de reparaciones y diagnósticos</span>
                        </a>
                    </div>
                </section>
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="ktm-footer">
            <div class="container">
                <div class="footer-info">
                    <div class="footer-item">
                        <h4 class="footer-title">KTM Rocket Service</h4>
                        <p>Especialistas en motos de alta cilindrada</p>
                        <p>Certificación oficial KTM</p>
                        <p>Taller autorizado para motos de competición</p>
                        <div class="footer-social">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                    
                    <div class="footer-item">
                        <h4 class="footer-title">Contacto</h4>
                        <p><i class="bi bi-envelope me-2"></i> info@ktmrocketservice.com</p>
                        <p><i class="bi bi-telephone me-2"></i> +34 912 345 678</p>
                        <p><i class="bi bi-geo-alt me-2"></i> Calle Motocicleta, 123 - Madrid</p>
                        <p><i class="bi bi-clock me-2"></i> Atención 24/7 para emergencias</p>
                    </div>
                    
                    <div class="footer-item">
                        <h4 class="footer-title">Horario</h4>
                        <p>Lunes a Viernes: 9:00 - 18:00</p>
                        <p>Sábados: 10:00 - 14:00</p>
                        <p>Domingos: Cerrado</p>
                        <p>Servicio de urgencias 24h</p>
                    </div>
                </div>
                
                <div class="copyright">
                    <p>© 2025 KTM Rocket Service | Sistema de Gestión de Órdenes de Servicio Técnico</p>
                    <p>Venta de repuestos originales para motos KTM de gama alta | Todos los derechos reservados</p>
                    <p class="mt-3">Página 1 | 44 | Licencias Reservadas | Versión 3.0</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript -->
    <script>
        // ==========================
        // SISTEMA DE CARRITO PARA PÁGINA PRINCIPAL
        // ==========================
        
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Sistema de carrito - Index inicializado");
            
            // Variables del carrito
            let cart = JSON.parse(localStorage.getItem('ktmCart')) || {};
            
            // Función para actualizar contador del carrito
            function updateCartCount() {
                let total = 0;
                for (const id in cart) {
                    total += cart[id].quantity;
                }
                const cartCountElement = document.getElementById('cartCount');
                if (cartCountElement) {
                    cartCountElement.textContent = total;
                }
            }
            
            // Función para guardar carrito
            function saveCart() {
                localStorage.setItem('ktmCart', JSON.stringify(cart));
                updateCartCount();
            }
            
            // Función para agregar producto
            function addToCart(product) {
                const { id, name, price, category } = product;
                
                if (cart[id]) {
                    cart[id].quantity += 1;
                } else {
                    // Determinar icono según categoría
                    let icon = 'box';
                    if (category.includes('Mantenimiento')) icon = 'wrench';
                    else if (category.includes('Reparaciones')) icon = 'tools';
                    else if (category.includes('Diagnósticos')) icon = 'clipboard-pulse';
                    else if (category.includes('Instalaciones')) icon = 'gear';
                    
                    cart[id] = {
                        id: id,
                        name: name,
                        price: parseFloat(price),
                        quantity: 1,
                        category: category,
                        icon: icon,
                        description: `Servicio de ${category} para tu motocicleta KTM`
                    };
                }
                
                saveCart();
                showNotification(`${name} agregado al carrito`, 'success');
            }
            
            // Función para mostrar notificaciones
            function showNotification(message, type = 'success') {
                // Crear notificación
                const notification = document.createElement('div');
                notification.className = `cart-notification alert-${type}`;
                notification.innerHTML = `
                    <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                    <span>${message}</span>
                    <button class="close-notification">&times;</button>
                `;
                
                // Estilos de notificación
                notification.style.cssText = `
                    position: fixed;
                    top: 100px;
                    right: 20px;
                    padding: 15px 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    z-index: 9999;
                    animation: slideIn 0.3s ease-out;
                    background: ${type === 'success' ? '#d4edda' : '#f8d7da'};
                    color: ${type === 'success' ? '#155724' : '#721c24'};
                    border: 1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'};
                `;
                
                document.body.appendChild(notification);
                
                // Botón para cerrar
                const closeBtn = notification.querySelector('.close-notification');
                closeBtn.addEventListener('click', () => {
                    notification.style.animation = 'slideOut 0.3s ease-out';
                    setTimeout(() => notification.remove(), 300);
                });
                
                // Auto-eliminar después de 3 segundos
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.style.animation = 'slideOut 0.3s ease-out';
                        setTimeout(() => notification.remove(), 300);
                    }
                }, 3000);
            }
            
            // Agregar estilos CSS para notificaciones
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
            
            // Asignar eventos a los botones de agregar al carrito
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const product = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        price: this.dataset.price,
                        category: this.dataset.category
                    };
                    
                    addToCart(product);
                });
            });
            
            // Inicializar contador del carrito
            updateCartCount();
            
            // ==========================
            // SISTEMA DE BÚSQUEDA
            // ==========================
            
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            const searchSuggestions = document.getElementById('searchSuggestions');
            
            // Datos de ejemplo para sugerencias
            const searchData = [
                { id: 1, name: 'Mantenimiento Preventivo', category: 'Mantenimiento', icon: 'bi-shield-check', price: '120.00' },
                { id: 2, name: 'Mantenimiento Correctivo', category: 'Mantenimiento', icon: 'bi-wrench-adjustable', price: '200.00' },
                { id: 3, name: 'Mantenimiento Predictivo', category: 'Mantenimiento', icon: 'bi-graph-up-arrow', price: '180.00' },
                { id: 4, name: 'Mantenimiento Proactivo', category: 'Mantenimiento', icon: 'bi-lightning-charge', price: '250.00' },
                { id: 5, name: 'Reparaciones por Daños', category: 'Reparaciones', icon: 'bi-tools', price: '350.00' },
                { id: 6, name: 'Motorización y Transmisión', category: 'Reparaciones', icon: 'bi-gear', price: '500.00' },
                { id: 7, name: 'Electrónica y Sistemas de Control', category: 'Reparaciones', icon: 'bi-cpu', price: '300.00' },
                { id: 8, name: 'Carrocería y Personalización', category: 'Reparaciones', icon: 'bi-palette', price: '400.00' },
                { id: 9, name: 'Diagnóstico de Emisiones y Rendimiento', category: 'Diagnósticos', icon: 'bi-speedometer2', price: '150.00' },
                { id: 10, name: 'Diagnóstico de Seguridad y Dinámica', category: 'Diagnósticos', icon: 'bi-shield-check', price: '180.00' },
                { id: 11, name: 'Diagnóstico Eléctrico', category: 'Diagnósticos', icon: 'bi-lightning-charge', price: '120.00' },
                { id: 12, name: 'Diagnóstico Mecánico', category: 'Diagnósticos', icon: 'bi-gear-wide', price: '160.00' },
                { id: 13, name: 'Instalación Personalizada', category: 'Instalaciones', icon: 'bi-wrench', price: '100.00' },
                { id: 14, name: 'Instalaciones de Seguridad', category: 'Instalaciones', icon: 'bi-shield-shaded', price: '200.00' },
                { id: 15, name: 'Instalaciones de Rendimiento', category: 'Instalaciones', icon: 'bi-graph-up', price: '350.00' },
                { id: 16, name: 'Accesorios Personalizados', category: 'Instalaciones', icon: 'bi-stars', price: '150.00' }
            ];
            
            // Función para filtrar sugerencias
            function filterSuggestions(query) {
                if (!query.trim()) {
                    return [];
                }
                
                const lowerQuery = query.toLowerCase();
                return searchData.filter(item => 
                    item.name.toLowerCase().includes(lowerQuery) ||
                    item.category.toLowerCase().includes(lowerQuery)
                ).slice(0, 8); // Limitar a 8 resultados
            }
            
            // Función para mostrar sugerencias
            function showSuggestions(suggestions) {
                searchSuggestions.innerHTML = '';
                
                if (suggestions.length === 0) {
                    searchSuggestions.style.display = 'none';
                    return;
                }
                
                suggestions.forEach(suggestion => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'search-suggestion-item';
                    suggestionItem.innerHTML = `
                        <i class="bi ${suggestion.icon} suggestion-icon"></i>
                        <div class="suggestion-text">${suggestion.name}</div>
                        <div class="suggestion-category">${suggestion.category}</div>
                    `;
                    
                    suggestionItem.addEventListener('click', function() {
                        searchInput.value = suggestion.name;
                        searchSuggestions.style.display = 'none';
                        
                        // Agregar al carrito
                        addToCart({
                            id: suggestion.id,
                            name: suggestion.name,
                            price: suggestion.price,
                            category: suggestion.category
                        });
                    });
                    
                    searchSuggestions.appendChild(suggestionItem);
                });
                
                searchSuggestions.style.display = 'block';
            }
            
            // Evento para input
            searchInput.addEventListener('input', function() {
                const query = this.value;
                const suggestions = filterSuggestions(query);
                showSuggestions(suggestions);
            });
            
            // Evento para submit del formulario
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const query = searchInput.value.trim();
                
                if (query) {
                    const suggestions = filterSuggestions(query);
                    if (suggestions.length > 0) {
                        // Agregar el primer resultado al carrito
                        const firstSuggestion = suggestions[0];
                        addToCart({
                            id: firstSuggestion.id,
                            name: firstSuggestion.name,
                            price: firstSuggestion.price,
                            category: firstSuggestion.category
                        });
                        searchInput.value = '';
                    } else {
                        showNotification('No se encontraron resultados para tu búsqueda', 'warning');
                    }
                    
                    searchSuggestions.style.display = 'none';
                }
            });
            
            // Ocultar sugerencias al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!searchForm.contains(e.target)) {
                    searchSuggestions.style.display = 'none';
                }
            });
            
            // Efecto focus en el input
            searchInput.addEventListener('focus', function() {
                const query = this.value;
                const suggestions = filterSuggestions(query);
                showSuggestions(suggestions);
            });
        });
    </script>
</body>
</html>