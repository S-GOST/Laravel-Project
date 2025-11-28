{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-file-circle-plus me-2"></i> Crear Orden de Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('orden_servicio.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Orden</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Técnico</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_TECNICOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Moto</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-primary shadow-sm" name="Estado" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Estimada</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_estimada" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Fin</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_fin">
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- MODAL EDITAR --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Orden de Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Orden</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Técnico</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_TECNICOS" name="ID_TECNICOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Moto</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_MOTOS" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-success shadow-sm" id="editEstado" name="Estado" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_inicio" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Estimada</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_estimada" name="Fecha_estimada" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha Fin</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_fin" name="Fecha_fin">
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-success fw-bold">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar cambios
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {

    var modal = document.getElementById('EditarModal');

    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        document.getElementById('editID_ORDEN_SERVICIO').value = button.getAttribute('data-id');
        document.getElementById('editID_CLIENTES').value       = button.getAttribute('data-cliente');
        document.getElementById('editID_ADMINISTRADOR').value  = button.getAttribute('data-admin');
        document.getElementById('editID_TECNICOS').value       = button.getAttribute('data-tecnico');
        document.getElementById('editID_MOTOS').value          = button.getAttribute('data-moto');
        document.getElementById('editFecha_inicio').value      = button.getAttribute('data-inicio');
        document.getElementById('editFecha_estimada').value    = button.getAttribute('data-estimada');
        document.getElementById('editFecha_fin').value         = button.getAttribute('data-fin');
        document.getElementById('editEstado').value            = button.getAttribute('data-estado');

        document.getElementById('editForm').action = '/orden_servicio/' + button.getAttribute('data-id');
    });

    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de eliminar esta orden?')) {
            event.preventDefault();
        }
    };
});
</script>
