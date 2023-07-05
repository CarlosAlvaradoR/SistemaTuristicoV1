@extends('layouts/plantilla_landing')

@section('content')
    <!-- header-end -->
    <div style="overflow-x:auto;">
        <div class="overlay">
            <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image" width="1348" height="800">
        </div>
    </div>


    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Paquete: {{ $paquete->nombre }}</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Precio: </p>
                                    <p> S/. {{ $paquete->precio }}</p>
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <div class="single-post">
                        <div class="blog_details">
                            <h2>
                                Galería del Paquete Paquete - {{ $paquete->nombre }}
                            </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="carousel slide" id="carousel-207838">

                                        <ol class="carousel-indicators">
                                            @for ($i = 0; $i < $galerias->count(); $i++)
                                                @if ($i == 0)
                                                    <li data-slide-to="0" data-target="#carousel-207838" class="active">
                                                    </li>
                                                @else
                                                    <li data-slide-to="{{ $i }}" data-target="#carousel-207838">
                                                    </li>
                                                @endif
                                            @endfor
                                        </ol>
                                        <div class="carousel-inner">
                                            @php
                                                $con = -1;
                                            @endphp
                                            @foreach ($galerias as $g)
                                                <input type="hidden" value="{{ $con++ }}">

                                                <div
                                                    class="carousel-item 
                                                    @if ($con == 0) active @endif">
                                                    <img class="d-block w-100" alt="Carousel Bootstrap First"
                                                        src="{{ asset('/' . $g->directorio) }}" width="450"
                                                        height="450" />
                                                    <div class="carousel-caption">
                                                        <!--<h4>
                                                                                                                                                                                                                                                                        First Thumbnail label
                                                                                                                                                                                                                                                                    </h4>-->
                                                        <p>
                                                            {{ $g->descripcion }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-207838" data-slide="prev"><span
                                                class="carousel-control-prev-icon"></span> <span
                                                class="sr-only">Previous</span></a>
                                        <a class="carousel-control-next" href="#carousel-207838" data-slide="next"><span
                                                class="carousel-control-next-icon"></span> <span
                                                class="sr-only">Next</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog_details">
                            <h2>
                                Mapa del Paquete
                            </h2>
                            @if ($mapa)
                                <p>{{ $mapa->descripcion }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img alt="Previsualización de Mapa" src="{{ asset('/' . $mapa->ruta) }}"
                                            width="700" height="450" />
                                    </div>
                                </div>
                            @else
                                <p>Sin Información</p>
                            @endif
                        </div>
                        <div class="blog_details">
                            <h2>
                                Lugares de Visita
                            </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Lugar</th>
                                                <th scope="col">Atractivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $conl = 1;
                                            @endphp
                                            @foreach ($lugares as $lv)
                                                <tr>
                                                    <th scope="row">{{ $conl++ }}</th>
                                                    <td>{{ $lv->nombre }}</td>
                                                    <td>{{ $lv->nombre_atractivo }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <article class="blog_item">
                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>Alimentación en campo</h2>
                                </a>

                            </div>

                            <div class="blog_item_img">
                                <img class="card-img rounded-0"
                                    src="https://phantom-marca.unidadeditorial.es/125d9a348e963349022be1f9f9f2d6fa/resize/1320/f/jpg/assets/multimedia/imagenes/2023/01/26/16747279789852.jpg"
                                    alt="">
                                <a href="#" class="blog_item_date">
                                    @php
                                        function convertirMesEspañol($mes)
                                        {
                                            $meses = [
                                                'January' => 'Enero',
                                                'February' => 'Febrero',
                                                'March' => 'Marzo',
                                                'April' => 'Abril',
                                                'May' => 'Mayo',
                                                'June' => 'Junio',
                                                'July' => 'Julio',
                                                'August' => 'Agosto',
                                                'September' => 'Septiembre',
                                                'October' => 'Octubre',
                                                'November' => 'Noviembre',
                                                'December' => 'Diciembre',
                                            ];
                                            $dia = date('d');
                                            $año = date('Y');
                                            return $dia . ' de ' . $meses[$mes] . ' del ' . $año;
                                        }
                                    @endphp
                                    <p>{{ convertirMesEspañol(\Carbon\Carbon::now()->format('F')) }}</p>
                                </a>
                            </div>
                            <br>

                            <dl>
                                @foreach ($tipo_alimentaciones as $ta)
                                    <dt>
                                        {{ $ta->nombre }}
                                    </dt>
                                    <dd>
                                        {{ $ta->descripcion }}
                                    </dd>
                                @endforeach
                            </dl>
                        </article>

                        <div class="blog_details">
                            <h2>
                                Itinerario
                            </h2>
                            <p>Lista de Actividades a Realizar durante los Viajes</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ACTIVIDAD</th>
                                                <th scope="col">Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $coni = 1;
                                            @endphp
                                            @foreach ($itinerarios as $i)
                                                <tr>
                                                    <th scope="row">{{ $coni++ }}</th>
                                                    <td>{{ $i->nombre_actividad }}</td>
                                                    <td>{{ $i->descripcion }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="blog_details">
                            <h2>
                                Pagos por Servicio
                            </h2>
                            <p>
                                Lista de Pagos por servicio.
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">DESCRIPCIÓN</th>
                                                <th scope="col">PRECIO S/.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $conbol = 1;
                                            @endphp
                                            @foreach ($boletos_pagar_paquete as $bpp)
                                                <tr>
                                                    <th scope="row">{{ $conbol++ }}</th>
                                                    <td>{{ $bpp->descripcion }}</td>
                                                    <td>{{ $bpp->precio }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="blog_details">
                            <h2>
                                Almuerzos de Celebración
                            </h2>
                            <p>
                                Tipos de Almuerzo Ofrecidos.
                            </p>
                            <dl>
                                @foreach ($tipo_almuerzos as $ta)
                                    <dt>
                                        {{ $ta->nombre }}
                                    </dt>
                                    <dd>
                                        {{ $ta->observacion }}
                                    </dd>
                                @endforeach
                            </dl>
                        </div>

                        <div class="blog_details">
                            <h2>
                                Equipos
                            </h2>
                            <p>
                                Lista de Equipos Promedio por Viaje.
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">EQUIPO</th>
                                                <th scope="col">CANTIDAD</th>
                                                <th scope="col">OBSERVACIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $coneq = 1;
                                            @endphp
                                            @foreach ($equipos as $e)
                                                <tr>
                                                    <th scope="row">{{ $coneq++ }}</th>
                                                    <td>{{ $e->nombre }}</td>
                                                    <td>{{ $e->cantidad }}</td>
                                                    <td>{{ $e->observacion }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="blog_details">
                            <h2>
                                Condiciones de Puntualidad
                            </h2>
                            <p>
                                Necesitará cumplir con los siguientes requisitos:

                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    @if (count($condicionespuntualidad) > 0)
                                        @php
                                            $concon = 1;
                                        @endphp
                                        @foreach ($condicionespuntualidad as $cp)
                                            <dd>
                                                {{ $concon++ }}) {{ $cp->descripcion }}
                                            </dd>
                                        @endforeach
                                    @else
                                        No necesita cumplir con ningúna condición de puntualidad.
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="blog_details">
                            <h2>
                                Riesgos
                            </h2>
                            <p>
                                Deberá de Aceptar los siguientes riesgos al Reservar Nuestro Paquete:

                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    @if (count($riesgos) > 0)
                                        @php
                                            $conrie = 1;
                                        @endphp
                                        @foreach ($riesgos as $cp)
                                            <dd>
                                                {{ $conrie++ }}) {{ $cp->descripcion }}
                                            </dd>
                                        @endforeach
                                    @else
                                        No incurre ningún riesgo en el paquete.
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="blog_details">
                            <h2>
                                Autorizaciones Médicas
                            </h2>
                            <p>
                                Deberá de Aceptar los siguientes riesgos al Reservar Nuestro Paquete:

                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    @if ($autorizaciones)
                                        <div class="alert alert-warning" role="alert">
                                            {{ $autorizaciones->detalle_de_archivos }}
                                        </div>
                                    @else
                                        <dd>No es Necesario presentar ningún documento Adicional</dd>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="blog_details contact_join">
                            <div class="col-lg-12">
                                <a href="{{ route('reservar.formulario.publico', $paquete) }}" class="btn btn-primary">
                                    Reservar
                                </a>
                            </div>
                        </div>


                        {{-- <div class="blog_details">
                            <h2>Second divided from form fish beast made every of seas
                                all gathered us saying he our
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                            <p class="excert">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                                you
                                should have to spend money on boot camp when you can get the MCSE study materials yourself
                                at a
                                fraction of the camp price. However, who has the willpower
                            </p>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                                you
                                should have to spend money on boot camp when you can get the MCSE study materials yourself
                                at a
                                fraction of the camp price. However, who has the willpower to actually sit through a
                                self-imposed MCSE training. who has the willpower to actually
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not understand
                                    why you
                                    should have to spend money on boot camp when you can get the MCSE study materials
                                    yourself at
                                    a fraction of the camp price. However, who has the willpower to actually sit through a
                                    self-imposed MCSE training.
                                </div>
                            </div>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                                you
                                should have to spend money on boot camp when you can get the MCSE study materials yourself
                                at a
                                fraction of the camp price. However, who has the willpower
                            </p>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some people do not understand why
                                you
                                should have to spend money on boot camp when you can get the MCSE study materials yourself
                                at a
                                fraction of the camp price. However, who has the willpower to actually sit through a
                                self-imposed MCSE training. who has the willpower to actually
                            </p>
                        </div> --}}
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        {{-- <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Keyword"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside> --}}
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Acémilas</h4>
                            <ul class="list cat-list">
                                @foreach ($tipo_acemilas as $ta)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{ $ta->nombre }}</p>
                                            <p> (Cant. {{ $ta->cantidad }})</p>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Personal Acompañante</h4>
                            <ul class="list cat-list">
                                @foreach ($personal_acompañante as $pa)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{ $pa->nombre_tipo }}</p>
                                            <p> (Cant. {{ $pa->cantidad }})</p>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Categoría de Hoteles</h3>
                            @foreach ($categoria_hoteles as $ch)
                                <div class="media post_item">
                                    <div class="media-body">
                                        <a href="#!">
                                            <h3>{{ $ch->descripcion }}</h3>
                                        </a>
                                        <p>{{ convertirMesEspañol(\Carbon\Carbon::now()->format('F')) }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">
                                Transporte
                            </h3>
                            <div class="media post_item">
                                <img src="https://concepto.de/wp-content/uploads/2019/11/transporte-terrestre-e1572657457882-800x400.jpg"
                                    alt="post" height="60" weight="60">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Tipos de Transporte para los Viajes</h3>
                                    </a>
                                </div>
                            </div>
                            @foreach ($tipo_transportes as $tt)
                                <div class="media post_item">
                                    <div class="media-body">
                                        <a href="#!">
                                            <h3>{{ $tt->nombre_tipo }}</h3>
                                        </a>
                                        <p>Cant: {{ $tt->cantidad }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </aside>


                        {{-- <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div class="media post_item">
                                <img src="img/post/post_1.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_2.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_3.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_4.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Asteroids telescope</h3>
                                    </a>
                                    <p>01 Hours ago</p>
                                </div>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Instagram Feeds</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_10.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder="Enter email"
                                        required="">
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
