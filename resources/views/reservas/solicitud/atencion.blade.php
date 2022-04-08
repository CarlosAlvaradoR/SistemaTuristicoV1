@extends('layouts/plantilladashboard')

@section('tituloPagina','Reserva | Solicitudes por Atender')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Clientes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Paquetes</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Detalles</a></li>
                            <li class="active">Atractivos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Clientes</h5>
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
                                <div class="dropdown">
                                     
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        Todo
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                         <a class="dropdown-item" href="#">Todo</a> 
                                         <a class="dropdown-item" href="#">Completados</a> 
                                         <a class="dropdown-item" href="#">Pendientes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Cliente
                                            </th>
                                            <th>
                                                Estado
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                COMPLETADO
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                <a href="{{ route('atención.cliente.solicitud.revisar') }}">Atender</a>
                                                <a href="">Ver Estado</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                ATENDIDO
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                <a href="">Atender</a>
                                                <a href="">Ver Estado</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                PENDIENTE
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                <a href="">Atender</a>
                                                <a href="">Ver Estado</a>
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
        $(function() {
			$('#clientes').DataTable({
				responsive: true
			});
		});
    </script>

    <script>
        
    </script>
@endsection