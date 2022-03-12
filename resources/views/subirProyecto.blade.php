@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir proyecto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('proyecto.create') }}" enctype="multipart/form-data">
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
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion:') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>

                                @error('descripcion')
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
                        @foreach ($categorias as $categoria)
                            <div class="form-check">
                                                                    
                                <input class="form-check-input" type="checkbox" value="{{$categoria->id}}" id="categoria" name="categoria[]">
                                <label class="form-check-label" for="categoria">
                                    {{$categoria->name}}
                                </label>
                                                                
                            </div>
                        @endforeach                                     
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