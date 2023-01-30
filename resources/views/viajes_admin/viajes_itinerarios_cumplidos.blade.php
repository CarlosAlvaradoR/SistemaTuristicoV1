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
                    <li class="active">Cumplimiento de Itinerario</li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Itinerarios - {Semana Santa}</h5>
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Buscar Itinerario">
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Itinerario</th>
                                    <th scope="col">Fecha de Cumplimiento</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Caminata
                                    </td>
                                    <td>
                                        12/12/2023
                                    </td>
                                    <td>
                                        <button type="button" wire:click=""
                                            title="Marcar Como culminada"
                                            class="btn btn-sm btn-rounded btn-success">
                                            <i class="fal fa-plus"></i>
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
                                    {{-- @foreach ($participantes as $p)
                                    <tr>
                                        <td>
                                            {{$p->datos}}
                                        </td>
                                        <td>
                                            <button type="button" wire:click="quitarParticipante({{$p->id}})" title="Quitar de la Lista de Participantes"
                                                class="btn btn-sm btn-rounded btn-danger">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>-->
        </div>


    </div>
    <!--.container-fluid-->
@endsection
