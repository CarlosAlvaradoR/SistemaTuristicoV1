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
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a id="modal-315109" href="#modal-container-315109" role="button" class="btn" data-toggle="modal">Nuevo</a>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                       
                                    </div>
                                    <div class="col-md-2">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
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


    <div class="modal fade" id="modal-container-315109" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Nuevos Clientes
                    </h5> 
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">DNI</label>
                                <input type="text" class="form-control" name="dni" id="dni">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Género</label>
                                <select id="inputState" name="genero" id="genero" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Correo</label>
                                <input type="text" class="form-control" name="correo" id="correo">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Nacionalidad</label>
                                <select id="inputState" name="idtipousuario" id="idtipousuario" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button> 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
            
        </div>
        
    </div>

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