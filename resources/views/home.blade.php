@extends('layouts/plantilladashboard')

@section('tituloPagina', 'Usuarios')

@section('contenido')
    <div class="row">
        <div class="col-xl-6">
            <div style="background-color: #00a8ff" class="container-fluid">
                <div class="row">
                    <br>
                    <h5 style="text-align: center; color: aliceblue"><b>BIENVENIDO(A)</b></h5>
                </div>
            </div>

            <div class="container-fluid box-typical">
                <div class="row">
                    <div class="col-lg-12">
                        {{ strtoupper(auth()->user()->name) }} - ¡Bienvenido/a de nuevo! Nos alegra verte de vuelta en nuestra
                        aplicación web. ¡Comencemos!
                        <br>
                        Cualquier duda o consulta para el funcionamiento de la aplicación web 
                        consulte al Administrador.
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <!--.col-->
        <div class="col-xl-6">
            <div class="row">
                <div class="col-sm-6">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{$reservas->count()}}</div>
                            <div class="caption">
                                <div>Cantidad de Reservas para Hoy</div>
                            </div>
                            <div class="percent">
                                <div class="arrow up"></div>
                                <p>15%</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{$viajes->count()}}</div>
                            <div class="caption">
                                <div>Cantidad de Viajes Realizándoce Hoy</div>
                            </div>
                            <div class="percent">
                                <div class="arrow down"></div>
                                <p>11%</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box yellow">
                        <div>
                            <div class="number">{{$usuarios->count()}}</div>
                            <div class="caption">
                                <div>Cantidad de Usuarios Gestionados</div>
                            </div>
                            <div class="percent">
                                <div class="arrow down"></div>
                                <p>5%</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!--.col-->
                <div class="col-sm-6">
                    <article class="statistic-box green">
                        <div>
                            <div class="number">{{$equipos->count()}}</div>
                            <div class="caption">
                                <div>Cantidad de Equipos/Implementos</div>
                            </div>
                            <div class="percent">
                                <div class="arrow up"></div>
                                <p>84%</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!--.col-->
            </div>
            <!--.row-->
        </div>
        <!--.col-->
    </div>

    {{-- <div class="row">
        <div class="col-lg-12 col-lg-pull-6 col-md-6 col-sm-6">

            <section class="box-typical">
                <div style="background-color: #00a8ff" class="container-fluid">
                    <div class="row">
                        <br>
                        <h5 style="text-align: center; color: aliceblue"><b>BIENVENIDO(A)</b></h5>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">Bienvenido(a) - {{ auth()->user()->name }}. Acabas de iniciar sesión.</div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
                <br>

            </section>
            <!--.box-typical-->

        </div>
        <!--.col- -->

    </div> --}}


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

@endsection
