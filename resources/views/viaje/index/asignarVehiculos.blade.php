@extends('layouts/plantilladashboard')

@section('tituloPagina','Asignar Vehículos al Viaje')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Vehículos de Traslado</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Guías</a></li>
                            <li><a href="#">Listado</a></li>
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">
                                <a href="{{ route('index.viajes.admin.asignar.detalles', [$idViaje]) }}" title="Volver a detalles de Viaje" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
                                Lista de Vehículos
                            </h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Empresa
                                    </th>
                                    <th>
                                        Placa
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
                                        Placa
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
                                        $contEmpresas=1;
                                    @endphp
                                    @foreach ($empresasVehiculos as $vehiculo)
                                        <tr>
                                            <td>{{$contEmpresas++}}</td>
                                            <td>{{$vehiculo->nombre_empresa}}</td>
                                            <td>{{$vehiculo->placa}}</td>
                                            <form action="{{ route('guardar.vehiculo.viaje', [$vehiculo->id, $idViaje]) }}" method="POST">
                                                @csrf
                                                <td>
                                                    <input type="text" placeholder="Descripcion breve" name="descripcion" class="form-control" id="descripcion"/>
                                                    <input type="text" placeholder="ej: 400.50" name="monto_vehiculo" class="form-control" id="monto_vehiculo"/>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <!--<span class="fa fa-trash"></span>-->
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="col-md-5">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">Vehículos Programados - {{$idViaje}}</h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
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
                    </section>
                </div>
            </div>
        </div>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection