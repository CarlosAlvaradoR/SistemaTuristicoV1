<div>


    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-10">

                    <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model.defer="dni"
                        wire:loading.attr="disabled" wire:target="buscar" placeholder="Ingrese DNI del cliente">
                </div>
                <div class="col-md-2">

                    <button type="button" wire:click="buscar" wire:loading.attr="disabled" class="btn btn-success">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <br>
            @if (Session::has('notification'))
                <div class="alert alert-info alert-fill alert-close alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>MENSAJE DE INFORMACIÓN</strong><br>
                    Por Favor Imprima el Siguiente Comprobante con código de Reserva:
                    {{ $valor = session('notification') }}
                    <div class="alert-btns">
                        <a href="{{ route('reservas.comprobante', $valor) }}" target="_blank"
                            class="btn btn-rounded">Imprimir</a>
                    </div>
                </div>
            @endif

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
    <div wire:loading wire:ignore.self>
        <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in" role="alert">
            <strong>Cargando...</strong>
        </div>
    </div>

    @if ($no_existe)
        <div class="row">

            <div class="alert alert-primary" role="alert">
                {{ $message }} <a href="{{ route('paquetes.reservar.crear_cliente', $paquete->slug) }}" class="alert-link">Deseas
                    crear uno aquí ?</a>.
            </div>
        </div>
    @endif

    <br>

    <div class="row">
        @if ($encontradoComoPersona || $encontradoComoCliente)
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
                                    <span class="badge badge-default">{{$paquete->nombre}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="badge badge-default font-weight-bold">COSTO DEL PAQUETE</span>
                                </div>
                                <div class="col-md-9">
                                    <span class="label label-pill label-success">{{$paquete->precio}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div class="row">
        @if ($encontradoComoPersona && !$encontradoComoCliente)
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Por favor llena este formulario de Cliente</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="nacionalidad">Nacionalidad <span
                                            class="text-danger font-weight-bold">(*)</span></label>
                                    <select class="form-control" wire:model="nacionalidad" id="nacionalidad">
                                        <option selected>Seleccione...</option>
                                        @foreach ($nacionalidades as $n)
                                            <option value="{{ $n->id }}">{{ $n->nombre_nacionalidad }}</option>
                                        @endforeach
                                    </select>
                                    @error('nacionalidad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="direccion">Nº de Pasaporte <span
                                            class="text-danger font-weight-bold">(Opcional)</span></label>
                                    <input type="text" class="form-control" id="direccion"
                                        placeholder="Nº de Pasaporte" wire:model.defer="numero_pasaporte">
                                    @error('numero_pasaporte')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label for="archivo_pasaporte">Archivo de Pasaporte <span class="text-danger">(Obligatorio
                                            si hay un Nº de Pasaporte)</span></label>
                                    <input type="file" class="form-control" id="archivo_pasaporte"
                                        wire:model.defer="archivo_pasaporte">
                                    @error('archivo_pasaporte')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($encontradoComoPersona || $encontradoComoCliente)
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Sobre las Reserva</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="fecha_reserva"
                                        title="Fecha para la cuál va a comprar/reservar el paquete turístico">Fecha de
                                        Reserva <span class="text-danger font-weight-bold">(*)</span></label>
                                    <input type="date" min="{{date('Y-m-d')}}" wire:model="fecha_reserva" class="form-control"
                                        id="fecha_reserva">
                                    @error('fecha_reserva')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            
                            <div class="col-lg-8">
                                <fieldset class="form-group">
                                    <label class="form-label" for="observacion">Observación <span
                                            class="text-danger font-weight-bold">(Opcional)</span></label></label>
                                    <textarea class="form-control" wire:model.defer="observacion" id="observacion" rows="3"></textarea>
                                    @error('observacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputDisabled">Monto de Pago S/. <span
                                            class="text-danger font-weight-bold">(*)</span></label>
                                    <input type="text" wire:model.defer="monto" class="form-control"
                                        id="exampleInputDisabled" placeholder="Ingrese Monto del Pago">
                                    @error('monto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="numero_de_operacion">Nº de Operación<span
                                            class="text-danger font-weight-bold">(Opcional)</span></label>
                                    <input type="text" wire:model.defer="numero_de_operacion" class="form-control"
                                        id="numero_de_operacion" placeholder="Ingrese Monto del Pago">
                                    @error('numero_de_operacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="estado_de_pago">Estado del Pago<span
                                            class="text-danger font-weight-bold">(*)</span></label>
                                    <select class="form-control" wire:model.defer="estado_de_pago"
                                        id="estado_de_pago">
                                        <option value="" selected>... Seleccione ...</option>
                                        <option value="ACEPTADO" class="label-success">ACEPTADO</option>
                                        <option value="EN PROCESO" class="label-default">EN PROCESO</option>
                                        <option value="NO ACEPTADO" class="label-danger">NO ACEPTADO</option>
                                    </select>
                                    @error('estado_de_pago')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label" for="observacion_del_pago">Observación del Pago<span
                                            class="text-danger font-weight-bold">(*)</span></label>
                                    <textarea class="form-control" wire:model.defer="observacion_del_pago" id="observacion_del_pago" rows="3"></textarea>
                                    @error('observacion_del_pago')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset class="form-group">
                                    <label class="form-label" for="archivo_pago">Archivo de Pago <span
                                            class="text-danger font-weight-bold">(Opcional)</span></label>
                                    <input type="file" name="archivo_pago" class="form-control-file"
                                        wire:model.defer="archivo_pago" id="archivo_pago" />
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label for="tipo_de_pago">
                                        Tipo de Pago <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="form-control" wire:model.defer="tipo_de_pago" id="tipo_de_pago">
                                        <option value="">...Seleccione...</option>
                                        @foreach ($tipoPagos as $tp)
                                            <option value="{{ $tp->idCuentaPago }}">
                                                {{ $tp->nombre_tipo_pago }} - {{ $tp->numero_cuenta }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tipo_de_pago')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <!--<div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control maxlength-always-show"
                                    id="exampleInputPassword1" placeholder="Password" maxlength="10">
                                <small class="text-muted">Max length 10, always show</small>
                            </fieldset>
                        </div>-->
                        </div>
                        <!--<div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">

                        </fieldset>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">

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
                    </div>-->
                    </div>
                </div>
            </div>

            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Autorizaciones Médicas</h5>
                        @if ($contador == 0)
                            <div class="alert alert-aquamarine alert-no-border alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                La Reserva para este paquete no requiere ningún documento sustentatorio de Salud.
                            </div>
                        @else
                            <div class="alert alert-blue-dirty alert-no-border alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                Las Reservas para este paquete necesitan un archivo de Justificación Médica
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="numero_autorizacion">Nº de Autorización <span
                                            class="text-danger font-weight-bold">(*)</span>
                                    </label>
                                    <input type="text" wire:model="numero_autorizacion" class="form-control"
                                        id="numero_autorizacion">
                                    @error('numero_autorizacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="archivo_autorizacion">Archivo Médico <span
                                            class="text-danger font-weight-bold">(Obligatorio si hay un Nº de
                                            Autorización)</span></label>
                                    <input type="file" wire:model="archivo_autorizacion" class="form-control"
                                        id="archivo_autorizacion">
                                    @error('archivo_autorizacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if (session()->has('message-archivo'))
                                        <span class="text-danger"> {{ session('message-archivo') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        @endif






        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Acciones</h5>
                    <div>
                        <div class="form-group">
                            @if ($encontradoComoPersona && !$encontradoComoCliente)
                                <button type="button" wire:click="saveReservaP" wire:loading.attr="disabled"
                                    class="btn btn-inline"> <i class="fas fa-calendar-check"></i> Grabar
                                    reserva</button>
                            @endif

                            @if ($encontradoComoPersona && $encontradoComoCliente)
                                <button type="button" wire:click="saveReserva" wire:loading.attr="disabled"
                                    class="btn btn-inline"><i class="fas fa-calendar-check"></i> Grabar
                                    reserva</button>
                            @endif

                            <!--<a href="#!" wireclick="detalle">DetalleArchivo</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('common.alerts')

</div>
