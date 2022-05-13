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
                        <button type="button" class="btn btn-rounded"><i class="font-icon-left font-icon-upload-2"></i>Upload file</button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-folder"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-download-2"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-share"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-trash"></i></button>
                    </div>
                    <div class="files-manager-header-right">
                        <div class="views">
                            <button type="button" class="btn-icon view active"><i class="font-icon font-icon-view-grid"></i></button>
                            <button type="button" class="btn-icon view"><i class="font-icon font-icon-view-rows"></i></button>
                        </div>
                        <div class="search">
                            <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                            <button type="submit" class="btn-icon"><i class="font-icon font-icon-search"></i></button>
                        </div>
                    </div>
                </header><!--.files-manager-header-->

                <div class="files-manager-content">
                    <div class="container-fluid">
                        <br>
                        <form action="{{ route('reservas.formulario.nivel.admin') }}" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                        <div class="form-group">
                                             
                                            <label for="dni">
                                                Ingrese DNI   .. @php
                                                    echo $cantidad;
                                                @endphp
                                            </label>
                                            <input type="text" class="form-control" value="" name="dni" id="dni" placeholder="ej: 70576811" />
                                        </div>
                                </div>
                                <div class="col-md-4">
                                     <br>
                                    <button type="submit" class="btn btn-success"> <!--style="width: 30px;
                                        height: 30px;
                                        padding: 6px 0px;
                                        border-radius: 15px;
                                        font-size: 8px;
                                        text-align: center;"-->
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </form>

                        @php
                            if ($cantidad > 0) {
                               $id="clientes";
                            }
                        @endphp
                        <div class="row" id="@php echo $id; @endphp" name="cliente" >
                            <div class="col-md-4">
                                
                                
                                    @foreach ($cliente as $cliente)
                                        
                                
                            </div>
                            <div class="col-md-4">
                               
                                    
                                    @endforeach
                                    

                                   
                               
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        
                    </div>
                </div><!--.files-manager-content-->

                <section class="box-typical box-panel">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>Reservación</h3>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body">
                        <div id="example-vertical">
                            <h5>Cliente</h5>
                            <section class="overflow-auto">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                            <label for="nombres">
                                                                Nombres
                                                            </label>
                                                            <input type="text" name="" value="Carlos Emilio" class="form-control" id="nombres" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="apellidos">
                                                                    Apellidos
                                                                </label>
                                                                
                                                                <input type="text" value="Alvarado Robles" class="form-control" id="apellidos" readonly/>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="direccion">
                                                            Dirección
                                                        </label>
                                                        <input type="text" value="Las Manzaass" class="form-control" id="direccion" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            Género
                                                        </label>
                                                        <input type="text" value="MASCULINO" class="form-control" id="exampleInputPassword1" readonly/>
                                                    </div> 
                                                </div>

                                                <div class="col-md-4">
                                                    
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">
                                                                Nacionalidad
                                                            </label>
                                                            <input type="text" value="PERUANO" class="form-control" id="exampleInputEmail1" readonly/>
                                                        </div> 
                                                        <form action="{{ route('pagos.reserva') }}" method="get">
                                                            <button type="submit" class="btn btn-primary" id="botonSubmit">
                                                                Submit
                                                            </button>
                                                        </form>
                                                                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <h5>Paquete</h5>
                            <section class="box-typical">
                                <div>
                                      <label for="idpaquete">
                                        ID
                                    </label>
                                    <input type="text" value="1" class="form-control" id="idpaquete" />
                                </div>
                                <div class="form-group">
                                         
                                    <label for="">
                                        Paquete
                                    </label>
                                    <input type="text" class="form-control" id="" />
                                </div>
                                <div class="form-group">
                                     
                                    <label for="exampleInputPassword1">
                                        Cantidad
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" />
                                </div>
                                <h5>Paquetes Turísticos</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Paquete
                                            </th>
                                            <th>
                                                Detalles
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="click" data-valor="valor">
                                            <td>
                                                1
                                            </td>
                                            <td class="boton">
                                                Caminata a Chávin de Hiantar
                                            </td>
                                            <td>
                                                <a href="">Ver</a>
                                            </td>
                                        </tr>
                                        <tr class="click" data-valor="valor">
                                            <td>
                                                1
                                            </td>
                                            <td class="boton">
                                                Caminata a Huaraz
                                            </td>
                                            <td>
                                                <a href="">Ver</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                </section>
                
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
             $('.cliente').hide(); //oculto mediante id
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