<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="search">
                        Buscar
                    </label>
                    <input type="text" class="form-control" id="search" placeholder="Buscar paquete"
                        wire:model="search" />
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

                <a href="{{-- route("paquetes.detalles", $paquete->idpaqueteturistico) --}}" method="get" class="btn btn-rounded">
                    Ver Paquete
                </a>
                <div class="card-user-social align-items-start">
                    <a href="{{-- route('paquetes.editar', $paquete->slug) --}}" title="Editar">
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
    <nav aria-label="...">
        <ul class="pagination">

            <li class="page-item" aria-current="page">
                <a class="page-link" href="#">{{ $paquetes->links() }}</a>
            </li>
        </ul>
    </nav>
</div>
