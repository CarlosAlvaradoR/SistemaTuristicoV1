@extends('layouts/plantilladashboard')

@section('tituloPagina','Almuerzos | Paquete')
    
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
                    @foreach ($paquetesAlmuerzos  as $paquetesAlmuerzo)
                        <form action="{{ route('update.almuerzo.paquete', $paquetesAlmuerzo->idpaquete_tipoalmuerzo ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container-fluid">
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        
                                            <div class="form-group">
                                                
                                                <label for="observacion">
                                                    Observación
                                                </label>
                                                <!--<input type="text"  class="form-control" id="observacion" />-->
                                                <textarea  class="form-control" id="observacion" name="observacion" rows="3">{{$paquetesAlmuerzo->observacion}}</textarea>
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-5">
                                        
                                        

                                        
                                            <input type="text" id="idpaqueteturistico" name="idpaqueteturistico" value="{{$paquetesAlmuerzo->idpaqueteturistico}}" hidden>
                                            @php
                                                $idPaquetes=0;
                                                $idPaquetes = $paquetesAlmuerzo->idpaqueteturistico;
                                            @endphp
                    @endforeach
                                    
                                    </div>
                                    <div class="col-md-5">
                                        
                                        <div class="form-group">
                                            
                                            <label for="idtipoalmuerzo">
                                                Tipo de Almuerzos
                                            </label>
                                            <select id="idtipoalmuerzo" name="idtipoalmuerzo"  class="form-control">
                                                <option selected>Seleccione...</option>
                                                @foreach ($tiposAlmuerzos as $tipos)
                                                    <option value="{{$tipos->idtipoalmuerzo}}">{{$tipos->nombre}}</option>
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
                                                Actualizar
                                            </button>
                                            
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <a href="{{ route('paquetes.detalles', $idPaquetes ) }}" class="btn btn-danger">
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
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
    </script>
@endsection