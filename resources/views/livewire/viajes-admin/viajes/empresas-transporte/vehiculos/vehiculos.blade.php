<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-car"></i> Lista de Vehículos - {{ $empresa->nombre_empresa }}
                    </h5>

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
                                data-toggle="modal">Nuevo Vehículo</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nº de Placa</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $v)
                                <tr>
                                    <td>
                                        {{ $v->numero_placa }}
                                    </td>
                                    <td>
                                        {{ $v->descripcion }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit({{ $v->id }})"
                                            class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;"
                                            title="Editar Información del Vehículo">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" wire:click="modalNuevoChofer({{ $v->id }})"
                                            title="Añadir Chófer al Vehículo"
                                            class="tabledit-edit-button btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#staticBackdrop" style="float: none;">
                                            <i class="glyphicon fas fa-biking"></i>
                                        </button>

                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;" title="Eliminar Vehículo">
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-container-918849"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!$idVehiculo)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_placa">
                                        Nº de Placa <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="numero_placa" class="form-control"
                                        id="numero_placa" />
                                    @error('numero_placa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label for="tipo_de_vehiculo">
                                    Tipo de Vehículo <span class="text-danger">(*)</span>
                                    <a href="{{ route('viajes.tipos.de.vehiculos') }}" target="_blank"
                                        title="Ver Tipos de Vehículo" wire:click="render"><i
                                            class="fas fa-exclamation"></i></a>
                                    <button class="btn btn-sm btn-rounded" title="Refrescar" wire:click="render"><i
                                            class="fas fa-sync-alt"></i></button>
                                </label>
                                <select class="form-control" wire:model.defer="tipo_de_vehiculo" id="tipo_de_vehiculo">
                                    <option selected value="">... Seleccione Tipo de Vehículo ...</option>
                                    @foreach ($tipoVehiculos as $tv)
                                        <option value="{{ $tv->id }}">{{ $tv->nombre_tipo }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_de_vehiculo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">
                                        Descripción <span class="text-danger">(*)</span>
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="4"></textarea>
                                    @error('descripcion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif


                    @if ($idVehiculo)
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" wire:model="dni"
                                        wire:keydown.enter="buscarChofer" placeholder="Buscar chófer por DNI">
                                </div>
                                @if (session()->has('message-error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('message-error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif


                    @if ($encontradoComoPersona && !$encontradoComoChofer)
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_licencia">
                                        Numero de Licencia
                                    </label>
                                    <input type="text" wire:model.defer="numero_licencia" class="form-control"
                                        id="numero_licencia" />
                                    @error('numero_licencia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_de_licencia">
                                        Tipo de Licencia
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_licencia" id="tipo_de_licencia">
                                        <option value="" select>...Seleccione...</option>
                                        @foreach ($tipoLicencias as $tl)
                                            <option value="{{ $tl->id }}" select>{{ $tl->nombre_tipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tipo_de_licencia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($encontradoComoChofer)
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
                                    <label class="form-label semibold" for="dni_persona">DNI</label>
                                    <input type="text" class="form-control" wire:model.defer="dni"
                                        id="dni" placeholder="Ingrese Nº de DNI">
                                    @error('dni')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="nombre">Nombres</label>
                                    <input type="text" class="form-control" wire:model.defer="nombre"
                                        id="nombre" placeholder="Ingrese Nombres" value="ej: Mike Alejandro">
                                    @error('nombre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" wire:model.defer="apellidos"
                                        id="apellidos" placeholder="Ingrese los Apellidos">
                                    @error('apellidos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="genero">Género</label>
                                    <input type="text" class="form-control" wire:model.defer="genero"
                                        id="genero" placeholder="Ingrese el Género">
                                    @error('genero')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" wire:model.defer="telefono"
                                        id="telefono" placeholder="Ingrese el Teléfono">
                                    @error('telefono')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="dirección">Dirección</label>
                                    <input type="text" class="form-control" wire:model.defer="dirección"
                                        id="dirección" placeholder="Ingrese la Dirección">
                                    @error('dirección')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="numero_licencia">
                                        Numero de Licencia
                                    </label>
                                    <input type="text" wire:model.defer="numero_licencia" class="form-control"
                                        id="numero_licencia" />
                                    @error('numero_licencia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="tipo_de_licencia">
                                        Tipo de Licencia
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_licencia" id="tipo_de_licencia">
                                        <option value="" select>...Seleccione...</option>
                                        @foreach ($tipoLicencias as $tl)
                                            <option value="{{ $tl->id }}">{{ $tl->nombre_tipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tipo_de_licencia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI(1)" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($encontradoComoPersona && !$encontradoComoChofer)
                        <button type="button" wire:click="guardarPersonaCliente"
                            class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif

                    @if ($encontradoComoChofer)
                        <button type="button" title="Añadir Chofer" wire:click="agregarChoferAlVehiculo"
                            class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif

                    @if ($no_existe)
                        <button type="button" title="Grabar Nuevo Chofer" wire:click="NuevoChofer"
                            class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif

                    @if (!$idVehiculo)
                        @if ($idSeleccionado)
                            <button type="button" wire:click="guardarVehículo" class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="guardarVehículo" class="btn btn-rounded btn-primary">
                                Guardar
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
    document.addEventListener('DOMContentLoaded', function() {
        //Lo que llega de CategoriesController
        window.livewire.on('show-modal', msg => {
            $('#modal-container-918849').modal('show')
        });
        window.livewire.on('close-modal', msg => {
            $('#modal-container-918849').modal('hide')
        });
        window.livewire.on('category-updated', msg => {
            $('#theModal').modal('hide')
        });
    });
</script>


</div>
