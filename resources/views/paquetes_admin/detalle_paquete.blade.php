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
                            <li><a href="{{ route('paquetes.index') }}">Paquetes</a></li>
                            <li><a href="#">Detalles</a></li>
                            <li class="active">
                                {{ $paquete->nombre }}
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
                    @livewire('paquetes-admin.tipo-personal.mostrar-tipo-personal-paquete', [$paquete->id])


                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                    @livewire('paquetes-admin.tipo-transporte-paquete.mostrar-tipo-transporte-paquete', [$paquete->id])

                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">
                    @livewire('paquetes-admin.tipo-alimentacion-paquete.mostrar-tipo-alimentacion-paquete', [$paquete->id])


                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-4">
                    @livewire('paquetes-admin.equipo-paquete.mostrar-equipo-paquetes', [$paquete->id])


                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-5">
                    @livewire('paquetes-admin.tipo-acemila-paquetes.mostrar-tipo-acemila-paquetes', [$paquete->id])

                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-6">
                    @livewire('paquetes-admin.tipo-almuerzo-paquetes.mostrar-tipo-almuerzo-paquetes', [$paquete->id])

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
                            <a class="nav-link active" href="#tab-autorizaciones" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-cogwheel"></i>
                                    Autorizaciones / Expedientes Médicos
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-condiciones" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-cogwheel"></i>
                                    Condiciones de Puntualidad
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-riesgos" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <span class="glyphicon glyphicon-music"></span>
                                    Riesgos
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab-autorizaciones">
                    @livewire('paquetes-admin.autorizaciones-medicas.mostrar-autorizaciones-medicas', [$paquete->id])
                </div><!--.tab-pane-->

                <div role="tabpanel" class="tab-pane fade" id="tab-condiciones">
                    @livewire('paquetes-admin.condiciones-puntualidad.mostrar-condiciones-puntualidad', [$paquete->id])
                </div><!--.tab-pane-->

                <div role="tabpanel" class="tab-pane fade" id="tab-riesgos">
                    @livewire('paquetes-admin.riesgos.mostrar-riesgos', [$paquete->id])
                </div><!--.tab-pane-->

            </div><!--.tab-content-->
        </section><!--.tabs-section-->
    </div>
    <!--.container-fluid-->




@endsection


@section('scripts')

@endsection
