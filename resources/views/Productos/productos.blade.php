@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Productos</h3>
<hr>

<div class="container-fluid mt-3">
    <div class="card bg-dark text-light shadow-lg">
        <div class="card-body">

            {{-- ✅ Mensajes --}}
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

            {{-- 🔍 Buscar --}}
            <form action="{{ url('/productos') }}" method="GET">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <i class="fa-solid fa-plus"></i> Nuevo
                    </button>
                </div>

                <div class="row g-2 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-secondary text-light"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                                   placeholder="Buscar por Nombre o Marca">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/productos') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- 📋 Tabla --}}
            @if($datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-bordered table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID_PRODUCTOS</th>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>Nombre</th>
                                <th>Garantía</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_PRODUCTOS }}</td>
                                    <td>{{ $item->Categoria }}</td>
                                    <td>{{ $item->Marca }}</td>
                                    <td>{{ $item->Nombre }}</td>
                                    <td>{{ $item->Garantia }}</td>
                                    <td>${{ number_format($item->Precio, 2) }}</td>
                                    <td>{{ $item->Cantidad }}</td>
                                    <td>{{ $item->Estado }}</td>
                                    <td class="text-center">
                                        {{-- ✏️ Editar --}}
                                        <button
                                            type="button"
                                            class="btn btn-success btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditarModal"
                                            data-idp="{{ $item->ID_PRODUCTOS }}"
                                            data-categoria="{{ $item->Categoria }}"
                                            data-marca="{{ $item->Marca }}"
                                            data-nombre="{{ $item->Nombre }}"
                                            data-garantia="{{ $item->Garantia }}"
                                            data-precio="{{ $item->Precio }}"
                                            data-cantidad="{{ $item->Cantidad }}"
                                            data-estado="{{ $item->Estado }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑️ Eliminar --}}
                                        <form action="{{ route('productos.destroy', $item->ID_PRODUCTOS) }}" method="POST" class="d-inline" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle"></i> No hay productos registrados.
                </div>
            @endif

        </div>
    </div>
</div>

{{-- 📦 Modales externos --}}
@include('productos.modals')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var idP = button.getAttribute('data-idp');
        var categoria = button.getAttribute('data-categoria');
        var marca = button.getAttribute('data-marca');
        var nombre = button.getAttribute('data-nombre');
        var garantia = button.getAttribute('data-garantia');
        var precio = button.getAttribute('data-precio');
        var cantidad = button.getAttribute('data-cantidad');
        var estado = button.getAttribute('data-estado');

        document.getElementById('editID_PRODUCTOS').value = idP;
        document.getElementById('editCategoria').value = categoria;
        document.getElementById('editMarca').value = marca;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editGarantia').value = garantia;
        document.getElementById('editPrecio').value = precio;
        document.getElementById('editCantidad').value = cantidad;
        document.getElementById('editEstado').value = estado;

        document.getElementById('editForm').action = '/productos/' + idP;
    });

    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            event.preventDefault();
        }
    };
});
</script>
@endpush
