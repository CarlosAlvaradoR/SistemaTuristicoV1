<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Itinerarios - {Semana Santa}</h5>
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

                                        @if ($i->fecha_cumplimiento)
                                            {{ $i->fecha_cumplimiento }}
                                        @else
                                            <span class="label label-danger">No cumplido</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($i->fecha_cumplimiento)
                                            <button type="button"
                                                wire:click=""
                                                title="Editar"
                                                class="btn btn-sm btn-rounded btn-warning">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                        @else
                                            <button type="button"
                                                wire:click="AñadirFechaCumplimiento({{ $i->id }})"
                                                title="Marcar Como culminada"
                                                class="btn btn-sm btn-rounded btn-success">
                                                <i class="fal fa-plus"></i>
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

    <!--MODAL-->

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-itinerario-fecha-cumplimiento" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                <form role="form">
                                    <div class="form-group">

                                        <label for="fecha_cumplimiento">
                                            Seleccione Fecha de Cumplimiento
                                        </label>
                                        <input type="date" class="form-control" wire:model.defer="fecha_cumplimiento"
                                            id="fecha_cumplimiento" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="guardarFechaCumplimiento" class="btn btn-rounded btn-primary">
                        Guardar
                    </button>
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
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modal-itinerario-fecha-cumplimiento').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
</div>
