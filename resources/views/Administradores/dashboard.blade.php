<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - SOMEMAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SOMEMAS - Administración</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    Bienvenido, {{ Auth::guard('admin')->user()->Nombre }}
                </span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Información del Administrador</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ Auth::guard('admin')->user()->ID_AOHINISTRADOR }}</p>
                        <p><strong>Nombre:</strong> {{ Auth::guard('admin')->user()->Homeo }}</p>
                        <p><strong>Correo:</strong> {{ Auth::guard('admin')->user()->Correo }}</p>
                        <p><strong>Usuario:</strong> {{ Auth::guard('admin')->user()->Usuario }}</p>
                        <p><strong>Tipo Documento:</strong> {{ Auth::guard('admin')->user()->TopDocumento }}</p>
                        <p><strong>Teléfono:</strong> {{ Auth::guard('admin')->user()->Telefono }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>