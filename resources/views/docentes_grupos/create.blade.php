@extends('layouts.app')

@section('content')
    <h1>Crear nuevo grupo de docentes</h1>
    <form action="{{ route('docentes_grupos.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="docente_id" class="form-label" required>Docente</label>
                <select name="docente_id" id="">
                    <option value="">Seleccionar docente</option>

                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="grupo_id" class="form-label" required>Grupo</label>
                <select name="grupo_id" id="">
                    <option value="">Seleccionar grupo</option>

                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="{{ route('docentes_grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection