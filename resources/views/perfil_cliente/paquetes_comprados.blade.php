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
                        <th scope="col">Paquete</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>                        
                        <td>Ver</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>                        
                        <td>Ver</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>                        
                        <td>Ver</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
