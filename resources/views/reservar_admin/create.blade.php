@extends('layouts/plantilladashboard')


@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquete</a></li>
                    <li><a href="#">{{$paquete->nombre}}</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        </header>

        @livewire('reservas-admin.reservas.reservar-cliente-nuevo', [$paquete])

    </div>
    <!--.container-fluid-->
@endsection
