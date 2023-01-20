@extends('layouts/plantilla_landing')


@section('content')
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="section-top-border">
                <h3 class="mb-30">Mis compras</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="country">Paquete</div>
                            <div class="country">Fecha</div>
                            <div class="country">Estado</div>
                            <div class="country">Monto</div>
                            <div class="country">Acciones</div>
                        </div>
                        @foreach ($paquetes_comprados as $p)
                            <div class="table-row">
                                <div class="country"> {{ $p->nombre }}</div>
                                <div class="serial">{{ $p->fecha_reserva }}</div>
                                <div class="serial">
                                    {{ $p->nombre_estado }}
                                    {{--@if ($p->nombre_estados == 'COMPLETADO')
                                       Medium
                                    @else
                                        <a href="#"
                                            class="genric-btn danger small circle arrow">{{ $p->nombre_estado }}</a>
                                    @endif--}}
                                </div>
                                <div class="serial">
                                    {{ $p->pago }}
                                </div>
                                <div class="percentage">
                                    <a href="#" class="genric-btn success small circle arrow">Medium</a>
                                    <a href="#" class="genric-btn info small circle arrow">Medium</a>
                                    <a href="#" class="genric-btn danger small circle arrow">Medium</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
