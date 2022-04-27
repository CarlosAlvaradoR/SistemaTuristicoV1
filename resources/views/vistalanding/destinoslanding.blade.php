@extends('layouts/plantillalanding')

@section('titulo','Detalles de Paquetes Turísticos')


@section('contenido')
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Destinos</h3>
                    <p>Elige nuestros mejores paquetes</p>
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
                    <h3>A dónde quieres ir?</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="#">
                        <div class="input_field">
                            <input type="text" placeholder="A dónde quieres ir ??">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" placeholder="Fecha">
                        </div>
                        <div class="input_field">
                            <select>
                                <option data-display="Tipo de Viaje">Tipo de Viaje</option>
                                <option value="1">Caminata</option>
                                <option value="2">Turismo</option>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="filter_result_wrap">
                    <h3>Filtrar resultados</h3>
                    <div class="filter_bordered">
                        <div class="filter_inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_select">
                                        <select>
                                            <option data-display="Ciudad">Ciudad</option>
                                            <option value="1">Africa</option>
                                            <option value="2">canada</option>
                                            <option value="4">USA</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_select">
                                        <select>
                                            <option data-display="Tipo de Paquete">Tipo de Paquete</option>
                                            <option value="1">Caminata</option>
                                            <option value="2">Vuelo</option>
                                            <option value="4">Caminata en Parque</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="range_slider_wrap">
                                        <span class="range">Rango</span>
                                        <div id="slider-range"></div>
                                        <p>
                                            <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-weight:400;">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="reset_btn">
                            <button class="boxed-btn4" type="submit">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($paquetes as $paquete)
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <!--<img src="" alt="">-->
                                    <img src="{{ asset('imagen/'.$paquete->imagen_principal) }}" class="img-circle" alt="Paquete" width="304" height="215">
                                    <a href="#" class="prise">S/. {{$paquete->precio}}</a>
                                </div>
                                <div class="place_info">
                                    <!--<a href="{ route('prueba', ['id'=>1, 'slug'=>'google']) }}">SPREM</a>-->
                                    <a href="{{ route('destination.landing.details', $paquete->slug) }}"><h3>{{$paquete->nombre}}</h3></a>
                                    <p>Perú</p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i>
                                            <!--<a href="#">(20 visitado)</a>-->
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-clock-o"></i>
                                            <!--<a href="#">5 Días</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    @endforeach
                    
                    <!--<div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="scriptslanding/img/place/2.png" alt="">
                                <a href="#" class="prise">S/. 500</a>
                            </div>
                            <div class="place_info">
                                <a href="{ route('destination.landing.details') }}"><h3>Parque Huascarán</h3></a>
                                <p>Amércica Latina - Perú</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 visitado)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Días</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="scriptslanding/img/place/3.png" alt="">
                                <a href="#" class="prise">S/. 500</a>
                            </div>
                            <div class="place_info">
                                <a href="{ route('destination.landing.details') }}"><h3>Lima</h3></a>
                                <p>Amércica Latina - Perú</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 visitado)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Días</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="scriptslanding/img/place/4.png" alt="">
                                <a href="#" class="prise">S/. 500</a>
                            </div>
                            <div class="place_info">
                                <a href="{ route('destination.landing.details') }}"><h3>Ciudad de Huaraz</h3></a>
                                <p>Amércica Latina - Perú</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 visitado)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Días</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="scriptslanding/img/place/5.png" alt="">
                                <a href="#" class="prise">S/. 500</a>
                            </div>
                            <div class="place_info">
                                <a href="{ route('destination.landing.details') }}"><h3>Máncora</h3></a>
                                <p>Amércica Latina - Perú</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 visitado)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Días</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="scriptslanding/img/place/6.png" alt="">
                                <a href="#" class="prise">S/. 500</a>
                            </div>
                            <div class="place_info">
                                <a href="{ route('destination.landing.details') }}"><h3>Ciudad de Caraz</h3></a>
                                <p>Amércica Latina - Perú</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 visitado)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Días</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item active">
                                        {{ $paquetes->links() }}
                                    </li>
                                </ul>
                            </nav>
                            
                            <!--<a class="boxed-btn4" href="#">Ver más</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- newletter_area_start 
    <div class="newletter_area overlay">
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
                                            <input type="email" placeholder="Your mail" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    newletter_area_end  -->


<!--    <div class="recent_trip_area">
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
                        <img src="scriptslanding/img/trip/1.png" alt="">
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
                        <img src="scriptslanding/img/trip/2.png" alt="">
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
                        <img src="scriptslanding/img/trip/3.png" alt="">
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