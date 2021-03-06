@extends('layouts/plantilladashboard')

@section('tituloPagina','Gestión de Arrieros')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Arrieros</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Arrieros</a></li>
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
                            <h5 class="with-border m-t-0">Lista de Arrieros</h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Arriero
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
                                        Arriero
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </tfoot>
                                <tbody> <!-- tr y td-->
                                    @php
                                        $contarriero=1;
                                    @endphp
                                    @foreach ($arrieros as $arriero)
                                        <tr>
                                            <td>{{$contarriero++}}</td>
                                            <td>{{$arriero->nombres}} {{$arriero->apellidos}}</td>
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
                            <form action="{{ route('guardar.arrieros') }}" method="post">
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
                                                </h4>El Arriero fue registrado correctamente
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="steps-numeric-header">
                                    <div class="steps-numeric-header-in">
                                        <ul>
                                            <li><div class="item"><span class=""></span>Registro de Arrieros</div></li>
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
                                                            <label for="dni">DNI</label>
                                                            <input type="text" placeholder="ej: 70546535" name="dni" class="form-control" id="dni">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-12">
                                                            <label for="nombres">
                                                                Nombres
                                                            </label>
                                                            <input type="text" name="nombres"  value="Carlos Emilio" class="form-control" id="nombres"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="apellidos">
                                                                Apellidos
                                                            </label>
                                                            <input type="text" name="apellidos" value="Alvarado Robles" class="form-control" id="apellidos"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="">
                                                                Dirección
                                                            </label>
                                                            <input type="text" name="direccion" value="Las Manzaass" class="form-control" id="direccion"/>        
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="telefono">
                                                                Teléfono
                                                            </label>
                                                            <input type="text" name="telefono" value="935459929" class="form-control" id="telefono"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="correo">
                                                                Correo
                                                            </label>
                                                            <input type="email" name="correo" value="calarador@unasam.edu.pe" class="form-control" id="correo"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="genero">
                                                                Género
                                                            </label>
                                                            <select id="genero" style="" name="genero" class="form-control">
                                                                <option value="1">Masculino</option>
                                                                <option value="2">Femenino</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="nacionalidad">
                                                                Nacionalidad
                                                            </label>
                                                            <select id="nacionalidad" name="nacionalidad" class="form-control">
                                                               @foreach ($nacionalidades as $nacion)
                                                                   <option value="{{$nacion->idnacionalidad}}">{{$nacion->nombre}}</option>
                                                               @endforeach
                                                            </select>
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