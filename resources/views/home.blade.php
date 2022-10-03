@extends('layouts/plantilladashboard')

@section('tituloPagina', 'Usuarios')

@section('contenido')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
    <div class="container-fluid">
        <h1>Bienvenido a la aplicación - {{ Auth::user()->name }}</h1>
        <h1>Correo - {{ Auth::user()->email }}</h1>
        <h1>Estado - {{Auth::check()}}</h1>
    </div>
    <!--.container-fluid-->
@endsection
