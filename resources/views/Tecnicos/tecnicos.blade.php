@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Técnicos</h3>
<hr>

{{-- Sección de Mensajes (Alertas) --}}
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

{{-- Sección de Búsqueda y Botón Nuevo --}}
<form action="{{ url('/tecnicos') }}" method="GET">
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
            <a href="{{ url('/tecnicos') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
        </div>
    </div>
</form>

{{-- Sección de Tabla de Datos --}}
@if($datos->count() > 0)
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-striped">
            <thead class="table-primary">
            <tr>
                <th>ID_TECNICOS</th>
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
                    <td>{{ $item->ID_TECNICOS }}</td>
                    <td>{{ $item->Nombre }}</td>
                    <td>{{ $item->TipoDocumento }}</td>
                    <td>{{ $item->Correo }}</td>
                    <td>{{ $item->Telefono }}</td>
                    <td class="d-flex gap-2">
                        {{-- Botón Editar --}}
                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#EditarModal"
                            data-id="{{ $item->ID_TECNICOS }}"
                            data-nombre="{{ $item->Nombre }}"
                            data-tipo="{{ $item->TipoDocumento }}"
                            data-correo="{{ $item->Correo }}"
                            data-telefono="{{ $item->Telefono }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('tecnicos.destroy', $item->ID_TECNICOS) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
    </div>
@else
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle"></i> No hay técnicos registrados.
    </div>
@endif

{{-- Inclusión de los modales --}}
@include('tecnicos.modals')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var nombre = button.getAttribute('data-nombre');
        var tipo = button.getAttribute('data-tipo');
        var correo = button.getAttribute('data-correo');
        var telefono = button.getAttribute('data-telefono');

        document.getElementById('editID_TECNICOS').value = id;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editTipoDocumento').value = tipo;
        document.getElementById('editCorreo').value = correo;
        document.getElementById('editTelefono').value = telefono;

        var form = document.getElementById('editForm');
        form.action = '/tecnicos/' + id;
    });
});
</script>
@endpush
