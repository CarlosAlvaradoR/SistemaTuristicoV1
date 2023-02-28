<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Marcas Registradas</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search"
                                    placeholder="Buscar Marca">
                            </div>
                        </div>
                        <div class="col-md-3">
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
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte de equipos dados de baja"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-marca">
                                Nueva Marca
                            </button>
                        </div>
                    </div>
                    <div wire:loading class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
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
                                        <button id="edit" wire:click="Edit({{ $m->id }})"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="delete" title="Dar de baja" class="btn btn-danger btn-sm"
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
                    <h5 class="modal-title" id="exampleModalLabel">CREAR MARCAS DE EQUIPOS -IMPMENTOS</h5>
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
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
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
