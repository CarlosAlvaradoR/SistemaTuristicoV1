<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Información</h5>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">CLIENTE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $cliente }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">DNI</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $dni }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">PAQUETE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $nombre_del_paquete }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Riesgos</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Riesgo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp
                            @foreach ($riesgos as $riesgos)
                                <tr>
                                    <th scope="row">{{ $cont++ }}</th>
                                    <td>{{ $riesgos->descripcion }}</td>
                                    <td>
                                        <button type="button" wire:click="aceptarRiesgo({{ $riesgos->id }})"
                                            class="btn btn-inline btn-success btn-sm">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Condiciones de Puntualidad</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Condición</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($condiciones_puntualidad as $c)
                                <tr>
                                    <th scope="row">{{ $contador++ }}</th>
                                    <td>{{ $c->descripcion }}</td>
                                    <td>
                                        <button type="button" wire:click="aceptarCondiciones({{$c->id}})" class="btn btn-inline btn-success btn-sm">
                                            <!--<i class="fa-sharp fa-solid fa-xmark"></i>-->
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Acciones</h5>
                    <button type="button" wire:click="finalizarReserva" class="btn btn-inline btn-success">Finalizar</button>
                    <button type="button" class="btn btn-inline btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
