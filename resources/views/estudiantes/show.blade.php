@extends('adminlte::page')

@section('title', 'Detalle del Estudiante')

@section('content_header')
    <h1 class="mb-3"><i class="fas fa-user-graduate"></i> Detalle del Estudiante</h1>
@stop

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">
                <i class="fas fa-id-card"></i> {{ $estudiante->nombre }} {{ $estudiante->apellidos }}
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-id-badge"></i> CI:</strong><br>
                    {{ $estudiante->ci }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-envelope"></i> Correo:</strong><br>
                    {{ $estudiante->correo }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-phone"></i> Teléfono:</strong><br>
                    {{ $estudiante->telefono }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong><br>
                    {{ $estudiante->direccion }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-birthday-cake"></i> Fecha de Nacimiento:</strong><br>
                    {{ \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d-m-Y') }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-venus-mars"></i> Género:</strong><br>
                    {{ $estudiante->genero }}
                </div>
                <div class="col-md-6 mb-3">
                    <strong><i class="fas fa-graduation-cap"></i> Carrera:</strong><br>
                    {{ $estudiante->carrera }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong><i class="fas fa-calendar-alt"></i> Año de Ingreso:</strong><br>
                    {{ $estudiante->anio_ingreso }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong><i class="fas fa-check-circle"></i> Estado:</strong><br>
                    {{ ucfirst($estudiante->estado) }}
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
        </div>
    </div>
@stop
