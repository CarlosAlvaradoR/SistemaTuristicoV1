@extends('layouts/plantilla_landing')

@section('content')
    <!-- bradcam_area  -->
    <div class="overlay">
        <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image" width="1348" height="800">
    </div>
    <!--/ bradcam_area  -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container box_1170">
            <h3 class="text-heading">{{$paquete->nombre}}</h3>
            @livewire('reservas-publicas.reservas.formulario-reservas', [$paquete])
            

        </div>
    </section>
    <!-- End Sample Area -->
@endsection
