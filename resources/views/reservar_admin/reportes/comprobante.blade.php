<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>{{ strtoupper($informacion[0]->datos) }} - {{ $informacion[0]->nombre }} -
        {{ date('d/m/Y', strtotime($informacion[0]->fecha_reserva)) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #eee;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>
</head>

<body>
    <div class="col-md-12" style="text-align: center">
        <button type="button" id="crearpdf" class="btn btn-primary">Imprimir</button>
    </div>
    <div class="col-md-12" id="contenedor">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan"
                                    src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                    style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                @if ($conf->nombre_de_la_empresa)
                                    <h5>{{ $conf->nombre_de_la_empresa }}</h5>
                                @else
                                    <h5>TRAVELO</h5>
                                @endif

                                <p>
                                    @if ($conf->telefono_de_contacto_de_la_empresa)
                                        {{ $conf->telefono_de_contacto_de_la_empresa }}
                                    @else
                                        +51 939883388
                                    @endif

                                    <i class="fa fa-phone"></i>
                                </p>
                                {{-- <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="43202c2e33222d3a03242e222a2f6d202c2e">[email&#160;protected]</a>
                                    <i class="fa fa-envelope-o"></i></p> --}}
                                <p>
                                    @if ($conf->direccion_de_la_empresa)
                                        {{ $conf->direccion_de_la_empresa }}
                                    @else
                                        PERÚ-ÁNCASH-HUARAZ
                                    @endif

                                    <i class="fa fa-location-arrow"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>{{ strtoupper($informacion[0]->datos) }}</h5>
                                <p><b>Móvil :</b> {{ $informacion[0]->telefono }} </p>
                                <p><b>Paquete :</b> {{ $informacion[0]->nombre }}</p>
                                <p><b>Fecha Reservada:</b>
                                    {{ date('d/m/Y', strtotime($informacion[0]->fecha_reserva)) }}</p>

                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h5><b>{{ $numeroSerie[0]->nombre_tipo }}</b></h5>
                                <h6>{{ $numeroSerie[0]->numero_serie }} - {{ $numeroSerie[0]->numero_de_serie }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Paquete</th>
                                <!--Descripción-->
                                <th>Viaje</th>
                                <th>Monto</th>
                                <th>Fecha de Pago</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $monto = 0;
                                $cont = 1;
                                //$cantidad_pagos = count($pagos_aceptados);
                            @endphp

                            <tr>
                                <td class="col-md-3" rowspan="{{ count($pagos_aceptados) + 1 }}">1</td>
                                <td class="col-md-2" rowspan="{{ count($pagos_aceptados) + 1 }}">
                                    {{ $informacion[0]->nombre }}</td>
                                <td class="col-md-4" rowspan="{{ count($pagos_aceptados) + 1 }}">-</td>
                            </tr>
                            @foreach ($pagos_aceptados as $p)
                                <tr>
                                    <td class="col-md-3"><i class="fa fa-inr"></i> {{ $p->monto }}</td>
                                    <td class="col-md-3"><i class="fa fa-inr"></i>
                                        {{ date('d/m/Y', strtotime($p->fecha_pago)) }}</td>
                                    <td class="col-md-3"><i class="fa fa-inr"></i> {{ $p->monto }}</td>

                                    @php
                                        $monto += $p->monto;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="5">Total</th>

                                <td colspan="1"><b>{{ number_format($monto, 2) }}</b></td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                @php
                                    $tiempo_en_segundos = time();
                                    $fecha_actual = date('d-m-Y h:i:s', $tiempo_en_segundos);
                                @endphp
                                <p><b>Fecha :</b> {{ $fecha_actual }}</p>
                                <h5 style="color: rgb(140, 140, 140);">Gracias por su preferencia. !</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>TRAVELO</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let boton = document.getElementById("crearpdf");
            let container = document.getElementById("contenedor");

            boton.addEventListener("click", event => {
                event.preventDefault();
                boton.style.display = "none";
                window.print();
            }, false);

            container.addEventListener("click", event => {
                boton.style.display = "initial";
            }, false);

        }, false);
    </script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
