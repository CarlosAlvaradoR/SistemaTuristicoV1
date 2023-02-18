@extends('layouts/plantilla_landing')

@section('content')
    <!-- header-end -->
    <div class="overlay">
        <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image" width="1348" height="800">
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info">
                        <h3>Paquete - {{ $paquete->nombre }}</h3>
                        <h3>Galería</h3>
                        <div class="container-fluid">
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
                    </div>
                    <br>

                    <div class="destination_info">
                        <h3>Mapa</h3>
                        <p>{{ $mapa->descripcion }}</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <img alt="Previsualización de Mapa" src="{{ asset('/' . $mapa->ruta) }}" width="700"
                                        height="450" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="destination_info">
                        <h3>Lugares de Visita</h3>
                        <p>Lugares a Visitar durante los viajes</p>
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

                    <div class="destination_info">
                        <h3>Itinerario</h3>
                        <p>Lista de Actividades a Realizar durante los Viajes</p>
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

                    <div class="destination_info">
                        <h3>Pagos por Servicio</h3>
                        <p>Lista de Pagos por servicio</p>
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

                    <div class="destination_info">
                        <h3>Categoría de Hoteles</h3>
                        <p>Lista de Categoría de Hoteles</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">DESCRIPCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $conch = 1;
                                @endphp
                                @foreach ($categoria_hoteles as $ch)
                                    <tr>
                                        <th scope="row">{{ $conch++ }}</th>
                                        <td>{{ $ch->descripcion }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Personal Acompañante</h3>
                        <p>Tipos de Personal Acompañante</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        @foreach ($personal_acompañante as $pa)
                                            <dt>
                                                {{ $pa->nombre_tipo }}
                                            </dt>
                                            <dd>
                                                Cantidad: {{ $pa->cantidad }}
                                            </dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Transporte</h3>
                        <p>Tipos de Transporte para los Viajes</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        @foreach ($tipo_transportes as $tt)
                                            <dt>
                                                {{ $tt->nombre_tipo }}
                                            </dt>
                                            <dd>
                                                Cantidad: {{ $tt->cantidad }}
                                            </dd>
                                        @endforeach

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Alimentación en campo</h3>
                        <p>Alimentación en el Campo</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Equipos</h3>
                        <p>Lista de Equipos Promedio por Viaje</p>
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

                    <div class="destination_info">
                        <h3>Acémilas</h3>
                        <p>Acémilas del Paquete</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">TIPO</th>
                                    <th scope="col">CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $conta = 1;
                                @endphp
                                @foreach ($tipo_acemilas as $ta)
                                    <tr>
                                        <th scope="row">{{ $conta++ }}</th>
                                        <td>{{ $ta->nombre }}</td>
                                        <td>{{ $ta->cantidad }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Almuerzos de Celebración</h3>
                        <p>Tipos de Almuerzo Ofrecidos</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Condiciones de Puntualidad</h3>
                        <p>Necesitará cumplir con los siguientes requisitos</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        @php
                                            $concon = 1;
                                        @endphp
                                        @foreach ($condicionespuntualidad as $cp)
                                            <dd>
                                                {{ $concon++ }}) {{ $cp->descripcion }}
                                            </dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Riesgos</h3>
                        <p>Deverá de Aceptar los siguientes riesgos al Reservar Nuestros Paquetes</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        @php
                                            $conrie = 1;
                                        @endphp
                                        @foreach ($riesgos as $cp)
                                            <dd>
                                                {{ $conrie++ }}) {{ $cp->descripcion }}
                                            </dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bordered_1px"></div>
                    <div class="contact_join">
                        <!--<h3>Contact for join</h3>-->
                        <form action="#">
                            <div class="row">
                                <!--<div class="col-lg-6 col-md-6">
                                                                                                <div class="single_input">
                                                                                                    <input type="text" placeholder="Your Name">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6">
                                                                                                <div class="single_input">
                                                                                                    <input type="text" placeholder="Phone no.">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-12">
                                                                                                <div class="single_input">
                                                                                                    <textarea name="" id="" cols="30" rows="10"placeholder="Message"></textarea>
                                                                                                </div>
                                                                                            </div>-->
                                <div class="col-lg-12">
                                    <a href="{{ route('reservar.formulario.publico', $paquete) }}" class="boxed-btn4">
                                        Reservar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- newletter_area_start  -->
    <!--<div class="newletter_area overlay">
                                                                    <div class="container">
                                                                        <div class="row justify-content-center align-items-center">
                                                                            <div class="col-lg-10">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-lg-5">
                                                                                        <div class="newsletter_text">
                                                                                            <h4>Subscribe Our Newsletter</h4>
                                                                                            <p>Subscribe newsletter to get offers and about
                                                                                                new places to discover.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-7">
                                                                                        <div class="mail_form">
                                                                                            <div class="row no-gutters">
                                                                                                <div class="col-lg-9 col-md-8">
                                                                                                    <div class="newsletter_field">
                                                                                                        <input type="email" placeholder="Your mail">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-3 col-md-4">
                                                                                                    <div class="newsletter_btn">
                                                                                                        <button class="boxed-btn4 " type="submit">Subscribe</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
    <!-- newletter_area_end  -->
@endsection
