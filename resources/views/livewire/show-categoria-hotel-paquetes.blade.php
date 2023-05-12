<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <a id="modal-880003" href="#modal-categoria-hotel" role="button" class="btn" data-toggle="modal">Crear
                    Categoría de Hoteles</a>
                <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade"
                    id="modal-categoria-hotel" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Crear Categoria de Hoteles
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="save">

                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="3"></textarea>
                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="text" wire:model.defer="idPaquete" value="{{ $idPaquete }}"
                                        hidden>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cl-cat" class="btn btn-danger" data-dismiss="modal">
                                    Cerrar
                                </button>
                                @if ($edicion)
                                    <button type="button" id="up-cat" wire:click="Update" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                @else
                                    <button type="button" id="save-cat" wire:click="save" class="btn btn-primary">
                                        Guardar
                                    </button>
                                @endif


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Nº
                            </th>
                            <th>
                                Descripción
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
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    {{ $cont++ }}
                                </td>
                                <td>
                                    {{ $categoria->descripcion }}
                                </td>
                                <td>
                                    <button wire:click="Edit({{ $categoria->id }})" class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button title="Quitar Pago por servicio"
                                        wire:click="deleteConfirm({{ $categoria->id }})" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

  
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-categoria-hotel', msg => {
                $('#modal-categoria-hotel').modal('show')
            });
            window.livewire.on('close-modal-categoria-hotel', msg => {
                $('#modal-categoria-hotel').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmCategoriaHotel', event => {
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
                    Livewire.emitTo('show-categoria-hotel-paquetes',
                        'deleteCategoriaHotel',
                        event.detail
                        .id);
                }
            })
        });
    </script>
</div>
