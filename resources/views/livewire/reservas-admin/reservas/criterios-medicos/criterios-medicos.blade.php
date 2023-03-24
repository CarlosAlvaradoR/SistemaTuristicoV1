<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Criterios Médicos</h5>
                    <div class="row">

                        <div class="col-md-5">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a title="Ver Reporte de Devoluciones por rango" class="btn btn-primary"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal_criterios_medicos">
                                Nuevo Criterio Médico
                            </button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">Descripción del Criterio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterios as $c)
                                <tr>
                                    <td>{{ strtoupper($c->descripcion_criterio_medico) }}</td>
                                    <td>
                                        <button id="edit" wire:click="Edit({{ $c->id }})"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="delete" class="btn btn-danger btn-sm"
                                            wire:click="deleteConfirm({{ $c->id }})" title="Eliminar Mapa">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- $solicitudes->links() --}}
                </div>
            </div>
        </div>

    </div>




    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal_criterios_medicos" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion_criterio_medico">Criterio <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <input type="text" autofocus wire:model.defer="descripcion_criterio_medico"
                            class="form-control" id="descripcion_criterio_medico" placeholder="Ingrese criterio médico">

                        @error('descripcion_criterio_medico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="close"
                        wire:loading.attr="disabled">Cerrar</button>
                    @if ($idCriterioMedico)
                        <button type="button" class="btn btn-primary" wire:click="savedCriterio"
                            wire:loading.attr="disabled">Actualizar</button>
                    @else
                        <button type="button" class="btn btn-primary" wire:click="savedCriterio"
                            wire:loading.attr="disabled">Guardar</button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_criterios_medicos').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_criterios_medicos').modal('hide')
            });
        });

        window.addEventListener('swal-confirmCriterioMedico', event => {
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
                    Livewire.emitTo('reservas-admin.reservas.criterios-medicos.criterios-medicos',
                        'quitarCriterioMedico',
                        event.detail
                        .id);
                }
            })
        });
    </script>

    @include('common.alerts')
</div>
