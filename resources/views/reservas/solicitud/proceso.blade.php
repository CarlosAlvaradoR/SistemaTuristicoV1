@extends('layouts/plantilladashboard')

@section('tituloPagina','Atención de Solicitudes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Clientes</h3>
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
                <h5 class="with-border m-t-0">Solicitud por resolver</h5>
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
                            <div class="col-md-4">
                                 <span class="badge badge-default font-weight-bold">Cliente</span> <br>
                                 <span class="badge badge-default">Carlos Emilio Alvarado Robles</span> <br><br>
                                 <span class="badge badge-default font-weight-bold">Observación</span> <br>
                                 <span class="badge badge-default">Quiere que le devuelvan el dinero porque no quiere viajar</span> <br><br>
                                 <span class="badge badge-default font-weight-bold">Estado</span> <br>
                                 <!--<span class="badge badge-default">Completado (Rojo)</span> -->
                                 <span class="label label-custom label-pill label-danger">PENDIENTE</span><br><br>
                                 <span class="badge badge-default font-weight-bold">Fecha de reclamo</span> <br>
                                 <span class="badge badge-default">15/03/2018</span> <br>
                            </div>
                            <div class="col-md-8">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="exampleInputEmail1">
                                            Monto (S/.)
                                        </label>
                                        <input type="text" class="form-control" id="" placeholder="ej: 45.0" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">
                                            Observación
                                        </label>
                                        <input type="text" class="form-control" id="" placeholder="ej: No se le puede devolver porque ya venció su fechas" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="">
                                            Estado
                                        </label>
                                        <input type="text" class="form-control" id=""  placeholder="CUMPLIDO"/>
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputFile">
                                            Fecha y hora
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputFile" />
                                    </div> 
                                    <button type="submit" class="btn btn-primary">
                                        Aceptar
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