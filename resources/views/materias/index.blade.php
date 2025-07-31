@extends('adminlte::page')

@section('title', 'Listado de Materias')

@section('content_header')
    <h1 class="mb-3"><i class="fas fa-book text-primary"></i> Materias Registradas</h1>
@stop

@section('content')
    {{-- Botón para registrar nueva materia --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="fas fa-users"></i> Materias</span>
        <a href="{{ route('materias.create') }}" class="btn btn-dark btn-sm">
            <i class="fas fa-user-plus"></i> Nueva Materia
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    {{-- Tabla de materias --}}
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Grupo</th>
                        <th>Docente</th>
                        <th>Semestre</th>
                        <th>Turno</th>
                        <th>Fecha Solicitud</th>
                        <th>Estado</th>
                        <th>Estudiante</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materias as $materia)
                        <tr>
                            <td>{{ $materia->id }}</td>
                            <td>{{ $materia->codigo_materia }}</td>
                            <td>{{ $materia->nombre_materia }}</td>
                            <td>{{ $materia->grupo }}</td>
                            <td>{{ $materia->docente }}</td>
                            <td>{{ $materia->semestre }}</td>
                            <td>{{ $materia->turno }}</td>
                            <td>{{ \Carbon\Carbon::parse($materia->fecha_solicitud)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge badge-{{ $materia->estado === 'aprobado' ? 'success' : ($materia->estado === 'pendiente' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($materia->estado) }}
                                </span>
                            </td>
                            <td>{{ $materia->estudiante?->nombre ?? 'No asignado' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta materia?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-muted text-center">No hay materias registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
