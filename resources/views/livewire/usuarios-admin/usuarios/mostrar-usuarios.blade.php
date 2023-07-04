<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-users"></i> </i> Usuarios del Sistema</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="typeahead-container">
                                <div class="typeahead-field">
                                    <span class="typeahead-query">
                                        <input id="fa fa-search form-control-feedback" class="form-control"
                                            wire:model.defer="search" wire:loading.attr="disabled" placeholder="Buscar por DNI" wire:model.defer="dni"
                                            type="search" autocomplete="off">
                                    </span>
                                    <span class="typeahead-button">
                                        <button type="button" wire:click="search">
                                            <span class="font-icon-search"></span>
                                        </button>
                                    </span>
                                </div>
                                @error('search')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select wire:model="cant" class="form-control" id="exampleFormControlSelect1">
                                    <option value="50">Mostrar 50</option>
                                    <option value="100">Mostrar 100</option>
                                    <option value="200">Mostrar 200</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <button class="btn btn-primary" title="Restaurar Todo" wire:click="resetUI">
                                    <i class="fas fa-trash-restore-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="modal-532427" href="#modal_users" role="button" class="btn btn-rounded"
                                data-toggle="modal"><i class="fas fa-user-plus"></i>
                                Nuevo
                                Usuario</button>
                        </div>
                    </div>
                    @php
                        use App\Models\User;
                    @endphp
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">DNI</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ROL</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $index => $u)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $u->nombre_persona . ' ' . $u->apellidos }}</td>
                                    <td>{{ $u->dni }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        {{ strtoupper($u->nombres_roles) }}
                                    </td>

                                    <td>
                                        <button title="Editar Información de la Cuenta Bancaria"
                                            wire:click="Edit({{ $u->id }})" wire:loading.attr="disabled"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        {{-- <button title="Eliminar Cuenta Bancaria del Proveedor"
                                            wire:click="deleteConfirm({{ $u->id }})" wire:loading.attr="disabled"
                                            class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button> --}}

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_users"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="CrearUsuario">
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
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="dni"><b>DNI</b></label>
                                    <input type="text" wire:model.defer="dni" class="form-control " id="dni"
                                        placeholder="First Name">
                                    @error('dni')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror

                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="nombre"><b>NOMBRES</b></label>
                                    <input type="text" wire:model.defer="nombre" class="form-control " id="nombre"
                                        placeholder="Enter email">
                                    @error('nombre')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="apellidos"><b>APELLIDOS</b></label>
                                    <input type="text" wire:model.defer="apellidos"
                                        class="form-control maxlength-always-show" id="apellidos"
                                        placeholder="Password">
                                    @error('apellidos')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="genero"><b>GÉNERO</b></label>
                                    <select wire:model.defer="genero" class="form-control " id="genero">
                                        <option selected>...Seleccione...</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                    @error('genero')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="telefono"><b>TELÉFONO</b></label>
                                    <input type="text" wire:model.defer="telefono" class="form-control "
                                        id="telefono" placeholder="Enter email">
                                    @error('telefono')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="dirección"><b>DIRECCIÓN</b></label>
                                    <input type="text" wire:model.defer="dirección"
                                        class="form-control maxlength-always-show" id="dirección"
                                        placeholder="Password">
                                    @error('dirección')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="email"><b>CORREO ELECTRÓNICO</b></label>
                                    <input type="text" wire:model.defer="email" class="form-control "
                                        id="email" placeholder="First Name">
                                    @error('email')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="password"><b>PASSWORD</b></label>
                                    <input type="password" wire:model.defer="password" class="form-control "
                                        id="password" placeholder="Enter email">
                                    @error('password')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="password_confirmation"><b>PASSWORD
                                            REPEAT</b></label>
                                    <input type="password" wire:model.defer="password_confirmation"
                                        name="password_confirmation" class="form-control maxlength-always-show"
                                        id="password_confirmation" placeholder="Password">
                                    @error('password_confirmation')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label" for="rol"><b>ROL DE
                                            USUARIO</b></label>
                                    <select class="form-control" wire:model.defer="rol">

                                        @foreach ($roles as $r)
                                            <option value="{{ $r }}">{{ strtoupper($r) }}</option>
                                        @endforeach

                                    </select>
                                    @error('rol')
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
                            @if ($idUser)
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
