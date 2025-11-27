{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-0">
                <h5 class="modal-title">Crear Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID_PRODUCTOS</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="ID_PRODUCTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="Categoria" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="Marca" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Garantía</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="Garantia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control bg-secondary text-light border-0" name="Precio" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control bg-secondary text-light border-0" name="Cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" name="Estado" required>
                    </div>

                    <div class="modal-footer border-0">
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
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-0">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">ID_PRODUCTOS</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editID_PRODUCTOS" name="ID_PRODUCTOS" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editCategoria" name="Categoria" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editMarca" name="Marca" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editNombre" name="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Garantía</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editGarantia" name="Garantia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control bg-secondary text-light border-0" id="editPrecio" name="Precio" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control bg-secondary text-light border-0" id="editCantidad" name="Cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control bg-secondary text-light border-0" id="editEstado" name="Estado" required>
                    </div>

                    <div class="modal-footer border-0">
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
