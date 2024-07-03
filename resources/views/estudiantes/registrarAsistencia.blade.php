@extends('layouts.app')

@section('content')
    <h1>Registrar asistencia</h1>
    <form action="{{ route('asistencias.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Nombre" required>
            </div>

            <div class="col-md-4">
                <label for="hora_entrada" class="form-label">Hora de entrada</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="Nombre" required>
            </div>
        </div>

        <br />

        <div class="row">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection