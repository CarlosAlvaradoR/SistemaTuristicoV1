<!DOCTYPE html>
<html>

<head>
    <title>Notificación de Estado de pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Notificación de Estado de pago</h1>
            <hr class="my-4">
            <p class="lead">Estimado/a {{ $user->nombre }},</p>
            <p class="lead">{{$mensaje}} es: {{ $paymentStatus }}.</p>
            <p class="lead"><b>Observación:</b></p>
            <p class="lead">{{$observacion}}</p>
            <p class="lead">Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con
                nuestro equipo de soporte.</p>
            <p class="lead"><b>Atentamente,</b></p>
            <p class="lead">{{$nombreEmpresa}}</p>
        </div>
    </div>
</body>

</html>
