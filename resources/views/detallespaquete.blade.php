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
                                                        <a href="#" rel="noopener noreferrer">
                                                            <span class="btn btn-danger btn-sm" onclick="">
                                                                <span class="fa fa-trash"></span>
                                                            </span>
                                                        </a>
                                                        
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
                                                       <form action="#" method="post">
                                                            <a href="#" rel="noopener noreferrer">
                                                                <span class="btn btn-danger btn-sm">
                                                                    <span class="fa fa-trash"></span>
                                                                </span>
                                                            </a>
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
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Huaraz
                                                    </td>
                                                    <td>
                                                        Olleros
                                                    </td>
                                                    <td>
                                                        <a href="#">Editar</a>
                                                        <a href="#">Eliminar</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Huaraz
                                                    </td>
                                                    <td>
                                                        Parque Huascarán
                                                    </td>
                                                    <td>
                                                        <a href="#">Editar</a>
                                                        <a href="#">Eliminar</a>
                                                    </td>
                                                </tr>
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
                                                            <form action="#" method="POST" class="formEliminarItinerario">
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
                                    <i class="font-icon font-icon-cogwheel"></i>
                                    Personal Acompañante
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <span class="glyphicon glyphicon-music"></span>
                                    Vehículos
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-3" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="fa fa-product-hunt"></i>
                                    Almuerzo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-4" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-users"></i>
                                    Equipo / Implementos --
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-5" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-home"></i>
                                    Acémilas
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-1-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-speed"></i>
                                    Settings
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th>
                                                Payment Taken
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                        </tr>
                                        <tr class="table-active">
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Approved
                                            </td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                02/04/2012
                                            </td>
                                            <td>
                                                Declined
                                            </td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                03/04/2012
                                            </td>
                                            <td>
                                                Pending
                                            </td>
                                        </tr>
                                        <tr class="table-danger">
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                04/04/2012
                                            </td>
                                            <td>
                                                Call in to confirm
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">Tab 2</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">Tab 3</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-4">Tab 4</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-5">Tab 5</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-6">Tab 6</div><!--.tab-pane-->
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
                            confirmButtonText: 'Confirmar'
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