@extends('layouts/plantilladashboard')


@section('contenido')
    <style>
        fieldset {
            background-color: rgba(111, 66, 193, 0.3);
            border-radius: 4px;
        }

        legend {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: var(--purple);
            font-size: 17px;
            font-weight: bold;
            padding: 3px 5px 3px 7px;
            width: auto;
        }
    </style>
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Solicitudes</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Reservar</a></li>
                    <li><a href="#">Condiciones</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="card-block">
                        <div class="row justify-content-center">
                            <fieldset class="col-md-12">
                                <legend>Opciones</legend>
                                <div class="row justify-content-center">
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label class="pt-2" for="price">Pago por Refrendo:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-usd"></i></div>
                                            </div>
                                            <input type="number" name="price" id="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-9 col-lg-6">
                                        <label class="pt-2" for="cost">Pago por Desempeño:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-usd"></i></div>
                                            </div>
                                            <input type="number" name="cost" id="cost" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Todas las Reservas</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th scope="col">#</th>-->
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha de Presentación</th>
                                    <th scope="col">Paquete</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $s)
                                    <tr>
                                        <td>{{$s->datos}}</td>
                                        <td>{{$s->estado}}</td>
                                        <td>{{$s->fecha_presentacion}}</td>
                                        <td>{{$s->nombre}}</td>
                                        <td>{{$s->monto}}</td>
                                        <td>{{$s->observacion}}</td>
                                        <td>
                                            <a href="{{ route('reservas.solicitudes.devoluciones', $s->id) }}">Ver Solicitud</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--.container-fluid-->
@endsection
