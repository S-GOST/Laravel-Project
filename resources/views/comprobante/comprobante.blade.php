@extends('layouts.panel')

@section('content')
<div class="container-fluid mt-4">
    <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
        <div class="card-body p-4">

            {{-- 🔹 Título y botón nuevo --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">
                    <i class="fa-solid fa-file-invoice-dollar me-2"></i> Módulo Comprobante
                </h3>
                <button type="button" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>
            </div>
            <hr class="border-secondary">

            {{-- ✅ Mensajes de éxito o error --}}
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
            <form action="{{ url('/comprobante') }}" method="GET" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-secondary text-light border-0">
                                <i class="fas fa-search"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control border-0" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Buscar por ID o comprobante...">
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-3">
                            <i class="fas fa-search-plus"></i> Buscar
                        </button>
                        <a href="{{ url('/comprobante') }}" class="btn btn-warning rounded-pill px-3">
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
                                <th>ID Comprobante</th>
                                <th>ID Informe</th>
                                <th>ID Cliente</th>
                                <th>ID Administrador</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Estado Pago</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_COMPROBANTE }}</td>
                                    <td>{{ $item->ID_INFORME }}</td>
                                    <td>{{ $item->ID_CLIENTES }}</td>
                                    <td>{{ $item->ID_ADMINISTRADOR }}</td>
                                    <td><strong>{{ $item->Monto }}$</strong></td>
                                    <td>{{ $item->Fecha }}</td>
                                    <td>
                                        @if ($item->Estado_pago === 'Pagado')
                                            <span class="badge bg-success px-3 py-2">{{ $item->Estado_pago }}</span>
                                        @elseif ($item->Estado_pago === 'Pendiente')
                                            <span class="badge bg-warning text-dark px-3 py-2">{{ $item->Estado_pago }}</span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2">{{ $item->Estado_pago }}</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center gap-2">
                                        {{-- ✏️ Editar --}}
                                        <button 
                                            type="button" 
                                            class="btn btn-success btn-sm rounded-circle"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditarModal"
                                            data-idc="{{ $item->ID_COMPROBANTE }}"
                                            data-idi="{{ $item->ID_INFORME }}"
                                            data-idcl="{{ $item->ID_CLIENTES }}"
                                            data-ida="{{ $item->ID_ADMINISTRADOR }}"
                                            data-monto="{{ $item->Monto }}"
                                            data-fecha="{{ $item->Fecha }}"
                                            data-estado="{{ $item->Estado_pago }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑️ Eliminar --}}
                                        <form action="{{ route('comprobante.destroy', $item->ID_COMPROBANTE) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle me-2"></i> No hay comprobantes registrados.
                </div>
            @endif
        </div>
    </div>
</div>

{{-- 🔹 Modales (archivo aparte) --}}
@include('comprobante.modals')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        
        const idc = button.getAttribute('data-idc');
        const idi = button.getAttribute('data-idi');
        const idcl = button.getAttribute('data-idcl');
        const ida = button.getAttribute('data-ida');
        const monto = button.getAttribute('data-monto');
        const fecha = button.getAttribute('data-fecha');
        const estado = button.getAttribute('data-estado');

        document.getElementById('editID_COMPROBANTE').value = idc;
        document.getElementById('editID_INFORME').value = idi;
        document.getElementById('editID_CLIENTES').value = idcl;
        document.getElementById('editID_ADMINISTRADOR').value = ida;
        document.getElementById('editMonto').value = monto;
        document.getElementById('editFecha').value = fecha.replace(' ', 'T').substring(0, 16);
        document.getElementById('editEstado_pago').value = estado;

        document.getElementById('editForm').action = '/comprobante/' + idc;
    });

    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de eliminar este comprobante?')) {
            event.preventDefault();
        }
    };
});
</script>
@endpush
