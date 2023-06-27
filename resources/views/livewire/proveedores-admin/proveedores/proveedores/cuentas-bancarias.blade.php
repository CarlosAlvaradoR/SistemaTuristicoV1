<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-university"></i> Lista de Cuentas Bancarias de -
                        {{ $proveedor->nombre_proveedor }}</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" wire:model="search" class="form-control" placeholder="Buscar Cuenta Bancaria">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <button id="modal-532427" href="#modal_cuentas_bancarias" role="button"
                                class="btn btn-rounded" data-toggle="modal">Añadir Cuenta Bancaria</button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Banco</th>
                                <th scope="col">Nº Cuenta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuentas as $c)
                                <tr>
                                    <td>{{ $c->nombre_banco }}</td>
                                    <td>{{ $c->numero_cuenta }}</td>
                                    <td>
                                        @if ($c->estado == 1)
                                            <span class="label label-success">ACTIVA</span>
                                        @else
                                            <span class="label label-danger">NO ACTIVA</span>
                                        @endif

                                    </td>
                                    <td>
                                        <button title="Editar Información de la Cuenta Bancaria"
                                            wire:click="Edit({{ $c->id }})" wire:loading.attr="disabled"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button title="Eliminar Cuenta Bancaria del Proveedor"
                                            wire:click="deleteConfirm({{ $c->id }})" wire:loading.attr="disabled"
                                            class="btn btn-danger btn-sm">
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_cuentas_bancarias"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="saveCuenta">
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
                                    <label for="banco">
                                        Banco <span class="text-danger">(*) </span>
                                        <a href="{{ route('mostrar.bancos') }}" target="_blank" title="Crear Vehículo"
                                            class="font-weight-bold"><i class="fas fa-exclamation"></i></a>
                                        <button class="btn btn-sm btn-rounded" title="Refrescar" wire:click="render"><i
                                                class="fas fa-sync-alt"></i></button>
                                    </label>

                                    <select class="form-control" wire:model.defer="banco" id="banco">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($bancos as $b)
                                            <option value="{{ $b->id }}">{{ $b->nombre_banco }}</option>
                                        @endforeach
                                    </select>
                                    @error('banco')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="numero_cuenta">Nº Cuenta</label>
                                    <input type="text" wire:model.defer="numero_cuenta"
                                        class="form-control maxlength-custom-message" id="numero_cuenta"
                                        placeholder="Ingrese Nº de Cuenta Bancaria" maxlength="20">
                                    @error('numero_cuenta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="estado">Estado</label>
                                    <select class="form-control" wire:model.defer="estado" id="estado">
                                        <option value="">---Seleccione---</option>
                                        <option value="1">ACTIVA</option>
                                        <option value="2">NO ACTIVA</option>
                                    </select>
                                    @error('estado')
                                        <span class="text-danger">{{ $message }}</span>
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
                            @if ($idCuentaProveedorBanco)
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
        window.addEventListener('swal-confirm-cuentas', event => {
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
                    Livewire.emitTo('proveedores-admin.proveedores.proveedores.cuentas-bancarias',
                        'deleteCuentaBancaria',
                        event.detail
                        .id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_cuentas_bancarias').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_cuentas_bancarias').modal('hide')
            });
        });
    </script>
</div>
