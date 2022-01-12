@extends('layout')

@section('body')
    <div class="container">
        <h4>Contratos</h4>
        <table class="table thead-dark">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Tipo de Contrato</th>
                </tr>
            </thead>
            <tbody id="tcontracts">
                @forelse ($contracts as $contract)
                    @if ($contract->employe_id)
                        <tr>
                            <td>{{ $contract->employe->nombre }}</td>
                            <td>{{ $contract->employe->dni }}</td>
                            <td>{{ $contract->fecha_inicio }}</td>
                            <td>{{ $contract->fecha_fin }}</td>
                            <td>{{ $contract->tipo_contrato }}</td>
                        </tr>
                    @else
                        <tr>
                            <td>Desconocido</td>
                            <td>Desconocido</td>
                            <td>{{ $contract->fecha_inicio }}</td>
                            <td>{{ $contract->fecha_fin }}</td>
                            <td>{{ $contract->tipo_contrato }}</td>
                        </tr>
                    @endif
                @empty
                    <li>No hay contratos</li>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex align-items-center justify-content-center mt-4">
            {{ $contracts->links() }}
        </div>
    </div>
@endsection
