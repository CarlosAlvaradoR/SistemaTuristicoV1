@extends('layouts/plantilladashboard')

@section('tituloPagina', 'Paquetes Turísticos')

@section('contenido')

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>
                            Paquete - {{ $paquete->nombre }}

                        </h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{-- route('paquetes.activos.galeria') --}}">Paquetes</a></li>
                            <li><a href="#">Detalles</a></li>
                            <li class="active">
                                Paquete Santa Rous
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="tabs-section">
            <div class="tabs-section-nav">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Galería
                                    <span class="label label-pill label-danger">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Mapa
                                    <span class="label label-pill label-success">2</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Lugares de visita
                                    <span class="label label-pill label-info">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Itinerario
                                    <span class="label label-pill label-warning">6</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-5" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Pagos por servicios
                                    <span class="label label-pill label-default">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Categoría de Hoteles
                                    <span class="label label-pill label-primary">4</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabs-2-tab-1">
                    @livewire('paquetes-admin.galeria.show-galerias', [$paquete->id])

                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-2">
                    @livewire('paquetes-admin.mapa.show-mapas', [$paquete->id])

                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-3">
                    @livewire('paquetes-admin.lugares.show-lugares-visita-paquetes', [$paquete->id])
                    
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-4">
                    @livewire('paquetes-admin.itinerarios.mostrar-itinerarios', [$paquete->id])
                    
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-5">
                    @livewire('paquetes-admin.boletos.mostrar-pagos-servicios', [$paquete->id])
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--  route(') }} -->

                                        <a href="{{-- route('index.formulario.nuevo.servicio', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Añadir Pago por
                                            servicios</a>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-6">

                    @livewire('show-categoria-hotel-paquetes', [$paquete->id])

                </div>
                <!--.tab-pane-->
            </div>
            <!--.tab-content-->
        </section>
        <!--.tabs-section-->


        <section class="tabs-section">
            <div class="tabs-section-nav tabs-section-nav-icons">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="fa fa-skiing-nordic"></i>
                                    Personal Acompañante
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fa fa-automobile"></i>
                                    Transporte
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-3" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fab fa-free-code-camp"></i>
                                    Alimentación Campo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-4" role="tab" data-toggle="tab">
                                <span class="nav-link-in">

                                    <i class="font-icon fa fa-box"></i>
                                    Equipo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-5" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fa fa-horse"></i>
                                    Acémilas
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <!--<i class="font-icon font-icon-speed"></i>-->
                                    <i class="font-icon fas fa-utensils"></i>
                                    Almuerzo Celebración
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.tipopersonal.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nuevo Tipo de Personal</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Tipo de Personal
                                            </th>
                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.tipo.transporte.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nuevo Vehículo</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Descripción
                                            </th>

                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Tipo de Trasnporte
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.alimentacion.campo.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nueva Alimentación Campo</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Descripción
                                            </th>

                                            <th>
                                                Tipo Alimentacion
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.equipo.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nuevo Equipo</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Equipo
                                            </th>

                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Observacion
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.tipo.acemila.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nuevas Acémilas</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Tipo
                                            </th>

                                            <th>
                                                Cantidad
                                            </th>

                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->

                                <a href="{{-- route('index.nuevo.tipo.almuerzo.paquete', $idpaquete->idpaqueteturistico) --}}" class="btn btn-primary">Nuevo Almuerzo Celebración</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Observación
                                            </th>

                                            <th>
                                                Tipo de Almuerzo
                                            </th>

                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.tab-pane-->
            </div>
            <!--.tab-content-->
        </section>
        <!--.tabs-section-->

    </div>
    <!--.container-fluid-->




@endsection


@section('scripts')
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.formEliminarItinerario')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: '¿Confirma la eliminación del registro?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Confirmar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                                Swal.fire('¡Eliminado!',
                                    'El registro ha sido eliminado exitosamente.', 'success');
                            }
                        })
                    }, false)
                })
        })()
    </script>
@endsection
