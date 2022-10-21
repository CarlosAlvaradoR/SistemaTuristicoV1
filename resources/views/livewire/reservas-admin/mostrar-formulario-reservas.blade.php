<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Another variation with a button -->
                <!--<div class="input-group">
                    <input type="text" class="form-control" wire:model.defer="dni"
                        placeholder="Ingrese DNI del cliente">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" wireclick="buscar" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>-->

                <div class="row">
                    <div class="col-md-10">

                        <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model.defer="dni"
                            placeholder="Ingrese DNI del cliente">
                    </div>
                    <div class="col-md-2">

                        <button type="button" wire:click="buscar" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>


            </div>
        </div>
        <br>
        {{ $contador }}
        @if ($contador > 0)

            <div class="box-typical box-typical-padding">

                <h5 class="m-t-lg with-border">Cliente Encontrado - {{ $nombre }}</h5>

                <div class="container-fluid"  wire:ignore.self>
                    <div class="row">
                        <div class="col-md-4">
                            
                                @foreach ($buscar as $c)
                                    

                                    <div class="form-group">

                                        <label for="name_apellidos">
                                            Nombres y Apellidos
                                        </label>
                                        <input type="text" class="form-control" value="{{ $c->datos }}" readonly
                                            id="name_apellidos" />
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputPassword1">
                                            Email
                                        </label>
                                        <input type="email" class="form-control" readonly
                                            id="exampleInputPassword1" />
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputPassword1">
                                            Genero
                                        </label>
                                        <input type="text"
                                            value="@if ($c->genero == 0) Femenino
                                        @else
                                            Masculino @endif"class="form-control"
                                            readonly id="exampleInputPassword1" />
                                    </div>
                                @endforeach

                            
                        </div>
                        <div class="col-md-4">
                            <form role="form">
                                <div class="form-group">

                                    <label for="fecha">
                                        Fecha de reserva
                                    </label>
                                    <input type="date" name="fecha" wire:model.defer="fecha" class="form-control"
                                        id="fecha" />
                                    @error('fecha')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="observacion">
                                        Observación
                                    </label>
                                    <textarea class="form-control" name="observacion" wire:model.defer="observacion" id="observacion" rows="3"></textarea>
                                    @error('observacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="monto">
                                        Monto de la reserva
                                    </label>
                                    <input type="text" name="monto" wire:model.defer="monto"
                                        placeholder="Ingrese Monto de la reserva" class="form-control"
                                        id="monto" />
                                    @error('monto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-primary"
                                    wire:click="generarReservaCliente">Generar Reserva</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview"
                                src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
                        </div>
                    </div>
                </div>


            </div>
            {{-- @foreach ($buscar as $item)
                <h1>{{ $item->nombre }}</h1>
            @endforeach --}}
        @else
            <div class="alert alert-danger" role="alert">
                Cliente no encontrado, por favor créelo
            </div>
            <div class="box-typical box-typical-padding">

                <h5 class="m-t-lg with-border text-danger">Cliente No Encontrado - {{ $nombre }}</h5>

                <div class="row">
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="exampleInput">Nombres y Apellidos</label>
                            <input type="text" class="form-control" id="exampleInput" placeholder="First Name">
                            <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small> -->
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email" value="mail@mail.com">
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputPassword1">Genero</label>
                            <select id="inputState" class="form-control">
                                <option selected>Seleccione...</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <!--.row-->


                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputDisabled">Nacionalidad</label>
                            <input type="email" class="form-control" id="exampleInputDisabled"
                                placeholder="First Name" disabled>
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
                    <button class="btn btn-primary">Reservar</button>
                </div>


            </div>
            <!--.box-typical-->
        @endif



    </div>
</div>
