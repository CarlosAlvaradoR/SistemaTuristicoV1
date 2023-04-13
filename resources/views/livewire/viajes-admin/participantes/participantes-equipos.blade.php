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
                                <button class="btn btn-primary btn-rounded" wire:click="saveEntregaEquipos">
                                    Actualizar
                                </button>
                            @else
                                <button class="btn btn-primary btn-rounded" wire:click="saveEntregaEquipos">
                                    Guardar
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>


        @if ($idEntregaEquipo)
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
                                                class="btn btn-sm btn-rounded btn-success"
                                                wire:click="AñadirAlPedido({{ $e->id }})"
                                                wire:loading.attr="disabled">
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
                                    <th scope="col">Equipo/Marca</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos_asignados as $ea)
                                    <tr>
                                        <td>
                                            <small>{{ $ea->nombre }} - {{ $ea->marca }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $ea->cantidad }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $ea->observacion }}</small>
                                        </td>
                                        <td>
                                            <a href="{{-- route('paquete.viajes.participantes.entregaEquipos', [$eaaquete->slug, $viaje->slug, $ea->id]) --}}" title="Entregar Equipo al Participante"
                                                class="btn btn-sm btn-rounded btn-primary" wire:loading.attr="disabled">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                            <button type="button"
                                                wire:click="quitarParticipante({{-- $ea->id --}})"
                                                title="Quitar de la Lista de Participantes"
                                                class="btn btn-sm btn-rounded btn-danger"
                                                wire:loading.attr="disabled">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>


    <!-- Button trigger modal -->
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_entrega_de_equipos">
        Launch static backdrop modal
    </button>--}}

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal_entrega_de_equipos" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="modal_entrega_de_equiposLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_entrega_de_equiposLabel">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input type="number" wire:model.defer="cantidad" class="form-control"
                                    id="cantidad" placeholder="ej: 5">
                                @error('cantidad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="observacion">Observación</label>
                                <textarea class="form-control" wire:model.defer="observacion" id="observacion" rows="3"></textarea>
                                @error('observacion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="saveDetalleEntregas">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal_entrega_de_equipos').modal('show')
            });
            window.livewire.on('traslados-updated', msg => {
                $('#modal_entrega_de_equipos').modal('hide')
                Swal.fire(
                    'MUY BIEN',
                    msg,
                    'success'
                )
            });
            window.livewire.on('category-updated', msg => {
                $('#modal-empresa-transporte').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
