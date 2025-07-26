@extends('adminlte::page')

@section('title', 'Turnos')

@section('content_header')
    <h1>Listado de Turnos</h1>
@stop

@section('content')
<a href="{{ route('turnos.create') }}" class="btn btn-primary mb-3">Nuevo Turno</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Días Descanso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($turnos as $turno)
            <tr>
                <td>{{ $turno->id }}</td>
                <td>{{ $turno->hora_entrada }}</td>
                <td>{{ $turno->hora_salida }}</td>
                <td>{{ $turno->dias_descanso }}</td>
                <td>
                    <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turnos.destroy', $turno) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este turno?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
