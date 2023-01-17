@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->
    <style>
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
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li class="active">Reservar</li>
                </ol>
            </div>
        </header>

        @livewire('reservas-admin.reservas.eventos-postergacion.eventos-postergacion', [$reserva])
        

        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
