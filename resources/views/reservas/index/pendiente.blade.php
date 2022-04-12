@extends('layouts/plantilladashboard')

@section('tituloPagina','Reservas Pendientes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Reservas</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Reservas</a></li>
                            <li><a href="#">Pendientes</a></li>
                            <li class="active">Listado</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Reserva de los Clientes</h5>
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
                            <div class="col-md-2">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        Todo
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item disabled" href="#">Todo</a> 
                                        <a class="dropdown-item" href="#">Pendiente</a> 
                                        <a class="dropdown-item" href="#">Completado</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control">
                                    <span class="badge badge-default">Fecha Inicial</span> 
                                    <input type="date" class="form-control" name="" id="">
                                </div>                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-control">
                                    <span class="badge badge-default">Fecha Final</span> 
                                    <input type="date" class="form-control" name="" id="">
                                </div>                                 
                            </div>
                            <div class="col-md-4">
                                 <!--<span class="badge badge-default">Label</span> 
                                 <span class="badge badge-default">Label</span>-->
                            </div>
                            <div class="col-md-2">
                                 <!--<span class="badge badge-default">Label</span> 
                                 <span class="badge badge-default">Label</span>-->
                            </div>
                        </div>
                        <!--<hr>-->
                        <div class="row">
                            <div class="col-md-12">
                                <table id="clientes" class="display table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Datos</th>
                                            <th>DNI</th>
                                            <th>Nacionalidad</th>
                                            <th>Fecha de reserva</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Carlos Alarado Robles</td>
                                        <td>70576811</td>
                                        <td>Peruano</td>
                                        <td>15/08/2022</td>
                                        <td>Pendiente</td>
                                        <td>
                                            <div class="row-inline">
                                                <a href="{{ route('pagos.reserva') }}" title="Registrar Pago">
                                                    <span class="btn btn-success btn-sm" >
                                                        <i class="fas fa-cash-register"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('salud.cliente.reserva') }}" title="Registrar Antecedentes Médicos">
                                                    <span class="btn btn-primary btn-sm" >
                                                        <i class="fas fa-stethoscope"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('index.viajes.admin') }}" onclick="alert('Provisionalmente');" title="Programar Viaje">
                                                    <span class="btn btn-warning btn-sm" >
                                                        <i class="fas fa-shuttle-van"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('postergacion.cliente.reserva') }}" title="Desertar reserva">
                                                    <span class="btn btn-danger btn-sm" >
                                                        <i class="fas fa-minus"></i>
                                                    </span>
                                                </a>
                                                
                                            </div>
                                            
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