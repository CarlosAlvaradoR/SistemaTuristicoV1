@extends('layouts/plantilla_landing')


@section('content')
    <div class="bradcam_area bradcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Sobre Nosotros</h3>
                        <p>Nuestros detalles más relevantes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="about_story">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="story_heading">
                        <h3>Nuestra Historia</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 offset-lg-1">
                            <div class="story_info">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p>Somos una empresa que nació en 1998 , y crecimos con un alto empeño</p>
                                        <p>La consultoría representa el éxito al darse cuenta de que la empresa va en la
                                            dirección equivocada. La única vez que la empresa falla es cuando ya no es
                                            posible hacer un cambio. Ayudamos a las empresas a orientarse hacia direcciones
                                            más rentables donde puedan expandirse y crecer. Es inevitable que las empresas
                                            terminen cometiendo algunos errores; les ayudamos a corregir estos errores.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="story_thumb">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="thumb padd_1">
                                            <img src="scriptslanding/img/about/1.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="thumb">
                                            <img src="scriptslanding/img/about/2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="counter_wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">120</h3>
                                            <p>Cantidad de Visitas</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">30</h3>
                                            <p>Cantidad de Paquetes Disponibles</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">178</h3>
                                            <p>Clientes Felices</p>
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

    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Reproduce nuestra historia</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=36up8tGtXtg">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--<div class="travel_variation_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="scriptslanding/img/svg_icon/1.svg" alt="">
                        </div>
                        <h3>Premio Atusparia de Oro 2020</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="scriptslanding/img/svg_icon/2.svg" alt="">
                        </div>
                        <h3>Premio Atusparia de Oro 2021</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="scriptslanding/img/svg_icon/3.svg" alt="">
                        </div>
                        <h3>Premio Atusparia de Oro 2022</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->


    <!-- testimonial_area
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="scriptslanding/img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Micky Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="scriptslanding/img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Tom Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="scriptslanding/img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Jerry Mouse</h3>
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
    /testimonial_area  -->


    <!--<div class="recent_trip_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Viajes Recientes</h3>
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
                                <h3>Los Viajes se miden mejor en nuevos amigos.</h3>
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
                                <h3>Los Viajes se miden mejor en nuevos amigos.</h3>
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
                                <h3>Los Viajes se miden mejor en nuevos amigos.</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
@endsection
