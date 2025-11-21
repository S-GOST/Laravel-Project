<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Detalles orden servicio</title>
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
            <h3>Módulo Detalles orden servicio</h3>
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
            <form action="{{ url('/detalles_orden_servicio') }}" method="GET">
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
                                   placeholder="Buscar por id detalles o por orden de servicio">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/motos') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- Tabla --}}
            @if($datos->count() > 0)
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                    <tr>
                        <th>ID_DETALLES_ORDEN_SERVICIO</th>
                        <th>ID_ORDEN_SERVICIO</th>
                        <th>ID_SERVICIOS</th>
                        <th>ID_PRODUCTOS</th>
                        <th>Garantia</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->ID_DETALLES_ORDEN_SERVICIO }}</td>
                            <td>{{ $item->ID_ORDEN_SERVICIO }}</td>
                            <td>{{ $item->ID_SERVICIOS }}</td>
                            <td>{{ $item->ID_PRODUCTOS }}</td>
                            <td>{{ $item->Garantia }}</td>
                            <td>{{ $item->Estado }}</td>
                            <td>{{ $item->Precio }}$</td>
                            <td class="d-flex gap-2">
                                {{-- Botón Editar --}}
                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditarModal"
                                    data-idd="{{ $item->ID_DETALLES_ORDEN_SERVICIO }}"
                                    data-ido="{{ $item->ID_ORDEN_SERVICIO }}"
                                    data-ids="{{ $item->ID_SERVICIOS }}"
                                    data-idp="{{ $item->ID_PRODUCTOS }}"
                                    data-Garantia="{{ $item->Garantia }}"
                                    data-Estado="{{ $item->Estado }}"
                                    data-Precio="{{ $item->Precio }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('detalles_orden_servicio.destroy', $item->ID_DETALLES_ORDEN_SERVICIO) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle"></i> No hay motos registradas.
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
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Detalles orden servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('detalles_orden_servicio.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_DETALLES_ORDEN_SERVICIO" class="form-label">ID_DETALLES_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control" name="ID_DETALLES_ORDEN_SERVICIO" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control"  name="ID_ORDEN_SERVICIO" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_SERVICIOS</label>
                        <input type="text" class="form-control" name="ID_SERVICIOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_PRODUCTOS</label>
                        <input type="text" class="form-control" name="ID_PRODUCTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Garantia</label>
                        <input type="text" class="form-control" name="Garantia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" name="Estado" required>
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" name="Precio" required>
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
                <h5 class="modal-title"><i class="fa-solid fa-user-pen"></i> Editar Detalles orden servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">ID_DETALLES_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control" id="editID_DETALLES_ORDEN_SERVICIO" name="ID_DETALLES_ORDEN_SERVICIO" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_ORDEN_SERVICIO</label>
                        <input type="text" class="form-control" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_SERVICIOS</label>
                        <input type="text" class="form-control" id="editID_SERVICIOS" name="ID_SERVICIOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_PRODUCTOS</label>
                        <input type="text" class="form-control" id="editID_PRODUCTOS" name="ID_PRODUCTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Garantia</label>
                        <input type="text" class="form-control" id="editGarantia" name="Garantia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" id="editEstado" name="Estado" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" id="editPrecio"  name="Precio" required>
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

        var idD = button.getAttribute('data-idd');
        var idO = button.getAttribute('data-ido');
        var idS = button.getAttribute('data-ids');
        var idP = button.getAttribute('data-idp');
        var Garantia = button.getAttribute('data-garantia');
        var Estado = button.getAttribute('data-estado');
        var Precio = button.getAttribute('data-precio');

        document.getElementById('editID_DETALLES_ORDEN_SERVICIO').value = idD;
        document.getElementById('editID_ORDEN_SERVICIO').value = idO;
        document.getElementById('editID_SERVICIOS').value = idS;
        document.getElementById('editID_PRODUCTOS').value = idP;
        document.getElementById('editGarantia').value = Garantia;
        document.getElementById('editEstado').value = Estado;
        document.getElementById('editPrecio').value = Precio;

        var form = document.getElementById('editForm');
        form.action = '/detalles_orden_servicio/' + idD;
    });
});
</script>
</body>
</html>
