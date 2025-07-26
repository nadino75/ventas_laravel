@extends('adminlte::page')

@section('title', isset($turno) ? 'Editar Turno' : 'Crear Turno')

@section('content_header')
    <h1>{{ isset($turno) ? 'Editar Turno' : 'Crear Turno' }}</h1>
@stop

@section('content')
<form action="{{ isset($turno) ? route('turnos.update', $turno) : route('turnos.store') }}" method="POST">
    @csrf
    @if(isset($turno))
        @method('PUT')
    @endif

    <div class="form-group">
        <label>Hora de Entrada</label>
        <input type="time" name="hora_entrada" class="form-control" value="{{ old('hora_entrada', $turno->hora_entrada ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Hora de Salida</label>
        <input type="time" name="hora_salida" class="form-control" value="{{ old('hora_salida', $turno->hora_salida ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Días de Descanso</label>
        <input type="text" name="dias_descanso" class="form-control" value="{{ old('dias_descanso', $turno->dias_descanso ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($turno) ? 'Actualizar' : 'Guardar' }}</button>
    <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@stop
