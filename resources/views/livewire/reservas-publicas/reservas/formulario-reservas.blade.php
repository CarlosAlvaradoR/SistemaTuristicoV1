<div>

    <div class="comment-form">
        <h4>Datos de la Reserva</h4>

        @if (session()->has('mensaje-falla-pago'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('mensaje-falla-pago') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="form-contact comment_form" action="#" id="commentForm">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="tipo_pago">Fecha que desea Reservar</label>
                        <input class="form-control" wire:model.defer="fecha_reserva" name="fecha_reserva"
                            id="fecha_reserva" type="date">
                        @error('fecha_reserva')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="tipo_pago">Costo Predefinido del Paquete</label>
                        <input class="form-control" value="S/. " disabled name="monto_real" id="monto_real"
                            type="text" placeholder="Monto del Paquete">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tipo_pago">Observacion de la Reserva (Opcional)</label>
                        <textarea class="form-control w-100" wire:model.defer="observacion" name="observacion_reserva" id="observacion_reserva"
                            cols="30" rows="3" placeholder="Ingrese Observación"></textarea>
                        @error('observacion')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <h4>Pago</h4>
        <div class="form-contact comment_form" action="#" id="commentForm">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="tipo_pago">Monto de Pago realizado (S/.)</label>
                        <input class="form-control" wire:model.defer="monto" name="pago_reserva" id="pago_reserva"
                            type="text" placeholder="Ingrese el Monto del Pago en S/.">
                    </div>
                    @error('monto')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="tipo_pago">Nº de Operación del Pago</label>
                        <input class="form-control" wire:model.defer="numero_operacion" name="numero_operacion"
                            id="numero_operacion" type="text" placeholder="Ingrese el Nº de Operación">
                        @error('numero_operacion')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tipo_pago">Archivo / Comprobante de Pago</label>
                        <input class="form-control" wire:model.defer="archivo_pago" name="archivo_pago"
                            id="archivo_pago" type="file" placeholder="Monto del Paquete">
                    </div>
                    @error('archivo_pago')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="tipo_pago">Fecha de Pago</label>
                        <input class="form-control" wire:model.defer="fecha_de_pago" name="fecha_de_pago"
                            id="fecha_de_pago" type="date">
                        @error('fecha_de_pago')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tipo_pago">Tipo de Pago</label>
                        <br>
                        <div>
                            <select class="form-control" wire:model.defer="tipo_pago" id="tipo_pago">
                                <option value="0">---Seleccione el Tipo de Pago---</option>
                                @foreach ($tipo_pagos as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nombre_tipo_pago }} -
                                        {{ $tp->numero_cuenta }} </option>
                                @endforeach

                            </select>

                        </div>

                        @error('tipo_pago')
                            <br><br>
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <span class="text-primary" wire:loading>Cargando...</span>
            <div class="form-group">
                <button type="button" wire:click="reservar" class="button button-contactForm btn_1 boxed-btn">
                    Reservar
                </button>
            </div>
        </div>
    </div>


   
</div>



