<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>

<body>
    <h6>{{ $title }}</h6>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha de Salida</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Observación</th>
                <th scope="col">Fecha de Entrada</th>
                <th scope="col">Equipos en buen estado</th>
                <th scope="col">Observación de Entrada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mantenimientos as $index => $m)
                <tr>
                    <th scope="row"><small>{{ $index + 1 }}</small></th>
                    <td><small>{{ $m->fecha_salida_mantenimiento }}</small></td>
                    <td><small>{{ $m->cantidad }}</small></td>
                    <td>{{ $m->observacion }}</td>
                    <td>
                        <small>
                            @if ($m->fecha_entrada_equipo)
                                {{ $m->fecha_entrada_equipo }}
                            @else
                                -
                            @endif
                        </small>


                    </td>
                    <td>
                        @if ($m->cantidad_equipos_arreglados_buen_estado)
                            {{ $m->cantidad_equipos_arreglados_buen_estado }}
                        @else
                            -
                        @endif

                    </td>
                    <td>
                        @if ($m->obsDevolucion)
                            <small>{{ $m->obsDevolucion }}</small>
                        @else
                            -
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
