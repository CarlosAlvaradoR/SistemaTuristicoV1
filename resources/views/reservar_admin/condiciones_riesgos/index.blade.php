@extends('layouts/plantilladashboard')


@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Reservar</a></li>
                    <li><a href="#">Condiciones</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        </header>

        @livewire('reservas-admin.reservas.reservar-condiciones-riesgos', [$reserva])

    </div>
    <!--.container-fluid-->
@endsection
