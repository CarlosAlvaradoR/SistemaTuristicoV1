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
                        ['Semana Santa', 11],
                        ['Paquete 2', 2],
                        ['Trujillo', 2],
                        ['Carhuaz', 2],
                        ['Huascarán', 7]
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
                        ['Cátac', 'Hours per Day'],
                        ['Recuay', 11],
                        ['Yungay', 2],
                        ['Barranca Limeña', 2],
                        ['Lima', 2],
                        ['Carhuaz', 7]
                    ]);

                    var options = {
                        title: 'Paquetes con menos compras',
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
                        ['Clientes', 'Cantidad'],
                        ["Juan Rivera", 44],
                        ["Luis Quizana", 31],
                        ["Jescenia Melgarejo", 12],
                        ["Luis Armando Mecías", 10],
                        ['Julián Arréstegui', 3]
                    ]);

                    var options = {
                        title: 'Clientes',
                        width: 900,
                        legend: {
                            position: 'none'
                        },
                        chart: {
                            title: 'Clientes con más compras'
                        },
                        bars: 'vertical', // Required for Material Bar Charts.
                        axes: {
                            x: {
                                0: {
                                    side: 'top',
                                    label: 'Cantidad'
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
