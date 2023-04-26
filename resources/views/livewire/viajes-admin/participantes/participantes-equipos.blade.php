<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-plus-circle"></i> FORMULARIO DE ENTREGA DE
                        EQUIPOS</h5>
                    <div class="row">
                        <div class="col-md-2">
                            <span class="badge badge-default font-weight-bold">PARTICIPANTE:</span>
                        </div>
                        <div class="col-md-10">
                            <span
                                class="badge badge-default">{{ strtoupper($informacion_participantes[0]->nombre . ' ' . $informacion_participantes[0]->apellidos) }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_entrega">Fecha de Entrega</label>
                                <input type="date" class="form-control" wire:model.defer="fecha_entrega"
                                    id="fecha_entrega" placeholder="First Name" maxlength="15">
                                @error('fecha_entrega')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="hora_entrega">Hora de Entrega</label>
                                <input type="time" class="form-control maxlength-custom-message"
                                    wire:model.defer="hora_entrega" id="hora_entrega" placeholder="Enter email"
                                    maxlength="20">
                                @error('hora_entrega')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_devoluvion">Fecha de Devolución</label>
                                <input type="date" class="form-control maxlength-always-show"
                                    wire:model.defer="fecha_devoluvion" id="fecha_devoluvion">
                                @error('fecha_devoluvion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="hora_devolucion">Hora de Devolución</label>
                                <input type="time" class="form-control" wire:model.defer="hora_devolucion"
                                    id="hora_devolucion"">
                                @error('hora_devolucion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="estado">Estado de Devolución</label>

                                <select wire:model.defer="estado" class="form-control" id="estado">
                                    <option value="">...Seleccione...</option>
                                    <option value="COMPLETADO">COMPLETADO</option>
                                    <option value="PENDIENTE DE ENTREGAR">PENDIENTE DE ENTREGAR</option>
                                </select>
                                @error('estado')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary btn-rounded" wire:click="saveEntregaEquipos"
                                wire:loading.attr="disabled">
                                <i class="fas fa-save"></i>
                                @if ($idEntregaEquipo)
                                    Actualizar
                                @else
                                    Guardar
                                @endif

                            </button>
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
                                            <button type="button" title="Añadir Equipo a la Entregas"
                                                class="btn btn-sm btn-rounded btn-success"
                                                wire:click="AñadirAlPedido({{ $e->id }})"
                                                wire:loading.attr="disabled">
                                                <i class="fas fa-plus-circle"></i>
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
                    <form wire:submit.prevent="saved">
                        <div class="card-block">
                            <h5 class="card-title">Lista de Equipos Entregados
                            </h5>
                            @if ($estado == 'PENDIENTE DE ENTREGAR')
                                <div class="alert alert-danger alert-no-border alert-close alert-dismissible fade in"
                                    role="alert">
                                    <i class="font-icon font-icon-inline font-icon-warning"></i>
                                    <strong>AÚN NO SE COMPLETÓ LA ENTREGA DE LOS EQUIPOS</strong>
                                </div>
                            @else
                                <div class="alert alert-success alert-no-border alert-close alert-dismissible fade in"
                                    role="alert">
                                    <i class="font-icon font-icon-inline font-icon-warning"></i>
                                    <strong>TODO EN ORDEN</strong>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if ($estado == 'PENDIENTE DE ENTREGAR')
                                        <button type="submit" class="btn btn-primary btn-rounded"><i
                                                class="fas fa-save"></i> Guardar</button>
                                    @endif

                                </div>
                            </div>



                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Equipo/Marca</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Observación</th>
                                        <th scope="col">Cant. Entregada</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entrega_equipos_general as $index => $ea)
                                        <tr>
                                            <td>
                                                <small>{{ $ea->nombre }} - {{ $ea->marca }}</small>
                                            </td>
                                            <td>
                                                <small>{{ $ea->cantidad }}</small>
                                            </td>
                                            <td>
                                                <small>{{ $ea->observacion }} - {{ $index }}</small>
                                            </td>
                                            <td>
                                                <input type="number"
                                                    wire:model.defer="entrega_equipos_general.{{ $index }}.cantidad_devuelta"
                                                    wire:key="nota-{{ $ea->id }}" class="form-control"
                                                    min="0" max="{{ $ea->cantidad }}" placeholder="ej:3">
                                                @error('entrega_equipos_general.' . $index . '.cantidad_devuelta')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <button title="Editar Entrega de Equipo del Participante"
                                                    wire:click="Edit({{ $ea->id }})"
                                                    class="btn btn-sm btn-rounded btn-warning"
                                                    wire:loading.attr="disabled">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button"
                                                    wire:click="deleteConfirm({{ $ea->id }})"
                                                    title="Quitar Equipo de la Entrega del Participante."
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
                    </form>

                </div>
            </div>
        @endif

    </div>


    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_entrega_de_equipos">
        Launch static backdrop modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal_entrega_de_equipos" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="modal_entrega_de_equiposLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_entrega_de_equiposLabel">{{ $title }}</h5>
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
                    <button type="button" class="btn btn-danger btn-rounded" wire:click.prevent="resetUI()"
                        data-dismiss="modal">Cerrar</button>

                    <button type="button" class="btn btn-primary btn-rounded" wire:click="saveDetalleEntregas"
                        wire:loading.attr="disabled">
                        <i class="fas fa-save"></i>
                        @if ($idDetalleEntregas)
                            Actualizar
                        @else
                            Guardar
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>

    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-DetalleEquipo', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('viajes-admin.participantes.participantes-equipos',
                        'quitarEquipoAlParticipante',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal_entrega_de_equipos').modal('show')
            });

            window.livewire.on('close-modal', msg => {
                $('#modal_entrega_de_equipos').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
