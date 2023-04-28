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
                                <input type="text" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Mostrar 20</option>
                                    <option>Mostrar 50</option>
                                    <option>Mostrar 100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-lista-proveedores" role="button" class="btn btn-rounded"
                                data-toggle="modal">Nuevo Proveedor</a>
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
                                        <button id="view" 
                                            title="Eliminar Proveedor" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                        <a id="delete" href="{{ route('pedidos.proveedores.cuentasbancarias', $p->slug) }}"
                                            title="Añadir Cuentas Bancarias" class="btn btn-success btn-sm">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <a id="view"
                                            href="{{ route('pedidos.proveedores.formulario.pedidos', $p->slug) }}"
                                            title="Añadir Pedidos a Proveedor" class="btn btn-primary btn-sm">
                                            <i class="fas fa-folder-plus"></i>
                                        </a>
                                        {{-- <button id="delete" title="Dar de baja" class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirm()">
                                        <i class="fas fa-ban"></i>
                                    </button> --}}
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-lista-proveedores"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{$title}}
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
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
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


    <!-- MODAL MONTO-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMontoArriero"
        data-whatever="@fat">
        Open modal for @fat
    </button>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modalMontoArriero" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Añadir Monto y Fecha del Arriero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control"
                                        placeholder="Buscar Almuerzos de Celebración">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="monto"
                                        class="form-control" id="monto" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad de Acémilas
                                    </label>
                                    <input type="number" wire:model.defer="cantidad" autocomplete="off"
                                        class="form-control" id="cantidad" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_acemila" id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="guardarAcemilasAlquiladas"
                        class="btn btn-rounded btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->

    <script>
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
