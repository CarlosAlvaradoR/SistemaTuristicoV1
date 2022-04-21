@extends('layouts/plantilladashboard')

@section('tituloPagina','Comprobantes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Comprobantes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Comprobantes</a></li>
                            <!--<li><a href="{ route('paquetes.detalles', 2) }}">Reserva</a></li>-->
                            <li class="active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0 font-weight-bold">Lista de Comprobantes</h5>
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
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                         <a href="{{ route('index.comprobante.crear') }}" class="btn btn-primary">
                                            Nuevo
                                        </a>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th>
                                                Payment Taken
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                <a href="{{ route('index.comprobante.editar') }}">Editar</a>
                                                <a href="#">Eliminar</a>
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