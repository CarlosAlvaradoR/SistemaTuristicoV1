<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Sistema de Paquetes Turísticos') }}</title>

    <link href="{{ asset('dashboard_assets/img/favicon.144x144.png') }}" rel="apple-touch-icon" type="image/png"
        sizes="144x144">
    <link href="{{ asset('dashboard_assets/img/favicon.114x114.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="{{ asset('dashboard_assets/img/favicon.72x72.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="{{ asset('dashboard_assets/img/favicon.57x57.png') }}" rel="apple-touch-icon" type="image/png">
    <link href="{{ asset('dashboard_assets/img/favicon.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('dashboard_assets/img/favicon.ico') }}" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/separate/pages/user.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/main.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @livewireStyles
</head>

<body class="with-side-menu">

    @include('includes.panel_dashboard.header')
    <!--.site-header-->

    <div class="mobile-menu-left-overlay"></div>

    @include('includes.panel_dashboard.nav')
    <!--.side-menu-->



    <div class="page-content">
        @yield('contenido')
    </div>
    <!--.page-content-->





    <script src="{{ asset('dashboard_assets/js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/plugins.js') }}"></script>

    <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
