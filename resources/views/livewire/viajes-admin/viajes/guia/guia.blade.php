<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Guías</h5>

                    <div class="row">
                        <div class="col-md-10">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" autofocus placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" href="#modal_guias" role="button" class="btn"
                                data-toggle="modal">Nuevo Guía</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">GUÍA</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guias as $g)
                                <tr>
                                    <td>
                                        {{ $g->datos }}
                                    </td>
                                    <td>
                                        {{ $g->dni }}
                                        {{-- $g->idGuia --}}
                                    </td>
                                    <td>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-warning"
                                            style="float: none;" wire:click="Edit({{ $g->idGuia }})"
                                            wire:loading.attr="disabled">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>

                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;" wire:click="deleteConfirm({{ $g->idGuia }})"
                                            wire:loading.attr="disabled">
                                            <span
                                                class="glyphicon
                                            glyphicon-trash"></span>
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

    @livewire('administrate-commons.alerts')

    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_guias"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR NUEVOS GUÍAS
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="dni_buscado"
                                    wire:keydown.enter="buscarGuia" placeholder="Buscar Cocinero por DNI">
                            </div>

                        </div>
                    </div>

                    @if ($encontradoComoPersona && !$encontradoComoGuia)
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
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_licencia">
                                        Numero de Licencia
                                    </label>
                                    <input type="text" wire:model.defer="numero_licencia" class="form-control"
                                        id="numero_licencia" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_de_licencia">
                                        Tipo de Licencia
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_licencia" id="tipo_de_licencia">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($tipoLicencias as $tl)
                                            <option value="{{ $tl->id }}" select>{{ $tl->nombre_tipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    @endif

                    @if ($encontradoComoGuia)
                        <div class="row">
                            <div class="col-md-3">
                                <span class="badge badge-default">INFORMACIÓN DEL CHÓFER:</span>
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
                        </div>
                    @endif

                    @if ($no_existe)
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="dni">DNI</label>
                                    <input type="text" class="form-control" wire:model.defer="dni" id="dni"
                                        placeholder="Ingrese Nº de DNI">
                                    @error('dni')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                    <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small>-->
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="nombre">Nombres</label>
                                    <input type="text" class="form-control" wire:model.defer="nombre" id="nombre"
                                        placeholder="Ingrese Nombres" value="ej: Mike Alejandro">
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
                            {{-- <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="numero_licencia">
                                        Numero de Licencia
                                    </label>
                                    <input type="text" wire:model.defer="numero_licencia" class="form-control"
                                        id="numero_licencia" />
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="tipo_de_licencia">
                                        Tipo de Licencia
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_licencia" id="tipo_de_licencia">
                                        <option value="0" select>...Seleccione...</option>
                                        @foreach ($tipoLicencias as $tl)
                                            <option value="{{ $tl->id }}" select>{{ $tl->nombre_tipo }}
                                            </option>
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

                        @if ($encontradoComoPersona && !$encontradoComoGuia)
                            <button type="button" title="Añadir Nuevo Guía" wire:click="guardarPersonaGuia"
                                wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        @endif

                        @if ($encontradoComoGuia)
                            <button type="button" title="Añadir Chofer" wire:click="agregarChoferAlVehiculo"
                                wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        @endif

                        @if ($no_existe)
                            @if ($idPersona)
                                <button type="button" title="Actualizar Información del Guía" wire:click="NuevoGuia"
                                    wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                    <i class="fas fa-save"></i> Actualizar
                                </button>
                            @else
                                <button type="button" title="Grabar Nuevo Guía" wire:click="NuevoGuia"
                                    wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
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
                denyButtonText: 'Eliminar Guia',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('viajes-admin.viajes.guia.guia',
                        'deleteGuias',
                        event.detail
                        .id, 1);
                } else if (result.isDenied) {
                    Livewire.emitTo('viajes-admin.viajes.guia.guia',
                        'deleteGuias',
                        event.detail
                        .id, 2);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_guias').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_guias').modal('hide')
            });
        });
    </script>
</div>
