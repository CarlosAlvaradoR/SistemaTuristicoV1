@extends('layouts/plantilladashboard')

@section('tituloPagina','Permisos de Usuarios')
    
@section('contenido')
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Usuarios</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Usuarios</a></li>
                                <li><a href="#">Permisos</a></li>
                                <li class="active">Registros</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>

            <section class="card box-typical-full-height">
                <div class="card-block">
                    <h5 class="with-border m-t-0">Permisos</h5>
                    <div class="row">
                        
                        <div class="box-typical-body">
                            <div class="table-responsive">
                                <table id="table-sm" class="table table-bordered table-hover table-sm">
                                    <thead>
                                    <tr>
                                        <th width="1">
                                            #
                                        </th>
                                        <th>Nombres</th>
                                        <th>DNI</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{$usuario->idusuarios}}</td>
                                                <td>{{$usuario->nombres.' '.$usuario->apellidos}}</td>
                                                <td>{{$usuario->dni}}</td>
                                                <td>
                                                    <a href="http://google.com" target="_blank" rel="noopener noreferrer">
                                                        <span class="btn btn-warning btn-sm" onclick="alert('HH')">
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <a href="http://" target="_blank" rel="noopener noreferrer">
                                                        <span class="btn btn-danger btn-sm" onclick="">
                                                            <span class="fa fa-trash"></span>
                                                        </span>
                                                    </a>
                                                    <a href="http://" title="Permisos" target="_blank" rel="noopener noreferrer">
                                                        <span class="btn btn-info btn-sm" onclick="">
                                                            <span class="fas fa-eye"></span>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>    
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                </div><!--.box-typical-body-->
                        
                    </div><!--.row-->

                    <h5 class="with-border m-t-lg">Opciones</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-2">
                                    
                                    <button type="button" onclick="alert('Botón Aceptar')" class="btn btn-primary">
                                        Aceptar
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    
                                    <button type="button" class="btn btn-danger">
                                        Cancelar
                                    </button>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!--.container-fluid-->    
@endsection