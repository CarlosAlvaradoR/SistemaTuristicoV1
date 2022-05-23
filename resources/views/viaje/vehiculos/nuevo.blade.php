@extends('layouts/plantilladashboard')

@section('tituloPagina','Nuevos Vehículo de las Empresas de Transporte')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Vehículo</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Transporte</a></li>
                            <li><a href="#">Vehículo</a></li>
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Empresa: {{$empresaIds}} - Nuevos Vehículos</h5>
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
                    <form action="{{ route('guardar.vehiculo.empresa', $empresaIds) }}" method="POST">
                        @csrf

                        <div class="container-fluid">
                            <div class="row">
                                
                                <div class="col-md-5">
                                    
                                        <div class="form-group">
                                             
                                            <label for="descripcion">
                                                Nº Placa
                                            </label>
                                            <input type="text" name="placa" class="form-control" id="placa" />
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                             
                                        <label for="descripcion">
                                            Tipo de Vehículo
                                        </label>
                                        <select class="form-control" name="tipo_vehiculo" id="tipo_vehiculo">
                                            @foreach ($tipoVehiculos as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                             
                                        <label for="descripcion">
                                            Descripción
                                        </label>
                                        <input type="text" name="descripcion" class="form-control" id="descripcion" />
                                    </div>
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
                                            Registrar
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