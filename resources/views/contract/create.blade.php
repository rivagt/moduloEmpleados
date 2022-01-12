@extends('layout')
@section('body')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('contract.store', $employee->dni) }}" method="POST">
            <h4>Creando contrato para {{ $employee->nombre }}</h4>
            {{-- <input value="{{ $employee->dni }}" disabled> --}}
            <span>Dni {{ $employee->dni }}</span>
            @csrf

            <div class="form-group">
                <label for="tipo_contrato">Empleado</label>
                <input class="form-control border-0 bg-light shadow-sm" id="tipo_contrato" name="employe_id"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ $employee->id }}" disabled hidden>
            </div>

            <div class="form-group">
                <label for="tipo_contrato">Tipo de contrato</label>
                <input class="form-control border-0 bg-light shadow-sm" id="tipo_contrato" name="tipo_contrato"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('tipo_contrato') }}" maxlength="8">
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Inicio de contrato</label>
                <input type="date" class="form-control border-0 bg-light shadow-sm" id="fecha_inicio" name="fecha_inicio"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('fecha_inicio') }}">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fin de contrato</label>
                <input type="date" class="form-control border-0 bg-light shadow-sm" id="fecha_fin" name="fecha_fin"
                    placeholder="Escribe aqui el titulo del proyecto" value="{{ old('fecha_fin') }}">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <br>
                <button class="btn btn-primary btn-lg">Registrar</button>
                <a class="btn btn-link btn-block" href="{{ route('employees.index') }}">Cancelar</a>
            </div>
        </form>

    </div>
@endsection
