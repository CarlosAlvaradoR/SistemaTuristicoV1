<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Arrieros</h5>

                    <div class="row">
                        <div class="col-md-10">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" href="#modal-container-918849" role="button" class="btn"
                                data-toggle="modal">Nuevo Arriero</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ARRIERO</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Asociación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arrieros as $a)
                                <tr>
                                    <td>
                                        {{ strtoupper($a->datos) }}
                                    </td>
                                    <td>
                                        {{ $a->dni }}
                                    </td>
                                    <td>
                                        {{ $a->nombre }}
                                        {{-- $a->idArriero --}}
                                    </td>
                                    <td>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-default"
                                            style="float: none;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-default"
                                            data-toggle="modal" data-target="#staticBackdrop" style="float: none;">
                                            <i class="glyphicon fas fa-biking"></i>
                                        </button>

                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-default"
                                            style="float: none;">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-6 ks-panels-column-section">
                                <div class="card">
                                    <div class="card-block">
                                        <h5 class="card-title">Lista de Participantes</h5>
                                        <div class="form-group has-search">
                                            <span class="fa fa-search form-control-feedback"></span>
                                            <input type="text" class="form-control" placeholder="Buscar Cliente">
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">CLIENTE</th>
                                                    <th scope="col">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        <button type="button" title="Quitar de la Lista de Participantes"
                                                            class="btn btn-sm btn-rounded btn-danger">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                            </div>-->
    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-container-918849"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR NUEVOS ARRIEROS
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:keydown.enter="buscarArriero"
                                    wire:model="dni" placeholder="Buscar Arrieros">
                            </div>
                            @if (session()->has('message-error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('message-error') }}
                                </div>
                            @endif

                        </div>
                    </div>
                    @if ($encontradoComoPersona && !$encontradoComoArriero)
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">INFORMACIÓN:</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $nombres_apellidos }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="badge badge-default font-weight-bold">TELÉFONO:</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $telefono_arriero }}</span>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="asociacion">
                                        Asociación
                                    </label>
                                    <select class="form-control" wire:model="asociacion" id="asociacion">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($asociaciones as $a)
                                            <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('asociacion')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="text" wire:model.defer="monto" class="form-control"
                                        id="monto" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad
                                    </label>
                                    <input type="text" wire:model.defer="cantidad" class="form-control"
                                        id="cantidad" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_acemila"
                                        id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($tipo_acemilas as $ta)
                                            <option value="{{ $ta->id }}">{{ $ta->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    @endif

                    @if ($encontradoComoArriero)
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default">INFORMACIÓN:</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $nombres_apellidos }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="badge badge-default">TELÉFONO</span>
                            </div>
                            <div class="col-md-9">
                                <span class="badge badge-default">{{ $telefono_arriero }}</span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="text" wire:model.defer="monto" class="form-control"
                                        id="monto" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad
                                    </label>
                                    <input type="text" wire:model.defer="cantidad" class="form-control"
                                        id="cantidad" />
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_acemila"
                                        id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($tipo_acemilas as $ta)
                                            <option value="{{ $ta->id }}">{{ $ta->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    @endif

                    @if ($no_existe)
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="dni_persona">DNI</label>
                                    <input type="text" class="form-control" wire:model.defer="dni_persona"
                                        id="dni_persona" placeholder="Ingrese Nº de DNI">
                                    @error('dni_persona')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                    <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small>-->
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="nombre">Nombres</label>
                                    <input type="text" class="form-control" wire:model.defer="nombre"
                                        id="nombre" placeholder="Ingrese Nombres" value="ej: Mike Alejandro">
                                    @error('nombre')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" wire:model.defer="apellidos"
                                        id="apellidos" placeholder="Ingrese los Apellidos">
                                    @error('apellidos')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="genero">Género</label>
                                    <input type="text" class="form-control" wire:model.defer="genero"
                                        id="genero" placeholder="Ingrese el Género">
                                    @error('genero')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" wire:model.defer="telefono"
                                        id="telefono" placeholder="Ingrese el Teléfono">
                                    @error('telefono')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="dirección">Dirección</label>
                                    <input type="text" class="form-control" wire:model.defer="dirección"
                                        id="dirección" placeholder="Ingrese la Dirección">
                                    @error('dirección')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="asociacion">Asociación</label>
                                    <select class="form-control" wire:model="asociacion" id="asociacion">
                                        <option value="0" select>...Seleccione la Asociación...</option>
                                        @foreach ($asociaciones as $a)
                                            <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('asociacion')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            {{--  <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="monto">Monto</label>
                                    <input type="text" class="form-control" wire:model.defer="monto"
                                        id="monto" placeholder="ej: 45.70">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="cantidad">Cantidad de Acémilas</label>
                                    <input type="number" class="form-control" wire:model.defer="cantidad"
                                        id="cantidad" placeholder="ej: 5">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                   <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInputPassword1">Tipo de
                                        Acémilas</label>
                                    <select class="form-control" wire:model="tipo_de_acemila"
                                        id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($tipo_acemilas as $ta)
                                            <option value="{{ $ta->id }}">{{ $ta->nombre }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div> --}}
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        @if ($encontradoComoArriero)
                            <button type="button" wire:click="guardarArrieroAlquilerAcemila"
                                class="btn btn-rounded btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        @endif
                        @if ($encontradoComoPersona && !$encontradoComoArriero)
                            <button type="button" wire:click="guardarPersonaArriero"
                                class="btn btn-rounded btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        @endif
                        @if ($no_existe)
                            <button type="button" wire:click="nuevoArriero" class="btn btn-rounded btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        @endif
                        <button type="button" wire:click="saveViaje" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-edit', msg => {
                $('#modal-traslado-viajes').modal('show')
            });
            window.livewire.on('mensaje-info', msg => {
                $('#modal-traslado-viajes').modal('hide')
                Swal.fire(
                    'ALERTA',
                    msg,
                    'warning'
                )
            });
            window.livewire.on('category-updated', msg => {
                $('#modal-empresa-transporte').modal('hide')
            });
        });
    </script>
</div>
