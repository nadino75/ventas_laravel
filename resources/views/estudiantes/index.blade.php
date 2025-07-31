@extends('adminlte::page')

@section('title', 'Listado de Estudiantes')

@section('content_header')
    <h1 class="mb-4">Listado de Estudiantes</h1>
@stop

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span><i class="fas fa-users"></i> Estudiantes</span>
            <a href="{{ route('estudiantes.create') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-user-plus"></i> Nuevo Estudiante
            </a>
        </div>

        <div class="card-body">
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Tabla de estudiantes --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>CI</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Carrera</th>
                            <th>Año Ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td class="text-center">{{ $estudiante->id }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->apellidos }}</td>
                                <td>{{ $estudiante->ci }}</td>
                                <td>{{ $estudiante->correo }}</td>
                                <td>{{ $estudiante->telefono }}</td>
                                <td>{{ $estudiante->carrera }}</td>
                                <td class="text-center">{{ $estudiante->anio_ingreso }}</td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $estudiante->estado == 'activo' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($estudiante->estado) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($estudiantes->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center text-muted">No hay estudiantes registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
