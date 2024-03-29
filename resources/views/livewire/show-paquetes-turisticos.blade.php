<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Actual search box -->
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Buscar Paquete" wire:model="search">
                </div>

            </div>

        </div>
    </div>


    {{-- $todo --}}
    <div class="container-fluid">
        <div wire:loading>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="activity-line">
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    Cargando ...
                                </div>
                            </article>
                            <!--.activity-line-item-->

                        </section>
                    </div>

                </div>
            </div>

        </div>

    </div>


    @foreach ($paquetes as $paquete)
        <div class="col-sm-6 col-md-4 col-xl-3">
            <article class="card-user box-typical" style="border-radius: 19px">

                <div class="">
                    <!--<img src="/" style="height: 110px;" alt="">-->
                    <img src="{{ asset('/' . $paquete->imagen_principal) }}" class="img-rounded" alt="Cinque Terre"
                        width="220" height="156">
                </div>
                <div class="card-user-name">{{ $paquete->nombre }}</div>
                <div class="card-user-status">S/.{{ $paquete->precio }}</div>
                <div class="card-user-status">
                    @if ($paquete->visibilidad == 'PUBLICO')
                        <span class="label label-success">
                            {{ $paquete->visibilidad }}
                        </span>
                    @else
                        <span class="label label-secondary">
                            {{ $paquete->visibilidad }}
                        </span>
                    @endif

                </div>

                <a href="{{ route('paquetes.detalle', $paquete) }}"
                    class="btn btn-rounded 
                @if ($paquete->estado == 1) btn-primary
                @else
                btn-danger @endif">
                    Ver Paquete
                </a>
                <div class="card-user-social align-items-start">
                    <a href="{{ route('paquetes.edit', $paquete) }}" title="Editar">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <!--<a href="#" title="Ver Información del Paquete">
                        <i class="fa fa-eye"></i>
                    </a>-->
                    <!--{$paquete->slug}-->
                    <a href="{{ route('paquetes.reservar', $paquete) }}" title="Reservar">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                    <a href="{{ route('paquete.viajes', $paquete) }}" title="Viajes del Paquete">
                        <i class="fas fa-shuttle-van"></i>
                    </a>
                    {{-- <a href="#" title="Inactivar">
                        <i class="fa fa-minus"></i>
                    </a> --}}
                </div>

            </article>
            <!--.card-user-->
            {{-- https://codepen.io/gungorbudak/pen/ooKNpz --}}
        </div>
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav>
                    <div class="pagination">
                        {{ $paquetes->links() }}
                    </div>
                </nav>
            </div>

        </div>
    </div>

</div>
