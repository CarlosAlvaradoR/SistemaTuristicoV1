<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Marcas Registradas</h5>
                    <div class="row">
                        <div class="col-md-10">
                            
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search"
                                    placeholder="Buscar Marca">
                            </div>
                        </div>

                        <div class="col-md-2">
                            
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-marca">
                                Nueva Marca
                            </button>
                        </div>

                        <div class="col-lg-12" wire:loading wire:target="search">
                            <img src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}"> Cargando ...
                        </div>
                        <br>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Marca</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marcas as $m)
                                <tr>
                                    <!--<th scope="row">1</th>-->
                                    <td>{{ $m->nombre }}</td>
                                    <td>
                                        <button wire:click="Edit({{ $m->id }})"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button title="Dar de baja" class="btn btn-danger btn-sm"
                                            wire:click="deleteConfirm({{ $m->id }})" title="Eliminar Mapa">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $marcas->links() }}
                </div>
            </div>
        </div>

    </div>

    <!--.container-fluid-->



    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-marca"
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
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="nombre_de_marca">Nombre de Marca</label>
                                <input type="text" wire:model.defer="nombre_de_marca"
                                    class="form-control maxlength-simple" id="nombre_de_marca"
                                    placeholder="Nombre de Marca">
                                @error('nombre_de_marca')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI()" class="btn btn-danger btn-rounded"
                        data-dismiss="modal">Cerrar</button>
                    @if ($edicion)
                        <button type="button" wire:click="Update" class="btn btn-primary btn-rounded">Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="saveMarca" class="btn btn-primary btn-rounded">Guardar
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-marca', msg => {
                $('#modal-marca').modal('show')
            });
            window.livewire.on('close-modal-marca', msg => {
                $('#modal-marca').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });

        window.addEventListener('swal-confirmMarca', event => {
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
                    Livewire.emitTo('equipos-admin.marcas.marcas',
                        'deleteMarca',
                        event.detail
                        .id);
                }
            })
        });
    </script>

    @include('common.alerts')
</div>
