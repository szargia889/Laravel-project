@extends('layouts.app')
@section('title')
    <title>Inicio</title>
@endsection
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('subirproyecto') }}" class="btn btn-info">Subir nuevo proyecto +</a>

                    <table class="table">

                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $proyecto)
                                @if ($users->rol == 0)
                                    @if ($proyecto->autor == $users->name)
                                
                                        
                                            <tr>
                                                <th>{{ $proyecto->id }}</th>
                                                <td>{{ $proyecto->nombre }}</td>
                                                <td>{{ $proyecto->autor }}</td>
                                                <td>
                                                    <a href="{{ route('editarProyecto', $proyecto) }}" class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                    </a>
                                                
                                                    <a href="{{ route('eliminarProyecto', $proyecto->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        
                                    @endif
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
