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
                                    {{-- @if ($p->nombre_estados == 'COMPLETADO')
                                       Medium
                                    @else
                                        <a href="#"
                                            class="genric-btn danger small circle arrow">{{ $p->nombre_estado }}</a>
                                    @endif --}}
                                </div>
                                <div class="serial">
                                    {{ $p->pago }}
                                </div>
                                <div class="percentage">
                                    <a href="#" class="genric-btn success small circle arrow">Añadir Pago</a>
                                    <a href="#" class="genric-btn info small circle arrow">Medium</a>
                                    <a href="#" class="genric-btn danger small circle arrow">Medium</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a id="modal-418541" href="#modal-container-418541" role="button" class="btn"
                        data-toggle="modal">Launch demo modal</a>

                    <div class="modal fade" id="modal-container-418541" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        Modal title
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary">
                                        Save changes
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
