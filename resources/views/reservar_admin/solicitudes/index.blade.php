@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Solicitud</a></li>
                    <li class="active">Reservar</li>
                </ol>
            </div>
        </header>


        @livewire('reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion')
        


        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
