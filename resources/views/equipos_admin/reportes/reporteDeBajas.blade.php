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
                <th scope="col">Fecha de Baja</th>
                <th scope="col">Motivo de Baja</th>
                <th scope="col">Cantidad dado de baja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bajas as $index => $b)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $b->fecha_baja }}</td>
                    <td>{{ $b->motivo_baja }}</td>
                    <td>{{ $b->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
