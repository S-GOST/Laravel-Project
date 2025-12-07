<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido - KTM ROCKET SERVICE</title>
    
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
        white-space: normal !important;
        overflow-wrap: break-word;
        word-break: break-word;
        line-height: 1.4;
        color: var(--ktm-white);
        font-weight: 500;
    }

    /* Beneficios de registro */
    .benefit-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
        padding: 10px;
        background-color: rgba(255, 102, 0, 0.05);
        border-radius: 8px;
        border-left: 3px solid var(--ktm-orange);
    }
    
    .benefit-icon {
        color: var(--ktm-orange);
        font-size: 1.5rem;
        min-width: 40px;
        text-align: center;
    }
    
    .benefit-content h6 {
        color: var(--ktm-white);
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .benefit-content p {
        color: #aaa;
        font-size: 0.9rem;
        margin-bottom: 0;
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
    
    /* Botón KTM - Sin efectos ni transiciones */
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
        width: 100%;
    }
    
    /* Botón secundario */
    .btn-secondary-ktm {
        background-color: transparent;
        border: 2px solid var(--ktm-orange);
        color: var(--ktm-orange);
        padding: 1rem;
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 8px;
        transition: all 0.3s;
        width: 100%;
    }
    
    .btn-secondary-ktm:hover {
        background-color: rgba(255, 102, 0, 0.1);
        color: var(--ktm-white);
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
        
        .benefit-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
</style>
</head>
<body>

    <div class="container py-4">
        
        <!-- Header KTM -->
        <div class="ktm-header text-center mb-4">
            <div class="ktm-logo justify-content-center">
                <img src="{{ asset('img/rock.png') }}" alt="ROCK Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                <span>ROCKET <span class="orange">SERVICE</span></span>
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
                <div class="client-data-value" id="clientName">Cargando...</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Documento:</div>
                <div class="client-data-value" id="clientDocument">Cargando...</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Teléfono:</div>
                <div class="client-data-value" id="clientPhone">Cargando...</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Email:</div>
                <div class="client-data-value" id="clientEmail">Cargando...</div>
            </div>
            <div class="client-data-item">
                <div class="client-data-label">Comentarios:</div>
                <div class="client-data-value" id="clientComments">Sin comentarios</div>
            </div>
        </div>
        
        <!-- PRODUCTOS -->
        <div class="ktm-section">
            <h4 class="ktm-section-title">
                <i class="fas fa-shopping-cart"></i> PRODUCTOS
            </h4>
            
            <!-- Contenedor para productos dinámicos -->
            <div id="productsContainer">
                <div class="text-center py-3">
                    <i class="fas fa-spinner fa-spin"></i> Cargando productos...
                </div>
            </div>
            
            <!-- TOTAL -->
            <div class="total-section">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span id="summarySubtotal">$0.00</span>
                </div>
                <div class="total-row">
                    <span>Envío:</span>
                    <span id="summaryShipping">$0.00</span>
                </div>
                <div class="total-row">
                    <span>Descuento:</span>
                    <span id="summaryDiscount" style="color: var(--ktm-orange);">$0.00</span>
                </div>
                <div class="total-row">
                    <span>Impuestos (21%):</span>
                    <span id="summaryTax">$0.00</span>
                </div>
                <div class="total-row">
                    <span>TOTAL:</span>
                    <span id="summaryTotal">$0.00</span>
                </div>
            </div>
        </div>
        
        <!-- Botón de confirmación -->
        <button class="btn btn-ktm mt-3" id="confirmOrderBtn">
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
            
            <button class="btn btn-promo" id="registerBtn">
                <i class="fas fa-user-plus me-2"></i> Crear cuenta ahora
            </button>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Modal de confirmación de pedido -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: var(--ktm-gray); color: var(--ktm-white);">
                <div class="modal-header border-0" style="border-bottom: 2px solid var(--ktm-orange);">
                    <h5 class="modal-title" style="color: var(--ktm-orange); font-weight: 700;">¡Pedido Confirmado!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-check-circle mb-3" style="font-size: 3rem; color: var(--ktm-orange);"></i>
                    <p>Tu pedido ha sido procesado correctamente.</p>
                    <p>Recibirás un correo con los detalles de tu compra.</p>
                    <p class="mt-3" id="orderNumber">Número de pedido: <strong>#KTM-0000</strong></p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-ktm w-100" data-bs-dismiss="modal" id="showRegisterModalBtn">
                        <i class="fas fa-user-plus me-2"></i> Descubre los beneficios de registrarte
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de registro promocional -->
    <div class="modal fade" id="registerPromoModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: var(--ktm-gray); color: var(--ktm-white); border: 3px solid var(--ktm-orange);">
                <div class="modal-header border-0" style="border-bottom: 2px solid var(--ktm-orange);">
                    <h5 class="modal-title" style="color: var(--ktm-orange); font-weight: 700; font-size: 1.5rem;">
                        <i class="fas fa-crown me-2"></i>¡ÚNETE AL CLUB KTM PREMIUM!
                    </h5>
                </div>
                <div class="modal-body py-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-gem mb-3" style="font-size: 4rem; color: var(--ktm-orange);"></i>
                        <h4 style="color: var(--ktm-white);">Tu compra te da acceso exclusivo</h4>
                        <p class="text-muted">Regístrate ahora y disfruta de beneficios especiales</p>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>15% DE DESCUENTO</h6>
                                    <p>En tu próxima compra al registrarte hoy</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>GESTIONA ORDENES</h6>
                                    <p>En tiempo real desde tu movil</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>HISTORIAL DE PEDIDOS</h6>
                                    <p>Accede a todos tus pedidos anteriores</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-gift"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>OFERTAS EXCLUSIVAS</h6>
                                    <p>Acceso anticipado a nuevos productos</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>PUNTOS DE FIDELIDAD</h6>
                                    <p>Acumula puntos con cada compra y canjealos para obtener descuentos</p>
                                </div>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>SOPORTE PRIORITARIO</h6>
                                    <p>Atención personalizada 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mb-4" style="background-color: rgba(13, 110, 253, 0.15); border-color: #0dcaf0; color: #b8daff;">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>¡Oferta especial!</strong> Al registrarte ahora, tu número de pedido <span id="promoOrderNumber" style="font-weight: bold;">#KTM-0000</span> te dará acceso a contenido exclusivo para miembros.
                    </div>
                    
                    <div class="text-center">
                        <p class="mb-3">¿Qué incluye tu membresía?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
                            <span class="badge bg-orange px-3 py-2" style="background-color: rgba(255, 102, 0, 0.2); color: var(--ktm-orange);">Guías de mantenimiento</span>
                            <span class="badge bg-orange px-3 py-2" style="background-color: rgba(255, 102, 0, 0.2); color: var(--ktm-orange);">Tutoriales exclusivos</span>
                            <span class="badge bg-orange px-3 py-2" style="background-color: rgba(255, 102, 0, 0.2); color: var(--ktm-orange);">Eventos VIP</span>
                            <span class="badge bg-orange px-3 py-2" style="background-color: rgba(255, 102, 0, 0.2); color: var(--ktm-orange);">Descuentos especiales</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0" style="border-top: 2px solid var(--ktm-orange);">
                    <div class="row w-100 g-3">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary-ktm w-100" data-bs-dismiss="modal" onclick="skipRegistration()">
                                <i class="fas fa-times me-2"></i> No, gracias
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-ktm w-100" id="goToRegisterBtn">
                                <i class="fas fa-user-plus me-2"></i> ¡SÍ, QUIERO REGISTRARME!
                            </button>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-muted">Solo te tomará 1 minuto. Ya tienes tu email pre-cargado.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Función para generar número de pedido
        function generateOrderNumber() {
            const prefix = 'KTM';
            const randomNum = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
            return `${prefix}-${randomNum}`;
        }
        
        // Función para cargar los datos del cliente y productos
        function loadOrderData() {
            // 1. Cargar datos del cliente desde localStorage
            const clientData = JSON.parse(localStorage.getItem('clienteData')) || {};
            const checkoutCart = JSON.parse(localStorage.getItem('checkoutCart')) || {};
            const checkoutDiscount = JSON.parse(localStorage.getItem('checkoutDiscount')) || false;
            
            console.log('Datos del cliente:', clientData);
            console.log('Carrito:', checkoutCart);
            
            // Verificar si hay datos
            if (!clientData.nombre || Object.keys(checkoutCart).length === 0) {
                document.getElementById('productsContainer').innerHTML = `
                    <div class="text-center py-3">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3" style="color: var(--ktm-orange);"></i>
                        <p>No se encontraron datos completos del pedido.</p>
                        <p>Por favor, completa el proceso de checkout primero.</p>
                        <a href="/checkout" class="btn btn-sm btn-ktm">Volver al checkout</a>
                    </div>
                `;
                return;
            }
            
            // 2. Mostrar datos del cliente
            document.getElementById('clientName').textContent = clientData.nombre;
            document.getElementById('clientDocument').textContent = clientData.documento || 'No especificado';
            document.getElementById('clientPhone').textContent = clientData.telefono || 'No especificado';
            document.getElementById('clientEmail').textContent = clientData.correo || 'No especificado';
            document.getElementById('clientComments').textContent = clientData.comentarios || 'Sin comentarios';
            
            // 3. Cargar productos del carrito
            const productsContainer = document.getElementById('productsContainer');
            let productsHTML = '';
            let subtotal = 0;
            let itemCount = 0;
            
            if (Object.keys(checkoutCart).length > 0) {
                for (const id in checkoutCart) {
                    const item = checkoutCart[id];
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;
                    itemCount += item.quantity;
                    
                    // Determinar icono basado en categoría
                    let icon = 'fa-box';
                    if (item.category.includes('Lubricante')) icon = 'fa-oil-can';
                    else if (item.category.includes('Refrigerante')) icon = 'fa-snowflake';
                    else if (item.category.includes('Accesorio') || item.category.includes('LED')) icon = 'fa-lightbulb';
                    else if (item.category.includes('Limpieza')) icon = 'fa-brush';
                    else if (item.category.includes('Electricidad') || item.category.includes('Batería')) icon = 'fa-battery-full';
                    else if (item.category.includes('Mantenimiento')) icon = 'fa-wrench';
                    
                    productsHTML += `
                        <div class="product-item">
                            <div>
                                <div class="product-name">
                                    <i class="fas ${icon} me-2"></i>${item.name}
                                </div>
                                <div class="product-quantity">Cantidad: ${item.quantity} × $${item.price.toFixed(2)}</div>
                            </div>
                            <div class="product-price">$${itemTotal.toFixed(2)}</div>
                        </div>
                    `;
                }
            }
            
            productsContainer.innerHTML = productsHTML;
            
            // 4. Calcular y mostrar totales
            const shippingCost = 9.99;
            const discountAmount = 30.00;
            const taxRate = 0.21;
            
            const tax = subtotal * taxRate;
            const discount = checkoutDiscount ? discountAmount : 0;
            const total = subtotal + shippingCost - discount + tax;
            
            // Actualizar totales en la interfaz
            document.getElementById('summarySubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('summaryShipping').textContent = `$${shippingCost.toFixed(2)}`;
            document.getElementById('summaryDiscount').textContent = `-$${discount.toFixed(2)}`;
            document.getElementById('summaryTax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('summaryTotal').textContent = `$${total.toFixed(2)}`;
            
            // Actualizar título con cantidad de productos
            if (itemCount > 0) {
                const titleElement = document.querySelector('.ktm-section-title i.fa-shopping-cart').parentNode;
                titleElement.innerHTML = `<i class="fas fa-shopping-cart"></i> PRODUCTOS (${itemCount} items)`;
            }
            
            // Guardar datos de resumen para enviar al servidor después
            window.orderSummary = {
                subtotal,
                shipping: shippingCost,
                discount,
                tax,
                total,
                items: checkoutCart
            };
        }
        
        // Función para confirmar el pedido
        function confirmarPedido() {
            const btn = document.getElementById('confirmOrderBtn');
            const originalText = btn.innerHTML;
            
            // Cambiar texto del botón
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> PROCESANDO...';
            btn.disabled = true;
            
            // Generar número de pedido
            const orderNumber = generateOrderNumber();
            document.getElementById('orderNumber').innerHTML = `Número de pedido: <strong>#${orderNumber}</strong>`;
            document.getElementById('promoOrderNumber').textContent = `#${orderNumber}`;
            
            // Simular envío al servidor
            setTimeout(() => {
                // 1. Preparar datos para enviar al servidor
                const clientData = JSON.parse(localStorage.getItem('clienteData')) || {};
                const orderData = {
                    orderNumber,
                    client: clientData,
                    order: window.orderSummary,
                    timestamp: new Date().toISOString()
                };
                
                // 2. Mostrar modal de confirmación
                const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                modal.show();
                
                // 3. Guardar el pedido en localStorage para historial
                const orderHistory = JSON.parse(localStorage.getItem('orderHistory')) || [];
                orderHistory.push(orderData);
                localStorage.setItem('orderHistory', JSON.stringify(orderHistory));
                
                // 4. Restaurar botón
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                // 5. Imprimir datos en consola (simulación de envío al servidor)
                console.log('📦 Datos del pedido listos para enviar al servidor:');
                console.log(orderData);
                
            }, 1500);
        }
        
        // Función para saltar registro
        function skipRegistration() {
            // Limpiar localStorage relacionado con el pedido actual
            localStorage.removeItem('checkoutCart');
            localStorage.removeItem('checkoutDiscount');
            localStorage.removeItem('clienteData');
            
            // Redirigir a la página principal
            setTimeout(() => {
                window.location.href = '/';
            }, 500);
        }
        
        // Función para redirigir a registro
        function goToRegistration() {
            // Guardar datos del cliente para el registro
            const clientData = JSON.parse(localStorage.getItem('clienteData')) || {};
            if (clientData.correo) {
                localStorage.setItem('registrationPrefill', JSON.stringify({
                    email: clientData.correo,
                    name: clientData.nombre,
                    phone: clientData.telefono,
                    document: clientData.documento,
                    address: clientData.direccion,
                    specialOffer: true, // Marcar que viene de oferta especial
                    orderNumber: document.getElementById('promoOrderNumber').textContent.replace('#', '')
                }));
            }
            
            // Limpiar carrito pero mantener historial
            localStorage.removeItem('checkoutCart');
            localStorage.removeItem('checkoutDiscount');
            localStorage.removeItem('clienteData');
            
            // Redirigir a la página de registro
            window.location.href = '/registro';
        }
        
        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Página de confirmación cargada');
            
            // Cargar datos del pedido
            loadOrderData();
            
            // Configurar botón de confirmación
            document.getElementById('confirmOrderBtn').addEventListener('click', confirmarPedido);
            
            // Configurar botón para mostrar modal de registro
            document.getElementById('showRegisterModalBtn').addEventListener('click', function() {
                const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
                confirmModal.hide();
                
                // Mostrar modal de registro después de un breve delay
                setTimeout(() => {
                    const registerModal = new bootstrap.Modal(document.getElementById('registerPromoModal'));
                    registerModal.show();
                }, 300);
            });
            
            // Configurar botón de registro en la sección de promoción
            document.getElementById('registerBtn').addEventListener('click', function() {
                const clientData = JSON.parse(localStorage.getItem('clienteData')) || {};
                if (clientData.correo) {
                    localStorage.setItem('registrationPrefill', JSON.stringify({
                        email: clientData.correo,
                        name: clientData.nombre
                    }));
                }
                window.location.href = '/registro';
            });
            
            // Configurar botón para ir a registro desde modal promocional
            document.getElementById('goToRegisterBtn').addEventListener('click', goToRegistration);
            
            // Mostrar mensaje si no hay datos del cliente
            const clientData = JSON.parse(localStorage.getItem('clienteData'));
            if (!clientData || !clientData.nombre) {
                alert('No se encontraron datos del cliente. Por favor, completa el formulario de checkout primero.');
                setTimeout(() => {
                    window.location.href = '/checkout';
                }, 1000);
            }
        });
    </script>
    
    <style>
        /* Estilos adicionales para el modal promocional */
        .modal-content {
            border-radius: 15px !important;
            overflow: hidden;
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-gray) 100%);
        }
        
        .modal-body {
            background-color: var(--ktm-gray);
        }
        
        .modal-footer {
            background-color: rgba(26, 26, 26, 0.9);
        }
        
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
            opacity: 0.8;
        }
        
        .btn-close-white:hover {
            opacity: 1;
        }
        
        /* Animación para el modal */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .btn-ktm {
            animation: pulse 2s infinite;
        }
        
        /* Efecto de brillo en los beneficios */
        .benefit-item {
            transition: all 0.3s ease;
        }
        
        .benefit-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 102, 0, 0.2);
            background-color: rgba(255, 102, 0, 0.1);
        }
    </style>
</body>
</html>