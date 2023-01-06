<div>
    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-10">

                    <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model="dni"
                        placeholder="Ingrese DNI del cliente">
                </div>
                <div class="col-md-2">

                    <button type="button" wire:click="buscar" class="btn btn-success">
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
    <div class="row">
        <div class="alert alert-primary" role="alert">
            Cliente no encontrado ? <a href="{{ route('paquetes.reservar.crear_cliente') }}" class="alert-link">Crea uno
                aquí</a>.
        </div>
    </div>
    <br>

    <!--<form action="{{-- route('paquetes.reservar.save') --}}" method="post">-->
    @csrf
    <div class="box-typical box-typical-padding">

        <h5 class="m-t-lg with-border">Cliente Encontrado</h5>

        <div class="row">
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label class="form-label semibold" for="exampleInput">Nombres y Apellidos</label>
                    <input type="text" wire:model.defer="nombres_apellidos" wire:loading.class="disabled" readonly
                        value="Carlos Emilio Alvarado Robles" class="form-control" id="exampleInput"
                        placeholder="First Name">
                    <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small> -->
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label class="form-label semibold" for="exampleInput">DNI</label>
                    <input type="text" wire:model.defer="dni_encontrado" readonly value="70576811"
                        class="form-control" id="exampleInput" placeholder="First Name">
                    <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small> -->
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label class="form-label" for="telefono_cliente">Teléfono</label>
                    <input type="text" readonly class="form-control" wire:model.defer="telefono_cliente"
                        id="telefono_cliente">
                </fieldset>
            </div>
        </div>
        <!--.row-->

        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <fieldset class="form-group">
                    <label class="form-label" for="fecha_reserva">Fecha de Reserva</label>
                    <input type="date" wire:model.defer="fecha_reserva" class="form-control" id="fecha_reserva">
                @error('fecha_reserva')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </fieldset>
                
            </div>
            <div class="col-md-4 col-sm-6">
                <fieldset class="form-group">
                    <label class="form-label" for="exampleInputDisabled">Monto S/. (Y también Para BD)</label>
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
            <div class="col-md-4 col-sm-6">
                <fieldset class="form-group">
                    <label class="form-label" for="exampleInputDisabled">Pago S/.</label>
                    <input type="text" wire:model.defer="monto" class="form-control" id="exampleInputDisabled"
                        placeholder="Ingrese Monto del Pago">
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
        <!--.row-->

        <div>
            <button type="button" wire:click="saveReserva" class="btn btn-primary">Reservar</button>
        </div>

        <h5 class="m-t-lg with-border">Autorizaciones Médicas</h5>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">

                        <label for="exampleInputFile">
                            Justificaciones Médicas Oficiales
                        </label>
                        <input type="file" name="archivo_medico" wire:model="archivos" class="form-control-file"
                            id="exampleInputFile" multiple />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputFile">
                            Justificaciones Médicas
                        </label>
                        <input type="file" name="archivo_medico[]" wire:model="archivos_pago"
                            class="form-control-file" id="exampleInputFile" />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputFile">
                            Justificaciones Médicas
                        </label>
                        <input type="file" name="archivo_medico[]" wire:model="archivos_pago"
                            class="form-control-file" id="exampleInputFile" />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputFile">
                            Justificaciones Médicas
                        </label>
                        <input type="file" name="archivo_medico[]" wire:model="archivos_pago"
                            class="form-control-file" id="exampleInputFile" />
                    </div>
                </div>
            </div>
        </div>

        <h5 class="m-t-lg with-border">Condiciones Aceptación</h5>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Payment Taken
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <h5 class="m-t-lg with-border">Riesgos Aceptación</h5>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Payment Taken
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <h5 class="m-t-lg with-border">Condiciones Fichas Médicas</h5>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Payment Taken
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--</form>-->
</div>
