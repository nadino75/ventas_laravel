@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Turnos</h1>
@stop
@section('content')
    <a href="{{route('turnos.create')}}" class="btn btn-primary mb-3">Nuevo Turno</a>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Dias de descanso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turnos as $turno)
                <tr>
                    <td>{{$turno->id}}</td>
                    <td>{{$turno->hora_entrada}}</td>
                    <td>{{$turno->hora_salida}}</td>
                    <td>{{$turno->dias_descanso}}</td>
                    <td>
                        <a href="{{route('turnos.edit', $turno)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{route('turnos.destroy', $turno)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro de eliminar este turno??')">Eliminar</button>
                        </form>
                        
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

@stop