<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Todas los Viajes</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" href="#modal-container-918849" role="button" class="btn"
                                data-toggle="modal">Nuevo Viaje</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">VIAJE</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">CANT. PARTICIPANTES</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viajes as $v)
                                <tr>
                                    <td>
                                        {{$v->descripcion}}
                                    </td>
                                    <td>
                                        {{$v->fecha}} 
                                    </td>
                                    <td>
                                        {{$v->cantidad_participantes}}
                                    </td>
                                    <td>
                                        {{$v->hora}}
                                    </td>
                                    <td>
                                        {{$v->estado}}
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('paquete.viajes.participantes', [$paquete, $v->id]) }}"
                                                    title="Participantes del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Ver detalles del Paquete"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.traslados') }}"
                                                    title="Traslados del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-map"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.almuerzos', [$paquete, $v->id]) }}" title="Almuerzos del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-utensils"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.boletas_pago') }}" title="Boletas de Pago del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-money-check"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.actividades_aclimatacion') }}" title="Actividades de Aclimatación"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-snowboarding"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.hospedaje') }}" title="Hospedajes"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-hotel"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.itinerario') }}" title="Itinerarios del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </a>
                                                <a href="{{ route('paquete.viajes.arriero') }}" title="Arrieros, Cocineros y Guías"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="glyphicon fas fa-users"></i>
                                                </a>
                                                <button type="button"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;"><span
                                                        class="glyphicon glyphicon-pencil"></span></button>
                                                <button type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-default"
                                                    style="float: none;"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                            </div>
                                        </div>
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
    <!--.container-fluid-->

    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false"
        id="modal-container-918849" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR VIAJE - Semana Santa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="descripcion">
                                        Descripción <span class="text-danger">(*)</span>
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="4"></textarea>
                                    @error('descripcion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="fecha_viaje">
                                        Fecha <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="date" wire:model.defer="fecha" class="form-control"
                                        id="fecha_viaje" />
                                    @error('fecha')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="hora_viaje">
                                        Hora <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="time" wire:model.defer="hora" class="form-control"
                                        id="hora_viaje" />
                                    @error('hora')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="cantidad_participantes">
                                        Cantidad de Participantes <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="number" wire:model.defer="cantidad_participantes"
                                        class="form-control" id="cantidad_participantes" />
                                    @error('cantidad_participantes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" wire:click="guardarAlmuerzoCelebración" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
</div>
