@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>
                            @foreach ($nombrePaquetes as $nombrePaquete)
                                {{$nombrePaquete->nombre}}
                            @endforeach 
                           
                        </h3> 
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Paquetes</a></li>
                            <li><a href="#">Detalles</a></li>
                            <li class="active">
                                @foreach ($nombrePaquetes as $nombrePaquete)
                                {{$nombrePaquete->nombre}}
                                @endforeach 
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="tabs-section">
            <div class="tabs-section-nav">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Galería
                                    <span class="label label-pill label-danger">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Mapa
                                    <span class="label label-pill label-success">2</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Lugares de visita
                                    <span class="label label-pill label-info">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Itinerario
                                    <span class="label label-pill label-warning">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-5" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Pagos por servicios
                                    <span class="label label-pill label-default">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Categoría de Hoteles
                                    <span class="label label-pill label-primary">4</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabs-2-tab-1">
                    <div class="container-fluid">
                        
                            <div class="col-md-12">
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        @foreach ($idpaquetes as $idpaquete)
                                        <a href="{{ route('foto.nuevas.galerias', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">
                                            Nueva fotografía
                                        </a>
                                        @endforeach
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-block">
                                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th>Fotografía</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $contador = 1;
                                            @endphp
                                            @foreach ($galeriaFotos as $galeriaFoto)
                                                <tr>
                                                    <td>
                                                        {{$contador++}}
                                                    </td>
                                                    <td>{{$galeriaFoto->descripcionfoto}}</td>
                                                    <td>
                                                        <img src="/imagen/{{$galeriaFoto->imagen}}" style="height: 60px;" alt="">
                                                    </td>
                                                    <td>
                                                        
                                                        
                                                        <form action="{{ route('paquetes.turisticos.edicion.galeria', $galeriaFoto->idfotogaleria ) }}" method="get">
                                                            
                                                            <button class="btn btn-warning btn-sm">
                                                                    <span class="fa fa-pencil-square-o"></span>
                                                            </button>
                                                        </form> 
                                                        <form action="{{ route('eliminar.galeria.paquete', $galeriaFoto->idfotogaleria) }}" method="POST" class="formEliminarItinerario">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-2">
                        <div class="container-fluid">
                            
                            <div class="col-md-12">
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        
                                        @foreach ($idpaquetes as $idpaquete)
                                            
                                            <a href="{{ route("paquetes.detalles.nuevo.paquetes", $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">
                                                Añadir Ruta
                                            </a>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-block">
                                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ruta</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $contador = 1;
                                            @endphp
                                            @foreach ($mapaReferencias as $mapaReferencia)
                                                <tr>
                                                   
                                                    <td>{{$contador++}}</td>
                                                    <td>{{$mapaReferencia->nombreruta}}</td>
                                                    <td>{{$mapaReferencia->descripcionruta}}</td>
                                                    <td>
                                                       <form action="{{ route("paquetes.detalles.editar.mapas", $mapaReferencia->idmapareferencial) }}" method="GET">
                                                            <button class="btn btn-warning btn-sm">
                                                                <span class="fa fa-pencil-square-o"></span>
                                                            </button>
                                                       </form>
                                                       <form action="{{ route('eliminar.mapa.paquete', $mapaReferencia->idmapareferencial) }}" method="POST" class="formEliminarItinerario">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($idpaquetes as $idpaquete)
                                            <a href="{{ route('index.formulario.nuevo.atractivo', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Añadir Nuevo lugar</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Lugar
                                                    </th>
                                                    <th>
                                                        Atractivo
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $contVisitaAtractivos=1;
                                                @endphp
                                                @foreach ($atractivosVisitaPaquete as $lugarPaquete)
                                                    <tr>
                                                        <td>
                                                            {{$contVisitaAtractivos++}}
                                                        </td>
                                                        <td>
                                                            {{$lugarPaquete->nombre}}
                                                        </td>
                                                        <td>
                                                            {{$lugarPaquete->descripcion}}
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('eliminar.atractivo.lugar.paquete',$lugarPaquete->idpaquete_visitaatractivos) }}" method="POST" class="formEliminarItinerario">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="text" name="option" value="1" hidden>
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
                    </div>   
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--  route(') }} -->
                                        @foreach ($idpaquetes as $idpaquete)
                                            <a href="{{ route('index.formulario.nuevo.itinerario', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Agregar Itinerario</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Actividad
                                                    </th>
                                                    <th>
                                                        Descripcion
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            @php
                                                $contadorItinerario=1;
                                            @endphp
                                            <tbody>
                                                @foreach ($itinerarios as $itinerario)
                                                    <tr>
                                                        <td>
                                                            {{$contadorItinerario++}}
                                                        </td>
                                                        <td>
                                                            {{$itinerario->nombreactividad}}
                                                        </td>
                                                        <td>
                                                            {{$itinerario->descripcion}}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('editar.itinerario.paquete', $itinerario->idactividaditinerario) }}">
                                                                <span class="btn btn-warning btn-sm" >
                                                                    <span class="fa fa-pencil-square-o"></span>
                                                                </span>
                                                            </a>
                                                            <form action="{{ route('eliminar.itinerario.paquete', $itinerario->idactividaditinerario) }}" method="POST" class="formEliminarItinerario">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <span class="fa fa-trash"></span>
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
                    </div> 
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--  route(') }} -->
                                        @foreach ($idpaquetes as $idpaquete)
                                            <a href="{{ route('index.formulario.nuevo.servicio', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Añadir Pago por servicios</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Servicio
                                                    </th>
                                                    <th>
                                                        Monto
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $contServicios=1;
                                                @endphp
                                                @foreach ($servicios as $servicio)
                                                    <tr>
                                                        <td>
                                                            {{$contServicios++}}
                                                        </td>
                                                        <td>
                                                            {{$servicio->descripcion}}
                                                        </td>
                                                        <td>
                                                            {{$servicio->monto}}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('editar.servicio.paquete', $servicio->idpagoservicio) }}">
                                                                <span class="btn btn-warning btn-sm" >
                                                                    <span class="fa fa-pencil-square-o"></span>
                                                                </span>
                                                            </a>
                                                            <form action="{{ route('eliminar.servicio.paquete', $servicio->idpagoservicio) }}" method="POST" class="formEliminarItinerario">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <span class="fa fa-trash"></span>
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
                    </div> 
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--  route(') }} -->
                                        @foreach ($idpaquetes as $idpaquete)
                                            <a href="{{ route('index.formulario.nueva.categoria.hotel.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Categoría de Hoteles</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Descripción
                                                    </th>
                                                    
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $contCategoriaHoteles=1;
                                                @endphp
                                                @foreach ($categoriasHoteles as $categoriasHotele)
                                                    <tr>
                                                        <td>
                                                            {{$contCategoriaHoteles++}}
                                                        </td>
                                                        <td>
                                                            {{$categoriasHotele->descripcion}}
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="{{ route('editar.categoria.hotel.paquete', $categoriasHotele->idcategoriahotel) }}">
                                                                <span class="btn btn-warning btn-sm" >
                                                                    <span class="fa fa-pencil-square-o"></span>
                                                                </span>
                                                            </a>
                                                            <form action="{{ route('eliminar.categoria.hotel.paquete', $categoriasHotele->idcategoriahotel) }}" method="POST" class="formEliminarItinerario">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <span class="fa fa-trash"></span>
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
                    </div>   
                </div><!--.tab-pane-->
            </div><!--.tab-content-->
        </section><!--.tabs-section-->


        <section class="tabs-section">
            <div class="tabs-section-nav tabs-section-nav-icons">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="fa fa-skiing-nordic"></i>
                                    Personal Acompañante
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fa fa-automobile"></i>
                                    Transporte
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-3" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fab fa-free-code-camp"></i>
                                    Alimentación Campo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-4" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    
                                    <i class="font-icon fa fa-box"></i>
                                    Equipo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-5" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon fa fa-horse"></i>
                                    Acémilas
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <!--<i class="font-icon font-icon-speed"></i>-->
                                    <i class="font-icon fas fa-utensils"></i>
                                    Almuerzo Celebración
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.tipopersonal.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nuevo Tipo de Personal</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Tipo de Personal
                                            </th>
                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorTiposP=1;
                                        @endphp
                                        @foreach ($tiposPersonales as $tipoP)
                                            <tr>
                                                <td>
                                                    {{$contadorTiposP++}}
                                                </td>
                                                <td>
                                                    {{$tipoP->nombreTipo}}
                                                </td>
                                                <td>
                                                    {{$tipoP->cantidad}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.tipopersonal.paquete', $tipoP->id) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.tipopersonal.paquete', $tipoP->id) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.tipo.transporte.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nuevo Vehículo</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Descripción
                                            </th>
                                            
                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Tipo de Trasnporte
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorTransportes=1;
                                        @endphp
                                        @foreach ($transportesPaquetes as $transportesPaquete)
                                            <tr>
                                                <td>
                                                    {{$contadorTransportes++}}
                                                </td>
                                                <td>
                                                    {{$transportesPaquete->descripcion}}
                                                </td>
                                                <td>
                                                    {{$transportesPaquete->cantidad}}
                                                </td>
                                                <td>
                                                    {{$transportesPaquete->nombretipo}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.tipo.transporte.paquete', $transportesPaquete->idpaquete_tipotransporte) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.tipo.transporte.paquete', $transportesPaquete->idpaquete_tipotransporte) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.alimentacion.campo.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nueva Alimentación Campo</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Descripción
                                            </th>
                                            
                                            <th>
                                                Tipo Alimentacion
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorACampo=1;
                                        @endphp
                                        @foreach ($alimentacionCampos as $alimentacion)
                                            <tr>
                                                <td>
                                                    {{$contadorACampo++}}
                                                </td>
                                                <td>
                                                    {{$alimentacion->descripcion}}
                                                <td>
                                                    {{$alimentacion->nombretipo}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.alimentacion.campo.paquete', $alimentacion->idpaquete_tipoalimentacion) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.alimentacion.campo.paquete', $alimentacion->idpaquete_tipoalimentacion) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.equipo.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nuevo Equipo</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Equipo
                                            </th>
                                            
                                            <th>
                                                Cantidad
                                            </th>
                                            <th>
                                                Observacion
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorEquipos=1;
                                        @endphp
                                        @foreach ($equipos as $equipo)
                                            <tr>
                                                <td>
                                                    {{$contadorEquipos++}}
                                                </td>
                                                <td>
                                                    {{$equipo->nombre}} 
                                                </td>
                                                <td>
                                                    {{$equipo->cantidad}} 
                                                </td>
                                                <td>
                                                    {{$equipo->observacion}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.equipo.paquete', $equipo->idpaquete_equipo) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.equipo.paquete', $equipo->idpaquete_equipo) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.tipo.acemila.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nuevas Acémilas</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Tipo
                                            </th>
                                            
                                            <th>
                                                Cantidad
                                            </th>
                                            
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorAcemilas=1;
                                        @endphp
                                        @foreach ($acemilas as $acemila)
                                            <tr>
                                                <td>
                                                    {{$contadorAcemilas++}}
                                                </td>
                                                <td>
                                                    {{$acemila->nombre}} 
                                                </td>
                                                <td>
                                                    {{$acemila->cantidad}} 
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.acemila.paquete', $acemila->idpaquete_acemila) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.acemila.paquete', $acemila->idpaquete_acemila) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--  route(') }} -->
                                @foreach ($idpaquetes as $idpaquete)
                                    <a href="{{ route('index.nuevo.tipo.almuerzo.paquete', $idpaquete->idpaqueteturistico) }}" class="btn btn-primary">Nuevo Almuerzo Celebración</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Observación
                                            </th>
                                            
                                            <th>
                                                Tipo de Almuerzo
                                            </th>
                                            
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contadorAlmuerzos=1;
                                        @endphp
                                        @foreach ($almuerzos as $almuerzo)
                                            <tr>
                                                <td>
                                                    {{$contadorAlmuerzos++}}
                                                </td>
                                                <td>
                                                    {{$almuerzo->observacion}} 
                                                </td>
                                                <td>
                                                    {{$almuerzo->nombre}}  
                                                </td>
                                                <td>
                                                    <a href="{{ route('editar.almuerzo.paquete', $almuerzo->idpaquete_tipoalmuerzo) }}">
                                                        <span class="btn btn-warning btn-sm" >
                                                            <span class="fa fa-pencil-square-o"></span>
                                                        </span>
                                                    </a>
                                                    <form action="{{ route('eliminar.almuerzo.paquete', $almuerzo->idpaquete_tipoalmuerzo) }}" method="POST" class="formEliminarItinerario">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="fa fa-trash"></span>
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
                </div><!--.tab-pane-->
            </div><!--.tab-content-->
        </section><!--.tabs-section-->
        
    </div><!--.container-fluid-->
    


    
@endsection


@section('scripts')
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.formEliminarItinerario')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {        
                    event.preventDefault()
                    event.stopPropagation()        
                    Swal.fire({
                            title: '¿Confirma la eliminación del registro?',        
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Confirmar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                                Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                            }
                        })                      
                }, false)
                })
            })()
    </script>
@endsection