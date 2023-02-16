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
            <h3>Reservas</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Reservas</a></li>
                <li class="active">Lista de Reservas</li>
            </ol>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Todas las Reservas</h5>
                    <div class="row">
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
                                role="button" class="btn" data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
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
                                <th scope="col">DNI</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Paquete</th>
                                <th scope="col">Fecha de Reserva</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $r)
                                <tr>
                                    <!--<th scope="row">1</th>-->
                                    <td>{{ $r->dni }}</td>
                                    <td>{{ $r->datos }}</td>
                                    <td>{{ $r->nombre }}</td>
                                    <td>{{ $r->fecha_reserva }}</td>
                                    <td>{{ $r->pago }}</td>
                                    <td>
                                        @if ($r->nombre_estado == 'COMPLETADO')
                                            <span class="label label-success">{{ $r->nombre_estado }}</span>
                                        @else
                                            <span class="label label-danger">{{ $r->nombre_estado }}</span>
                                        @endif
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('reservas.eventos.postergacion', $r) }}"
                                                    title="Llenar Evento de Postergación" type="button"
                                                    class="tabledit-edit-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-calendar-week"></span>
                                                </a>
                                                <a href="{{ route('reservas.solicitudes.devoluciones', $r) }}"
                                                    title="Llenar Solicitud de de Devolución" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fa-solid fa-file"></span>
                                                </a>
                                                <a href="{{ route('reservas.pagos_restantes', $r->id) }}"
                                                    title="Añadir Pago restante" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-money-check-alt"></span>
                                                </a>
                                                <a type="button" title="Editar Solicitud"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-file-edit"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-6 ks-panels-column-section">
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

    <!--.container-fluid-->
@endsection
