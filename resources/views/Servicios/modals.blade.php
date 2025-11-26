{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-wrench"></i> Crear Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">ID_SERVICIO</label>
                        <input type="text" class="form-control" name="ID_SERVICIO" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre Servicio</label>
                        <input type="text" class="form-control" name="NombreServicio" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="Descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Costo</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" name="Costo" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duración Estimada (minutos)</label>
                        <input type="number" class="form-control" name="Duracion" required>
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
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-pen-to-square"></i> Editar Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">ID_SERVICIO</label>
                        <input type="text" class="form-control" id="editID_SERVICIO" name="ID_SERVICIO" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre Servicio</label>
                        <input type="text" class="form-control" id="editNombreServicio" name="NombreServicio" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" id="editDescripcion" name="Descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Costo</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" id="editCosto" name="Costo" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duración Estimada (minutos)</label>
                        <input type="number" class="form-control" id="editDuracion" name="Duracion" required>
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



{{-- SCRIPT DE LLENADO AUTOMÁTICO --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var nombre = button.getAttribute('data-nombre');
        var descripcion = button.getAttribute('data-descripcion');
        var costo = button.getAttribute('data-costo');
        var duracion = button.getAttribute('data-duracion');

        document.getElementById('editID_SERVICIO').value = id;
        document.getElementById('editNombreServicio').value = nombre;
        document.getElementById('editDescripcion').value = descripcion;
        document.getElementById('editCosto').value = costo;
        document.getElementById('editDuracion').value = duracion;

        document.getElementById('editForm').action = '/servicios/' + id;
    });
});
</script>
