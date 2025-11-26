@extends('layouts.Panel')

@section('title', 'Motos del Cliente')

@section('content')

<div class="container mt-4">

    <h2 class="mb-3" style="color:#e67514;">
        Moto de: {{ $cliente->Nombre }}
    </h2>

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mb-3">
        Volver
    </a>

    @if($motos->isEmpty())
        <div class="alert alert-warning">
            El cliente no tiene motos registradas.
        </div>
    @else
        <table class="table table-dark table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Recorrido</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($motos as $moto)
                    <tr>
                        <td>{{ $moto->ID_MOTOS }}</td>
                        <td>{{ $moto->Placa }}</td>
                        <td>{{ $moto->Modelo }}</td>
                        <td>{{ $moto->Marca }}</td>
                        <td>{{ $moto->Recorrido }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>

@endsection
