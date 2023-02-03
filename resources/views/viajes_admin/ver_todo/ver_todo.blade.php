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
                        <h5 class="card-title">Lista de Viajes Programados</h5>

                        <div class="row">
                            <div class="col-md-5">
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
                            <div class="col-md-1">
                                <br>
                                <a id="modal-918849" title="Ver Reporte de Viajes Actuales" href="#modal-container-918849" role="button" class="btn"
                                    data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
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
                                    <th scope="col">PAQUETE</th>
                                    <th scope="col">VIAJE</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">CANT. PART.</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
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
                                        TB - Monthly
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        <div class="dropdown dropdown-status"><button
                                                class="btn btn-success dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Opciones</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.participantes', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-user-friends"></i> Part. del
                                                    Viaje</a>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                                    Detalles del
                                                    Viaje</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.traslados') --}}"><i
                                                        class="fas fa-map"></i> Traslados del
                                                    Viaje</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.almuerzos', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-utensils"></i> Almuerzos del Viaje</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.boletas_pago', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-money-check"></i> Boletas de Pago del Viaje</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.actividades_aclimatacion', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-snowboarding"></i> Actividades de Aclimatación</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.hospedaje', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-hotel"></i> Hospedajes</a>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.itinerario', [$paquete, $v->id]) --}}"><i
                                                        class="fas fa-clipboard-list"></i> Itinerarios del Viaje</a>
                                                <a class="dropdown-item" href="#!"><i
                                                        class="glyphicon fas fa-users"></i> Arrieros, Cocineros y
                                                    Guías</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{-- route('paquete.viajes.arriero', [$paquete, $v->id]) --}}">Arrieros</a>
                                                <a class="dropdown-item" href="#">Cocineros</a>
                                                <a class="dropdown-item" href="#">Guías</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-default"
                                            style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-default"
                                            style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                        CREAR TRASLADO DE VIAJES
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
                                        Descripción <span class="text-danger">(*)</span>
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="4"></textarea>
                                    @error('descripcion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="fecha_viaje">
                                        Fecha <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="date" wire:model.defer="fecha" class="form-control"
                                        id="fecha_viaje" />
                                    @error('fecha')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="hora_viaje">
                                        Monto <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="hora" class="form-control"
                                        id="hora_viaje" />
                                    @error('hora')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="cantidad_participantes">
                                        Vehículo <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('cantidad_participantes')
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
