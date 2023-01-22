@extends('layouts/plantilladashboard')


@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Reservar</a></li>
                    <li><a href="#">Condiciones</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title font-weight-bold">INFORMACIÓN</h5>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">CLIENTE</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="badge badge-default">Carlos Emilio Alvarado Robles</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">PAQUETE</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="badge badge-default">Semana SANTA</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">COSTO DEL PAQUETE</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="badge badge-default">S/. 2000</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">MONTO PAGADO</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="badge badge-default">S/. 2000</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">MONTO RESTANTE</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="label label-pill label-danger">S/. 1300</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Pagos Correspondientes a la reserva</h5>

                        <div class="row">

                            <a id="modal-565707" href="#modal_pagos" role="button" class="btn"
                                data-toggle="modal">Añadir Pago Restante</a>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Fecha de Pago
                                            </th>
                                            <th>
                                                Monto S/.
                                            </th>
                                            <th>
                                                Nº de Operación
                                            </th>
                                            <th>
                                                Estado de Pago
                                            </th>
                                            <th>
                                                Archivo
                                            </th>
                                            <th>
                                                TIPO DE PAGO
                                            </th>
                                            <th>
                                                COMPROBANTE
                                            </th>
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
                                                01/04/2012
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--MODAL-->
        <div class="modal fade" id="modal_pagos" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Añadir Pago Restante
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form">
                                        <div class="form-group">

                                            <label for="monto_pago">
                                                Monto de Pago <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" class="form-control" id="monto_pago" />
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_de_pago">
                                                Fecha de Pago <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="date" class="form-control" id="fecha_de_pago" />
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_operacion">
                                                Nº de Operación
                                            </label>
                                            <input type="text" class="form-control" id="numero_operacion" />
                                        </div>
                                        <div class="form-group">
                                            <label for="estado_de_pago">
                                                Estado del Pago <span class="text-danger">(*)</span>
                                            </label>
                                            <select class="form-control" id="estado_de_pago">
                                                <option value="0" selected>... Seleccione ...</option>
                                                <option value="EN PROCESO">EN PROCESO</option>
                                                <option value="ACEPTADO">ACEPTADO</option>
                                                <option value="NO ACEPTADO">NO ACEPTADO</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="ruta_archivo_pago">
                                                Comprobante de Pago
                                            </label>
                                            <input type="file" class="form-control" id="ruta_archivo_pago" />
                                        </div>
                                        <div class="form-group">

                                            <label for="tipo_de_pago">
                                                Tipo de Pago <span class="text-danger">(*)</span>
                                            </label>
                                            <select class="form-control" id="tipo_de_pago">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </form>
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
        <!--END MODAL-->

    </div>
    <!--.container-fluid-->
@endsection
