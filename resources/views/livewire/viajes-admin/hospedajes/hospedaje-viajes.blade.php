<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        <a class="btn btn-primary btn-sm btn-rounded" href="{{ route('paquete.viajes', $paquete) }}"
                            title="Volver">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        Lista de Hospedajes
                    </h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control"
                                    placeholder="Buscar Almuerzos de Celebración">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="modal-532427" href="#modal_hospedaje_viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Asignar Hospedaje</button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fech. In.</th>
                                <th scope="col">Fecha. Fin. </th>
                                <th scope="col">MONTO</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospedajes_ocupados as $ho)
                                <tr>
                                    <td>
                                        {{ date('d/m/Y', strtotime($ho->fecha_inicial)) }}
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($ho->fecha_final)) }}
                                    </td>
                                    <td>
                                        {{ $ho->monto }}
                                    </td>
                                    <td>
                                        {{ $ho->nombre }}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            wire:click="Edit({{ $ho->id }})" wire:loading.attr="disabled"
                                            class="btn btn-sm btn-rounded btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger"
                                            wire:click="deleteConfirm({{ $ho->id }})"
                                            wire:loading.attr="disabled">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="2">Total</th>

                                <th colspan="4">{{ $total[0]->Monto }}</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_hospedaje_viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        ASIGNAR HOSPEDAJES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicial">
                                    Fecha de Inicio <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha_inicial" class="form-control"
                                    id="fecha_inicial" />
                                @error('fecha_inicial')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="fecha_final">
                                    Fecha Final <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha_final" class="form-control"
                                    id="fecha_final" />
                                @error('fecha_final')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monto">
                                    Monto <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" wire:model.defer="monto" class="form-control" id="monto" />
                                @error('monto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="hotel">
                                    Hotel <span class="text-danger">(*)</span>
                                    <a href="{{ route('viajes.mostrar.hoteles') }}" target="_blank"
                                        title="Ver Hoteles Registrados" wire:click="render"><i
                                            class="fas fa-exclamation"></i></a>
                                    <button class="btn btn-sm btn-rounded" title="Refrescar" wire:click="render"><i
                                            class="fas fa-sync-alt"></i></button>
                                </label>
                                <select class="form-control" wire:model.defer="hotel" id="hotel">
                                    <option value="0" selected>...Seleccione...</option>
                                    @foreach ($hoteles as $h)
                                        <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"
                            wire:click.prevent="resetUI()">
                            Cerrar
                        </button>
                        @if ($idHospedaje)
                            <button type="button" wire:click="asignarHospedajes"
                                class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="asignarHospedajes"
                                class="btn btn-rounded btn-primary">
                                Guardar
                            </button>
                        @endif


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-hospedaje-de-viajes', event => {
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
                    Livewire.emitTo('viajes-admin.hospedajes.hospedaje-viajes',
                        'deleteHospedajes',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_hospedaje_viajes').modal('show')
            });

            window.livewire.on('close-modal', msg => {
                $('#modal_hospedaje_viajes').modal('hide')
            });
        });
    </script>
</div>
