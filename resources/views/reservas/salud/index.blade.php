@extends('layouts/plantilladashboard')

@section('tituloPagina','Medidas de Salud del Cliente')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Salud</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Salud</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Cliente</a></li>
                            <li class="active">Atractivos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Fichas de Salud del Cliente</h5>
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
                            <div class="col-md-6">
                                 <span class="badge badge-default font-weight-bold">Datos de Salud del cliente</span>
                                 <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        <form role="form">
                                            <div class="form-group">
                                                 
                                                <label for="">
                                                    Nº de Autorización
                                                </label>
                                                <input type="text" class="form-control" id="" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">
                                                    Archivo Médico
                                                </label>
                                                <input type="file" class="form-control-file" id="exampleInputFile" />
                                                
                                            </div>  
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>

                                            <button type="button" class="btn btn-danger">
                                                Limpiar
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <div><a href="">09828</a><a href=""> Quitar</a></div>
                                        <div><a href="">09828</a><a href=""> Quitar</a></div>
                                        <div><a href="">09828</a><a href=""> Quitar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <span class="badge badge-default font-weight-bold">Ficha de salud</span>
                                 <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Criterio
                                                    </th>
                                                    <th>
                                                        Acción
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Sufre de Asma
                                                    </td>
                                                    <td>
                                                        <a href="">Añadir</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Criterio
                                                    </th>
                                                    <th>
                                                        Acción
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Sufre de Asma
                                                    </td>
                                                    <td>
                                                        <a href="">Quitar</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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