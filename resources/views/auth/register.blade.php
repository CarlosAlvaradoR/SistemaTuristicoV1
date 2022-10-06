@extends('layouts.login_assets')

@section('title_content')
    Registrarse
@endsection

@section('content')
    <h1>Este es el registro</h1>
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">DNI</span>
            @error('dni')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="dni" type="text" class="input100 @error('dni') is-invalid @enderror" name="dni"
                value="{{ old('dni') }}" required autocomplete="dni" autofocus
                placeholder="Ingrese su DNI">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>
        
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Nombres Personales</span>
            @error('name_personal')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="name_personal" type="text" class="input100 @error('name_personal') is-invalid @enderror" name="name_personal"
                value="{{ old('name_personal') }}" required autocomplete="name_personal" autofocus
                placeholder="Ingrese su nombre de usuario">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Apellidos Personales</span>
            @error('apellido_personal')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="apellido_personal" type="text" class="input100 @error('apellido_personal') is-invalid @enderror" name="apellido_personal"
                value="{{ old('apellido_personal') }}" required autocomplete="apellido_personal" autofocus
                placeholder="Ingrese su nombre de usuario">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Género</span>
            @error('genero')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="genero" type="text" class="input100 @error('genero') is-invalid @enderror" name="genero"
                value="{{ old('genero') }}" required autocomplete="genero" autofocus
                placeholder="Ingrese su nombre de usuario">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Teléfono</span>
            @error('telefono')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="telefono" type="text" class="input100 @error('telefono') is-invalid @enderror" name="telefono"
                value="{{ old('telefono') }}" required autocomplete="telefono" autofocus
                placeholder="Ingrese su nombre de usuario">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Dirección</span>
            @error('direccion')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="direccion" type="text" class="input100 @error('direccion') is-invalid @enderror" name="direccion"
                value="{{ old('direccion') }}" required autocomplete="direccion" autofocus
                placeholder="Ingrese su dirección">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>
        

        
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Nombre</span>
            @error('name')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus
                placeholder="Ingrese su nombre de usuario">


            <!--<input class="input100" type="text" name="username" placeholder="Enter username">-->
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate="Email is required">
            <span class="label-input100">Email</span>
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese su correo">

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
                Registrarse
            </button>
        </div>
    </form>
@endsection

{{--@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection--}}
