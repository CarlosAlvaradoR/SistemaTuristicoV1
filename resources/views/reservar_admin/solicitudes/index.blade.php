@extends('layouts/plantilladashboard')


@section('contenido')
    <!--.page-content-header-->

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservar</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Solicitud</a></li>
                    <li class="active">Reservar</li>
                </ol>
            </div>
        </header>



        <div class="row">
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Solicitud</h5>
                        <form>

                            <div class="form-group">
                                <label for="inputAddress">Fecha de Presentación</label>
                                <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Estado</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-group">
                                <label for="observacion">Observación</label>
                                <textarea class="form-control" id="observacion" rows="3"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Devolución</h5>
                        <div class="form-group">
                            <label for="monto_devolucion">Monto</label>
                            <input type="text" class="form-control" id="monto_devolucion" placeholder="Ingrese Monto de Devolucion">
                        </div>
                        <div class="form-group">
                            <label for="observacion_devolucion">Observación</label>
                            <textarea class="form-control" id="observacion_devolucion" rows="3" placeholder="Ingrese Observación de Devolución"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha_hora">Fecha - Hora</label>
                            <input type="text" class="form-control" id="fecha_hora"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
