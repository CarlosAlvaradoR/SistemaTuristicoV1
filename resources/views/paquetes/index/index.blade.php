@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')


@section('contenido')
<header class="page-content-header">
    <div class="container-fluid">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>Paquetes Disponibles <small class="text-muted">23 Paquetes</small></h3>
                </div>
                <div class="tbl-cell tbl-cell-action">
                    <a href="{{ route('paquetes.formulario.nuevo') }}" class="btn btn-rounded">Nuevo Paquete</a>
                </div>
            </div>
        </div>
    </div>
</header><!--.page-content-header-->

<div class="container-fluid">
    
    <div class="row card-user-grid">
       
        @foreach ($paquetes as $paquete)
            <div class="col-sm-6 col-md-4 col-xl-3">
                <article class="card-user box-typical" style="border-radius: 19px">
                    
                    <div class="">
                        <!--<img src="/" style="height: 110px;" alt="">-->
                        <img src="{{ asset('imagen/'.$paquete->imagen_principal) }}" class="img-rounded" alt="Cinque Terre" width="220" height="156">
                    </div>
                    <div class="card-user-name">{{$paquete->nombre}}</div>
                    <div class="card-user-status">S/. {{$paquete->precio}}</div>
                    
                    <a href="{{ route("paquetes.detalles", $paquete->idpaqueteturistico) }}" method="get" class="btn btn-rounded">
                        Ver Paquete
                    </a>
                    <div class="card-user-social align-items-start">
                        <a href="{{ route('paquetes.editar', $paquete->slug) }}" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" title="Ver Información del Paquete">
                            <i class="fas fa-eye"></i>
                        </a>
                        <!--{$paquete->slug}-->
                        <a href="{{ route('index.viajes.admin', $paquete->slug) }}" title="Asignar Viaje">
                            <i class="fas fa-shuttle-van"></i>
                        </a>
                        <a href="{{ route('reservas.formulario.nivel.admin', $paquete->slug) }}" title="Reservar">
                            <i class="fas fa-map"></i>
                        </a>
                        <a href="#" title="Inactivar" class="btn-sm btn-danger">
                            <i class="fas fa-minus"></i>
                        </a>
                    </div>
                    
                </article><!--.card-user-->
            </div>
        @endforeach

        
    </div><!--.card-user-grid-->
</div><!--.container-fluid-->
@endsection