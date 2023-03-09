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

                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('reservas.solicitudes.devoluciones', $t->id) }}"
                                                    title="Llenar Solicitud de de Devolución" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fa-solid fa-file"></span>
                                                </a>
                                                <a href="{{ route('reservas.pagos_restantes', $t->id) }}"
                                                    title="Añadir Pago restante" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-warning"
                                                    style="float: none;"><span class="fas fa-money-check-alt"></span>
                                                </a>
                                                <a type="button" title="Editar Solicitud"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-file-edit"></span>
                                                </a>
                                            </div>
                                        </div>
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
                            <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal"
                                data-target="#modal-cuentas-bancarias">
                                Cuentas Bancarias
                            </button>
                        </div>
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
                            {{-- @foreach ($reservas as $r)
                                <tr>
                                    <!--<th scope="row">1</th>-->
                                    <td>{{ $r->dni }}</td>
                                    <td>{{ $r->datos }}</td>
                                    <td>{{ $r->nombre }}</td>
                                    <td>{{ $r->fecha_reserva }}</td>
                                    <td>{{ $r->pago }}</td>
                                    <td>
                                        @if ($r->nombre_estado == 'COMPLETADO')
                                            <span class="label label-success">{{ $r->nombre_estado }}</span>
                                        @else
                                            <span class="label label-danger">{{ $r->nombre_estado }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($r->aceptado)
                                            <span class="label label-success">{{ $r->aceptado }}</span>
                                        @endif
                                        @if ($r->no_aceptado)
                                            <span class="label label-danger">{{ $r->no_aceptado }}</span>
                                        @endif
                                        @if ($r->en_proceso)
                                            <span class="label label-secondary">{{ $r->en_proceso }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($r->estado_reserva == 'PRÓXIMA A CUMPLIRSE')
                                            <span class="label label-warning">{{ $r->estado_reserva }}</span>
                                        @else
                                            <span class="label label-primary">{{ $r->estado_reserva }}</span>
                                        @endif
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('reservas.solicitudes.devoluciones', $r->slug) }}"
                                                    title="Llenar Solicitud de de Devolución" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fa-solid fa-file"></span>
                                                </a>
                                                <a href="{{ route('reservas.pagos_restantes', $r->slug) }}"
                                                    title="Añadir Pago restante" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-warning"
                                                    style="float: none;"><span class="fas fa-money-check-alt"></span>
                                                </a>
                                                <a type="button" title="Editar Solicitud"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-file-edit"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal_tipo_pago" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="nombre_tipo_pago">Nombre del tipo de Pago</label>
                                <input type="text" wire:model.defer="nombre_tipo_pago"
                                    class="form-control" id="nombre_tipo_pago"
                                    placeholder="Nombre del tipo de Pago">
                                @error('nombre_tipo_pago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="saveTipoPago" wire:loading.attr="disabled" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal-cuentas-bancarias" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

    @include('common.alerts')
</div>
