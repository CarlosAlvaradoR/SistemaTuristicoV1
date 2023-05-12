<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEquiposPaquetes">
        Nuevo Equipo
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalEquiposPaquetes"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
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

                                    @if (session()->has('Correct'))
                                        <div class="alert alert-aquamarine alert-fill alert-border-left alert-close alert-dismissible fade in"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            {{ session('Correct') }}
                                        </div>
                                    @endif



                                    <div class="form-group">

                                        <label for="tipo">
                                            Equipo
                                        </label>
                                        <select class="form-control" wire:model.defer="equipo" id="equipo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($equipos as $e)
                                                <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('equipo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cantidad">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model.defer="cantidad" wire:loading.attr="disabled"
                                            class="form-control" id="cantidad">

                                        @error('cantidad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="observacion">
                                            Observación
                                        </label>
                                        <textarea class="form-control" wire:model.defer="observacion" wire:loading.attr="disabled" id="observacion"
                                            rows="3"></textarea>

                                        @error('observacion')
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
                        <button type="button" wire:loading.attr="disabled" wire:click="guardarEquipoPaquetes"
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
                            Equipo
                        </th>

                        <th>
                            Cantidad
                        </th>
                        <th>
                            Observacion
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
                    @foreach ($equipo_paquetes as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->nombre }}
                            </td>
                            <td>
                                {{ $lv->cantidad }}
                            </td>
                            <td>
                                {{ $lv->observacion }}
                            </td>
                            <td>
                                <button wire:click="Edit({{ $lv->id }})" class="btn btn-warning btn-sm">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Quitar Equipo del Paquete"
                                    wire:loading.attr="disabled" wire:click="deleteConfirm({{ $lv->id }})">
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
            window.livewire.on('show-modal-equipo-paquete', msg => {
                $('#modalEquiposPaquetes').modal('show')
            });
            window.livewire.on('close-modal-equipo-paquete', msg => {
                $('#modalEquiposPaquetes').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmEquipoPaquete', event => {
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
                    Livewire.emitTo('paquetes-admin.equipo-paquete.mostrar-equipo-paquetes',
                        'quitarEquipoPaquetes',
                        event.detail
                        .id);
                }
            })
        });
    </script>
</div>
