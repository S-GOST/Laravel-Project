@extends('layouts.panel')

@section('content')

<h3 class="text-light">Módulo Clientes</h3>
<hr>

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
            <a href="{{ url('/clientes') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
        </div>
    </div>
</form>

@if($datos->count() > 0)
    <table class="table table-dark table-bordered table-striped">
        <thead class="table-primary">
        <tr>
            <th>ID_CLIENTES</th>
            <th>Ubicacion</th>
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
                <td>{{ $item->Ubicacion }}</td>
                <td>{{ $item->Nombre }}</td>
                <td>{{ $item->TipoDocumento }}</td>
                <td>{{ $item->Correo }}</td>
                <td>{{ $item->Telefono }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('vermotosCliente', $item->ID_CLIENTES) }}" 
                       class="btn btn-info btn-sm">
                        <i class="fa-solid fa-motorcycle"></i> 
                    </a>

                    <button
                        type="button"
                        class="btn btn-success btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#EditarModal"
                        data-idc="{{ $item->ID_CLIENTES }}"
                        data-ubicacion="{{ $item->Ubicacion }}"
                        data-nombre="{{ $item->Nombre }}"
                        data-tipo="{{ $item->TipoDocumento }}"
                        data-correo="{{ $item->Correo }}"
                        data-telefono="{{ $item->Telefono }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <form action="{{ route('clientes.destroy', $item->ID_CLIENTES) }}" method="POST"
                          onsubmit="return confirmarEliminar(event)">
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
        <i class="fas fa-info-circle"></i> No hay clientes registrados.
    </div>
@endif

@include('clientes.modals')

@endsection
