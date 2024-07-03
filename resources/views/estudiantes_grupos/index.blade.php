@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de grupos de estudiantes</h1>
    <form action="{{ route('estudiantes_grupos.index') }}" method="GET">
        @csrf

        <div class="row">
            <label for="estudiante_id" class="form-label" required>Estudiante</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control" name="apellido" placeholder="apellido">
            </div>                
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('estudiantes_grupos.create') }}" class="btn btn-secondary">Ir a crear</a>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Estudiante</td>
                <td>Grupo</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantesGrupos as $estudianteGrupo)
                <tr>
                    <td>{{ $estudianteGrupo->estudiante->nombre }} {{ $estudianteGrupo->estudiante->apellido }}</td>
                    <td>{{ $estudianteGrupo->grupo->nombre }}</td>
                    <td>
                        <table>
                            <td><a href="{{ route('estudiantes_grupos.edit', $estudianteGrupo->id) }}" class="btn btn-warning">Editar</a></td>
                            <td><a href="{{ route('estudiantes_grupos.show', $estudianteGrupo->id) }}" class="btn btn-info">Ver</a></td>
                            <td><a href="{{ route('estudiantes_grupos.delete', $estudianteGrupo->id) }}" class="btn btn-danger">Eliminar</a></td>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            {{ $estudiantesGrupos->links() }}
        </div>
    </div>
@endsection