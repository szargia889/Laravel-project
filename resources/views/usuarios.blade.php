@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
@php
    use App\Models\User;
    use Illuminate\Support\Facades\Auth; $users = Auth::User();
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                <!-- Creación de la tabla para visualizar los usuarios -->
                
                    <table class="table">
                        
                        <a href="{{ route('register.create') }}" class="btn btn-info"><i class="bi bi-plus-lg"></i> Crear alumno</a>
                        
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </thead>
                        
                        <tbody>
                            
                            
                            @foreach ($usuarios as $usuario)
                                              
                                <tr>
                                                <th>{{ $usuario->id }}</th>
                                                <td><a href="{{route('usuarios.show', $usuario)}}">{{ $usuario->name }}</a></td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>
                                                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">
                                                        <i class="bi bi-wrench"></i>
                                                    </a>
                                                
                                                    <a href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
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