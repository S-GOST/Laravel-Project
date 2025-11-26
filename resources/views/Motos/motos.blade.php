@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Motos</h3>
<hr>

{{-- ✅ Sección de Mensajes (Alertas) --}}
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

{{-- 🔍 Búsqueda y botón nuevo --}}
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
                       placeholder="Buscar por ID o Placa">
            </div>
        </div>

        <div class="col-md-6 text-end">
            <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
            <a href="{{ url('/motos') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
        </div>
    </div>
</form>

{{-- 📋 Tabla de datos --}}
@if($datos->count() > 0)
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-striped">
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
                    <td>{{ $item->Recorrido }} km</td>
                    <td class="d-flex gap-2">
                        {{-- ✏️ Botón Editar --}}
                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#EditarModal"
                            data-idm="{{ $item->ID_MOTOS }}"
                            data-idc="{{ $item->ID_CLIENTES }}"
                            data-placa="{{ $item->Placa }}"
                            data-modelo="{{ $item->Modelo }}"
                            data-marca="{{ $item->Marca }}"
                            data-recorrido="{{ $item->Recorrido }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        {{-- 🗑️ Botón Eliminar --}}
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
    </div>
@else
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle"></i> No hay motos registradas.
    </div>
@endif

{{-- 📦 Inclusión de los modales --}}
@include('motos.modals')

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editarModal = document.getElementById('EditarModal');

        editarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            // Obtener datos
            var idM = button.getAttribute('data-idm');
            var idC = button.getAttribute('data-idc');
            var placa = button.getAttribute('data-placa');
            var modelo = button.getAttribute('data-modelo');
            var marca = button.getAttribute('data-marca');
            var recorrido = button.getAttribute('data-recorrido');

            // Asignar valores
            document.getElementById('editID_MOTOS').value = idM;
            document.getElementById('editID_CLIENTES').value = idC;
            document.getElementById('editPlaca').value = placa;
            document.getElementById('editModelo').value = modelo;
            document.getElementById('editMarca').value = marca;
            document.getElementById('editRecorrido').value = recorrido;

            // Cambiar acción del formulario
            var form = document.getElementById('editForm');
            form.action = '{{ url('motos') }}/' + idM;
        });
    });
    </script>
    @endpush