@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Bienvenido</h1>
  
@endsection