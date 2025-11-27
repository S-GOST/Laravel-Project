{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="AgregarModalLabel">
                    <i class="fa-solid fa-file-circle-plus me-2"></i> Crear Orden de Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('orden_servicio.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_ORDEN_SERVICIO" class="form-label fw-semibold">ID Orden</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ID_CLIENTES" class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_ADMINISTRADOR" class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ID_TECNICOS" class="form-label fw-semibold">ID Técnico</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_TECNICOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ID_MOTOS" class="form-label fw-semibold">ID Moto</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Estado" class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-primary shadow-sm" name="Estado" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="Fecha_inicio" class="form-label fw-semibold">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Fecha_estimada" class="form-label fw-semibold">Fecha Estimada</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_estimada" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Fecha_fin" class="form-label fw-semibold">Fecha Fin</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha_fin">
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
                <h5 class="modal-title fw-bold" id="EditarModalLabel">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Orden de Servicio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_ORDEN_SERVICIO" class="form-label fw-semibold">ID Orden</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editID_CLIENTES" class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_ADMINISTRADOR" class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editID_TECNICOS" class="form-label fw-semibold">ID Técnico</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_TECNICOS" name="ID_TECNICOS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editID_MOTOS" class="form-label fw-semibold">ID Moto</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_MOTOS" name="ID_MOTOS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="editEstado" class="form-label fw-semibold">Estado</label>
                            <select class="form-select border-success shadow-sm" id="editEstado" name="Estado" required>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_inicio" class="form-label fw-semibold">Fecha Inicio</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_inicio" name="Fecha_inicio" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_estimada" class="form-label fw-semibold">Fecha Estimada</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_estimada" name="Fecha_estimada" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="editFecha_fin" class="form-label fw-semibold">Fecha Fin</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha_fin" name="Fecha_fin">
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
