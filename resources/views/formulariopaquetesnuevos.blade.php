@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')
    <div class="container-fluid">
        <section class="card card-blue-fill">
            <header class="card-header">
                Formulario de Nuevos Paquetes Turísticos
                <button type="button" class="modal-close">
                    <i class="font-icon-close-2"></i>
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
                            <form action="{{ route('paquetes.turisticos.creacion') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                            <div class="form-group">
                                                 
                                                <label for="nombre">
                                                    Nombre del Paquete
                                                </label>
                                                <input type="text" name="nombre" class="form-control" id="nombre" />
                                            </div>
                                            <div class="form-group">
                                                 
                                                <label for="precio">
                                                    Monto del Paquete
                                                </label>
                                                <input type="text" name="precio" class="form-control" id="precio" />
                                            </div>
                                            <div class="form-group">
                                                 
                                                <label for="estado">
                                                    Estado del Paquete
                                                </label>
                                                <input type="text" name="estado" class="form-control" id="estado" />
                                            </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="idtipopaquete">
                                                Tipo de Paquete
                                            </label>
                                            <select id="inputState" name="idtipopaquete" id="idtipopaquete" class="form-control">
                                                <option selected>Seleccione...</option>
                                                <option value="1">Turístico</option>
                                            </select>
                                        </div>
                                            
                                            <div class="form-group">
                                                 
                                                <label for="imagen_principal">
                                                    Imagen Principal
                                                </label>
                                                <input type="file" name="imagen_principal" class="form-control-file" id="imagen_principal" accept="image/*" />
                                                <br><br>
                                                <hr>
                                                <div>
                                                    <button type="submit" class="btn btn-primary">
                                                        Guardar
                                                    </button>
                                                    
                                                    <a href="{{ route('paquetes.activos.galeria') }}" class="btn btn-danger" >Cancelar</a>
                                                </div> 
                                            </div>
                                        
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<section class="card">
            <header class="card-header">
                Panel title
                <button type="button" class="modal-close">
                    <i class="font-icon-close-2"></i>
                </button>
            </header>
            <div class="card-block">
                <p class="card-text">Panel content</p>
            </div>
        </section>-->

        
    </div><!--.container-fluid-->
@endsection