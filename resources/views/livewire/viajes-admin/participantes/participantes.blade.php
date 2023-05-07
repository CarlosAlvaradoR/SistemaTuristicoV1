<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        <a class="btn btn-primary btn-sm btn-rounded" href="{{ route('paquete.viajes', $paquete) }}"
                            title="Volver">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Lista de Reservas
                    </h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Fecha de Reserva</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes_reservados as $cr)
                                <tr>
                                    <td>
                                        {{ $cr->datos }}
                                    </td>
                                    <td>
                                        {{ $cr->fecha_reserva }}
                                    </td>
                                    <td>
                                        <button type="button"
                                            wire:click="AsignarParticipanteViaje('{{ $cr->slug }}')"
                                            title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-success" wire:loading.attr="disabled">
                                            <i class="fal fa-plus"></i>
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
                    <h5 class="card-title">Lista de Participantes</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participantes as $p)
                                <tr>
                                    <td>
                                        {{ $p->datos }}
                                    </td>
                                    <td>
                                        <a href="{{ route('paquete.viajes.participantes.entregaEquipos', [$paquete->slug, $viaje->slug, $p->id]) }}"
                                            type="button" title="Entregar Equipo al Participante"
                                            class="btn btn-sm btn-rounded btn-primary">
                                            <i class="fas fa-plus-square"></i>
                                        </a>
                                        <button type="button" wire:click="quitarParticipante({{ $p->id }})"
                                            wire:loading.attr="disabled" title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-minus-circle"></i>
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

    @include('common.alerts')
</div>
