<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido - KTM Shop</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-black: #000000;
            --ktm-gray: #1a1a1a;
            --ktm-light-gray: #2a2a2a;
            --ktm-white: #ffffff;
            --ktm-dark-orange: #cc5200;
        }
        
        body {
            background-color: var(--ktm-black);
            color: var(--ktm-white);
            font-family: 'Montserrat', sans-serif;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(255, 102, 0, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 102, 0, 0.05) 0%, transparent 20%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 800px;
        }
        
        /* Header KTM */
        .ktm-header {
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-gray) 100%);
            border-bottom: 3px solid var(--ktm-orange);
            border-radius: 0 0 15px 15px;
            padding: 1.5rem 0;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .ktm-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--ktm-orange), transparent);
        }
        
        .ktm-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: 2px;
            color: var(--ktm-white);
            text-transform: uppercase;
        }
        
        .ktm-logo .orange {
            color: var(--ktm-orange);
        }
        
        .ktm-logo i {
            color: var(--ktm-orange);
            font-size: 2rem;
        }
        
        /* Secciones KTM */
        .ktm-section {
            background-color: var(--ktm-gray);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 5px solid var(--ktm-orange);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        
        .ktm-section-title {
            color: var(--ktm-orange);
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--ktm-light-gray);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .ktm-section-title i {
            font-size: 1.3rem;
        }
        
        /* Datos del cliente */
        .client-data-item {
            display: flex;
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--ktm-light-gray);
        }
        
        .client-data-item:last-child {
            border-bottom: none;
        }
        
        .client-data-label {
            font-weight: 600;
            min-width: 120px;
            color: #aaa;
        }
        
        .client-data-value {
            color: var(--ktm-white);
            font-weight: 500;
        }
        
        /* Productos */
        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--ktm-light-gray);
        }
        
        .product-item:last-child {
            border-bottom: none;
        }
        
        .product-name {
            font-weight: 500;
            color: var(--ktm-white);
        }
        
        .product-quantity {
            color: #aaa;
            font-size: 0.9rem;
        }
        
        .product-price {
            font-weight: 600;
            color: var(--ktm-orange);
        }
        
        /* Total */
        .total-section {
            background-color: var(--ktm-light-gray);
            border-radius: 8px;
            padding: 1.2rem;
            margin-top: 1.5rem;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 0.4rem 0;
            font-size: 1rem;
        }
        
        .total-row:last-child {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--ktm-orange);
            padding-top: 0.8rem;
            margin-top: 0.5rem;
            border-top: 2px solid #444;
        }
        
        /* Botón KTM */
        .btn-ktm {
            background: linear-gradient(to right, var(--ktm-orange), var(--ktm-dark-orange));
            color: var(--ktm-black);
            border: none;
            padding: 1rem;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-ktm:hover {
            background: linear-gradient(to right, var(--ktm-dark-orange), var(--ktm-orange));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
            color: var(--ktm-black);
        }
        
        /* Promoción KTM */
        .promo-section {
            background-color: var(--ktm-light-gray);
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
            border: 2px solid var(--ktm-orange);
        }
        
        .promo-title {
            color: var(--ktm-orange);
            font-weight: 700;
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .promo-text {
            color: #aaa;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
        }
        
        .btn-promo {
            background-color: transparent;
            color: var(--ktm-orange);
            border: 2px solid var(--ktm-orange);
            padding: 0.6rem;
            font-weight: 600;
            width: 100%;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-promo:hover {
            background-color: var(--ktm-orange);
            color: var(--ktm-black);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .client-data-item {
                flex-direction: column;
                gap: 5px;
            }
            
            .client-data-label {
                min-width: unset;
                color: var(--ktm-orange);
            }
            
            .ktm-logo {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="container py-4">
        
        <!-- Header KTM -->
        <div class="ktm-header text-center mb-4">
            <div class="ktm-logo justify-content-center">
                <i class="fas fa-motorcycle"></i>
                <span>KTM <span class="orange">SHOP</span></span>
            </div>
            <h2 class="mt-2 mb-0" style="font-weight: 700; font-size: 1.3rem;">CONFIRMACIÓN DE PEDIDO</h2>
        </div>
        
        <!-- DATOS DEL CLIENTE -->
        <div class="ktm-section">
            <h4 class="ktm-section-title">
                <i class="fas fa-user"></i> DATOS DEL CLIENTE
            </h4>
            
            <div class="client-data-item">
                <div class="client-data-label">Nombre:</div>
                <div class="client-data-value">{{ session('cliente.nombre') }}</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Documento:</div>
                <div class="client-data-value">{{ session('cliente.documento') }}</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Teléfono:</div>
                <div class="client-data-value">{{ session('cliente.telefono') }}</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Dirección:</div>
                <div class="client-data-value">{{ session('cliente.direccion') }}</div>
            </div>
        </div>
        
        <!-- PRODUCTOS -->
        <div class="ktm-section">
            <h4 class="ktm-section-title">
                <i class="fas fa-shopping-cart"></i> PRODUCTOS
            </h4>
            
            <!-- Aquí se cargan los productos del carrito -->
            {{-- Ejemplo de cómo se verían --}}
            <div class="product-item">
                <div>
                    <div class="product-name">Producto 1</div>
                    <div class="product-quantity">Cantidad: 1</div>
                </div>
                <div class="product-price">€50,00</div>
            </div>
            
            <div class="product-item">
                <div>
                    <div class="product-name">Producto 2</div>
                    <div class="product-quantity">Cantidad: 2</div>
                </div>
                <div class="product-price">€120,00</div>
            </div>
            
            <div class="product-item">
                <div>
                    <div class="product-name">Producto 3</div>
                    <div class="product-quantity">Cantidad: 1</div>
                </div>
                <div class="product-price">€75,00</div>
            </div>
            
            <!-- TOTAL -->
            <div class="total-section">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span>€245,00</span>
                </div>
                <div class="total-row">
                    <span>Envío:</span>
                    <span>€9,99</span>
                </div>
                <div class="total-row">
                    <span>Descuento:</span>
                    <span style="color: var(--ktm-orange);">-€20,00</span>
                </div>
                <div class="total-row">
                    <span>TOTAL:</span>
                    <span>€234,99</span>
                </div>
            </div>
        </div>
        
        <!-- Botón de confirmación -->
        <button class="btn btn-ktm mt-3" onclick="confirmarPedido()">
            <i class="fas fa-check-circle me-2"></i> CONFIRMAR Y FINALIZAR COMPRA
        </button>
        
        <!-- Promoción KTM -->
        <div class="promo-section">
            <h5 class="promo-title">
                <i class="fas fa-crown me-2"></i>ÚNETE AL CLUB KTM
            </h5>
            
            <p class="promo-text text-center">
                Descuentos exclusivos, envío gratis y acceso a eventos especiales.
            </p>
            
            <button class="btn btn-promo">
                <i class="fas fa-user-plus me-2"></i> Crear cuenta ahora
            </button>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Modal de Bootstrap -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: var(--ktm-gray); color: var(--ktm-white);">
                <div class="modal-header border-0" style="border-bottom: 2px solid var(--ktm-orange);">
                    <h5 class="modal-title" style="color: var(--ktm-orange); font-weight: 700;">Pedido Confirmado</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-check-circle mb-3" style="font-size: 3rem; color: var(--ktm-orange);"></i>
                    <p>Tu pedido ha sido procesado correctamente.</p>
                    <p>Recibirás un correo con los detalles de tu compra.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-ktm w-100" data-bs-dismiss="modal" onclick="window.location.href='/'">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function confirmarPedido() {
            const btn = document.querySelector('.btn-ktm');
            const originalText = btn.innerHTML;
            
            // Cambiar texto del botón
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> PROCESANDO...';
            btn.disabled = true;
            
            // Simular envío al servidor
            setTimeout(() => {
                // Mostrar modal de confirmación
                const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                modal.show();
                
                // Restaurar botón
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 1500);
        }
        
        // Para el botón de promoción
        document.querySelector('.btn-promo').addEventListener('click', function() {
            window.location.href = '/registro';
        });
    </script>
</body>
</html>