<div>
    <div class="row">
        <div class="col-lg-12 col-lg-pull-12 col-md-12 col-sm-12">
            <section class="box-typical">
                <div style="background-color: #00a8ff" class="container-fluid">
                    <div class="row">
                        <br>
                        <h5 style="text-align: center; color: aliceblue"><b>LOGO PRINCIPAL DEL SISTEMA - MAXIMIZADO</b>
                        </h5>
                    </div>
                </div>


                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <form wire:submit.prevent="saveImageMaximized">
                                <fieldset class="form-group">
                                    <label><b>Imagen Maximizada del Sistema</b></label>
                                    <label class="form-label" for="dni">Subir Imagen Maximizada</label>
                                    <input type="file" wire:model.defer="imagenMaximizada" class="form-control"
                                        value="" required>
                                    <small class="text-primary" wire:loading wire:target="imagenMaximizada">Cargando
                                        Imagen ...</small>
                                    @error('imagenMaximizada')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </fieldset>

                                <br>
                                <button type="submit" class="btn btn-primary btn-rounded">Actualizar</button>

                            </form>
                        </div>

                        @if ($imagenMaximizada)
                            <div class="col-lg-3">
                                <label for="">Previsualización de la Imagen</label>
                                <img src="{{ $imagenMaximizada->temporaryUrl() }}" height="170" width="170">
                            </div>
                        @endif

                        <div class="col-lg-3">
                            @if (count($imagenes) > 0)
                                @if ($imagenes[0]->ruta_de_imagen)
                                    <label for="">Imagen Por Defecto</label>
                                    <img src="{{ asset('/' . $imagenes[0]->ruta_de_imagen) }}" height="170"
                                        width="170">
                                @else
                                    <label for="">Imagen Por Defecto</label>
                                    <img src="{{ asset('dashboard_assets/img/logo-2.png') }}" height="170"
                                        width="170">
                                @endif
                            @else
                                <label for="">Imagen Por Defecto</label>
                                <img src="{{ asset('dashboard_assets/img/logo-2.png') }}" height="170" width="170">
                            @endif
                        </div>

                    </div>


                </div>

            </section>
            <!--.box-typical-->

        </div>
        <!--.col- -->

        <div class="col-lg-12 col-lg-pull-12 col-md-12 col-sm-12">
            <section class="box-typical">
                <div style="background-color: #00a8ff" class="container-fluid">
                    <div class="row">
                        <br>
                        <h5 style="text-align: center; color: aliceblue"><b>LOGO PRINCIPAL DEL SISTEMA - MINIMIZADO</b>
                        </h5>
                    </div>
                </div>

                <div class="container-fluid">
                    <br>


                    <form wire:submit.prevent="saveImagenMinimizada">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <form action="">
                                    <fieldset class="form-group">
                                        <label><b>Imagen Minimizada del Sistema</b></label>
                                        <label class="form-label" for="dni">Subir Imagen Minimizada</label>
                                        <input type="file" class="form-control" wire:model.defer="imagenMinimizada"
                                            required placeholder="Ingrese DNI del Usuario">

                                        <small class="text-primary" wire:loading wire:target="imagenMinimizada">Cargando
                                            Imagen ....</small>
                                        @error('imagenMinimizada')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-rounded">Actualizar
                                    </button>

                                </form>

                            </div>
                            @if ($imagenMinimizada)
                                <div class="col-lg-3">
                                    <label for="">Previsualización de la Imagen</label>
                                    <img src="{{ $imagenMinimizada->temporaryUrl() }}" height="170" width="170">
                                </div>
                            @endif

                            <div class="col-lg-3">
                                @if (count($imagenes) > 0)
                                    @if ($imagenes[1]->ruta_de_imagen)
                                        <label for="">Imagen Por Defecto</label>
                                        <img src="{{ asset('/' . $imagenes[1]->ruta_de_imagen) }}" height="170"
                                            width="170">
                                    @else
                                        <label for="">Imagen Por Defecto</label>
                                        <img src="{{ asset('dashboard_assets/img/logo-2-mob.png') }}" height="170"
                                            width="170">
                                    @endif
                                @else
                                    <label for="">Imagen Por Defecto</label>
                                    <img src="{{ asset('dashboard_assets/img/logo-2-mob.png') }}" height="170"
                                        width="170">
                                @endif
                            </div>

                        </div>

                    </form>

                </div>


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

        <div class="col-lg-12 col-lg-pull-12 col-md-12 col-sm-12">
            <section class="box-typical">
                <div style="background-color: #00a8ff" class="container-fluid">
                    <div class="row">
                        <br>
                        <h5 style="text-align: center; color: aliceblue"><b>CONFIGURACIONES GENERALES</b>
                        </h5>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInput">Nombre de la Empresa</label>
                                <input type="text" class="form-control maxlength-simple" id="exampleInput"
                                    placeholder="First Name" maxlength="15">
                                <small class="text-muted">Max length 15, simple</small>
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Dirección de la Empresa</label>
                                <input type="email" class="form-control maxlength-custom-message"
                                    id="exampleInputEmail1" placeholder="Enter email" maxlength="20">
                                <small class="text-muted">Max length 20, custom message</small>
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Teléfono de Contacto</label>
                                <input type="password" class="form-control maxlength-always-show"
                                    id="exampleInputPassword1" placeholder="Password" maxlength="10">
                                <small class="text-muted">Max length 10, always show</small>
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Correo de Contacto</label>
                                <input type="email" class="form-control maxlength-custom-message"
                                    id="exampleInputEmail1" placeholder="Enter email" maxlength="20">
                                <small class="text-muted">Max length 20, custom message</small>
                            </fieldset>
                        </div>
                        <div class="col-lg-8">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Dirección del Mapa en Google Maps</label>
                                <input type="password" class="form-control maxlength-always-show"
                                    id="exampleInputPassword1" placeholder="Password" maxlength="10">
                                <small class="text-muted">Max length 10, always show</small>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-rounded">Actualizar</button>
                        </div>
                        
                    </div>
                </div>

            </section>
            <!--.box-typical-->


            <!--.box-typical-->
        </div>
        <!--.col- -->
        <!--.col- -->


        <!--.col- -->
    </div>
</div>
