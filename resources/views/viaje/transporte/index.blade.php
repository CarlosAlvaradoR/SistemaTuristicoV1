@extends('layouts/plantilladashboard')

@section('tituloPagina','Transportes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Transporte</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Transportes</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Nuevo</a></li>
                            <li class="active">Empresas y Vehículos</li>
                        </ol>
                    </div>
                    <div class="tbl-cell tbl-cell-action button">
                        <a href="{{ route('nueva.empresa') }}" class="btn btn-primary">
                            Nueva Empresa de Transportes
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Listado de Empresas de Transporte</h5>
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
                                                Empresa
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $contEmpresas=1;
                                    @endphp
                                    <tbody>
                                        @foreach ($empresas as $empresa)
                                            <tr>
                                                <td>
                                                    {{$contEmpresas++}}
                                                </td>
                                                <td>
                                                    {{$empresa->nombre_empresa}}
                                                </td>
                                                <td>
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                        <div class="btn-group btn-group-sm" style="float: none;">
                                                            <button type="button" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;">
                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                            </button>
                                                            <a href="{{ route('nueva.vehiculo.empresa', $empresa->slug) }}" class="tabledit-edit-button btn btn-sm btn-success" style="float: none;" title="Añadir Vehículos">
                                                                <i class="fas fa-car-side"></i>
                                                            </a>
                                                            <button type="button" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
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
        $(document).ready(function(){
            $("#btn-NuevaEmpresa").click(function(){
                alert('Evento click sobre un input text con"');
            });
            //$("#nombre2").click(function(){
            /*$("input[id=nombre2]").click(function(){
                alert('Evento click sobre un input text con id="nombre2"');
            });*/
            //$(".nombre3").click(function(){
           /* $("input[class=nombre3]").click(function(){
                alert('Evento click sobre un button con class="nombre3"');
            });*/
        });
    </script>
@endsection