@extends('layouts.app')
@section('content')

<!-- Muestra los datos de proyecto específico -->

<div class="container">
    <a href="{{url()->previous()}}" class="btn btn-outline-dark mb-1">
        <i class="bi bi-arrow-90deg-left"></i> Volver
    </a>

    <div class="card">
        <div class="card-body">
          <h2 class="card-title">{{ $proyecto->nombre }}</h2>
          <h4 class="card-subtitle mb-2 text-muted">{{ $proyecto->autor }}</h4>
          <p class="card-text">{{ $proyecto->descripcion }}</p>
          <a href="{{ Storage::url($proyecto->pdf) }}" class="btn btn-danger">PDF</a>
          <a href="{{ Storage::url($proyecto->vm) }}" class="btn btn-primary">VM</a>
        </div>
    </div>
    
</div>


@endsection