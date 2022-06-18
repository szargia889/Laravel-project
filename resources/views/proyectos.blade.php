@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
@php
    use App\Models\User;
    use Illuminate\Support\Facades\Auth; $users = Auth::User();
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proyectos') }}</div>
                <div class="card-body">

                <!-- Filtro de la vista para proyectos -->
                
                <form action="" method="GET" id="formCategoria">
                    <select name="filtro" id="filtro" class="form-select" oninput="document.querySelector('#formCategoria').submit()" >
                        <option value="">Todos</option>
                        @foreach ($categorias as $categoria)
                        
                            <option {{session('categoriaAnterior') == $categoria->id?"selected":""}} value="{{ $categoria->id }}">{{$categoria->name}}</option>
                   
                        @endforeach
                    </select>
                    

                </form>

                <form class="form-group d-flex gap-2 my-2" action="{{ route('proyecto.busqueda', 'proyectos') }}" method="GET" id="formBusqueda">
                    <input class="form-control" type="search" placeholder="Buscar..." arial-label="Search" name="busqueda">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                </form>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                <!-- Creación de la tabla para visualizar los proyectos -->
                    <table class="table">
                        @if ($users->rol == 0)
                        <a href="{{ route('proyecto.create') }}" class="btn btn-info"><i class="bi bi-plus-lg"></i> Subir nuevo proyecto</a>
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Autor</th>

                        </thead>
                        @else
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                        </thead>
                        @endif
                        <tbody>
                            @foreach ($proyectos as $proyecto)

                                                           
                                            <tr>
                                                <th>{{ $proyecto->id }}</th>
                                                <td><a href="{{route('proyecto.show', $proyecto)}}">{{ $proyecto->nombre }}</a></td>
                                                <td>{{ $proyecto->autor }}</td>

                                            </tr>
                                                                            

                            @endforeach
                        </tbody>
                    </table>
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
