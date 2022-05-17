@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

<div class="container-fluid">
    <header class="section-header">
        <div class="tbl">
            <h3>Reservas</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Reservas</a></li>
                <li><a href="#">Formulario</a></li>
                <li class="active">Nuevo</li>
            </ol>
        </div>
    </header>

    <section class="card">
        <form action="{{ route('guardar.reservas') }}" method="post">
            @csrf
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="m-t-lg with-border m-t-0"><i class="fas fa-chalkboard-teacher"></i> Cliente</h5>
    
                        <div class="form-group">
                            <div class="form-group col-md-12">
                                <label for="dni">DNI</label>
                                <input type="text" placeholder="ej:70546535" name="dni" class="form-control" id="dni">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombres">
                                    Nombres
                                </label>
                                <input type="text" name="nombres"  value="Carlos Emilio" class="form-control" id="nombres"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellidos">
                                    Apellidos
                                </label>
                                <input type="text" name="apellidos" value="Alvarado Robles" class="form-control" id="apellidos"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">
                                    Dirección
                                </label>
                                <input type="text" name="direccion" value="Las Manzaass" class="form-control" id="direccion"/>        
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefono">
                                    Teléfono
                                </label>
                                <input type="text" name="telefono" value="935459929" class="form-control" id="telefono"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="correo">
                                    Correo
                                </label>
                                <input type="text" name="correo" value="calarador@unasam.edu.pe" class="form-control" id="correo"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="genero">
                                    Género
                                </label>
                                <select id="genero" class="form-control">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nacionalidad">
                                    Nacionalidad
                                </label>
                                <input type="text" value="PERUANO" class="form-control" name="nacionalidad" id="nacionalidad"/>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        <h5 class="m-t-lg with-border m-t-0"><i class="fas fa-list"></i> Condiciones</h5>
    
                        <div class="form-group">
                            <div class="col-md-3 col-sm-6">
                                <div class="checkbox-bird">
                                    <input type="checkbox" id="check-bird-8"/>
                                    <label for="check-bird-8">Muerte</label>
                                </div>
                                <div class="checkbox-bird">
                                    <input type="checkbox" id="check-bird"/>
                                    <label for="check-bird">Caídas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--.row-->
    
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="m-t-lg with-border m-t-0"><i class="fas fa-exclamation-circle"></i> Riesgos</h5>
    
                        <div class="form-group">
                            <div class="col-md-3 col-sm-6">
                                <div class="checkbox-bird">
                                    <input type="checkbox" id="check-bird-8"/>
                                    <label for="check-bird-8">Muerte</label>
                                </div>
                                <div class="checkbox-bird">
                                    <input type="checkbox" id="check-bird"/>
                                    <label for="check-bird">Caídas</label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        <h5 class="m-t-lg with-border m-t-0"><i class="fas fa-stethoscope"></i> Salud</h5>
    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">    
                                        <label for="">
                                            Nº de Autorización
                                        </label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
                                            Justificación Médica
                                        </label>
                                        <input type="file" class="form-control-file" id="exampleInputFile" /> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--.row-->
    
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="m-t-lg with-border m-t-0"><i class="far fa-credit-card"></i> Pagos</h5>
    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">    
                                        <label for="paquete">Paquete</label>
                                        <select id="paquete" name="paquete" class="form-control">
                                            @foreach ($paquetes as $paquete)
                                                <option value="{{$paquete->idpaqueteturistico}}">{{$paquete->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">    
                                        <label for="viaje">Viaje</label>
                                        <select id="viaje" name="viaje" class="form-control">
                                            @foreach ($viajes as $viaje)
                                                <option value="{{$viaje->id}}">{{$viaje->descripcion}} - {{$viaje->fecha}} {{$viaje->hora}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="monto">
                                            Monto
                                        </label>
                                        <input type="file" class="form-control-file" id="monto" /> 
                                    </div>
                                </div>
    
                                <div class="col-md-9">
                 
                                    <button type="button" class="btn btn-danger float-right justify-content-between">
                                        Cancelar
                                    </button> 
    
                                    <button type="submit" class="btn btn-primary float-right">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    
                </div>
    
            </div>
        </form>
        
    </section>
</div><!--.container-fluid-->

<!--
http://www.forosdelweb.com/f13/obtener-solo-valor-tr-con-onclick-1004289/
-->
    
@endsection



@section('scripts')
    <script>
       
    </script>
@endsection