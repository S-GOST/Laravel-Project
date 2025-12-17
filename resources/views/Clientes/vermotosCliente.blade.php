@extends('layouts.panel')

@section('content')
<div class="container-fluid ktm-page">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="ktm-title">Motos del Cliente</h1>
            <span class="ktm-subtitle">{{ $cliente->Nombre }}</span>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.clientes.index') }}" class="btn btn-ktm-outline">
                <i class="fas fa-arrow-left me-2"></i> Clientes
            </a>
            <a href="{{ route('motos.create') }}" class="btn btn-ktm">
                <i class="fas fa-motorcycle me-2"></i> Nueva Moto
            </a>
        </div>
    </div>

    <!-- INFO CLIENTE -->
    <div class="card ktm-card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Cliente:</strong> {{ $cliente->Nombre }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Teléfono:</strong> {{ $cliente->Telefono }}</p>
                    <p><strong>Correo:</strong> {{ $cliente->Correo }}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <p><strong>Ubicación:</strong> {{ $cliente->Ubicacion }}</p>
                    <span class="ktm-badge">
                        {{ $motos->count() }} motos registradas
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA MOTOS -->
    <div class="card ktm-card">
        <div class="card-body p-0">

            @if($motos->count())
                <div class="table-responsive">
                    <table class="table ktm-table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Placa</th>
                                <th>Color</th>
                                <th>Kilometraje</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($motos as $moto)
                            <tr>
                                <td>#{{ $moto->ID_MOTOS }}</td>
                                <td>{{ $moto->Marca }}</td>
                                <td>{{ $moto->Modelo }}</td>
                                <td>{{ $moto->Anio }}</td>
                                <td class="ktm-plate">{{ $moto->Placa }}</td>
                                <td>{{ $moto->Color }}</td>
                                <td>{{ $moto->Kilometraje ? $moto->Kilometraje.' km' : '—' }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('motos.show', $moto->ID_MOTOS) }}"
                                           class="btn btn-ktm-icon" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('motos.edit', $moto->ID_MOTOS) }}"
                                           class="btn btn-ktm-icon warning" title="Editar">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="ktm-empty">
                    <i class="fas fa-motorcycle"></i>
                    <p>Este cliente no tiene motos registradas</p>
                </div>
            @endif

        </div>
    </div>
</div>

<style>
/* ===============================
   KTM DARK PRO - TEXTO BLANCO
================================ */

.ktm-page,
.ktm-page p,
.ktm-page span,
.ktm-page td,
.ktm-page th,
.ktm-page h1,
.ktm-page h2,
.ktm-page h3 {
    color: #ffffff !important;
}

/* TITULOS */
.ktm-title {
    font-weight: 800;
    letter-spacing: 1px;
}

.ktm-subtitle {
    opacity: 0.85;
}

/* CARDS */
.ktm-card {
    background: #141414;
    border: 1px solid rgba(255,109,31,.35);
    border-radius: 14px;
}

/* BADGE */
.ktm-badge {
    display: inline-block;
    margin-top: 10px;
    background: rgba(255,109,31,.2);
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 700;
}

/* TABLA */
.ktm-table thead {
    background: linear-gradient(
        90deg,
        rgba(255,109,31,.45),
        rgba(255,109,31,.15)
    );
}

.ktm-table th {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
}

.ktm-table td {
    border-top: 1px solid rgba(255,255,255,.08);
}

.ktm-table tbody tr:hover {
    background: rgba(255,109,31,.12);
}

/* PLACA */
.ktm-plate {
    font-weight: 800;
    letter-spacing: 1.5px;
}

/* BOTONES */
.btn-ktm-icon {
    background: rgba(255,109,31,.2);
    color: #ffffff;
    border: none;
}

.btn-ktm-icon.warning {
    background: rgba(255,193,7,.25);
}

.btn-ktm-icon:hover {
    background: #ff6d1f;
    color: #000000;
}

/* EMPTY */
.ktm-empty {
    text-align: center;
    padding: 4rem;
}

.ktm-empty i {
    font-size: 3rem;
    color: #ff6d1f;
    margin-bottom: 1rem;
}
</style>
@endsection
