@extends('layouts.login_assets')

@section('title_content')
    Resetear Password
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100" for="email">Correo Electrónico</span>
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese su correo">

            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Enviar enlace de reestablecimiento de contraseña
            </button>
        </div>
    </form>
@endsection
