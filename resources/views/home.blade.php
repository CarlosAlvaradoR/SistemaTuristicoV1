@extends('layouts/plantilladashboard')

@section('tituloPagina', 'Usuarios')

@section('contenido')
    {{-- <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
    <div class="container-fluid">
        <h1>Bienvenido a la aplicación - {{ Auth::user()->name }}</h1>
        <h1>Correo - {{ Auth::user()->email }}</h1>
        <h1>Estado - {{Auth::check()}}</h1>
    </div> --}}
    <!--.container-fluid-->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                Reporte de Gráficos estadísticos
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Work', 11],
                        ['Eat', 2],
                        ['Commute', 2],
                        ['Watch TV', 2],
                        ['Sleep', 7]
                    ]);

                    var options = {
                        title: 'Paquetes más comprados'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>
            <div id="piechart" style="width: 530px; height: 500px;"></div>
        </div>
        <div class="col-md-6">
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Work', 11],
                        ['Eat', 2],
                        ['Commute', 2],
                        ['Watch TV', 2],
                        ['Sleep', 7]
                    ]);

                    var options = {
                        title: 'My Daily Activities',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>
            <div id="piechart_3d" style="width: 530px; height: 500px;"></div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawStuff);

                function drawStuff() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Opening Move', 'Percentage'],
                        ["King's pawn (e4)", 44],
                        ["Queen's pawn (d4)", 31],
                        ["Knight to King 3 (Nf3)", 12],
                        ["Queen's bishop pawn (c4)", 10],
                        ['Other', 3]
                    ]);

                    var options = {
                        title: 'Chess opening moves',
                        width: 900,
                        legend: {
                            position: 'none'
                        },
                        chart: {
                            title: 'Clientes con más compras'
                        },
                        bars: 'horizontal', // Required for Material Bar Charts.
                        axes: {
                            x: {
                                0: {
                                    side: 'top',
                                    label: 'Percentage'
                                } // Top x-axis.
                            }
                        },
                        bar: {
                            groupWidth: "90%"
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                    chart.draw(data, options);
                };
            </script>
            <div id="top_x_div" style="width: 1080px; height: 500px;"></div>
        </div>
    </div>
@endsection
