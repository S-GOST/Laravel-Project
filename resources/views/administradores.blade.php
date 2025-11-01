<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Módulo Administradores</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (jsDelivr) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4">Módulo Administradores</h3>
            <hr>
            <!-- Botón nuevo -->
            <div class="text-end mb-3">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </div>

            <!-- Buscador -->
            <form class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">Buscar</span>
                            <input type="text" class="form-control" placeholder="Buscar por nombre o documento">
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-info text-white">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <button type="button" class="btn btn-warning text-white">
                            <i class="fas fa-undo"></i> Restaurar
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tabla -->
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Juan</td>
                        <td>juanxxx@gmail.com</td>
                        <td>54698712</td>
                        <td>322547896</td>
                        <td>
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-pen"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Alejandro</td>
                        <td>Alejandroxxx@gmail.com</td>
                        <td>58745632</td>
                        <td>312564789</td>
                        <td>
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-pen"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginación -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
    </div>
</div>
</body>
</html>
