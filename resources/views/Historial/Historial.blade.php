@extends('layouts.panel')

@section('content')
<div class="container-fluid mt-4">
    <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            
            {{-- 🔹 Encabezado --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">
                    <i class="fa-solid fa-clock-rotate-left me-2"></i> Módulo Historial
                </h3>
                <button type="button" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>
            </div>
            <hr class="border-secondary">

            {{-- ✅ Mensajes --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-solid fa-circle-xmark me-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- 🔍 Buscador --}}
            <form action="{{ url('/historial') }}" method="GET" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-secondary text-light border-0">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control border-0" name="search" value="{{ request('search') }}"
                                   placeholder="Buscar por ID del historial...">
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-3">
                            <i class="fas fa-search-plus"></i> Buscar
                        </button>
                        <a href="{{ url('/historial') }}" class="btn btn-warning rounded-pill px-3">
                            <i class="fas fa-list"></i> Restaurar
                        </a>
                    </div>
                </div>
            </form>

            {{-- 📋 Tabla --}}
            @if(isset($datos) && $datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-hover table-bordered align-middle text-center shadow-sm">
                        <thead class="table-warning text-dark">
                            <tr>
                                <th>ID Historial</th>
                                <th>ID Orden Servicio</th>
                                <th>ID Comprobante</th>
                                <th>ID Informe</th>
                                <th>ID Técnico</th>
                                <th>ID Cliente</th>
                                <th>Descripción</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_HISTORIAL }}</td>
                                    <td>{{ $item->ID_ORDEN_SERVICIO }}</td>
                                    <td>{{ $item->ID_COMPROBANTE }}</td>
                                    <td>{{ $item->ID_INFORME }}</td>
                                    <td>{{ $item->ID_TECNICOS }}</td>
                                    <td>{{ $item->ID_CLIENTES }}</td>
                                    <td>{{ $item->Descripcion }}</td>
                                    <td>{{ $item->Fecha_registro }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        {{-- ✏️ Editar --}}
                                        <button
                                            type="button"
                                            class="btn btn-success btn-sm rounded-circle"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditarModal"
                                            data-idh="{{ $item->ID_HISTORIAL }}"
                                            data-ido="{{ $item->ID_ORDEN_SERVICIO }}"
                                            data-idc="{{ $item->ID_COMPROBANTE }}"
                                            data-idi="{{ $item->ID_INFORME }}"
                                            data-idt="{{ $item->ID_TECNICOS }}"
                                            data-idcl="{{ $item->ID_CLIENTES }}"
                                            data-descripcion="{{ $item->Descripcion }}"
                                            data-fecha="{{ $item->Fecha_registro }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑️ Eliminar --}}
                                        <form action="{{ route('historial.destroy', $item->ID_HISTORIAL) }}" method="POST" onsubmit="return confirmarEliminar(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
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
                <div class="alert alert-info text-center mt-4 shadow-sm">
                    <i class="fas fa-info-circle me-2"></i> No hay historiales registrados.
                </div>
            @endif
        </div>
    </div>
</div>

@include('historial.modals')

@endsection
