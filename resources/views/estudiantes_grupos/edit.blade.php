@extends('layouts.app')

@section('content')
    <h1>Editar grupo de estudiante</h1>
    <form action="{{ route('estudiantes_grupos.update', $estudianteGrupo->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="estudiante_nombre" class="form-label">Estudiante</label>
                <input type="text" class="form-control" id="estudiante_nombre" name="estudiante_nombre"
                 value="{{ $estudianteGrupo->estudiante->nombre }} {{ $estudianteGrupo->estudiante->apellido }}" disabled
                >
                <input type="hidden" name="estudiante_id" value="{{ $estudianteGrupo->grupo_id }}">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
            <label for="grupo_id" class="form-label" required>Grupo</label>
                <select name="grupo_id" id="">
                    <option value="">Seleccionar grupo</option>

                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}" @if($grupo->id == $estudianteGrupo->grupo_id) selected @endif>
                            {{ $grupo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="{{ route('estudiantes_grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection