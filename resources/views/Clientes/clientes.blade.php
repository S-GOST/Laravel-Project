@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de Clientes</h1>
        <button type="button" class="btn btn-ktm" data-bs-toggle="modal" data-bs-target="#AgregarModal">
            <i class="fa-solid fa-plus me-2"></i> Nuevo Cliente
        </button>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card mb-4" style="background: var(--ktm-gray-light); border: 1px solid rgba(255, 109, 31, 0.2);">
        <div class="card-body">
            <form action="{{ route('admin.clientes.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Buscar cliente por nombre, DNI, teléfono..." 
                           value="{{ request('search') }}"
                           style="background: var(--ktm-gray); color: white; border: 1px solid rgba(255, 109, 31, 0.3);">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-ktm w-100">
                        <i class="fas fa-search me-2"></i> Buscar
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.clientes.index') }}" class="btn btn-ktm-outline w-100">
                        <i class="fas fa-rotate me-2"></i> Limpiar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
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

    <!-- Tabla de clientes -->
    @if($datos->count() > 0)
        <div class="card" style="background: var(--ktm-gray-light); border: 1px solid rgba(255, 109, 31, 0.2);">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-ktm table-hover">
                        <thead>
                            <tr>
                                <th>ID_CLIENTES</th>
                                <th>Ubicación</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Tipo Documento</th>
                                <th>Teléfono</th>
                                <th class="text-center" style="width: 200px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_CLIENTES }}</td>
                                    <td>{{ $item->Ubicacion }}</td>
                                    <td>{{ $item->Nombre }}</td>
                                    <td>{{ $item->Correo }}</td>
                                    <td>{{ $item->TipoDocumento }}</td>
                                    <td>{{ $item->Telefono }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Botón Editar --}}
                                            <button
                                                type="button"
                                                class="btn btn-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#EditarModal"
                                                data-id="{{ $item->ID_CLIENTES }}"
                                                data-ubicacion="{{ $item->Ubicacion }}"
                                                data-nombre="{{ $item->Nombre }}"
                                                data-correo="{{ $item->Correo }}"
                                                data-tipo="{{ $item->TipoDocumento }}"
                                                data-telefono="{{ $item->Telefono }}"
                                                data-usuario="{{ $item->usuario }}"
                                                title="Editar">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            {{-- Botón Ver Motos --}}
                                            <a href="{{ route('admin.clientes.motos', $item->ID_CLIENTES) }}" 
                                               class="btn btn-primary btn-sm" 
                                               title="Ver Motos">
                                                <i class="fas fa-motorcycle"></i>
                                            </a>

                                            {{-- Botón Eliminar --}}
                                            <form action="{{ route('admin.clientes.destroy', $item->ID_CLIENTES) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirmarEliminar(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-3">
                    {{ $datos->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="card" style="background: var(--ktm-gray-light); border: 1px solid rgba(255, 109, 31, 0.2);">
            <div class="card-body text-center">
                <div class="alert alert-info" style="background: rgba(255, 109, 31, 0.1); border: none;">
                    <i class="fas fa-info-circle"></i> No hay clientes registrados.
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .table-ktm {
        background: var(--ktm-gray);
        color: white;
    }
    
    .table-ktm th {
        background: rgba(255, 109, 31, 0.3);
        color: white;
        border-bottom: 2px solid var(--ktm-orange);
        text-align: center;
    }
    
    .table-ktm td {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        vertical-align: middle;
        text-align: center;
    }
    
    .btn-sm {
        width: 35px;
        height: 35px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }
    
    .gap-2 {
        gap: 8px;
    }
</style>

<script>
function confirmarEliminar(event) {
    if (!confirm('¿Estás seguro de eliminar este cliente? Esta acción no se puede deshacer.')) {
        event.preventDefault();
        return false;
    }
    return true;
}
</script>

@include('Clientes.modals')
@endsection