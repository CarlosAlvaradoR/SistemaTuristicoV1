@extends('layouts/plantilladashboard')

@section('tituloPagina', 'Usuarios')

@section('contenido')
    {{-- <div class="card-body">
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
    </div> --}}
    <!--.container-fluid-->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                Lista de Reservas
            </h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Datos del Cliente
                            </th>
                            <th>
                                Fecha de reserva
                            </th>
                            <th>
                                Monto
                            </th>
                            <th>
                                Paquete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cont=1;
                        @endphp
                        @foreach ($reservas as $r)
                            <tr>
                                <td>
                                    {{$cont++}}
                                </td>
                                <td>
                                    {{$r->datos}}
                                </td>
                                <td>
                                    {{$r->fecha_reserva}}
                                </td>
                                <td>
                                    {{$r->monto}}

                                </td>
                                <td>
                                    {{$r->paquete}}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
