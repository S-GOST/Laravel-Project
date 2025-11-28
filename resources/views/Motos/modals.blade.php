{{-- MODAL AGREGAR --}}
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-motorcycle me-2"></i> Crear Moto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form action="{{ route('motos.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Motos</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_MOTOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Placa</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Placa" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Modelo</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Modelo" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Marca</label>
                            <input type="text" class="form-control border-primary shadow-sm" name="Marca" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Recorrido (km)</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control border-primary shadow-sm" name="Recorrido" required>
                                <span class="input-group-text border-primary shadow-sm bg-white">km</span>
                            </div>
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
                    <i class="fa-solid fa-pen-to-square me-2"></i> Editar Moto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Motos</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_MOTOS" name="ID_MOTOS" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">ID Cliente</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editID_CLIENTES" name="ID_CLIENTES" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Placa</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editPlaca" name="Placa" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Modelo</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editModelo" name="Modelo" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Marca</label>
                            <input type="text" class="form-control border-success shadow-sm" id="editMarca" name="Marca" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Recorrido (km)</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control border-success shadow-sm" id="editRecorrido" name="Recorrido" required>
                                <span class="input-group-text border-success shadow-sm bg-white">km</span>
                            </div>
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

        editarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            // Obtener datos
            var idM = button.getAttribute('data-idm');
            var idC = button.getAttribute('data-idc');
            var placa = button.getAttribute('data-placa');
            var modelo = button.getAttribute('data-modelo');
            var marca = button.getAttribute('data-marca');
            var recorrido = button.getAttribute('data-recorrido');

            // Asignar valores
            document.getElementById('editID_MOTOS').value = idM;
            document.getElementById('editID_CLIENTES').value = idC;
            document.getElementById('editPlaca').value = placa;
            document.getElementById('editModelo').value = modelo;
            document.getElementById('editMarca').value = marca;
            document.getElementById('editRecorrido').value = recorrido;

            // Cambiar acción del formulario
            var form = document.getElementById('editForm');
            form.action = '{{ url('motos') }}/' + idM;
        });
    });
    </script>
