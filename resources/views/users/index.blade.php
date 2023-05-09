@extends('layouts/plantilladashboard')


@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <h3>Reservar</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Paquetes</a></li>
                <li><a href="#">Reservar</a></li>
                <li><a href="#">Condiciones</a></li>
                <li class="active">Cliente</li>
            </ol>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-pull-6 col-md-6 col-sm-6">
                <section class="box-typical">
                    <div style="background-color: #00a8ff" class="container-fluid">
                        <div class="row">
                            <br>
                            <h5 style="text-align: center; color: aliceblue"><b>Información Personal</b></h5>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-card-photo">
                            <img src="{{ asset('dashboard_assets/img/avatar-2-256.png') }}" alt="">
                        </div>
                        <div class="profile-card-name">{{ strtoupper($persona->nombre . ' ' . $persona->apellidos) }}
                        </div>
                        {{-- <div class="profile-card-status"> - ll</div> --}}
                        <div class="profile-card-location">{{ $userRole }}</div>
                        {{-- <button type="button" class="btn btn-rounded">Follow</button> --}}

                    </div>
                    <!--.profile-card-->

                    <div class="container-fluid">
                        <form action="{{ route('perfil.change') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="dni"><b>DNI</b></label>
                                        <input type="text" class="form-control" name="dni"
                                            id="dni" value="{{ $persona->dni }}" required
                                            placeholder="Ingrese DNI del Usuario">

                                        @if ($errors->first('dni'))
                                            <small class="text-danger">{{ $errors->first('dni') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="nombre"><b>NOMBRES</b></label>
                                        <input type="text" class="form-control" value="{{ $persona->nombre }}"
                                            name="nombre" id="nombre" required
                                            placeholder="Ingrese Nombres del Usuario">
                                        @if ($errors->first('nombre'))
                                            <small class="text-danger">{{ $errors->first('nombre') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="apellidos"><b>APELLIDOS
                                            </b></label>
                                        <input type="text" class="form-control" value="{{ $persona->apellidos }}"
                                            name="apellidos" id="apellidos" required
                                            placeholder="Ingrese Apellidos del Usuario">
                                        @if ($errors->first('apellidos'))
                                            <small class="text-danger">{{ $errors->first('apellidos') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="genero"><b>GÉNERO</b></label>
                                        <select class="form-control" id="genero" name="genero">
                                            <option value="">...Seleccione...</option>
                                            <option value="1" @if ($persona->genero == 1) selected @endif>
                                                Masculino</option>
                                            <option value="2" @if ($persona->genero == 2) selected @endif>
                                                Femenino</option>
                                        </select>
                                        
                                        @if ($errors->first('genero'))
                                            <small
                                                class="text-danger">{{ $errors->first('genero') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="telefono"><b>TELÉFONO</b></label>
                                        <input type="text" value="{{ $persona->telefono }}" class="form-control"
                                            name="telefono" id="telefono" required
                                            placeholder="Ingrese Teléfono del Usuario">
                                        @if ($errors->first('telefono'))
                                            <small
                                                class="text-danger">{{ $errors->first('telefono') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="dirección"><b>DIRECCIÓN</b></label>
                                        <input type="text" value="{{ $persona->dirección }}" class="form-control"
                                            name="dirección" id="dirección" required
                                            placeholder="Ingrese Dirección del Usuario">
                                        @if ($errors->first('dirección'))
                                            <small
                                                class="text-danger">{{ $errors->first('dirección') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="email"><b>CORREO
                                                ELECTRÓNICO</b></label>
                                        <input type="email" value="{{ auth()->user()->email }}" class="form-control"
                                            name="email" id="email" required
                                            placeholder="Ingrese Correo Electrónico del Usuario">
                                        @if ($errors->first('email'))
                                            <small
                                                class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                {{-- <div class="col-lg-12" style="text-align: center">
                                    <button type="submit" class="btn btn-primary btn-rounded">Actualizar
                                        Contraseña</button>
                                </div> --}}
                            </div>
                        </form>
                    </div>

                </section>
                <!--.box-typical-->

            </div>
            <!--.col- -->

            <div class="col-lg-6 col-lg-pull-6 col-md-6 col-sm-6">
                <section class="box-typical">
                    <div style="background-color: #00a8ff" class="container-fluid">
                        <div class="row">
                            <br>
                            <h5 style="text-align: center; color: aliceblue"><b>Cambiar Contraseña</b></h5>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <br>
                        @if (session('notificationSuccess'))
                            <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('notificationSuccess') }}
                            </div>
                        @endif

                        @if (session('notification'))
                            <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('notification') }}
                            </div>
                        @endif


                        <form action="{{ route('perfil.change') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="password_actual"><b>PASSWORD ACTUAL</b></label>
                                        <input type="password" class="form-control" name="password_actual"
                                            id="password_actual" required placeholder="Ingrese su Contraseña Actual">

                                        @if ($errors->first('password_actual'))
                                            <small class="text-danger">{{ $errors->first('password_actual') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="password"><b>CONTRASEÑA NUEVA</b></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            required placeholder="Ingrese su Contraseña Nueva">
                                        @if ($errors->first('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label" for="password_confirmation"><b>CONFIRMAR CONTRASEÑA
                                                NUEVA</b></label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" required placeholder="Repita Su Contraseña Nueva">
                                        @if ($errors->first('password_confirmation'))
                                            <small
                                                class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-lg-12" style="text-align: center">
                                    <button type="submit" class="btn btn-primary btn-rounded">Actualizar
                                        Contraseña</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <ul class="profile-links-list">

                        <li class="divider"></li>
                        <li>
                            <i class="font-icon font-icon-pdf-fill"></i>
                            <a href="#!">Exportar PDF</a>
                        </li>
                    </ul>
                </section>
                <!--.box-typical-->

                {{-- <section class="box-typical">
                    <header class="box-typical-header-sm">
                        Friends
                        &nbsp;
                        <a href="#" class="full-count">268</a>
                    </header>
                    <div class="friends-list">
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name status-online"><a href="#">Dan Cederholm</a>
                                        </p>
                                        <p class="user-card-row-location">New York</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Oykun Yilmaz</a></p>
                                        <p class="user-card-row-location">Los Angeles</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Bill S Kenney</a></p>
                                        <p class="user-card-row-location">Cardiff</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                        <p class="user-card-row-location">Dusseldorf</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Dan Cederholm</a></p>
                                        <p class="user-card-row-location">New York</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section> --}}
                <!--.box-typical-->
            </div>
            <!--.col- -->


            {{--  <div class="col-lg-6 col-lg-push-6 col-md-6">
                <form class="box-typical">
                    <input type="text" class="write-something" placeholder="Write Something...">
                    <div class="box-typical-footer">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <button type="button" class="btn-icon">
                                        <i class="font-icon font-icon-earth"></i>
                                    </button>
                                    <button type="button" class="btn-icon">
                                        <i class="font-icon font-icon-picture"></i>
                                    </button>
                                    <button type="button" class="btn-icon">
                                        <i class="font-icon font-icon-calend"></i>
                                    </button>
                                    <button type="button" class="btn-icon">
                                        <i class="font-icon font-icon-video-fill"></i>
                                    </button>
                                </div>
                                <div class="tbl-cell tbl-cell-action">
                                    <button type="submit" class="btn btn-rounded">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">
                        Posts
                        <div class="slider-arrs">
                            <button type="button" class="posts-slider-prev">
                                <i class="font-icon font-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="posts-slider-next">
                                <i class="font-icon font-icon-arrow-right"></i>
                            </button>
                        </div>
                    </header>
                    <div class="posts-slider slick-initialized slick-slider">
                        <!--.slide-->
                        <!--.slide-->
                        <!--.slide-->
                        <!--.slide-->
                        <!--.slide-->
                        <!--.slide-->
                        <div aria-live="polite" class="slick-list draggable" style="height: 290px;">
                            <div class="slick-track" role="listbox" style="opacity: 1; width: 2376px; left: -297px;">
                                <div class="slide slick-slide slick-cloned" tabindex="-1" role="option"
                                    aria-describedby="slick-slide15" style="width: 297px;" data-slick-index="-1"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-3.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">Good News You Might Have Good News You Might
                                                Have Good News You Might Have </a>
                                        </div>
                                        <div class="post-announce-date">December 30, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide slick-current slick-active" tabindex="-1" role="option"
                                    aria-describedby="slick-slide10" style="width: 297px;" data-slick-index="0"
                                    aria-hidden="false">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="0">
                                                <img src="dashboard_assets/img/post-1.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="0">3 Myths That Confuse the D Myths That Confuse
                                                the D Myths That Confuse the D</a>
                                        </div>
                                        <div class="post-announce-date">Februrary 19, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide11" style="width: 297px;" data-slick-index="1"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">How Much Do We Spend on How Much Do We Spend
                                                on How Much Do We Spend on </a>
                                        </div>
                                        <div class="post-announce-date">January 21, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide12" style="width: 297px;" data-slick-index="2"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-3.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">Good News You Might Have Good News You Might
                                                Have Good News You Might Have </a>
                                        </div>
                                        <div class="post-announce-date">December 30, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide13" style="width: 297px;" data-slick-index="3"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-1.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">3 Myths That Confuse the D Myths That Confuse
                                                the D Myths That Confuse the D</a>
                                        </div>
                                        <div class="post-announce-date">Februrary 19, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide14" style="width: 297px;" data-slick-index="4"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">How Much Do We Spend on How Much Do We Spend
                                                on How Much Do We Spend on </a>
                                        </div>
                                        <div class="post-announce-date">January 21, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide15" style="width: 297px;" data-slick-index="5"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-3.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">Good News You Might Have Good News You Might
                                                Have Good News You Might Have </a>
                                        </div>
                                        <div class="post-announce-date">December 30, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                                <div class="slide slick-slide slick-cloned" tabindex="-1" role="option"
                                    aria-describedby="slick-slide10" style="width: 297px;" data-slick-index="6"
                                    aria-hidden="true">
                                    <article class="post-announce">
                                        <div class="post-announce-pic">
                                            <a href="#" tabindex="-1">
                                                <img src="dashboard_assets/img/post-1.jpeg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-announce-title">
                                            <a href="#" tabindex="-1">3 Myths That Confuse the D Myths That Confuse
                                                the D Myths That Confuse the D</a>
                                        </div>
                                        <div class="post-announce-date">Februrary 19, 2016</div>
                                        <ul class="post-announce-meta">
                                            <li>
                                                <i class="font-icon font-icon-eye"></i>
                                                18
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-heart"></i>
                                                5K
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-comment"></i>
                                                3K
                                            </li>
                                        </ul>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--.posts-slider-->
                </section>
                <!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">Background</header>
                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-notebook-bird"></i>
                            Summary
                        </header>
                        <div class="text-block text-block-typical">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                                aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </article>
                    <!--.profile-info-item-->

                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-case"></i>
                            Experience
                        </header>
                        <ul class="exp-timeline">
                            <li class="exp-timeline-item">
                                <div class="dot"></div>
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <div class="exp-timeline-range">2000 President</div>
                                            <div class="exp-timeline-status">Co-founder, Chairman</div>
                                            <div class="exp-timeline-location"><a href="#">Company</a></div>
                                        </div>
                                        <div class="tbl-cell tbl-cell-logo">
                                            <img src="dashboard_assets/img/logo-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="exp-timeline-item">
                                <div class="dot"></div>
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <div class="exp-timeline-range">1992–1999</div>
                                            <div class="exp-timeline-status">Senior Developer</div>
                                            <div class="exp-timeline-location"><a href="#">YouTube</a></div>
                                        </div>
                                        <div class="tbl-cell tbl-cell-logo">
                                            <img src="dashboard_assets/img/logo-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="exp-timeline-item">
                                <div class="dot"></div>
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <div class="exp-timeline-range">2000 President</div>
                                            <div class="exp-timeline-status">Co-founder, Chairman</div>
                                            <div class="exp-timeline-location"><a href="#">Company</a></div>
                                        </div>
                                        <div class="tbl-cell tbl-cell-logo">
                                            <img src="dashboard_assets/img/logo-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </article>
                    <!--.profile-info-item-->

                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-award"></i>
                            Edication
                        </header>
                        <ul class="exp-timeline">
                            <li class="exp-timeline-item">
                                <div class="dot"></div>
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <div class="exp-timeline-range">1973 – 1975</div>
                                            <div class="exp-timeline-status">Harvard University</div>
                                            <div class="exp-timeline-location"><a href="#">BS Computer Science</a>
                                            </div>
                                        </div>
                                        <div class="tbl-cell tbl-cell-logo">
                                            <img src="dashboard_assets/img/logo-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="exp-timeline-item">
                                <div class="dot"></div>
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <div class="exp-timeline-range">1960 – 1973</div>
                                            <div class="exp-timeline-status">Lakeside Scool, Seattle</div>
                                        </div>
                                        <div class="tbl-cell tbl-cell-logo">
                                            <img src="dashboard_assets/img/logo-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </article>
                    <!--.profile-info-item-->

                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-lamp"></i>
                            Skills
                        </header>

                        <section class="skill-item tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-num">
                                    <div class="skill-circle skill-circle-num">74</div>
                                </div>
                                <div class="tbl-cell tbl-cell-txt">Social Media Marketing</div>
                                <div class="tbl-cell tbl-cell-users">
                                    <img class="skill-user-photo" src="dashboard_assets/img/avatar-1-64.png"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-3.jpg"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-4.jpg"
                                        alt="">
                                    <div class="skill-circle skill-circle-users">+74</div>
                                </div>
                            </div>
                        </section>
                        <!--.skill-item-->

                        <section class="skill-item tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-num">
                                    <div class="skill-circle skill-circle-num">67</div>
                                </div>
                                <div class="tbl-cell tbl-cell-txt">Web Development</div>
                                <div class="tbl-cell tbl-cell-users">
                                    <img class="skill-user-photo" src="dashboard_assets/img/avatar-2-64.png"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-2.jpg"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-3.jpg"
                                        alt="">
                                    <div class="skill-circle skill-circle-users">+82</div>
                                </div>
                            </div>
                        </section>
                        <!--.skill-item-->

                        <section class="skill-item tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-num">
                                    <div class="skill-circle skill-circle-num">25</div>
                                </div>
                                <div class="tbl-cell tbl-cell-txt">Search Engine Optimization</div>
                                <div class="tbl-cell tbl-cell-users">
                                    <img class="skill-user-photo" src="dashboard_assets/img/avatar-3-64.png"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-1.jpg"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-2.jpg"
                                        alt="">
                                    <div class="skill-circle skill-circle-users">+4</div>
                                </div>
                            </div>
                        </section>
                        <!--.skill-item-->

                        <section class="skill-item tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-num">
                                    <div class="skill-circle skill-circle-num">20</div>
                                </div>
                                <div class="tbl-cell tbl-cell-txt">User Experience Design</div>
                                <div class="tbl-cell tbl-cell-users">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-3.jpg"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-4.jpg"
                                        alt="">
                                    <img class="skill-user-photo" src="dashboard_assets/img/photo-64-1.jpg"
                                        alt="">
                                    <div class="skill-circle skill-circle-users">+13</div>
                                </div>
                            </div>
                        </section>
                        <!--.skill-item-->
                    </article>
                    <!--.profile-info-item-->

                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-star"></i>
                            More interest
                        </header>
                        <div class="profile-interests">
                            <a href="#" class="label label-light-grey">Interest</a>
                            <a href="#" class="label label-light-grey">Example</a>
                            <a href="#" class="label label-light-grey">One more</a>
                            <a href="#" class="label label-light-grey">Here is example interest</a>
                            <a href="#" class="label label-light-grey">Interest</a>
                            <a href="#" class="label label-light-grey">Example</a>
                            <a href="#" class="label label-light-grey">One more</a>
                            <a href="#" class="label label-light-grey">Here is example interest</a>
                            <a href="#" class="label label-light-grey">Interest</a>
                            <a href="#" class="label label-light-grey">Example</a>
                            <a href="#" class="label label-light-grey">One more</a>
                            <a href="#" class="label label-light-grey">Here is example interest</a>
                        </div>
                    </article>
                    <!--.profile-info-item-->
                </section>
                <!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">
                        Recomendations
                        <div class="slider-arrs">
                            <button type="button" class="recomendations-slider-prev">
                                <i class="font-icon font-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="recomendations-slider-next">
                                <i class="font-icon font-icon-arrow-right"></i>
                            </button>
                        </div>
                    </header>
                    <div class="recomendations-slider slick-initialized slick-slider">
                        <!--.slide-->

                        <!--.slide-->

                        <!--.slide-->

                        <!--.slide-->

                        <!--.slide-->

                        <!--.slide-->
                        <div aria-live="polite" class="slick-list draggable" style="height: 193px;">
                            <div class="slick-track" role="listbox" style="opacity: 1; width: 2376px; left: -297px;">
                                <div class="slide slick-slide slick-cloned" tabindex="-1" role="option"
                                    aria-describedby="slick-slide25" style="width: 297px;" data-slick-index="-1"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide slick-current slick-active" tabindex="-1" role="option"
                                    aria-describedby="slick-slide20" style="width: 297px;" data-slick-index="0"
                                    aria-hidden="false">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="0">
                                                    <img src="dashboard_assets/img/photo-64-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="0">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="0">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide21" style="width: 297px;" data-slick-index="1"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide22" style="width: 297px;" data-slick-index="2"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide23" style="width: 297px;" data-slick-index="3"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide24" style="width: 297px;" data-slick-index="4"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide" tabindex="-1" role="option"
                                    aria-describedby="slick-slide25" style="width: 297px;" data-slick-index="5"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide slick-slide slick-cloned" tabindex="-1" role="option"
                                    aria-describedby="slick-slide20" style="width: 297px;" data-slick-index="6"
                                    aria-hidden="true">
                                    <div class="citate-speech-bubble">
                                        <i class="font-icon-quote"></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    <div class="user-card-row">
                                        <div class="tbl-row">
                                            <div class="tbl-cell tbl-cell-photo">
                                                <a href="#" tabindex="-1">
                                                    <img src="dashboard_assets/img/photo-64-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="tbl-cell">
                                                <p class="user-card-row-name"><a href="#" tabindex="-1">Molly
                                                        Bridjet</a></p>
                                                <p class="user-card-row-status"><a href="#"
                                                        tabindex="-1">PatchworkLabs</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--.recomendations-slider-->
                </section>
                <!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">Following</header>
                    <div class="profile-following">
                        <div class="profile-following-grid">
                            <div class="col">
                                <article class="follow-group">
                                    <div class="follow-group-logo">
                                        <a href="#" class="follow-group-logo-in"><img
                                                src="dashboard_assets/img/logo-2.png" alt=""></a>
                                    </div>
                                    <div class="follow-group-name">
                                        <a href="#">KIPP Foundation</a>
                                    </div>
                                    <div class="follow-group-link">
                                        <a href="#">
                                            <span class="plus-link-circle"><span>+</span></span>
                                            Follow
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="follow-group">
                                    <div class="follow-group-logo">
                                        <a href="#" class="follow-group-logo-in"><img
                                                src="dashboard_assets/img/logo-2.png" alt=""></a>
                                    </div>
                                    <div class="follow-group-name">
                                        <a href="#">KIPP Foundation</a>
                                    </div>
                                    <div class="follow-group-link">
                                        <a href="#">
                                            <span class="plus-link-circle"><span>+</span></span>
                                            Follow
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="follow-group">
                                    <div class="follow-group-logo">
                                        <a href="#" class="follow-group-logo-in"><img
                                                src="dashboard_assets/img/logo-2.png" alt=""></a>
                                    </div>
                                    <div class="follow-group-name">
                                        <a href="#">KIPP Foundation</a>
                                    </div>
                                    <div class="follow-group-link">
                                        <a href="#">
                                            <span class="plus-link-circle"><span>+</span></span>
                                            Follow
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="follow-group">
                                    <div class="follow-group-logo">
                                        <a href="#" class="follow-group-logo-in"><img
                                                src="dashboard_assets/img/logo-2.png" alt=""></a>
                                    </div>
                                    <div class="follow-group-name">
                                        <a href="#">KIPP Foundation</a>
                                    </div>
                                    <div class="follow-group-link">
                                        <a href="#">
                                            <span class="plus-link-circle"><span>+</span></span>
                                            Follow
                                        </a>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <a href="#" class="btn btn-rounded btn-primary-outline">See all (20)</a>
                    </div>
                    <!--.profile-following-->
                </section>
                <!--.box-typical-->
            </div> --}}
            <!--.col- -->

            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <section class="box-typical">
                    <header class="box-typical-header-sm">People also viewed</header>
                    <div class="friends-list stripped">
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name status-online"><a href="#">Dan Cederholm</a>
                                        </p>
                                        <p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
                                    </div>
                                    <div class="tbl-cell tbl-cell-action">
                                        <a href="#" class="plus-link-circle"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Oykun Yilmaz</a></p>
                                        <p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
                                    </div>
                                    <div class="tbl-cell tbl-cell-action">
                                        <a href="#" class="plus-link-circle"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Bill S Kenney</a></p>
                                        <p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
                                    </div>
                                    <div class="tbl-cell tbl-cell-action">
                                        <a href="#" class="plus-link-circle"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
                                        <p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
                                    </div>
                                    <div class="tbl-cell tbl-cell-action">
                                        <a href="#" class="plus-link-circle"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="friends-list-item">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="dashboard_assets/img/photo-64-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Susan Andrews</a></p>
                                        <p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
                                    </div>
                                    <div class="tbl-cell tbl-cell-action">
                                        <a href="#" class="plus-link-circle"><span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="see-all">
                        <a href="#">See All (300)</a>
                    </div>

                    <section>
                        <header class="box-typical-header-sm">More Influencer</header>
                        <div class="profile-card-slider slick-initialized slick-slider"><i
                                class="slick-arrow font-icon-arrow-left" style="display: block;"></i>
                            <div aria-live="polite" class="slick-list draggable" style="height: 238px;">
                                <div class="slick-track" role="listbox" style="opacity: 1; width: 1878px; left: -313px;">
                                    <div class="slide slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                                        tabindex="-1" style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/avatar-3-256.png" alt="">
                                            </div>
                                            <div class="profile-card-name">Sarah Sanchez</div>
                                            <div class="profile-card-status">Longnameexample<br>corporation</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="-1">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                    <div class="slide slick-slide slick-current slick-active" data-slick-index="0"
                                        aria-hidden="false" tabindex="-1" role="option"
                                        aria-describedby="slick-slide00" style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/photo-220-1.jpg" alt="">
                                            </div>
                                            <div class="profile-card-name">Jackie Tran</div>
                                            <div class="profile-card-status">Company Founder</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="0">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                    <div class="slide slick-slide" data-slick-index="1" aria-hidden="true"
                                        tabindex="-1" role="option" aria-describedby="slick-slide01"
                                        style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/avatar-1-256.png" alt="">
                                            </div>
                                            <div class="profile-card-name">Jackie Tran</div>
                                            <div class="profile-card-status">Company Founder</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="-1">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                    <div class="slide slick-slide" data-slick-index="2" aria-hidden="true"
                                        tabindex="-1" role="option" aria-describedby="slick-slide02"
                                        style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/avatar-2-256.png" alt="">
                                            </div>
                                            <div class="profile-card-name">Sarah Sanchez</div>
                                            <div class="profile-card-status">Longnameexample<br>corporation</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="-1">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                    <div class="slide slick-slide" data-slick-index="3" aria-hidden="true"
                                        tabindex="-1" role="option" aria-describedby="slick-slide03"
                                        style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/avatar-3-256.png" alt="">
                                            </div>
                                            <div class="profile-card-name">Sarah Sanchez</div>
                                            <div class="profile-card-status">Longnameexample<br>corporation</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="-1">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                    <div class="slide slick-slide slick-cloned" data-slick-index="4" aria-hidden="true"
                                        tabindex="-1" style="width: 313px;">
                                        <div class="profile-card">
                                            <div class="profile-card-photo">
                                                <img src="dashboard_assets/img/photo-220-1.jpg" alt="">
                                            </div>
                                            <div class="profile-card-name">Jackie Tran</div>
                                            <div class="profile-card-status">Company Founder</div>
                                            <button type="button" class="btn btn-rounded btn-primary-outline"
                                                tabindex="-1">Follow</button>
                                        </div>
                                        <!--.profile-card-->
                                    </div>
                                </div>
                            </div>
                            <!--.slide-->
                            <!--.slide-->
                            <!--.slide-->
                            <!--.slide-->
                            <i class="slick-arrow font-icon-arrow-right" style="display: block;"></i>
                        </div>
                        <!--.profile-card-slider-->
                    </section>
                </section>
                <!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">People you may know</header>
                    <div class="people-rel-list">
                        <div class="people-rel-list-name"><a href="#">Jackie Tran Anh</a> / Designer</div>
                        <ul class="people-rel-list-photos">
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/avatar-1-128.png" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/avatar-2-128.png" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/avatar-3-128.png" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="dashboard_assets/img/photo-92-1.jpg" alt=""></a></li>
                        </ul>
                        <form class="site-header-search">
                            <input type="text" placeholder="Search for people">
                            <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </section>
                <!--.box-typical-->
            </div> --}}
            <!--.col- -->
        </div>
        <!--.row-->
    </div>
@endsection
