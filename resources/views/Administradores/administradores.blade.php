@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Administrador</h3>
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
<form action="{{ url('/administradores') }}" method="GET">
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
            <a href="{{ url('/administradores') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
        </div>
    </div>
</form>

{{-- Sección de Tabla de Datos --}}
@if($datos->count() > 0)
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-striped">
            <thead class="table-primary">
            <tr>
                <th>ID_ADMINISTRADOR</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>TipoDocumento</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->ID_ADMINISTRADOR }}</td>
                    <td>{{ $item->Nombre }}</td>
                    <td>{{ $item->Correo }}</td>
                    <td>{{ $item->TipoDocumento }}</td>
                    <td>{{ $item->Telefono }}</td>
                    <td class="d-flex gap-2">
                        {{-- Botón Editar --}}
                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#EditarModal"
                            data-id="{{ $item->ID_ADMINISTRADOR }}"
                            data-nombre="{{ $item->Nombre }}"
                            data-correo="{{ $item->Correo }}"
                            data-tipo="{{ $item->TipoDocumento }}"
                            data-telefono="{{ $item->Telefono }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('administradores.destroy', $item->ID_ADMINISTRADOR) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
        <i class="fas fa-info-circle"></i> No hay administradores registrados.
    </div>
@endif

{{-- ⚠️ La inclusión del archivo de modales debe ser aquí o directamente en el layout si se usa en muchas vistas. --}}
{{-- El include es CORRECTO, pero NO debe haber código de Modals DENTRO de este archivo DESPUÉS del @endsection --}}
@include('administradores.modals')

@endsection

{{-- 
    ⚠️ NOTA: El código de los modales y el script de JavaScript 
    que estaban después de @endsection en tu prompt deben estar movidos 
    permanentemente al archivo administradores.modals.blade.php
    y en la sección @push('scripts') de este archivo (o del modals.blade.php), 
    respectivamente.
--}}