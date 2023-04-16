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
                        Lista de Itinerarios - {{ $paquete->nombre }}
                    </h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Itinerario">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Actividad</th>
                                <th scope="col">Itinerario</th>
                                <th scope="col">Fecha de Cumplimiento</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itinerarios as $i)
                                <tr>
                                    <td>
                                        {{ $i->nombre_actividad }}
                                    </td>
                                    <td>
                                        {{ $i->descripcion }}
                                    </td>
                                    <td>

                                        @if ($i->fecha_cumplimiento != 'No cumplido')
                                            <span
                                                class="label label-primary">{{ date('d-m-Y', strtotime($i->fecha_cumplimiento)) }}
                                            </span>
                                        @else
                                            <span class="label label-danger">{{ $i->fecha_cumplimiento }}</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($i->fecha_cumplimiento != 'No cumplido')
                                            <button type="button" title="Editar Fecha de Cumplimiento"
                                            wire:click="Edit({{ $i->id }})"
                                                wire:loading.attr="disabled" class="btn btn-sm btn-rounded btn-warning">
                                                <i class="fas fa-marker"></i>
                                            </button>

                                        @else
                                            <button type="button" title="Añadir Fecha de Cumplimiento"
                                                wire:click="AñadirFechaCumplimiento({{ $i->id }})"
                                                wire:loading.attr="disabled" class="btn btn-sm btn-rounded btn-success">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @livewire('administrate-commons.alerts')

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false"
        id="modal-itinerario-fecha-cumplimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fecha de Cumplimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="fecha_cumplimiento">
                                        Seleccione Fecha de Cumplimiento
                                    </label>
                                    <input type="date" class="form-control" wire:model.defer="fecha_cumplimiento"
                                        id="fecha_cumplimiento" />
                                    @error('fecha_cumplimiento')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            @if ($idItinerarioCumplido)
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button class="btn btn-danger btn-rounded" wire:click="delete">Eliminar
                                            Cumplimiento ?</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($idItinerarioCumplido)
                        <button type="button" wire:click="guardarFechaCumplimiento"
                            class="btn btn-rounded btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="guardarFechaCumplimiento"
                            class="btn btn-rounded btn-primary">
                            Guardar
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!--END MODAL-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal-itinerario-fecha-cumplimiento').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-itinerario-fecha-cumplimiento').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
</div>
