@extends('layouts.app')

@section('content')
    <h1>Editar asistencia</h1>
    <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
        @csrf

        <div class="row">
        <div class="col-md-4">
            <label class="form-label">Estudiante</label>
            <input type="text" class="form-control" value="{{ $asistencia->estudiante->nombre }} {{ $asistencia->estudiante->apellido }}" disabled>
        </div>

        <div class="col-md-4">
            <label for="grupo_id" class="form-label">Grupo</label>
            <select id="grupo_id" name="grupo_id" required>
                    <option value="">Seleccionar grupo</option>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}" @if($grupo->id == $asistencia->grupo_id) selected @endif>
                            {{ $grupo->nombre }}
                        </option>
                    @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $asistencia->fecha }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="hora_entrada" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ $asistencia->hora_entrada }}" required>
        </div>
    </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection