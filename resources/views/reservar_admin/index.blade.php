@extends('layouts/plantilladashboard')


@section('contenido')
    <style>
        /* Styles for wrapping the search box */

        .main {
            width: 50%;
            margin: 50px auto;
        }

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
    <header class="page-content-header">
        <div class="container-fluid">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Paquetes Disponibles <small class="text-muted">23 Paquetes</small></h3>
                    </div>
                    <div class="tbl-cell tbl-cell-action">
                        <a href="{{ route('paquetes.create') }}" class="btn btn-rounded">Nuevo Paquete</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--.page-content-header-->

    @livewire('reservas-admin.mostrar-formulario-reservas', [$paquete])
    <br>
    </div>
    <!--.container-fluid-->
@endsection
