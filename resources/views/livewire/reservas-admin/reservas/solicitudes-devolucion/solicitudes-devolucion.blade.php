<div>
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
                        <label for="observacion_de_la_solicitud">Observación</label>
                        <textarea wire:model.defer="observacion_de_la_solicitud" placeholder="Ingrese Observación de la solicitud"
                            class="form-control" id="observacion_de_la_solicitud" rows="3"></textarea>
                    </div>
                    @if ($solicitud_existe)
                        <button type="button" wire:click="ActuaizarSolicitud"
                            class="btn btn-success">Actualizar</button>
                    @else
                        <button type="button" wire:loading.attr="disabled" wire:click="guardarSolicitud" class="btn btn-primary">Guardar</button>
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


                    <div wire:loading wire:target="guardarDevolucionDinero" class="alert alert-primary" role="alert">
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
                        <input type="datetime-local" wire:model.defer="fecha_hora" class="form-control" id="fecha_hora">
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
</div>
