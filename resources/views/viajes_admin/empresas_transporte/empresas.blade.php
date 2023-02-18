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
        <div class="tbl">
            <h3>Viajes</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Viajes</a></li>
                <li class="active">Empresas de Transporte</li>
            </ol>
        </div>
        </header>
        
        @livewire('viajes-admin.viajes.empresas-transporte.empresas-transporte')
    @endsection
