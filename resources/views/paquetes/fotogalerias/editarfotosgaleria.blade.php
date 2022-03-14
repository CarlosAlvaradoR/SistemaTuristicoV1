@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')
    <div class="container-fluid">
        <section class="card card-blue-fill">
            <header class="card-header">
                Actualización de Información de Galerías
                <button type="button" class="modal-close">
                    <!--<i class="font-icon-close-2"></i>-->
                </button>
            </header>
            <div class="card-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($mensaje = Session::get('succes'))
                                <div class="alert alert-success alert-dismissable">
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4>
                                        MUY BIEN!
                                    </h4>Paquete insertado correctamente
                                </div>
                            @endif
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($datos as $dato)
                                <form action="{{ route('paquetes.turisticos.actualizar.galeria', $dato->idfotogaleria) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                                <div class="form-group">
                                                    
                                                    <label for="descripcionfoto">
                                                        Descripción del Paquete
                                                    </label>
                                                    <input type="text" name="descripcionfoto" class="form-control" id="descripcionfoto" value="{{$dato->descripcionfoto}}" />
                                                </div>
                                                
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                    <label for="imagen">
                                                        Imagen Principal
                                                    </label>
                                                    <input type="file" name="imagen" class="form-control-file" id="imagen" accept="image/*" />
                                                
                                                    <br><br>
                                                    <hr>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary">
                                                            Actualizar
                                                        </button>
                                                        
                                                        <a href="{{ route('paquetes.activos.galeria') }}" class="btn btn-danger" >Cancelar</a>
                                                    </div> 
                                                </div>
                                            
                                            
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        
    </div><!--.container-fluid-->
@endsection