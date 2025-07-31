@extends('adminlte::page')

@section('title', 'Editar Materia')

@section('content_header')
    <h1>Editar Materia</h1>
@stop

@section('content')
    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Muy importante para editar --}}

        <div class="row">
            {{-- Estudiante --}}
            <div class="form-group col-md-6">
                <label for="id_estudiantes">Estudiante</label>
                <select name="id_estudiantes" class="form-control" required>
                    <option value="">-- Selecciona un estudiante --</option>
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}"
                            {{ old('id_estudiantes', $materia->id_estudiantes) == $estudiante->id ? 'selected' : '' }}>
                            {{ $estudiante->id }} - {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Código Materia --}}
            <div class="form-group col-md-6">
                <label for="codigo_materia">Código de Materia</label>
                <input type="text" name="codigo_materia" class="form-control"
                    value="{{ old('codigo_materia', $materia->codigo_materia) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Nombre Materia --}}
            <div class="form-group col-md-6">
                <label for="nombre_materia">Nombre de Materia</label>
                <input type="text" name="nombre_materia" class="form-control"
                    value="{{ old('nombre_materia', $materia->nombre_materia) }}" required>
            </div>

            {{-- Grupo --}}
            <div class="form-group col-md-6">
                <label for="grupo">Grupo</label>
                <select name="grupo" class="form-control" required>
                    <option value="">-- Selecciona un grupo --</option>
                    <option value="A" {{ old('grupo', $materia->grupo) == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('grupo', $materia->grupo) == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('grupo', $materia->grupo) == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>
        </div>

        <div class="row">
            {{-- Docente --}}
            <div class="form-group col-md-6">
                <label for="docente">Docente</label>
                <input type="text" name="docente" class="form-control"
                    value="{{ old('docente', $materia->docente) }}" required>
            </div>

            {{-- Semestre --}}
            <div class="form-group col-md-6">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control" required>
                    <option value="">-- Selecciona un semestre --</option>
                    <option value="1-2025" {{ old('semestre', $materia->semestre) == '1-2025' ? 'selected' : '' }}>1-2025</option>
                    <option value="2-2025" {{ old('semestre', $materia->semestre) == '2-2025' ? 'selected' : '' }}>2-2025</option>
                </select>
            </div>
        </div>

        <div class="row">
            {{-- Turno --}}
            <div class="form-group col-md-6">
                <label for="turno">Turno</label>
                <select name="turno" class="form-control" required>
                    <option value="">-- Selecciona un turno --</option>
                    <option value="Mañana" {{ old('turno', $materia->turno) == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                    <option value="Tarde" {{ old('turno', $materia->turno) == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                    <option value="Noche" {{ old('turno', $materia->turno) == 'Noche' ? 'selected' : '' }}>Noche</option>
                </select>
            </div>

            {{-- Fecha de Solicitud --}}
            <div class="form-group col-md-6">
                <label for="fecha_solicitud">Fecha de Solicitud</label>
                <input type="date" name="fecha_solicitud" class="form-control"
                    value="{{ old('fecha_solicitud', $materia->fecha_solicitud->format('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Motivo --}}
            <div class="form-group col-md-6">
                <label for="motivo">Motivo</label>
                <input type="text" name="motivo" class="form-control"
                    value="{{ old('motivo', $materia->motivo) }}" required>
            </div>

            {{-- Estado --}}
            <div class="form-group col-md-6">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="">-- Selecciona un estado --</option>
                    <option value="Pendiente" {{ old('estado', $materia->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Aprobado" {{ old('estado', $materia->estado) == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                    <option value="Rechazado" {{ old('estado', $materia->estado) == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>
        </div>

        {{-- Observaciones --}}
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <input type="text" name="observaciones" class="form-control"
                value="{{ old('observaciones', $materia->observaciones) }}">
        </div>

        {{-- Botones --}}
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar
            </button>
            <a href="{{ route('materias.index') }}" class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
@stop
