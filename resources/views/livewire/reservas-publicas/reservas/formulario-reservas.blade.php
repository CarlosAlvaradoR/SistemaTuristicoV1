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
                        <input class="form-control" wire:model.defer="fecha_reserva" name="fecha_reserva"
                            id="fecha_reserva" type="date">
                        @error('fecha_reserva')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" value="S/. " disabled name="monto_real" id="monto_real"
                            type="text" placeholder="Monto del Paquete">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
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
                        <input class="form-control" wire:model.defer="monto" name="pago_reserva" id="pago_reserva"
                            type="text" placeholder="Ingrese el Monto del Pago en S/.">
                    </div>
                    @error('monto')
                        <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" wire:model.defer="numero_operacion" name="numero_operacion"
                            id="numero_operacion" type="text" placeholder="Ingrese el Nº de Operación">
                        @error('numero_operacion')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
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
                        <br>
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
                        <select class="form-control" wire:model.defer="tipo_pago" id="tipo_pago">
                            <option selected>---Seleccione---</option>
                            <option>YAPE</option>
                            <option>BCP</option>
                            <option>PLIN</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        @error('tipo_pago')
                            <h6 class="text-danger">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <button type="button" wire:click="reservar" class="button button-contactForm btn_1 boxed-btn"
                    wire:loading.attr="disabled">
                    Reservar
                </button>
            </div>
        </div>
    </div>

</div>
