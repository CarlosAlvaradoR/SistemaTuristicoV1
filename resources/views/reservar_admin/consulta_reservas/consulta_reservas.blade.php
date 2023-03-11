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

        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" wire:model="search" placeholder="Ingrese DNI o código de Reserva">
                        </div>

                        {{--<input type="text" class="form-control" wire:keydown.enter="buscar" wire:model.defer="dni"
                            wire:loading.attr="disabled" wire:target="buscar" placeholder="">--}}
                    </div>
                    <div class="col-md-2">

                        <button type="button" wire:click="buscar" wire:loading.attr="disabled" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <br>
                @error('dni')
                    <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="font-icon font-icon-warning"></i>
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>
        <div wire:loading wire:ignore.self>
            <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in" role="alert">
                <strong>Cargando...</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Reservas Realizadas por el Cliente</h5>
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
