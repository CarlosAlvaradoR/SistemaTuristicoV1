@extends('layouts/plantilladashboard')

@section('tituloPagina','Nueva Ruta del Paquete')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Parque Huscaran</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Paquetes</a></li>
                            <li><a href="#">Detalles</a></li>
                            <li class="active">Atractivos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Nuevos Atractivos</h5>
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
                                    </h4> <strong>Muy bien!</strong> Ruta agregada correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('paquetes.detalles.guardar.mapas') }}" method="POST">
                        @csrf

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    
                                        <div class="form-group">
                                             
                                            <label for="lugar">
                                                Lugar
                                            </label>
                                            
                                            <select class="select form-control" id="lugar">
                                                
                                                <option value='audi'>Audi</option>
                                                <option value='bmw'>BMW</option>
                                                <option value='citroen'>Citroen</option>
                                                <option value='fiat'>Fiat</option>
                                                <option value='ford'>Ford</option>
                                                <option value='honda'>Honda</option>
                                                <option value='hyundai'>Hyundai</option>
                                                <option value='kia'>Kia</option>
                                                <option value='mazda'>Mazda</option>
                                            </select>
                                        </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    
                                        <div class="form-group">
                                             
                                            <label for="atractivo">
                                                Atractivo
                                            </label>
                                            <input type="text" class="form-control" id="atractivo" />
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
                                            Aceptar
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
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>





<script>
    /*$('#lugar').select2({    
    language: {

        noResults: function() {

        return "No hay resultado";        
        },
        searching: function() {

        return "Buscando..";
        }
    }
    });*/
</script>
@endsection