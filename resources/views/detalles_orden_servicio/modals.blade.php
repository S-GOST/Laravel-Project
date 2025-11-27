{{-- ✅ MODAL AGREGAR DETALLE DE ORDEN DE SERVICIO --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-plus me-2"></i> Agregar Detalle de Orden
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('detalles_orden_servicio.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Detalle Orden Servicio</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_DETALLES_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Orden Servicio</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ORDEN_SERVICIO" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Servicio</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_SERVICIOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Producto</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_PRODUCTOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Garantia" placeholder="Ejemplo: 6 meses" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-primary shadow-sm" name="Estado" required>
                                <option value="">[Seleccione]</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completado">Completado</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text bg-secondary text-white border-0">$</span>
                            <input type="number" step="0.01" class="form-control border-primary shadow-sm" name="Precio" required>
                        </div>
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


{{-- ✅ MODAL EDITAR DETALLE DE ORDEN DE SERVICIO --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Detalle de Orden
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Detalle Orden Servicio</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_DETALLES_ORDEN_SERVICIO" name="ID_DETALLES_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Orden Servicio</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Servicio</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_SERVICIOS" name="ID_SERVICIOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Producto</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_PRODUCTOS" name="ID_PRODUCTOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editGarantia" name="Garantia" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-success shadow-sm" id="editEstado" name="Estado" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completado">Completado</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text bg-secondary text-white border-0">$</span>
                            <input type="number" step="0.01" class="form-control border-success shadow-sm" id="editPrecio" name="Precio" required>
                        </div>
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

{{-- ✅ SCRIPT PARA LLENAR AUTOMÁTICAMENTE EL MODAL DE EDICIÓN --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Extraer datos del botón
        var id_detalle = button.getAttribute('data-id_detalle');
        var id_orden = button.getAttribute('data-id_orden');
        var id_servicio = button.getAttribute('data-id_servicio');
        var id_producto = button.getAttribute('data-id_producto');
        var garantia = button.getAttribute('data-garantia');
        var estado = button.getAttribute('data-estado');
        var precio = button.getAttribute('data-precio');

        // Llenar los campos del modal
        document.getElementById('editID_DETALLES_ORDEN_SERVICIO').value = id_detalle;
        document.getElementById('editID_ORDEN_SERVICIO').value = id_orden;
        document.getElementById('editID_SERVICIOS').value = id_servicio;
        document.getElementById('editID_PRODUCTOS').value = id_producto;
        document.getElementById('editGarantia').value = garantia;
        document.getElementById('editEstado').value = estado;
        document.getElementById('editPrecio').value = precio;

        // Definir la acción del formulario con la ruta correcta
        var form = document.getElementById('editForm');
        form.action = '{{ route("detalles_orden_servicio.update", ":id") }}'.replace(':id', id_detalle);
    });
});
</script>
@endpush
