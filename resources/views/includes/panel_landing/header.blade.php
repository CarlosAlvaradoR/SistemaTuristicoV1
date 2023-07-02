<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('landing_assets/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="/">Inicio</a></li>
                                        <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
                                        <li><a class="" href="{{ route('destinos') }}">Destinos</a></li>
                                        <li><a class="" href="{{ route('contacto') }}">Contacto</a></li>


                                        @if (Auth::check())
                                            @if (Auth::user()->hasRole('cliente'))
                                                <li><a href="#" class="bold">{{ Auth::user()->name }}<i
                                                            class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('mi.perfil.de.usuario') }}">Mi Perfil</a></li>
                                                        <li><a href="{{ route('cliente.paquetes') }}">Mis Paquetes</a>
                                                        </li>
                                                        <li><a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Salir</a>
                                                        </li>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a class="" href="{{ route('home') }}"><i class="fa fa-arrow-right"></i>
                                                    Ir a Administración</a></li>
                                            @endif
                                        @else
                                            <li><a href="#">Cuenta <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('login') }}">Ingresar</a></li>
                                                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->
