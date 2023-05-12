<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoAlmuerzoPaquetes">
        Nuevo Almuerzo de celebración
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalTipoAlmuerzoPaquetes"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form">
                                    <div wire:loading>
                                        <span class="text-info">Procesando</span>
                                    </div>

                                    <div class="form-group">

                                        <label for="tipo_de_almuerzo">
                                            Tipo de Almuerzo
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo_de_almuerzo"
                                            id="tipo_de_almuerzo" wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($tipos as $t)
                                                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('tipo_de_almuerzo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="observacion_del_almuerzo">
                                            Observación
                                        </label>
                                        <textarea class="form-control" wire:model.defer="observacion_del_almuerzo" wire:loading.attr="disabled"
                                            id="observacion_del_almuerzo" rows="3"></textarea>

                                        @error('observacion_del_almuerzo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" wire:click="cerrarModal" class="btn btn-rounded btn-danger"
                        wire:loading.attr="disabled">
                        Cerrar
                    </button>
                    @if ($edicion)
                        <button type="button" wire:loading.attr="disabled" wire:click="Update"
                            class="btn btn-rounded btn-primary">Actualizar
                        </button>
                    @else
                        <button type="button" wire:loading.attr="disabled" wire:click="guardarTipoAlmuerzoPaquete"
                            class="btn btn-rounded btn-primary">Guardar
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table">
                <div wire:loading>
                    <span class="text-info">Procesando</span>
                </div>
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Observación
                        </th>

                        <th>
                            Tipo de Almuerzo
                        </th>

                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($tipos_almuerzos as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->observacion }}
                            </td>
                            <td>
                                {{ $lv->nombre }}
                            </td>
                            <td>
                                <button wire:click="Edit({{ $lv->id }})" class="btn btn-warning btn-sm">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>

                                <button class="btn btn-danger btn-sm" title="Quitar Almuerzo de Celebración"
                                    wire:loading.attr="disabled"
                                    wire:click="deleteConfirm({{ $lv->id }})">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-tipo-almuerzo', msg => {
                $('#modalTipoAlmuerzoPaquetes').modal('show')
            });
            window.livewire.on('close-modal-tipo-almuerzo', msg => {
                $('#modalTipoAlmuerzoPaquetes').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmTipoAlmuerzoPaquete', event => {
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
                    Livewire.emitTo('paquetes-admin.tipo-almuerzo-paquetes.mostrar-tipo-almuerzo-paquetes',
                        'quitarTipoAlmuerzoPaquete',
                        event.detail
                        .id);
                }
            })
        });
    </script>

</div>
