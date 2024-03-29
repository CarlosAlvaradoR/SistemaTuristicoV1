@extends('layouts/plantilla_landing')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destinos</h3>
                        <p>Los Mejores Lugares para Disfrutar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>A dónde quieres ir ?</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            <div class="input_field">
                                <input type="text" placeholder="Escribe lugar">
                            </div>
                            <div class="input_field">
                                <input id="datepicker" autocomplete="off" placeholder="Fecha">
                            </div>
                            <div class="input_field">
                                <select>
                                    <option data-display="Tipo de Viaje">Tipo de Viaje</option>
                                    <option value="1">Tipo 1</option>
                                    <option value="2">Tipo 2</option>
                                </select>
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->


    <div class="popular_places_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($paquetes as $paquete)
                            <a href="{{ route('detalles.destino', $paquete) }}">
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_place">
                                        <div class="thumb">
                                            <!--<img src="img/place/1.png" alt="">-->
                                            <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image"
                                                width="100" height="250">
                                            <a href="#" class="prise">S/.
                                                {{ $paquete->precio }}</a>
                                        </div>
                                        <div class="place_info">
                                            <a href="#!">
                                                <h3>{{ $paquete->nombre }}</h3>
                                            </a>
                                            <p>Apto a Reservación</p>
                                            <div class="rating_days d-flex justify-content-between">
                                                <div class="days">
                                                    <a href="#">
                                                        <i class="fa fa-clock-o"></i>
                                                        <p>{{ Carbon::parse($paquete->created_at)->diffForHumans() }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-pagination justify-content-center d-flex" style="text-align: center">
                                {{ $paquetes->links() }}

                            </div>
                        </div>
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
    <!--<div class="recent_trip_area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section_title text-center mb_70">
                                    <h3>Recent Trips</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_trip">
                                    <div class="thumb">
                                        <img src="img/trip/1.png" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <span>Oct 12, 2019</span>
                                        </div>
                                        <a href="#">
                                            <h3>Journeys Are Best Measured In
                                                New Friends</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_trip">
                                    <div class="thumb">
                                        <img src="img/trip/2.png" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <span>Oct 12, 2019</span>
                                        </div>
                                        <a href="#">
                                            <h3>Journeys Are Best Measured In
                                                New Friends</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_trip">
                                    <div class="thumb">
                                        <img src="img/trip/3.png" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <span>Oct 12, 2019</span>
                                        </div>
                                        <a href="#">
                                            <h3>Journeys Are Best Measured In
                                                New Friends</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
@endsection
