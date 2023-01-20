@extends('layouts/plantilla_landing')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>elements</h3>
                        <p>Pixel perfect design with awesome contents</p>
                    </div>
                </div>
            </div>
        </div>
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
