@extends('layouts/plantilladashboard')

@section('tituloPagina','Pedidos a Proveedores')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Pedidos a Proveedores</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Pedidos a Proveedores</a></li>
                            <!--<li><a href="{ route('paquetes.detalles', 2) }}">Reserva</a></li>-->
                            <li class="active">Inicio</li>
                        </ol>
                    </div>
                    <div class="tbl-cell tbl-cell-action button">
                        <a href="{{ route('index.tipoComprobantes.nuevo') }}" class="btn btn-rounded btn-block">
                            Nuevo
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Lista de Pedidos</h5>
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($mensaje = Session::get('succes'))
                                <div class="alert alert-dismissable alert-success">
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4>
                                        ÉXITO!
                                    </h4> <strong>Muy bien!</strong> Atractivo de Visita agregado correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Proveedor
                                            </th>
                                            <th>
                                                Detalle de Pedido
                                            </th>
                                            <th>
                                                Monto
                                            </th>
                                            <th>
                                                Estado
                                            </th>
                                            <th>
                                                ACCIONES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                Santa Catalina EIRL
                                            </td>
                                            <td>
                                                10 sogas Open Listenig
                                            </td>
                                            <td>
                                                S/. 100
                                            </td>
                                            <td>
                                                <span class="label label-custom label-pill label-success">Pagado</span>
                                            </td>
                                            <td>
                                               
                                                <a href="{{ route('index.tipoComprobantes.editar') }}">Modificar</a>
                                                <a href="">Eliminar</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                Kirs SAC
                                            </td>
                                            <td>
                                                10 sogas Open Listenig
                                            </td>
                                            <td>
                                                S/. 100
                                            </td>
                                            <td>
                                                <span class="label label-custom label-pill label-danger">Debiendo</span>
                                            </td>
                                            <td>
                                               
                                                <a href="{{ route('index.tipoComprobantes.editar') }}">Modificar</a>
                                                <a href="">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    
    <script>
        
    </script>
@endsection