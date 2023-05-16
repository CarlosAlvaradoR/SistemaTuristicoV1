<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SOLICITUD DE DEVOLUCIÓN</title>

</head>

<body>
    @php
        $var = count($informacion);
    @endphp
    <h4 class="text-center">SOLICITUD DE DEVOLUCIÓN</h4>

    @if (count($informacion))
        <h6 class="float-right">Solicito:
            <small>
                @if ($informacion[0]->pedido)
                    {{ $informacion[0]->pedido }}
                @else
                    NULL
                @endif
                - <b>Fech. Pres. Sol. :</b>
                @if ($informacion[0]->fecha_presentacion)
                    {{ date('d/m/Y', strtotime($informacion[0]->fecha_presentacion)) }}
                @else
                    NULL
                @endif
            </small>
        </h6>
        <br>
        <br>
        <h6>NOMBRES Y APELIDOS: <small>{{ strtoupper($informacion[0]->datos) }}</small> | PAQUETE RESERVADO:
            <small>{{ $informacion[0]->nombre }}</small> |
            FECHA RESERVADA: <small>{{ date('d/m/Y', strtotime($informacion[0]->fecha_reserva)) }}</small>
        </h6>
        <h6>FECHA DE POSTERGACIÓN: 
            <small>
                @if ($informacion[0]->fecha_postergacion)
                     {{ date('d/m/Y', strtotime($informacion[0]->fecha_postergacion)) }}
                @else
                    NULL
                @endif
               
            </small>
        </h6>
        <h6>Evento de Postergación: <small>
            @if ($informacion[0]->nombre_evento)
                {{ $informacion[0]->nombre_evento }}</small>
            @else
                No Detalla
            @endif
            
        </h6>
        <h6>Descripción/Motivo de Postergación: <small>{{ $informacion[0]->descripcion_motivo }}</small></h6>
        <h6>Estado de Solicitud: <small>{{ $informacion[0]->estado }}</small></h6>
        <h6> Documento Sustentatorio:
            <small>
                @if ($informacion[0]->documento_sustentatorio)
                    SI PRESENTÓ
                @else
                    -
                @endif
            </small>

        </h6>
        <p>{{ $informacion[0]->descripcion_solicitud }}</p>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha Pres. Solicitud</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Observación de Solicitud</th>
                    <th scope="col">Monto Solicitado</th>
                    <th scope="col">Monto Devuelto</th>
                    <th scope="col">Observación de Devolución</th>
                    <th scope="col">Fecha/Hora de Devolución</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitud_pagos_devoluciones as $spd)
                    <tr>
                        <th scope="row">1</th>
                        <td><small>12/12/2023</small></td>
                        <td>

                            @if ($spd->estdo_solicitud == 'NO DEVUELTO')
                                <span class="badge badge-pill badge-danger">{{ $spd->estdo_solicitud }}</span>
                            @else
                                <span class="badge badge-pill badge-success">{{ $spd->estdo_solicitud }}</span>
                            @endif
                        </td>
                        <td>{{ $spd->observacion }}</td>
                        <td>{{ $spd->monto }}</td>
                        <th>{{ $spd->montoDevolucion }}</th>
                        <th>{{ $spd->observacionDevolucion }}</th>
                        <th>{{ $spd->fecha_hora }}</th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <h1 class="text-danger">Necesita Llenar la Información Necesaria para poder mostrar la Información de la
            Solicitud.</h1>
    @endif



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
