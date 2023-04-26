<div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title font-weight-bold">INFORMACIÓN DEL CLIENTE</h5>
            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="dni">DNI <span class="text-danger">(*)</span></label>
                        <input type="text" wire:model.defer="dni" class="form-control" id="dni"
                            placeholder="Ingrese DNI del Cliente">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="nombres">Nombres <span class="text-danger">(*)</span></label>
                        <input type="text" wire:model.defer="nombres" class="form-control" id="nombres"
                            placeholder="Ingrese los nombres del Cliente">
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="apellidos">Apellidos <span class="text-danger">(*)</span></label>
                        <input type="text" wire:model.defer="apellidos" class="form-control" id="apellidos"
                            placeholder="Ingrese los Apellidos del Cliente">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="genero">Género <span class="text-danger">(*)</span></label>
                        <select class="form-control" wire:model="genero" id="paquete">
                            <option value="" selected>Seleccione...</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                        @error('genero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="telefono">Teléfono <span class="text-danger">(*)</span></label>
                        <input type="text" wire:model.defer="telefono" class="form-control" id="telefono"
                            placeholder="Ingrese Teléfono del Cliente">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label for="direccion">Dirección <span class="text-danger">(*)</span></label>
                        <input type="text" wire:model.defer="direccion" class="form-control" id="direccion"
                            placeholder="Ingrese dirección del Cliente">
                        @error('direccion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset class="form-group">
                        <label for="nacionalidad">Nacionalidad <span class="text-danger">(*)</span></label>
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
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label for="numero_pasaporte">Nº de Pasaporte <span
                                class="text-danger">(Opcional)</span></label>
                        <input type="text" class="form-control" id="numero_pasaporte" placeholder="Nº de Pasaporte"
                            wire:model.defer="numero_pasaporte">
                        @error('numero_pasaporte')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-7">
                    <fieldset class="form-group">
                        <label for="direccion">Archivo de Pasaporte <span class="text-danger">(Obligatorio, simpre y
                                cuando haya un Nº de Pasaporte)</span></label>
                        <input type="file" class="form-control" id="direccion" wire:model.defer="archivo_pasaporte">
                        @error('archivo_pasaporte')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                @if ($ver_pasaporte)
                    <div class="col-lg-2">
                        <fieldset class="form-group">
                            <label for="numero_pasaporte">Ver Pasaporte</span></label>
                            <a href="{{ asset('/' . $ver_pasaporte) }}" class="font-icon font-icon-page"
                                target="_blank"> Ver Pasaporte</a>
                        </fieldset>
                    </div>
                @endif
            </div>

            @if ($reserva)
                <button class="btn btn-primary" wire:click="UpdateInfoCliente">Actualizar</button>
                <button class="btn btn-danger">Cancelar</button>
            @endif

        </div>
    </div>
</div>

{{-- <div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title">Datos del Paquete</h5>
            <div class="row">
                <div class="col-lg-6">
                    <fieldset class="form-group">
                        <label for="paquete">Seleccione Paquete a Reservar</label>
                        <select class="form-control" wire:model="paquete" name="paquete" id="paquete">
                            <option selected value="0">Seleccione...</option>
                            @foreach ($paquetes as $n)
                                <option value="{{ $n->id }}"
                                    wire:click="obtenerPreciodelPaquete({{ $n->id }})">
                                    {{ $n->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('paquete')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset class="form-group">
                        <label for="precio_del_paquete">Precio del Paquete</label>
                        <input type="text" class="form-control" wire:model="precio_del_paquete"
                            id="precio_del_paquete" placeholder="" readonly>

                        @error('precio_del_paquete')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title font-weight-bold">SOBRE LA RESERVA/COMPRA</h5>
            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="fecha_reserva">Fecha de Reserva <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <input type="date" min="{{date('Y-m-d')}}" wire:model.defer="fecha_reserva" class="form-control"
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

            @if ($reserva)
                <button class="btn btn-primary" wire:click="UpdateInfoReserva">Actualizar</button>
                <button class="btn btn-danger">Cancelar</button>
            @endif

        </div>
    </div>
</div>

<div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title font-weight-bold">INFORMACIÓN SOBRE EL PAQUETE SELECCIONADO</h5>
            <div class="row">
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">PAQUETE</span>
                </div>
                <div class="col-md-9">
                    <span class="badge badge-default">{{ $nombrePaquete }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <span class="badge badge-default font-weight-bold">COSTO DEL PAQUETE</span>
                </div>
                <div class="col-md-9">
                    <span class="label label-pill label-success">{{ $precio_del_paquete }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title font-weight-bold">PAGO POR RESERVA/COMPRA</h5>
            {{--@if ($idPago)--}}
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
                            <select class="form-control" wire:model.defer="estado_de_pago" id="estado_de_pago">
                                <option selected>... Seleccione ...</option>
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
                                <option value="" selected>...Seleccione...</option>
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
                    @if ($ver_comprobante)
                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label for="numero_pasaporte">Ver Archivo de Pago</span></label>
                                <a href="{{ route('mostrar.comprobante.reserva', $pago) }}"
                                    class="font-icon font-icon-page" target="_blank"> Ver Archivo
                                    de Pago</a>
                            </fieldset>
                        </div>
                    @endif
                </div>

                @if ($reserva)
                    <button class="btn btn-primary" wire:click="UpdateInfoPagos">Actualizar</button>
                    <button class="btn btn-danger">Cancelar</button>
                @endif
                <br>
            {{--@endif--}}



            @if ($reserva)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Monto</th>
                            <th scope="col">Nº de Operación</th>
                            <th scope="col">Estado del Pago</th>
                            <th scope="col">Observación del Pago</th>
                            <th scope="col">Archivo del Pago</th>
                            <th scope="col">Tipo de Pago</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $p)
                            <tr>
                                <td>{{ $p->monto }}</td>
                                {{-- <td>{{$p->fecha_pago}}</td> --}}
                                <td>{{ $p->numero_de_operacion }}</td>
                                <td>{{ $p->estado_pago }}</td>
                                <td>{{ $p->observacion_del_pago }}</td>
                                <td>
                                    <a href="{{ route('mostrar.comprobante.reserva', $p->idPago) }}"
                                        class="font-icon font-icon-page" target="_blank"> Ver Archivo
                                        de Pago</a>
                                    {{-- $p->ruta_archivo_pago --}}
                                </td>
                                <td>{{ $p->cuenta_pagos_id }}</td>
                                <td>
                                    <button id="view" wire:click="seleccionarPago({{ $p->idPago }})"
                                        wire:loading.attr="disabled" title="Seleccionar"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-mouse-pointer"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>

<div class="col-lg-12 ks-panels-column-section">
    <div class="card">
        <div class="card-block">
            <h5 class="card-title font-weight-bold">AUTORIZACIONES MÉDICAS</h5>
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
                    <div class="col-md-3">
                        <label for="numero_autorizacion">Nº de Autorización <span
                                class="text-danger font-weight-bold">(*)</span>
                        </label>
                        <input type="text" wire:model.defer="numero_autorizacion" class="form-control"
                            id="numero_autorizacion">
                        @error('numero_autorizacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="archivo_autorizacion">Archivo Médico <span
                                class="text-danger font-weight-bold">(Obligatorio si hay un Nº de
                                Autorización)</span></label>
                        <input type="file" wire:model.defer="archivo_autorizacion" class="form-control"
                            id="archivo_autorizacion">
                        @error('archivo_autorizacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session()->has('message-archivo'))
                            <span class="text-danger"> {{ session('message-archivo') }}</span>
                        @endif
                    </div>
                    @if ($ver_autorizacion)
                        <div class="col-md-3">
                            <label for="numero_autorizacion">Ver Archivo de Autorización
                            </label>
                            <a href="{{ asset('/' . $ver_autorizacion) }}" class="font-icon font-icon-page"
                                target="_blank"> Ver</a>
                        </div>
                    @endif

                </div>
                @if ($reserva)
                    <button class="btn btn-primary" wire:click="UpdateInfoArchivoMedico">Actualizar</button>
                    <button class="btn btn-danger">Cancelar</button>
                @endif
            @endif


        </div>
    </div>
</div>

@if (!$reserva)
    <div class="col-lg-12 ks-panels-column-section">
        <div class="card">
            <div class="card-block">
                <h5 class="card-title">Acciones</h5>
                <div>
                    <div class="form-group">
                        <button type="button" wire:click="guardarReservaCliente" wire:loading.attr="disabled"
                            class="btn btn-inline">Grabar
                            Reserva</button>
                        <a href="#!" wire:click="detalle">DetalleArchivo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
