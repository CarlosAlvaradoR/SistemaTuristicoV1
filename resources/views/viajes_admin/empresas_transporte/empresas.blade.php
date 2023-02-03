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
                    <li class="active">Traslados del Viaje</li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Empresas de Transporte</h5>

                        <div class="row">
                            <div class="col-md-10">
                                <br>
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <a id="modal-918849" href="#modal-container-918849" role="button" class="btn"
                                    data-toggle="modal">Nueva Empresa</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">EMPRESA</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-warning"
                                            style="float: none;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <a href="{{ route('viajes.empresas_transporte.vehiculos') }}" title="Ver vehículos de la empresa" class="tabledit-edit-button btn btn-sm btn-primary" 
                                        style="float: none;">
                                            <i class="glyphicon fas fa-shuttle-van"></i>
                                        </a>
                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Participantes</h5>
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Buscar Cliente">
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <button type="button" title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
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
            </div>-->
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
                        CREAR EMPRESA DE TRANSPORTES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <label for="fecha_viaje">
                                        Nombre de Empresa de Tranporte <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="fecha" class="form-control" id="fecha_viaje" />
                                    @error('fecha')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" wire:click="saveViaje" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
@endsection
