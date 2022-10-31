@extends('layouts/plantilla_landing')


@section('content')
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-heading">Mi lista de Compras</h3>
                </div>
            </div>

            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datos</th>
                        <th scope="col">Fecha de Reserva</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Paquete</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($paquetes_clientes as $p)
                        <tr>
                            <th scope="row">{{$cont++}}</th>
                            <td>{{$p->datos}}</td>
                            <td>{{$p->fecha_reserva}}</td>
                            <td>{{$p->monto}}</td>
                            <td>{{$p->paquete}}</td>
                            <td><a href="">Ver detalles</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endsection
