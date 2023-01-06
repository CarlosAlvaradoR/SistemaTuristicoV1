@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">{{$slug->nombre}}</a></li>
                    <li class="active">Reservar</li>
                </ol>
            </div>
        </header>

        

        
        @livewire('reservas-admin.reservas.reservar-cliente', [$slug])

        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
