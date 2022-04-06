@extends('layouts/plantilladashboard')

@section('tituloPagina','Pagos por reserva')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Pagos</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Reserva</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Pagos</a></li>
                            <li class="active">Atractivos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Reserva de los Clientes</h5>
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
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dismissable alert-info">
                                     
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4>
                                        información!
                                    </h4> Los adelantos por reserva se pueden hacer
                                    hasta con 24 meses de anticipación.
                                    y el pago final se debe completar como
                                    máximo 15 dias antes de recibir el servicio.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                 <span class="badge badge-primary font-weight-bold">Cliente</span>
                                 <br> 
                                 <span class="badge badge-default">Alvarado Robles Carlos Emilio</span>
                            </div>
                            <div class="col-md-4">
                                 <span class="badge badge-primary font-weight-bold">Paquete</span>
                                 <br> 
                                 <span class="badge badge-primary">Viaje al Huascarán S/.3000 x persona</span><img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
                            </div>
                            <div class="col-md-4">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="">
                                            Pasarela
                                        </label>
                                        <input type="text" class="form-control" id="" placeholder="ej: Banco de la Nación" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="">
                                            Monto (S/.)
                                        </label>
                                        <input type="text" class="form-control" id="" placeholder="ej: 556.70"/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        Cancelar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                   
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    <script>
        $(function() {
			$('#clientes').DataTable({
				responsive: true
			});
		});
    </script>

    <script>
        
    </script>
@endsection