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
            <h3>Pedidos</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Pedidos</a></li>
                <li><a href="#">Proveedores</a></li>
                <li class="active">Cuentas Bancarias</li>
            </ol>
        </div>
    </header>



    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Cuentas Bancarias de - {Proveedor}</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">

                                <label for="exampleFormControlSelect1">Mostrar</label>
                                {{-- <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select> --}}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Registros</label>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">CREAR NUEVA CUENTA</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Banco</th>
                                <th scope="col">Nº Cuenta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SAAS</td>
                                <td>DD</td>
                                <td>F</td>
                                <td>
                                    <button id="edit" title="Editar Información de Proveedor" wire:click="Edit()"
                                        class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button id="view" wire:click="mostrarAtractivosDelLugar()"
                                        title="Eliminar Proveedor" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                    <button id="delete" title="Añadir Cuentas Bancarias" data-target="#exampleModal"
                                        data-toggle="modal" class="btn btn-success btn-sm" wire:click="deleteConfirm()">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                    <button id="view" title="Añadir Pedidos de Proveedor" data-target="#exampleModal"
                                        data-toggle="modal" wire:click="mostrarAtractivosDelLugar()" title="Ver Atractivos"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    {{-- <button id="delete" title="Dar de baja" class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirm()">
                                        <i class="fas fa-ban"></i>
                                    </button> --}}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInput">Banco</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Nº Cuenta</label>
                                    <input type="email" class="form-control maxlength-custom-message"
                                        id="exampleInputEmail1" placeholder="Ingrese Nº de Cuenta Bancaria" maxlength="20">
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputPassword1">Estado</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </fieldset>
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
