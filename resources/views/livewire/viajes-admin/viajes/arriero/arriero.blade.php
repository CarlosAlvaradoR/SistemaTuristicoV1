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
                            <a id="modal-918849" href="#modal_arrieros" role="button" class="btn"
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
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-warning"
                                            style="float: none;" wire:click="Edit({{ $a->idArriero }})"
                                            wire:loading.attr="disabled">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;"wire:click="deleteConfirm({{ $a->idArriero }})"
                                            wire:loading.attr="disabled">
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

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_arrieros"
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
                                    wire:model="dni_buscado" placeholder="Buscar Arrieros">
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
                                    <label class="form-label semibold" for="dni">DNI</label>
                                    <input type="text" class="form-control" wire:model.defer="dni"
                                        id="dni" placeholder="Ingrese Nº de DNI">
                                    @error('dni')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
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
                                    <select class="form-control" wire:model.defer="genero" id="genero">
                                        <option value="" selected>...Seleccione...</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
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
                        <button type="button" wire:click.prevent="resetear" class="btn btn-rounded btn-danger"
                            data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-rounded btn-primary" wire:click="resetear"
                            wire:loading.attr="disabled" title="Reiniciar">
                            <i class="fas fa-redo-alt"></i>
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
                            @if ($idPersona)
                                <button type="button" title="Actualizar Información del Arriero"
                                    wire:click="nuevoArriero" class="btn btn-rounded btn-primary">
                                    <i class="fas fa-save"></i> Actuaizar
                                </button>
                            @else
                                <button type="button" title="Guardar Informació del Arriero"
                                    wire:click="nuevoArriero" class="btn btn-rounded btn-primary">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
                            @endif

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->

    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-guias', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#1C2833',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar Todo',
                denyButtonText: 'Eliminar Arriero',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('viajes-admin.viajes.arriero.arriero',
                        'deleteArrieros',
                        event.detail
                        .id, 1);
                } else if (result.isDenied) {
                    Livewire.emitTo('viajes-admin.viajes.arriero.arriero',
                        'deleteArrieros',
                        event.detail
                        .id, 2);
                }

            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_arrieros').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_arrieros').modal('hide')
            });
        });
    </script>
</div>
