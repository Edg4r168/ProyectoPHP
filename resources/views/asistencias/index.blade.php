@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de asistencia de estudiantes</h1>
    <form action="{{ route('asistencias.index') }}" method="GET">
        @csrf

        <div class="row">
            <div class="col-md-4" style="display: flex; gap: 20px; align-items: center;">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="apellido" placeholder="apellido">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>

        </div>

        <br />
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Estudiante</td>
                <td>Grupo</td>
                <td>Fecha</td>
                <td>Hora</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->estudiante->nombre }} {{ $asistencia->estudiante->apellido }}</td>
                    <td>{{ $asistencia->grupo->nombre }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->hora_entrada }}</td>
                    <td>
                        <table>
                            <td><a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a></td>
                            <td><a href="{{ route('asistencias.show', $asistencia->id) }}" class="btn btn-info">Ver</a></td>
                            <td><a href="{{ route('asistencias.delete', $asistencia->id) }}" class="btn btn-danger">Eliminar</a></td>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            {{ $asistencias->links() }}
        </div>
    </div>
@endsection