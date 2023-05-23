@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Reservas</a></li>
                    <li><a href="{{ route('reservas.index') }}">Lista de Reservas
                        </a></li>
                    <li class="active">Solicitud de Devolución</li>
                </ol>
            </div>
        </header>


        @livewire('reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion', [$reserva])



        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
