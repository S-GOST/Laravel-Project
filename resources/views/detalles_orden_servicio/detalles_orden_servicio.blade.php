@extends('layouts.panel')

@section('content')

<div class="container-fluid mt-4">
    <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
        <div class="card-body p-4">

            {{-- 🔹 Título y botón nuevo --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">
                    <i class="fa-solid fa-clipboard-list me-2"></i>
                    Módulo Detalles de Orden de Servicio
                </h3>

                <button type="button" class="btn btn-primary rounded-pill px-4"
                        data-bs-toggle="modal" data-bs-target="#AgregarModal">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>
            </div>

            <hr class="border-secondary">

            {{-- ✔ Mensajes --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-solid fa-circle-xmark me-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- 🔍 Buscar --}}
            <form action="{{ url('/detalles_orden_servicio') }}" method="GET" class="mb-4">
                <div class="row g-2 align-items-center">

                    <div class="col-md-8">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-secondary text-light border-0">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text"
                                   class="form-control border-0"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Buscar por ID detalle, ID orden, servicio...">
                        </div>
                    </div>

                    <div class="col-md-4 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-4">
                            <i class="fas fa-search-plus"></i> Buscar
                        </button>

                        <a href="{{ url('/detalles_orden_servicio') }}"
                           class="btn btn-warning rounded-pill px-4">
                            <i class="fas fa-list"></i> Restaurar
                        </a>
                    </div>

                </div>
            </form>

            {{-- 📋 Tabla --}}
            @if(isset($datos) && $datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-bordered table-hover align-middle text-center shadow-sm">
                        <thead class="table-primary text-dark">
                            <tr>
                                <th>ID Detalle</th>
                                <th>ID Orden</th>
                                <th>Servicio</th>
                                <th>Producto</th>
                                <th>Garantía</th>
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

                                    <td>
                                        @if ($item->Estado === 'Finalizado')
                                            <span class="badge bg-success px-3 py-2">{{ $item->Estado }}</span>
                                        @elseif ($item->Estado === 'Pendiente')
                                            <span class="badge bg-warning text-dark px-3 py-2">{{ $item->Estado }}</span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2">{{ $item->Estado }}</span>
                                        @endif
                                    </td>

                                    <td><strong>{{ number_format($item->Precio, 2) }}$</strong></td>

                                    <td class="d-flex justify-content-center gap-2">

                                        {{-- 🖊 Editar --}}
                                            <button type="button"
                                                class="btn btn-success btn-sm d-flex justify-content-center align-items-center"
                                                style="width:32px; height:32px;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#EditarModal"
                                                data-idd="{{ $item->ID_DETALLES_ORDEN_SERVICIO }}"
                                                data-ido="{{ $item->ID_ORDEN_SERVICIO }}"
                                                data-ids="{{ $item->ID_SERVICIOS }}"
                                                data-idp="{{ $item->ID_PRODUCTOS }}"
                                                data-garantia="{{ $item->Garantia }}"
                                                data-estado="{{ $item->Estado }}"
                                                data-precio="{{ $item->Precio }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑 Eliminar --}}
                                        <form action="{{ route('detalles_orden_servicio.destroy', $item->ID_DETALLES_ORDEN_SERVICIO) }}"
                                              method="POST"
                                              onsubmit="return confirmarEliminar(event)">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
                                                    style="width:32px; height:32px;">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- 🔹 Paginación --}}
                    <div class="mt-3">
                        {{ $datos->links() }}
                    </div>

                </div>
            @else
                <div class="alert alert-info text-center mt-3">
                    <i class="fas fa-info-circle"></i> No hay detalles registrados.
                </div>
            @endif

        </div>
    </div>
</div>

@include('detalles_orden_servicio.modals')

@endsection




