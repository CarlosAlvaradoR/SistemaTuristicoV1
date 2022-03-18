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
                <h5 class="with-border m-t-0">Formulario de Nuevos Servicios</h5>
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
                    @foreach ($servicios as $servicio)
                        <form action="{{ route('update.servicio.paquete', $servicio->idpagoservicio) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container-fluid">
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        
                                            <div class="form-group">
                                                
                                                <label for="descripcion">
                                                    Descripción
                                                </label>
                                                <input type="text" value="{{$servicio->descripcion}}" name="descripcion" class="form-control" id="descripcion" />
                                            </div>
                                            
                                            <input type="text" name="idpaqueteturistico" value="{{$servicio->idpaqueteturistico}}" hidden>
                                            
                                    </div>
                                    <div class="col-md-5">
                                        
                                        <div class="form-group">
                                            
                                            <label for="monto">
                                                Monto
                                            </label>
                                            <input type="text" value="{{$servicio->monto}}" name="monto" class="form-control" id="monto" />
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
                                                Actualizar
                                            </button>
                                            
                                        </div>
                                        <div class="col-md-2">
                                           
                                            <a href="{{ route('paquetes.detalles',$servicio->idpaqueteturistico ) }}" class="btn btn-danger">
                                                Cancelar
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END BUTTONS-->
                        </form>
                    @endforeach
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
    </script>
@endsection