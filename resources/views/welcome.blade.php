<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Gestión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

    <style>
        body {
            background: #111;
            color: #fff;
        }
        header {
            background: #0a0501ff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #c55f0d;
        }
        header img {
            height: 50px;
        }
        .logout-btn {
            background: #111;
            padding: 10px 20px;
            border-radius: 8px;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            transition: .2s;
        }
        .logout-btn:hover {
            background: #fff;
            color: #111;
        }
        .menu-card {
            background: #E67514;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: 0.3s ease;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.6);
            background: #80410eff;
        }
        a { text-decoration: none; color: #fff; }
    </style>
</head>
<body>
<header class="text-center py-4">
       <img src="{{ asset('img/rock.png') }}" style="width: 100px; height: auto;">
    </header>

<div class="container mt-5">
    
    <hr class="border-light">

    <div class="row g-4">

        <div class="col-md-4"><a href="/administradores"><div class="menu-card"><i class="fa-solid fa-user-shield fa-3x"></i><h4 class="mt-2">Administradores</h4></div></a></div>
        <div class="col-md-4"><a href="/tecnicos"><div class="menu-card"><i class="fa-solid fa-user-gear fa-3x"></i><h4 class="mt-2">Técnicos</h4></div></a></div>
        <div class="col-md-4"><a href="/clientes"><div class="menu-card"><i class="fa-solid fa-users fa-3x"></i><h4 class="mt-2">Clientes</h4></div></a></div>
        <div class="col-md-4"><a href="/motos"><div class="menu-card"><i class="fa-solid fa-motorcycle fa-3x"></i><h4 class="mt-2">Motos</h4></div></a></div>
        <div class="col-md-4"><a href="/servicios"><div class="menu-card"><i class="fa-solid fa-screwdriver-wrench fa-3x"></i><h4 class="mt-2">Servicios</h4></div></a></div>
        <div class="col-md-4"><a href="/productos"><div class="menu-card"><i class="fa-solid fa-box fa-3x"></i><h4 class="mt-2">Productos</h4></div></a></div>
        <div class="col-md-4"><a href="/orden_servicio"><div class="menu-card"><i class="fa-solid fa-file-signature fa-3x"></i><h4 class="mt-2">Órdenes de Servicio</h4></div></a></div>
        <div class="col-md-4"><a href="/detalles_orden_servicio"><div class="menu-card"><i class="fa-solid fa-list-check fa-3x"></i><h4 class="mt-2">Detalles Orden Servicio</h4></div></a></div>
        <div class="col-md-4"><a href="/informe"><div class="menu-card"><i class="fa-solid fa-chart-pie fa-3x"></i><h4 class="mt-2">Informe</h4></div></a></div>
        <div class="col-md-4"><a href="/comprobante"><div class="menu-card"><i class="fa-solid fa-receipt fa-3x"></i><h4 class="mt-2">Comprobantes</h4></div></a></div>
        <div class="col-md-4"><a href="/historial"><div class="menu-card"><i class="fa-solid fa-clock-rotate-left fa-3x"></i><h4 class="mt-2">Historial</h4></div></a></div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
