<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes de Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4 text-center">Órdenes de Servicio</h3>

            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID_ORDEN_SERVICIO</th>
                        <th>ID_CLIENTES</th>
                        <th>ID_ADMINISTRADOR</th>
                        <th>ID_TECNICOS</th>
                        <th>ID_MOTOS</th>
                        <th>Fecha_inicio</th>
                        <th>Fecha_estimada</th>
                        <th>Fecha_fin</th>
                        <th>Estado</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datos as $orden_servicio)
                        <tr>
                            <td>{{ $orden_servicio->ID_ORDEN_SERVICIO }}</td>
                            <td>{{ $orden_servicio->ID_CLIENTES }}</td>
                            <td>{{ $orden_servicio->ID_ADMINISTRADOR }}</td>
                            <td>{{ $orden_servicio->ID_TECNICOS }}</td>
                            <td>{{ $orden_servicio->ID_MOTOS }}</td>
                            
                            <td>{{ $orden_servicio->Fecha_inicio }}</td>
                            <td>{{ $orden_servicio->Fecha_estimada }}</td>
                            <td>{{ $orden_servicio->Fecha_fin }}</td>
                            
                            <td>{{ $orden_servicio->Estado }}</td>
                            
                            <td>
                                <button class="btn btn-success btn-sm">
                                    <i class="fas fa-pen"></i> Editar
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">
                                No hay órdenes de servicio registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>