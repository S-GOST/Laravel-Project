<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Cliente - KTM Shop</title>

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
            max-width: 1200px;
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
            padding-bottom: 0.7rem;
            border-bottom: 2px solid var(--ktm-light-gray);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .ktm-section-title i {
            font-size: 1.3rem;
        }
        
        /* Resumen del Carrito */
        .cart-summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--ktm-light-gray);
            transition: all 0.3s;
        }
        
        .cart-summary-item:hover {
            background-color: rgba(255, 102, 0, 0.05);
            padding-left: 10px;
            padding-right: 10px;
            margin-left: -10px;
            margin-right: -10px;
            border-radius: 5px;
        }
        
        .cart-item-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .cart-item-icon {
            width: 50px;
            height: 50px;
            background-color: var(--ktm-light-gray);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ktm-orange);
            font-size: 1.5rem;
            border: 1px solid rgba(255, 102, 0, 0.3);
        }
        
        .cart-item-details h6 {
            margin-bottom: 0.2rem;
            font-weight: 600;
            color: var(--ktm-white);
        }
        
        .cart-item-quantity {
            color: #aaa;
            font-size: 0.9rem;
        }
        
        .cart-item-price {
            font-weight: 700;
            color: var(--ktm-orange);
        }
        
        /* Total del Carrito */
        .cart-total {
            background-color: var(--ktm-light-gray);
            border-radius: 8px;
            padding: 1.2rem;
            margin-top: 1.5rem;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
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
        
        /* Campos del formulario */
        .form-label {
            color: #ddd;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-control {
            background-color: var(--ktm-light-gray);
            border: 2px solid #444;
            color: var(--ktm-white);
            border-radius: 8px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            background-color: var(--ktm-light-gray);
            border-color: var(--ktm-orange);
            color: var(--ktm-white);
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.25);
        }
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        
        /* Botón KTM */
        .btn-ktm {
            background: linear-gradient(to right, var(--ktm-orange), var(--ktm-dark-orange));
            color: var(--ktm-black);
            border: none;
            padding: 1rem;
            font-weight: 700;
            font-size: 1.1rem;
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
        
        /* Footer KTM */
        .ktm-footer {
            text-align: center;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--ktm-light-gray);
            color: #777;
            font-size: 0.9rem;
        }
        
        /* Indicador de pasos */
        .ktm-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            position: relative;
        }
        
        .ktm-progress::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 10%;
            right: 10%;
            height: 3px;
            background-color: var(--ktm-light-gray);
            z-index: 1;
        }
        
        .ktm-progress-step {
            text-align: center;
            position: relative;
            z-index: 2;
            width: 33%;
        }
        
        .ktm-step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--ktm-light-gray);
            color: #777;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 800;
            border: 3px solid var(--ktm-light-gray);
            transition: all 0.3s;
        }
        
        .ktm-progress-step.active .ktm-step-circle {
            background-color: var(--ktm-orange);
            color: var(--ktm-black);
            border-color: var(--ktm-orange);
            box-shadow: 0 0 0 5px rgba(255, 102, 0, 0.2);
        }
        
        .ktm-progress-step.completed .ktm-step-circle {
            background-color: var(--ktm-light-gray);
            color: var(--ktm-orange);
            border-color: var(--ktm-orange);
        }
        
        .ktm-step-label {
            font-size: 0.85rem;
            color: #777;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .ktm-progress-step.active .ktm-step-label {
            color: var(--ktm-orange);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .ktm-logo {
                font-size: 1.5rem;
                justify-content: center;
            }
            
            .ktm-progress::before {
                left: 15%;
                right: 15%;
            }
        }
        
        @media (max-width: 768px) {
            .ktm-step-label {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>

    <div class="container py-4">
        
        <!-- Header KTM -->
        <div class="ktm-header text-center mb-5">
            <div class="ktm-logo justify-content-center">
                <i class="fas fa-motorcycle"></i>
                <span>KTM <span class="orange">SHOP</span></span>
            </div>
            <h1 class="mt-3 mb-0" style="font-weight: 800; letter-spacing: 1px; font-size: 1.5rem;">DATOS DEL CLIENTE</h1>
            <p class="mb-0 mt-2" style="color: #aaa;">Completa tus datos y revisa tu pedido</p>
        </div>
        
        <!-- Progreso KTM -->
        <div class="ktm-progress">
            <div class="ktm-progress-step completed">
                <div class="ktm-step-circle">1</div>
                <div class="ktm-step-label">Carrito</div>
            </div>
            <div class="ktm-progress-step active">
                <div class="ktm-step-circle">2</div>
                <div class="ktm-step-label">Datos</div>
            </div>
            <div class="ktm-progress-step">
                <div class="ktm-step-circle">3</div>
                <div class="ktm-step-label">Confirmar</div>
            </div>
        </div>
        
        <div class="row">
            <!-- Columna izquierda: Resumen del Carrito -->
            <div class="col-lg-6 mb-4">
                <div class="ktm-section h-100">
                    <h4 class="ktm-section-title">
                        <i class="fas fa-shopping-cart"></i> RESUMEN DE TU PEDIDO
                    </h4>
                    
                    <!-- Aquí se muestran los productos reales del carrito -->
                    @if(!empty($carrito) && count($carrito) > 0)
                        @foreach($carrito as $item)
                        <div class="cart-summary-item">
                            <div class="cart-item-info">
                                <div class="cart-item-icon">
                                    <i class="fas {{ $item['icono'] ?? 'fa-box' }}"></i>
                                </div>
                                <div class="cart-item-details">
                                    <h6>{{ $item['nombre'] }}</h6>
                                    <div class="cart-item-quantity">Cantidad: {{ $item['cantidad'] }}</div>
                                </div>
                            </div>
                            <div class="cart-item-price">€{{ number_format($item['precio'] * $item['cantidad'], 2, ',', '.') }}</div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted py-4">No hay productos en el carrito</p>
                    @endif
                    
                    <!-- Total del Carrito -->
                    <div class="cart-total">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span>€{{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>Envío:</span>
                            <span>€{{ number_format($envio, 2, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>Descuento:</span>
                            <span style="color: var(--ktm-orange);">-€{{ number_format($descuento, 2, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>TOTAL:</span>
                            <span>€{{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <!-- Botón para modificar carrito -->
                    <a href="{{ route('carrito.show') }}" class="btn btn-outline-warning w-100 mt-3" style="border-color: var(--ktm-orange); color: var(--ktm-orange);">
                        <i class="fas fa-edit"></i> Modificar Carrito
                    </a>
                </div>
            </div>
            
            <!-- Columna derecha: Formulario del Cliente -->
            <div class="col-lg-6 mb-4">
                <div class="ktm-section">
                    <h4 class="ktm-section-title">
                        <i class="fas fa-user-edit"></i> TUS DATOS
                    </h4>
                    
                    <form action="{{ route('checkout.store') }}" method="POST" id="clienteForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre completo</label>
                                <input type="text" name="nombre" class="form-control" required 
                                       value="{{ old('nombre', $cliente['nombre'] ?? '') }}">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Documento</label>
                                <input type="text" name="documento" class="form-control" required
                                       value="{{ old('documento', $cliente['documento'] ?? '') }}">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" required
                                       value="{{ old('telefono', $cliente['telefono'] ?? '') }}">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email" name="correo" class="form-control" required
                                       value="{{ old('correo', $cliente['correo'] ?? '') }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Dirección de envío</label>
                            <input type="text" name="direccion" class="form-control" required
                                   value="{{ old('direccion', $cliente['direccion'] ?? '') }}">
                        </div>
                        
                        <!-- Caja de comentarios -->
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-comment me-2"></i>Comentarios adicionales (opcional)
                            </label>
                            <textarea name="comentarios" class="form-control" 
                                      placeholder="Instrucciones especiales para el envío, comentarios sobre el pedido, etc.">{{ old('comentarios', $cliente['comentarios'] ?? '') }}</textarea>
                        </div>
                        
                        <!-- Botón de envío -->
                        <button type="submit" class="btn btn-ktm">
                            <i class="fas fa-arrow-right"></i> CONTINUAR AL PAGO
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Footer KTM -->
        <div class="ktm-footer">
            <p class="mb-2">
                <i class="fas fa-lock" style="color: var(--ktm-orange);"></i> 
                Tus datos están protegidos y no se compartirán con terceros
            </p>
            <p class="mb-0">
                © 2023 KTM Shop - Todos los derechos reservados | 
                <a href="#" style="color: var(--ktm-orange);">Política de privacidad</a>
            </p>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validación del formulario
            const form = document.getElementById('clienteForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Validación básica
                    const requiredFields = form.querySelectorAll('[required]');
                    let valid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            valid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });
                    
                    // Validar email
                    const emailField = form.querySelector('input[type="email"]');
                    if (emailField && emailField.value) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(emailField.value)) {
                            emailField.classList.add('is-invalid');
                            valid = false;
                        }
                    }
                    
                    if (!valid) {
                        e.preventDefault();
                        
                        // Mostrar mensaje de error
                        let errorMsg = document.querySelector('.alert');
                        if (!errorMsg) {
                            errorMsg = document.createElement('div');
                            errorMsg.className = 'alert alert-danger mt-3';
                            errorMsg.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Por favor, completa todos los campos requeridos correctamente.';
                            form.insertBefore(errorMsg, form.querySelector('.btn-ktm'));
                        }
                    }
                });
                
                // Remover clase de error al escribir
                form.querySelectorAll('input, textarea').forEach(field => {
                    field.addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                });
            }
        });
    </script>
</body>
</html>