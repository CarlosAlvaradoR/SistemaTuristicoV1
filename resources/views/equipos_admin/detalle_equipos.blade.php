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
            <h3>Equipos</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Equipos</a></li>
                <li><a href="#">Lista de Equipos</a></li>
                <li class="active">{SOGA} - Mantenimiento - Baja</li>
            </ol>
        </div>
    </header>

    <div class="row">
        <div class="col-xxl-12 col-md-12">
            <section class="widget top-tabs">
                <header class="widget-header-dark">EQUIPO: SOGA - MARCA: STEEP</header>
                <div class="widget-tabs-nav bordered">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link green active" data-toggle="tab" href="#wt-1-tab-1" role="tab"
                                aria-expanded="true">
                                <i class="font-icon font-icon-chart-3"></i>
                                EQUIPOS EN MANTENIMIENTO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#wt-1-tab-2" role="tab" aria-expanded="false">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                EQUIPOS DADOS DE BAJA
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#wt-1-tab-3" role="tab" aria-expanded="false">
                            <i class="font-icon font-icon-pin"></i>
                            Event
                        </a>
                    </li> --}}
                    </ul>
                </div>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="wt-1-tab-1" role="tabpanel" aria-expanded="true">

                        <div class="col-md-4">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Buscar Equipo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento" href="#modal-container-918849"
                                role="button" class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte de equipos dados de baja" href="#modal-container-918849"
                                role="button" class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-equipo">
                                Nuevo Equipo
                            </button>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha de Salida</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Fecha de Entrada</th>
                                    <th scope="col">Equipos en buen estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="wt-1-tab-2" role="tabpanel" aria-expanded="false">
                        <div class="col-md-4">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Buscar Equipo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte de equipos dados de baja"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-equipo">
                                Nuevo Equipo
                            </button>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha de Baja</th>
                                    <th scope="col">Motivo de Baja</th>
                                    <th scope="col">Cantidad dado de baja</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="tab-pane" id="wt-1-tab-3" role="tabpanel" aria-expanded="false">
                    <center>Event</center>
                </div> --}}
                </div>
            </section>

        </div>
    </div>
@endsection
