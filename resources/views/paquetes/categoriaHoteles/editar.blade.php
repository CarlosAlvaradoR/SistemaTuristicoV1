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
                <h5 class="with-border m-t-0">Nueva Categoría de Hoteles</h5>
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
                    @foreach ($categoriaHoteles as $categorias)
                        <form action="{{ route('update.categoria.hotel.paquete', $categorias->idcategoriahotel) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @php
                                $idPaquetes=$categorias->idpaqueteturistico;
                            @endphp
                            <div class="container-fluid">
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                        
                                            <div class="form-group">
                                                
                                                <label for="descripcion">
                                                    Descripción
                                                </label>
                                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{$categorias->descripcion}}</textarea>
                                            </div>
                                    
                                    </div>
                                    <div class="col-md-5">
                                       
                                            <input type="text" id="idpaqueteturistico" name="idpaqueteturistico" value="{{$categorias->idpaqueteturistico}}" hidden>
                                       
                                    
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