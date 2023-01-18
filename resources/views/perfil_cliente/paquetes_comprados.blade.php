@extends('layouts/plantilla_landing')


@section('content')
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="section-top-border">
                <h3 class="mb-30">Mis compras</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="country">Paquete</div>
                            <div class="visit">Fecha</div>
                            <div class="percentage">Acciones</div>
                        </div>
                        <div class="table-row">
                            <div class="serial">01</div>
                            <div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
                            <div class="visit">645032</div>
                            <div class="percentage">
                                <a href="#" class="genric-btn success small circle arrow">Medium</a>
                                <a href="#" class="genric-btn info small circle arrow">Medium</a>
                                <a href="#" class="genric-btn danger small circle arrow">Medium</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
