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
                                    Servicios
                                    <span class="label label-pill label-default">4</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-2-tab-6" role="tab" data-toggle="tab">
                                <span class="nav-link-in">
                                    Settings
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
                                         
                                        <a href="#" class="btn btn-primary">
                                            Nueva fotografía
                                        </a>
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
                                            @foreach ($galeriaFotos as $galeriaFoto)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{$galeriaFoto->descripcionfoto}}</td>
                                                    <td>{{$galeriaFoto->imagen}}</td>
                                                    <td>
                                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-warning btn-sm" onclick="alert('HH')">
                                                                <span class="fa fa-pencil-square-o"></span>
                                                            </span>
                                                        </a>
                                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-danger btn-sm" onclick="">
                                                                <span class="fa fa-trash"></span>
                                                            </span>
                                                        </a>
                                                        <a href=#" title="Permisos" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-info btn-sm" onclick="">
                                                                <span class="fas fa-eye"></span>
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
                                            @foreach ($mapaReferencias as $mapaReferencia)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{$mapaReferencia->descripcionfoto}}</td>
                                                    <td>{{$mapaReferencia->descripcionfoto}}</td>
                                                    <td>
                                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-warning btn-sm" onclick="alert('HH')">
                                                                <span class="fa fa-pencil-square-o"></span>
                                                            </span>
                                                        </a>
                                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-danger btn-sm" onclick="">
                                                                <span class="fa fa-trash"></span>
                                                            </span>
                                                        </a>
                                                        <a href=#" title="Permisos" target="_blank" rel="noopener noreferrer">
                                                            <span class="btn btn-info btn-sm" onclick="">
                                                                <span class="fas fa-eye"></span>
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
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-3">Tab 3</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-4">Tab 4</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-5">Tab 5</div><!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-6">Tab 6</div><!--.tab-pane-->
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