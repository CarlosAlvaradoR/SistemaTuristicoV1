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
            <h3>Paquetes</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Paquetes</a></li>
                <li><a href="#">Lugares Atractivos</a></li>
                <li class="active">Traslados del Viaje</li>
            </ol>
        </div>
    </header>



    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Lugares</h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Arrieros">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Nuevo Lugar</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Arriero</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Atractivos - Lugar</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Arriero">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Arriero</th>
                                <th scope="col">Monto de Pago</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="1">Total</th>

                                <th colspan="2">{{-- $total[0]->Monto --}}</th>

                            </tr>

                        </tfoot>
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


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-traslado-viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        ASIGANAR NUEVOS LUGARES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Nombre del Lugar
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" />
                                </div>
                            </div>
                        </div>
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
    </div>
    <!-- END MODAL-->


    <!-- MODAL MONTO-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMontoArriero"
        data-whatever="@fat">
        Open modal for @fat
    </button>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modalMontoArriero" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Añadir Monto y Fecha del Arriero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control"
                                        placeholder="Buscar Almuerzos de Celebración">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="monto"
                                        class="form-control" id="monto" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad de Acémilas
                                    </label>
                                    <input type="number" wire:model.defer="cantidad" autocomplete="off"
                                        class="form-control" id="cantidad" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_acemila" id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="guardarAcemilasAlquiladas" class="btn btn-rounded btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modalMontoArriero').modal('show')
            });
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modalMontoArriero').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
@endsection
