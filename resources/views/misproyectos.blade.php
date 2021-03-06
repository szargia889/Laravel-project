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

                <form action="" method="GET" id="formCategoria" class="mb-2">
                    <select name="filtro" id="filtro" class="form-select" oninput="document.querySelector('#formCategoria').submit()" >
                        <option value="">Todos</option>
                        @foreach ($categorias as $categoria)
                        
                            <option {{session('categoriaAnterior') == $categoria->id?"selected":""}} value="{{ $categoria->id }}">{{$categoria->name}}</option>
                   
                        @endforeach
                    </select>
                    

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
                            <th>Acción</th>
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
                                @if ($users->rol == 0)
                                                           
                                            <tr>
                                                <th>{{ $proyecto->id }}</th>
                                                <td><a href="{{route('proyecto.show', $proyecto)}}">{{ $proyecto->nombre }}</a></td>
                                                <td>{{ $proyecto->autor }}</td>
                                                <td>
                                                    <a href="{{ route('proyecto.edit', $proyecto) }}" class="btn btn-warning">
                                                        <i class="bi bi-wrench"></i>
                                                    </a>
                                                
                                                    <a href="{{ route('proyecto.destroy', $proyecto->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                                                            
                                @else
                                    <tr>
                                        <th>{{ $proyecto->id }}</th>
                                        <td><a href="{{route('proyecto.show', $proyecto)}}">{{ $proyecto->nombre }}</a></td>
                                        <td>{{ $proyecto->autor }}</td>
                                        
                                    </tr>
                                
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
