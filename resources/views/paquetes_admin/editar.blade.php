@extends('layouts/plantilladashboard')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Paquetes</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li class="active">Editar</li>
                </ol>
            </div>
        </header>
        @livewire('paquetes-admin.editar-paquetes', [$paquete])

        <!--<section class="card">
            <header class="card-header">
                Panel title
                <button type="button" class="modal-close">
                    <i class="font-icon-close-2"></i>
                </button>
            </header>
            <div class="card-block">
                <p class="card-text">Panel content</p>
            </div>
        </section>-->

        
    </div><!--.container-fluid-->
@endsection