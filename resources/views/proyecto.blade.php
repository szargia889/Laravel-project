@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
          <h2 class="card-title">{{ $proyecto->nombre }}</h2>
          <h4 class="card-subtitle mb-2 text-muted">{{ $proyecto->autor }}</h4>
          <p class="card-text">{{ $proyecto->descripcion }}</p>
          <a href="{{ Storage::url($proyecto->pdf) }}" class="btn btn-danger">PDF</a>
          <a href="{{ Storage::url($proyecto->vm) }}" class="btn btn-primary">VM</a>
        </div>
    </div>
    <a href="{{url()->previous()}}">
        <span class="glyphicon glyphicon-menu-left"></span>Volver
    </a>
</div>


@endsection