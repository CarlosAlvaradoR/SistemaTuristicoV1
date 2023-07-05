@extends('layouts/plantilla_landing')

@section('content')
    <!-- slider_area_start -->
    @php
        use Carbon\Carbon;
    @endphp
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Huaraz</h3>
                                <p>El Mejor Lugar para visitar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Recuay</h3>
                                <p>Lo mejor de Áncash para tí</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Yungay</h3>
                                <p>La ciudad de la Hermosura</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider_area_end -->

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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Paquetes Populares</h3>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($paquetes as $paquete)
                    <a href="{{ route('detalles.destino', $paquete->slug) }}">
                        <div class="col-lg-4 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <!--<img src="img/place/1.png" alt="">-->
                                    <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image" width="100"
                                        height="250">
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
                                                <p>{{ Carbon::parse($paquete->created_at)->diffForHumans() }}</p>
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
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="{{ route('destinos') }}">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Ver Video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=EnKQK-wOgMw">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
