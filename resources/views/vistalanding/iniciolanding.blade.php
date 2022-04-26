@extends('layouts/plantillalanding')

@section('titulo','Inicio | Empresa')
    
@section('contenido')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Yungay</h3>
                            <p>El destino perfecto para tí</p>
                            <a href="#" class="boxed-btn3">Explorar Más</a>
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
                            <h3>Carhuaz</h3>
                            <p>El mejor lugar para pasear</p>
                            <a href="#" class="boxed-btn3">Explorar Más</a>
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
                            <h3>Recuay</h3>
                            <p>El lugar perfecto</p>
                            <a href="#" class="boxed-btn3">Explorar Más</a>
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
                    <h3>A dónde quieres ir?</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="#">
                        <div class="input_field">
                            <input type="text" placeholder="Escribe un lugar">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" autocomplete="off" placeholder="Fecha">
                        </div>
                        <div class="input_field">
                            <select>
                                <option data-display="Tipo de Viaje">Tipo de viaje</option>
                                <option value="1">Caminata</option>
                                <option value="2">Turístico</option>
                            </select>
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit" >Buscar</button>
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
                    <h3>Destinos Disponibles</h3>
                    <p>
                    Tiene a su disposición los mejores paquetes turísticos, cómodos y con gran variedad de destinos
                     en el callejón de Huaylas.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/1.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Recuay</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/2.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Caminata por Chavin</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/3.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Caraz - Ancash</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/4.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Ciudad de Yungay</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/5.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Huaraz</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="scriptslanding/img/place/6.png" alt="">
                        <a href="#" class="prise">S/. 500</a>
                    </div>
                    <div class="place_info">
                        <a href="{{ route('destination.landing.details', 1) }}"><h3>Llanganuco</h3></a>
                        <p>Amércica Latina - Perú</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 visitas)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 días</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="{{ route('destination.landing') }}">Más Destinos</a>
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
                    <h3>!Reserva ya!</h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection