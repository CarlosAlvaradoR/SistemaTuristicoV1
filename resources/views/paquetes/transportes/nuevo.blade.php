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
                            <li class="active">Personal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Nuevos Tipos de Vehículos en el viaje</h5>
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
                                    </h4> <strong>Muy bien!</strong> Tipo de Personal añadido correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('guardar.tipo.transporte.paquete') }}" method="POST">
                        @csrf

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                         
                                        <label for="descripcion">
                                            Descripcion
                                        </label>
                                        <input type="text" name="descripcion" class="form-control" id="descripcion" />
                                    </div>
                                
                                </div>

                                <div class="col-md-1">
                                    
                                        <div class="form-group">
                                             
                                            <label for="cantidad">
                                                Cantidad
                                            </label>
                                            <input type="text" name="cantidad" class="form-control" id="cantidad" />
                                        </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    
                                        <div class="form-group">
                                             
                                            <label for="idpaqueteturistico">
                                                Tipo de Trasnporte
                                            </label>
                                            <select id="estado" name="idpaqueteturistico" id="idpaqueteturistico" class="form-control">
                                                <option selected>Seleccione...</option>
                                                @foreach ($tiposTransportes as $tipo)
                                                    <option value="{{$tipo->idtipotrasnporte}}">{{$tipo->nombretipo}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    
                                        @foreach ($idpaquetes  as $idpaquete)
                                            <input type="text" id="idtipotrasnporte" name="idtipotrasnporte" value="{{$idpaquete->idpaqueteturistico}}" hidden>
                                        @endforeach
                                        
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
                                        @foreach ($idpaquetes  as $idpaquete)
                                            <a href="{{ route('paquetes.detalles', $idpaquete->idpaqueteturistico) }}" class="btn btn-danger">Cancelar</a>
                                        @endforeach
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