@extends('layouts.app')
@section('content')

<!-- Muestra los datos de un usuario específico -->

<div class="container">
    <a href="{{url()->previous()}}" class="btn btn-outline-dark mb-1">
        <i class="bi bi-arrow-90deg-left"></i> Volver
    </a>

    <div class="card">
        <div class="card-body">
          <h2 class="card-title">{{ $usuario->name }}</h2>
          <h4 class="card-subtitle mb-2 text-muted">{{ $usuario->email }}</h4>

        </div>
    </div>
    
</div>


@endsection