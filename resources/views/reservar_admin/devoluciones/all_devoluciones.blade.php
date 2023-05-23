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
                    <li class="active">Lista de Devoluciones</li>
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
                        <h5 class="card-title"><b>Lista de Devoluciones realizados</b></h5>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th scope="col">#</th>-->
                                    <th scope="col">Cliente</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Fecha de Presentación de Solicitud</th>
                                    <th scope="col">Monto Solicitado</th>
                                    <th scope="col">Monto Devuelto</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devoluciones as $d)
                                    <tr>
                                        <td>{{ strtoupper($d->datos) }}</td>
                                        <td>{{ $d->dni }}</td>
                                        <td>{{ $d->fecha_presentacion }}</td>
                                        <td>{{ $d->montoSolicitado }}</td>
                                        <td>{{ $d->montoDevuelto }}</td>
                                        <td>
                                            <a href="{{ route('reservas.solicitudes.devoluciones', $d->slug) }}" title="Ver Solicitud" type="button"
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
