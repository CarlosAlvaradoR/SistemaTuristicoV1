<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="main">

                    <!-- Actual search box -->
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Paquete" wire:model="search">
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- $todo --}}
    @foreach ($paquetes as $paquete)
        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">

                <div class="">
                    <!--<img src="/" style="height: 110px;" alt="">-->
                    <img src="https://revistaelconocedor.com/wp-content/uploads/2018/05/lima4-1024x552.jpg"
                        class="img-rounded" alt="Cinque Terre" width="220" height="156">
                </div>
                <div class="card-user-name">{{ $paquete->nombre }}</div>
                <div class="card-user-status">S/.{{ $paquete->precio }}</div>

                <a href="{{ route('paquetes.detalle', $paquete) }}" class="btn btn-rounded">
                    Ver Paquete
                </a>
                <div class="card-user-social align-items-start">
                    <a href="{{ route('paquetes.edit') }}" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" title="Ver Información del Paquete">
                        <i class="fas fa-eye"></i>
                    </a>
                    <!--{$paquete->slug}-->
                    <a href="{{-- route('index.viajes.admin', $paquete->slug) --}}" title="Asignar Viaje">
                        <i class="fas fa-shuttle-van"></i>
                    </a>
                    <a href="{{-- route('reservas.formulario.nivel.admin', $paquete->slug) --}}" title="Reservar">
                        <i class="fas fa-map"></i>
                    </a>
                    <a href="#" title="Inactivar" class="btn-sm btn-danger">
                        <i class="fas fa-minus"></i>
                    </a>
                </div>

            </article>
            <!--.card-user-->
        </div>
    @endforeach
        <div class="justify-content-end">
            {{ $paquetes->links() }}
        </div>
    
</div>
