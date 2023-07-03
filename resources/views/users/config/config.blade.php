@extends('layouts/plantilladashboard')


@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <h3>Configuración</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="">Configuración de Logos</a></li>
            </ol>
        </div>
    </header>

    @livewire('usuarios-admin.usuarios.config.config')

@endsection
