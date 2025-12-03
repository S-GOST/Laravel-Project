<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Técnico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap y fuentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/7/75/KTM-Logo.svg">

    <style>
        /* === FONDO GENERAL === */
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1c1c1c 100%);
            color: #f4f4f4;
            font-family: 'Rajdhani', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* === CONTENEDOR CENTRAL === */
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 30px;
        }

        /* === TARJETA PRINCIPAL === */
        .menu-card {
            background: rgba(25, 25, 25, 0.95);
            border: 1px solid rgba(255, 102, 0, 0.4);
            border-radius: 18px;
            box-shadow: 0 0 25px rgba(255, 102, 0, 0.2);
            padding: 40px;
            width: 90%;
            max-width: 550px;
            transition: transform 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        /* === ENCABEZADO === */
        .logo {
            width: 130px;
            margin-bottom: 15px;
            filter: drop-shadow(0 0 8px #ff6600);
        }

        .menu-card h2 {
            color: #ff6600;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        /* === BOTONES DEL MENÚ === */
        .btn-menu {
            background: linear-gradient(90deg, #ff6600, #ff8800);
            border: none;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            width: 100%;
            text-align: left;
            margin-bottom: 15px;
            padding: 12px 18px;
            border-radius: 10px;
            transition: 0.25s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-menu i {
            font-size: 1.3rem;
            opacity: 0.9;
        }

        .btn-menu:hover {
            transform: scale(1.03);
            background: linear-gradient(90deg, #ff7a00, #ffaa00);
            box-shadow: 0 0 15px rgba(255, 136, 0, 0.5);
        }

        /* === BOTÓN DE CIERRE DE SESIÓN === */
        .logout-btn {
            margin-top: 25px;
            background: transparent;
            color: #ff6600;
            border: 1px solid #ff6600;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ff6600;
            color: #fff;
            transform: scale(1.03);
        }

        /* === EFECTOS RESPONSIVOS === */
        @media (max-width: 576px) {
            .menu-card {
                padding: 25px;
            }
            .menu-card h2 {
                font-size: 1.4rem;
            }
            .btn-menu {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="menu-card shadow-lg">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/75/KTM-Logo.svg" class="logo" alt="KTM Logo">
            
            <h2>Bienvenido, {{ Auth::user()->Nombre }}</h2>

            <a href="#" class="btn-menu">🛠 Nuevas órdenes asignadas <i class="bi bi-arrow-right-circle"></i></a>
            <a href="#" class="btn-menu">📋 Gestión orden de servicio <i class="bi bi-gear-wide-connected"></i></a>
            <a href="#" class="btn-menu">📜 Historial de órdenes <i class="bi bi-clock-history"></i></a>
            <a href="#" class="btn-menu">⚙️ Repuestos y materiales <i class="bi bi-tools"></i></a>
            <a href="#" class="btn-menu">📅 Citas <i class="bi bi-calendar-check"></i></a>

            <form action="{{ route('tecnico.logout') }}" method="GET" class="mt-3">
                <button class="logout-btn">Cerrar sesión</button>
            </form>
        </div>
    </div>

    <!-- Iconos Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.js"></script>
</body>
</html>
