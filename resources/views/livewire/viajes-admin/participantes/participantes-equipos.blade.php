<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold">FORMULARIO DE ENTREGA DE EQUIPOS</h5>
                    <div class="row">
                        <div class="col-md-2">
                            <span class="badge badge-default font-weight-bold">PARTICIPANTE:</span>
                        </div>
                        <div class="col-md-10">
                            <span class="badge badge-default">CARLOS EMILIO ALVARADO ROBLES</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_entrega">Fecha de Entrega</label>
                                <input type="date" class="form-control" wire:model.defer="fecha_entrega"
                                    id="fecha_entrega" placeholder="First Name" maxlength="15">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="hora_entrega">Hora de Entrega</label>
                                <input type="time" class="form-control maxlength-custom-message"
                                    wire:model.defer="hora_entrega" id="hora_entrega" placeholder="Enter email"
                                    maxlength="20">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_devoluvion">Fecha de Devolución</label>
                                <input type="date" class="form-control maxlength-always-show"
                                    wire:model.defer="fecha_devoluvion" id="fecha_devoluvion">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="hora_devolucion">Hora de Devolución</label>
                                <input type="time" class="form-control" wire:model.defer="hora_devolucion"
                                    id="hora_devolucion" placeholder="Password">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="estado">Estado de Devolución</label>
                                <input type="date" class="form-control maxlength-always-show"
                                    wire:model.defer="estado" id="estado" placeholder="Password" maxlength="10">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            @if ($idEntregaEquipo)
                                <button class="btn btn-primary btn-rounded"
                                    wire:click="saveEntregaEquipos">
                                    Actualizar
                                </button>
                            @else
                                <button class="btn btn-primary btn-rounded"
                                    wire:click="saveEntregaEquipos">
                                    Guardar
                                </button>
                            @endif
                            <button class="btn" wire:click="dd">HH</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Equipos Registrados</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">EQUIPO - Marca</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $e)
                                <tr>
                                    <td>
                                        {{ $e->nombre }}
                                    </td>
                                    <td>
                                        {{ $e->stock }}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
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
                    <h5 class="card-title">Lista de Equipos Entregados</h5>
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
                            {{-- @foreach ($participantes as $p)
                                <tr>
                                    <td>
                                        {{ $p->datos }}
                                    </td>
                                    <td>
                                        <a href="{{ route('paquete.viajes.participantes.entregaEquipos', [$paquete->slug, $viaje->slug, $p->id]) }}"
                                            title="Entregar Equipo al Participante"
                                            class="btn btn-sm btn-rounded btn-primary" wire:loading.attr="disabled">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <button type="button" wire:click="quitarParticipante({{ $p->id }})"
                                            title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger" wire:loading.attr="disabled">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('common.alerts')
</div>
