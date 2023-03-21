@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Reservas</a></li>
                    <li><a href="#">Paquete</a></li>
                    <li class="active">{{$slug->nombre}}</li>
                </ol>
            </div>
        </header>

        
        {{$hol = strtoupper(uniqid());}}
        
        @livewire('reservas-admin.reservas.reservar-cliente', [$slug])

        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
