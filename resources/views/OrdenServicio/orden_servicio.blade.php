@extends('layouts.panel')

@section('content')

<style>
/* Estilos para el módulo orden_servicio, siguiendo el formato de Módulo Productos */
.card {
    /* Mantener el color de la tarjeta de tu HTML original */
    background-color: #E67514;
    color: #000000; /* Texto oscuro para la tarjeta naranja */
}
/* La plantilla 'layouts.panel' probablemente maneja el fondo oscuro del body. */
/* Ajuste para el texto dentro de la tarjeta */
.card-body h3, .card-body hr {
    color: #000000;
}
/* Asegurar que los inputs en la búsqueda tengan contraste */
.input-group-text {
    background-color: #f8f9fa; /* Fondo claro para el icono de búsqueda */
    color: #495057;
}
/* Tabla con colores adaptados para el fondo oscuro del panel */
.table-primary {
    background-color: #0d6efd; /* Azul Bootstrap por defecto */
    color: #ffffff;
}
.table-hover tbody tr:hover {
    --bs-table-hover-bg: rgba(0, 0, 0, 0.1);
}
</style>

<h3 class="text-light">Módulo orden_servicio</h3>
<hr>

<div class="container-fluid mt-3">
    <div class="card shadow-lg">
        <div class="card-body" style="width: 100%;"> {{-- Ancho ajustado a 100% para ser responsivo --}}

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
            <form action="{{ url('/orden_servicio') }}" method="GET">
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
                                placeholder="Buscar por cliente o técnico">
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                        <a href="{{ url('/orden_servicio') }}" class="btn btn-warning"><i class="fas fa-list"></i> Restaurar</a>
                    </div>
                </div>
            </form>

            {{-- 📋 Tabla --}}
            @if(isset($datos) && $datos->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-primary">
                        <tr>
                            <th>ID_OS</th>
                            <th>ID_CLIENTES</th>
                            <th>ID_ADMIN</th>
                            <th>ID_TECNICOS</th>
                            <th>ID_MOTOS</th>
                            <th>Fecha_inicio</th>
                            <th>Fecha_estimada</th>
                            <th>Fecha_fin</th>
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
                                <td>{{ $item->Estado }}</td>
                                <td class="d-flex gap-2">
                                    {{-- ✏️ Botón Editar --}}
                                    <button
                                        type="button"
                                        class="btn btn-success btn-sm"
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

                                    {{-- 🗑️ Botón Eliminar --}}
                                    <form action="{{ route('orden_servicio.destroy', $item->ID_ORDEN_SERVICIO) }}" method="POST" onsubmit="return confirmarEliminar(event)">
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
                    <i class="fas fa-info-circle"></i> No hay orden_servicio registradas.
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Obtener todos los data-attributes
        var id = button.getAttribute('data-id');
        var idCliente = button.getAttribute('data-idcliente');
        var idAdmin = button.getAttribute('data-idadmin');
        var idTecnico = button.getAttribute('data-idtecnico');
        var idMoto = button.getAttribute('data-idmoto');
        var fechaInicio = button.getAttribute('data-fechainicio');
        var fechaEstimada = button.getAttribute('data-fechaestimada');
        var fechaFin = button.getAttribute('data-fechafin');
        var estado = button.getAttribute('data-estado');

        // Asignar valores a los campos del modal de edición
        document.getElementById('editID_ORDEN_SERVICIO').value = id;
        document.getElementById('editID_CLIENTES').value = idCliente;
        document.getElementById('editID_ADMINISTRADOR').value = idAdmin;
        document.getElementById('editID_TECNICOS').value = idTecnico;
        document.getElementById('editID_MOTOS').value = idMoto;
        // Las fechas deben ser formateadas si vienen de la base de datos como datetime completo.
        // Si vienen en formato 'YYYY-MM-DD HH:MM:SS', se necesita formatear a 'YYYY-MM-DDTHH:MM' para datetime-local.
        document.getElementById('editFecha_inicio').value = fechaInicio ? formatDateTimeLocal(fechaInicio) : '';
        document.getElementById('editFecha_estimada').value = fechaEstimada ? formatDateTimeLocal(fechaEstimada) : '';
        document.getElementById('editFecha_fin').value = fechaFin ? formatDateTimeLocal(fechaFin) : '';
        document.getElementById('editEstado').value = estado;

        // Establecer la acción del formulario
        var form = document.getElementById('editForm');
        form.action = '/orden_servicio/' + id;
    });

    // Función para formatear fechas a YYYY-MM-DDTHH:MM, requerido por input[type=datetime-local]
    function formatDateTimeLocal(dateTimeStr) {
        if (!dateTimeStr) return '';
        // Asume formato 'YYYY-MM-DD HH:MM:SS' y lo convierte a 'YYYY-MM-DDTHH:MM'
        return dateTimeStr.replace(' ', 'T').substring(0, 16);
    }

    // Confirmación de eliminación
    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar esta orden de servicio?')) {
            event.preventDefault();
        }
    };
});
</script>
@endpush