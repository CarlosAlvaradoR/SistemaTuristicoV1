<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-money-check"></i> Tipos de Comprobante</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar tipo de comprobante">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Mostrar 20</option>
                                    <option>Mostrar 20</option>
                                    <option>Mostrar 20</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="modal-532427" href="#modal_cuentas_bancarias" role="button"
                                class="btn btn-rounded" data-toggle="modal">Crear Tipo de Comprobante</button>
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
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_cuentas_bancarias"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="saveEntidad">
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
                                    <label class="form-label" for="nombre_banco">Nombre del Banco / Ent.
                                        Financiera</label>
                                    <input type="text" wire:model.defer="nombre_banco"
                                        class="form-control maxlength-custom-message" id="nombre_banco"
                                        placeholder="ej: Banco de la Nación">
                                    @error('nombre_banco')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="direccion">Dirección</label>
                                    <textarea class="form-control" wire:model.defer="direccion" id="direccion" rows="3"
                                        placeholder="ej: Av. Los Girasoles"></textarea>
                                    @error('direccion')
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
