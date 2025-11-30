{{-- resources/views/auth/admin-register.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Registro Administrador - SOMEMAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Registro de Administrador</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ID_AOHINISTRADOR" class="form-label">ID Administrador:</label>
                                    <input type="text" class="form-control" id="ID_AOHINISTRADOR" name="ID_AOHINISTRADOR" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Homeo" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="Homeo" name="Homeo" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Correo" class="form-label">Correo:</label>
                                    <input type="email" class="form-control" id="Correo" name="Correo" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="TopDocumento" class="form-label">Tipo Documento:</label>
                                    <select class="form-control" id="TopDocumento" name="TopDocumento" required>
                                        <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Cedula Extranjeria">Cédula de Extranjería</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Telefono" class="form-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="Telefono" name="Telefono" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Usuario" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contrasena" class="form-label">Contraseña:</label> {{-- ← Cambiado a contrasena --}}
                                    <input type="password" class="form-control" id="contrasena" name="contrasena" required> {{-- ← name="contrasena" --}}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña:</label> {{-- ← Cambiado --}}
                                    <input type="password" class="form-control" id="contrasena_confirmation" name="contrasena_confirmation" required> {{-- ← name="contrasena_confirmation" --}}
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100">Registrar Administrador</button>
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