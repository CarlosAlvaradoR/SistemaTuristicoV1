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
                        <h5 class="card-title">Lista de Todas las Reservas</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Fecha de Reserva</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
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
            </div>
        </div>

    </div>
    <!--.container-fluid-->
@endsection
