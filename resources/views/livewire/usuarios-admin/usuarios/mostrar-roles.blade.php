<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-users"></i> </i> Roles</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Buscar roles">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select wire:model="cant" class="form-control" id="exampleFormControlSelect1">
                                    <option value="10">Mostrar 10</option>
                                    <option value="20">Mostrar 20</option>
                                    <option value="50">Mostrar 50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="modal-532427" href="#modal_users" role="button" class="btn btn-rounded"
                                data-toggle="modal"><i class="fas fa-user-plus"></i>
                                Nuevo
                                Rol
                            </button>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">ROL</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $index => $rol)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        <button title="Editar Información de la Cuenta Bancaria"
                                            wire:click="Edit({{ $rol->id }})" wire:loading.attr="disabled"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button title="Eliminar Cuenta Bancaria del Proveedor"
                                            wire:click="deleteConfirm({{ $rol->id }})" wire:loading.attr="disabled"
                                            class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_users"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="createRole">
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

                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label" for="nombreDeRol"><b>Nombre del Rol</b></label>
                                    <input type="text" wire:model.defer="nombreDeRol" class="form-control "
                                        id="nombreDeRol" placeholder="Ingrese nombre del rol">
                                    @error('nombreDeRol')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror

                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label" for="rol">
                                        <b>PERMISOS DEL ROL</b>
                                    </label>

                                    @foreach ($permisos as $permission)
                                        @switch($permission->name)
                                            @case('ver-interfaz-de-paquetes-turisticos')
                                                <b>
                                                    <h6>*) PAQUETES TURÍSTICOS</h6>
                                                </b>
                                            @break

                                            @case('crear-editar-reservas')
                                                <b>
                                                    <h6>*) MÓDULO RESERVAS</h6>
                                                </b>
                                            @break

                                            @case('ver-interfaz-de-viajes')
                                                <b>
                                                    <h6>*) MÓDULO DE VIAJES</h6>
                                                </b>
                                            @break

                                            @case('ver-interfaz-de-proveedores')
                                                <b>
                                                    <h6>*) MÓDULO DE PEDIDOS</h6>
                                                </b>
                                            @break

                                            @case('ver-interfaz-de-equipos')
                                                <b>
                                                    <h6>*) MÓDULO DE EQUIPOS</h6>
                                                </b>
                                            @break

                                            @default
                                        @endswitch
                                        <div class="checkbox-bird">
                                            <input type="checkbox" id="permission{{ $permission->id }}"
                                                value="{{ $permission->id }}" wire:model="selectedPermissions">
                                            <label for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach

                                    @error('selectedPermissions')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>


                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                            data-dismiss="modal">
                            Cerrar
                        </button>

                        <button type="submit" class="btn btn-rounded btn-primary">

                            @if ($idRol)
                                Actualizar
                            @else
                                Guardar
                            @endif

                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
    <!-- END MODAL-->

    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-entidadFinanciera', event => {
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
                    Livewire.emitTo('proveedores-admin.proveedores.proveedores.entidades-financieras',
                        'deleteEntidadFinanciera',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_users').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_users').modal('hide')
            });
        });
    </script>
</div>
