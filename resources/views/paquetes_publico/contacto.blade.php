@extends('layouts/plantilla_landing')

@section('content')
    <!-- bradcam_area  -->
    @php
        use App\Models\ConfiguracionesGenerales;
        
        $conf = ConfiguracionesGenerales::find(1);
    @endphp
    <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Contacto</h3>
                        <p>Somos tu mejor opción</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">

            <div class="row">
                <div style="overflow-x:auto;">
                    <div class="col-9">
                        <h2 class="contact-title">Ubícanos</h2>
                        @if ($conf->direccion_del_mapa_en_google_maps)
                            {!! $conf->direccion_del_mapa_en_google_maps !!}
                        @else
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.8561138943655!2d-77.53092518565303!3d-9.521228102652996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a90d12eb234bf1%3A0xc860f66d7ad8abd9!2sUNIVERSIDAD%20NACIONAL%20SANTIAGO%20ANT%C3%9ANEZ%20DE%20MAYOLO!5e0!3m2!1ses!2spe!4v1675462860289!5m2!1ses!2spe"
                                width="1100" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        @endif

                    </div>
                </div>


                <div class="col-lg-3 offset-lg-1">
                    <br>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            @if ($conf->direccion_de_la_empresa)
                                <h3>{{ $conf->direccion_de_la_empresa }}</h3>
                                <p>{{ $conf->direccion_de_la_empresa }}</p>
                            @else
                                <h3>Huaraz - Áncash</h3>
                                <p>Av. Independencia 566</p>
                            @endif

                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            @if ($conf->telefono_de_contacto_de_la_empresa)
                                <h3>{{ $conf->telefono_de_contacto_de_la_empresa }}</h3>
                                <p>{{ $conf->telefono_de_contacto_de_la_empresa }}</p>
                            @else
                                <h3>+1 253 565 2365</h3>
                                <p>Lun a Vier. 8 am - 10 pm</p>
                            @endif
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            @if ($conf->correo_de_contacto_de_la_empresa)
                                <h3>{{ $conf->correo_de_contacto_de_la_empresa }}</h3>
                                <p>{{ $conf->correo_de_contacto_de_la_empresa }}</p>
                            @else
                                <h3>soportetu@gmail.com</h3>
                                <p>Para consultas</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
@endsection
