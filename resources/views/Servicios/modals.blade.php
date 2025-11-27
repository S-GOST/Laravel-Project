{{-- ✅ MODAL AGREGAR SERVICIO --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-wrench me-2"></i> Crear Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Servicio</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_SERVICIOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Nombre" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select class="form-select border-primary shadow-sm" name="Categoria" required>
                                <option value="">[Seleccione]</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Reparación">Reparación</option>
                                <option value="Instalación">Instalación</option>
                                <option value="Diagnóstico">Diagnóstico</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Garantia" placeholder="Ejemplo: 6 meses" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-primary shadow-sm" name="Estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white border-0">$</span>
                                <input type="number" step="0.01" class="form-control border-primary shadow-sm" name="Precio" required>
                            </div>
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


{{-- ✅ MODAL EDITAR SERVICIO --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Servicio</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_SERVICIOS" name="ID_SERVICIOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editNombre" name="Nombre" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select class="form-select border-success shadow-sm" id="editCategoria" name="Categoria" required>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Reparación">Reparación</option>
                                <option value="Instalación">Instalación</option>
                                <option value="Diagnóstico">Diagnóstico</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editGarantia" name="Garantia" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-success shadow-sm" id="editEstado" name="Estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white border-0">$</span>
                                <input type="number" step="0.01" class="form-control border-success shadow-sm" id="editPrecio" name="Precio" required>
                            </div>
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

{{-- ✅ SCRIPT DE EDICIÓN --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Extraer datos desde el botón
        var id = button.getAttribute('data-id');
        var nombre = button.getAttribute('data-nombre');
        var categoria = button.getAttribute('data-categoria');
        var garantia = button.getAttribute('data-garantia');
        var estado = button.getAttribute('data-estado');
        var precio = button.getAttribute('data-precio');

        // Rellenar los campos del modal
        document.getElementById('editID_SERVICIOS').value = id;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editCategoria').value = categoria;
        document.getElementById('editGarantia').value = garantia;
        document.getElementById('editEstado').value = estado;
        document.getElementById('editPrecio').value = precio;

        // Establecer acción del formulario con PUT dinámico
        var form = document.getElementById('editForm');
        form.action = '{{ route("servicios.update", ":id") }}'.replace(':id', id);
    });
});
</script>
@endpush
