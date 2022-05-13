@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

<div class="container-fluid">
    <section class="box-typical files-manager">

        <div class="files-manager-panel">
            @php
                $cantidad=count($cliente);
                $id="clienteVisible";
            @endphp
            <div class="">
                <header class="files-manager-header">
                    <div class="files-manager-header-left">
                        <button type="button" class="btn btn-rounded"><i class="fas fa-globe-africa"></i> Programación de Viajes y Paquetes</button>
                        
                        <a href="" class="btn btn-rounded btn-success">Viaje al Parque Huascarán</a>
                    </div>
                    <div class="files-manager-header-right">
                        <div class="views">
                            <button type="button" class="btn-icon view active"><i class="font-icon font-icon-view-grid"></i></button>
                            <button type="button" class="btn-icon view"><i class="font-icon font-icon-view-rows"></i></button>
                        </div>
                        <div class="search">
                            <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                            <button type="button" class="btn-icon"><i class="font-icon font-icon-search"></i></button>
                        </div>
                    </div>
                </header><!--.files-manager-header-->

                <div class="files-manager-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <br>
                                <div class="row">
                                    <form action="{{ route('reservas.formulario.nivel.admin') }}" method="GET">
                                        <div class="col-md-8">
                                            
                                                <div class="form-group">
                                                    <label for="dni">
                                                        Ingrese DNI   .. @php
                                                            echo $cantidad;
                                                        @endphp
                                                    </label>
                                                    @if ($cantidad>0)
                                                        <div class="alert alert-danger" role="alert">
                                                            A simple danger alert—check it out!
                                                        </div>
                                                    @endif
                                                    <input type="text" class="form-control" value="" name="dni" id="dni" placeholder="ej: 70576811" />        
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <br>    
                                            <button type="submit" class="btn btn-primary"> <!--style="width: 30px;
                                                height: 30px;
                                                padding: 6px 0px;
                                                border-radius: 15px;
                                                font-size: 8px;
                                                text-align: center;"-->
                                                Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-9">
                                <section class="box-typical box-panel">
                                    <header class="box-typical-header">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-title">
                                                <h3>Reservación</h3>
                                            </div>
                                        </div>
                                    </header>
                                    @if ($cantidad > 0)
                                        <form action="{{ route('guardar.reservas') }}" method="post">
                                            @csrf
                                            <div class="box-typical-body">
                                                <div id="example-vertical">
                                                        <h5>Cliente</h5>
                                                        <section class="box-typical overflow-auto">
                                                            <div class="row">
                                                                    @foreach ($cliente as $dato)
                                                                        <div class="form-group">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="dni">DNI</label>
                                                                                <input type="text" name="dni" value="{{$dato->dni}}" class="form-control" id="dni" readonly>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="nombres">
                                                                                    Nombres
                                                                                </label>
                                                                                <input type="text" value="{{$dato->nombres}}" name="nombres" class="form-control" id="nombres"readonly/>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="apellidos">
                                                                                    Apellidos
                                                                                </label>
                                                                                <input type="text" value="{{$dato->apellidos}}" name="apellidos" class="form-control" id="apellidos" readonly/>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label for="">
                                                                                    Dirección
                                                                                </label>
                                                                                <input type="text" name="direccion" value="{{$dato->direccion}}" class="form-control" id="direccion" readonly/>        
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label for="telefono">
                                                                                    Teléfono
                                                                                </label>
                                                                                <input type="text" name="telefono" value="KKK" class="form-control" id="telefono" readonly/>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label for="correo">
                                                                                    Correo
                                                                                </label>
                                                                                <input type="text" name="correo" value="KKK" class="form-control" id="correo" readonly/>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label for="genero">
                                                                                    Género
                                                                                </label>
                                                                                <input type="text" name="genero" value="{{$dato->genero}}" class="form-control" id="genero" readonly/>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="nacionalidad">
                                                                                    Nacionalidad
                                                                                </label>
                                                                                <input type="text" value="{{$dato->nacionalidad}}" class="form-control" name="nacionalidad" id="nacionalidad"/>
                                                                            </div>
                                                                        </div> 
                                                                    @endforeach
                                                                    
                                                                    <button type="submit" id="botonSubmit" class="btn btn-primary">Sign in</button>
                                                                
                                                            </div>
                                                        </section>
                                                        <h5>Paquete</h5>
                                                        <section class="box-typical overflow-auto">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <span class="badge badge-success"><b>Paquete Huascarán</b></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-5">
                                                                    <label for="fecha-disponible">Fechas Disponibles</label>
                                                                    <select id="fecha-disponible" name="fecha-disponible" class="form-control">
                                                                    <option value="1111">Paquete - Huscarán 12/12/2022 (22)</option>
                                                                    <option>NO ABORDADO</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label for="estadoViaje">Estado</label>
                                                                    <select id="estadoViaje" name="estadoViaje" class="form-control">
                                                                    <option value="2222">ABORDADO</option>
                                                                    <option>NO ABORDADO</option>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                        </section>
                                                        <h5>Condiciones</h5>
                                                        <section class="overflow-auto">
                                                            <h5>Condiciones de Puntualidad</h5>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Condiciones</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ej: Ser puntual"></textarea>
                                                            </div>
                                                        </section>
                                                        
                                                        <h5>Riesgos</h5>
                                                        <section class="overflow-auto">
                                                            <div class="row m-t-lg">
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
                                                            </div><!--.row-->
                                                        </section>
                                                        
                                                        <h5>Salud</h5>
                                                        <section>
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="alert alert-dismissable alert-info">
                                                                            
                                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                                ×
                                                                            </button>
                                                                            <h4>
                                                                                AVISO
                                                                            </h4> <strong>Warning!</strong> En el caso que se considere necesario, suba la autorización médica.
                                                                        </div>
                                                                        <span class="badge badge-primary"></span> <span class="badge badge-primary">Ficha de Salud</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">    
                                                                                <label for="">
                                                                                    Nº de Autorización
                                                                                </label>
                                                                                <input type="text" class="form-control" id="" />
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        
                                                                            <div class="form-group">
                                                                                
                                                                                <label for="exampleInputFile">
                                                                                    Justificación Médica
                                                                                </label>
                                                                                <input type="file" class="form-control-file" id="exampleInputFile" />
                                                                                
                                                                            </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    
                                                </div>
                                            </div><!--.box-typical-body-->
                                        <form>
                                    @else
                                        <form action="{{ route('guardar.reservas.nuevos.clientes') }}" method="post">
                                            @csrf
                                            <div class="box-typical-body">
                                                <div id="example-vertical">
                                                        <h5>Cliente</h5>
                                                        <section class="box-typical overflow-auto">
                                                            <div class="row">
                                                                
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="dni">DNI</label>
                                                                            <input type="text" name="dni" class="form-control" id="dni">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="nombres">
                                                                                Nombres
                                                                            </label>
                                                                            <input type="text" name="nombres" value="Carlos Emilio" class="form-control" id="nombres"/>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="apellidos">
                                                                                Apellidos
                                                                            </label>
                                                                            <input type="text" name="apellidos" value="Alvarado Robles" class="form-control" id="apellidos"/>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">
                                                                                Dirección
                                                                            </label>
                                                                            <input type="text" name="direccion" value="Las Manzaass" class="form-control" id="direccion"/>        
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="telefono">
                                                                                Teléfono
                                                                            </label>
                                                                            <input type="text" name="telefono" value="935459929" class="form-control" id="telefono"/>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="correo">
                                                                                Correo
                                                                            </label>
                                                                            <input type="text" name="correo" value="calarador@unasam.edu.pe" class="form-control" id="correo"/>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="genero">
                                                                                Género
                                                                            </label>
                                                                            <input type="text" name="genero" value="MASCULINO" class="form-control" id="genero"/>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="nacionalidad">
                                                                                Nacionalidad
                                                                            </label>
                                                                            <input type="text" value="PERUANO" class="form-control" name="nacionalidad" id="nacionalidad"/>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" id="botonSubmit" class="btn btn-primary">Sign in</button>
                                                                
                                                            </div>
                                                        </section>
                                                        <h5>Paquete</h5>
                                                        <section class="box-typical overflow-auto">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <span class="badge badge-success"><b>Paquete Huascarán</b></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-5">
                                                                    <label for="fecha-disponible">Fechas Disponibles</label>
                                                                    <select id="fecha-disponible" name="fecha-disponible" class="form-control">
                                                                    <option value="1111">Paquete - Huscarán 12/12/2022 (22)</option>
                                                                    <option>NO ABORDADO</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label for="estadoViaje">Estado</label>
                                                                    <select id="estadoViaje" name="estadoViaje" class="form-control">
                                                                    <option value="2222">ABORDADO</option>
                                                                    <option>NO ABORDADO</option>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                        </section>
                                                        <h5>Condiciones</h5>
                                                        <section class="overflow-auto">
                                                            <h5>Condiciones de Puntualidad</h5>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Condiciones</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ej: Ser puntual"></textarea>
                                                            </div>
                                                        </section>
                                                        
                                                        <h5>Riesgos</h5>
                                                        <section class="overflow-auto">
                                                            <div class="row m-t-lg">
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
                                                            </div><!--.row-->
                                                        </section>
                                                        
                                                        <h5>Salud</h5>
                                                        <section>
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="alert alert-dismissable alert-info">
                                                                            
                                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                                ×
                                                                            </button>
                                                                            <h4>
                                                                                AVISO
                                                                            </h4> <strong>Warning!</strong> En el caso que se considere necesario, suba la autorización médica.
                                                                        </div>
                                                                        <span class="badge badge-primary"></span> <span class="badge badge-primary">Ficha de Salud</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">    
                                                                                <label for="">
                                                                                    Nº de Autorización
                                                                                </label>
                                                                                <input type="text" class="form-control" id="" />
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        
                                                                            <div class="form-group">
                                                                                
                                                                                <label for="exampleInputFile">
                                                                                    Justificación Médica
                                                                                </label>
                                                                                <input type="file" class="form-control-file" id="exampleInputFile" />
                                                                                
                                                                            </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    
                                                </div>
                                            </div><!--.box-typical-body-->
                                        <form>
                                    @endif
                                    
                                </section>
                            </div>
                        </div>
                    </div>
                </div><!--.files-manager-content-->

                
                
            </div><!--.files-manager-panel-in-->
        </div><!--.files-manager-panels-->
    </section><!--.files-manager-->
</div><!--.container-fluid-->
    



<!--
http://www.forosdelweb.com/f13/obtener-solo-valor-tr-con-onclick-1004289/
-->
    
@endsection



@section('scripts')
    <script>
       
        
        $(document).ready(function(){
             $('#botonSubmit').hide(); //oculto mediante id
             $('#clienteVisible').show(); //oculto mediante id
	    });

        $(function() {
			
			$("#example-vertical").steps({
				headerTag: "h5",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				stepsOrientation: "horizontal",
                onFinished: function (event, currentIndex)
				{
                    Swal.fire({
                    title: 'Está seguro de enviar la información?',
                    text: "Verifique haber completado la información!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, guardar!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#botonSubmit').click();
                        }
                    });
					
				}
			});
            
		});

    </script>
@endsection