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
        
        /* Notificaciones */
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
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
                    <span class="cart-count" id="cartCount">0</span>
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
            <!-- Lista de productos - AHORA DINÁMICO -->
            <div class="cart-items" id="cartItemsContainer">
                <!-- Los productos se cargarán aquí dinámicamente con JavaScript -->
            </div>
            
            <!-- Panel de resumen - AHORA DINÁMICO -->
            <div class="cart-summary">
                <h3 class="summary-title">RESUMEN DEL PEDIDO</h3>
                
                <div class="summary-details">
                    <div class="summary-row">
                        <span class="summary-label">Subtotal:</span>
                        <span class="summary-value" id="summarySubtotal">€0,00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Envío:</span>
                        <span class="summary-value" id="summaryEnvio">€9,99</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Descuento:</span>
                        <span class="summary-value" style="color: var(--ktm-orange);" id="summaryDescuento">-€30,00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Impuestos (21%):</span>
                        <span class="summary-value" id="summaryImpuestos">€0,00</span>
                    </div>
                </div>
                
                <div class="summary-total">
                    <span class="total-label">TOTAL</span>
                    <span class="total-value" id="summaryTotal">€0,00</span>
                </div>
                
                <div class="summary-actions">
                    <button id="btnCheckout" class="cart-btn btn-checkout" style="display: none;">
                        <i class="bi bi-credit-card"></i>
                        PROCEDER AL PAGO
                    </button>
                    <a href="{{ route('index') }}" class="cart-btn btn-continue">
                        <i class="bi bi-arrow-left"></i>
                        SEGUIR COMPRANDO
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
                    <div class="recommendation-price">€75,00</div>
                    <button class="btn-recommendation add-to-cart-btn" data-id="oil1" data-price="75" data-name="Aceite Motorex 4T 10W-50" data-category="Lubricantes">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </button>
                </div>

                <!-- ❄️ Refrigerante Ipone -->
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-snow"></i>
                    </div>
                    <h4 class="recommendation-name">Refrigerante Ipone Coolant</h4>
                    <div class="recommendation-price">€40,00</div>
                    <button class="btn-recommendation add-to-cart-btn" data-id="coolant1" data-price="40" data-name="Refrigerante Ipone Coolant" data-category="Refrigerantes">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </button>
                </div>

                <!-- 💡 Direccional KTM DUKE 200 -->
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <h4 class="recommendation-name">Direccional LED KTM Duke 200</h4>
                    <div class="recommendation-price">€55,00</div>
                    <button class="btn-recommendation add-to-cart-btn" data-id="light1" data-price="55" data-name="Direccional LED KTM Duke 200" data-category="Accesorios">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </button>
                </div>

                <!-- 🧽 Limpiador de Cadena -->
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-brush"></i>
                    </div>
                    <h4 class="recommendation-name">Limpiador de Cadena Motul</h4>
                    <div class="recommendation-price">€25,00</div>
                    <button class="btn-recommendation add-to-cart-btn" data-id="chain1" data-price="25" data-name="Limpiador de Cadena Motul" data-category="Limpieza">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </button>
                </div>

                <!-- 🔋 Batería Yuasa YTZ7S -->
                <div class="recommendation-card">
                    <div class="recommendation-icon">
                        <i class="bi bi-battery-full"></i>
                    </div>
                    <h4 class="recommendation-name">Batería Yuasa YTZ7S</h4>
                    <div class="recommendation-price">€95,00</div>
                    <button class="btn-recommendation add-to-cart-btn" data-id="battery1" data-price="95" data-name="Batería Yuasa YTZ7S" data-category="Electricidad">
                        <i class="bi bi-cart-plus"></i>
                        Agregar
                    </button>
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
    // ==========================
    // SISTEMA DE CARRITO MEJORADO
    // ==========================
    
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Página del carrito cargada");
        
        // Variables globales
        let cart = JSON.parse(localStorage.getItem('ktmCart')) || {};
        let discountApplied = JSON.parse(localStorage.getItem('ktmDiscount')) || false;
        const shippingCost = 9.99;
        const discountAmount = 30.00;
        const taxRate = 0.21;
        
        // ==========================
        // INICIALIZAR CARRITO
        // ==========================
        initCart();
        
        function initCart() {
            console.log("Inicializando carrito...");
            console.log("Productos en carrito:", cart);
            renderCart();
            updateCartCount();
            setupEventListeners();
            setupCartItemEventDelegation(); // Configurar delegación de eventos UNA VEZ
        }
        
        // ==========================
        // RENDERIZAR CARRITO
        // ==========================
        function renderCart() {
            const container = document.getElementById('cartItemsContainer');
            
            if (Object.keys(cart).length === 0) {
                container.innerHTML = `
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
                    </div>`;
                
                document.getElementById('btnCheckout').style.display = 'none';
                updateSummary();
                return;
            }
            
            let html = '';
            for (const id in cart) {
                const item = cart[id];
                const subtotal = item.price * item.quantity;
                
                html += `
                    <div class="cart-item-card" data-id="${id}">
                        <div class="cart-item-image">
                            <i class="bi bi-${item.icon || 'box'}"></i>
                        </div>
                        
                        <div class="cart-item-content">
                            <div class="cart-item-header">
                                <div>
                                    <h3 class="cart-item-title">${item.name}</h3>
                                    <span class="cart-item-category">${item.category}</span>
                                </div>
                                <div class="cart-item-price">€${item.price.toFixed(2).replace('.', ',')}</div>
                            </div>
                            
                            <p class="cart-item-desc">
                                ${item.description || 'Producto de alta calidad para tu motocicleta KTM'}
                            </p>
                            
                            <div class="cart-item-footer">
                                <div class="quantity-controls">
                                    <button class="quantity-btn decrease" data-id="${id}">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span class="quantity-value">${item.quantity}</span>
                                    <button class="quantity-btn increase" data-id="${id}">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <div class="cart-item-subtotal">
                                    Subtotal: <span>€${subtotal.toFixed(2).replace('.', ',')}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cart-item-actions">
                            <button class="action-btn delete" data-id="${id}" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>`;
            }
            
            container.innerHTML = html;
            document.getElementById('btnCheckout').style.display = 'flex';
            updateSummary();
            
            // Restaurar estado del descuento si estaba aplicado
            if (discountApplied) {
                document.getElementById('promoCode').value = 'KTM2024';
            }
        }
        
        // ==========================
        // DELEGACIÓN DE EVENTOS PARA ITEMS DEL CARRITO (SOLUCIÓN AL PROBLEMA)
        // ==========================
        function setupCartItemEventDelegation() {
            // Usar delegación de eventos en el contenedor principal
            // Esto funciona incluso para elementos creados dinámicamente
            document.addEventListener('click', function(e) {
                const target = e.target;
                
                // Verificar si el clic fue en un botón de cantidad o eliminar
                if (target.closest('.increase')) {
                    const button = target.closest('.increase');
                    const id = button.dataset.id;
                    updateQuantity(id, 1);
                    return;
                }
                
                if (target.closest('.decrease')) {
                    const button = target.closest('.decrease');
                    const id = button.dataset.id;
                    updateQuantity(id, -1);
                    return;
                }
                
                if (target.closest('.delete')) {
                    const button = target.closest('.delete');
                    const id = button.dataset.id;
                    if (confirm('¿Estás seguro de eliminar este producto del carrito?')) {
                        removeFromCart(id);
                    }
                    return;
                }
            });
        }
        
        // ==========================
        // ACTUALIZAR RESUMEN
        // ==========================
        function updateSummary() {
            let subtotal = 0;
            let totalItems = 0;
            
            for (const id in cart) {
                subtotal += cart[id].price * cart[id].quantity;
                totalItems += cart[id].quantity;
            }
            
            const tax = subtotal * taxRate;
            const discount = discountApplied ? discountAmount : 0;
            const total = subtotal + shippingCost - discount + tax;
            
            // Actualizar UI
            document.getElementById('summarySubtotal').textContent = `€${subtotal.toFixed(2).replace('.', ',')}`;
            document.getElementById('summaryImpuestos').textContent = `€${tax.toFixed(2).replace('.', ',')}`;
            document.getElementById('summaryDescuento').textContent = `-€${discount.toFixed(2).replace('.', ',')}`;
            document.getElementById('summaryTotal').textContent = `€${total.toFixed(2).replace('.', ',')}`;
        }
        
        // ==========================
        // ACTUALIZAR CONTADOR
        // ==========================
        function updateCartCount() {
            let total = 0;
            for (const id in cart) {
                total += cart[id].quantity;
            }
            document.getElementById('cartCount').textContent = total;
        }
        
        // ==========================
        // GUARDAR CARRITO
        // ==========================
        function saveCart() {
            localStorage.setItem('ktmCart', JSON.stringify(cart));
            localStorage.setItem('ktmDiscount', JSON.stringify(discountApplied));
            updateCartCount();
        }
        
        // ==========================
        // AGREGAR PRODUCTO
        // ==========================
        function addToCart(product) {
            console.log("Agregando producto:", product);
            
            const { id, name, price, category } = product;
            
            if (cart[id]) {
                cart[id].quantity += 1;
            } else {
                // Determinar icono basado en categoría
                let icon = 'box';
                if (category.includes('Lubricante')) icon = 'droplet-half';
                else if (category.includes('Refrigerante')) icon = 'snow';
                else if (category.includes('Accesorio') || category.includes('LED')) icon = 'lightbulb';
                else if (category.includes('Limpieza')) icon = 'brush';
                else if (category.includes('Electricidad') || category.includes('Batería')) icon = 'battery-full';
                
                cart[id] = {
                    id: id,
                    name: name,
                    price: parseFloat(price),
                    quantity: 1,
                    category: category,
                    icon: icon,
                    description: `Producto de ${category} para tu motocicleta KTM`
                };
            }
            
            saveCart();
            renderCart();
            showNotification(`${name} agregado al carrito`, 'success');
        }
        
        // ==========================
        // ELIMINAR PRODUCTO
        // ==========================
        function removeFromCart(id) {
            if (cart[id]) {
                delete cart[id];
                saveCart();
                renderCart();
                showNotification('Producto eliminado del carrito', 'warning');
            }
        }
        
        // ==========================
        // ACTUALIZAR CANTIDAD
        // ==========================
        function updateQuantity(id, change) {
            if (cart[id]) {
                cart[id].quantity += change;
                
                if (cart[id].quantity < 1) {
                    removeFromCart(id);
                } else {
                    saveCart();
                    renderCart(); // Solo renderizamos, no reconfiguramos eventos
                }
            }
        }
        
        // ==========================
        // NOTIFICACIONES
        // ==========================
        function showNotification(message, type = 'success') {
            // Eliminar notificaciones anteriores
            const oldNotifications = document.querySelectorAll('.notification');
            oldNotifications.forEach(notif => notif.remove());
            
            // Crear notificación
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : 'warning'} notification`;
            notification.innerHTML = `
                <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 10px;"></button>
            `;
            
            // Estilos
            notification.style.cssText = `
                position: fixed;
                top: 80px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                animation: slideIn 0.3s ease-out;
                display: flex;
                align-items: center;
            `;
            
            // Agregar al DOM
            document.body.appendChild(notification);
            
            // Configurar botón de cerrar
            const closeBtn = notification.querySelector('.btn-close');
            closeBtn.addEventListener('click', () => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            });
            
            // Eliminar después de 3 segundos
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.animation = 'slideOut 0.3s ease-out';
                    setTimeout(() => notification.remove(), 300);
                }
            }, 3000);
        }
        
        // ==========================
        // CONFIGURAR EVENT LISTENERS
        // ==========================
        function setupEventListeners() {
            console.log("Configurando event listeners...");
            
            // Botones de agregar al carrito (RECOMENDACIONES)
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                // Eliminar event listeners antiguos para evitar duplicados
                button.replaceWith(button.cloneNode(true));
            });
            
            // Re-asignar event listeners a los botones clonados
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log("Botón de agregar clickeado");
                    
                    const product = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        price: this.dataset.price,
                        category: this.dataset.category
                    };
                    
                    addToCart(product);
                });
            });
            
            // Código de descuento
            document.getElementById('applyPromo').addEventListener('click', applyDiscount);
            document.getElementById('promoCode').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') applyDiscount();
            });
            
            // Botón de checkout
            const checkoutBtn = document.getElementById('btnCheckout');
            if (checkoutBtn) {
                checkoutBtn.addEventListener('click', function() {
                    if (Object.keys(cart).length === 0) {
                        showNotification('Tu carrito está vacío', 'warning');
                        return;
                    }
                    
                    // Guardar carrito para checkout
                    localStorage.setItem('checkoutCart', JSON.stringify(cart));
                    
                    // Redirigir a checkout
                    window.location.href = "{{ route('checkout') }}";
                });
            }
        }
        
        // ==========================
        // APLICAR DESCUENTO
        // ==========================
        function applyDiscount() {
            const promoCode = document.getElementById('promoCode').value.trim().toUpperCase();
            
            if (promoCode === 'KTM2024' || promoCode === 'KTM2025') {
                discountApplied = true;
                saveCart(); // Guardar el estado del descuento
                updateSummary();
                showNotification('¡Código de descuento aplicado! -€30,00', 'success');
            } else {
                discountApplied = false;
                saveCart();
                updateSummary();
                showNotification('Código inválido. Usa: KTM2024 o KTM2025', 'warning');
            }
        }
        
        // ==========================
        // LIMPIAR CARRITO (opcional)
        // ==========================
        function clearCart() {
            if (confirm('¿Estás seguro de vaciar todo el carrito?')) {
                cart = {};
                discountApplied = false;
                saveCart();
                renderCart();
                showNotification('Carrito vaciado', 'warning');
            }
        }
        
        // ==========================
        // ANIMACIONES CSS
        // ==========================
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
            .cart-item-card {
                transition: all 0.3s ease;
            }
            .cart-item-card.removing {
                transform: translateX(100%);
                opacity: 0;
            }
        `;
        document.head.appendChild(style);
        
        // ==========================
        // TEST: Agregar algunos productos de ejemplo al carrito
        // ==========================
        // Descomenta estas líneas si quieres productos de prueba
        /*
        if (Object.keys(cart).length === 0) {
            setTimeout(() => {
                addToCart({
                    id: 'test1',
                    name: 'Aceite Motorex 4T 10W-50',
                    price: 75,
                    category: 'Lubricantes'
                });
                
                addToCart({
                    id: 'test2',
                    name: 'Refrigerante Ipone Coolant',
                    price: 40,
                    category: 'Refrigerantes'
                });
            }, 1000);
        }
        */
    });
</script>
</body>
</html>