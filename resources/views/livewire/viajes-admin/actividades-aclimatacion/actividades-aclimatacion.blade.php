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
                        Lista de Actividades de Aclimatación
                    </h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control"
                                    placeholder="Buscar Actividades de Aclimatación">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="modal-532427" href="#modal_actividades_aclimatacion" role="button"
                                class="btn btn-rounded" data-toggle="modal">Añadir Actividades de Aclimatación</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">MONTO</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividades as $a)
                                <tr>
                                    <td>
                                        {{ $a->descripcion }}
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($a->fecha)) }}
                                    </td>
                                    <td>
                                        {{ $a->monto }}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            wire:click="Edit({{ $a->id }})"
                                            class="btn btn-sm btn-rounded btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a type="button"
                                            href="{{ route('paquete.viajes.actividades_aclimatacion.participantes', [$paquete, $idViaje, $a->id]) }}"
                                            title="Añadir Participantes" class="btn btn-sm btn-rounded btn-success">
                                            <i class="fas fa-users"></i>
                                        </a>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger"
                                            wire:click="deleteConfirm({{ $a->id }})">
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false"
        id="modal_actividades_aclimatacion" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <label for="descripcion">
                                    Descripción <span class="text-danger">(*)</span>
                                </label>
                                <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="4"></textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="fecha">
                                    Fecha <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha" class="form-control" id="fecha" />
                                @error('fecha')
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                            data-dismiss="modal">
                            Cerrar
                        </button>
                        @if ($idActividadAcimatacion)
                            <button type="button" wire:click="guardarActividadesAclimatacion"
                                class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="guardarActividadesAclimatacion"
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
        window.addEventListener('swal-confirm-actividades-aclimatacion', event => {
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
                    Livewire.emitTo('viajes-admin.actividades-aclimatacion.actividades-aclimatacion',
                        'deleteActividadAclimatacion',
                        event.detail
                        .id);
                }
            })
        });


        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_actividades_aclimatacion').modal('show')
            });

            window.livewire.on('close-modal', msg => {
                $('#modal_actividades_aclimatacion').modal('hide')
            });
        });
    </script>


</div>
