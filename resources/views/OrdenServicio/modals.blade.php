{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="AgregarModalLabel"><i class="fa-solid fa-clipboard-list"></i> Crear orden_servicio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orden_servicio.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_ORDEN_SERVICIO" class="form-label">ID_ORDEN_SERVICIO</label>
                            <input type="text" class="form-control" name="ID_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ID_CLIENTES" class="form-label">ID_CLIENTES</label>
                            <input type="text" class="form-control" name="ID_CLIENTES" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                            <input type="text" class="form-control" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ID_TECNICOS" class="form-label">ID_TECNICOS</label>
                            <input type="text" class="form-control" name="ID_TECNICOS" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_MOTOS" class="form-label">ID_MOTOS</label>
                            <input type="text" class="form-control" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" name="Estado" required>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-4 mb-3">
                            <label for="Fecha_inicio" class="form-label">Fecha_inicio</label>
                            <input type="datetime-local" class="form-control" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Fecha_estimada" class="form-label">Fecha_estimada</label>
                            <input type="datetime-local" class="form-control" name="Fecha_estimada" required>
                        </div>
                         <div class="col-md-4 mb-3">
                            <label for="Fecha_fin" class="form-label">Fecha_fin</label>
                            {{-- Fecha fin no debería ser requerida en creación --}}
                            <input type="datetime-local" class="form-control" name="Fecha_fin"> 
                        </div>
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
                <h5 class="modal-title" id="EditarModalLabel"><i class="fa-solid fa-pen-to-square"></i> Editar orden_servicio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_ORDEN_SERVICIO" class="form-label">ID_ORDEN_SERVICIO</label>
                            {{-- ID generalmente es solo lectura --}}
                            <input type="text" class="form-control" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO" required readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editID_CLIENTES" class="form-label">ID_CLIENTES</label>
                            <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                            <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editID_TECNICOS" class="form-label">ID_TECNICOS</label>
                            <input type="text" class="form-control" id="editID_TECNICOS" name="ID_TECNICOS" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_MOTOS" class="form-label">ID_MOTOS</label>
                            <input type="text" class="form-control" id="editID_MOTOS" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                             <label for="editEstado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="editEstado" name="Estado" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_inicio" class="form-label">Fecha_inicio</label>
                            <input type="datetime-local" class="form-control" id="editFecha_inicio" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_estimada" class="form-label">Fecha_estimada</label>
                            <input type="datetime-local" class="form-control" id="editFecha_estimada" name="Fecha_estimada" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_fin" class="form-label">Fecha_fin</label>
                            <input type="datetime-local" class="form-control" id="editFecha_fin" name="Fecha_fin">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar cambios
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>