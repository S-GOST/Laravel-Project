{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-user-plus me-2"></i> Crear Cliente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_CLIENTES" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Ubicación</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Ubicacion" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Nombre" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tipo Documento</label>
                            <select class="form-select border-primary shadow-sm" name="TipoDocumento" required>
                                <option value="">[Seleccione]</option>
                                <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Nit">NIT</option>
                                <option value="Rut">RUT</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Correo</label>
                            <input type="email" class="form-control border-primary shadow-sm" name="Correo" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Teléfono</label>
                            <input type="number" class="form-control border-primary shadow-sm" name="Telefono" required>
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



{{-- MODAL EDITAR --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-user-pen me-2"></i> Editar Cliente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Ubicación</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editUbicacion" name="Ubicacion" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editNombre" name="Nombre" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tipo Documento</label>
                            <select class="form-select border-success shadow-sm" id="editTipoDocumento" name="TipoDocumento" required>
                                <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Nit">NIT</option>
                                <option value="Rut">RUT</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Correo</label>
                            <input type="email" class="form-control border-success shadow-sm" id="editCorreo" name="Correo" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Teléfono</label>
                            <input type="number" class="form-control border-success shadow-sm" id="editTelefono" name="Telefono" required>
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-success rounded-pill px-3">
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

    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        // Obtener datos del botón
        document.getElementById('editID_CLIENTES').value   = button.getAttribute('data-idc');
        document.getElementById('editUbicacion').value     = button.getAttribute('data-ubicacion');
        document.getElementById('editNombre').value        = button.getAttribute('data-nombre');
        document.getElementById('editTipoDocumento').value = button.getAttribute('data-tipo');
        document.getElementById('editCorreo').value        = button.getAttribute('data-correo');
        document.getElementById('editTelefono').value      = button.getAttribute('data-telefono');

        // Ruta del formulario (PUT)
        document.getElementById('editForm').action = '/clientes/' + button.getAttribute('data-idc');
    });

    // Confirmación de eliminación
    window.confirmarEliminar = function(event) {
        if (!confirm('¿Seguro deseas eliminar este cliente?')) {
            event.preventDefault();
            return false;
        }
        return true;
    };

});
</script>

