@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo:') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="roles" class="col-md-4 col-form-label text-md-end">{{__('Rol: ')}}</label>

                            <div class="col-md-6">
                                <select name="roles" id="roles" class="form-select">
                                    <option selected>Abre este menú</option>
                                    <option value="0">Alumno</option>
                                    <option value="1">Profesor</option>
                                </select>
                            </div>
                        </div>
                         

                         {{-- <div id="grados" class="row mb-3 d-none">

                            <label for="grado" class="col-md-4 col-form-label text-md-end">{{ __('Grado:') }}</label>

                            <div class="col-md-6">
                                <select name="grados" id="grados">
                                    <option selected>Abre este menú</option>
                                    <option value="ASIR">ASIR</option>
                                    <option value="SMR">SMR</option>
                                </select>

                            </div>    
                        </div> --}}
                         
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
   document.addEventListener("DOMContentLoaded", () => {
       const $grados = document.getElementById('grados');
       const $roles  = document.getElementById('roles');

       $roles.addEventListener('change', (event) => {
           if( event.target.value === "0" ) {
            $grados.classList.remove('d-none');
           }else {
            $grados.classList.add('d-none');
           }
       });
   });
</script> --}}
@endsection
