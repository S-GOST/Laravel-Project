@extends('layouts.panel')

@section('content')
<div class="container-fluid mt-4">
    <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            
            {{-- 🔹 Título principal --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">
                    <i class="fa-solid fa-file-contract me-2"></i> Módulo Orden de Servicio
                </h3>
                <button type="button" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>
            </div>
            <hr class="border-secondary">

            {{-- ✅ Mensajes --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
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
            <form action="{{ url('/orden_servicio') }}" method="GET" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-secondary text-light border-0">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control border-0" name="search" value="{{ request('search') }}"
                                   placeholder="Buscar por cliente o técnico...">
                        </div>
                    </div>

                    <div class="col-md-4 text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-3">
                            <i class="fas fa-search-plus"></i> Buscar
                        </button>
                        <a href="{{ url('/orden_servicio') }}" class="btn btn-warning rounded-pill px-3">
                            <i class="fas fa-list"></i> Restaurar
                        </a>
                    </div>
                </div>
            </form>

            {{-- 📋 Tabla de datos --}}
            @if(isset($datos) && $datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-hover table-bordered align-middle text-center shadow-sm">
                        <thead class="table-light text-dark">
                            <tr>
                                <th>ID_OS</th>
                                <th>Cliente</th>
                                <th>Administrador</th>
                                <th>Técnico</th>
                                <th>Moto</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Estimada</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{ $item->ID_ORDEN_SERVICIO }}</td>
                                    <td>{{ $item->ID_CLIENTES }}</td>
                                    <td>{{ $item->ID_ADMINISTRADOR }}</td>
                                    <td>{{ $item->ID_TECNICOS }}</td>
                                    <td>{{ $item->ID_MOTOS }}</td>
                                    <td>{{ $item->Fecha_inicio }}</td>
                                    <td>{{ $item->Fecha_estimada }}</td>
                                    <td>{{ $item->Fecha_fin }}</td>
                                    <td>
                                        @if ($item->Estado === 'Finalizado')
                                            <span class="badge bg-success px-3 py-2">{{ $item->Estado }}</span>
                                        @elseif ($item->Estado === 'En proceso')
                                            <span class="badge bg-warning text-dark px-3 py-2">{{ $item->Estado }}</span>
                                        @else
                                            <span class="badge bg-secondary px-3 py-2">{{ $item->Estado }}</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center gap-2">
                                        {{-- ✏️ Editar --}}
                                        <button
                                            type="button"
                                            class="btn btn-success btn-sm rounded-circle"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditarModal"
                                            data-id="{{ $item->ID_ORDEN_SERVICIO }}"
                                            data-idcliente="{{ $item->ID_CLIENTES }}"
                                            data-idadmin="{{ $item->ID_ADMINISTRADOR }}"
                                            data-idtecnico="{{ $item->ID_TECNICOS }}"
                                            data-idmoto="{{ $item->ID_MOTOS }}"
                                            data-fechainicio="{{ $item->Fecha_inicio }}"
                                            data-fechaestimada="{{ $item->Fecha_estimada }}"
                                            data-fechafin="{{ $item->Fecha_fin }}"
                                            data-estado="{{ $item->Estado }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        {{-- 🗑️ Eliminar --}}
                                        <form action="{{ route('orden_servicio.destroy', $item->ID_ORDEN_SERVICIO) }}" 
                                              method="POST" 
                                              onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle me-2"></i> No hay órdenes de servicio registradas.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

{{-- 🔹 Incluye los modales --}}
@include('orden_servicio.modals')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var idCliente = button.getAttribute('data-idcliente');
        var idAdmin = button.getAttribute('data-idadmin');
        var idTecnico = button.getAttribute('data-idtecnico');
        var idMoto = button.getAttribute('data-idmoto');
        var fechaInicio = button.getAttribute('data-fechainicio');
        var fechaEstimada = button.getAttribute('data-fechaestimada');
        var fechaFin = button.getAttribute('data-fechafin');
        var estado = button.getAttribute('data-estado');

        document.getElementById('editID_ORDEN_SERVICIO').value = id;
        document.getElementById('editID_CLIENTES').value = idCliente;
        document.getElementById('editID_ADMINISTRADOR').value = idAdmin;
        document.getElementById('editID_TECNICOS').value = idTecnico;
        document.getElementById('editID_MOTOS').value = idMoto;
        document.getElementById('editFecha_inicio').value = fechaInicio ? formatDateTimeLocal(fechaInicio) : '';
        document.getElementById('editFecha_estimada').value = fechaEstimada ? formatDateTimeLocal(fechaEstimada) : '';
        document.getElementById('editFecha_fin').value = fechaFin ? formatDateTimeLocal(fechaFin) : '';
        document.getElementById('editEstado').value = estado;

        var form = document.getElementById('editForm');
        form.action = '/orden_servicio/' + id;
    });

    function formatDateTimeLocal(dateTimeStr) {
        if (!dateTimeStr) return '';
        return dateTimeStr.replace(' ', 'T').substring(0, 16);
    }

    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar esta orden de servicio?')) {
            event.preventDefault();
        }
    };
});
</script>
@endpush
