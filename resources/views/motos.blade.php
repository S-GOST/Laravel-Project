<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Motos</title>
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
            <h3>Módulo Motos</h3>
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
            <form action="{{ url('/motos') }}" method="GET">
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
                                   placeholder="Buscar por id o placa">
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
                        <th>ID_MOTOS</th>
                        <th>ID_CLIENTES</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Recorrido</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->ID_MOTOS }}</td>
                            <td>{{ $item->ID_CLIENTES }}</td>
                            <td>{{ $item->Placa }}</td>
                            <td>{{ $item->Modelo }}</td>
                            <td>{{ $item->Marca }}</td>
                            <td>{{($item->Recorrido) }} km</td>
                            <td class="d-flex gap-2">
                                {{-- Botón Editar --}}
                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditarModal"
                                    data-idm="{{ $item->ID_MOTOS }}"
                                    data-idc="{{ $item->ID_CLIENTES }}"
                                    data-Placa="{{ $item->Placa }}"
                                    data-Modelo="{{ $item->Modelo }}"
                                    data-Marca="{{ $item->Marca }}"
                                    data-Recorrido="{{ $item->Recorrido }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('motos.destroy', $item->ID_MOTOS) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Moto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_MOTOS" class="form-label">ID_MOTOS</label>
                        <input type="text" class="form-control" name="ID_MOTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control"  name="ID_CLIENTES" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Placa</label>
                        <input type="text" class="form-control" name="Placa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" class="form-control" name="Modelo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" name="Marca" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Recorrido (km)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" name="Recorrido" required>
                            <span class="input-group-text">km</span>
                        </div>
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
                <h5 class="modal-title"><i class="fa-solid fa-user-pen"></i> Editar Moto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">ID_MOTOS</label>
                        <input type="text" class="form-control" id="editID_MOTOS" name="ID_MOTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTES" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Placa</label>
                        <input type="text" class="form-control" id="editPlaca" name="Placa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="number" class="form-control" id="editModelo" name="Modelo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" id="editMarca" name="Marca" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Recorrido (km)</label>
                        <div class="input-group">
                            <input 
                                type="number" 
                                class="form-control" 
                                id="editRecorrido" 
                                name="Recorrido" 
                                step="0.01" 
                                required>
                            <span class="input-group-text">km</span>
                        </div>
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

        var idM = button.getAttribute('data-idm');
        var idC = button.getAttribute('data-idc');
        var placa = button.getAttribute('data-placa');
        var modelo = button.getAttribute('data-modelo');
        var marca = button.getAttribute('data-marca');
        var recorrido = button.getAttribute('data-recorrido');

        document.getElementById('editID_MOTOS').value = idM;
        document.getElementById('editID_CLIENTES').value = idC;
        document.getElementById('editPlaca').value = placa;
        document.getElementById('editModelo').value = modelo;
        document.getElementById('editMarca').value = marca;
        document.getElementById('editRecorrido').value = recorrido;

        var form = document.getElementById('editForm');
        form.action = '/motos/' + idM;
    });
});
</script>
</body>
</html>
