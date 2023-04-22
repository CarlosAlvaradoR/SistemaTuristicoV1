<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reporte de Viajes Actuales</title>
</head>

<body>
    <h4>Reporte de Viajes Actuales</h4>
    {{-- date('d/m/Y', strtotime($informacion[0]->fecha_presentacion)) --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Cod.</th>
                <th scope="col">VIAJE</th>
                <th scope="col">Fecha</th>
                <th scope="col">CANT. PART.</th>
                <th scope="col">Hora</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viajes as $v)
                <tr>
                    <td>
                        {{ $v->cod_string }}
                    </td>
                    <td>
                        {{ $v->descripcion }}
                    </td>
                    <td>
                        {{ date('d/m/Y', strtotime($v->fecha)) }}
                    </td>
                    <td>
                        {{ $v->cantidad_participantes }}
                    </td>
                    <td>
                        {{ $v->hora }}
                    </td>
                    <td>
                        @switch($v->estado)
                            @case(1)
                                <span class="label label-warning">PROGRAMANDO</span>
                            @break

                            @case(2)
                                <span class="label label-primary">REALIZÁNDOCE</span>
                            @break

                            @case(3)
                                <span class="label label-success">FINALIZADO</span>
                            @break

                            @default
                        @endswitch
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
