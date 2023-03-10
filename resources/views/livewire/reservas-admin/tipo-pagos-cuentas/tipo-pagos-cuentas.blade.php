<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Tipos de Pago</h5>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal"
                                data-target="#modal_tipo_pago">
                                Tipo de Pago
                            </button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">Tipo de Pago</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipo_pagos as $t)
                                <tr>
                                    <!--<th scope="row">1</th>-->
                                    <td>{{ $t->nombre_tipo_pago }}</td>

                                    <td>
                                        <button id="edit" wire:click="Edit({{ $t->id }})"
                                            class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        @if ($t->id != 1)
                                            <button wire:click="mostrarCuentas({{ $t->id }})" title="Ver Cuentas"
                                                class="btn btn-primary btn-sm">
                                                <span class="fas fa-eye"></span>
                                            </button>
                                            <button id="delete" class="btn btn-danger btn-sm"
                                                wire:click="deleteConfirm({{ $t->id }})" title="Eliminar Mapa">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        @endif

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
                    <h5 class="card-title">Lista de Cuentas</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if ($idTipoPago)
                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal"
                                    data-target="#modal-cuentas-bancarias">
                                    Cuentas Bancarias
                                </button>
                            @endif

                        </div>
                    </div>
                    <div wire:loading wire:target="mostrarCuentas" class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">Nº Cuenta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuentas as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->numero_cuenta }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal_tipo_pago" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="nombre_tipo_pago">Nombre del tipo de Pago</label>
                                <input type="text" wire:model.defer="nombre_tipo_pago" class="form-control"
                                    id="nombre_tipo_pago" placeholder="Nombre del tipo de Pago">
                                @error('nombre_tipo_pago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                    @if ($idTipoPago)
                        <button type="button" wire:click="saveTipoPago" wire:loading.attr="disabled"
                            class="btn btn-primary btn-rounded">Actualizar</button>
                    @else
                        <button type="button" wire:click="saveTipoPago" wire:loading.attr="disabled"
                            class="btn btn-primary btn-rounded">Guardar</button>
                    @endif

                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal-cuentas-bancarias" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $title2 }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="numero_cuenta">Nº Cuenta Bancaria</label>
                                <input type="text" wire:model.defer="numero_cuenta" class="form-control"
                                    id="numero_cuenta" placeholder="Nombre del tipo de Pago">
                                @error('numero_cuenta')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="guardarCuentaBancaria"
                        class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('swal-confirmTipoCuentas', event => {
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
                    Livewire.emitTo('reservas-admin.tipo-pagos-cuentas.tipo-pagos-cuentas', 'deleteTipoPago',
                        event.detail
                        .id);
                }
            })
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_tipo_pago').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_tipo_pago').modal('hide')
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


    @include('common.alerts')
</div>
