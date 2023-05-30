<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold">Comprobantes Entregados</h5>
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="typeahead-container">
                                <div class="typeahead-field">
                                    <span class="typeahead-query">
                                        <input id="fa fa-search form-control-feedback" class="form-control"
                                            name="q" placeholder="Buscar por DNI" wire:model.defer="dni"
                                            type="search" autocomplete="off">
                                    </span>
                                    <span class="typeahead-button">
                                        <button type="button" wire:click="search">
                                            <span class="font-icon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Arrieros">
                            </div> --}}
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" wire:model="cant" id="exampleFormControlSelect2">
                                <option value="50">Mostrar 50 registros</option>
                                <option value="100">Mostrar 100 registros</option>
                                <option value="200">Mostrar 200 registros</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" wire:click="resetUI" title="Resetear Filtros">
                                <i class="fas fa-trash-restore-alt"></i>
                            </button>
                        </div>
                        <div class="col-lg-12" wire:loading wire:target="search,resetUI">
                            <img src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}"> Cargando ...
                        </div>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">DNI</th>
                                <th scope="col">PAQUETE</th>
                                <th scope="col">T. DE COMPROBANTE</th>
                                <th scope="col">SERIE</th>
                                <th scope="col">Nº</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">M.de Baja</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp

                            @foreach ($comprobantes as $index => $c)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td scope="row">{{ $c->nombreP }} {{ $c->apellidos }}</td>
                                    <td scope="row">{{ $c->dni }}</td>
                                    <td scope="row">{{ $c->nombre }}</td>
                                    <td scope="row"><small>{{ $c->nombre_tipo }}</small></td>
                                    <td scope="row"><small>{{ $c->numero_serie }}</small></td>
                                    <td scope="row"><small>{{ $c->numero_de_serie }}</small></td>
                                    <td scope="row">
                                        @if ($c->estado == 'VÁLIDO')
                                            <span class="label label-success">{{ $c->estado }}</span>
                                        @else
                                            <span class="label label-danger">{{ $c->estado }}</span>
                                        @endif

                                    </td>
                                    <td scope="row">
                                        <small>
                                            @if ($c->motivo_de_baja)
                                                {{ $c->motivo_de_baja }}
                                            @else
                                                -
                                            @endif
                                        </small>
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Editar({{ $c->idSeriePago }})"
                                            wire:loading.attr="disabled" class="btn btn-warning btn-success btn-sm">
                                            <!--<i class="fa-sharp fa-solid fa-xmark"></i>-->
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a target="_blank" href="{{ route('reservas.comprobante', $c->slug) }}"
                                            class="btn btn-primary btn-sm" title="Ver Comprobante de Pago">
                                            <!--<i class="fa-sharp fa-solid fa-xmark"></i>-->
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $comprobantes->links() }}
                </div>
            </div>
        </div>
    </div>
    @livewire('administrate-commons.alerts')
    <!-- MODAL -->
    <div wire:ignore.self class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_evento_postergacion"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="estado">Estado del Comprobante</label>
                            <select class="form-control" wire:model.defer="estado">
                                <option value="">...Seleccione...</option>
                                <option value="VÁLIDO" @if ($estado == 'VÁLIDO') selected @endif>VÁLIDO</option>
                                <option value="NO VÁLIDO" @if ($estado == 'NO VÁLIDO') selected @endif>NO VÁLIDO
                                </option>
                            </select>
                            @error('estado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="motivo_de_baja">Nombre del Evento <span
                                        class="text-danger font-weight-bold">(*)</span></label>
                                <textarea class="form-control" id="motivo_de_baja" wire:model.defer="motivo_de_baja" rows="3"></textarea>

                                @error('motivo_de_baja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click.prevent="resetUI()"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="guardar" wire:loading.attr="disabled"
                        class="btn btn-primary">
                        <div wire:loading wire:target="guardar">
                            <img src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}">
                        </div>
                        Actualizar
                    </button>


                </div>
            </div>

        </div>

    </div>
    <!-- END MODAL-->



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_evento_postergacion').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_evento_postergacion').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    <script>
        window.addEventListener('swal-confirmEvento', event => {
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
                    Livewire.emitTo('reservas-admin.reservas.eventos-postergacion.eventos-postergacion',
                        'quitarEventoReserva',
                        event.detail
                        .id);
                }
            })
        });
    </script>


</div>
