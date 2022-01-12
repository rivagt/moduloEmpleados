@extends('layout')

@section('body')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('employees.update',$employee) }}" method="POST">
            <h4>Editando empleado {{ $employee->nombre }} Dni:{{ $employee->dni }}</h4>
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control border-0 bg-light shadow-sm" id="nombre" name="nombre"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('nombre',$employee->nombre) }}">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input class="form-control border-0 bg-light shadow-sm" id="apellidos" name="apellidos"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('apellidos',$employee->apellidos) }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control border-0 bg-light shadow-sm" id="email" name="email"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('email',$employee->email) }}">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control border-0 bg-light shadow-sm" id="fecha_nacimiento" name="fecha_nacimiento"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('fecha_nacimiento',$employee->fecha_nacimiento) }}">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input class="form-control border-0 bg-light shadow-sm" id="telefono" name="telefono"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('telefono',$employee->telefono) }}" maxlength="9">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input class="form-control border-0 bg-light shadow-sm" id="area" name="area"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('area',$employee->area) }}">
            </div>
            <div class="form-group">
                <label for="cargo">Cargo</label>
                <input class="form-control border-0 bg-light shadow-sm" id="cargo" name="cargo"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('cargo',$employee->cargo) }}">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <br>
                <button class="btn btn-primary btn-lg">Registrar</button>
                <a class="btn btn-link btn-block" href="{{ route('employees.index') }}">Cancelar</a>
            </div>
        </form>

    </div>
@endsection
