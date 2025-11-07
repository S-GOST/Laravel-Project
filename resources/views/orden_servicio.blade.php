<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<body>
    <container class="container-sm d-flex justify-content-center mt-5">
        <div class="card">
            <div class="card-body" style="width: 1200px;">
                <h3>Modulo Clientes</h3>
                <hr>
                {{-- Mensaje de éxito --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Mensaje de error general --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa-solid fa-circle-xmark"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                <form name="cliente" action="{{ url('/clientes') }}" method="GET">
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AgregarModal"><i class="fa-solid fa-plus"></i> Nuevo</button>
                    </div>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" name="search" value="{{ request ('search') }}" placeholder="Buscar por nombre o documento" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search-plus"></i> Buscar</button>
                            <a href="{{ url('/clientes') }}">
                                <button type="button" class="btn btn-warning"><i class="fas fa-list"></i> Reset</button>
                            </a>
                        </div>
                    </div>

                </form>
                <!--Cuenta los datos-->
                @if($datos->count() > 0)
                            <table class="table table-striped table-hover table-bordered ">
                                    <thead class="table-primary">
                                        <tr>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Tipo Documento</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Email</th>
                                        <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datos as $item)
                                        <tr>
                                            <td>{{$item->documentoCliente}}</td>
                                            <td>{{$item->tipoDocumentoCliente}}</td>
                                            <td>{{$item->nombreCliente}}</td>
                                            <td>{{$item->apellidoCliente}}</td>
                                            <td>{{$item->direccionCliente}}</td>
                                            <td>{{$item->telefonoCliente}}</td>
                                            <td>{{$item->emailCliente}}</td>
                                            <td>
                                                <button
                                                    type="button"
                                                    class="btn btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#EditarModal"
                                                    data-id="{{ $item->ID_ORDEN_SERVICIO }}"
                                                    data-cliente="{{ $item->ID_CLIENTES }}"
                                                    data-admin="{{ $item->ID_ADMINISTRADOR }}"
                                                    data-tecnico="{{ $item->ID_TECNICOS }}"
                                                    data-moto="{{ $item->ID_MOTOS }}"
                                                    data-fecha_inicio="{{ $item->Fecha_inicio }}"
                                                    data-fecha_estimada="{{ $item->Fecha_estimada }}"
                                                    data-fecha_fin="{{ $item->Fecha_fin }}"
                                                    data-estado="{{ $item->Estado }}">
                                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                                </button>
                                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                                            </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                            </table>

                             <!-- Paginación -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <!-- Botón Anterior -->
                        <li class="page-item {{ $datos->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link"
                               href="{{ $datos->previousPageUrl() }}{{ request('search') ? '&search=' . request('search') : '' }}">
                                Atras
                            </a>
                        </li>

                        <!-- Números de página -->
                        @for ($i = 1; $i <= $datos->lastPage(); $i++)
                            <li class="page-item {{ $datos->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link"
                                   href="{{ $datos->url($i) }}{{ request('search') ? '&search=' . request('search') : '' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor

                        <!-- Botón Siguiente -->
                        <li class="page-item {{ !$datos->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link"
                               href="{{ $datos->nextPageUrl() }}{{ request('search') ? '&search=' . request('search') : '' }}">
                                Siguiente
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Información de registros -->
                <div class="text-muted mt-2">
                    Mostrando {{ $datos->firstItem() }} a {{ $datos->lastItem() }} de {{ $datos->total() }} registros
                </div>

                @else
                <div class="alert alert-info text-center mt-3">
                    <i class="fas fa-info-circle"></i>
                    @if(request('search'))
                        No se encontraron Proveedores con ese tipo de dato "{{ request('search') }}"
                    @else
                        No hay Proveedores registrados.
                    @endif
                </div>
                @endif
            </div>
            <!--Modal Agregar -->

            <div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user"></i> Crear Orden_servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('orden_servicio.store') }}" name="cliente" method="POST">
                    @csrf
                            <div class="mb-3">
                                <label for="editID_ORDEN_SERVICIO" class="form-label">ID_ORDEN_SERVICIO</label>
                                <input type="text" class="form-control" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIOorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_CLIENTES" class="form-label">ID_CLIENTES</label>
                                <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTESorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                                <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADORorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_TECNICOS" class="form-label">ID_TECNICOS</label>
                                <input type="text" class="form-control" id="editID_TECNICOS" name="ID_TECNICOSorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_MOTOS" class="form-label">ID_MOTOS</label>
                                <input type="text" class="form-control" id="editID_MOTOS" name="ID_MOTOSorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editFecha_Estimada" class="form-label">Fecha_estimada</label>
                                <input type="number" class="form-control" id="editFecha_estimada" name="Fecha_estimadaorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editFecha_fin" class="form-label">Fecha_fin</label>
                                <input type="number" class="form-control" id="editFecha_fin" name="Fecha_finorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEstado" class="form-label">Estado</label>
                                <input type="estado" class="form-control" id="editEstado" name="Estadoorden_servicio" required>
                            </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-right-from-bracket"></i> Close</button>
                        <button type="Submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                    </form>
                </div>

                </div>
            </div>
            </div>

            <!--Modal Modificar-->
            <div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditarModalLabel"><i class="fa-solid fa-user-pen"></i> Editar Orden_servicio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST">
                            @csrf
                            @method('PUT') <!-- Muy importante -->
                             <div class="mb-3">
                                <label for="ID_ORDEN_sERVICIO" class="form-label">ID_ORDEN_SERVICIO</label>
                               <input type="text" class="form-control" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIO"  readonly>

                            </div>
                            <div class="mb-3">
                                <label for="editID_ORDEN_SERVICIO" class="form-label">ID_ORDEN_SERVICIO</label>
                                <input type="text" class="form-control" id="editID_ORDEN_SERVICIO" name="ID_ORDEN_SERVICIOorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_CLIENTES" class="form-label">ID_CLIENTES</label>
                                <input type="text" class="form-control" id="editID_CLIENTES" name="ID_CLIENTESorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_ADMINISTRADOR" class="form-label">ID_ADMINISTRADOR</label>
                                <input type="text" class="form-control" id="editID_ADMINISTRADOR" name="ID_ADMINISTRADORorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_TECNICOS" class="form-label">ID_TECNICOS</label>
                                <input type="text" class="form-control" id="editID_TECNICOS" name="ID_TECNICOSorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editID_MOTOS" class="form-label">ID_MOTOS</label>
                                <input type="text" class="form-control" id="editID_MOTOS" name="ID_MOTOSorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editFecha_Estimada" class="form-label">Fecha_estimada</label>
                                <input type="number" class="form-control" id="editFecha_estimada" name="Fecha_estimadaorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editFecha_fin" class="form-label">Fecha_fin</label>
                                <input type="number" class="form-control" id="editFecha_fin" name="Fecha_finorden_servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEstado" class="form-label">Estado</label>
                                <input type="estado" class="form-control" id="editEstado" name="Estadoorden_servicio" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-right-from-bracket"></i> Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>




        </div>
    </container>
</body>
</html>
<script>
    var editarModal = document.getElementById('EditarModal');
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        // Obtiene los datos del botón
        var id = button.getAttribute('data-id');
        var cliente = button.getAttribute('data-cliente');
        var admin = button.getAttribute('data-admin');
        var tecnico = button.getAttribute('data-tecnico');
        var moto = button.getAttribute('data-moto');
        var fecha_inicio = button.getAttribute('data-fecha_inicio');
        var fecha_estimada = button.getAttribute('data-fecha_estimada');
        var fecha_fin = button.getAttribute('data-fecha_fin');
        var estado = button.getAttribute('data-estado');

        // Llenar los inputs del modal
        document.getElementById('editID_ORDEN_SERVICIO').value = id;
        document.getElementById('editID_CLIENTES').value = cliente;
        document.getElementById('editID_ADMINISTRADOR').value = admin;
        document.getElementById('editID_TECNICOS').value = tecnico;
        document.getElementById('editID_MOTOS').value = moto;
        document.getElementById('editFecha_inicio').value = fecha_inicio;
        document.getElementById('editFecha_estimada').value = fecha_estimada;
        document.getElementById('editFecha_fin').value = fecha_fin;
        document.getElementById('editEstado').value = estado;

        // Cambiar acción del formulario
        var form = document.getElementById('editForm');
        form.action = '/orden_servicio/' + id;
    });
</script>

