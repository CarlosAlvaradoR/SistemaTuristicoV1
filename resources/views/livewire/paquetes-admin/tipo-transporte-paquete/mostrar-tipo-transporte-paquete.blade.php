<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoTransportePaquete">
        Nuevo Vehiculo
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalTipoTransportePaquete"
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

                                        <label for="descripcion">
                                            Descripción
                                        </label>
                                        <textarea class="form-control" wire:model.defer="descripcion" wire:loading.attr="disabled" id="descripcion"
                                            rows="3"></textarea>

                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cantidad">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model.defer="cantidad" wire:loading.attr="disabled"
                                            class="form-control" id="cantidad" />

                                        @error('cantidad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="tipo">
                                            Tipo de Transporte
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo" id="tipo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre_tipo }}</option>
                                            @endforeach
                                        </select>

                                        @error('tipo')
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
                        <button type="button" wire:click="Update" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary">Actualizar</button>
                    @else
                        <button type="button" wire:click="guardarTipoTransportePaquete" wire:loading.attr="disabled"
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
                            Descripción
                        </th>

                        <th>
                            Cantidad
                        </th>
                        <th>
                            Tipo de Trasnporte
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
                    @foreach ($tipos_paquetes as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->descripcion }}
                            </td>
                            <td>
                                {{ $lv->cantidad }}
                            </td>
                            <td>
                                {{ $lv->nombre_tipo }}
                            </td>
                            <td>
                                <button wire:click="Edit({{ $lv->id }})" class="btn btn-warning btn-sm">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>

                                <button class="btn btn-danger btn-sm" title="Quitar Tipo de Personal"
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
            window.livewire.on('show-modal-tipo-transporte-paquete', msg => {
                $('#modalTipoTransportePaquete').modal('show')
            });
            window.livewire.on('close-modal-tipo-transporte-paquete', msg => {
                $('#modalTipoTransportePaquete').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmTipoTransportePaquete', event => {
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
                    Livewire.emitTo('paquetes-admin.tipo-transporte-paquete.mostrar-tipo-transporte-paquete',
                        'quitarTipoTransportePaquete',
                        event.detail
                        .id);
                }
            })
        });
       
    </script>
</div>
