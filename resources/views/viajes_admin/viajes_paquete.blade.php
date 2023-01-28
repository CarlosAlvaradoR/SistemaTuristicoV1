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
                    <li><a href="#">Semana Santa</a></li>
                    <li class="active">Lista de Viajes</li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Todas los Viajes</h5>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                <div class="col-md-2">
                                    <br>
                                    <a id="modal-918849" href="#modal-container-918849" role="button" class="btn"
                                        data-toggle="modal">Nuevo Viaje</a>



                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th scope="col">#</th>-->
                                    <th scope="col">VIAJE</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">CANT. PARTICIPANTES</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Default
                                    </td>
                                    <td>
                                        Default
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('paquete.viajes.participantes') }}" title="Participantes del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Ver detalles del Paquete" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.traslados') }}" title="Traslados del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-map"></i>
                                                </a>
                                                <a href="#!" title="Participantes del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Participantes del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Participantes del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Participantes del Viaje" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <button type="button" class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;"><span
                                                        class="glyphicon glyphicon-pencil"></span></button>
                                                <button type="button" class="tabledit-delete-button btn btn-sm btn-default"
                                                    style="float: none;"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                            </div>
                                        </div>
                                    </td>

                                    <!--<td>
                                                        <a href="@!">Ver Participantes</a>
                                                        <a href="#!">Ver Rep. de Participantes</a>
                                                        <a href="#!">Ver Rep. de Itinerario Cump.</a>
                                                        <a href="#!">Ver Rep. de Gastos de Empresa.</a>
                                                    </td>-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Validation</h5>
                        <div>
                            <fieldset class="form-group has-success">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-success" id="inputSuccess1"
                                        placeholder="Input with success">
                                </div>
                            </fieldset>
                            <fieldset class="form-group has-warning">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-warning"
                                        placeholder="Input with warning">
                                </div>
                            </fieldset>
                            <fieldset class="form-group has-danger">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-danger"
                                        placeholder="Input with danger">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--.container-fluid-->

    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-container-918849"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR VIAJE - Semana Santa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="descripcion">
                                        Descripción
                                    </label>
                                    <textarea class="form-control" id="descripcion" rows="4"></textarea>
                                </div>
                                <div class="form-group">

                                    <label for="fecha_viaje">
                                        Fecha
                                    </label>
                                    <input type="date" class="form-control" id="fecha_viaje" />
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="hora_viaje">
                                        Hora
                                    </label>
                                    <input type="time" class="form-control" id="hora_viaje" />
                                </div>
                                <div class="form-group">

                                    <label for="cantidad_participantes">
                                        Cantidad de Participantes
                                    </label>
                                    <input type="number" class="form-control" id="cantidad_participantes" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
            <!-- END MODAL-->
        @endsection
