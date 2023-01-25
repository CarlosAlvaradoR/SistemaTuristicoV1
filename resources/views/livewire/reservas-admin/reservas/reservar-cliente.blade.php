<div>


    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-10">

                    <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model="dni"
                        wire:loading.attr="disabled" wire:target="buscar" placeholder="Ingrese DNI del cliente">
                </div>
                <div class="col-md-2">

                    <button type="button" wire:click="buscar" wire:loading.attr="disabled" class="btn btn-success">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            DNI: {{ $dni }}
            <br>
            IDCLIENTE: {{ $idCliente }}
            <br>
            @error('dni')
                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="font-icon font-icon-warning"></i>
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>
    <div wire:loading>
        <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in" role="alert">

            <strong>Cargando...</strong>
        </div>
    </div>

    <div class="row">

        <div class="alert alert-primary" role="alert">
            Cliente no encontrado ? <a href="{{ route('paquetes.reservar.crear_cliente') }}" class="alert-link">Crea uno
                aquí</a>.
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Información del Cliente</h5>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">CLIENTE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $nombres_apellidos }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">DNI</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $dni_encontrado }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">Teléfono</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $telefono_cliente }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">PAQUETE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">Semana Santa</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">COSTO DEL PAQUETE</span>
                            </div>
                            <div class="col-md-9">
                                <span class="label label-pill label-success">S/. 1700.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Sobre las Reservas</h5>
                    <div class="container-fluid">
                        <div class="col-md-4 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_reserva">Fecha de Reserva</label>
                                <input type="date" wire:model.defer="fecha_reserva" class="form-control"
                                    id="fecha_reserva">
                                @error('fecha_reserva')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                        </div>
                        <div class="col-md-4 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputDisabled">Monto S/. (Y también Para
                                    BD)</label>
                                <input type="text" wire:model="precio" class="form-control" id="exampleInputDisabled"
                                    placeholder="First Name" disabled>
                            </fieldset>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="observacion">Observación</label>
                                <textarea class="form-control" wire:model.defer="observacion" id="observacion" rows="3"></textarea>
                            </fieldset>
                        </div>


                        

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Pagos</h5>
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputDisabled">Pago S/.</label>
                            <input type="text" wire:model.defer="monto" class="form-control"
                                id="exampleInputDisabled" placeholder="Ingrese Monto del Pago">
                            @error('monto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="archivo_pago">Archivo de Pago</label>
                            <input type="file" name="archivo_pago" class="form-control-file" id="archivo_pago" />
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputDisabled2">Paquete</label>
                            <select id="inputState" class="form-control">
                                <option selected>Seleccione</option>
                                <option>Semana Santa</option>
                                <option>Santa Ana</option>
                                <option>Semana Santa</option>
                                <option>Semana Santa</option>
                                <option>Semana Santa</option>
                                <option>Semana Santa</option>
                                <option>Semana Santa</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputError">Viajes</label>
                            <select id="inputState" class="form-control">
                                <option selected>Seleccione</option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                                <option>Semana Santa - 12/12/2022 </option>
                            </select>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Autorizaciones Médicas</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="numero_autorizacion">Nº de Autorización</label>
                            <input type="text" wire:model="numero_autorizacion" class="form-control"
                                id="numero_autorizacion">
                        </div>
                        <div class="col-md-6">
                            <label for="archivo_autorizacion">Archivo Médico</label>
                            <input type="file" wire:model="archivo_autorizacion" class="form-control"
                                id="archivo_autorizacion">
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Acciones</h5>
                    <div>
                        <div class="form-group">
                            <button type="button" wire:click="saveReserva" wire:loading.attr="disabled"
                                class="btn btn-inline">Grabar
                                Reserva</button>
                            <a href="#!" wire:click="detalle">DetalleArchivo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
