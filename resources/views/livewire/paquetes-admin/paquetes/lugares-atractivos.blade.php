<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Lugares</h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Lugar">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="modal-532427" href="#modal-lugares" role="button" class="btn btn-rounded"
                                data-toggle="modal">Nuevo Lugar</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">LUGAR</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lugares as $l)
                                <tr>
                                    <td>
                                        {{ $l->nombre }}
                                    </td>
                                    <td>
                                        <button id="edit" wire:click="Edit({{ $l->id }})"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="view"
                                            wire:click="mostrarAtractivosDelLugar({{ $l->id }})"
                                            title="Ver Atractivos" class="btn btn-primary btn-sm">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                        <button id="delete" class="btn btn-danger btn-sm"
                                            wire:click="deleteConfirm({{ $l->id }})" title="Eliminar Mapa">
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
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        Lista de Atractivos -
                        @if ($detalle_del_lugar)
                            {{ $detalle_del_lugar }}
                        @else
                            SIN LUGAR SELECCIONADO
                        @endif
                        {{-- $idLugarSeleccionado --}}
                    </h5>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Lugar">
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if ($idLugarSeleccionado)
                                <a href="#modal-atractivo" role="button" class="btn btn-rounded"
                                    data-toggle="modal">Nuevo Atractivo</a>
                            @endif

                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Atractivo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atractivos as $a)
                                <tr>
                                    <td>
                                        {{ $a->nombre_atractivo }}
                                    </td>
                                    <td>
                                        {{ $a->descripcion }}
                                    </td>
                                    <td>
                                        <button id="editAtractivo" wire:click="EditAtractivo({{ $a->id }})" 
                                            class="btn btn-warning btn-sm" wire:loading.attr="disabled">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="deleteAtractivo" class="btn btn-danger btn-sm"
                                            wire:click="deleteConfirmAtractivo({{ $a->id }})"
                                            wire:loading.attr="disabled" title="Eliminar Atractivo Turístico">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <!--<tfoot>
                            <tr>

                                <th colspan="1">Total</th>

                                <th colspan="2">{{-- $total[0]->Monto --}}</th>

                            </tr>

                        </tfoot>-->
                    </table>
                </div>
            </div>
        </div>

    </div>




    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-lugares"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_del_lugar">
                                        Nombre del Lugar
                                    </label>
                                    <input type="text" class="form-control" wire:model.defer="nombre_del_lugar"
                                        wire:loading.attr="disabled" id="nombre_del_lugar" />
                                    @error('nombre_del_lugar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" wire:loading.attr="disabled"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($edicion)
                        <button type="button" wire:click="Update" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary" id="update">
                            Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="guardarLugar" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary" id="save">
                            Guardar
                        </button>
                    @endif




                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->



    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal-atractivo" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $title_atractivos }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto">
                                        Nombre de Atractivo <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="nombre_del_atractivo"
                                        class="form-control" id="monto" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion_del_atractivo">
                                        Descripción del Atractivo <span class="text-danger">(*)</span>
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion_del_atractivo" id="descripcion_del_atractivo"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($edicion_atractivo)
                        <button type="button" wire:click="UpdateAtractivo" class="btn btn-rounded btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="guardarAtractivo" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: 'success'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: 'error'
            })
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal-lugares').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-lugares').modal('hide')
            });
            window.livewire.on('show-modal-atractivos', msg => {
                $('#modal-atractivo').modal('show')
            });
            window.livewire.on('close-modal-atractivos', msg => {
                $('#modal-atractivo').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    <script>
        window.addEventListener('swal-confirmLugar', event => {
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
                    Livewire.emitTo('paquetes-admin.paquetes.lugares-atractivos', 'deleteLugar',
                        event.detail
                        .id);
                }
            })
        });
    </script>
    <script>
        window.addEventListener('swal-confirmAtractivo', event => {
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
                    Livewire.emitTo('paquetes-admin.paquetes.lugares-atractivos', 'deleteAtractivo',
                        event.detail
                        .id);
                }
            })
        });
    </script>
</div>
