<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-money-check"></i> Tipos de Comprobante</h5>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Buscar tipo de comprobante">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary btn-sm" wire:click="resetUI" title="Resetear">
                                <i class="fas fa-window-close"></i>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button id="modal-532427" href="#modal_cuentas_bancarias" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal">Crear Tipo de Comprobante</button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tipo de Comprobante</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipo_comprobantes as $tc)
                                <tr>
                                    <td>{{ $tc->nombre_tipo }}</td>

                                    <td>
                                        <button title="Editar Información de la Cuenta Bancaria"
                                            wire:click="Edit({{ $tc->id }})" wire:loading.attr="disabled"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button title="Ver Series del Tipo de Comprobante"
                                            wire:click="select({{ $tc->id }})" wire:loading.attr="disabled"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button title="Eliminar Cuenta Bancaria del Proveedor"
                                            wire:click="deleteConfirm({{ $tc->id }})" wire:loading.attr="disabled"
                                            class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $tipo_comprobantes->links() }}
                </div>
            </div>
        </div>

        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-list-ol"></i> Series {{ $textoAMostrar }}</h5>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Buscar serie">
                            </div>
                        </div>

                        <div class="col-md-7">
                            @if ($idSeleccionado)
                                <button id="modal-532427" href="#modal_cuentas_bancarias" role="button"
                                    class="btn btn-rounded btn-sm" data-toggle="modal">Crear Serie</button>
                            @else
                                <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in"
                                    role="alert">
                                    <small>Sin seleccionar Tipo de Comprobante</small>
                                </div>
                            @endif

                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tipo de Comprobante</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @if (count($series) > 0)
                            <tbody>
                                @foreach ($series as $s)
                                    <tr>
                                        <td>
                                            {{ $s->numero_serie }} -
                                            @if ($s->estado == 'ACTIVO')
                                                <span class="label label-success">{{ $s->estado }}</span>
                                            @else
                                                <span class="label label-danger">{{ $s->estado }}</span>
                                            @endif

                                        </td>   

                                        <td>
                                            <button title="Editar Información de la Cuenta Bancaria"
                                                wire:click="Edit({{ $s->id }})" wire:loading.attr="disabled"
                                                class="btn btn-warning btn-sm">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </button>
                                            <button title="Eliminar Cuenta Bancaria del Proveedor"
                                                wire:click="deleteConfirm({{ $s->id }})"
                                                wire:loading.attr="disabled" class="btn btn-danger btn-sm">
                                                <span class="fa fa-trash"></span>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        @endif

                    </table>
                </div>
            </div>
        </div>

    </div>




    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_cuentas_bancarias"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="saveComprobante">
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
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="numero_serie">Número de Serie</label>
                                    <input type="text" wire:model.defer="numero_serie"
                                        class="form-control maxlength-custom-message" id="numero_serie"
                                        placeholder="ej: Banco de la Nación">
                                    @error('numero_serie')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="estado">Estado</label>
                                    <select class="form-control" wire:model.defer="estado" id="estado">
                                        <option>...Seleccione...</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
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
                            @if ($idTipoComprobante)
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
                $('#modal_cuentas_bancarias').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_cuentas_bancarias').modal('hide')
            });
        });
    </script>
</div>
