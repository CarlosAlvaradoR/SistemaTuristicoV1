@extends('layouts/plantilladashboard')

@section('tituloPagina','Nuevos servicios del Paquete')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Parque Huascaran</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Paquetes</a></li>
                            <li><a href="#">Detalles</a></li>
                            <li class="active">Itinerario</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Nuevos Equipos del Paquete</h5>
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
                                    </h4> <strong>Muy bien!</strong> Pago por servicio añadido correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('guardar.equipo.paquete') }}" method="POST">
                        @csrf

                        <div class="container-fluid">
                            <div class="row">
                                
                                <div class="col-md-5">
                                    
                                        <div class="form-group">
                                             
                                            <label for="cantidad">
                                                Cantidad
                                            </label>
                                            <input type="text" name="cantidad" class="form-control" id="cantidad" />
                                        </div>
                                      
                                </div>
                                <div class="col-md-5">
                                    
                                    <div class="form-group">
                                         
                                        <label for="observacion">
                                            Observación
                                        </label>
                                        <input type="text" name="observacion" class="form-control" id="observacion" />
                                    </div>

                                    @foreach ($idpaquetes  as $idpaquete)
                                        <input type="text" id="idpaqueteturistico" name="idpaqueteturistico" value="{{$idpaquete->idpaqueteturistico}}" hidden>
                                    @endforeach
                                
                                </div>
                                <div class="col-md-5">
                                    
                                    <div class="form-group">
                                         
                                        <label for="idequipo">
                                            Equipo
                                        </label>
                                        <select id="estado" name="idequipo" id="idequipo" class="form-control">
                                            <option selected>Seleccione...</option>
                                            @foreach ($equipos as $equipo)
                                                <option value="{{$equipo->idequipo}}">{{$equipo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-2">
                                     
                                    <!--<button type="button" class="btn btn-primary">
                                        Button
                                    </button> 
                                    <button type="button" class="btn btn-danger">
                                        Button
                                    </button>
                                -->
                                </div>
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
                                            Agregar
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

@section('scripts')
    <script>
    </script>
@endsection