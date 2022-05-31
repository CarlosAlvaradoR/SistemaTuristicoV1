@extends('layouts/plantilladashboard')

@section('tituloPagina','Detalles del Viaje')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Viajes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Viajes</a></li>
                            <li><a href="#!">Registro</a></li>
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
                                    <a href="{{ route('asignar.vehiculo.viaje', $idViaje) }}" class="btn">Asignar vehículo</a>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Empresa
                                                </th>
                                                <th>
                                                    Monto
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Empresa
                                                </th>
                                                <th>
                                                    Monto
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                            </tfoot>
                                            <tbody> <!-- tr y td-->
                                                @php
                                                    $contV=1;
                                                @endphp
                                                @foreach ($vehiculosProgramados as $vprogramado)
                                                    <tr>
                                                        <td>{{$contV++}}</td>
                                                        <td>{{$vprogramado->nombre_empresa}} - {{$vprogramado->placa}}</td>
                                                        <td>{{$vprogramado->monto}}</td>
                                                        <td>
                                                            <form action="{{ route('eliminar.transporte.viajes', [$vprogramado->id, $idViaje]) }}" method="POST" class="formEliminarItinerario">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="text" name="option" value="2" hidden>
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </form>
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
                                <li><div class="item"><span class=""></span>Asignar Almuerzo de Celebración</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('asignar.almuerzos.viaje', $idViaje) }}" class="btn btn-danger"> Agregar Almuerzo </a>
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