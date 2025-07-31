@extends('adminlte::page')

@section('title', isset($estudiante) ? 'Editar Estudiante' : 'Nuevo Estudiante')

@section('content_header')
    <h1 class="text-center mb-4">
        {{ isset($estudiante) ? 'Editar Información del Estudiante' : 'Registrar Nuevo Estudiante' }}
    </h1>
@stop

@section('content')
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="fas fa-user-edit"></i> {{ isset($estudiante) ? 'Editar Estudiante' : 'Nuevo Estudiante' }}
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($estudiante) ? route('estudiantes.update', $estudiante->id) : route('estudiantes.store') }}" method="POST">
                    @csrf
                    @if (isset($estudiante))
                        @method('PUT')
                    @endif

                    {{-- Fila 1 --}}
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label><strong>Nombre</strong></label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label><strong>Apellidos</strong></label>
                            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $estudiante->apellidos ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Fila 2 --}}
                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label><strong>CI</strong></label>
                            <input type="text" name="ci" class="form-control" value="{{ old('ci', $estudiante->ci ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Correo</strong></label>
                            <input type="email" name="correo" class="form-control" value="{{ old('correo', $estudiante->correo ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Teléfono</strong></label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $estudiante->telefono ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Fila 3 --}}
                    <div class="form-row mb-3">
                        <div class="col-md-8">
                            <label><strong>Dirección</strong></label>
                            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $estudiante->direccion ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Fecha de Nacimiento</strong></label>
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Fila 4 --}}
                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label><strong>Género</strong></label>
                            <select name="genero" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Masculino" {{ old('genero', $estudiante->genero ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('genero', $estudiante->genero ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ old('genero', $estudiante->genero ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Carrera</strong></label>
                            <input type="text" name="carrera" class="form-control" value="{{ old('carrera', $estudiante->carrera ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Año de Ingreso</strong></label>
                            <input type="number" name="anio_ingreso" class="form-control" value="{{ old('anio_ingreso', $estudiante->anio_ingreso ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Fila 5 --}}
                    <div class="form-group">
                        <label><strong>Estado</strong></label>
                        <select name="estado" class="form-control" required>
                            <option value="activo" {{ old('estado', $estudiante->estado ?? '') == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estado', $estudiante->estado ?? '') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    {{-- Botones --}}
                    <div class="form-group mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-save"></i> {{ isset($estudiante) ? 'Actualizar' : 'Guardar' }}
                        </button>
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary btn-lg ml-2">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
