@extends('layouts/plantilladashboard')

@section('tituloPagina','Postergación de Viaje')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Postergación</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Postergación</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Reserva</a></li>
                            <li class="active">Cliente</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0 font-weight-bold">Alvarado Robles Carlos Emilio - Viaje a la Montaña Huascarán</h5>
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
                                    </h4> <strong>Muy bien!</strong> Atractivo de Visita agregado correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!--<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                 <span class="badge badge-default font-weight-bold">Cliente</span><br> 
                                 <span class="badge badge-default">Carlos Emilio Alvarado Robles</span>
                            </div>
                            <div class="col-md-4">
                                 <span class="badge badge-default font-weight-bold">Paquete</span><br>
                                 <span class="badge badge-default">Viaje a Las Montañas del Huascarán</span>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>-->

                    <section class="box-panel">
                        <!--<header class="box-typical-header">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-title">
                                    <h3>Form steps example</h3>
                                </div>
                            </div>
                        </header>-->
                        <div class="box-typical-body">
                            <form id="example-form" action="#" class="form-wizard">
                                <div>
                                    <h3>Postergación</h3>
                                    <section>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Estado</label>
                                                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="ej: definitivo, no definitivo" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Fecha de reprogramación</label>
                                                        <input type="text" class="form-control" id="" placeholder="Ejm: se reprograma para el 19 de Agosto">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Evento de Reprogramación</label>
                                                        <input type="text" class="form-control" id="" placeholder="ejm: Derrumbes en las carreteras, no me quiero viajar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Solicitud</h3>
                                    <section>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Fecha de Presentación</label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter text" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Estado (Interno)</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ejm: Pendiente, revisado" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Observación</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ejm: Está solicitndo devolución porque ya no va a viajar" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div><!--.box-typical-body-->
                    </section>
                   
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    <script>
        $(function() {
			
			var form = $("#example-form");
			form.validate({
				rules: {
					agree: {
						required: true
					}
				},
				errorPlacement: function errorPlacement(error, element) { element.closest('.form-group').find('.form-control').after(error); },
				highlight: function(element) {
					$(element).closest('.form-group').addClass('has-error');
				},
				unhighlight: function(element) {
					$(element).closest('.form-group').removeClass('has-error');
				}
			});

			form.children("div").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
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
                            //$('#botonSubmit').click();
                        }
                    });
				}
			});

		});
    </script>

    <script>
        
    </script>
@endsection