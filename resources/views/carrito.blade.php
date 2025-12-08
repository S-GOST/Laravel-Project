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
            --ktm-black: #0A0A0A;
            --ktm-white: #FFFFFF;
            --ktm-light-gray: #2A2A2A;
            --ktm-dark-orange: #E55A00;
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
        
        /* Items del carrito */
        .cart-item {
            display: flex;
            align-items: flex-start;
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            transition: all 0.3s ease;
            position: relative;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        
        .cart-item:hover {
            border-color: var(--ktm-orange);
            box-shadow: 0 10px 25px rgba(255, 102, 0, 0.1);
        }
        
        .cart-item.removing {
            transform: translateX(100%);
            opacity: 0;
        }
        
        .item-image {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ff6b00, #ff8c00);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .item-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.1),
                transparent
            );
            transform: rotate(45deg);
            animation: shine 3s infinite linear;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .item-image i {
            font-size: 30px;
            color: white;
            z-index: 1;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-header {
            margin-bottom: 10px;
        }
        
        .item-title {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin: 0 0 5px 0;
            letter-spacing: 0.5px;
        }
        
        .item-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .item-category {
            font-size: 14px;
            color: #aaa;
            font-style: italic;
            background: #333;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .item-description {
            font-size: 14px;
            color: #bbb;
            line-height: 1.6;
            margin: 0 0 15px 0;
            padding: 10px;
            background: #2a2a2a;
            border-radius: 6px;
            border-left: 3px solid #ff6b00;
        }
        
        .item-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #333;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #2a2a2a;
            padding: 8px 15px;
            border-radius: 8px;
            border: 1px solid #444;
        }
        
        .qty-btn {
            width: 34px;
            height: 34px;
            border: 2px solid #444;
            background: #333;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 18px;
            font-weight: bold;
        }
        
        .qty-btn:hover {
            background: #ff6b00;
            border-color: #ff6b00;
            transform: scale(1.1);
        }
        
        .qty-value {
            font-size: 18px;
            font-weight: 700;
            min-width: 30px;
            text-align: center;
            color: #fff;
        }
        
        .item-subtotal {
            font-size: 18px;
            font-weight: 700;
            color: #ff6b00;
            text-align: right;
            min-width: 90px;
            background: #2a2a2a;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #444;
        }
        
        .item-subtotal span {
            color: #ff6b00;
            font-weight: 700;
            font-size: 18px;
            text-shadow: 0 0 10px rgba(255, 107, 0, 0.3);
        }
        
        /* Botón eliminar - ESTILO MODERNO */
        .delete-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
            z-index: 10;
        }
        
        .delete-btn:hover {
            background: linear-gradient(135deg, #c82333, #b21f2d);
            transform: scale(1.15) rotate(15deg);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.6);
        }
        
        .delete-btn i {
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        
        .delete-btn:hover i {
            transform: scale(1.2);
        }
        
        /* Carrito vacío */
        .empty-cart {
            background: linear-gradient(145deg, rgba(17, 17, 17, 0.9), rgba(26, 26, 26, 0.9));
            border-radius: 15px;
            padding: 60px 40px;
            border: 1px solid rgba(255, 102, 0, 0.15);
            text-align: center;
        }
        
        .empty-icon {
            font-size: 4rem;
            color: var(--ktm-gray-medium);
            margin-bottom: 20px;
        }
        
        .empty-cart h3 {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8rem;
            color: var(--ktm-gray-light);
            margin-bottom: 15px;
        }
        
        .empty-cart p {
            color: var(--ktm-gray-light);
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        /* Resumen del pedido */
        .cart-summary {
            background: linear-gradient(145deg, #1a1a1a, #222222);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(255, 102, 0, 0.2);
            height: fit-content;
            position: sticky;
            top: 100px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
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
            
            .cart-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .item-image {
                width: 100px;
                height: 100px;
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .item-header {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .item-footer {
                flex-direction: column;
                gap: 20px;
            }
            
            .delete-btn {
                position: static;
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
        .cart-notification {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .cart-notification.alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .cart-notification.alert-warning {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .cart-notification.alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        /* Botón de checkout oculto inicialmente */
        #btnCheckout {
            display: none;
        }
        
        /* MODALES CON FONDO NEGRO SÓLIDO */
        .modal-content {
            background-color: #0A0A0A !important;
            color: #fff !important;
            border: 2px solid var(--ktm-orange) !important;
            border-radius: 15px !important;
            box-shadow: 0 10px 40px rgba(255, 102, 0, 0.2) !important;
        }

        .modal-header {
            background-color: #111111 !important;
            border-bottom: 2px solid var(--ktm-orange) !important;
            padding: 20px !important;
        }

        .modal-body {
            background-color: #0A0A0A !important;
            padding: 30px 25px !important;
            color: #fff !important;
        }

        .modal-footer {
            background-color: #111111 !important;
            border-top: 2px solid var(--ktm-orange) !important;
            padding: 20px !important;
        }

        /* Estilos para el botón de cerrar */
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%) !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-radius: 50% !important;
            padding: 8px !important;
            transition: all 0.3s !important;
            opacity: 0.8 !important;
        }

        .btn-close-white:hover {
            background-color: rgba(255, 102, 0, 0.3) !important;
            opacity: 1 !important;
        }

        /* Estilos para botones dentro de modales */
        .modal .btn-secondary {
            background-color: #2A2A2A !important;
            border: 1px solid #444 !important;
            color: #fff !important;
            padding: 10px 20px !important;
            border-radius: 8px !important;
            transition: all 0.3s !important;
        }

        .modal .btn-secondary:hover {
            background-color: #333 !important;
            border-color: var(--ktm-orange) !important;
            transform: translateY(-2px) !important;
        }

        .modal .btn-danger {
            background: linear-gradient(135deg, #dc3545, #c82333) !important;
            border: none !important;
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 8px !important;
            transition: all 0.3s !important;
        }

        .modal .btn-danger:hover {
            background: linear-gradient(135deg, #c82333, #b21f2d) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3) !important;
        }

        .modal .btn-ktm {
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-glow)) !important;
            border: none !important;
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 8px !important;
            transition: all 0.3s !important;
        }

        .modal .btn-ktm:hover {
            background: linear-gradient(90deg, var(--ktm-orange-glow), #ffa64d) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3) !important;
        }

        /* Transiciones suaves */
        .modal.fade .modal-content {
            transform: translateY(-50px);
            opacity: 0;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        .modal.show .modal-content {
            transform: translateY(0);
            opacity: 1;
        }

        /* Mejora de contrastes */
        .modal-body p, .modal-body span, .modal-body h5, .modal-body h6 {
            color: #fff !important;
        }

        .modal-body .text-muted {
            color: #aaa !important;
        }

        /* Contenedor de resumen en el modal de checkout */
        .checkout-summary {
            background-color: #111111 !important;
            border: 1px solid var(--ktm-orange) !important;
            border-radius: 10px !important;
            padding: 20px !important;
            margin-bottom: 20px !important;
        }

        .checkout-summary hr {
            border-color: #444 !important;
            margin: 15px 0 !important;
        }

        /* Alert dentro del modal */
        .modal-body .alert {
            background-color: rgba(13, 110, 253, 0.15) !important;
            border-color: rgba(13, 110, 253, 0.3) !important;
            color: #b8daff !important;
            border-radius: 8px !important;
            padding: 15px !important;
        }

        /* Eliminar cualquier transparencia en los modales */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.7) !important;
        }

        /* Asegurar que el modal sea completamente opaco */
        .modal {
            background-color: transparent !important;
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
                <a href="{{ route('cliente.login') }}" class="nav-btn btn-login">
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
                        <span class="summary-value" id="summarySubtotal">$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Envío:</span>
                        <span class="summary-value" id="summaryEnvio">$9.99</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Descuento:</span>
                        <span class="summary-value" style="color: var(--ktm-orange);" id="summaryDescuento">-$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Impuestos (21%):</span>
                        <span class="summary-value" id="summaryImpuestos">$0.00</span>
                    </div>
                </div>
                
                <div class="summary-total">
                    <span class="total-label">TOTAL</span>
                    <span class="total-value" id="summaryTotal">$0.00</span>
                </div>
                
                <div class="summary-actions">
                    <button id="btnCheckout" class="cart-btn btn-checkout">
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
                    <div class="recommendation-price">$75.00</div>
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
                    <div class="recommendation-price">$40.00</div>
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
                    <div class="recommendation-price">$55.00</div>
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
                    <div class="recommendation-price">$25.00</div>
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
                    <div class="recommendation-price">$95.00</div>
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
    // SISTEMA DE CARRITO DE COMPRAS CON MODALS
    // ==========================
    
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Sistema de carrito con modals inicializado");
        
        // Variables globales
        let cart = JSON.parse(localStorage.getItem('ktmCart')) || {};
        let discountApplied = JSON.parse(localStorage.getItem('ktmDiscount')) || false;
        const shippingCost = 9.99;
        const discountAmount = 30.00;
        const taxRate = 0.21;
        
        // Variables para controlar modals
        let currentItemId = null;
        
        // ==========================
        // INICIALIZACIÓN
        // ==========================
        initCart();
        
        function initCart() {
            console.log("Productos en carrito:", cart);
            renderCart();
            updateCartCount();
            setupEventListeners();
            setupModalListeners();
        }
        
        // ==========================
        // RENDERIZAR CARRITO
        // ==========================
        function renderCart() {
            const container = document.getElementById('cartItemsContainer');
            
            if (Object.keys(cart).length === 0) {
                container.innerHTML = `
                    <div class="empty-cart">
                        <div class="empty-icon">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h3>Tu carrito está vacío</h3>
                        <p>No has agregado productos al carrito. ¡Explora nuestros servicios KTM!</p>
                        <a href="{{ route('index') }}" class="cart-btn btn-continue">
                            <i class="bi bi-arrow-left"></i>
                            Ver Servicios
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
                    <div class="cart-item" data-id="${id}">
                        <div class="item-image">
                            <i class="bi bi-${item.icon || 'box'}"></i>
                        </div>
                        
                        <div class="item-details">
                            <div class="item-header">
                                <h4 class="item-title">${item.name}</h4>
                                <div class="item-info-row">
                                    <span class="item-category">${item.category}</span>
                                </div>
                            </div>
                            
                            <p class="item-description">${item.description || 'Producto premium para tu KTM'}</p>
                            
                            <div class="item-footer">
                                <div class="quantity-control">
                                    <button class="qty-btn minus" data-id="${id}">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span class="qty-value">${item.quantity}</span>
                                    <button class="qty-btn plus" data-id="${id}">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <div class="item-subtotal">
                                    $${subtotal.toFixed(2)}
                                </div>
                            </div>
                        </div>
                        
                        <button class="delete-btn" data-id="${id}" title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>`;
            }
            
            container.innerHTML = html;
            document.getElementById('btnCheckout').style.display = 'flex';
            updateSummary();
            
            if (discountApplied) {
                document.getElementById('promoCode').value = 'KTM2024';
            }
        }
        
        // ==========================
        // CONFIGURAR EVENTOS
        // ==========================
        function setupEventListeners() {
            // Delegación de eventos para elementos dinámicos
            const cartContainer = document.getElementById('cartItemsContainer');
            
            cartContainer.addEventListener('click', function(e) {
                const target = e.target;
                
                if (target.closest('.delete-btn')) {
                    e.preventDefault();
                    const button = target.closest('.delete-btn');
                    currentItemId = button.dataset.id;
                    
                    // Actualizar mensaje del modal
                    const itemName = cart[currentItemId]?.name || 'este producto';
                    document.getElementById('deleteProductMessage').textContent = 
                        `¿Estás seguro de eliminar "${itemName}" del carrito?`;
                    return;
                }
                
                if (target.closest('.plus')) {
                    e.preventDefault();
                    const button = target.closest('.plus');
                    const id = button.dataset.id;
                    updateQuantity(id, 1);
                    return;
                }
                
                if (target.closest('.minus')) {
                    e.preventDefault();
                    const button = target.closest('.minus');
                    const id = button.dataset.id;
                    updateQuantity(id, -1);
                    return;
                }
            });
            
            // Botones "Agregar al carrito" en la página
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
            
            // Cupón de descuento
            document.getElementById('applyPromo').addEventListener('click', applyDiscount);
            document.getElementById('promoCode').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') applyDiscount();
            });
            
            // Finalizar compra
            const checkoutBtn = document.getElementById('btnCheckout');
            if (checkoutBtn) {
                checkoutBtn.addEventListener('click', function() {
                    if (Object.keys(cart).length === 0) {
                        showNotification('El carrito está vacío', 'warning');
                        return;
                    }
                    
                    // Mostrar modal de confirmación
                    const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutConfirmModal'));
                    checkoutModal.show();
                });
            }
            
            // Vaciar carrito
            const clearCartBtn = document.getElementById('clearCartBtn');
            if (clearCartBtn) {
                clearCartBtn.addEventListener('click', function() {
                    const clearModal = new bootstrap.Modal(document.getElementById('clearCartModal'));
                    clearModal.show();
                });
            }
        }
        
        // ==========================
        // CONFIGURAR EVENTOS DE MODALS
        // ==========================
        function setupModalListeners() {
            // Modal de eliminar producto
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (currentItemId) {
                    removeFromCart(currentItemId);
                    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
                    modal.hide();
                    currentItemId = null;
                }
            });
            
            // Modal de checkout
            document.getElementById('confirmCheckoutBtn').addEventListener('click', function() {
                processCheckout();
                const modal = bootstrap.Modal.getInstance(document.getElementById('checkoutConfirmModal'));
                modal.hide();
            });
            
            // Modal de vaciar carrito
            document.getElementById('confirmClearCartBtn').addEventListener('click', function() {
                clearCart();
                const modal = bootstrap.Modal.getInstance(document.getElementById('clearCartModal'));
                modal.hide();
            });
        }
        
        // ==========================
        // PROCESAR CHECKOUT
        // ==========================
        function processCheckout() {
            if (Object.keys(cart).length === 0) {
                showNotification('El carrito está vacío', 'warning');
                return;
            }
            
            // Mostrar indicador de carga
            const checkoutBtn = document.getElementById('btnCheckout');
            const originalText = checkoutBtn.innerHTML;
            checkoutBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i> PROCESANDO...';
            checkoutBtn.disabled = true;
            
            // Guardar carrito para checkout
            localStorage.setItem('checkoutCart', JSON.stringify(cart));
            localStorage.setItem('checkoutDiscount', JSON.stringify(discountApplied));
            
            // Mostrar mensaje de redirección
            showNotification('Redirigiendo al checkout...', 'success');
            
            // Redirigir después de un breve delay
            setTimeout(() => {
                // Usar la ruta de Laravel
                window.location.href = "{{ route('checkout') }}";
            }, 1500);
            
            // Restaurar botón después de 2 segundos (por si hay error)
            setTimeout(() => {
                checkoutBtn.innerHTML = originalText;
                checkoutBtn.disabled = false;
            }, 2000);
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
            
            // Actualizar valores en el resumen
            document.getElementById('summarySubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('summaryEnvio').textContent = `$${shippingCost.toFixed(2)}`;
            document.getElementById('summaryDescuento').textContent = `-$${discount.toFixed(2)}`;
            document.getElementById('summaryImpuestos').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('summaryTotal').textContent = `$${total.toFixed(2)}`;
            
            // Actualizar resumen en modal de checkout
            document.getElementById('modalSubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('modalEnvio').textContent = `$${shippingCost.toFixed(2)}`;
            document.getElementById('modalDescuento').textContent = `-$${discount.toFixed(2)}`;
            document.getElementById('modalTotal').textContent = `$${total.toFixed(2)}`;
            document.getElementById('modalItemsCount').textContent = totalItems;
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
        // AGREGAR AL CARRITO
        // ==========================
        function addToCart(product) {
            const { id, name, price, category } = product;
            
            if (cart[id]) {
                cart[id].quantity += 1;
            } else {
                let icon = 'box';
                if (category.includes('Lubricante')) icon = 'droplet-half';
                else if (category.includes('Refrigerante')) icon = 'snow';
                else if (category.includes('Accesorio') || category.includes('LED')) icon = 'lightbulb';
                else if (category.includes('Limpieza')) icon = 'brush';
                else if (category.includes('Electricidad') || category.includes('Batería')) icon = 'battery-full';
                else if (category.includes('Mantenimiento')) icon = 'wrench';
                
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
            renderCart();
            showNotification(`${name} agregado al carrito`, 'success');
        }
        
        // ==========================
        // ELIMINAR DEL CARRITO
        // ==========================
        function removeFromCart(id) {
            if (cart[id]) {
                const itemElement = document.querySelector(`.cart-item[data-id="${id}"]`);
                if (itemElement) {
                    itemElement.classList.add('removing');
                    setTimeout(() => {
                        delete cart[id];
                        saveCart();
                        renderCart();
                        showNotification('Producto eliminado', 'warning');
                    }, 300);
                }
            }
        }
        
        // ==========================
        // ACTUALIZAR CANTIDAD
        // ==========================
        function updateQuantity(id, change) {
            if (cart[id]) {
                cart[id].quantity += change;
                
                if (cart[id].quantity < 1) {
                    // Mostrar modal de eliminación en lugar de eliminar directamente
                    currentItemId = id;
                    const itemName = cart[id]?.name || 'este producto';
                    document.getElementById('deleteProductMessage').textContent = 
                        `¿Eliminar "${itemName}" del carrito? (La cantidad llegó a 0)`;
                    
                    const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                    modal.show();
                } else {
                    saveCart();
                    
                    // Actualizar solo elementos específicos para mejor rendimiento
                    const itemElement = document.querySelector(`.cart-item[data-id="${id}"]`);
                    if (itemElement) {
                        const qtySpan = itemElement.querySelector('.qty-value');
                        const subtotalSpan = itemElement.querySelector('.item-subtotal');
                        
                        if (qtySpan) qtySpan.textContent = cart[id].quantity;
                        if (subtotalSpan) {
                            const subtotal = cart[id].price * cart[id].quantity;
                            subtotalSpan.textContent = `$${subtotal.toFixed(2)}`;
                        }
                    }
                    
                    updateSummary();
                }
            }
        }
        
        // ==========================
        // APLICAR DESCUENTO
        // ==========================
        function applyDiscount() {
            const promoCode = document.getElementById('promoCode').value.trim().toUpperCase();
            
            if (promoCode === 'KTM2024' || promoCode === 'KTM2025') {
                discountApplied = true;
                saveCart();
                updateSummary();
                showNotification('¡Descuento aplicado! -$30.00', 'success');
            } else {
                discountApplied = false;
                saveCart();
                updateSummary();
                showNotification('Código no válido', 'warning');
            }
        }
        
        // ==========================
        // NOTIFICACIONES
        // ==========================
        function showNotification(message, type = 'success') {
            // Eliminar notificaciones anteriores
            const oldNotifications = document.querySelectorAll('.cart-notification');
            oldNotifications.forEach(notif => notif.remove());
            
            // Determinar icono y clase según tipo
            let icon = 'check-circle';
            if (type === 'warning') icon = 'exclamation-triangle';
            if (type === 'info') icon = 'info-circle';
            
            // Crear nueva notificación
            const notification = document.createElement('div');
            notification.className = `cart-notification alert-${type}`;
            notification.innerHTML = `
                <i class="bi bi-${icon}"></i>
                <span>${message}</span>
                <button class="close-notification">&times;</button>
            `;
            
            // Estilos según tipo
            if (type === 'success') {
                notification.style.background = '#d4edda';
                notification.style.color = '#155724';
                notification.style.border = '1px solid #c3e6cb';
            } else if (type === 'warning') {
                notification.style.background = '#f8d7da';
                notification.style.color = '#721c24';
                notification.style.border = '1px solid #f5c6cb';
            } else {
                notification.style.background = '#d1ecf1';
                notification.style.color = '#0c5460';
                notification.style.border = '1px solid #bee5eb';
            }
            
            notification.style.cssText += `
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
        
        // ==========================
        // VACIAR CARRITO
        // ==========================
        function clearCart() {
            if (Object.keys(cart).length === 0) {
                showNotification('El carrito ya está vacío', 'info');
                return;
            }
            
            cart = {};
            discountApplied = false;
            saveCart();
            renderCart();
            showNotification('Carrito vaciado', 'warning');
        }
        
        // Inicializar con algunos productos de prueba (opcional)
        /*
        if (Object.keys(cart).length === 0) {
            setTimeout(() => {
                addToCart({
                    id: 'light1',
                    name: 'Direccional LED KTM Duke 200',
                    price: '55',
                    category: 'Accesorios'
                });
                
                addToCart({
                    id: 'test2',
                    name: 'Mantenimiento Preventivo',
                    price: '120',
                    category: 'Mantenimiento'
                });
            }, 500);
        }
        */
    });
</script>

<!-- MODALS -->
<!-- Modal para eliminar producto -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>Eliminar Producto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-trash mb-3" style="font-size: 3rem; color: var(--ktm-orange);"></i>
                <p id="deleteProductMessage">¿Estás seguro de eliminar este producto del carrito?</p>
                <p class="text-muted small mt-3">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Cancelar
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi bi-trash me-2"></i>Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para proceder al pago -->
<div class="modal fade" id="checkoutConfirmModal" tabindex="-1" aria-labelledby="checkoutConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-credit-card me-2"></i>Proceder al Pago
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="text-center mb-4">
                    <i class="bi bi-cart-check mb-3" style="font-size: 3rem; color: var(--ktm-orange);"></i>
                    <h5>¿Confirmar compra?</h5>
                    <p class="text-muted">Serás redirigido a la página de checkout para completar tus datos.</p>
                </div>
                
                <div class="checkout-summary mb-4 p-3">
                    <h6 class="mb-3">Resumen del pedido:</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Productos:</span>
                        <span id="modalItemsCount">0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span id="modalSubtotal">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Envío:</span>
                        <span id="modalEnvio">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Descuento:</span>
                        <span id="modalDescuento">-$0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>TOTAL:</span>
                        <span id="modalTotal" style="color: var(--ktm-orange); font-size: 1.2rem;">$0.00</span>
                    </div>
                </div>
                
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle me-2"></i>
                    <small>Recuerda que puedes aplicar códigos de descuento en la siguiente página.</small>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-arrow-left me-2"></i>Seguir comprando
                </button>
                <button type="button" class="btn btn-ktm" id="confirmCheckoutBtn">
                    <i class="bi bi-arrow-right me-2"></i>Continuar al pago
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para vaciar carrito (opcional) -->
<div class="modal fade" id="clearCartModal" tabindex="-1" aria-labelledby="clearCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>Vaciar Carrito
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-cart-x mb-3" style="font-size: 3rem; color: var(--ktm-orange);"></i>
                <p>¿Estás seguro de vaciar todo el carrito?</p>
                <p class="text-muted small mt-3">Se eliminarán todos los productos de tu carrito.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Cancelar
                </button>
                <button type="button" class="btn btn-danger" id="confirmClearCartBtn">
                    <i class="bi bi-trash me-2"></i>Vaciar Carrito
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>