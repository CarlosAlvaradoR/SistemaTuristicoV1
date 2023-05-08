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
    <header class="section-header">
        <div class="tbl">
            <h3>Usuarios</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Usuarios</a></li>
                <li class="active">Usuarios del Sistema</li>
            </ol>
        </div>
    </header>

    @livewire('usuarios-admin.usuarios.mostrar-usuarios')
@endsection
