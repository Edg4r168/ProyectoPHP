@extends('layouts.app')

@section('content')
    <h1>Ver grupo de estudiante</h1>
        @csrf
    <div class="row">
        <div class="col-md-6">
        <label for="estudiante_nombre" class="form-label">Estudiante</label>
            <input type="text" class="form-control" id="estudiante_nombre" name="estudiante_nombre"
                value="{{ $estudianteGrupo->estudiante->nombre }} {{ $estudianteGrupo->estudiante->apellido }}" disabled
            >
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
        <label for="grupo_nombre" class="form-label">Grupo</label>
            <input type="text" class="form-control" id="grupo_nombre" name="grupo_nombre"
                value="{{ $estudianteGrupo->grupo->nombre }}" disabled
            >
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('estudiantes_grupos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection