@extends('layouts/plantilladashboard')

@section('tituloPagina','Nuevos Bancos')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Bancos</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Bancos</a></li>
                            <!--<li><a href="{ route('paquetes.detalles', 2) }}">Reserva</a></li>-->
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Nuevos Bancos</h5>
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
                                            Nombre del Banco
                                        </label>
                                        <input type="text" placeholder="ej: BCP" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="exampleInputEmail1">
                                            Dirección 
                                        </label>
                                        <input placeholder="ej: https://bcp.com" type="email" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
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