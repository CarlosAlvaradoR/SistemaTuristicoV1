<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reporte de Solicitudes</title>
</head>

<body>
    <div class="row">
        <h4>Reporte de Reservas</h4>
    </div>

    <div class="row">
        <a href="#" class="badge badge-primary">PRÓXIMA A CUMPLIRSE: [1-10] días</a>
        <br>
        <a href="#" class="badge badge-success">EN PROGRAMACIÓN: [Mayor a 10 días]</a>
        <br>
        <a href="#" class="badge badge-danger">PASADOS DE FECHA: [No realizados]</a>
    </div>
    <div class="row">
        <small>Fecha Inicial:</small> <small>{{ date('d/m/Y', strtotime($fecha_inicial)) }}</small>
        <br>
        <small>Fecha Final:</small> <small>{{ date('d/m/Y', strtotime($fecha_final)) }}</small>
    </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><small>#</small></th>
                    <th scope="col"><small>CLIENTE</small></th>
                    <th scope="col"><small>PAQUETE</small></th>
                    <th scope="col"><small>FECHA RESERVADA</small></th>
                    <th scope="col"><small>ESTADO DE RESERVA</small></th>
                    <th scope="col"><small>DÍAS A CUMPLIRSE</small></th>
                </tr>
            </thead>
            @php
                $cont = 1;
            @endphp
            <tbody>
                @foreach ($consulta as $c)
                    <tr>
                        <th scope="row"><small>{{ $cont++ }}</small></th>
                        <td>
                            <small>{{ $c->datos }}</small>
                        </td>
                        <td>
                            <small>{{ $c->nombre }}</small>
                        </td>
                        <td><small>{{ $c->fecha_reserva }}</small></td>
                        <td><small>
                                @switch($c->estado_reserva)
                                    @case('PRÓXIMA A CUMPLIRSE')
                                        <a href="#" class="badge badge-primary">{{ $c->estado_reserva }}</a>
                                    @break

                                    @case('EN PROGRAMACIÓN')
                                        <a href="#" class="badge badge-success">{{ $c->estado_reserva }}</a>
                                    @break

                                    @case('PASADOS DE FECHA')
                                        <a href="#" class="badge badge-danger">{{ $c->estado_reserva }}</a>
                                    @break

                                    @default
                                @endswitch
                            </small></td>
                        <td><small>{{ $c->dias_faltantes }}</small></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


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
