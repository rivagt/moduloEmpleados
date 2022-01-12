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
                    <th>Apellidos</th>
                    <th>Dni</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="temployes">
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->nombre }}</td>
                        <td>{{ $employee->apellidos }}</td>
                        <td>{{ $employee->telefono }}</td>
                        <td>{{ $employee->dni }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <form class="d-inline" method="POST"
                                action="{{ route('employees.destroy', $employee) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Desactivar</button>
                            </form>
                            <a href="{{ route('employees.edit', $employee) }} " class="btn btn-sm btn-info">Editar</a>
                            <a href="{{ route('contract.create', $employee) }}" class="btn btn-sm btn-success">Nuevo
                                Contrato</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="text-secondary">Empleados inactivos</h5>
        <ul class="list-group">
            @foreach ($deletedEmployees as $demploye)
                <li class="list-group-item">
                    {{ $demploye->nombre }}
                    <form class="d-inline" method="POST" action="{{ route('employees.restore', $demploye) }}">
                        @csrf @method('PATCH')
                        <button class="btn btn-sm btn-info">Activar</button>
                    </form>
                    <form class="d-inline" method="POST" onsubmit="return confirm('¿Esta seguro?')"
                        action="{{ route('employees.totalDelete', $demploye) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    <script>
        function queryforcargo() {
            const cargo = $("#cargo").val();
            $.getJSON('http://moduloempleados.pe/queryforcargo/', {
                    cargo: cargo
                },
                function(data, textStatus, jqXHR) {
                    let s = "";
                    const lista = data;
                    const {
                        data: employees
                    } = lista;
                    // console.log(employees);
                    $.each(employees, function(index, obj) {
                        console.log(obj.apellidos);
                        s += '<tr>';
                        s += '<td>' + obj.nombre +
                            '</td>';
                        s += '<td>' + obj.apellidos +
                            '</td>';
                        s += '<td>' + obj.telefono +
                            '</td>';
                        s += '<td>' + obj.dni +
                            '</td>';
                        s += '<td>' + obj.email +
                            '</td>';
                        s += '<td>' +
                            '<a href="#" class="btn btn-sm btn-danger">Desactivar</a>' +
                            '<a href="#" class="btn btn-sm btn-info">Editar</a>' +
                            '<a href="#" class="btn btn-sm btn-success">Nuevo Contrato</a>' +
                            '</td>';
                        s += '</tr>';
                    });
                    $("#temployes").empty();
                    $("#temployes").append(s);
                });
        }

        function queryforarea() {
            const area = $("#area").val();
            $.getJSON('http://moduloempleados.pe/queryforarea/', {
                    area: area
                },
                function(data, textStatus, jqXHR) {
                    let s = "";
                    const lista = data;
                    const {
                        data: employees
                    } = lista;
                    // console.log(employees);
                    $.each(employees, function(index, obj) {
                        console.log(obj.apellidos);
                        s += '<tr>';
                        s += '<td>' + obj.nombre +
                            '</td>';
                        s += '<td>' + obj.apellidos +
                            '</td>';
                        s += '<td>' + obj.telefono +
                            '</td>';
                        s += '<td>' + obj.dni +
                            '</td>';
                        s += '<td>' + obj.email +
                            '</td>';
                        s += '<td>' +
                            '<a href="#" class="btn btn-sm btn-danger">Desactivar</a>' +
                            '<a href="#" class="btn btn-sm btn-info">Editar</a>' +
                            '<a href="#" class="btn btn-sm btn-success">Nuevo Contrato</a>' +
                            '</td>';
                        s += '</tr>';
                    });
                    $("#temployes").empty();
                    $("#temployes").append(s);
                });
        }
    </script>
@endsection
