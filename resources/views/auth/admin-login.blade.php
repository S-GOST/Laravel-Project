<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrador - KTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-black: #000000;
            --ktm-gray: #2a2a2a;
            --ktm-light: #f8f9fa;
        }
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container { width: 100%; max-width: 420px; }
        .login-card {
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, var(--ktm-black) 0%, var(--ktm-gray) 100%);
            padding: 3rem 2rem 2rem;
            text-align: center;
        }
        .ktm-logo {
            width: 80px; height: 80px;
            background: var(--ktm-orange);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 800; font-size: 1.8rem;
            margin: 0 auto 1.5rem;
        }
        .login-body { padding: 2.5rem; }
        .form-group { margin-bottom: 1.5rem; }
        .form-label { font-weight: 600; color: var(--ktm-gray); }
        .input-with-icon { position: relative; }
        .input-icon {
            position: absolute; left: 15px; top: 50%;
            transform: translateY(-50%); color: #6c757d;
        }
        .input-with-icon .form-control { padding-left: 45px; }
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange) 0%, #e65c00 100%);
            border: none; border-radius: 10px; padding: 14px 20px;
            font-weight: 600; color: white; width: 100%;
        }
        .btn-ktm:hover { box-shadow: 0 8px 20px rgba(255,102,0,0.3); }
        .error-alert { border-radius: 10px; background: rgba(220,53,69,0.05); }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="ktm-logo">KTM</div>
                <h1 class="text-white fw-bold">KTM</h1>
                <p class="text-warning">Sistema de Administración</p>
            </div>
            <div class="login-body">
                @if ($errors->any())
                    <div class="alert alert-danger error-alert mb-4">
                        <strong><i class="fas fa-exclamation-circle me-2"></i>Error de acceso</strong>
                        <ul class="mt-2 ps-3">
                            @foreach ($errors->all() as $error)
                                <li class="small">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="usuario" class="form-label">Usuario</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" name="Usuario" id="Usuario" class="form-control"
                                   value="{{ old('Usuario') }}" required placeholder="Ingrese su usuario">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="contrasena" id="contrasena" class="form-control"
                                   required placeholder="Ingrese su contraseña">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-ktm mt-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Acceder al sistema
                    </button>
                </form>

                <div class="text-center mt-4">
