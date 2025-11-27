{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold"><i class="fa-solid fa-file-circle-plus me-2"></i> Crear Comprobante</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light text-dark">
                <form action="{{ route('comprobante.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Comprobante</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_COMPROBANTE" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Informe</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_INFORME" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_CLIENTES" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_ADMINISTRADOR" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Monto</label>
                            <input type="number" class="form-control border-primary shadow-sm" name="Monto" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Fecha</label>
                            <input type="datetime-local" class="form-control border-primary shadow-sm" name="Fecha" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Estado de Pago</label>
                        <select class="form-select border-primary shadow-sm" name="Estado_pago" required>
                            <option value="Pagado">Pagado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Anulado">Anulado</option>
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


{{-- MODAL EDITAR --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square me-2"></i> Editar Comprobante</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Comprobante</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_COMPROBANTE" name="ID_COMPROBANTE" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Informe</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_INFORME" name="ID_INFORME" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Administrador</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADOR" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Monto</label>
                            <input type="number" class="form-control border-success shadow-sm" id="editMonto" name="Monto" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Fecha</label>
                            <input type="datetime-local" class="form-control border-success shadow-sm" id="editFecha" name="Fecha" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Estado de Pago</label>
                        <select class="form-select border-success shadow-sm" id="editEstado_pago" name="Estado_pago" required>
                            <option value="Pagado">Pagado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Anulado">Anulado</option>
                        </select>
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
