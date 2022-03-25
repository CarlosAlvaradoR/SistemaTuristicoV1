@extends('layouts/plantilladashboard')

@section('tituloPagina','Nuevos Alimentación en campo del Paquete')
    
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
                <h5 class="with-border m-t-0">Nueva Alimentación en el campmo</h5>
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
                                    </h4> <strong>Muy bien!</strong> Agregado añadido correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach ($paquetesTiposalimentaciones as $paquetesAlimentaciones)
                            <form action="{{ route('update.alimentacion.campo.paquete', $paquetesAlimentaciones->idpaquete_tipoalimentacion) }}" method="POST">
                            @csrf
                            @method('PUT')

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                
                                                <label for="descripcion">
                                                    Descripcion
                                                </label>
                                                <input type="text" value="{{$paquetesAlimentaciones->descripcion}}" name="descripcion" class="form-control" id="descripcion" />
                                            
                                            
                                            </div>
                                            
                                            <input type="text" name="idpaqueteturistico" id="idpaqueteturistico" value="{{$paquetesAlimentaciones->idpaqueteturistico}}" hidden>
                                        
                                        </div>

                    @endforeach                    
                                        <div class="col-md-4">
                                            
                                                <div class="form-group">
                                                    
                                                    <label for="idtipoalimentacion">
                                                        Tipo de Alimentación
                                                    </label>
                                                    <select id="idtipoalimentacion" name="idtipoalimentacion" id="idtipoalimentacion" class="form-control">
                                                        <option selected>Seleccione...</option>
                                                            @foreach ($tipoAlimentaciones as $tipo)
                                                                <option value="{{$tipo->idtipoalimentacion}}">{{$tipo->nombretipo}}</option>  
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
                                                
                                                <button type="submit" class="btn btn-primary">
                                                    Modificarsa
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