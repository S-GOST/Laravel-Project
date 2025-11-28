{{-- ✅ MODAL AGREGAR PRODUCTO --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-cube me-2"></i> Crear Producto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Producto</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_PRODUCTOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Categoria" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Marca</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Marca" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Nombre" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Garantia" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Estado" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white border-0">$</span>
                                <input type="number" step="0.01" class="form-control border-primary shadow-sm" name="Precio" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Cantidad</label>
                            <input type="number" class="form-control border-primary shadow-sm" name="Cantidad" required>
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
{{-- ✅ MODAL EDITAR PRODUCTO --}}
<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Producto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Producto</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_PRODUCTOS" name="ID_PRODUCTOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editCategoria" name="Categoria" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Marca</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editMarca" name="Marca" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editNombre" name="Nombre" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Garantía</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editGarantia" name="Garantia" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editEstado" name="Estado" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white border-0">$</span>
                                <input type="number" step="0.01" class="form-control border-success shadow-sm" id="editPrecio" name="Precio" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Cantidad</label>
                            <input type="number" class="form-control border-success shadow-sm" id="editCantidad" name="Cantidad" required>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var editarModal = document.getElementById('EditarModal');

    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var idP = button.getAttribute('data-idp');
        var categoria = button.getAttribute('data-categoria');
        var marca = button.getAttribute('data-marca');
        var nombre = button.getAttribute('data-nombre');
        var garantia = button.getAttribute('data-garantia');
        var precio = button.getAttribute('data-precio');
        var cantidad = button.getAttribute('data-cantidad');
        var estado = button.getAttribute('data-estado');

        document.getElementById('editID_PRODUCTOS').value = idP;
        document.getElementById('editCategoria').value = categoria;
        document.getElementById('editMarca').value = marca;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editGarantia').value = garantia;
        document.getElementById('editPrecio').value = precio;
        document.getElementById('editCantidad').value = cantidad;
        document.getElementById('editEstado').value = estado;

        document.getElementById('editForm').action = '/productos/' + idP;
    });

    window.confirmarEliminar = function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            event.preventDefault();
        }
    };
});
</script>