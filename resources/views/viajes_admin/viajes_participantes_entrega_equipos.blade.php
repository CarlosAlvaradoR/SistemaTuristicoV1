@extends('layouts/plantilladashboard')


@section('contenido')
    <style>
        /* Bootstrap 4 text input with search icon */

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Viajes</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">{{$paquete->nombre}}</a></li>
                    <li><a href="#">Viaje</a></li>
                    <li><a href="#">{{$viaje->slug}}</a></li>
                    <li class="active">Participantes</li>
                </ol>
            </div>
        </header>

        @livewire('viajes-admin.participantes.participantes-equipos', [$paquete, $viaje, $participante])
        

    </div>
    <!--.container-fluid-->
@endsection
