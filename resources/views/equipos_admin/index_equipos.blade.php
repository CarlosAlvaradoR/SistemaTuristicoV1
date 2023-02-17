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
                <li class="active">Lista de Equipos</li>
            </ol>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Todas los Equipos</h5>
                    <div class="row">
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
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Equipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--<th scope="row">1</th>-->
                                <td>SOGA</td>
                                <td>Lindo</td>
                                <td>S/. 436.90</td>
                                <td>Tipo 3</td>
                                <td>LINIO</td>
                                <td>
                                    <button id="edit" wire:click="Edit({{-- $l->id --}})"
                                        class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button id="view" wire:click="mostrarAtractivosDelLugar({{-- $l->id --}})"
                                        title="Ver Atractivos" class="btn btn-primary btn-sm">
                                        <span class="fas fa-eye"></span>
                                    </button>
                                    <button id="delete" title="Añadir Stock" data-target="#exampleModal"
                                        data-toggle="modal" class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirm({{-- $l->id --}})" title="Eliminar Mapa">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                    <button id="view" title="Remover Stock" data-target="#exampleModal"
                                        data-toggle="modal" wire:click="mostrarAtractivosDelLugar({{-- $l->id --}})"
                                        title="Ver Atractivos" class="btn btn-primary btn-sm">
                                        <span class="fas fa-eye"></span>
                                    </button>
                                    <button id="delete" title="Dar de baja" class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirm({{-- $l->id --}})" title="Eliminar Mapa">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!--.container-fluid-->



    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-equipo"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CREAR EQUIPOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Nombre de Equipo</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput"
                                    placeholder="Nombre de Equipo">
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Cantidad</label>
                                <input type="number" class="form-control maxlength-custom-message"
                                    id="exampleInputEmail1" placeholder="Enter email" maxlength="20">
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Precio</label>
                                <input type="text" class="form-control maxlength-always-show"
                                    id="exampleInputPassword1" placeholder="Password" maxlength="10">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Tipo</label>
                                <input type="text" class="form-control maxlength-always-show"
                                    id="exampleInputPassword1" placeholder="Password" maxlength="10">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-rounded">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="exampleModal"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AÑADIR - QUITAR STOCK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Ingrese Catidad a Añadir</label>
                                <input type="number" class="form-control maxlength-simple" id="exampleInput"
                                    placeholder="Cantidad">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
