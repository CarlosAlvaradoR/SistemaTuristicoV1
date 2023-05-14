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

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Actividad
                </th>

                <th>
                    Descripcion del Itinerario
                </th>
                
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
                use App\Models\ItinerarioPaquetes;
            @endphp

            @foreach ($actividades as $index => $a)
                <tr>
                    @php
                        $itinerario = ItinerarioPaquetes::where('actividad_id', $a->id)->get();
                    @endphp

                    <td scope="row" rowspan="{{ $itinerario->count() + 1 }}">
                        <b>{{ $index + 1 }}</b>
                    </td>
                    <td rowspan="{{ $itinerario->count() + 1 }}">
                        {{ $a->nombre_actividad }}
                    </td>

                    @if (count($itinerario) == 0)
                        <td rowspan="1">
                            <span class="label label-danger">Sin Itinerarios Registrados</span>
                        </td>
                        
                    @endif
                </tr>

                @if (count($itinerario) > 0)
                    @foreach ($itinerario as $ai)
                        <tr>
                            <td>

                                {{ $ai->descripcion }}
                                @if (!$ai->descripcion)
                                    <span class="label label-danger">Sin Itinerarios Registrados</span>
                                @endif
                            </td>
                           
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
