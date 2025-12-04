<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio | Sistema KTM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap / Icons / Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: url('https://www.transparenttextures.com/patterns/black-linen.png'),
                        linear-gradient(180deg, #0a0a0a, #1a1a1a);
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            overflow: hidden;
            text-align: center;
        }

        .container-main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .logo {
            width: 140px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 8px #ff6600);
        }

        h1 {
            color: #ff6600;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        p {
            color: #bbb;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .btn-ktm {
            background: linear-gradient(90deg, #ff6600, #ff8533);
            border: none;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 12px 25px;
            border-radius: 8px;
            margin: 10px;
            text-transform: uppercase;
            box-shadow: 0 0 15px rgba(255, 102, 0, 0.4);
            transition: all 0.3s ease;
        }

        .btn-ktm:hover {
            background: linear-gradient(90deg, #ff8533, #ffb366);
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(255, 102, 0, 0.6);
            color: #fff;
        }

        footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        .ktm-line {
            width: 200px;
            height: 3px;
            background: #ff6600;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 12px #ff6600;
        }
    </style>
</head>

<body>
    <div class="container-main">
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/75/KTM-Logo.svg" class="logo" alt="KTM">
        <h1>Bienvenido al Sistema KTM</h1>
        <div class="ktm-line"></div>
        <p>Selecciona el tipo de usuario para ingresar al sistema</p>

        <div>
            <a href="{{ route('admin.login') }}" class="btn btn-ktm"><i class="bi bi-person-badge-fill me-2"></i>Administrador</a>
            <a href="{{ route('tecnico.login') }}" class="btn btn-ktm"><i class="bi bi-tools me-2"></i>Técnico</a>
        </div>
    </div>

    <footer>
        © {{ date('Y') }} KTM | Sistema de Gestión de Servicio
    </footer>
</body>
</html>
