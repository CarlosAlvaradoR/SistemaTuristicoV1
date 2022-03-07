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
        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">
                
                <div class="">
                    <img src="img/huancayo.jpg" style="height: 110px;" alt="">
                </div>
                <div class="card-user-name">Viaje a Recuay y Cátac</div>
                <div class="card-user-status">S/. 344.00 </div>
                <a href="{{ route('paquetes.detalles') }}" class="btn btn-rounded">Ver paquete</a>
                <div class="card-user-social">
                    <a href="#">
                        <i class="font-icon font-icon-fb-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-vk-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-in-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-tw-fill"></i>
                    </a>
                </div>
                <!--<div class="card-user-info-row">
                    <i class="font-icon font-icon-import"></i>
                    Imported from Github
                </div>
                <div class="card-user-info-row">
                    <i class="font-icon font-icon-user"></i>
                    By Wayne Gray
                </div>-->
            </article><!--.card-user-->
        </div>

        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">
                
                <div class="">
                    <img src="img/huancayo.jpg" style="height: 110px;" alt="">
                </div>
                <div class="card-user-name">Paquete Tingua</div>
                <div class="card-user-status">S/. 344.00 </div>
                <a href="#" class="btn btn-rounded">Ver paquete</a>
                <div class="card-user-social">
                    <a href="#">
                        <i class="font-icon font-icon-fb-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-vk-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-in-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-tw-fill"></i>
                    </a>
                </div>
                <!--<div class="card-user-info-row">
                    <i class="font-icon font-icon-import"></i>
                    Imported from Github
                </div>
                <div class="card-user-info-row">
                    <i class="font-icon font-icon-user"></i>
                    By Wayne Gray
                </div>-->
            </article><!--.card-user-->
        </div>

        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">
                
                <div class="">
                    <img src="img/huancayo.jpg" style="height: 110px;" alt="">
                </div>
                <div class="card-user-name">Paquete Tingua</div>
                <div class="card-user-status">S/. 344.00 </div>
                <a href="{{ route('paquetes.detalles') }}" class="btn btn-rounded">Ver paquete</a>
                <div class="card-user-social">
                    <a href="#">
                        <i class="font-icon font-icon-fb-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-vk-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-in-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-tw-fill"></i>
                    </a>
                </div>
                <!--<div class="card-user-info-row">
                    <i class="font-icon font-icon-import"></i>
                    Imported from Github
                </div>
                <div class="card-user-info-row">
                    <i class="font-icon font-icon-user"></i>
                    By Wayne Gray
                </div>-->
            </article><!--.card-user-->
        </div>

        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">
                
                <div class="">
                    <img src="img/huancayo2.jpg" style="height: 110px;" alt="">
                </div>
                <div class="card-user-name">Paquete Tingua</div>
                <div class="card-user-status">S/. 344.00 </div>
                <a href="#" class="btn btn-rounded">Ver paquete</a>
                <div class="card-user-social">
                    <a href="#">
                        <i class="font-icon font-icon-fb-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-vk-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-in-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-tw-fill"></i>
                    </a>
                </div>
                <!--<div class="card-user-info-row">
                    <i class="font-icon font-icon-import"></i>
                    Imported from Github
                </div>
                <div class="card-user-info-row">
                    <i class="font-icon font-icon-user"></i>
                    By Wayne Gray
                </div>-->
            </article><!--.card-user-->
        </div>

        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">
                
                <div class="">
                    <img src="img/huancayo2.jpg" style="height: 110px;" alt="">
                </div>
                <div class="card-user-name">Paquete Tingua</div>
                <div class="card-user-status">S/. 344.00 </div>
                <a href="#" class="btn btn-rounded">Ver paquete</a>
                <div class="card-user-social">
                    <a href="#">
                        <i class="font-icon font-icon-fb-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-vk-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-in-fill"></i>
                    </a>
                    <a href="#">
                        <i class="font-icon font-icon-tw-fill"></i>
                    </a>
                </div>
                <!--<div class="card-user-info-row">
                    <i class="font-icon font-icon-import"></i>
                    Imported from Github
                </div>
                <div class="card-user-info-row">
                    <i class="font-icon font-icon-user"></i>
                    By Wayne Gray
                </div>-->
            </article><!--.card-user-->
        </div>

        
    </div><!--.card-user-grid-->
</div><!--.container-fluid-->
@endsection