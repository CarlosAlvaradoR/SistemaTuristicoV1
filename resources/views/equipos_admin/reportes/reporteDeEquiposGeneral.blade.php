<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>{{$title}}</title>
</head>

<body>
    <h6>Lista de Equipos con los que se cuenta</h6>
    <h6>Fecha: {{now()}}</h6>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Equipo / Marca</th>
                <th scope="col">Stock</th>
                <th scope="col">Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $index => $e)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $e->nombre }} / {{ $e->marca }}</td>
                    <td>{{ $e->stock }}</td>
                    <td>{{ $e->tipo }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
