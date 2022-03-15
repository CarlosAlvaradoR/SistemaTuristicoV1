@extends('layouts/plantilladashboard')

@section('tituloPagina','Tipo de Paquetes')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Tipo de Paquetes</h3>
                        <!--<ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Usuarios</a></li>
                            <li><a href="#">Nuevos</a></li>
                            <li class="active">Registros</li>
                        </ol>-->
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                     <a id="modal-493895" href="#modal-container-493895" role="button" class="btn" data-toggle="modal">Nuevo Tipo</a>
                                    
                                    
                                    
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Tipo
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
                                                    Turístico
                                                </td>
                                                <td>
                                                    <a href="#modal-editar" data-toggle="modal" rel="noopener noreferrer">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <a href="" rel="noopener noreferrer">
                                                        <span class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
                                                        </span>
                                                    </a>
                                                    <a href="" title="Permisos" rel="noopener noreferrer">
                                                        <span class="btn btn-info btn-sm">
                                                            <span class="fas fa-eye"></span>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        

        <div class="modal fade" id="modal-container-493895" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Modal title
                        </h5> 
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tipo</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese nuevo tipo de paquete">
                        </div>
                    </div>
                    <div class="modal-footer">
                         
                        <button type="button" class="btn btn-primary">
                            Guardar
                        </button> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
                
            </div>
            
        </div>



        <div class="modal fade" id="modal-editar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Editar title
                        </h5> 
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tipo</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese nuevo tipo de paquete">
                        </div>
                    </div>
                    <div class="modal-footer">
                         
                        <button type="button" class="btn btn-primary">
                            Guardar
                        </button> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
                
            </div>
            
        </div>


    </div><!--.container-fluid-->
@endsection


@section('scripts')
    
@endsection