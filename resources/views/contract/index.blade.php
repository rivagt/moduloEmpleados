@extends('layout')

@section('body')
    <div class="container">
        <h4>Empleados</h4>
        <a href="{{ route('employees.create') }}">Nuevo empleado</a>

        <p>Busqueda por cargo</p>
        <input class="form-control mr-sm-2" id="cargo" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" onClick="queryforcargo();">Buscar por cargo</button>
        <p>Busqueda por area</p>
        <input class="form-control mr-sm-2" id="area" placeholder="Search">

        <button class="btn btn-outline-success my-2 my-sm-0" onClick="queryforarea();">Buscar por area</button>
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
