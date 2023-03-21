@extends('layouts.login_assets')

@section('title_content')
    {{ __('Reset Password') }}
@endsection

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="wrap-input100 validate-input m-b-18" data-validate="Email is required">
            <span class="label-input100">Correo Electrónico</span>
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Ingrese su correo">
                
            <!--<input class="input100" type="password" name="pass" placeholder="Enter password">-->
            <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            <span class="label-input100">Password</span>
            @error('password')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password" placeholder="Ingrese su contraseña">

            <!--input class="input100" type="password" name="pass" placeholder="Enter password">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            <span class="label-input100">Confirmar Password</span>
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required
                autocomplete="new-password" placeholder="Confirme su contraseña">

            <!--<input class="input100" type="password" name="pass" placeholder="Enter password">-->
            <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Resetear Password
            </button>
        </div>
    </form>
@endsection


{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }} AAA</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
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
--}}