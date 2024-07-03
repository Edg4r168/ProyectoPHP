@extends('layouts.app')

@section('content')
    <h1>Eliminar estudiante</h1>
    <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST">
        @csrf

        <div class="row">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Estudiante</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $asistencia->estudiante->nombre }} {{ $asistencia->estudiante->apellido }}" disabled>
        </div>

        <div class="col-md-4">
            <label for="grupo" class="form-label">Grupo</label>
            <input type="text" class="form-control" id="grupo" name="grupo" value="{{ $asistencia->grupo->nombre }}" disabled>
        </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $asistencia->fecha }}" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="hora_entrada" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ $asistencia->hora_entrada }}" disabled>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Eliminar</button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection