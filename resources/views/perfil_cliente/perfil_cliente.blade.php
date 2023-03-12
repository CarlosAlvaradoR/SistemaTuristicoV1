@extends('layouts/plantilla_landing')


@section('content')
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-heading">Bienvenido(a) a su perfil - {{Auth::user()->name}}
                    </h3>

                </div>
                <div class="col-md-6">
                    <a href="">Ver mis paquetes</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Mis Datos Personales</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="google  " method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NOMBRES</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                    autocomplete="off"    
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">APELLIDOS</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DNI</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">GÉNERO</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DIRECCIÓN</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TELÉFONO</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" title="Actualizar el Correo Implica que tiene que Ingresar al Sistema con el nuevo correo, se le recomienda no actualizar este">DIRECCIÓN DE CORREO ELECTRÓNICO</label>
                                    <input class="form-control valid" name="name" id="name" type="text"
                                    value="{{ Auth::user()->email }}""
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Actualizar Contraseña</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="google  " method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña Actual</label>
                                    <input class="form-control valid" name="name" id="name" type="password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Ingrese su Contraseña Actual">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña Nueva</label>
                                    <input class="form-control valid" name="password" id="name" type="password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Ingrese la contraseña nueva">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Repetir Contraseña</label>
                                    <input class="form-control valid" name="name" id="name" type="password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Repita nuevamente la contraseña Ingresada con anterioridad">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
