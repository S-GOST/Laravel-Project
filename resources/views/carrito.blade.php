<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras | KTM Rocket Service</title>
    
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
            --success-color: #4CAF50;
            --warning-color: #FF9800;
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
        
        /* Barra de navegación */
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
            background: rgba(255, 102, 0, 0.2);
            border: 1px solid var(--ktm-orange);
            color: white;
            position: relative;
            padding: 10px 15px;
        }
        
        .btn-cart:hover {
            background: rgba(255, 102, 0, 0.3);
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
        
        /* Contenedor principal */
        .cart-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        /* Encabezado del carrito */
        .cart-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .cart-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: transparent;
            background: linear-gradient(90deg, #fff, var(--ktm-orange));
            -webkit-background-clip: text;
            background-clip: text;
            margin-bottom: 15px;
            text-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
        }
        
        .cart-subtitle {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            color: var(--ktm-gray-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .cart-title-line {
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
            margin: 20px auto 30px auto;
            border-radius: 2px;
            box-shadow: 0 0 20px var(--ktm-glow);
            position: relative;
            overflow: hidden;
        }
        
        .cart-title-line::after {
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
        
        /* Layout del carrito */
        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            margin-bottom: 50px;
        }
        
        @media (max-width: 992px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Lista de productos */
        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .cart-empty {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 60px 40px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            text-align: center;
        }
        
        .cart-empty-icon {
            font-size: 4rem;
            color: var(--ktm-gray-medium);
            margin-bottom: 20px;
        }
        
        .cart-empty-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-gray-light);
            margin-bottom: 15px;
        }
        
        .cart-empty-text {
            color: var(--ktm-gray-light);
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        /* Tarjeta de producto */
        .cart-item-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            transition: all 0.3s ease;
            display: flex;
            gap: 20px;
            position: relative;
        }
        
        .cart-item-card:hover {
            border-color: var(--ktm-orange);
            box-shadow: 0 10px 25px rgba(255, 102, 0, 0.1);
        }
        
        .cart-item-image {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            background: rgba(255, 102, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--ktm-orange);
            flex-shrink: 0;
        }
        
        .cart-item-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .cart-item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .cart-item-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            color: white;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .cart-item-category {
            font-size: 0.9rem;
            color: var(--ktm-orange);
            background: rgba(255, 102, 0, 0.1);
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
        }
        
        .cart-item-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-orange);
            font-weight: 700;
            text-align: right;
        }
        
        .cart-item-desc {
            color: var(--ktm-gray-light);
            margin-bottom: 20px;
            line-height: 1.5;
            flex: 1;
        }
        
        .cart-item-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            color: var(--ktm-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quantity-btn:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
            transform: scale(1.1);
        }
        
        .quantity-value {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            color: white;
            min-width: 40px;
            text-align: center;
        }
        
        .cart-item-subtotal {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            color: white;
            font-weight: 600;
        }
        
        .cart-item-actions {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--ktm-gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
            color: var(--ktm-orange);
        }
        
        .action-btn.delete:hover {
            background: rgba(244, 67, 54, 0.2);
            border-color: #F44336;
            color: #F44336;
        }
        
        /* Panel de resumen */
        .cart-summary {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.95), rgba(10, 10, 10, 0.95));
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            height: fit-content;
            position: sticky;
            top: 100px;
        }
        
        .summary-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 102, 0, 0.2);
            text-align: center;
        }
        
        .summary-details {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .summary-label {
            color: var(--ktm-gray-light);
            font-size: 1.1rem;
        }
        
        .summary-value {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
        }
        
        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid rgba(255, 102, 0, 0.3);
        }
        
        .total-label {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            color: white;
            font-weight: 700;
        }
        
        .total-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: var(--ktm-orange);
            font-weight: 700;
        }
        
        .summary-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }
        
        .cart-btn {
            padding: 16px 20px;
            border-radius: 10px;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            cursor: pointer;
        }
        
        .btn-checkout {
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-glow));
            color: white;
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
        }
        
        .btn-checkout:hover {
            background: linear-gradient(90deg, var(--ktm-orange-glow), #ffa64d);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 102, 0, 0.4);
            color: white;
        }
        
        .btn-continue {
            background: rgba(42, 42, 42, 0.8);
            border: 1px solid rgba(255, 102, 0, 0.3);
            color: var(--ktm-orange);
        }
        
        .btn-continue:hover {
            background: rgba(255, 102, 0, 0.1);
            border-color: var(--ktm-orange);
            transform: translateY(-3px);
            color: white;
        }
        
        .summary-promo {
            margin-top: 25px;
        }
        
        .promo-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.1rem;
            color: var(--ktm-gray-light);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .promo-form {
            display: flex;
            gap: 10px;
        }
        
        .promo-input {
            flex: 1;
            padding: 12px 15px;
            background: rgba(42, 42, 42, 0.8);
            border: 1px solid rgba(255, 102, 0, 0.2);
            border-radius: 8px;
            color: white;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
        }
        
        .promo-input:focus {
            outline: none;
            border-color: var(--ktm-orange);
        }
        
        .btn-promo {
            padding: 12px 20px;
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 8px;
            color: var(--ktm-orange);
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-promo:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
        }
        
        /* Recomendaciones */
        .cart-recommendations {
            margin-top: 60px;
        }
        
        .recommendations-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: white;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .recommendations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .recommendation-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .recommendation-card:hover {
            border-color: var(--ktm-orange);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 102, 0, 0.1);
        }
        
        .recommendation-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: rgba(255, 102, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--ktm-orange);
        }
        
        .recommendation-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            color: white;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .recommendation-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.5rem;
            color: var(--ktm-orange);
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .btn-recommendation {
            padding: 10px 20px;
            background: rgba(255, 102, 0, 0.1);
            border: 1px solid rgba(255, 102, 0, 0.3);
            border-radius: 8px;
            color: var(--ktm-orange);
            text-decoration: none;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-recommendation:hover {
            background: rgba(255, 102, 0, 0.2);
            border-color: var(--ktm-orange);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Footer */
        .cart-footer {
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .cart-title {
                font-size: 2.2rem;
            }
            
            .cart-item-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .cart-item-image {
                width: 100px;
                height: 100px;
            }
            
            .cart-item-header {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .cart-item-price {
                text-align: center;
            }
            
            .cart-item-footer {
                flex-direction: column;
                gap: 20px;
            }
            
            .cart-item-actions {
                position: static;
                justify-content: center;
                margin-top: 15px;
            }
            
            .recommendations-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-info {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }
            
            .footer-item {
                align-items: center;
            }
        }
        
        @media (max-width: 576px) {
            .cart-title {
                font-size: 1.8rem;
            }
            
            .promo-form {
                flex-direction: column;
            }
            
            .cart-btn {
                padding: 14px 16px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-premium">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('img/rock.png') }}" alt="KTM Rocket Service Logo">
            </div>
            
            <div class="nav-user-actions">
                <a href="{{ route('index') }}" class="nav-btn btn-login">
                    <i class="bi bi-house-door"></i>
                    <span>Inicio</span>
                </a>
                <a href="#" class="nav-btn btn-cart">
                    <i class="bi bi-cart3"></i>
                    <span>Carrito</span>
                    <span class="cart-count" id="cartCount">3</span>
                </a>
                <a href="{{ route('login') }}" class="nav-btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Iniciar Sesión</span>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Contenido principal del carrito -->
    <div class="cart-container">
        <!-- Encabezado -->
        <div class="cart-header">
            <h1 class="cart-title">TU CARRITO DE COMPRAS</h1>
            <p class="cart-subtitle">Revisa y gestiona los servicios seleccionados para tu motocicleta KTM</p>
            <div class="cart-title-line"></div>
        </div>
        
    
        <div class="cart-layout">
            <!-- Lista de productos -->
            <div class="cart-items" id="cartItems">
                <!-- Carrito vacío -->
                 <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="bi bi-cart-x"></i>
                    </div>
                    <h3 class="cart-empty-title">Tu carrito está vacío</h3>
                    <p class="cart-empty-text">Aún no has agregado servicios al carrito. Explora nuestro catálogo y encuentra el servicio perfecto para tu KTM.</p>
                    <a href="{{ route('home') }}" class="cart-btn btn-continue">
                        <i class="bi bi-arrow-left"></i>
                        Explorar Servicios
                    </a>
                </div> 
                
                <!-- Elementos del carrito -->
                <div class="cart-item-card">
                    <div class="cart-item-image">
                        <i class="bi bi-wrench-adjustable"></i>
                    </div>
                    
                    <div class="cart-item-content">
                        <div class="cart-item-header">
                            <div>
                                <h3 class="cart-item-title">Mantenimiento Preventivo</h3>
                                <span class="cart-item-category">Mantenimiento</span>
                            </div>
                            <div class="cart-item-price">$120.00</div>
                        </div>
                        
                        <p class="cart-item-desc">
                            Inspecciones programadas y mantenimiento regular para prevenir fallos y optimizar el rendimiento de tu motocicleta.
                        </p>
                        
                        <div class="cart-item-footer">
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease" data-id="1">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="quantity-value" id="quantity-1">1</span>
                                <button class="quantity-btn increase" data-id="1">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="cart-item-subtotal">
                                Subtotal: <span id="subtotal-1">$120.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cart-item-actions">
                        <button class="action-btn save" title="Guardar para después">
                            <i class="bi bi-bookmark"></i>
                        </button>
                        <button class="action-btn delete" data-id="1" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                
                <div class="cart-item-card">
                    <div class="cart-item-image">
                        <i class="bi bi-tools"></i>
                    </div>
                    
                    <div class="cart-item-content">
                        <div class="cart-item-header">
                            <div>
                                <h3 class="cart-item-title">Reparaciones por Daños</h3>
                                <span class="cart-item-category">Reparaciones</span>
                            </div>
                            <div class="cart-item-price">$350.00</div>
                        </div>
                        
                        <p class="cart-item-desc">
                            Reparación integral de daños estructurales y funcionales causados por accidentes o uso intensivo.
                        </p>
                        
                        <div class="cart-item-footer">
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease" data-id="2">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="quantity-value" id="quantity-2">1</span>
                                <button class="quantity-btn increase" data-id="2">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="cart-item-subtotal">
                                Subtotal: <span id="subtotal-2">$350.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cart-item-actions">
                        <button class="action-btn save" title="Guardar para después">
                            <i class="bi bi-bookmark"></i>
                        </button>
                        <button class="action-btn delete" data-id="2" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                
                <div class="cart-item-card">
                    <div class="cart-item-image">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    
                    <div class="cart-item-content">
                        <div class="cart-item-header">
                            <div>
                                <h3 class="cart-item-title">Diagnóstico de Emisiones</h3>
                                <span class="cart-item-category">Diagnósticos</span>
                            </div>
                            <div class="cart-item-price">$150.00</div>
                        </div>
                        
                        <p class="cart-item-desc">
                            Análisis de emisiones, consumo de combustible y rendimiento general del motor.
                        </p>
                        
                        <div class="cart-item-footer">
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease" data-id="3">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="quantity-value" id="quantity-3">1</span>
                                <button class="quantity-btn increase" data-id="3">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="cart-item-subtotal">
                                Subtotal: <span id="subtotal-3">$150.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cart-item-actions">
                        <button class="action-btn save" title="Guardar para después">
                            <i class="bi bi-bookmark"></i>
                        </button>
                        <button class="action-btn delete" data-id="3" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Panel de resumen -->
            <div class="cart-summary">
                <h3 class="summary-title">RESUMEN DEL PEDIDO</h3>
                
                <div class="summary-details">
                    <div class="summary-row">
                        <span class="summary-label">Subtotal</span>
                        <span class="summary-value" id="summary-subtotal">$620.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Descuento</span>
                        <span class="summary-value" id="summary-discount">-$30.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Envío</span>
                        <span class="summary-value" id="summary-shipping">$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Impuestos (10%)</span>
                        <span class="summary-value" id="summary-tax">$62.00</span>
                    </div>
                </div>
                
                <div class="summary-total">
                    <span class="total-label">TOTAL</span>
                    <span class="total-value" id="summary-total">$652.00</span>
                </div>
                
                <div class="summary-actions">
                    <button class="cart-btn btn-checkout" id="checkoutBtn">
                        <i class="bi bi-lock-fill"></i>
                        Proceder al Pago
                    </button>
                    <a href="{{ route('index') }}" class="cart-btn btn-continue">
                        <i class="bi bi-arrow-left"></i>
                        Continuar Comprando
                    </a>
                </div>
                
                <div class="summary-promo">
                    <div class="promo-title">
                        <i class="bi bi-tag"></i>
                        ¿Tienes un código de descuento?
                    </div>
                    <div class="promo-form">
                        <input type="text" class="promo-input" id="promoCode" placeholder="Ingresa tu código">
                        <button class="btn-promo" id="applyPromo">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recomendaciones -->
        <div class="cart-recommendations">
            <h3 class="recommendations-title">SERVICIOS RECOMENDADOS</h3>
            
            <div class="recommendations-grid">
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h4 class="recommendation-name">Instalación de Rendimiento</h4>
                    <div class="recommendation-price">$350.00</div>
                    <a href="#" class="btn-recommendation add-to-cart" data-id="4" data-price="350">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </a>
                </div>
                
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-shield-shaded"></i>
                    </div>
                    <h4 class="recommendation-name">Instalación de Seguridad</h4>
                    <div class="recommendation-price">$200.00</div>
                    <a href="#" class="btn-recommendation add-to-cart" data-id="5" data-price="200">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </a>
                </div>
                
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h4 class="recommendation-name">Personalización Estética</h4>
                    <div class="recommendation-price">$400.00</div>
                    <a href="#" class="btn-recommendation add-to-cart" data-id="6" data-price="400">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="cart-footer">
        <div class="container">
            <div class="footer-info">
                <div class="footer-item">
                    <h4 class="footer-title">KTM Rocket Service</h4>
                    <p>Especialistas en motos de alta cilindrada</p>
                    <p>Certificación oficial KTM</p>
                    <p>Taller autorizado para motos de competición</p>
                </div>
                
                <div class="footer-item">
                    <h4 class="footer-title">Contacto</h4>
                    <p><i class="bi bi-envelope me-2"></i> info@ktmrocketservice.com</p>
                    <p><i class="bi bi-telephone me-2"></i> +34 912 345 678</p>
                    <p><i class="bi bi-geo-alt me-2"></i> Calle Motocicleta, 123 - Madrid</p>
                </div>
                
                <div class="footer-item">
                    <h4 class="footer-title">Políticas</h4>
                    <p>Envíos y entregas</p>
                    <p>Devoluciones y garantías</p>
                    <p>Términos y condiciones</p>
                    <p>Política de privacidad</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>© 2025 KTM Rocket Service | Sistema de Gestión de Órdenes de Servicio Técnico</p>
                <p>Venta de repuestos originales para motos KTM de gama alta | Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Datos del carrito
        const cartItems = {
            1: { name: "Mantenimiento Preventivo", price: 120, quantity: 1, category: "Mantenimiento" },
            2: { name: "Reparaciones por Daños", price: 350, quantity: 1, category: "Reparaciones" },
            3: { name: "Diagnóstico de Emisiones", price: 150, quantity: 1, category: "Diagnósticos" }
        };
        
        let discountApplied = false;
        const discountAmount = 30;
        const taxRate = 0.10; // 10%
        
        // Función para actualizar el carrito
        function updateCart() {
            let subtotal = 0;
            let itemCount = 0;
            
            // Calcular subtotal y cantidad total
            Object.keys(cartItems).forEach(id => {
                const item = cartItems[id];
                subtotal += item.price * item.quantity;
                itemCount += item.quantity;
                
                // Actualizar cantidades y subtotales individuales
                const quantityElement = document.getElementById(`quantity-${id}`);
                const subtotalElement = document.getElementById(`subtotal-${id}`);
                
                if (quantityElement) quantityElement.textContent = item.quantity;
                if (subtotalElement) subtotalElement.textContent = `$${(item.price * item.quantity).toFixed(2)}`;
            });
            
            // Actualizar contador del carrito
            document.getElementById('cartCount').textContent = itemCount;
            
            // Calcular impuestos
            const tax = subtotal * taxRate;
            
            // Calcular descuento
            const discount = discountApplied ? discountAmount : 0;
            
            // Calcular total
            const total = subtotal - discount + tax;
            
            // Actualizar resumen
            document.getElementById('summary-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('summary-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('summary-discount').textContent = discount > 0 ? `-$${discount.toFixed(2)}` : `$0.00`;
            document.getElementById('summary-total').textContent = `$${total.toFixed(2)}`;
            
            // Mostrar/ocultar carrito vacío
            const cartItemsContainer = document.getElementById('cartItems');
            if (Object.keys(cartItems).length === 0) {
                cartItemsContainer.innerHTML = `
                    <div class="cart-empty">
                        <div class="cart-empty-icon">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h3 class="cart-empty-title">Tu carrito está vacío</h3>
                        <p class="cart-empty-text">Aún no has agregado servicios al carrito. Explora nuestro catálogo y encuentra el servicio perfecto para tu KTM.</p>
                        <a href="{{ route('home') }}" class="cart-btn btn-continue">
                            <i class="bi bi-arrow-left"></i>
                            Explorar Servicios
                        </a>
                    </div>
                `;
            }
        }
        
        // Función para eliminar un producto
        function removeItem(id) {
            if (confirm('¿Estás seguro de que quieres eliminar este servicio del carrito?')) {
                delete cartItems[id];
                updateCart();
                
                // Eliminar visualmente la tarjeta
                const card = document.querySelector(`.cart-item-card [data-id="${id}"]`)?.closest('.cart-item-card');
                if (card) {
                    card.style.opacity = '0';
                    card.style.transform = 'translateX(-20px)';
                    setTimeout(() => {
                        card.remove();
                        updateCart();
                    }, 300);
                }
            }
        }
        
        // Función para agregar un producto
        function addItem(id, name, price, category) {
            if (cartItems[id]) {
                cartItems[id].quantity += 1;
            } else {
                // Crear nueva tarjeta
                const newCard = document.createElement('div');
                newCard.className = 'cart-item-card';
                newCard.innerHTML = `
                    <div class="cart-item-image">
                        <i class="bi bi-${getIconByCategory(category)}"></i>
                    </div>
                    
                    <div class="cart-item-content">
                        <div class="cart-item-header">
                            <div>
                                <h3 class="cart-item-title">${name}</h3>
                                <span class="cart-item-category">${category}</span>
                            </div>
                            <div class="cart-item-price">$${price.toFixed(2)}</div>
                        </div>
                        
                        <p class="cart-item-desc">
                            ${getDescriptionByCategory(category)}
                        </p>
                        
                        <div class="cart-item-footer">
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease" data-id="${id}">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="quantity-value" id="quantity-${id}">1</span>
                                <button class="quantity-btn increase" data-id="${id}">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="cart-item-subtotal">
                                Subtotal: <span id="subtotal-${id}">$${price.toFixed(2)}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cart-item-actions">
                        <button class="action-btn save" title="Guardar para después">
                            <i class="bi bi-bookmark"></i>
                        </button>
                        <button class="action-btn delete" data-id="${id}" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                `;
                
                // Añadir al DOM con animación
                newCard.style.opacity = '0';
                newCard.style.transform = 'translateY(20px)';
                document.getElementById('cartItems').prepend(newCard);
                
                // Animar entrada
                setTimeout(() => {
                    newCard.style.transition = 'all 0.4s ease';
                    newCard.style.opacity = '1';
                    newCard.style.transform = 'translateY(0)';
                }, 10);
                
                // Agregar eventos a los botones
                addEventListenersToCard(newCard, id);
                
                cartItems[id] = { name, price, quantity: 1, category };
            }
            
            updateCart();
            showNotification('Servicio agregado al carrito', 'success');
        }
        
        // Función para obtener icono por categoría
        function getIconByCategory(category) {
            const icons = {
                'Mantenimiento': 'wrench-adjustable',
                'Reparaciones': 'tools',
                'Diagnósticos': 'speedometer2',
                'Instalaciones': 'wrench'
            };
            return icons[category] || 'gear';
        }
        
        // Función para obtener descripción por categoría
        function getDescriptionByCategory(category) {
            const descriptions = {
                'Mantenimiento': 'Servicio especializado para mantener tu motocicleta en óptimas condiciones.',
                'Reparaciones': 'Reparación profesional de componentes y sistemas de tu motocicleta.',
                'Diagnósticos': 'Análisis completo para identificar y solucionar problemas.',
                'Instalaciones': 'Instalación profesional de componentes y accesorios.'
            };
            return descriptions[category] || 'Servicio profesional para tu motocicleta KTM.';
        }
        
        // Función para agregar event listeners a una tarjeta
        function addEventListenersToCard(card, id) {
            // Botones de cantidad
            card.querySelector('.decrease').addEventListener('click', () => {
                if (cartItems[id].quantity > 1) {
                    cartItems[id].quantity--;
                    updateCart();
                }
            });
            
            card.querySelector('.increase').addEventListener('click', () => {
                cartItems[id].quantity++;
                updateCart();
            });
            
            // Botón de eliminar
            card.querySelector('.delete').addEventListener('click', () => {
                removeItem(id);
            });
            
            // Botón de guardar
            card.querySelector('.save').addEventListener('click', function() {
                this.innerHTML = '<i class="bi bi-bookmark-check"></i>';
                this.style.color = 'var(--success-color)';
                showNotification('Servicio guardado para después', 'info');
                
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-bookmark"></i>';
                    this.style.color = '';
                }, 2000);
            });
        }
        
        // Función para mostrar notificaciones
        function showNotification(message, type) {
            // Crear elemento de notificación
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <i class="bi bi-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            `;
            
            // Estilos de la notificación
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: ${type === 'success' ? 'rgba(76, 175, 80, 0.9)' : 'rgba(33, 150, 243, 0.9)'};
                color: white;
                padding: 15px 20px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                gap: 10px;
                z-index: 9999;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                transform: translateX(120%);
                transition: transform 0.3s ease;
            `;
            
            // Añadir al DOM
            document.body.appendChild(notification);
            
            // Mostrar animación
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Ocultar después de 3 segundos
            setTimeout(() => {
                notification.style.transform = 'translateX(120%)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
        
        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar carrito
            updateCart();
            
            // Agregar eventos a los botones existentes
            document.querySelectorAll('.quantity-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const isIncrease = this.classList.contains('increase');
                    
                    if (isIncrease) {
                        cartItems[id].quantity++;
                    } else if (cartItems[id].quantity > 1) {
                        cartItems[id].quantity--;
                    }
                    
                    updateCart();
                });
            });
            
            // Botones de eliminar
            document.querySelectorAll('.action-btn.delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    removeItem(id);
                });
            });
            
            // Botones de guardar
            document.querySelectorAll('.action-btn.save').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.innerHTML = '<i class="bi bi-bookmark-check"></i>';
                    this.style.color = 'var(--success-color)';
                    showNotification('Servicio guardado para después', 'info');
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="bi bi-bookmark"></i>';
                        this.style.color = '';
                    }, 2000);
                });
            });
            
            // Botones de agregar de las recomendaciones
            document.querySelectorAll('.add-to-cart').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.getAttribute('data-id');
                    const price = parseFloat(this.getAttribute('data-price'));
                    const name = this.closest('.recommendation-card').querySelector('.recommendation-name').textContent;
                    const category = this.closest('.recommendation-card').querySelector('.recommendation-name').textContent.includes('Instalación') ? 'Instalaciones' : 'Servicios';
                    
                    addItem(id, name, price, category);
                });
            });
            
            // Botón de aplicar código de descuento
            document.getElementById('applyPromo').addEventListener('click', function() {
                const promoCode = document.getElementById('promoCode').value.trim();
                
                if (promoCode.toUpperCase() === 'KTM2025') {
                    discountApplied = true;
                    updateCart();
                    showNotification('¡Código de descuento aplicado!', 'success');
                    document.getElementById('promoCode').value = '';
                } else {
                    showNotification('Código inválido. Intenta con KTM2025', 'warning');
                }
            });
            
            // Botón de checkout
            document.getElementById('checkoutBtn').addEventListener('click', function() {
                if (Object.keys(cartItems).length === 0) {
                    showNotification('El carrito está vacío. Agrega servicios antes de proceder al pago.', 'warning');
                    return;
                }
                
                // Simulación de proceso de pago
                this.innerHTML = '<i class="bi bi-hourglass-split"></i> Procesando...';
                this.disabled = true;
                
                setTimeout(() => {
                    showNotification('¡Pago procesado exitosamente! Redirigiendo...', 'success');
                    
                    // Simular redirección
                    setTimeout(() => {
                        alert('¡Gracias por tu compra! Serás redirigido a la página de confirmación.');
                        // En un caso real, aquí redirigirías a la página de confirmación
                    }, 1500);
                }, 2000);
            });
            
            // Permitir usar Enter en el campo de código promocional
            document.getElementById('promoCode').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    document.getElementById('applyPromo').click();
                }
            });
            
            // Efecto de brillo en el título
            const title = document.querySelector('.cart-title');
            let hue = 0;
            
            function animateTitle() {
                hue = (hue + 0.3) % 360;
                title.style.textShadow = `0 0 20px hsla(${hue}, 100%, 50%, 0.4)`;
                requestAnimationFrame(animateTitle);
            }
            
            animateTitle();
        });
    </script>
</body>
</html>