@extends('layouts.app')

@section('content')
    <h1>Login estudiante</h1>
    <form action="{{ route('estudiantes.login') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="pin" class="form-label">Pin</label>
                <input type="password" class="form-control" id="pin" name="pin" required>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </div>
    </form>

   
    <div class="row" style="margin-top: 10px" >
        @error('InvalidCredentials')
            <div class="alert alert-error fade show" id="success-message" data-bs-dismiss="alert" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
@endsection