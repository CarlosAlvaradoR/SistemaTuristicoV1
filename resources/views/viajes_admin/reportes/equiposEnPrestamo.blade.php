<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>

    @php
        use App\Models\Inventario\DetalleEntregas;
        use App\Models\Inventario\EntregaEquipos;
    @endphp
</head>

<body>

    @foreach ($participantes as $p)
        <h6>{{ $p->datos }}</h6>
        @php
            $entrega_equipos = EntregaEquipos::where('participantes_id', $p->id)
                ->limit(1)
                ->get();
        @endphp

        @if (count($entrega_equipos) > 0)
            @php
                $equipos_asignados = EntregaEquipos::consultarEquiposEntregadosParticipante($entrega_equipos[0]->id);
            @endphp
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Equipo / Marca</th>
                        <th scope="col">Cantidad en Préstamo</th>
                        <th scope="col">Observación</th>
                        <th scope="col">Cantidad Devuelta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos_asignados as $index => $ea)
                        <tr>
                            <td>
                                {{$index + 1}}
                            </td>
                            <td>
                                <small>{{ $ea->nombre }} - {{ $ea->marca }}</small>
                            </td>
                            <td>
                                <small>{{ $ea->cantidad }}</small>
                            </td>
                            <td>
                                <small>{{ $ea->observacion }}</small>
                            </td>
                            <td>
                                <small>{{ $ea->cantidad_devuelta }}</small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            Sin Préstamo.
        @endif
    @endforeach





</body>

</html>
