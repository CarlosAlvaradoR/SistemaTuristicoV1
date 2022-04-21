@extends('layouts/plantilladashboard')

@section('tituloPagina','Editar Proveedores')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Proveedores</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Proveedores</a></li>
                            <!--<li><a href="{ route('paquetes.detalles', 2) }}">Reserva</a></li>-->
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Nuevos Proveedores</h5>
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
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="exampleInputEmail1">
                                            RUC
                                        </label>
                                        <input type="text" value="92288264636464" placeholder="ej:8826236252625" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputPassword1">
                                            Proveedor
                                        </label>
                                        <input type="text" value="Santa Catalina del Colca" placeholder="ej: Santa Catalina del Valle" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputFile">
                                            Dirección
                                        </label>
                                        <input type="text" value="Los Girasoles - Huaraz" placeholder="ej: Los Girasoles Huaraz" class="form-control" id="exampleInputPassword1" />
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="exampleInputEmail1">
                                            Teléfono
                                        </label>
                                        <input placeholder="9787636363" value="986736362" type="email" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputPassword1">
                                            E-mail
                                        </label>
                                        <input type="text" value="colca@gmail.com" placeholder="ej: elvale@gmail.com" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputFile">
                                            Dirección Web
                                        </label>
                                        <input type="text" value="https://girasoles.cm" placeholder="ej: https://girasoles.cm" class="form-control" id="exampleInputPassword1" />
                                        
                                    </div> 
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Cancelar
                                    </button>
                                </form>
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
        
    </script>
@endsection