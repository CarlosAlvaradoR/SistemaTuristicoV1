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
                                <th scope="col">CANT. PART.</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Opciones</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viajes as $v)
                                <tr>
                                    <td>
                                        {{ $v->descripcion }}
                                    </td>
                                    <td>
                                        {{ $v->fecha }}
                                    </td>
                                    <td>
                                        {{ $v->cantidad_participantes }}
                                    </td>
                                    <td>
                                        {{ $v->hora }}
                                    </td>
                                    <td>
                                        {{ $v->estado }}
                                    </td>
                                    <td>

                                        <div class="dropdown dropdown-status"><button
                                                class="btn btn-success dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Opciones</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.participantes', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-user-friends"></i> Part. del
                                                    Viaje</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa-solid fa-eye"></i> Detalles del
                                                    Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.traslados') }}"><i
                                                        class="fas fa-map"></i> Traslados del
                                                    Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.almuerzos', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-utensils"></i> Almuerzos del Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.boletas_pago', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-money-check"></i> Boletas de Pago del Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.actividades_aclimatacion', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-snowboarding"></i> Actividades de Aclimatación</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.hospedaje', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-hotel"></i> Hospedajes</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.itinerario', [$paquete, $v->id]) }}"><i
                                                        class="fas fa-clipboard-list"></i> Itinerarios del Viaje</a>
                                                <a class="dropdown-item"
                                                    href="#!"><i
                                                        class="glyphicon fas fa-users"></i> Arrieros, Cocineros y
                                                    Guías</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('paquete.viajes.arriero', [$paquete, $v->id]) }}">Arrieros</a>
                                                <a class="dropdown-item" href="#">Cocineros</a>
                                                <a class="dropdown-item" href="#">Guías</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <!--<a href="" title="Participantes del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-user-friends"></i>
                                                </a>
                                                <a href="#!" title="Ver detalles del Paquete"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="" title="Traslados del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-map"></i>
                                                </a>
                                                <a href="" title="Almuerzos del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-utensils"></i>
                                                </a>
                                                <a href="" title="Boletas de Pago del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-money-check"></i>
                                                </a>
                                                <a href="" title="Actividades de Aclimatación"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-snowboarding"></i>
                                                </a>
                                                <a href="" title="Hospedajes"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-hotel"></i>
                                                </a>
                                                <a href="" title="Itinerarios del Viaje"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </a>
                                                <a href="" title="Arrieros, Cocineros y Guías"
                                                    class="tabledit-edit-button btn btn-sm btn-default"
                                                    style="float: none;">
                                                    <i class="glyphicon fas fa-users"></i>
                                                </a>-->
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
    </div>

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
                        <button type="button" wire:click="saveViaje" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
</div>
