<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Sistema de Paquetes Turísticos') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing_assets/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('landing_assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">


    @livewireStyles
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    @include('includes/panel_landing/header')

    @yield('content')




    @include('includes.panel_landing.footer')


    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="Search">
                    <button type="submit">search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- link that opens popup -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
        src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js">
    </script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- JS here -->
    <script src="{{ asset('landing_assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('landing_assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/scrollIt.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('landing_assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/slick.min.js') }}"></script>



    <!--contact js-->
    <script src="{{ asset('landing_assets/js/contact.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/mail-script.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ru.min.js
        "></script>-->

    <script src="{{ asset('landing_assets/js/main.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            },
            language: 'es'
        });
    </script>

    @livewireScripts
</body>

</html>
