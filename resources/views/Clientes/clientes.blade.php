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
    <div class="card" style="background: var(--ktm-gray-light); border: 1px solid rgba(255, 109, 31, 0.2);">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-ktm table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>TipoDocumento</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            
                            <th class="text-center" style="width: 150px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datos as $cliente)
                        <tr>
                            <td>{{ $cliente->ID_CLIENTES }}</td>
                            <td>{{ $cliente->Ubicacion }}</td>
                            <td>{{ $cliente->Nombre }}</td>
                            <td>{{ $cliente->TipoDocumento }}</td>
                            <td>{{ $cliente->Correo }}</td>
                            <td>{{ $cliente->Telefono }}</td>
                         
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Botón Editar -->
                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditarModal"
                                        data-id="{{ $cliente->ID_CLIENTES }}"
                                        data-nombre="{{ $cliente->Nombre }}"
                                        data-tipodocumento="{{ $cliente->TipoDocumento }}"
                                        data-correo="{{ $cliente->Correo }}"
                                        data-telefono="{{ $cliente->Telefono }}"
                                        data-ubicacion="{{ $cliente->Ubicacion }}"
                                        title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <!-- Botón Ver Motos -->
                                    <a href="{{ route('admin.clientes.motos', $cliente->ID_CLIENTES) }}" 
                                       class="btn btn-primary btn-sm" title="Ver Motos">
                                        <i class="fas fa-motorcycle"></i>
                                    </a>
                                    
                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.clientes.destroy', $cliente->ID_CLIENTES) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('¿Estás seguro de eliminar este cliente?')"
                                                title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="alert alert-info" style="background: rgba(255, 109, 31, 0.1);">
                                    No se encontraron clientes
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="mt-3">
                {{ $datos->links() }}
            </div>
        </div>
    </div>
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
    }
    
    .table-ktm td {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        vertical-align: middle;
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
@endsection
@push('modals')
    @include('Clientes.modals')
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manejar el modal de edición
    var editarModal = document.getElementById('EditarModal');
    
    if (editarModal) {
        editarModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            
            // Obtener datos del cliente
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');
            var tipoDocumento = button.getAttribute('data-tipodocumento');
            var correo = button.getAttribute('data-correo');
            var telefono = button.getAttribute('data-telefono');
            var ubicacion = button.getAttribute('data-ubicacion');
          
            
            // Asignar valores a los campos del formulario
            document.getElementById('editID_CLIENTES').value = id;
            document.getElementById('editNombre').value = nombre || '';
            document.getElementById('editTipoDocumento').value = tipoDocumento || '';
            document.getElementById('editCorreo').value = correo || '';
            document.getElementById('editTelefono').value = telefono || '';
            document.getElementById('editUbicacion').value = ubicacion || '';
    
            
            // Actualizar la acción del formulario
            var editForm = document.getElementById('editForm');
            var baseRoute = "{{ route('admin.clientes.update', ':id') }}";
            var finalRoute = baseRoute.replace(':id', encodeURIComponent(id));
            editForm.action = finalRoute;
            
            console.log('Ruta de actualización:', finalRoute);
        });
    }
    
    // Confirmación para eliminar
    var deleteForms = document.querySelectorAll('form[action*="destroy"]');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('¿Estás seguro de que deseas eliminar este cliente? Esta acción no se puede deshacer.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endpush