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
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignación de grupos</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modal-container-659191" role="button" class="btn" data-toggle="modal">Agregar Participante</a>
                                    
                                    <div class="modal fade" id="modal-container-659191" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignación de grupos
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Participante
                                                </th>
                                                <th>
                                                    Estado
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $contParticipantes=1;
                                            @endphp
                                            @foreach ($datos as $date)
                                                <tr>
                                                    <td>
                                                        {{$contParticipantes++}}
                                                    </td>
                                                    <td>
                                                        {{$date->datos}}
                                                    </td>
                                                    <td>
                                                        @if ($date->estado_pago == 'COMPLETO')
                                                            <span class="label label-custom label-pill label-success">{{$date->estado_pago}}</span>
                                                        @else
                                                            <span class="label label-custom label-pill label-danger">{{$date->estado_pago}}</span>
                                                        @endif
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="">Quitar</a>
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

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignar Vehículos</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modalVehiculo" role="button" class="btn" data-toggle="modal">Agregar Vehículo</a>
                                    
                                    <div class="modal fade" id="modalVehiculo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignación de Vehículo
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Participante
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Carlos Emilio Alvarado Robles
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
                </section><!--.steps-numeric-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignar Almuerzo de Celebración</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modalAlmuerzo" role="button" class="btn" data-toggle="modal">Agregar Almuerzo</a>
                                    
                                    <div class="modal fade" id="modalAlmuerzo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignar Almuerzo
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Nº
                                                </th>
                                                <th>
                                                    Almuerzo
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Carapulcra
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
                </section><!--.steps-numeric-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignación de Arrieros</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modalArrieros" role="button" class="btn" data-toggle="modal">Agregar Arrieros</a>
                                    
                                    <div class="modal fade" id="modalArrieros" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignación de Arrieros
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Participante
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Carlos Emilio Alvarado Robles
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
                </section><!--.steps-numeric-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignación de Guías</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modalGuia" role="button" class="btn" data-toggle="modal">Agregar Guías</a>
                                    
                                    <div class="modal fade" id="modalGuia" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignación de Guías
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Participante
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Carlos Emilio Alvarado Robles
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
                </section><!--.steps-numeric-block-->
            </div>

            <div class="col-xl-6">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Asignación de Cocineros</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <a id="modal-659191" href="#modalGuia" role="button" class="btn" data-toggle="modal">Agregar Guías</a>
                                    
                                    <div class="modal fade" id="modalGuia" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Asignación de Guías
                                                    </h5> 
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                     
                                                    <button type="button" class="btn btn-primary">
                                                        Save changes
                                                    </button> 
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Participante
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Carlos Emilio Alvarado Robles
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
                </section><!--.steps-numeric-block-->
            </div>
        </div><!--.row-->
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
			
	});
    </script>

    <script>
        
    </script>
@endsection