<div>
    <section class="card">
        <div class="card-block">
            <h5 class="with-border">INFORMACIÓN DEL CLIENTE</h5>


            <div class="row">
                <div class="col-md-2">
                    <span class="badge badge-default font-weight-bold">CLIENTE:</span>
                </div>
                <div class="col-md-4">
                    <span class="badge badge-default">{{ $datos }}</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">DNI:</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default">{{ $dni }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="badge badge-default font-weight-bold">PAQUETE:</span>
                </div>
                <div class="col-md-4">
                    <span class="badge badge-default">{{ $nombre_paquete }}</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">FECHA RESERVADA:</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default">{{ $fecha_reserva }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">MONTO CANCELADO:</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default">Label</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">MONTO PENDIENTE:</span>
                </div>
                <div class="col-md-3">
                    <span class="badge badge-default">Label</span>
                </div>
            </div>

            <h5 class="with-border m-t-lg">EVENTO DE POSTERGACIÓN <button
                    class="btn btn-primary btn-rounded">Print</button></h5>

            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="evento">Evento de Postergación</label>
                        <select class="form-control" wire:model.defer="evento" wire:loading.attr="disabled"
                            wire:target="saveEventoPostergacion" id="evento">
                            <option value="" selected>...Seleccione...</option>
                            @foreach ($eventos as $e)
                                <option value="{{ $e->id }}">{{ $e->nombre_evento }}</option>
                            @endforeach
                        </select>
                        @error('evento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="fecha_postergacion">Fecha de Postergación <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <input type="date" wire:model.defer="fecha_postergacion" wire:loading.attr="disabled"
                            wire:target="saveEventoPostergacion" class="form-control maxlength-custom-message"
                            id="fecha_postergacion">
                        @error('fecha_postergacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="descripcion_motivo">Descripción / Motivo de
                            Postergación <span class="text-danger font-weight-bold">(*)</span></label>
                        <textarea class="form-control" wire:model.defer="descripcion_motivo" wire:loading.attr="disabled"
                            wire:target="saveEventoPostergacion" id="descripcion_motivo" rows="3"></textarea>
                        @error('descripcion_motivo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-12">

                    @if ($idPostergacionReserva)
                        <button class="btn btn-primary btn-rounded" wire:click="saveEventoPostergacion"
                            wire:loading.attr="disabled">Actualizar</button>
                    @else
                        <button class="btn btn-primary btn-rounded" wire:click="saveEventoPostergacion"
                            wire:loading.attr="disabled">Guardar</button>
                    @endif
                    <button class="btn btn-danger btn-rounded">Cancelar</button>
                </div>
            </div>

            <h5 class="with-border m-t-lg">SOBRE LA SOLICITUD</h5>

            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="fecha_presentacion">Fecha de Presentación de Solicitud<span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <input type="date" wire:model.defer="fecha_presentacion" wire:loading.attr="disabled"
                            wire:target="guardarSolicitud" class="form-control maxlength-custom-message"
                            id="fecha_presentacion">
                        @error('fecha_presentacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-8">
                    <fieldset class="form-group">
                        <label class="form-label" for="descripcion_de_solicitud">Descripción de la Solicitud <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <textarea class="form-control" wire:model.defer="descripcion_de_solicitud" wire:loading.attr="disabled"
                            wire:target="guardarSolicitud" id="descripcion_de_solicitud" rows="3"></textarea>
                        @error('descripcion_de_solicitud')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    @if ($idSolicitudDevolucionDineros)
                        <button class="btn btn-primary btn-rounded" wire:click="guardarSolicitud"
                            wire:loading.attr="disabled">Actualizar</button>
                    @else
                        <button class="btn btn-primary btn-rounded" wire:click="guardarSolicitud"
                            wire:loading.attr="disabled">Guardar</button>
                    @endif

                    <button class="btn btn-danger btn-rounded">Cancelar</button>
                </div>
            </div>

            <h5 class="with-border m-t-lg">SOLICITUD DE DEVOLUCIÓN</h5>
            <div class="row">
                <div class="col-lg-6">
                    <fieldset class="form-group">
                        <label class="form-label" for="observacion_de_pago">Observación de Solicitud</label>
                        <textarea class="form-control"wire:model.defer="observacion_de_pago" wire:loading.attr="disabled"
                            wire:target="saveSolicitudPagos" id="observacion_de_pago" rows="3"></textarea>
                        @error('observacion_de_pago')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label class="form-label font-weight-bold" for="exampleInputPassword1">Monto Solicitado
                            S/.</label>
                        <input type="text" class="form-control maxlength-custom-message font-weight-bold"
                            wire:model="monto_solicitado" readonly id="monto_solicitado">
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <br>
                    @if ($idSolicitudPagos)
                        <button class="btn btn-primary btn-rounded" wire:click="saveSolicitudPagos"
                            wire:loading.attr="disabled">Actualizar</button>
                    @else
                        <button class="btn btn-primary btn-rounded" wire:click="saveSolicitudPagos"
                            wire:loading.attr="disabled">Guardar</button>
                    @endif

                    <button class="btn btn-danger btn-rounded">Cancelar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Estado de Solicitud</th>
                                <th scope="col">Observación</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitud_pagos as $sp)
                                <tr>
                                    <td>{{ $sp->estdo_solicitud }}</td>
                                    <td>{{ $sp->observacion }}</td>
                                    <td>{{ $sp->monto }}</td>
                                    <td>
                                        <button id="view" wire:click="selectSolicitudPagos({{ $sp->id }})"
                                            title="Eliminar Equipo" class="btn btn-primary btn-sm">
                                            <i class="fas fa-mouse-pointer"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Monto de Pago</th>
                                <th scope="col">Fecha de Pago</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Archivo</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $p)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>S/. {{ $p->monto }}</td>
                                    <td>{{ $p->fecha_pago }}</td>
                                    <td>{{ $p->estado_pago }}</td>
                                    <td>
                                        @if ($p->ruta_archivo_pago)
                                            <a href="{{ asset('/' . $p->ruta_archivo_pago) }}">Ver</a>
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button"
                                            wire:click="AñadirPagoSolicitadoAlProceso({{ $p->id }})"
                                            class="btn btn-sm btn-rounded btn-success">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <h5 class="with-border m-t-lg">DEVOLUCIÓN</h5>

            <div class="row">
                <div class="col-lg-3">
                    <span class="badge badge-default font-weight-bold">MONTO SOLICITADO</span>
                </div>
                <div class="col-lg-9">
                    <span class="badge badge-default font-weight-bold">S/. 1200</span>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInput">Monto Devuelto</label>
                        <input type="text" class="form-control maxlength-custom-message" id="exampleInputEmail1">
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Fecha y Hora de Devolución</label>
                        <input type="datetime-local" class="form-control maxlength-custom-message"
                            id="exampleInputEmail1">
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Observación de Devolución</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-rounded">Guardar</button>
                    <button class="btn btn-danger btn-rounded">Cancelar</button>
                </div>

                <div class="col-lg-12"><br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha Pres. Solicitud</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Observación</th>
                                <th scope="col">Monto Devuelto</th>
                                <th scope="col">Fecha - Hora Devolución</th>
                                <th scope="col">Observación de Devolución</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Monto Devuelto</td>
                                <td>Observación</td>
                                <td>@mdo</td>
                                <th scope="row">1</th>
                                <td>Monto Devuelto</td>
                                <td>Observación</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('common.alerts')
</div>
