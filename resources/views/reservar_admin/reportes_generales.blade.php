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
            <h3>Reservas</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Reservas</a></li>
                <li class="active">Reportes del Módulo de Reservas</li>
            </ol>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><b>Reporte de Reservas</b>
                        <a href="#!"
                            title="Esta sección le permite consultar sobre las reservas, de acuerdo a sus necesidades. Si desea puede hacer las consultas en base a las fechas, si lo cree conveniente puede seleccionar los estados de la reserva.">
                            <i class="fas fa-info"></i>
                        </a>
                    </h5>
                    <div class="row">
                        <form name="info_reservas" id="info_reservas" action="{{ route('reservas.reporte.info.reservas') }}"
                            role="form" method="POST" target="_blank">
                            @csrf
                            @method('POST')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicial">
                                        <b>Fecha Inicial</b> <a href="#!" title="Fecha Inicial de Reserva"><i
                                                class="fas fa-info"></i></a>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_inicial" id="fecha_inicial" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_final">
                                        <b>Fecha Final</b> <a href="#!" title="Fecha Final de Reserva"><i
                                                class="fas fa-info"></i></a>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_final" id="fecha_final" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="estado_reserva"><b>Estado de la Reserva</b> <a href="#!"
                                        title="Estado de la Reserva"><i class="fas fa-info"></i></a></label>
                                <select class="form-control" name="estado_reserva" id="estado_reserva">
                                    <option value="">...Seleccione...</option>
                                    <option value="PRÓXIMA A CUMPLIRSE">PRÓXIMA A CUMPLIRSE</option>
                                    <option value="EN PROGRAMACIÓN">EN PROGRAMACIÓN</option>
                                    <option value="PASADOS DE FECHA">PASADOS DE FECHA</option>
                                    <option value="TODOS">TODOS</option>
                                </select>
                            </div><!-- onclick="document.getElementById('info_reservas').submit();" -->
                            <div class="col-md-12">
                                <br>
                                <button type="submit" name="action" id="btn-procesar-reserva" value="btn-procesar-reserva"
                                    class="btn btn-primary">
                                    Procesar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><b>Reporte de Pagos por Reserva</b></h5>
                    <div class="row">
                        <form name="pagos" role="form" id="pagos"
                            action="{{ route('reservas.reporte.pagos.reservas') }}" method="POST" target="_blank">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicial_pago">
                                        <b>Fecha Inicial</b>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_inicial_pago"
                                        id="fecha_inicial_pago" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_final_pago">
                                        <b>Fecha Final</b>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_final_pago"
                                        id="fecha_final_pago" />
                                </div>
                            </div> <!-- onclick="document.getElementById('pagos').submit();"-->
                            <div class="col-md-12">
                                <button type="submit" name="action" id="btn-procesar-pago" value="btn-procesar-pago"
                                    class="btn btn-primary">
                                    Procesar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><b>Reporte de Devoluciones por Reserva</b></h5>
                    <div class="row">
                        <form name="devoluciones" role="form" id="devoluciones"
                            action="{{ route('reservas.reporte.pagos.reservas') }}" method="POST" target="_blank">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicial_devoluciones">
                                        <b>Fecha Inicial</b>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_inicial_devoluciones"
                                        id="fecha_inicial_devoluciones" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_final_devoluciones">
                                        <b>Fecha Final</b>
                                    </label>
                                    <input type="date" class="form-control" name="fecha_final_devoluciones"
                                        id="fecha_final_devoluciones" />
                                </div>
                            </div> <!-- onclick="document.getElementById('pagos').submit();"-->
                            <div class="col-md-12">
                                <button type="submit" name="action" id="btn-procesar-pago"
                                    value="btn-procesar-devoluciones" class="btn btn-primary">
                                    Procesar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--.container-fluid-->
@endsection
