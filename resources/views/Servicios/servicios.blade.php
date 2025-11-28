@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Servicios</h3>
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
            <form action="{{ url('/servicios') }}" method="GET">
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
                                   placeholder="Buscar por Nombre o Categoría">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/servicios') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- 📋 Tabla --}}
            @if($datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-bordered table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID_SERVICIOS</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Garantía</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_SERVICIOS }}</td>
                                    <td>{{ $item->Nombre }}</td>
                                    <td>{{ $item->Categoria }}</td>
                                    <td>{{ $item->Garantia }}</td>
                                    <td>{{ $item->Estado }}</td>
                                    <td>${{ number_format($item->Precio, 2) }}</td>
                                    <td class="text-center">
                                        {{-- ✏️ Editar --}}
                                        <button type="button" class="btn btn-success btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditarModal"
                                            data-ids="{{ $item->ID_SERVICIOS }}"
                                            data-nombre="{{ $item->Nombre }}"
                                            data-categoria="{{ $item->Categoria }}"
                                            data-garantia="{{ $item->Garantia }}"
                                            data-estado="{{ $item->Estado }}"
                                            data-precio="{{ $item->Precio }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑️ Eliminar --}}
                                        <form action="{{ route('servicios.destroy', $item->ID_SERVICIOS) }}" method="POST" class="d-inline" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle"></i> No hay servicios registrados.
                </div>
        </div>
    </div>
</div>

@endif

@include('servicios.modals')

@endsection

