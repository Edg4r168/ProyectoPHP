@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de grupos de docentes</h1>
    <form action="{{ route('docentes_grupos.index') }}" method="GET">
        @csrf

        <div class="row">
            <label for="docente_id" class="form-label" required>Docente</label>
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
                <a href="{{ route('docentes_grupos.create') }}" class="btn btn-secondary">Ir a crear</a>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Docente</td>
                <td>Grupo</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($docentesGrupos as $docenteGrupo)
                <tr>
                    <td>{{ $docenteGrupo->docente->nombre }} {{ $docenteGrupo->docente->apellido }}</td>
                    <td>{{ $docenteGrupo->grupo->nombre }}</td>
                    <td>
                        <table>
                            <td><a href="{{ route('docentes_grupos.edit', $docenteGrupo->id) }}" class="btn btn-warning">Editar</a></td>
                            <td><a href="{{ route('docentes_grupos.show', $docenteGrupo->id) }}" class="btn btn-info">Ver</a></td>
                            <td><a href="{{ route('docentes_grupos.delete', $docenteGrupo->id) }}" class="btn btn-danger">Eliminar</a></td>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            {{ $docentesGrupos->links() }}
        </div>
    </div>
@endsection