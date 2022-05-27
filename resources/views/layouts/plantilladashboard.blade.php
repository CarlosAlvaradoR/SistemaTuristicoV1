<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('tituloPagina')</title>

	<link href="{{ asset('img/favicon.144x144.png') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('img/favicon.114x114.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('img/favicon.72x72.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('img/favicon.57x57.png') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
	<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('scriptslanding/img/favicon.png') }}">

	<link rel="stylesheet" href="{{ asset('css/separate/elements/steps.min.css') }}"><!-- PARA LOS STEPS DINÁMICOS Y BONITOS-->
	<link rel="stylesheet" href="{{ asset('css/separate/pages/user.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lib/datatables-net/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/datatables-net.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/tags_editor.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/separate/pages/files.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/separate/vendor/jquery-steps.min.css') }}"> <!--PARA LOS SEPARADORES-->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	
	<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
	
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
</head>
<body class="with-side-menu">

	<header class="site-header">
	    <div class="container-fluid">
	
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{ asset('img/logo-2.png') }}" alt="">
	            <img class="hidden-lg-up" src="{{ asset('img/logo-2-mob.png') }}" alt="">
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
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
	                            <div class="dropdown-menu-notif-list">
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="{{ asset('img/photo-64-1.jpg') }}" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Morgan</a> was bothering about something
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="{{ asset('img/photo-64-2.jpg') }}" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="{{ asset('img/photo-64-3.jpg') }}" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="{{ asset('img/photo-64-4.jpg') }}" alt="">
	                                    </div>
	                                    <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something...</span>
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burtons</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ asset('img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-lang">
	                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <!--<span class="flag-icon flag-icon-peru"></span>-->
								<i class="flag-icon fas fa-shuttle-van"></i>
	                        </button>
	                        
	                    </div>
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{ asset('img/avatar-2-64.png') }}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#">
									<span class="font-icon glyphicon glyphicon-user"></span>{{ Auth::user()->name }}
								</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Ajustes</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<span class="font-icon glyphicon glyphicon-log-out"></span>Salir
								</a>
								
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-cogwheel"></span>
	                                <span class="lbl">Marketing automation</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
	                                <a class="dropdown-item" href="#">Current Search</a>
	                                <a class="dropdown-item" href="#">Search for Issues</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Recent issues</div>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                                <div class="dropdown-more">
	                                    <div class="dropdown-more-caption padding">more...</div>
	                                    <div class="dropdown-more-sub">
	                                        <div class="dropdown-more-sub-in">
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
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
	                            <a class="dropdown-toggle" id="dd-header-social" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-share"></span>
	                                <span class="lbl">Social media</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-social">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
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
	                            <a class="dropdown-toggle" id="dd-header-form-builder" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-pencil"></span>
	                                <span class="lbl">Form builder</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-form-builder">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown">
	                            <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                Añadir
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
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum is simply
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum is simply
	                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                The point of using Lorem Ipsum
	                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Lorem Ipsum
	                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
	                                            </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div><!--.help-dropdown-->
	                        
	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search"/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	
    <nav class="side-menu">
	    <ul class="side-menu-list">
            
	        <li class="blue with-sub">
	            <span>
	                <i class="fa fa-user"></i>
	                <span class="lbl">Usuarios</span>
	            </span>
	            <ul>
	                <li><a href="{{ route('usuarios.nuevos') }}"><span class="lbl">Nuevo</span><span class="label label-custom label-pill label-succes">new</span></a></li>
	                <li><a href="{{ route('usuarios.permisos') }}"><span class="lbl">Permisos</span></a></li>   
	            </ul>
	        </li>

			<li class="green with-sub">
	            <span>
	                <i class="fa fa-user"></i>
	                <span class="lbl">Trabajadores</span>
	            </span>
	            <ul>
	                <li><a href="{{ route('nuevos.choferes.vehiculo.admin') }}"><span class="lbl">Conductores</span><span class="label label-custom label-pill label-succes">new</span></a></li>
	                <li><a href="{{ route('nuevos.guias') }}"><span class="lbl">Guias</span></a></li>
					<li><a href="{{ route('nuevos.cocineros') }}"><span class="lbl">Cocineros</span></a></li>
					<li><a href="{{ route('nuevos.arrieros') }}"><span class="lbl">Arrieros</span></a></li>   
	            </ul>
	        </li>
			
			<li class="darkblue">
	            <a href="{{ route('nuevas.asociaciones') }}">
					<i class="fas fa-people-carry glyphicon glyphicon-send"></i>
	                <span class="lbl">Asociaciones</span>
	            </a>
	        </li>

			<li class="green">
	            <a href="{{ route('organizaciones.acemilas.equipos') }}">
	                <i class="font-icon glyphicon glyphicon-send"></i>
	                <span class="lbl">C. Viaje</span>
	            </a>
	        </li>

			<li class="darkblue">
	            <a href="#">
	                <i class="fas fa-suitcase glyphicon glyphicon-send"></i>
	                <span class="lbl">Equipos</span>
	            </a>
	        </li>

			<li class="darkblue">
	            <a href="{{ route('nuevos.transportes') }}">
					<i class="fas fa-car glyphicon glyphicon-send"></i>
	                <span class="lbl">Transporte</span>
	            </a>
	        </li>
			
			<li class="with-sub blue">
	            <span>
	                <i class="fal fa-backpack glyphicon glyphicon-send"></i>
	                <span class="lbl">Paquetes</span>
	            </span>
	            <ul>
	                <li><a href="{{ route('paquetes.activos.galeria') }}"><span class="lbl">Nuevo</span><span class="label label-custom label-pill label-succes">new</span></a></li>
	                <li><a href="{{ route('index.tipo.paquete') }}"><span class="lbl">Tipos</span></a></li>  
					<li><a href="{{ route('index.tipo.paquete') }}"><span class="lbl">Tipo Personal</span></a></li> 
					<li><a href="{{ route('index.tipo.paquete') }}"><span class="lbl">Reportes</span></a></li>   
	            </ul>
	        </li>
			<li class="green with-sub">
	            <span>
	                <i class="fas fa-mountain glyphicon glyphicon-send"></i>
	                <span class="lbl">Reservas</span>
	            </span>
	            <ul>
					<li><a href="{{ route('index.nuevos.clientes') }}"><span class="lbl">Clientes</span><span class="label label-custom label-pill label-success">new</span></a></li>
	                <li><a href="{{ route('reservas.formulario.nivel.admin') }}"><span class="lbl">Nuevo</span><span class="label label-custom label-pill label-success">new</span></a></li>
	                <li><a href="{{ route('reservas.pendientes') }}"><span class="lbl">Pendientes</span></a></li>
					<li><a href="{{ route('reservas.pendientes') }}"><span class="lbl">Completado</span></a></li>      
					<li><a href="{{ route('usuarios.permisos') }}"><span class="lbl">Riesgos</span><span class="label label-custom label-pill label-danger">new</span></a></li>
					<li><a href="{{ route('usuarios.permisos') }}"><span class="lbl">Eventos</span><span class="label label-custom label-pill label-danger">new</span></a></li> 
					<li><a href="{{ route('atención.cliente.solicitud') }}"><span class="lbl">Solicitudes</span><span class="label label-custom label-pill label-danger">new</span></a></li>   
	            </ul>
	        </li>

			<li class="orange with-sub">
	            <span>
	                <i class="fas fa-mountain glyphicon glyphicon-send"></i>
	                <span class="lbl">Viaje</span>
	            </span>
	            <ul>
					<li><a href="#"><span class="lbl">Nuevo</span><span class="label label-custom label-pill label-success">new</span></a></li>
	                <li><a href="{{ route('index.viajes.control.admin') }}"><span class="lbl">Componentes</span><span class="label label-custom label-pill label-danger">guia</span></a></li>
	            </ul>
	        </li>

			<li class="red">
	            <a href=#">
					<i class="fas fa-user-tie glyphicon glyphicon-send"></i>
	                <span class="lbl">Guía</span>
	            </a>
	        </li>
			
			<li class="darkblue">
	            <a href="{{ route('index.comprobante') }}">
					<i class="fas fa-ticket-alt glyphicon glyphicon-send"></i>
	                <span class="lbl">Comprobantes</span>
	            </a>
	        </li>

			<li class="darkblue">
	            <a href="{{ route('index.proveedor') }}">
					<i class="fas fa-user-tie glyphicon glyphicon-send"></i>
	                <span class="lbl">Proveedores</span>
	            </a>
	        </li>

			<li class="red">
	            <a href="{{ route('index.bancos') }}">
					<i class="fas fa-university glyphicon glyphicon-send"></i>
	                <span class="lbl">Bancos</span>
	            </a>
	        </li>

			<li class="green">
	            <a href="{{ route('index.tipoComprobantes') }}">
					<i class="fas fa-money-check glyphicon glyphicon-send"></i>
	                <span class="lbl">T. Comprobantes</span>
	            </a>
	        </li>

			<li class="darkblue">
	            <a href="{{ route('index.tipoPedidosProveedores') }}">
					<i class="fas fa-archive glyphicon glyphicon-send"></i>
	                <span class="lbl">Pedidos</span>
	            </a>
	        </li>

	    </ul>
	
	    
	</nav><!--.side-menu-->
    

	
    <div class="page-content">
		@yield('contenido')
	</div><!--.page-content-->




	
	<script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/lib/jquery-validation/jquery.validate.min.js') }}"></script> <!--PARA LOS STEPS-->
	<script src="{{ asset('js/lib/jquery-steps/jquery.steps.min.js') }}"></script> <!--PARA LOS STEPS-->
	<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
	<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/plugins.js') }}"></script>
	<script src="{{ asset('js/lib/datatables-net/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js') }}"></script>
	<script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js') }}"></script>
	<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>
	
	<script>
		$(function() {
			$('#example').DataTable();
		});
	</script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
	$(document).ready(function(){
		$(".boton").click(function(e) {
        e.preventDefault();
        //var data = $(this).attr("data-valor");
        //alert(data); 
		
		/*var valores = $(this).parents("tr").find("td")[0].innerHTML;
        console.log(valores);
		var valores2 = $(this).parents("tr").find("td")[1].innerHTML;
        
		$('#idpaquete').val(valores);
        //alert(valores);
		*/

        });   
    
	});
</script>

@yield('scripts')

</body>
</html>