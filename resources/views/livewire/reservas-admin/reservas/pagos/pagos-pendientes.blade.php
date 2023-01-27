<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold">INFORMACIÓN</h5>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">CLIENTE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $datos }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">PAQUETE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $paquete }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">COSTO DEL PAQUETE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">S/. {{ $costo_paquete }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">MONTO PAGADO</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">S/. {{ $monto_pagado[0]->MontoPagado }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">MONTO RESTANTE</span>
                            </div>
                            <div class="col-md-9">
                                @if ($monto_restante != 0)
                                    <span class="label label-pill label-danger">S/. {{ $monto_restante }}</span>
                                @else
                                    <span class="label label-pill label-success">S/. {{ $monto_restante }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Pagos Correspondientes a la reserva</h5>
                    @if ($monto_restante != 0)
                        <div class="row">

                            <a id="modal-565707" href="#modal_pagos" role="button" class="btn"
                                data-toggle="modal">Añadir Pago Restante</a>
                        </div>
                    @endif

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha de Pago
                                        </th>
                                        <th>
                                            Monto S/.
                                        </th>
                                        <th>
                                            Nº de Operación
                                        </th>
                                        <th>
                                            Estado de Pago
                                        </th>
                                        <th>
                                            Archivo
                                        </th>
                                        <th>
                                            TIPO DE PAGO
                                        </th>
                                        <th>
                                            COMPROBANTE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagos as $p)
                                        <tr>
                                            <td>
                                                {{ $p->fecha_pago }}
                                            </td>
                                            <td>
                                                {{ $p->monto }}
                                            </td>
                                            <td>
                                                {{ $p->numero_de_operacion }}
                                            </td>
                                            <td>
                                                {{ $p->estado_pago }}
                                            </td>
                                            <td>
                                                {{ $p->ruta_archivo_pago }}
                                            </td>
                                            <td>
                                                {{ $p->nombre_tipo_pago }}
                                            </td>
                                            <td>
                                                {{ $p->numero_boleta }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--MODAL-->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_pagos"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Añadir Pago Restante
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">

                                        <label for="monto_pago">
                                            Monto de Pago <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" wire:model.defer="monto_pago" class="form-control"
                                            id="monto_pago" />
                                        @error('monto_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_de_pago">
                                            Fecha de Pago <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="date" wire:model.defer="fecha_de_pago" class="form-control"
                                            id="fecha_de_pago" />
                                        @error('fecha_de_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_operacion">
                                            Nº de Operación
                                        </label>
                                        <input type="text" wire:model.defer="numero_operacion" class="form-control"
                                            id="numero_operacion" />
                                        @error('numero_operacion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_de_pago">
                                            Estado del Pago <span class="text-danger">(*)</span>
                                        </label>
                                        <select class="form-control" wire:model.defer="estado_de_pago"
                                            id="estado_de_pago">
                                            <option selected>... Seleccione ...</option>
                                            <option value="EN PROCESO">EN PROCESO</option>
                                            <option value="ACEPTADO">ACEPTADO</option>
                                            <option value="NO ACEPTADO">NO ACEPTADO</option>
                                        </select>
                                        @error('estado_de_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="ruta_archivo_pago">
                                            Comprobante de Pago
                                        </label>
                                        <input type="file" wire:model.defer="ruta_archivo_pago"
                                            class="form-control" id="ruta_archivo_pago" />
                                        @error('ruta_archivo_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="tipo_de_pago">
                                            Tipo de Pago <span class="text-danger">(*)</span>
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo_de_pago"
                                            id="tipo_de_pago">
                                            <option selected>...Seleccione...</option>
                                            @foreach ($tipoPagos as $tp)
                                                <option value="{{ $tp->id }}">{{ $tp->nombre_tipo_pago }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tipo_de_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:loading.attr="disabled" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:loading.attr="disabled" wire:click="GuardarPagoPorReserva"
                        class="btn btn-rounded btn-primary">
                        Guardar
                    </button>

                </div>
            </div>

        </div>

    </div>
    <!--END MODAL-->
</div>