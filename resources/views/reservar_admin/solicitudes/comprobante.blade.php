<?php
$cliente = "Luis Cabrera Benito";
$remitente = "Luis Cabrera Benito";
$web = "https://parzibyte.me/blog";
$mensajePie = "Gracias por su compra";
$numero = 1;
$descuento = 0;
$porcentajeImpuestos = 16;
$productos = [
    [
        "precio" => 50,
        "descripcion" => "Procesador AMD Ryzen 7",
        "cantidad" => 1,
    ],
    [
        "precio" => 800,
        "descripcion" => "Tarjeta de vídeo",
        "cantidad" => 2,
    ],
];
$fecha = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Factura</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 ">
            <h1>Factura</h1>
        </div>
        <div class="col-xs-2">
            <img class="img img-responsive" src="" 
            weigth="50px" height="50px" alt="Logotipo">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-10">
            <h1 class="h6"><?php echo $remitente ?></h1>
            <h1 class="h6"><?php echo $web ?></h1>
        </div>
        <div class="col-xs-2 text-center">
            <strong>Fecha</strong>
            <br>
            <?php echo $fecha ?>
            <br>
            <strong>Factura No.</strong>
            <br>
            <?php echo $numero ?>
        </div>
    </div>
    <hr>
    <div class="row text-center" style="margin-bottom: 2rem;">
        <div class="col-xs-6">
            <h1 class="h2">Cliente</h1>
            <strong><?php echo $cliente ?></strong>
        </div>
        <div class="col-xs-6">
            <h1 class="h2">Remitente</h1>
            <strong><?php echo $remitente ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $subtotal = 0;
                foreach ($productos as $producto) {
                    $totalProducto = $producto["cantidad"] * $producto["precio"];
                    $subtotal += $totalProducto;
                    ?>
                    <tr>
                        <td><?php echo $producto["descripcion"] ?></td>
                        <td><?php echo number_format($producto["cantidad"], 2) ?></td>
                        <td>$<?php echo number_format($producto["precio"], 2) ?></td>
                        <td>$<?php echo number_format($totalProducto, 2) ?></td>
                    </tr>
                <?php }
                $subtotalConDescuento = $subtotal - $descuento;
                $impuestos = $subtotalConDescuento * ($porcentajeImpuestos / 100);
                $total = $subtotalConDescuento + $impuestos;
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Subtotal</td>
                    <td>$<?php echo number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Descuento</td>
                    <td>$<?php echo number_format($descuento, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Subtotal con descuento</td>
                    <td>$<?php echo number_format($subtotalConDescuento, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Impuestos</td>
                    <td>$<?php echo number_format($impuestos, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">
                        <h4>Total</h4></td>
                    <td>
                        <h4>$<?php echo number_format($total, 2) ?></h4>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <p class="h5"><?php echo $mensajePie ?></p>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</html>