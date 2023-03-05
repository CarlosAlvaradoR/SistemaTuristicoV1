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

            <h5 class="with-border m-t-lg">EVENTO DE POSTERGACIÓN - {{ $idPostergacionReserva }}</h5>

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
                        <input type="date" wire:model.defer="fecha_presentacion" wire:loading.attr="disabled" wire:target="guardarSolicitud"
                            class="form-control maxlength-custom-message" id="fecha_presentacion">
                        @error('fecha_presentacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-8">
                    <fieldset class="form-group">
                        <label class="form-label" for="descripcion_de_solicitud">Descripción de la Solicitud <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <textarea class="form-control" wire:model.defer="descripcion_de_solicitud" wire:loading.attr="disabled" wire:target="guardarSolicitud" id="descripcion_de_solicitud" rows="3"></textarea>
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
                <div class="col-md-7">
                    {{--<div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="fecha_presentacion">Fecha de Presentación de
                                Solicitud</label>
                            <input type="date" wire:model.defer="fecha_presentacion"
                                class="form-control maxlength-custom-message" id="fecha_presentacion">
                            @error('fecha_presentacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="estado_solicitud">Estado de Solicitud</label>
                            <select class="form-control" wire:model.defer="estado_solicitud" id="estado_solicitud">
                                <option>...Seleccione...</option>
                                <option>POR PROCESAR</option>
                                <option>PROCESADO</option>
                            </select>
                            @error('descripcion_de_solicitud')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>--}}
                    <div class="col-lg-8">
                        <fieldset class="form-group">
                            <label class="form-label" for="descripcion_de_solicitud">Observación de Solicitud</label>
                            <textarea class="form-control"wire:model.defer="descripcion_de_solicitud" id="descripcion_de_solicitud"
                                rows="3"></textarea>
                            @error('descripcion_de_solicitud')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label font-weight-bold" for="exampleInputPassword1">Monto Solicitado
                                S/.</label>
                            <input type="text" class="form-control maxlength-custom-message font-weight-bold"
                                wire:model="monto_solicitado" readonly id="monto_solicitado">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-rounded" wire:click="guardarSolicitud">Guardar</button>
                        <button class="btn btn-danger btn-rounded">Cancelar</button>
                    </div>


                </div>
                <div class="col-md-5">
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
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        Solicitud
                        @if ($solicitud_existe)
                            <button type="button" title="Quitar Solicitud"
                                class="btn btn-rounded btn-inline btn-sm btn-danger">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        @endif

                    </h5>
                    @if (session()->has('mensaje-confirmacion-solicitud'))
                        <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{ session('mensaje-confirmacion-solicitud') }}
                        </div>
                    @endif

                    <div wire:loading wire:target="guardarSolicitud" class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>

                    <div class="form-group">
                        <label for="fecha_presentacion">Fecha de Presentación</label>
                        <input type="date" wire:model.defer="fecha_presentacion" class="form-control"
                            id="fecha_presentacion">
                    </div>
                    <div class="form-group">
                        <label for="estado_solicitud">Estado</label>
                        <input type="text" wire:model.defer="estado_solicitud" class="form-control"
                            id="estado_solicitud" placeholder="Ingrese el estado del solicitud">
                    </div>
                    <div class="form-group">
                        <label for="descripcion_de_solicitud">Observación</label>
                        <textarea wire:model.defer="descripcion_de_solicitud" placeholder="Ingrese Observación de la solicitud"
                            class="form-control" id="descripcion_de_solicitud" rows="3"></textarea>
                    </div>
                    @if ($solicitud_existe)
                        <button type="button" wire:click="ActuaizarSolicitud"
                            class="btn btn-success">Actualizar</button>
                    @else
                        <button type="button" wire:loading.attr="disabled" wire:click="guardarSolicitud"
                            class="btn btn-primary">Guardar</button>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        Devolución
                        @if ($solicitud_dinero_existe)
                            <button type="button" title="Quitar Devolución"
                                class="btn btn-rounded btn-inline btn-sm btn-danger">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        @endif

                    </h5>
                    @if (session()->has('mensaje-confirmacion-devolucion'))
                        <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{ session('mensaje-confirmacion-devolucion') }}
                        </div>
                    @endif


                    <div wire:loading wire:target="guardarDevolucionDinero" class="alert alert-primary"
                        role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>

                    <div class="form-group">
                        <label for="monto_devolucion">Monto</label>
                        <input type="text" wire:model.defer="monto_devolucion" class="form-control"
                            id="monto_devolucion" placeholder="Ingrese Monto de Devolucion">
                    </div>
                    <div class="form-group">
                        <label for="observacion_devolucion">Observación</label>
                        <textarea class="form-control" wire:model.defer="observacion_devolucion" id="observacion_devolucion" rows="3"
                            placeholder="Ingrese Observación de Devolución"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha_hora">Fecha - Hora</label>
                        <input type="datetime-local" wire:model.defer="fecha_hora" class="form-control"
                            id="fecha_hora">
                    </div>
                    @if ($solicitud_existe)
                        @if (!$solicitud_dinero_existe)
                            <button type="button" wire:click="guardarDevolucionDinero" wire:loading.attr="disabled"
                                class="btn btn-primary">Guardar</button>
                        @else
                            <button type="button" wire:click="guardarDevolucionDinero" wire:loading.attr="disabled"
                                class="btn btn-success">Actualizar</button>
                        @endif
                    @endif

                    {{-- @if ($solicitud_existe)
                        <button type="button" wire:click="guardarDevolucionDinero"
                            class="btn btn-success">Actualizar</button>
                    @else
                        <button type="button" wire:click="guardarDevolucionDinero"
                            class="btn btn-primary">Guardar</button>
                    @endif --}}

                </div>
            </div>
        </div>
    </div>

    @include('common.alerts')
</div>
