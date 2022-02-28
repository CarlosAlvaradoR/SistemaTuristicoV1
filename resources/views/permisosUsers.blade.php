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
                                <table id="table-edit" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="1">
                                            #
                                        </th>
                                        <th>Nombres</th>
                                        <th>Estado</th>
                                        <th class="table-icon-cell">
                                            <i class="font-icon font-icon-heart"></i>
                                        </th>
                                        <th class="table-icon-cell">
                                            <i class="font-icon font-icon-comment"></i>
                                        </th>
                                        <th width="120">Acciones</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date"> <a href="" class="btn btn-succes">Edit</a></td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date">6 minets ago</td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date">6 minets ago</td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date">6 minets ago</td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date">6 minets ago</td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Last quarter revene</td>
                                            <td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
                                            <td class="table-icon-cell">5</td>
                                            <td class="table-icon-cell">24</td>
                                            <td class="table-date">6 minets ago</td>
                                            <td class="table-photo">
                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                            </td>
                                        </tr>
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