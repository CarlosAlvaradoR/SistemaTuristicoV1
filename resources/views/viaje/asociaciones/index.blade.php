@extends('layouts/plantilladashboard')

@section('tituloPagina','Gestión de Asociaciones')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Gestión de Asociaciones</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Asociaciones</a></li>
                            <li><a href="#">Listado</a></li>
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">Lista de Asociaciones registradas</h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Asociaciones
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Asociaciones
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </tfoot>
                                <tbody> <!-- tr y td-->
                                    @php
                                        $contasociacion=1;
                                    @endphp
                                    @foreach ($asociaciones as $asociacion)
                                        <tr>
                                            <td>{{$contasociacion++}}</td>
                                            <td>{{$asociacion->nombre}}</td>
                                            <td>
                                                <button type="button" title="Editar" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                                <a href="#" class="tabledit-edit-button btn btn-sm btn-success" style="float: none;" title="Asignar Conductores">
                                                    <i class="far fa-id-card"></i>
                                                </a>
                                                <a href="" title="Quitar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="col-md-4">
                    <div class="col-xl-12">
                        <section class="box-typical steps-icon-block">
                            <form action="{{ route('guardar.asociaciones') }}" method="post">
                                @csrf
                                @if ($mensaje = Session::get('succes'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success alert-dismissable">
                                                
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                    ×
                                                </button>
                                                <h4>
                                                    Muy Bien!
                                                </h4>La asociación fue registrada correctamente
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="steps-numeric-header">
                                    <div class="steps-numeric-header-in">
                                        <ul>
                                            <li><div class="item"><span class=""></span>Registro de Asociaciones</div></li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div id="detalle">
                                    <header class="steps-numeric-title">Formulario de Registro</b></header>
        
                                        <div class="steps-numeric-inner">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="nombre">
                                                                Nombre
                                                            </label>
                                                            <input type="text" placeholder="ej: El mirador" name="nombre" class="form-control" id="nombre"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="estado">Estado</label>
                                                            <input type="text" placeholder="ej: En actividad" name="estado" class="form-control" id="estado">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    
                                </div>
                                <button type="button" id="botonAtras" class="btn btn-rounded btn-danger float-left">Cancelar</button>
                                <!--<button type="button" onclick="alert('REIRIGIR')" id="botonGuardar" class="btn btn-rounded float-right">Guardar</button>-->
                                <button type="submit" class="btn btn-rounded float-right">Guardar</button>
                                
                            </form>
                        </section><!--.steps-icon-block-->
                    </div>
                </div>
            </div>
        </div>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection