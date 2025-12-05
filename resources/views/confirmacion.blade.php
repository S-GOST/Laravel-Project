<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra | KTM Rocket Service</title>
    
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
            --info-color: #2196F3;
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
                radial-gradient(circle at 10% 20%, rgba(76, 175, 80, 0.03) 0%, transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(76, 175, 80, 0.02) 0%, transparent 25%),
                radial-gradient(circle at 50% 50%, rgba(76, 175, 80, 0.01) 0%, transparent 35%),
                linear-gradient(180deg, var(--ktm-dark) 0%, #0d0d0d 100%);
            z-index: -2;
        }
        
        /* Barra de navegación */
        .navbar-premium {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(76, 175, 80, 0.2);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand img {
            height: 50px;
            filter: drop-shadow(0 0 10px rgba(76, 175, 80, 0.4));
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
        
        .btn-success {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }
        
        .btn-success:hover {
            background: rgba(76, 175, 80, 0.2);
            border-color: #4CAF50;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.2);
            color: white;
        }
        
        .btn-primary {
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-glow));
            border: 1px solid var(--ktm-orange);
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(90deg, var(--ktm-orange-glow), #ffa64d);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.4);
            color: white;
        }
        
        /* Contenedor principal */
        .confirmation-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        /* Encabezado de confirmación */
        .confirmation-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .confirmation-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 3rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: transparent;
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            -webkit-background-clip: text;
            background-clip: text;
            margin-bottom: 20px;
            text-shadow: 0 0 15px rgba(76, 175, 80, 0.3);
        }
        
        .confirmation-subtitle {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            color: var(--ktm-gray-light);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .confirmation-title-line {
            width: 300px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #4CAF50, transparent);
            margin: 30px auto 40px auto;
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(76, 175, 80, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .confirmation-title-line::after {
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
        
        /* Tarjeta de éxito */
        .success-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.95), rgba(26, 26, 26, 0.95));
            border-radius: 20px;
            padding: 50px 40px;
            border: 2px solid rgba(76, 175, 80, 0.3);
            box-shadow: 0 20px 50px rgba(76, 175, 80, 0.1);
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .success-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(76, 175, 80, 0.05), transparent 70%);
        }
        
        .success-icon {
            font-size: 5rem;
            color: #4CAF50;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .success-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .success-message {
            font-size: 1.2rem;
            color: var(--ktm-gray-light);
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .order-number {
            display: inline-block;
            background: rgba(76, 175, 80, 0.1);
            padding: 15px 25px;
            border-radius: 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            color: #4CAF50;
            margin: 20px 0;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }
        
        /* Información de la compra */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        
        .info-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            position: relative;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--ktm-orange), var(--ktm-orange-glow));
        }
        
        .info-card-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .info-card-title i {
            background: rgba(255, 102, 0, 0.1);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.5rem;
            color: var(--ktm-orange);
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            color: var(--ktm-gray-light);
            font-size: 1.1rem;
        }
        
        .info-value {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
        }
        
        .info-value.highlight {
            color: #4CAF50;
            font-weight: 700;
        }
        
        /* Detalles de productos */
        .products-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.95), rgba(26, 26, 26, 0.95));
            border-radius: 15px;
            padding: 40px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            margin: 40px 0;
        }
        
        .products-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: white;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(42, 42, 42, 0.5);
            border-radius: 10px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        
        .product-item:hover {
            background: rgba(42, 42, 42, 0.8);
            border-color: rgba(255, 102, 0, 0.3);
        }
        
        .product-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }
        
        .product-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 102, 0, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--ktm-orange);
        }
        
        .product-details {
            flex: 1;
        }
        
        .product-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            color: white;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .product-category {
            font-size: 0.9rem;
            color: var(--ktm-orange);
            background: rgba(255, 102, 0, 0.1);
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
        }
        
        .product-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            color: white;
            font-weight: 700;
            min-width: 120px;
            text-align: right;
        }
        
        .product-quantity {
            color: var(--ktm-gray-light);
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        /* Resumen de pago */
        .summary-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.95), rgba(26, 26, 26, 0.95));
            border-radius: 15px;
            padding: 35px;
            border: 2px solid rgba(76, 175, 80, 0.3);
            margin: 40px 0;
            position: sticky;
            top: 100px;
        }
        
        .summary-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: white;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .summary-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid rgba(76, 175, 80, 0.5);
        }
        
        .total-label {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: white;
            font-weight: 700;
        }
        
        .total-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            color: #4CAF50;
            font-weight: 700;
        }
        
        /* Acciones */
        .actions-section {
            margin: 50px 0;
            text-align: center;
        }
        
        .actions-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-gray-light);
            margin-bottom: 30px;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .action-card {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 30px 25px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }
        
        .action-card:hover {
            transform: translateY(-10px);
            border-color: var(--ktm-orange);
            box-shadow: 0 15px 35px rgba(255, 102, 0, 0.2);
            text-decoration: none;
        }
        
        .action-icon {
            font-size: 3rem;
            color: var(--ktm-orange);
            margin-bottom: 20px;
        }
        
        .action-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            color: white;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .action-desc {
            color: var(--ktm-gray-light);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        /* Línea de tiempo */
        .timeline-section {
            margin: 60px 0;
        }
        
        .timeline-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: white;
            margin-bottom: 40px;
            text-align: center;
        }
        
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--ktm-orange), var(--ktm-orange-glow));
        }
        
        .timeline-item {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .timeline-content {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(76, 175, 80, 0.3);
            width: 45%;
            position: relative;
        }
        
        .timeline-item:nth-child(odd) .timeline-content {
            margin-right: auto;
            margin-left: 0;
        }
        
        .timeline-item:nth-child(even) .timeline-content {
            margin-left: auto;
            margin-right: 0;
        }
        
        .timeline-content::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #4CAF50;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -60px;
        }
        
        .timeline-item:nth-child(even) .timeline-content::before {
            left: -60px;
        }
        
        .timeline-step {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            color: #4CAF50;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .timeline-desc {
            color: var(--ktm-gray-light);
            font-size: 1rem;
            line-height: 1.5;
        }
        
        /* Footer */
        .confirmation-footer {
            margin-top: 80px;
            text-align: center;
            width: 100%;
            color: var(--ktm-gray-light);
            font-size: 0.9rem;
            padding: 50px 20px 30px;
            border-top: 1px solid rgba(76, 175, 80, 0.1);
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
            color: #4CAF50;
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
        @media (max-width: 992px) {
            .confirmation-title {
                font-size: 2.5rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .timeline::before {
                left: 30px;
            }
            
            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
            }
            
            .timeline-content::before {
                left: -60px !important;
                right: auto !important;
            }
        }
        
        @media (max-width: 768px) {
            .confirmation-title {
                font-size: 2rem;
            }
            
            .success-card {
                padding: 40px 20px;
            }
            
            .product-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .product-price {
                text-align: left;
                align-self: flex-end;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-info {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .confirmation-title {
                font-size: 1.8rem;
            }
            
            .success-title {
                font-size: 2rem;
            }
            
            .order-number {
                font-size: 1.2rem;
                padding: 10px 20px;
            }
            
            .product-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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
                <a href="{{ route('index') }}" class="nav-btn btn-success">
                    <i class="bi bi-house-door"></i>
                    <span>Inicio</span>
                </a>
                <a href="{{ route('carrito') }}" class="nav-btn btn-success">
                    <i class="bi bi-cart3"></i>
                    <span>Carrito</span>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Contenido principal -->
    <div class="confirmation-container">
        <!-- Encabezado -->
        <div class="confirmation-header">
            <h1 class="confirmation-title">¡COMPRA CONFIRMADA!</h1>
            <p class="confirmation-subtitle">Tu pedido ha sido procesado exitosamente. A continuación encontrarás todos los detalles de tu compra.</p>
            <div class="confirmation-title-line"></div>
        </div>
        
        <!-- Tarjeta de éxito -->
        <div class="success-card">
            <div class="success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h2 class="success-title">¡Gracias por tu compra!</h2>
            <p class="success-message">
                Tu pedido ha sido procesado exitosamente. Hemos enviado un correo de confirmación a tu dirección de email con todos los detalles. 
                Nuestro equipo de técnicos especializados se pondrá en contacto contigo en las próximas 24 horas para coordinar la agenda de los servicios.
            </p>
            <div class="order-number" id="orderNumber">Orden #KTM{{ date('Ymd') }}{{ rand(1000, 9999) }}</div>
            <p class="success-message">
                <i class="bi bi-clock"></i> Fecha de confirmación: {{ date('d/m/Y H:i:s') }}
            </p>
        </div>
        
        <!-- Información de la compra -->
        <div class="info-grid">
            <!-- Información del cliente -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="bi bi-person-circle"></i>
                    Información del Cliente
                </h3>
                <div class="info-item">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value" id="customerName">Juan Pérez Rodríguez</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span class="info-value" id="customerEmail">juan.perez@email.com</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono:</span>
                    <span class="info-value" id="customerPhone">+34 612 345 678</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Dirección:</span>
                    <span class="info-value" id="customerAddress">Calle Motocicleta, 123 - Madrid</span>
                </div>
            </div>
            
            <!-- Información de envío -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="bi bi-truck"></i>
                    Información de Entrega
                </h3>
                <div class="info-item">
                    <span class="info-label">Método:</span>
                    <span class="info-value">Recogida en taller</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Taller asignado:</span>
                    <span class="info-value">KTM Rocket Service Madrid</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Dirección del taller:</span>
                    <span class="info-value">Av. de la Motocicleta, 456</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Horario:</span>
                    <span class="info-value">L-V: 9:00-18:00, S: 10:00-14:00</span>
                </div>
            </div>
            
            <!-- Información de pago -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="bi bi-credit-card"></i>
                    Información de Pago
                </h3>
                <div class="info-item">
                    <span class="info-label">Método:</span>
                    <span class="info-value">Tarjeta de crédito</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Terminación:</span>
                    <span class="info-value">•••• 4242</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Fecha de pago:</span>
                    <span class="info-value">{{ date('d/m/Y') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado:</span>
                    <span class="info-value highlight">Pagado</span>
                </div>
            </div>
        </div>
        
        <!-- Detalles de productos -->
        <div class="products-card">
            <h3 class="products-title">
                <i class="bi bi-list-check"></i>
                Servicios Contratados
            </h3>
            
            <div class="product-item">
                <div class="product-info">
                    <div class="product-icon">
                        <i class="bi bi-wrench-adjustable"></i>
                    </div>
                    <div class="product-details">
                        <h4 class="product-name">Mantenimiento Preventivo</h4>
                        <span class="product-category">Mantenimiento</span>
                        <div class="product-quantity">Cantidad: 1</div>
                    </div>
                </div>
                <div class="product-price">$120.00</div>
            </div>
            
            <div class="product-item">
                <div class="product-info">
                    <div class="product-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="product-details">
                        <h4 class="product-name">Reparaciones por Daños</h4>
                        <span class="product-category">Reparaciones</span>
                        <div class="product-quantity">Cantidad: 1</div>
                    </div>
                </div>
                <div class="product-price">$350.00</div>
            </div>
            
            <div class="product-item">
                <div class="product-info">
                    <div class="product-icon">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div class="product-details">
                        <h4 class="product-name">Diagnóstico de Emisiones</h4>
                        <span class="product-category">Diagnósticos</span>
                        <div class="product-quantity">Cantidad: 1</div>
                    </div>
                </div>
                <div class="product-price">$150.00</div>
            </div>
        </div>
        
        <!-- Resumen de pago -->
        <div class="summary-card">
            <h3 class="summary-title">RESUMEN DEL PEDIDO</h3>
            
            <div class="summary-details">
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">$620.00</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Descuento</span>
                    <span class="summary-value">-$30.00</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Envío</span>
                    <span class="summary-value">$0.00</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Impuestos (10%)</span>
                    <span class="summary-value">$62.00</span>
                </div>
            </div>
            
            <div class="summary-total">
                <span class="total-label">TOTAL PAGADO</span>
                <span class="total-value">$652.00</span>
            </div>
        </div>
        
        <!-- Línea de tiempo del proceso -->
        <div class="timeline-section">
            <h3 class="timeline-title">PROCESO DE TU PEDIDO</h3>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-step">PASO 1: CONFIRMACIÓN</div>
                        <p class="timeline-desc">Tu pedido ha sido confirmado y procesado. Hemos enviado los detalles a tu email.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-step">PASO 2: AGENDAMIENTO</div>
                        <p class="timeline-desc">Nuestro equipo se contactará contigo para coordinar fechas y horarios de los servicios.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-step">PASO 3: EJECUCIÓN</div>
                        <p class="timeline-desc">Técnicos certificados realizarán los servicios en nuestro taller especializado.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-step">PASO 4: ENTREGA</div>
                        <p class="timeline-desc">Recogerás tu motocicleta con todos los servicios completados y garantizados.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Acciones siguientes -->
        <div class="actions-section">
            <h3 class="actions-title">¿QUÉ PUEDES HACER AHORA?</h3>
            
            <div class="actions-grid">
                <a href="{{ route('index') }}" class="action-card">
                    <div class="action-icon">
                        <i class="bi bi-house-door"></i>
                    </div>
                    <h4 class="action-title">Volver al Inicio</h4>
                    <p class="action-desc">Explora más servicios y productos disponibles en nuestro catálogo.</p>
                </a>
                
                <a href="#" class="action-card" onclick="window.print()">
                    <div class="action-icon">
                        <i class="bi bi-printer"></i>
                    </div>
                    <h4 class="action-title">Imprimir Comprobante</h4>
                    <p class="action-desc">Guarda una copia física de tu comprobante de pago y detalles del pedido.</p>
                </a>
                
                <a href="mailto:info@ktmrocketservice.com" class="action-card">
                    <div class="action-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h4 class="action-title">Contactar Soporte</h4>
                    <p class="action-desc">¿Tienes preguntas? Nuestro equipo de soporte está disponible para ayudarte.</p>
                </a>
                
                <a href="#" class="action-card" id="trackOrder">
                    <div class="action-icon">
                        <i class="bi bi-binoculars"></i>
                    </div>
                    <h4 class="action-title">Seguir Pedido</h4>
                    <p class="action-desc">Consulta el estado de tu pedido en tiempo real a través de nuestro sistema.</p>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="confirmation-footer">
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
                    <p><i class="bi bi-clock me-2"></i> Atención 24/7 para emergencias</p>
                </div>
                
                <div class="footer-item">
                    <h4 class="footer-title">Soporte Post-Venta</h4>
                    <p>Garantía de 1 año en todos los servicios</p>
                    <p>Soporte técnico telefónico</p>
                    <p>Asistencia en carretera disponible</p>
                    <p>Repuestos originales garantizados</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>© 2025 KTM Rocket Service | Sistema de Gestión de Órdenes de Servicio Técnico</p>
                <p>Número de pedido: <span id="displayOrderNumber"></span> | Fecha: {{ date('d/m/Y') }}</p>
                <p class="mt-3">Este comprobante es válido como documento de compra. Guarda este número para cualquier consulta: <strong id="referenceNumber"></strong></p>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Generar datos aleatorios para demostración
        document.addEventListener('DOMContentLoaded', function() {
            // Generar número de pedido
            const orderNumber = document.getElementById('orderNumber').textContent;
            document.getElementById('displayOrderNumber').textContent = orderNumber;
            
            // Generar número de referencia
            const referenceNumber = 'REF-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
            document.getElementById('referenceNumber').textContent = referenceNumber;
            
            // Datos de ejemplo para el cliente
            const customers = [
                { name: "Juan Pérez Rodríguez", email: "juan.perez@email.com", phone: "+34 612 345 678", address: "Calle Motocicleta, 123 - Madrid" },
                { name: "María García López", email: "maria.garcia@email.com", phone: "+34 623 456 789", address: "Av. de la Velocidad, 45 - Barcelona" },
                { name: "Carlos Martínez Ruiz", email: "carlos.martinez@email.com", phone: "+34 634 567 890", address: "Plaza del Motor, 78 - Valencia" }
            ];
            
            // Seleccionar cliente aleatorio
            const randomCustomer = customers[Math.floor(Math.random() * customers.length)];
            
            // Actualizar información del cliente
            document.getElementById('customerName').textContent = randomCustomer.name;
            document.getElementById('customerEmail').textContent = randomCustomer.email;
            document.getElementById('customerPhone').textContent = randomCustomer.phone;
            document.getElementById('customerAddress').textContent = randomCustomer.address;
            
            // Efecto de animación en el título
            const title = document.querySelector('.confirmation-title');
            let hue = 120; // Verde
            
            function animateTitle() {
                hue = (hue + 0.1) % 360;
                title.style.textShadow = `0 0 20px hsla(${hue}, 100%, 50%, 0.4)`;
                requestAnimationFrame(animateTitle);
            }
            
            animateTitle();
            
            // Efecto de confeti al cargar la página
            setTimeout(() => {
                createConfetti();
            }, 500);
            
            // Botón de seguimiento de pedido
            document.getElementById('trackOrder').addEventListener('click', function(e) {
                e.preventDefault();
                alert('¡Función de seguimiento activada!\n\nPuedes seguir tu pedido usando el número:\n' + orderNumber + '\n\nPróximamente implementaremos el sistema de seguimiento en tiempo real.');
            });
            
            // Funcionalidad de impresión mejorada
            const printBtn = document.querySelector('[onclick="window.print()"]');
            printBtn.addEventListener('click', function(e) {
                e.preventDefault();
                setTimeout(() => {
                    const printContent = `
                        <html>
                        <head>
                            <title>Comprobante de Compra - KTM Rocket Service</title>
                            <style>
                                body { font-family: Arial, sans-serif; padding: 20px; }
                                .header { text-align: center; margin-bottom: 30px; }
                                .header h1 { color: #4CAF50; }
                                .order-info { margin: 20px 0; }
                                .order-info p { margin: 5px 0; }
                                .products-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                                .products-table th, .products-table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
                                .total { font-size: 1.2em; font-weight: bold; text-align: right; margin-top: 20px; }
                                .footer { margin-top: 50px; font-size: 0.8em; color: #666; text-align: center; }
                            </style>
                        </head>
                        <body>
                            <div class="header">
                                <h1>KTM ROCKET SERVICE</h1>
                                <h2>COMPROBANTE DE COMPRA</h2>
                            </div>
                            
                            <div class="order-info">
                                <p><strong>Número de Pedido:</strong> ${orderNumber}</p>
                                <p><strong>Fecha:</strong> ${new Date().toLocaleDateString('es-ES')}</p>
                                <p><strong>Cliente:</strong> ${randomCustomer.name}</p>
                                <p><strong>Email:</strong> ${randomCustomer.email}</p>
                            </div>
                            
                            <table class="products-table">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mantenimiento Preventivo</td>
                                        <td>Mantenimiento</td>
                                        <td>1</td>
                                        <td>$120.00</td>
                                        <td>$120.00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparaciones por Daños</td>
                                        <td>Reparaciones</td>
                                        <td>1</td>
                                        <td>$350.00</td>
                                        <td>$350.00</td>
                                    </tr>
                                    <tr>
                                        <td>Diagnóstico de Emisiones</td>
                                        <td>Diagnósticos</td>
                                        <td>1</td>
                                        <td>$150.00</td>
                                        <td>$150.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="total">
                                <p>Subtotal: $620.00</p>
                                <p>Descuento: -$30.00</p>
                                <p>Impuestos (10%): $62.00</p>
                                <p><strong>TOTAL: $652.00</strong></p>
                            </div>
                            
                            <div class="footer">
                                <p>© 2025 KTM Rocket Service | Todos los derechos reservados</p>
                                <p>Este documento es válido como comprobante de compra</p>
                                <p>Número de referencia: ${referenceNumber}</p>
                            </div>
                        </body>
                        </html>
                    `;
                    
                    const printWindow = window.open('', '_blank');
                    printWindow.document.write(printContent);
                    printWindow.document.close();
                    printWindow.print();
                }, 100);
            });
            
            // Función para crear efecto de confeti
            function createConfetti() {
                const confettiCount = 150;
                const colors = ['#4CAF50', '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800'];
                
                for (let i = 0; i < confettiCount; i++) {
                    const confetti = document.createElement('div');
                    confetti.style.cssText = `
                        position: fixed;
                        width: 10px;
                        height: 10px;
                        background: ${colors[Math.floor(Math.random() * colors.length)]};
                        border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                        top: -20px;
                        left: ${Math.random() * 100}%;
                        opacity: ${Math.random() * 0.7 + 0.3};
                        z-index: 9998;
                        pointer-events: none;
                    `;
                    
                    document.body.appendChild(confetti);
                    
                    // Animación
                    const animation = confetti.animate([
                        { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                        { transform: `translateY(${window.innerHeight + 100}px) rotate(${Math.random() * 720}deg)`, opacity: 0 }
                    ], {
                        duration: Math.random() * 3000 + 2000,
                        easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
                    });
                    
                    animation.onfinish = () => confetti.remove();
                }
            }
        });
    </script>
</body>
</html>