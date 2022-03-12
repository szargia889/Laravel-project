@extends('layouts.app')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route('proyecto.update', $proyecto->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT');
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$proyecto->nombre}}" required autocomplete="name" autofocus>

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
                <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="descripcion">{{ $proyecto->descripcion }}</textarea>

                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            
                                                         
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Editar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection