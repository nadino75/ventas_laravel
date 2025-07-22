@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Listado de Empleados</h1>
@stop

@section ('content')
    <a href="{{route('empleados.create')}}" class="btn btn-primary mb-3">Nuevo Empleado</a>
    @if (session('success'))
    <div class="alert alert-succcess">{{session('success')}}</div>
    
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ci</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>rol</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $empleados as $empleado )
                <tr>
                    <td>{{$empleados->id}}</td>
                    <td>{{$empleados->ci}}</td>
                    <td>{{$empleados->nombre_compelto}}</td>
                    <td>{{$empleados->email}}</td>
                    <td>{{$empleados->rol}}</td>
                    
                    <td>
                        <a href="{{route('empleados.edit', $empleado)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{route('empleados.destroy', $empleado)}}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro de eliminar empleado??')">Eliminar</button>
                        </form>
                            
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@stop

