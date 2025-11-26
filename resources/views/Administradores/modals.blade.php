{{-- Este es el contenido de 'administradores/modals.blade.php' --}}

{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fa-solid fa-user-plus"></i> Crear Administrador</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('administradores.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" name="ID_ADMINISTRADOR" required>
                    </div>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="Correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="TipoDocumento" class="form-label">Tipo Documento</label>
                        <select class="form-select" name="TipoDocumento" required>
                            <option value="">[Seleccione]</option>
                            <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">NIT</option>
                            <option value="Rut">RUT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" name="Telefono" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL EDITAR --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fa-solid fa-user-pen"></i> Editar Administrador</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">ID_ADMINISTRADOR</label>
                        <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" id="editCorreo" name="Correo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Documento</label>
                        <select class="form-select" id="editTipoDocumento" name="TipoDocumento" required>
                            <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">NIT</option>
                            <option value="Rut">RUT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="editTelefono" name="Telefono" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editarModal = document.getElementById('EditarModal');

        editarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que disparó el modal
            
            // Obtener los datos del administrador de los atributos data-* del botón
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');
            var correo = button.getAttribute('data-correo');
            var tipo = button.getAttribute('data-tipo');
            var telefono = button.getAttribute('data-telefono');

            // Rellenar campos del modal de edición
            document.getElementById('editID_ADMINISTRADOR').value = id;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editCorreo').value = correo;
            document.getElementById('editTelefono').value = telefono;
            
            // Seleccionar la opción correcta en el <select> del Tipo Documento
            document.getElementById('editTipoDocumento').value = tipo;

            // Establecer la acción del formulario para la ruta de actualización
            var form = document.getElementById('editForm');
            form.action = '{{ url('administradores') }}/' + id;
        });
        
        // Función de confirmación de eliminación (requerida por el botón Eliminar en la vista principal)
        window.confirmarEliminar = function(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar este administrador? Esta acción es irreversible.')) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    });
</script>
@endpush