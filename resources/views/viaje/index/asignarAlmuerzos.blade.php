@extends('layouts/plantilladashboard')

@section('tituloPagina','Asignar Almuerzos al Viaje')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Asignar Almuerzos al Viaje</h3>
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
                <div class="col-md-8">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">
                                <a href="{{ route('index.viajes.admin.asignar.detalles', [$idViaje]) }}" title="Volver a detalles de Viaje" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
                                Lista de Almuerzos Programados
                            </h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Descripcion
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    <th>
                                        Monto
                                    </th>
                                    <th>
                                        Asociacion
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody> <!-- tr y td-->
                                    @foreach ($almuerzosAsociaciones as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>
                                            <td>{{$item->descripcion}}</td>
                                            <td>{{$item->cantidad}}</td>
                                            <td>{{$item->monto}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td>
                                                <form action="{{ route('eliminar.almuerzo.celebracion.viajes', [$item->id, $idViaje]) }}" title="Quitar Almuerzo de la lista" method="POST" class="formEliminarItinerario">
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
                <div class="col-md-4">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0"> Formulario de Almuerzos - {{$idViaje}}</h5>
                            
                            <div class="row">
                                                
                                <div class="col-md-12">
                                    <form action="{{ route('guardar.almuerzos.celebracion.viaje', [$idViaje]) }}" method="post">
                                        @csrf
                                        @if ($mensaje = Session::get('succes'))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-success alert-dismissable">
                                                        
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            ×
                                                        </button>
                                                        <h4>
                                                            Muy Bien!
                                                        </h4>El Almuerzo de celebración se registró correctamente
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12">
                                                <label for="descripcion_almuerzo">Descripción</label>
                                                <input type="text" placeholder="ej: Carapulcra con chancho" name="descripcion_almuerzo" class="form-control" id="descripcion_almuerzo">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label for="cantidad_almuerzos">
                                                    Cantidad
                                                </label>
                                                <input type="text" placeholder="ej: 5" name="cantidad_almuerzos" class="form-control" id="cantidad_almuerzos"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="monto_almuerzos">
                                                    Monto
                                                </label>
                                                <input type="text" placeholder="ej: 198.45" name="monto_almuerzos" class="form-control" id="monto_almuerzos"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="asociacion_pk">
                                                    Asociación
                                                </label>
                                                <select id="asociacion_pk" style="" name="asociacion_pk" class="form-control">
                                                    @foreach ($asociaciones as $asociacion)
                                                        <option value="{{$asociacion->id}}">{{$asociacion->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <button type="reset" id="botonAtras" class="btn btn-rounded btn-danger float-left">Cancelar</button>
                                                <!--<button type="button" onclick="alert('REIRIGIR')" id="botonGuardar" class="btn btn-rounded float-right">Guardar</button>-->
                                                <button type="submit" class="btn btn-rounded float-right">Guardar</button>
                                                
                                            </div>        
                                        </div>
                                    </form>
                                </div>
                            </div>
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