@extends('layouts/plantilladashboard')

@section('tituloPagina','Clientes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Viajes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Viajes</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Registro</a></li>
                            <li class="active">Programación</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">
            
            <div class="col-xl-6">
                <section class="box-typical steps-icon-block">
                    <div class="steps-icon-progress">
                        <ul>
                            <li class="active">
                                <div class="icon">
                                    <i class="font-icon font-icon-cart-2"></i>
                                </div>
                                <div class="caption">Viaje</div>
                            </li>
                            <li id="listaDetalleViaje" class="">
                                <div class="icon">
                                    <i class="font-icon font-icon-pin-2"></i>
                                </div>
                                <div class="caption">Detalles del Equipamiento</div>
                            </li>
                        </ul>
                    </div>

                    <div id="detalle">
                        <header class="steps-numeric-title">Detalles del Viaje</header>
                        <div class="steps-numeric-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Descripción del Viaje"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" placeholder="Fecha"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="time" class="form-control" placeholder="Hora"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Cantidad de Participantes"/>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Seleccione Estado</option>
                                                    <option>ASIGNADO</option>
                                                    <option>COMPLETADO</option>
                                                    <option>EN CURSO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div id="pago">
                        <header class="steps-numeric-title">Detalles de Equipamiento</header>
                        <div class="steps-numeric-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Equipo"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" placeholder="Cantidad"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Observación"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <button type="button" id="botonAtras" class="btn btn-rounded btn-grey float-left">← Atras</button>
                    <button type="button" id="botonSiguiente" class="btn btn-rounded float-right">Siguiente →</button>
                    <!--<button type="button" onclick="alert('REIRIGIR')" id="botonGuardar" class="btn btn-rounded float-right">Guardar</button>-->
                    <a href="{{ route('index.viajes.admin.asignar.detalles') }}" id="botonGuardar" class="btn btn-rounded float-right">Guardar</a>
                </section><!--.steps-icon-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Detalles del Paquete</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <span class="badge badge-default font-weight-bold">Paquete</span><br> 
                                     <span class="badge badge-default">Viaje al Huascarán</span><br> 
                                     <span class="badge badge-default font-weight-bold">Monto</span> <br>
                                     <span class="badge badge-default">129 / persona</span><br> 
                                     <span class="badge badge-default font-weight-bold">Descripción:</span> <br>
                                     <span class="badge badge-default">Es muy bonita el viaje</span><br>
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
			$('#detalle').show(); //muestro mediante id
			$('#pago').hide(); //muestro mediante clase
            $('#botonGuardar').hide();

            $("#botonSiguiente").click(function(){
                $("#listaDetalleViaje").addClass("active");
                $('#pago').show(); //muestro mediante clase
                $('#detalle').hide(); //muestro mediante id
                $('#botonGuardar').show();
                $('#botonSiguiente').hide();
            });

            $("#botonAtras").click(function(){
                $("#listaDetalleViaje").removeClass("active");
                $('#pago').hide(); //muestro mediante clase
                $('#detalle').show(); //muestro mediante id
                $('#botonGuardar').hide();
                $('#botonSiguiente').show();
            });
            
            
	});
    </script>

    <script>
        
    </script>
@endsection