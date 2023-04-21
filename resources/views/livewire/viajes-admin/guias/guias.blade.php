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
                        Lista de Guías
                    </h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Arrieros">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a target="_blank" href="{{ route('viajes.guia') }}" class="btn btn-rounded">Nuevo Guía</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cocinero</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guias as $a)
                                <tr>
                                    <td>
                                        {{ $a->datos }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="AñadirGuia({{ $a->idGuia }})"
                                            wire:loading.attr="disabled" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-success">
                                            <i class="fas fa-plus"></i>
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
                    <h5 class="card-title">Lista de Guías Programados</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Arriero">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cocinero</th>
                                <th scope="col">Monto de Pago</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @php
                            $sum = 0;
                        @endphp
                        <tbody>
                            @foreach ($guias_participantes as $ap)
                                <tr>
                                    <td>
                                        <small>{{ $ap->datos }}</small>
                                    </td>
                                    <td>
                                        <small>S/. {{ $ap->monto_pagar }}</small>
                                        @php
                                            $sum = $sum + $ap->monto_pagar;
                                        @endphp
                                    </td>
                                    <td>
                                        <button type="button" title="Editar Información"
                                            class="btn btn-sm btn-rounded btn-warning"
                                            wire:click="Edit({{ $ap->idViajePaqueteCocinero }})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger"
                                            wire:click="deleteConfirm({{ $ap->idViajePaqueteCocinero }})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="1">Total</th>

                                <th colspan="2">S/. {{ $sum }}</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modalMontoArriero" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Añadir Monto y Fecha del Guía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto de Pago S/.
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="monto"
                                        class="form-control" id="monto" placeholder="ej: 45.00" />
                                    @error('monto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($idviajePaqueteGuias)
                        <button type="button" wire:click="AñadirAlGuia" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="AñadirAlGuia" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary">
                            Guardar
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->

    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-guias', event => {
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
                    Livewire.emitTo('viajes-admin.guias.guias',
                        'deleteGuiaViaje',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modalMontoArriero').modal('show')
            });
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modalMontoArriero').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
</div>
