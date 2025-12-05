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
                <!-- Botón para volver a inicio -->
                <a href="{{ route('index') }}" class="nav-btn btn-login">
                    <i class="bi bi-house-door"></i>
                    <span>Inicio</span>
                </a>
                <a href="{{ route('carrito') }}" class="nav-btn btn-cart">
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
                    <a href="{{ route('index') }}" class="cart-btn btn-continue">
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
    <h3 class="recommendations-title">PRODUCTOS DISPONIBLES</h3>

    <div class="recommendations-grid">

        <!-- 🛢️ Aceite Motorex -->
        <div class="recommendation-card">
            <div class="recommendation-icon">
                <i class="bi bi-droplet-half"></i>
            </div>
            <h4 class="recommendation-name">Aceite Motorex 4T 10W-50</h4>
            <div class="recommendation-price">$75.00</div>
            <a href="#" class="btn-recommendation add-to-cart" data-id="oil1" data-price="75">
                <i class="bi bi-cart-plus"></i>
                Agregar
            </a>
        </div>

        <!-- ❄️ Refrigerante Ipone -->
        <div class="recommendation-card">
            <div class="recommendation-icon">
                <i class="bi bi-snow"></i>
            </div>
            <h4 class="recommendation-name">Refrigerante Ipone Coolant</h4>
            <div class="recommendation-price">$40.00</div>
            <a href="#" class="btn-recommendation add-to-cart" data-id="coolant1" data-price="40">
                <i class="bi bi-cart-plus"></i>
                Agregar
            </a>
        </div>

        <!-- 💡 Direccional KTM DUKE 200 -->
        <div class="recommendation-card">
            <div class="recommendation-icon">
                <i class="bi bi-lightbulb"></i>
            </div>
            <h4 class="recommendation-name">Direccional LED KTM Duke 200</h4>
            <div class="recommendation-price">$55.00</div>
            <a href="#" class="btn-recommendation add-to-cart" data-id="light1" data-price="55">
                <i class="bi bi-cart-plus"></i>
                Agregar
            </a>
        </div>

        <!-- 🧽 Limpiador de Cadena -->
        <div class="recommendation-card">
            <div class="recommendation-icon">
                <i class="bi bi-brush"></i>
            </div>
            <h4 class="recommendation-name">Limpiador de Cadena Motul</h4>
            <div class="recommendation-price">$25.00</div>
            <a href="#" class="btn-recommendation add-to-cart" data-id="chain1" data-price="25">
                <i class="bi bi-cart-plus"></i>
                Agregar
            </a>
        </div>

        <!-- 🔋 Batería Yuasa YTZ7S -->
        <div class="recommendation-card">
            <div class="recommendation-icon">
                <i class="bi bi-battery-full"></i>
            </div>
            <h4 class="recommendation-name">Batería Yuasa YTZ7S</h4>
            <div class="recommendation-price">$95.00</div>
            <a href="#" class="btn-recommendation add-to-cart" data-id="battery1" data-price="95">
                <i class="bi bi-cart-plus"></i>
                Agregar
            </a>
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
document.addEventListener("DOMContentLoaded", function () {
    // ==========================
    // 🧩 Cargar carrito desde LocalStorage
    // ==========================
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};
    let discountApplied = false;
    const discountAmount = 30;
    const taxRate = 0.1;

    const cartItemsContainer = document.getElementById("cartItems");
    const homeRoute = "{{ route('index') }}";

    // ==========================
    // 🔁 Renderizar carrito dinámicamente
    // ==========================
    function renderCart() {
        cartItemsContainer.innerHTML = "";

        if (Object.keys(cartItems).length === 0) {
            cartItemsContainer.innerHTML = `
                <div class="cart-empty">
                    <div class="cart-empty-icon"><i class="bi bi-cart-x"></i></div>
                    <h3 class="cart-empty-title">Tu carrito está vacío</h3>
                    <p class="cart-empty-text">Aún no has agregado servicios al carrito. Explora nuestro catálogo y encuentra el servicio perfecto para tu KTM.</p>
                    <a href="${homeRoute}" class="cart-btn btn-continue">
                        <i class="bi bi-arrow-left"></i> Explorar Servicios
                    </a>
                </div>`;
            updateSummary();
            return;
        }

        for (const id in cartItems) {
            const item = cartItems[id];
            const card = document.createElement("div");
            card.className = "cart-item-card";
            card.innerHTML = `
                <div class="cart-item-image"><i class="bi bi-wrench"></i></div>
                <div class="cart-item-content">
                    <div class="cart-item-header">
                        <div>
                            <h3 class="cart-item-title">${item.name}</h3>
                            <span class="cart-item-category">${item.category}</span>
                        </div>
                        <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                    </div>
                    <p class="cart-item-desc">Servicio profesional de ${item.category.toLowerCase()}.</p>
                    <div class="cart-item-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn decrease" data-id="${id}"><i class="bi bi-dash"></i></button>
                            <span class="quantity-value" id="quantity-${id}">${item.quantity}</span>
                            <button class="quantity-btn increase" data-id="${id}"><i class="bi bi-plus"></i></button>
                        </div>
                        <div class="cart-item-subtotal">Subtotal: <span id="subtotal-${id}">$${(item.price * item.quantity).toFixed(2)}</span></div>
                    </div>
                </div>
                <div class="cart-item-actions">
                    <button class="action-btn delete" data-id="${id}" title="Eliminar">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;
            cartItemsContainer.appendChild(card);
        }

        updateSummary();
    }

    // ==========================
    // 💰 Actualizar totales
    // ==========================
    function updateSummary() {
        let subtotal = 0;
        let itemCount = 0;

        for (const id in cartItems) {
            const item = cartItems[id];
            subtotal += item.price * item.quantity;
            itemCount += item.quantity;
        }

        const tax = subtotal * taxRate;
        const discount = discountApplied ? discountAmount : 0;
        const total = subtotal - discount + tax;

        document.getElementById("cartCount").textContent = itemCount;
        document.getElementById("summary-subtotal").textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById("summary-tax").textContent = `$${tax.toFixed(2)}`;
        document.getElementById("summary-discount").textContent = discount > 0 ? `-$${discount.toFixed(2)}` : `$0.00`;
        document.getElementById("summary-total").textContent = `$${total.toFixed(2)}`;

        localStorage.setItem("cartItems", JSON.stringify(cartItems));
    }

    // ==========================
    // ➕ Agregar ítem
    // ==========================
    function addItem(id, name, price, category) {
        if (cartItems[id]) {
            cartItems[id].quantity++;
        } else {
            cartItems[id] = { name, price, quantity: 1, category };
        }
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        renderCart();
        showNotification("Servicio agregado al carrito", "success");
    }

    // ==========================
    // ❌ Eliminar ítem
    // ==========================
    function removeItem(id) {
        if (confirm("¿Eliminar este servicio del carrito?")) {
            delete cartItems[id];
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            renderCart();
            showNotification("Servicio eliminado", "warning");
        }
    }

    // ==========================
    // 🔔 Notificación visual
    // ==========================
    function showNotification(message, type) {
        const note = document.createElement("div");
        note.className = `notification ${type}`;
        note.innerHTML = `<i class="bi bi-${type === "success" ? "check-circle" : "exclamation-triangle"}"></i> ${message}`;
        note.style.cssText = `
            position: fixed; top: 100px; right: 20px;
            background: ${type === "success" ? "rgba(76,175,80,0.9)" : "rgba(255,152,0,0.9)"};
            color: white; padding: 12px 18px; border-radius: 10px;
            transition: all 0.4s ease; transform: translateX(120%);
            z-index: 9999;
        `;
        document.body.appendChild(note);
        setTimeout(() => (note.style.transform = "translateX(0)"), 10);
        setTimeout(() => {
            note.style.transform = "translateX(120%)";
            setTimeout(() => note.remove(), 400);
        }, 3000);
    }

    // ==========================
    // ⚙️ Listeners dinámicos
    // ==========================
    cartItemsContainer.addEventListener("click", function (e) {
        if (e.target.closest(".increase")) {
            const id = e.target.closest(".increase").dataset.id;
            cartItems[id].quantity++;
            updateSummary();
            renderCart();
        } else if (e.target.closest(".decrease")) {
            const id = e.target.closest(".decrease").dataset.id;
            if (cartItems[id].quantity > 1) {
                cartItems[id].quantity--;
            } else {
                removeItem(id);
            }
            renderCart();
        } else if (e.target.closest(".delete")) {
            const id = e.target.closest(".delete").dataset.id;
            removeItem(id);
        }
    });

    // ==========================
    // 🎁 Promociones
    // ==========================
    document.getElementById("applyPromo").addEventListener("click", () => {
        const promo = document.getElementById("promoCode").value.trim().toUpperCase();
        if (promo === "KTM2025") {
            discountApplied = true;
            updateSummary();
            showNotification("¡Código de descuento aplicado!", "success");
        } else {
            showNotification("Código inválido. Usa: KTM2025", "warning");
        }
        document.getElementById("promoCode").value = "";
    });

    // ==========================
    // 💳 Pago simulado
    // ==========================
    document.getElementById("checkoutBtn").addEventListener("click", function () {
        if (Object.keys(cartItems).length === 0) {
            showNotification("El carrito está vacío.", "warning");
            return;
        }
        this.innerHTML = '<i class="bi bi-hourglass-split"></i> Procesando...';
        this.disabled = true;
        setTimeout(() => {
            showNotification("¡Pago exitoso!", "success");
            localStorage.removeItem("cartItems");
            setTimeout(() => (window.location.href = "{{ route('confirmacion') }}"), 1500);
        }, 2000);
    });

    // ==========================
    // 🧠 Inicialización
    // ==========================
    renderCart();

    // Agregar desde recomendaciones
    document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            const id = btn.dataset.id;
            const price = parseFloat(btn.dataset.price);
            const name = btn.closest(".recommendation-card").querySelector(".recommendation-name").textContent;
            addItem(id, name, price, "Servicios");
        });
    });
});
</script>


</body>
</html>