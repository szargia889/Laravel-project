<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="resources\css\estilos.css">

    <title>Subir proyecto</title>

    <style>
        div{
            padding: 10px;
        }

    </style>
</head>
<body>
    <h1>Subir nuevo proyecto</h1>
    @foreach($errors->all() as $error )
        <p style="color:crimson;">{{ $error }}</p>
    @endforeach
    <form action="{{ route('subirproyecto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nombre: </label>
            <input type="text" id="name" placeholder="Nombre" name="name" value="{{old('name')}}">
        </div>

        <div>
            <label for="pdf">PDF: </label>
            <input type="file" id="pdf" name="pdf"><br>
        </div>

        <div>
            <label for="vm">VM: </label>
            <input type="file" id="vm" name="vm"><br>
        </div>
        
        <div>
            <button type="submit">Subir!</button>
        </div>



    </form>
</body>
</html>
-->

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir proyecto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('subirproyecto') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pdf" class="col-md-4 col-form-label text-md-end">{{ __('PDF:') }}</label>

                            <div class="col-md-6">
                                <input id="pdf" name="pdf" type="file" class="form-control @error('pdf') is-invalid @enderror" required autocomplete="pdf">

                                @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>
                        
                        <div class="row mb-3">
                            <label for="vm" class="col-md-4 col-form-label text-md-end">{{ __('VM:') }}</label>

                            <div class="col-md-6">
                                <input id="vm" type="file" class="form-control @error('vm') is-invalid @enderror" name="vm" required autocomplete="vm">

                                @error('vm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>
                                                                         
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Subir') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection