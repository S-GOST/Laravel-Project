<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Informe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
    body {
        background-color: #000000ff; 
    }
    
    .card {
        background-color: #E67514; 
    }
</style>

</head>
<body>
<container class="container-sm d-flex justify-content-center mt-5">
    <div class="card">
        <div class="card-body" style="width: 1200px;">
            <h3>Módulo Informe</h3>
            <hr>

            {{-- Mensajes --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-solid fa-circle-xmark"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Buscar --}}
            <form action="{{ url('/informe') }}" method="GET">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <i class="fa-solid fa-plus"></i> Nuevo
                    </button>
                </div>

                <div class="row g-2 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                                   placeholder="Buscar por id o informe">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/informe') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- Tabla --}}
            @if($datos->count() > 0)
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                    <tr>
                        <th>ID_INFORME</th>
                        <th>ID_DETALLES_ORDEN_SERVICIO</th>
                        <th>ID_ADMINISTRADOR</th>
                        <th>ID_TECNICOS</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->ID_INFORME }}</td>
                            <td>{{ $item->ID_DETALLES_ORDEN_SERVICIO }}</td>
                            <td>{{ $item->ID_ADMINISTRADOR}}</td>
                            <td>{{ $item->ID_TECNICOS }}</td>
                            <td>{{ $item->Descripcion}}</td>
                            <td>{{ $item->Fecha }}</td>
                            <td>{{ $item->Estado }}</td>
                            <td class="d-flex gap-2">
                                {{-- Botón Editar --}}
                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditarModal"
                                    data-id="{{ $item->ID_INFORME }}"
                                    data-id="{{ $item->ID_DESTALLES_ORDEN_SERVICIO }}"
                                    data-id="{{ $item->ID_ADMINISTRADOR}}"
                                    data-id="{{ $item->ID_TECNICOS }}"
                                    data-nombre="{{ $item->Descripcion }}"
                                    data-correo="{{ $item->Fecha}}"
                                    data-tipo="{{ $item->Estado}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('informe.destroy', $item->ID_INFORME) }}" method="POST" onsubmit="return confirmarEliminar(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No hay informe registrados.
                </div>
            @endif
        </div>
    </div>
</container>

{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Informe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('comprobante.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_INFORME" class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" name="ID_INFORME" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_INFORME" class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" name="ID_INFORME" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_DETALLES_ORDEN_SERVICIO" class="form-label">ID_DESTALLES_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control" name="ID_DETALLES_ORDEN_SERVICIO" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" name="ID_ADMINISTRADOR" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_TECNICOS" class="form-label">ID_TECNICOS</label>
                        <input type="text" class="form-control" name="ID_TECNICOS" required>
                    </div>
                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripcion</label>
                        <input type="datetime" class="form-control" name="Fecha_inicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha</label>
                        <input type="datetime" class="form-control" name="Fecha_estimada" required>
                    </div>
                     <div class="mb-3">
                        <label for="Estado" class="form-label">Estado</label>
                        <input type="datetime" class="form-control" name="Fecha_fin" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL EDITAR --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-user-pen"></i> Editar Comprobante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" id="editID_INFORME" name="ID_INFORME" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" id="editID_INFORME" name="ID_INFORME" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_DESTALLES_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control" id="editID_DETALLES_ORDEN_SERVICIO" name="ID_DETALLES_ORDEN_SERVICIO" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_TECNICOS</label>
                        <input type="text" class="form-control" id="editID_TECNICOS" name="ID_TECNICOS" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input type="datetime" class="form-control" id="editDescripcion" name="Descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="datetime" class="form-control" id="editFecha" name="Fecha" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="datetime" class="form-control" id="editEstado" name="Estado" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var id = button.getAttribute('data-id');
        var id = button.getAttribute('data-id');
        var id = button.getAttribute('data-id');
        var id = button.getAttribute('data-id');
        var Descripcion = button.getAttribute('data-Descripcion');
        var fecha = button.getAttribute('data-fecha');
        var Estado= button.getAttribute('data-Estado');

        document.getElementById('editID_INFORME').value = id;
        document.getElementById('editID_DETALLES_ORDEN_SERVICiO').value = id;
        document.getElementById('editID_ADMINISTRADOR').value = id;
        document.getElementById('editID_TECNICOS').value = id;
        document.getElementById('editDescripcion').value = Descripcion;
        document.getElementById('editFecha').value = fecha;
        document.getElementById('editEstado').value = Estado;

        var form = document.getElementById('editForm');
        form.action = '/informe/' + id;
    });
});
</script>
</body>
</html>
