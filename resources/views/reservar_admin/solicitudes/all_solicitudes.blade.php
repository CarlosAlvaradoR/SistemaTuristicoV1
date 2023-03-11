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
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Reservas</a></li>
                    <li class="active">Lista de Solicitudes</li>
                </ol>
            </div>
        </header>
        <!--<div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-block">
                                <div class="row justify-content-center">
                                    <fieldset class="col-md-12">
                                        <legend>Opciones</legend>
                                        <div class="row justify-content-center">
                                            <div class="form-group col-sm-12 col-lg-6">
                                                <label class="pt-2" for="price">Pago por Refrendo:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-usd"></i></div>
                                                    </div>
                                                    <input type="number" name="price" id="price" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-9 col-lg-6">
                                                <label class="pt-2" for="cost">Pago por Desempeño:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-usd"></i></div>
                                                    </div>
                                                    <input type="number" name="cost" id="cost" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>-->



        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Solicitudes Generales</h5>
                        <div class="row">
                            <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>INFORMACIÓN!</strong> Para tener en Cuenta sobre el Estado de las Solicitudes
                                <ul>
                                    <li>POR PROCESAR: Son solicitudes de Devolución que aún no han sido procesadas y faltan la verificación de éstas.</li>
                                    <li>PROCESADO: Son solicitudes que ya han sido solucionados, pero tener en cuenta que ello no implica que se haya devuelto o no el dinero, todo amerita a la situación correspondiente a una evaluación y otros factores que se manejan.</li>
                                </ul>
                            </div>

                            <div class="col-md-5">
                                <br>
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
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
                            <div class="col-md-1">
                                <br>
                                <a id="modal-918849" title="Ver Reporte de Viajes Actuales" href="#modal-container-918849"
                                    role="button" class="btn" data-toggle="modal"><i
                                        class="fas fa-file-invoice"></i></a>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <a id="modal-918849" href="#modal-container-918849" role="button" class="btn"
                                    data-toggle="modal">Nuevo Viaje</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th scope="col">#</th>-->
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha de Presentación</th>
                                    <th scope="col">Paquete</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $s)
                                    <tr>
                                        <td>{{ $s->datos }}</td>
                                        <td>{{ $s->estado }}</td>
                                        <td>{{ $s->fecha_presentacion }}</td>
                                        <td>{{ $s->nombre }}</td>
                                        <td>{{ $s->monto }}</td>
                                        <td>{{ $s->observacion }}</td>
                                        <td>
                                            <a href="{{ route('reservas.solicitudes.devoluciones', $s->id) }}"
                                                title="Ver Solicitud" type="button"
                                                class="tabledit-edit-button btn btn-sm btn-primary" style="float: none;"><i
                                                    class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- $solicitudes->links() --}}
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--.container-fluid-->
@endsection
