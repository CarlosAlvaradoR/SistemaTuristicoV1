@extends('layouts.login_assets')

@section('title_content')
    Login
@endsection
@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="label-input100">Dirección de correo electrónico</span>
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->

            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <span class="label-input100">Contraseña</span>
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password">

            <!--<input class="input100" type="password" name="pass" placeholder="Enter password">-->
            <span class="focus-input100"></span>
        </div>

        <div class="flex-sb-m w-full p-b-30">
            <div class="contact100-form-checkbox">
                <!--<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">-->
                <input class="input-checkbox100" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div>
                <a href="{{ route('password.request') }}" class="txt1">
                    Forgot Password?
                </a>
            </div>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Login
            </button>
        </div>
    </form>
@endsection