{{-- resources/views/auth/admin-register.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Administrador - SOMEMAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --ktm-orange: #ff6600;
            --ktm-light: #ff8333;
            --bg-dark: #0d0d0d;
            --bg-dark-2: #141414;
            --text-light: #eaeaea;
        }

        body {
            background: var(--bg-dark);
            font-family: 'Montserrat', sans-serif;
            color: var(--text-light);
        }

        .card-pro {
            background: var(--bg-dark-2);
            border: 1px solid rgba(255, 102, 0, 0.25);
            box-shadow: 0 15px 50px rgba(0,0,0,0.7);
            border-radius: 16px;
            padding: 25px;
            animation: fadeIn .6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-header {
            background: linear-gradient(90deg, #0f0f0f, var(--ktm-orange));
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(255, 102, 0, 0.4);
        }

        .card-header h4 {
            margin: 0;
            font-weight: 800;
            letter-spacing: .5px;
            color: var(--text-light);
        }

        label {
            font-weight: 600;
        }

        input, select {
            background: #1b1b1b !important;
            border: 1px solid #333 !important;
            border-radius: 10px !important;
            color: var(--text-light) !important;
        }

        input:focus, select:focus {
            border-color: var(--ktm-orange) !important;
            box-shadow: 0 0 10px rgba(255, 102, 0, 0.6) !important;
        }

        .btn-ktm {
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-light));
            color: #000000ff;
            font-weight: 800;
            padding: 12px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 8px 18px rgba(255, 102, 0, 0.5);
            transition: 0.3s;
            font-size: 1.1rem;
        }

        .btn-ktm:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 20px rgba(255, 102, 0, 0.9);
        }

        a {
            color: var(--ktm-light);
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center mt-5">

        <div class="col-md-8">
            <div class="card-pro">

                {{-- HEADER --}}
                <div class="card-header text-center">
                    <h4>Registro de Administrador</h4>
                </div>

                {{-- FORMULARIO --}}
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.registro') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>ID Administrador</label>
                                <input type="text" class="form-control" name="ID_ADMINISTRADOR" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="Homeo" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="Correo" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tipo Documento</label>
                                <select class="form-control" name="TopDocumento" required>
                                    <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Cedula Extranjeria">Cédula de Extranjería</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="Telefono" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="Usuario" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="contrasena" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Confirmar Contraseña</label>
                                <input type="password" class="form-control" name="contrasena_confirmation" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-ktm w-100 mt-2">
                            Registrar Administrador
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('admin.login') }}">Ya tengo cuenta</a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>
