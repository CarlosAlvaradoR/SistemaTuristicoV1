@extends('layouts.login_assets')

@section('title_content')
    Registrarse
@endsection

@section('content')
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
                value="{{ old('dni') }}" required autocomplete="dni" autofocus placeholder="Ingrese su DNI">


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

            <input id="name_personal" type="text" class="input100 @error('name_personal') is-invalid @enderror"
                name="name_personal" value="{{ old('name_personal') }}" required autocomplete="name_personal" autofocus
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

            <input id="apellido_personal" type="text" class="input100 @error('apellido_personal') is-invalid @enderror"
                name="apellido_personal" value="{{ old('apellido_personal') }}" required autocomplete="apellido_personal"
                autofocus placeholder="Ingrese su nombre de usuario">


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

            <input id="telefono" type="text" class="input100 @error('telefono') is-invalid @enderror"
                name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus
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

            <input id="direccion" type="text" class="input100 @error('direccion') is-invalid @enderror"
                name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus
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
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="Ingrese su contraseña">

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
