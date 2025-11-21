<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Comprobante</title>
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
            <h3>Módulo Comprobante</h3>
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
            <form action="{{ url('/comprobante') }}" method="GET">
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
                                   placeholder="Buscar por id o comprobante">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/comprobante') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- Tabla --}}
            @if($datos->count() > 0)
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                    <tr>
                        <th>ID_COMPROBANTE</th>
                        <th>ID_INFORME</th>
                        <th>ID_CLIENTES</th>
                        <th>ID_ADMINISTRADOR</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Estado_pago</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->ID_COMPROBANTE }}</td>
                            <td>{{ $item->ID_INFORME }}</td>
                            <td>{{ $item->ID_CLIENTES}}</td>
                            <td>{{ $item->ID_ADMINISTRADOR }}</td>
                            <td>{{ $item->Monto}}$</td>
                            <td>{{ $item->Fecha }}</td>
                            <td>{{ $item->Estado_pago }}</td>
                            <td class="d-flex gap-2">
                                {{-- Botón Editar --}}
                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditarModal"
                                    data-idc="{{ $item->ID_COMPROBANTE }}"
                                    data-idi="{{ $item->ID_INFORME }}"
                                    data-idcl="{{ $item->ID_CLIENTES }}"
                                    data-ida="{{ $item->ID_ADMINISTRADOR }}"
                                    data-monto="{{ $item->Monto }}"
                                    data-fecha="{{ $item->Fecha}}"
                                    data-estado="{{ $item->Estado_pago }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('comprobante.destroy', $item->ID_COMPROBANTE) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle"></i> No hay comprobante registrados.
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
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Comprobante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('comprobante.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_COMPROBANTE" class="form-label">ID_COMPROBANTE</label>
                        <input type="text" class="form-control" name="ID_COMPROBANTE" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_INFORME" class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" name="ID_INFORME" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_CLIENTES" class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" name="ID_CLIENTES" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" name="ID_ADMINISTRADOR" required>
                    </div>
                    <div class="mb-3">
                        <label for="Monto" class="form-label">Monto</label>
                        <input type="number" class="form-control" name="Monto" required>
                    </div>
                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha</label>
                        <input type="datetime" class="form-control" name="Fecha" required>
                    </div>
                     <div class="mb-3">
                        <label for="Estado_pago" class="form-label">Estado_pago</label>
                        <input type="text" class="form-control" name="Estado_pago" required>
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
                        <label class="form-label">ID_COMPROBANTE</label>
                        <input type="text" class="form-control" id="editID_COMPROBANTE" name="ID_COMPROBANTE" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_INFORME</label>
                        <input type="text" class="form-control" id="editID_INFORME" name="ID_INFORME" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTES" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto</label>
                        <input type="number" class="form-control" id="editMonto" name="Monto" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="datetime" class="form-control" id="editFecha" name="Fecha" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado_pago</label>
                        <input type="text" class="form-control" id="editEstado_pago" name="Estado_pago" required>
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

        var idc = button.getAttribute('data-idc');
        var idi = button.getAttribute('data-idi');
        var idcl = button.getAttribute('data-idcl');
        var ida = button.getAttribute('data-ida');
        var monto = button.getAttribute('data-monto');
        var fecha = button.getAttribute('data-fecha');
        var estado= button.getAttribute('data-estado');

        document.getElementById('editID_COMPROBANTE').value = idc;
        document.getElementById('editID_INFORME').value = idi;
        document.getElementById('editID_CLIENTES').value = idcl;
        document.getElementById('editID_ADMINISTRADOR').value = ida;
        document.getElementById('editMonto').value = monto;
        document.getElementById('editFecha').value = fecha;
        document.getElementById('editEstado_pago').value = estado

        var form = document.getElementById('editForm');
        form.action = '/comprobante/' + idc;
    });
});
</script>
</body>
</html>
