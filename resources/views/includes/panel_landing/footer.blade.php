<footer class="footer">
    @php
        use App\Models\ConfiguracionImagenes;
        use App\Models\ConfiguracionesGenerales;
        
        $imagenGrande = ConfiguracionImagenes::find(1);
        
        $imagenPequeña = ConfiguracionImagenes::find(2);
        
        $conf = ConfiguracionesGenerales::find(1);
    @endphp

    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-md-9 col-lg-9 ">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                @if ($imagenGrande->ruta_de_imagen)
                                    <img src="{{ asset('/' . $imagenGrande->ruta_de_imagen) }}" alt=""
                                        height="41" width="138">
                                @else
                                    <img src="{{ asset('landing_assets/img/footer_logo.png') }}" alt="">
                                @endif
                            </a>
                        </div>
                        <p>
                            @if ($conf->direccion_de_la_empresa)
                                {{ $conf->direccion_de_la_empresa }} <br>
                            @else
                                5th flora, 700/D kings road, green <br> lane New York-1782 <br>
                            @endif

                            @if ($conf->telefono_de_contacto_de_la_empresa)
                                <a href="#">{{ $conf->telefono_de_contacto_de_la_empresa }}</a> <br>
                            @else
                                <a href="#">+10 367 826 2567</a> <br>
                            @endif
                            
                            @if ($conf->correo_de_contacto_de_la_empresa)
                                <a href="#">{{ $conf->correo_de_contacto_de_la_empresa }}</a> <br>
                            @else
                                <a href="#">contact@carpenter.com</a>
                            @endif

                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--<div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Company
                        </h3>
                        <ul class="links">
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#"> Gallery</a></li>
                            <li><a href="#"> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Popular destination
                        </h3>
                        <ul class="links double_links">
                            <li><a href="#">Indonesia</a></li>
                            <li><a href="#">America</a></li>
                            <li><a href="#">India</a></li>
                            <li><a href="#">Switzerland</a></li>
                            <li><a href="#">Italy</a></li>
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">Franch</a></li>
                            <li><a href="#">England</a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="col-xl-3 col-md-3 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Instagram
                        </h3>
                        <div class="instagram_feed">
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/1.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/2.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/3.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/4.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/5.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                            <div class="single_insta">
                                <a href="#">
                                    <img src="{{ asset('landing_assets/img/instagram/6.png') }}" height="75"
                                        width="75" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos los derechos reservados | Carlos Alvarado Robles
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
