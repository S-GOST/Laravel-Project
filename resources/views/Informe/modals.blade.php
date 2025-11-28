{{-- ✅ MODAL AGREGAR INFORME --}}
<div class="modal fade" id="AgregarModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-file-circle-plus me-2"></i> Crear Informe
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('informe.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Informe</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_INFORME" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Detalle Orden</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_DETALLES_ORDEN_SERVICIO" required>
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

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descripción</label>
                        <textarea class="form-control border-primary shadow-sm" name="Descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Fecha</label>
                        <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Estado</label>
                        <select class="form-select border-primary shadow-sm" name="Estado" required>
                            <option value="">[Seleccione]</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-3">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
{{-- ✅ MODAL EDITAR INFORME --}}
<div class="modal fade" id="EditarModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-file-pen me-2"></i> Editar Informe
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Informe</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_INFORME" name="ID_INFORME" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Detalle Orden</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_DETALLES_ORDEN_SERVICIO" name="ID_DETALLES_ORDEN_SERVICIO" required>
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

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descripción</label>
                        <textarea class="form-control border-success shadow-sm" id="editDescripcion" name="Descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Fecha</label>
                        <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha" name="Fecha" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Estado</label>
                        <select class="form-select border-success shadow-sm" id="editEstado" name="Estado" required>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-success rounded-pill px-3">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {

    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var idi = button.getAttribute('data-idi');
        var idd = button.getAttribute('data-idd');
        var ida = button.getAttribute('data-ida');
        var idt = button.getAttribute('data-idt');
        var descripcion = button.getAttribute('data-descripcion');
        var fecha = button.getAttribute('data-fecha');
        var estado = button.getAttribute('data-estado');

        document.getElementById('editID_INFORME').value = idi;
        document.getElementById('editID_DETALLES_ORDEN_SERVICIO').value = idd;
        document.getElementById('editID_ADMINISTRADOR').value = ida;
        document.getElementById('editID_TECNICOS').value = idt;
        document.getElementById('editDescripcion').value = descripcion;
        document.getElementById('editFecha').value = fecha.replace(" ", "T");
        document.getElementById('editEstado').value = estado;

        document.getElementById('editForm').action = "/informe/" + idi;
    });

    window.confirmarEliminar = function(event) {
        if (!confirm("¿Estás seguro de eliminar este informe?")) {
            event.preventDefault();
        }
    };

});
</script>
