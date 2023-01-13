@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li class="active">Reservar</li>
                </ol>
            </div>
        </header>


        <div class="row">
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Eventos de Postergación</h5>

                        <div class="form-group">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control" id="default-input" placeholder="Default input"
                                    value="Buscar evento" required>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Eventos Aceptados</h5>
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a id="modal-810730" href="#modal-container-810730" role="button" class="btn"
                                        data-toggle="modal">Añadir Evento</a>
                                    <button type="button" class="btn btn-rounded btn-inline btn-success">Finalizar</button>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
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
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="modal-container-810730" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Añadir Evento
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_del_evento">Nombre del Evento</label>
                            <input type="text" class="form-control" id="nombre_del_evento">
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>

            </div>

        </div>
        <!-- END MODAL-->

        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
