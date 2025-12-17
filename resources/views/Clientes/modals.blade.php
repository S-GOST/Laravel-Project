<!-- MODAL AGREGAR -->
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background: var(--ktm-gray); color: white;">
            <div class="modal-header" style="background: linear-gradient(90deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-user-plus me-2"></i> Nuevo Cliente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.clientes.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">ID Cliente *</label>
                            <input type="text" class="form-control" name="ID_CLIENTES" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Ej: CL11, CL12">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-semibold">Nombre Completo *</label>
                            <input type="text" class="form-control" name="Nombre" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Ej: Bok, Rosa, Teodoro">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Usuario *</label>
                            <input type="text" class="form-control" name="usuario" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Ej: bok1, Rosa2, teodoro3">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Contraseña *</label>
                            <input type="password" class="form-control" name="contrasena" required
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Mínimo 6 caracteres">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tipo de Documento *</label>
                            <select class="form-select" name="TipoDocumento" required 
                                    style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);">
                                <option value="">[Seleccione]</option>
                                <option value="Nit">Nit</option>
                                <option value="Cedula de Ciudadanía">Cédula de Ciudadanía</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Teléfono *</label>
                            <input type="text" class="form-control" name="Telefono" required
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Ej: 3002125478, 3112025477">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Correo Electrónico *</label>
                            <input type="email" class="form-control" name="Correo" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="ejemplo@gmail.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Ubicación *</label>
                            <input type="text" class="form-control" name="Ubicacion" required
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(255, 109, 31, 0.3);"
                                   placeholder="Ej: Bogota, Cundinamarca">
                        </div>
                    </div>

                    <div class="modal-footer" style="border-top: 1px solid rgba(255, 109, 31, 0.2);">
                        <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-ktm">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR -->
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background: var(--ktm-gray); color: white;">
            <div class="modal-header" style="background: linear-gradient(90deg, #28a745 0%, #20c997 100%);">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Cliente
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Campo oculto para ID -->
                    <input type="hidden" id="editID_CLIENTES" name="ID_CLIENTES">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control" id="editID_CLIENTES_display" required
                                   style="background: var(--ktm-gray-light); color: #aaa; border: 1px solid rgba(40, 167, 69, 0.3);">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-semibold">Nombre Completo *</label>
                            <input type="text" class="form-control" id="editNombre" name="Nombre" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(40, 167, 69, 0.3);">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tipo de Documento *</label>
                            <select class="form-select" id="editTipoDocumento" name="TipoDocumento" required 
                                    style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(40, 167, 69, 0.3);">
                                <option value="">[Seleccione]</option>
                                <option value="Nit">Nit</option>
                                <option value="Cedula de Ciudadanía">Cédula de Ciudadanía</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Teléfono *</label>
                            <input type="text" class="form-control" id="editTelefono" name="Telefono" required
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(40, 167, 69, 0.3);">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Correo Electrónico *</label>
                            <input type="email" class="form-control" id="editCorreo" name="Correo" required 
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(40, 167, 69, 0.3);">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Ubicación *</label>
                            <input type="text" class="form-control" id="editUbicacion" name="Ubicacion" required
                                   style="background: var(--ktm-gray-light); color: white; border: 1px solid rgba(40, 167, 69, 0.3);">
                        </div>
                    </div>

                    <div class="modal-footer" style="border-top: 1px solid rgba(40, 167, 69, 0.2);">
                        <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para manejar los modales -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manejar el modal de edición
    var editarModal = document.getElementById('EditarModal');
    
    if (editarModal) {
        editarModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            
            // Obtener datos del cliente (EXACTAMENTE como están en tu tabla)
            var id = button.getAttribute('data-id');
            var ubicacion = button.getAttribute('data-ubicacion');
            var nombre = button.getAttribute('data-nombre');
            var correo = button.getAttribute('data-correo');
            var tipo = button.getAttribute('data-tipo');
            var telefono = button.getAttribute('data-telefono');
            
            // Asignar valores a los campos del formulario
            document.getElementById('editID_CLIENTES').value = id;
            document.getElementById('editNombre').value = nombre || '';
            document.getElementById('editTipoDocumento').value = tipo || '';
            document.getElementById('editCorreo').value = correo || '';
            document.getElementById('editTelefono').value = telefono || '';
            document.getElementById('editUbicacion').value = ubicacion || '';
            
            // Actualizar la acción del formulario con el ID correcto
            var editForm = document.getElementById('editForm');
            editForm.action = "{{ url('admin/clientes') }}/" + id;
            
            console.log('Editando cliente ID:', id);
        });
    }
});
</script>