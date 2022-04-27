@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')
    <div class="container-fluid">
        <section class="card card-blue-fill">
            <header class="card-header">
                Formulario de Edición de Paquetes Turísticos
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
                    @php
                        foreach ($paqueteDetalles as $paquete) {
                            $id=$paquete->idpaqueteturistico;
                            $nombre=$paquete->nombre;
                            $precio=$paquete->precio;
                            $estado=$paquete->estado;
                            $imagen_principal="imagen/".$paquete->imagen_principal;
                        }
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('paquetes.update', $id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                            <div class="form-group">
                                                 
                                                <label for="nombre">
                                                    Nombre del Paquete
                                                </label>
                                                <input type="text" value="@php echo $nombre; @endphp" autofocus placeholder="ej: Islas Maravillas" name="nombre" class="form-control" id="nombre" />
                                            </div>
                                            <div class="form-group">
                                                 
                                                <label for="precio">
                                                    Monto del Paquete
                                                </label>
                                                <input type="text" value="@php echo $precio; @endphp" placeholder="ej: 1450.70" name="precio" class="form-control" id="precio" />
                                            </div>
                                            <div class="form-group">
                                                 
                                                <label for="estado">
                                                    Estado del Paquete
                                                </label>
                                                
                                                <select id="estado" name="estado" id="estado" class="form-control">
                                                    <option selected>Seleccione...</option>
                                                    <option value="1" @php
                                                        if ($estado == 1) {
                                                            echo 'selected';
                                                        }
                                                    @endphp>Activo</option>
                                                    <option value="2" @php
                                                    if ($estado != 1) {
                                                        echo 'selected';
                                                    }
                                                @endphp>Inactivo</option> 
                                                </select>
                                                <!--<input type="text" name="estado" class="form-control" id="estado" />-->
                                            </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="idtipopaquete">
                                                Tipo de Paquete
                                            </label>
                                            
                                            <select name="idtipopaquete" id="idtipopaquete" class="form-control">
                                                <!--<option>Seleccione...</option>-->
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{$tipo->idtipopaquete}}">{{$tipo->nombretipo}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="imagen_principal">
                                                            Imagen Principal
                                                        </label>
                                                        <input type="file" name="imagen_principal" class="form-control-file" id="imagen_principal" accept="image/*" />
                                                        <br><br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img src="{{ asset($imagen_principal) }}" class="img-rounded" alt="Imagen del Paquete" width="250" height="150">
                                                    </div>
                                                </div>
                                                
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </div><!--.container-fluid-->
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            //alert('Hola');
            $("#idtipopaquete").val("-1");
        });
    </script>
@endsection