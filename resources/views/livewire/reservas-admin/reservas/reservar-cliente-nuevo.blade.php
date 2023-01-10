<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Datos del Cliente</h5>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" wire:model.defer="dni" class="form-control" id="dni"
                            placeholder="Ingrese DNI del Cliente">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" wire:model.defer="nombres" class="form-control" id="nombres"
                            placeholder="Ingrese los nombres del Cliente">
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" wire:model.defer="apellidos" class="form-control" id="apellidos"
                            placeholder="Ingrese los Apellidos del Cliente">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select class="form-control" wire:model="genero" id="paquete">
                            <option selected>Seleccione...</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                        @error('genero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" wire:model.defer="telefono" class="form-control" id="telefono"
                            placeholder="Ingrese Teléfono del Cliente">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" wire:model.defer="direccion" class="form-control" id="direccion"
                            placeholder="Ingrese dirección del Cliente">
                        @error('direccion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <select class="form-control" wire:model="nacionalidad" id="nacionalidad">
                            <option selected>Seleccione...</option>
                            @foreach ($nacionalidades as $n)
                                <option value="{{ $n->id }}">{{ $n->nombre_nacionalidad }}</option>
                            @endforeach
                        </select>
                        @error('nacionalidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Nº de Pasaporte</label>
                                <input type="text" class="form-control" id="direccion" placeholder="Nº de Pasaporte"
                                    wire:model.defer="numero_pasaporte">
                                @error('numero_pasaporte')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Archivo de Pasaporte</label>
                                <input type="file" class="form-control" id="direccion"
                                    wire:model.defer="archivo_pasaporte">
                                @error('archivo_pasaporte')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!--<div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Nº de Pasaporte</label>
                                    <input type="text" class="form-control" id="direccion"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Archivo de Pasaporte</label>
                                    <input type="file" class="form-control" id="direccion" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Nº de Pasaporte</label>
                                    <input type="text" class="form-control" id="direccion"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Archivo de Pasaporte</label>
                                    <input type="file" class="form-control" id="direccion" placeholder="">
                                </div>
                            </div>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Datos del Paquete</h5>
                    <div>
                        <div class="form-group">
                            <label for="paquete">Seleccione Paquete</label>
                            <select class="form-control" wire:model="paquete" name="paquete" id="paquete">
                                <option selected value="0">Seleccione...</option>
                                @foreach ($paquetes as $n)
                                    <option value="{{ $n->id }}"
                                        wire:click="obtenerPreciodelPaquete({{ $n->id }})">{{ $n->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('paquete')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio_del_paquete">Precio del Paquete</label>
                            <input type="text" class="form-control" wire:model="precio_del_paquete"
                                id="precio_del_paquete" placeholder="" readonly>

                            @error('precio_del_paquete')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dni">Seleccione Fecha del Viaje (Opcional)</label>
                            <input type="text" class="form-control" id="dni"
                                placeholder="name@example.com">
                            @error('precio_del_paquete')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Sobre los Pagos</h5>
                    <div>
                        <div class="form-group">
                            <label for="fecha_reserva">Fecha de Reserva</label>
                            <input type="date" wire:model.defer="fecha_reserva" class="form-control"
                                id="fecha_reserva" placeholder="" value="200">
                            @error('fecha_reserva')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="observación">Observación</label>
                            <textarea class="form-control" wire:model.defer="observacion" id="observación" rows="3"></textarea>
                            @error('observación')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pago_por_reserva">Pago de Reserva</label>
                            <input type="text" wire:model.defer="pago_por_reserva" class="form-control"
                                id="pago_por_reserva" placeholder="" value="200">
                            @error('pago_por_reserva')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="archivo_pago">Seleccionar Archivo de Pago (Opcional)</label>
                            <input type="file" wire:model.defer="pago_por_reserva" class="form-control"
                                id="archivo_pago">
                            @error('pago_por_reserva')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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

        <div class="col-lg-6 ks-panels-column-section">
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

        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Validation</h5>
                    <div>
                        <fieldset class="form-group has-success">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-success" id="inputSuccess1"
                                    placeholder="Input with success">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-warning">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-warning"
                                    placeholder="Input with warning">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-danger">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-danger"
                                    placeholder="Input with danger">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Validation</h5>
                    <div>
                        <fieldset class="form-group has-success">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-success" id="inputSuccess1"
                                    placeholder="Input with success">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-warning">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-warning"
                                    placeholder="Input with warning">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-danger">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-danger"
                                    placeholder="Input with danger">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('mensaje-falla-pago'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'ADVERTENCIA!',
                text: 'El pago por reserva debe de ser mayor al 20 %'
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<div class="form-row"> <div class="form-group col-md-5"> <label for="numero_autorizacion">Número de Autorización</label> <input type="text" wire:model.defer="numero_autorizacion" name="numero_autorizacion[]" class="form-control" id="numero_autorizacion"> </div> <div class="form-group col-md-5"> <label for="archivo_autorizacion">Archivo de Autorizacion</label> <input type="file" wire:model.defer="archivo_autorizacion" name="archivo_autorizacion[]" class="form-control" id="archivo_autorizacion"> </div> <div class="form-group col-md-2"> <br> <button type="button" class="btn btn-danger remove_button" title="Quitar fila">-</button> </div> </div>'; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

</div>
