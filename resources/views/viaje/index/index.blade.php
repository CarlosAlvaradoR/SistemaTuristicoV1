@extends('layouts/plantilladashboard')

@section('tituloPagina','Programación de Viajes')
    
@section('contenido')
    <div class="container-fluid">
        @php
            foreach ($detalles as $detalle) {
                $idPackage=$detalle->idpaqueteturistico;
                $nombre=$detalle->nombre;
            }
        @endphp
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Viajes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Viajes</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Programación</a></li>
                            <li class="active">{{$nombre}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">
            
            <div class="col-xl-6">
                <section class="box-typical steps-icon-block">
                    <form action="{{ route('index.viajes.admin.store') }}" method="post">
                        @csrf
                        <div class="steps-icon-progress">
                            <ul>
                                <li class="active">
                                    <div class="icon">
                                        <i class="font-icon font-icon-cart-2"></i>
                                    </div>
                                    <div class="caption">Viaje</div>
                                </li>
                        </div>

                        <div id="detalle">
                            <header class="steps-numeric-title">Detalles del Viaje |  <b>{{$nombre}}</b></header>

                                <div class="steps-numeric-inner">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción del Viaje"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" name="fecha" class="form-control" placeholder="Fecha"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="time" name="hora" class="form-control" placeholder="Hora"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="cantidad_participantes" class="form-control" placeholder="Cantidad de Participantes"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="estado" id="estado">
                                                            
                                                            <option value="1">ASIGNADO</option>
                                                            <option value="2">COMPLETADO</option>
                                                            <option value="3">EN CURSO</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" name="idpaqueteturistico" hidden value="{{$idPackage}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            
                        </div>
                        <button type="button" id="botonAtras" class="btn btn-rounded btn-grey float-left">← Atras</button>
                        <!--<button type="button" onclick="alert('REIRIGIR')" id="botonGuardar" class="btn btn-rounded float-right">Guardar</button>-->
                        <button type="submit" class="btn btn-rounded float-right">Guardar</button>
                        <a href="#" id="botonGuardar" >Guardar</a>
                    </form>
                </section><!--.steps-icon-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Fechas Disponibles - {{$nombre}} </div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Fecha - Hora
                                                </th>
                                                <th>
                                                    Cantidad
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($viajes as $viaje)
                                                <tr>
                                                    <td>
                                                        {{$viaje->fecha}} -  {{$viaje->hora}} - {{$viaje->id}}
                                                    </td>
                                                    <td>
                                                        {{$viaje->cantidad_participantes}}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="{{ route('index.viajes.admin.asignar.detalles', $viaje->id) }}"><i class="fas fa-users"></i> Ver Todo</a>
                                                                <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Participantes</a> 
                                                                <a class="dropdown-item" href="#"><i class="fas fa-car-alt"></i> Vehiculos</a> 
                                                                <a class="dropdown-item" href="#">Almuerzos</a>
                                                                <a class="dropdown-item" href="#">Arrieros</a>
                                                                <a class="dropdown-item" href="#">Guías</a>
                                                                <a class="dropdown-item" href="#">Cocineros</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!--.steps-numeric-block-->
            </div>

        </div><!--.row-->
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
			//$('#detalle').show(); //muestro mediante id
			//$('#pago').hide(); //muestro mediante clase
            //$('#botonGuardar').hide();

            /*$("#botonSiguiente").click(function(){
                $("#listaDetalleViaje").addClass("active");
                $('#pago').show(); //muestro mediante clase
                $('#detalle').hide(); //muestro mediante id
                $('#botonGuardar').show();
                $('#botonSiguiente').hide();
            });*/

            /*$("#botonAtras").click(function(){
                $("#listaDetalleViaje").removeClass("active");
                $('#pago').hide(); //muestro mediante clase
                $('#detalle').show(); //muestro mediante id
                $('#botonGuardar').hide();
                $('#botonSiguiente').show();
            });*/
            
            
	});
    </script>

    <script>
        
    </script>
@endsection