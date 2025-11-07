<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<container class="container-sm d-flex justify-content-center mt-5">
    <div class="card">
        <div class="card-body" style="width: 1200px;">
            <h3>Módulo Clientes</h3>
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
            <form action="{{ url('/clientes') }}" method="GET">
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
                                   placeholder="Buscar por nombre o documento">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/clientes') }}" class="btn btn-warning"><i class="fas fa-list"></i> Reset</a>
                    </div>
                </div>
            </form>

            {{-- Tabla --}}
            @if($datos->count() > 0)
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                    <tr>
                        <th>ID_CLIENTES</th>
                        <th>ID_UBICACION</th>
                        <th>Nombre</th>
                        <th>TipoDocumento</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->ID_CLIENTES }}</td>
                            <td>{{ $item->ID_UBICACION }}</td>
                            <td>{{ $item->Nombre }}</td>
                            <td>{{ $item->TipoDocumento }}</td>
                            <td>{{ $item->Correo }}</td>
                            <td>{{ $item->Telefono }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditarModal"
                                    data-id="{{ $item->ID_CLIENTES }}"
                                    data-ubicacion="{{ $item->ID_UBICACION }}"
                                    data-nombre="{{ $item->Nombre }}"
                                    data-tipo="{{ $item->TipoDocumento }}"
                                    data-correo="{{ $item->Correo }}"
                                    data-telefono="{{ $item->Telefono }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No hay clientes registrados.
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
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_CLIENTES" class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" name="ID_CLIENTES" required>
                    </div>
                    <div class="mb-3">
                        <label for="ID_UBICACION" class="form-label">ID_UBICACION</label>
                        <input type="text" class="form-control" name="ID_UBICACION" required>
                    </div>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="TipoDocumento" class="form-label">Tipo Documento</label>
                        <select class="form-select" name="TipoDocumento" required>
                            <option value="">[Seleccione]</option>
                            <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">NIT</option>
                            <option value="Rut">RUT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="Correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" name="Telefono" required>
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
                <h5 class="modal-title"><i class="fa-solid fa-user-pen"></i> Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTES" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_UBICACION</label>
                        <input type="text" class="form-control" id="editID_UBICACION" name="ID_UBICACION" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Documento</label>
                        <select class="form-select" id="editTipoDocumento" name="TipoDocumento" required>
                            <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">NIT</option>
                            <option value="Rut">RUT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" id="editCorreo" name="Correo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="editTelefono" name="Telefono" required>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var ubicacion = button.getAttribute('data-ubicacion');
        var nombre = button.getAttribute('data-nombre');
        var tipo = button.getAttribute('data-tipo');
        var correo = button.getAttribute('data-correo');
        var telefono = button.getAttribute('data-telefono');

        document.getElementById('editID_CLIENTES').value = id;
        document.getElementById('editID_UBICACION').value = ubicacion;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editTipoDocumento').value = tipo;
        document.getElementById('editCorreo').value = correo;
        document.getElementById('editTelefono').value = telefono;

        var form = document.getElementById('editForm');
        form.action = '/clientes/' + id;
    });
});
</script>
</body>
</html>
