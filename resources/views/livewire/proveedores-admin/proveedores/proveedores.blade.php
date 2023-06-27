<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-building"></i> Lista de Proveedores</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" wire:model="search" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" wire:model="cant" id="exampleFormControlSelect1">
                                    <option value="20">Mostrar 20</option>
                                    <option value="50">Mostrar 50</option>
                                    <option value="100">Mostrar 100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @can('crear-proveedores')
                                <a id="modal-532427" href="#modal-lista-proveedores" role="button" class="btn btn-rounded"
                                    data-toggle="modal">Nuevo Proveedor</a>
                            @endcan

                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Proveedor</th>
                                <th scope="col">RUC</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Web</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $p)
                                <tr>
                                    <td>{{ $p->nombre_proveedor }}</td>
                                    <td>{{ $p->ruc }}</td>
                                    <td>{{ $p->direccion }}</td>
                                    <td>{{ $p->telefono }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->web }}</td>
                                    <td>
                                        <button id="edit" title="Editar Información de Proveedor"
                                            wire:click="Edit('{{ $p->slug }}')" wire:loading.attr="disabled"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button title="Eliminar Proveedor"
                                            wire:click="deleteConfirm('{{ $p->slug }}')"
                                            wire:loading.attr="disabled" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                        <a href="{{ route('pedidos.proveedores.cuentasbancarias', $p->slug) }}"
                                            title="Añadir Cuentas Bancarias" class="btn btn-success btn-sm">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <a href="{{ route('pedidos.proveedores.formulario.pedidos', $p->slug) }}"
                                            title="Añadir Pedidos a Proveedor" class="btn btn-primary btn-sm">
                                            <i class="fas fa-folder-plus"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $proveedores->links() }}
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-lista-proveedores"
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
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="ruc">RUC</label>
                                    <input type="text" wire:model.defer="ruc"
                                        class="form-control maxlength-simple" id="ruc"
                                        placeholder="Ingrese RUC del Proveedor" maxlength="11">
                                    @error('ruc')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="nombre_proveedor">Nombre de Proveedor</label>
                                    <input type="text" wire:model.defer="nombre_proveedor"
                                        class="form-control maxlength-custom-message" id="nombre_proveedor"
                                        placeholder="Ingrese Nombre del Proveedor">
                                    @error('nombre_proveedor')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="direccion">Dirección</label>
                                    <input type="text" wire:model.defer="direccion"
                                        class="form-control maxlength-always-show" id="direccion"
                                        placeholder="Ingreser Domicilio Fiscal del Proveedor">
                                    @error('direccion')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="telefono">Teléfono</label>
                                    <input type="text" wire:model.defer="telefono"
                                        class="form-control maxlength-simple" id="telefono"
                                        placeholder="Ingrese Teléfono del Proveedor">
                                    @error('telefono')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" wire:model.defer="email"
                                        class="form-control maxlength-custom-message" id="email"
                                        placeholder="Ingrese Dirección de Correo Electrónico del Proveedor">
                                    @error('email')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="web">Web</label>
                                    <input type="text" wire:model.defer="web"
                                        class="form-control maxlength-always-show" id="web"
                                        placeholder="Ingrese la Página web del Proveedor">
                                    @error('web')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="saveProveedor" wire:loading.attr="disabled"
                        title="Guardar Proveedor" class="btn btn-rounded btn-primary">
                        @if ($idProveedor)
                            Actualizar
                        @else
                            Guardar
                        @endif

                    </button>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->


    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-proveedores', event => {
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
                    Livewire.emitTo('proveedores-admin.proveedores.proveedores',
                        'deleteProveedor',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal-lista-proveedores').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-lista-proveedores').modal('hide')
            });
        });
    </script>
</div>
