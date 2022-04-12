@extends('layouts/plantillalanding')

@section('titulo','Login')


@section('contenido')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Charles Tour</h3>
                        <p>Atendemos tus necesidades turísticas</p>
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
                    <div class="col-md-6">
                        <div class="col-lg-4 offset-lg-1">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h3>Huaraz 28 de Julio</h3>
                                    <p>2da Cuadra</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h3>+1 253888</h3>
                                    <p>Lunes a Sábado de 8:00 am - 8:00 pm</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3>turismo@gmail.com</h3>
                                    <p>Encuéntranos disponible</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border">
                        <div class="col-12">
                            <h2 class="contact-title">Iniciar Sesión</h2>
                        </div>
                        <div class="col-lg-8 justify-content-center">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                        
                                        <div class="col-md-12 form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       
                                        <div class="col-md-12 form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Password" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
    
                                    
                                   <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                        </div>
                                    </div>-->
                                </div>
                                <div class="form-group mt-12">
                                    <button type="submit" class="button button-sm-contactForm boxed-btn">Ingresar</button>
                                </div>
                            </form>
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
