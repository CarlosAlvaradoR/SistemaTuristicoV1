@extends('layouts/plantilladashboard')

@section('tituloPagina','Nueva Ruta')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Usuarios</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Usuarios</a></li>
                            <li><a href="#">Nuevos</a></li>
                            <li class="active">Registros</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Nuevos Paquetes</h5>
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
                                    </h4> <strong>Muy bien!</strong> Usuario agregado correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('usuarios.create') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nombreruta">Nombre de Ruta</label>
                                <input type="text" class="form-control" name="nombreruta" id="nombreruta">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descripcionruta">Descripción de Ruta</label>
                                <input type="text" class="form-control" name="descripcionruta" id="descripcionruta">
                            </div>
                        </div>

                        <!--  BUTTONS-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                        
                                        <button type="submit" class="btn">
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
                        <!-- END BUTTONS-->
                    </form>
                </div><!--.row-->

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection