<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Tipos de Alimentación Registrados</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control"
                                    placeholder="Buscar Tipo de Personal Acompañante">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-tipo-personal" role="button" class="btn btn-rounded"
                                data-toggle="modal">Nuevo Tipo de Alimentación</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">TIPO DE ALIMENTACIÓN</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipos as $t)
                                <tr>
                                    <td>
                                        {{ $t->nombre }}
                                    </td>
                                    <td>
                                        <button wire:click="Edit({{ $t->id }})" class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button class="btn btn-danger btn-sm"
                                            wire:click="deleteConfirm({{ $t->id }})"
                                            title="Eliminar Tipo de Personal">
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

    </div>




    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-tipo-personal"
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
                                    <label for="nombre_de_tipo">
                                        Nombre del Tipo de Alimentación
                                    </label>
                                    <input type="text" class="form-control" autocomplete="off"
                                        wire:model.defer="nombre_de_tipo" wire:loading.attr="disabled"
                                        id="nombre_de_tipo" />
                                    @error('nombre_de_tipo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
                        <button type="button" id="update" wire:click="Update" wire:loading.attr="disabled"
                            class="btn btn-rounded btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="button" id="save" wire:click="guardarTipoAlimentacion"
                            wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
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
                title: 'MUY BIEN',
                text: "{{ session('success') }}",
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
            window.livewire.on('show-modal-tipo-personal', msg => {
                $('#modal-tipo-personal').modal('show')
            });
            window.livewire.on('close-modal-tipo-personal', msg => {
                $('#modal-tipo-personal').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmTipoPersonal', event => {
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
                    Livewire.emitTo('paquetes-admin.paquetes.tipo-alimentacion',
                        'deleteTipoAlimentacion',
                        event.detail
                        .id);
                }
            })
        });
        window.addEventListener('swal', event => {
            
            Swal.fire(
                event.detail.title,
                event.detail.text,
                event.detail.icon
            );
        });
    </script>
</div>
