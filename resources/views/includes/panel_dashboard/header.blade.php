<header class="site-header">
    @php
        use App\Models\ConfiguracionImagenes;
        use App\Models\Reservas\SerieComprobantes;
        
        $imagenGrande = ConfiguracionImagenes::find(1);
        
        $imagenPequeña = ConfiguracionImagenes::find(2);
        
        $serie_activa = SerieComprobantes::where('estado', 'ACTIVO')
            ->where('tipo_comprobantes_id', 1)
            ->get();
    @endphp
    <div class="container-fluid">

        <a href="/home" class="site-logo">
            @if ($imagenGrande->ruta_de_imagen)
                <img class="hidden-md-down" src="{{ asset('/' . $imagenGrande->ruta_de_imagen) }}" alt="">
            @else
                <img class="hidden-md-down" src="{{ asset('dashboard_assets/img/logo-2.png') }}" alt="">
            @endif

            @if ($imagenPequeña->ruta_de_imagen)
                <img class="hidden-lg-up" src="{{ asset('/' . $imagenPequeña->ruta_de_imagen) }}" alt="">
            @else
                <img class="hidden-lg-up" src="{{ asset('dashboard_assets/img/logo-2-mob.png') }}" alt="">
            @endif
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown dropdown-notification notif">
                        <a href="#"
                            class="@if (count($serie_activa) == 0) header-alarm @endif dropdown-toggle active"
                            id="dd-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="font-icon-alarm"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif"
                            aria-labelledby="dd-notification">
                            <div class="dropdown-menu-notif-header">
                                Notificaciones
                                @if (count($serie_activa) == 0)
                                    <span class="label label-pill label-danger">1</span>
                                @endif
                            </div>
                            <div class="dropdown-menu-notif-list">
                                <div class="dropdown-menu-notif-item">
                                    @if (count($serie_activa) == 0)
                                        <div class="photo">
                                            <img src="{{ asset('dashboard_assets/img/photo-64-1.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">{{ Auth::user()->name }}</a>
                                        Aún No se establece una inicialización del
                                        Comprobante de Boletas.
                                    @else
                                        Sin Notificaciones ...
                                    @endif
                                </div>

                            </div>
                            <div class="dropdown-menu-notif-more">
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown dropdown-notification messages">
                        <a href="#" class="header-alarm dropdown-toggle active" id="dd-messages"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="font-icon-mail"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages"
                            aria-labelledby="dd-messages">
                            <div class="dropdown-menu-messages-header">
                                <ul class="nav" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab-incoming"
                                            role="tab">
                                            Inbox
                                            <span class="label label-pill label-danger">8</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-outgoing"
                                            role="tab">Outbox</a>
                                    </li>
                                </ul>
                                <button type="button" class="create">
                                    <i class="font-icon font-icon-pen-square"></i>
                                </button>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                    <div class="dropdown-menu-messages-list">
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/photo-64-2.jpg') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Tim Collins</span>
                                            <span class="mess-item-txt">Morgan was bothering about
                                                something!</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/avatar-2-64.png') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Christian Burton</span>
                                            <span class="mess-item-txt">Morgan was bothering about something!
                                                Morgan was bothering about something.</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/photo-64-2.jpg') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Tim Collins</span>
                                            <span class="mess-item-txt">Morgan was bothering about
                                                something!</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/avatar-2-64.png') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Christian Burton</span>
                                            <span class="mess-item-txt">Morgan was bothering about
                                                something...</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
                                    <div class="dropdown-menu-messages-list">
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/avatar-2-64.png') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Christian Burton</span>
                                            <span class="mess-item-txt">Morgan was bothering about something!
                                                Morgan was bothering about something...</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/photo-64-2.jpg') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Tim Collins</span>
                                            <span class="mess-item-txt">Morgan was bothering about something!
                                                Morgan was bothering about something.</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/avatar-2-64.png') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Christian Burtons</span>
                                            <span class="mess-item-txt">Morgan was bothering about
                                                something!</span>
                                        </a>
                                        <a href="#" class="mess-item">
                                            <span class="avatar-preview avatar-preview-32"><img
                                                    src="{{ asset('dashboard_assets/img/photo-64-2.jpg') }}"
                                                    alt=""></span>
                                            <span class="mess-item-name">Tim Collins</span>
                                            <span class="mess-item-txt">Morgan was bothering about
                                                something!</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu-notif-more">
                                <a href="#">See more</a>
                            </div>
                        </div>
                    </div>



                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('dashboard_assets/img/avatar-2-64.png') }}" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a href="{{ route('mi.perfil.de.usuario') }}" class="dropdown-item" href="#"><span
                                    class="font-icon glyphicon glyphicon-user"></span>Mi Perfil</a>

                            @if (auth()->user()->getRoleNames()->first() == 'admin')
                                <a class="dropdown-item" href="{{ route('configuración.del.sistema') }}"><span
                                        class="font-icon glyphicon glyphicon-cog"></span>Configuración del Sistema</a>
                            @endif

                            <a class="dropdown-item" href="#"><span
                                    class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div>
                <!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        <div class="dropdown dropdown-typical">
                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-speed"></span>Prep Official App</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-users"></span>CATprer Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-comments"></span>Third Party Test</a>
                            </div>
                        </div>
                        <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#"
                                href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="font-icon font-icon-cogwheel"></span>
                                <span class="lbl">Marketing automation</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
                                <a class="dropdown-item" href="#">Current Search</a>
                                <a class="dropdown-item" href="#">Search for Issues</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Recent issues</div>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-speed"></span>Prep Official App</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-users"></span>CATprer Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-comments"></span>Third Party Test</a>
                                <div class="dropdown-more">
                                    <div class="dropdown-more-caption padding">more...</div>
                                    <div class="dropdown-more-sub">
                                        <div class="dropdown-more-sub-in">
                                            <a class="dropdown-item" href="#"><span
                                                    class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                            <a class="dropdown-item" href="#"><span
                                                    class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                            <a class="dropdown-item" href="#"><span
                                                    class="font-icon font-icon-speed"></span>Prep Official App</a>
                                            <a class="dropdown-item" href="#"><span
                                                    class="font-icon font-icon-users"></span>CATprer Test</a>
                                            <a class="dropdown-item" href="#"><span
                                                    class="font-icon font-icon-comments"></span>Third Party
                                                Test</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Import Issues from CSV</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Filters</div>
                                <a class="dropdown-item" href="#">My Open Issues</a>
                                <a class="dropdown-item" href="#">Reported by Me</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Manage filters</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Timesheet</div>
                                <a class="dropdown-item" href="#">Subscribtions</a>
                            </div>
                        </div>
                        <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-social" data-target="#"
                                href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="font-icon font-icon-share"></span>
                                <span class="lbl">Social media</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dd-header-social">
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-speed"></span>Prep Official App</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-users"></span>CATprer Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-comments"></span>Third Party Test</a>
                            </div>
                        </div>
                        <div class="dropdown dropdown-typical">
                            <a href="#" class="dropdown-toggle no-arr">
                                <span class="font-icon font-icon-page"></span>
                                <span class="lbl">Projects</span>
                                <span class="label label-pill label-danger">35</span>
                            </a>
                        </div>

                        <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-form-builder" data-target="#"
                                href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="font-icon font-icon-pencil"></span>
                                <span class="lbl">Form builder</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dd-header-form-builder">
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-speed"></span>Prep Official App</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-users"></span>CATprer Test</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon font-icon-comments"></span>Third Party Test</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dd-header-add">
                                <a class="dropdown-item" href="#">Quant and Verbal</a>
                                <a class="dropdown-item" href="#">Real Gmat Test</a>
                                <a class="dropdown-item" href="#">Prep Official App</a>
                                <a class="dropdown-item" href="#">CATprer Test</a>
                                <a class="dropdown-item" href="#">Third Party Test</a>
                            </div>
                        </div>
                        <div class="help-dropdown">
                            <button type="button">
                                <i class="font-icon font-icon-help"></i>
                            </button>
                            <div class="help-dropdown-popup">
                                <div class="help-dropdown-popup-side">
                                    <ul>
                                        <li><a href="#">Getting Started</a></li>
                                        <li><a href="#" class="active">Creating a new project</a></li>
                                        <li><a href="#">Adding customers</a></li>
                                        <li><a href="#">Settings</a></li>
                                        <li><a href="#">Importing data</a></li>
                                        <li><a href="#">Exporting data</a></li>
                                    </ul>
                                </div>
                                <div class="help-dropdown-popup-cont">
                                    <div class="help-dropdown-popup-cont-in">
                                        <div class="jscroll">
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard
                                                    dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin literature from 45
                                                    BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web
                                                    page editors now use Lorem Ipsum as their default model
                                                    text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of
                                                    Lorem Ipsum available</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard
                                                    dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin literature from 45
                                                    BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web
                                                    page editors now use Lorem Ipsum as their default model
                                                    text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of
                                                    Lorem Ipsum available</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard
                                                    dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin literature from 45
                                                    BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web
                                                    page editors now use Lorem Ipsum as their default model
                                                    text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of
                                                    Lorem Ipsum available</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--.help-dropdown-->

                        <div class="site-header-search-container">
                            <form class="site-header-search closed">
                                <input type="text" placeholder="Search" />
                                <button type="submit">
                                    <span class="font-icon-search"></span>
                                </button>
                                <div class="overlay"></div>
                            </form>
                        </div>
                    </div>
                    <!--.site-header-collapsed-in-->
                </div>
                <!--.site-header-collapsed-->
            </div>
            <!--site-header-content-in-->
        </div>
        <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
</header>
