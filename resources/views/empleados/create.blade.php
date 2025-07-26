@extends('adminlte::page')

@section('title', isset($empleado) ? 'Editar Empleado' : 'Nuevo Empleado')

@section('content_header')
    <h1>{{ isset($empleado) ? 'Editar' : 'Registrar' }} Empleado</h1>
@stop

@section('content')
<form action="{{ isset($empleado) ? route('empleados.update', $empleado) : route('empleados.store') }}" method="POST">
    @csrf
    @if(isset($empleado))
        @method('PUT')
    @endif

    <div class="form-group">
        <label>CI</label>
        <input type="number" name="ci" class="form-control" value="{{ old('ci', $empleado->ci ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Nombre Completo</label>
        <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $empleado->nombre_completo ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $empleado->email ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Rol</label>
        <input type="text" name="rol" class="form-control" value="{{ old('rol', $empleado->rol ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Turno</label>
        <select name="id_turno" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach($turnos as $turno)
                <option value="{{ $turno->id }}" {{ (old('id_turno', $empleado->id_turno ?? '') == $turno->id) ? 'selected' : '' }}>
                    {{ $turno->hora_entrada }} - {{ $turno->hora_salida }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($empleado) ? 'Actualizar' : 'Guardar' }}</button>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@stop
