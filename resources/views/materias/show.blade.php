@extends('adminlte::page')

@section('title', 'Detalle de Materia')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="fas fa-book-open text-info"></i> Detalle de Materia</h1>
        <div>
            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('materias.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-info text-white">
            <h4 class="mb-0"><i class="fas fa-book"></i> {{ $materia->nombre_materia }}</h4>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-user-graduate"></i> Estudiante:</label>
                    <p class="text-muted mb-0">
                        @if($materia->id_estudiantes && $materia->estudiante)
                            {{ $materia->estudiante->nombre }}
                        @else
                            <span class="text-danger">No asignado</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-code"></i> Código:</label>
                    <p class="text-muted mb-0">{{ $materia->codigo_materia }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-users"></i> Grupo:</label>
                    <p class="text-muted mb-0">{{ $materia->grupo }}</p>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-chalkboard-teacher"></i> Docente:</label>
                    <p class="text-muted mb-0">{{ $materia->docente }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="font-weight-bold"><i class="fas fa-layer-group"></i> Semestre:</label>
                    <p class="text-muted mb-0">{{ $materia->semestre }}</p>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold"><i class="fas fa-clock"></i> Turno:</label>
                    <p class="text-muted mb-0">{{ $materia->turno }}</p>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold"><i class="fas fa-calendar-alt"></i> Fecha de Solicitud:</label>
                    <p class="text-muted mb-0">{{ $materia->fecha_solicitud->format('d-m-Y') }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="font-weight-bold"><i class="fas fa-comment-dots"></i> Motivo:</label>
                    <div class="alert alert-light border text-muted">{{ $materia->motivo }}</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-check-circle"></i> Estado:</label>
                    <span class="badge badge-{{ $materia->estado === 'aprobado' ? 'success' : ($materia->estado === 'pendiente' ? 'warning' : 'danger') }}">
                        {{ ucfirst($materia->estado) }}
                    </span>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold"><i class="fas fa-info-circle"></i> Observaciones:</label>
                    <div class="alert alert-secondary text-muted">
                        {{ $materia->observaciones ?? 'Sin observaciones.' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-right bg-white">
            <a href="{{ route('materias.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-outline-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
        </div>
    </div>
@stop
