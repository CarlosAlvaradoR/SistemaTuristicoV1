<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Asociaciones</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Traslado de Viajes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal_asociaciones" role="button" class="btn btn-rounded"
                                data-toggle="modal">Crear Asociación</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ASOCIACIÓN</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asociaciones as $a)
                                <tr>
                                    <td>
                                        {{ $a->nombre }}
                                    </td>
                                    <td>
                                        @if ($a->estado == 1)
                                            <span class="label label-success">VIGENTE</span>
                                        @else
                                            <span class="label label-danger">NO VIGENTE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit({{ $a->id }})"
                                            wire:loading.attr="disabled"
                                            title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            wire:click="deleteConfirm({{$a->id}})"
                                            wire:loading.attr="disabled"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        {{-- <tfoot>
                            <tr>

                                <th colspan="4">Total</th>

                                <th colspan="2">S/. {{-- $tvotal[0]->Monto }}</th>

                            </tr>

                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_asociaciones"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR TRASLADO DE VIAJES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">
                                    Asociacion <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" wire:model.defer="nombre" class="form-control" id="nombre" />
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado">
                                    Estado <span class="text-danger">(*)</span>
                                </label>
                                <select class="form-control" wire:model.defer="estado" id="estado">
                                    <option value="">Seleccione</option>
                                    <option value="1">VIGENTE</option>
                                    <option value="2">NO VIGENTE</option>
                                </select>
                                @error('estado')
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
                        @if ($idAsociaciones)
                            <button type="button" wire:click="saveAsociacion" wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="saveAsociacion" wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                Guardar
                            </button>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->


    <script>
         window.addEventListener('swal-confirm-asociaciones', event => {
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
                    Livewire.emitTo('viajes-admin.viajes.opciones.asociaciones',
                        'deleteAsociaciones',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_asociaciones').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_asociaciones').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
