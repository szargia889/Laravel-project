@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <ul class="list-group">
        
        <li class="list-group-item"><a href="{{route('proyecto.index2','usuarios','proyectos','categorias')}}">Todos los proyectos</a></li>
        @if ($user->rol != 1)
        <li class="list-group-item"><a href="{{route('proyecto.index','usuarios','proyectos','categorias')}}">Mis proyectos</a></li>
        <li class="list-group-item"><a href="{{route('proyecto.create')}}">Subir proyecto +</a></li>
        @endif
        

    </ul>
@endsection
