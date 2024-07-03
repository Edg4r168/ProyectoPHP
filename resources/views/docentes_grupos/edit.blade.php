@extends('layouts.app')

@section('content')
    <h1>Editar grupo de docentes</h1>
    <form action="{{ route('docentes_grupos.update', $docenteGrupo->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="docente_id" class="form-label" required>Docente</label>
                <select name="docente_id" id="docente_id">
                    <option value="">Seleccionar docente</option>
                    <!-- <script>console.log(@json($docentes));</script> -->
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}" @if($docente->id == $docenteGrupo->docente_id) selected @endif>
                            {{ $docente->nombre }} {{ $docente->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <label for="grupo_id" class="form-label" required>Grupo</label>
                <select name="grupo_id" id="">
                    <option value="">Seleccionar grupo</option>

                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}" @if($grupo->id == $docenteGrupo->grupo_id) selected @endif>
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
                <a href="{{ route('docentes_grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection