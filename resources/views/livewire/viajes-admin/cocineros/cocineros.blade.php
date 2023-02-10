<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Cocineros</h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Arrieros">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Nuevo Cocinero</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cocinero</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cocineros as $a)
                                <tr>
                                    <td>
                                        {{ $a->datos }}
                                    </td>
                                    <td>
                                        <button type="button"
                                            wire:click="AñadirCocinero({{ $a->idCocinero }})"
                                            title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-success">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Cocineros Programados</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Arriero">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cocinero</th>
                                <th scope="col">Monto de Pago</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cocineros_participantes as $ap)
                                <tr>
                                    <td>
                                        {{ $ap->datos }}
                                    </td>
                                    <td>
                                        {{ $ap->monto_pagar }}
                                    </td>
                                    <td>
                                        <button type="button" title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="1">Total</th>

                                <th colspan="2">{{-- $total[0]->Monto --}}</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-6 ks-panels-column-section">
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-traslado-viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        ASIGNAR COCINEROS AL VIAJE
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
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
                        @if ($encontradoComoPersona && !$encontradoComoCocinero)
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
                                {{--<div class="col-md-4">
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
                                    </div>
                                </div>--}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="monto">
                                            Monto de Pago S/.
                                        </label>
                                        <input type="text" wire:model.defer="monto" class="form-control"
                                            id="monto" />
                                    </div>
                                </div>
                                {{--<div class="col-md-4">
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
                                </div>--}}
                            </div>
                        @endif

                        @if ($encontradoComoCocinero)
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="monto">
                                            Monto de Pago S/.
                                        </label>
                                        <input type="text" wire:model.defer="monto" class="form-control"
                                            id="monto" />
                                    </div>
                                </div>
                               {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cantidad">
                                            Cantidad
                                        </label>
                                        <input type="text" wire:model.defer="cantidad" class="form-control"
                                            id="cantidad" />
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                </div>--}}
                            </div>
                        @endif

                        @if ($no_existe)
                            <div class="row">
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="dni_persona">DNI</label>
                                        <input type="text" class="form-control" wire:model.defer="dni_persona"
                                            id="dni_persona" placeholder="Ingrese Nº de DNI">
                                        <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small>-->
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="nombre">Nombres</label>
                                        <input type="text" class="form-control" wire:model.defer="nombre"
                                            id="nombre" placeholder="Ingrese Nombres" value="ej: Mike Alejandro">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" wire:model.defer="apellidos"
                                            id="apellidos" placeholder="Ingrese los Apellidos">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="genero">Género</label>
                                        <input type="text" class="form-control" wire:model.defer="genero"
                                            id="genero" placeholder="Ingrese el Género">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="telefono">Teléfono</label>
                                        <input type="tel" class="form-control" wire:model.defer="telefono"
                                            id="telefono" placeholder="Ingrese el Teléfono">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="dirección">Dirección</label>
                                        <input type="text" class="form-control" wire:model.defer="dirección"
                                            id="dirección" placeholder="Ingrese la Dirección">
                                    </fieldset>
                                </div>
                                {{--<div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="asociacion">Asociación</label>
                                        <select class="form-control" wire:model="asociacion" id="asociacion">
                                            <option value="0" select>...Seleccione la Asociación...</option>
                                            @foreach ($asociaciones as $a)
                                                <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>--}}
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="monto">Monto de Pago S/.</label>
                                        <input type="text" class="form-control" wire:model.defer="monto"
                                            id="monto" placeholder="ej: 45.70">
                                    </fieldset>
                                </div>
                                {{--<div class="col-lg-12">
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
                                </div>--}}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($encontradoComoCocinero)
                        <button type="button" wire:click="guardarCocineroViaje"
                            class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif
                    @if ($encontradoComoPersona && !$encontradoComoCocinero)
                        <button type="button" wire:click="guardarCocineroYAñadirAlViaje"
                            class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif
                    @if ($no_existe)
                        <button type="button" wire:click="nuevoCocinero" class="btn btn-rounded btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    @endif


                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->


    <!-- MODAL MONTO-->
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modalMontoArriero" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Añadir Monto y Fecha del Arriero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control"
                                        placeholder="Buscar Almuerzos de Celebración">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto de Pago S/.
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="monto"
                                        class="form-control" id="monto" placeholder="ej: 45.00" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="AñadirAlCocinero"
                        class="btn btn-rounded btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modalMontoArriero').modal('show')
            });
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modalMontoArriero').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
</div>
