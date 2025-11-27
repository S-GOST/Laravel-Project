{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-motorcycle"></i> Crear Moto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('motos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">ID_MOTOS</label>
                        <input type="text" class="form-control" name="ID_MOTOS" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" name="ID_CLIENTES" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Placa</label>
                        <input type="text" class="form-control" name="Placa" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" class="form-control" name="Modelo" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" name="Marca" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Recorrido (km)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" name="Recorrido" required>
                            <span class="input-group-text">km</span>
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
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-pen-to-square"></i> Editar Moto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">ID_MOTOS</label>
                        <input type="text" class="form-control" id="editID_MOTOS" name="ID_MOTOS" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID_CLIENTES</label>
                        <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTES" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Placa</label>
                        <input type="text" class="form-control" id="editPlaca" name="Placa" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="editModelo" name="Modelo" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" id="editMarca" name="Marca" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Recorrido (km)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="editRecorrido" name="Recorrido" required>
                            <span class="input-group-text">km</span>
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

