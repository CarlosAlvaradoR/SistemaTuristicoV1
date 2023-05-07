<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Choferes Registrados</h5>
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
                            <a id="modal-918849" href="#modal_choferes" role="button" class="btn"
                                data-toggle="modal">Nuevo Chófer</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CHOFER</th>
                                <th scope="col">DNI</th>
                                <th scope="col">LICENCIA</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($choferes as $ch)
                                <tr>
                                    <td>
                                        {{ $ch->datos }}
                                    </td>
                                    <td>
                                        {{ $ch->dni }}
                                    </td>
                                    <td>
                                        {{ $ch->numero_licencia }}
                                    </td>
                                    <td>
                                        <button type="button" class="tabledit-edit-button btn btn-sm btn-warning"
                                            style="float: none;" wire:click="Edit({{ $ch->idChofer }})"
                                            wire:loading.attr="disabled">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>

                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;" wire:click="deleteConfirm({{ $ch->idChofer }})"
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal_choferes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR NUEVOS CHOFERES
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
                                <input type="text" class="form-control" wire:model="dni_buscado"
                                    wire:keydown.enter="buscarChofer" placeholder="Buscar chófer por DNI">
                            </div>
                            @if (session()->has('message-error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('message-error') }}
                                </div>
                            @endif
                        </div>
                    </div>

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
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
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
                                    @error('tipo_de_licencia')
                                        <small class="text-muted text-danger">{{ $message }}</small>
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
                                    <label class="form-label semibold" for="dni">DNI</label>
                                    <input type="text" class="form-control" wire:model.defer="dni"
                                        id="dni" placeholder="Ingrese Nº de DNI">
                                    @error('dni')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                    <!---->
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
                                    <label for="numero_licencia">
                                        Numero de Licencia
                                    </label>
                                    <input type="text" wire:model.defer="numero_licencia" class="form-control"
                                        id="numero_licencia" />
                                    @error('numero_licencia')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
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
                                    @error('tipo_de_licencia')
                                        <small class="text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                    @endif



                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetear" class="btn btn-rounded btn-danger"
                            data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-rounded btn-primary" wire:click="resetear"
                            title="Reiniciar">
                            <i class="fas fa-redo-alt"></i>
                        </button>
                        @if ($encontradoComoPersona && !$encontradoComoChofer)
                            <button type="button" wire:click="guardarPersonaChofer"
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
                            @if ($idPersona)
                                <button type="button" title="Actualizar Chofer" wire:click="NuevoChofer"
                                    class="btn btn-rounded btn-primary">
                                    <i class="fas fa-save"></i> Actualizar
                                </button>
                            @else
                                <button type="button" title="Grabar Nuevo Chofer" wire:click="NuevoChofer"
                                    class="btn btn-rounded btn-primary">
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
       
        window.addEventListener('swal-confirm-choferes', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#1C2833',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar Todo',
                denyButtonText: 'Eliminar Chófer',
                cancelButtonText: 'Cancelar',
                
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('viajes-admin.viajes.chofer.chofer',
                        'deleteChoferes',
                        event.detail
                        .id, 1);
                } else if (result.isDenied) {
                    Livewire.emitTo('viajes-admin.viajes.chofer.chofer',
                        'deleteChoferes',
                        event.detail
                        .id, 2);
                }
            });

            // let chofer = event.detail.id; 
            // //alert(chofer);
            // Swal.fire({
            //     title: event.detail.title,
            //     icon: event.detail.icon,
            //     showConfirmButton: false,
            //     // showCloseButton: true,
            //     html: `
        //         <p>select an action</p>
        //         <div>
        //             <button class="btn btn-primary" id="reply" onclick="onBtnClicked('delete', chofer)">Sí, quiero Eliminarlo</button>
        //             <button class="btn btn-secondary" onclick="onBtnClicked('masivo', chofer)">Eliminación Masiva</button>
        //             <button class="btn btn-danger" onclick="onBtnClicked('cancel',0)">Cancelar</button>
        //         </div>`
            // });


            // Swal.fire({
            //     title: event.detail.title,
            //     icon: event.detail.icon,
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Sí, quiero eliminarlo!',
            //     cancelButtonText: 'Cancelar'
            //     buttons: {
            //         buttonOne: {
            //             text: "First",
            //             value: "firstVal",
            //             visible: true,
            //             className: "swal-btn-cancel",
            //             closeModal: true,
            //         },
            //         buttonTwo: {
            //             text: "Second",
            //             value: "secondVal",
            //             visible: true,
            //             className: "swal-btn-confirm",
            //             closeModal: true
            //         },
            //         buttonThree: {
            //             text: "Third",
            //             value: "thirdVal",
            //             visible: true,
            //             className: "swal-btn-confirm",
            //             closeModal: true
            //         },
            //         buttonFour: {
            //             text: "Fourth",
            //             value: "fourthVal",
            //             visible: true,
            //             className: "swal-btn-confirm",
            //             closeModal: true
            //         },
            //         buttonFive: {
            //             text: "Fifth",
            //             value: "fifthVal",
            //             visible: true,
            //             className: "swal-btn-confirm",
            //             closeModal: true
            //         }
            //     },
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         Livewire.emitTo('viajes-admin.viajes.chofer.chofer',
            //             'deleteChoferes',
            //             event.detail
            //             .id);
            //     }
            // })
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal_choferes').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_choferes').modal('hide')
            });
        });
    </script>
</div>
