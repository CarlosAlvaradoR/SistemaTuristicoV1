<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-list"></i> Lista de Todos los Viajes</h5>

                    <div class="row">
                        <div class="col-md-4">
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
                            <a target="_blank" href="{{ route('mostrar.viajes.actuales') }}" class="btn"
                                title="Ver Reporte de Viajes Actuales"><i class="fas fa-file-pdf"></i> Viajes
                                Actuales</a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" href="#modal-viaje-paquete" role="button" class="btn"
                                data-toggle="modal">Nuevo Viaje</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cod.</th>
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
                                        {{ $v->cod_string }}
                                    </td>
                                    <td>
                                        {{ $v->descripcion }}
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($v->fecha)) }}
                                    </td>
                                    <td>
                                        {{ $v->cantidad_participantes }}
                                    </td>
                                    <td>
                                        {{ $v->hora }}
                                    </td>
                                    <td>
                                        @switch($v->estado)
                                            @case(1)
                                                <span class="label label-warning">PROGRAMANDO</span>
                                            @break

                                            @case(2)
                                                <span class="label label-primary">REALIZÁNDOCE</span>
                                            @break

                                            @case(3)
                                                <span class="label label-success">FINALIZADO</span>
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="dropdown dropdown-status"><button
                                                class="btn btn-success dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Opciones</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.participantes', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-user-friends"></i> Part. del
                                                    Viaje</a>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                                    Detalles del
                                                    Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.traslados', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-map"></i> Traslados del
                                                    Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.almuerzos', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-utensils"></i> Almuerzos del Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.boletas_pago', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-money-check"></i> Boletas de Pago del Viaje</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.actividades_aclimatacion', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-snowboarding"></i> Actividades de Aclimatación</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.hospedaje', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-hotel"></i> Hospedajes</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.itinerario', [$paquete, $v->slug]) }}"><i
                                                        class="fas fa-clipboard-list"></i> Itinerarios del Viaje</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.arriero', [$paquete, $v->slug]) }}">Arrieros</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.cocineros', [$paquete, $v->slug]) }}">Cocineros</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('paquete.viajes.guias', [$paquete, $v->slug]) }}">Guías</a>


                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" target="_blank"
                                                    href="{{ route('paquete.viajes.arriero', [$paquete, $v->slug]) }}"
                                                    target="_blank"><i class="fas fa-file-pdf"></i> Reporte de
                                                    Participantes</a>
                                                <a class="dropdown-item" target="_blank"
                                                    href="{{ route('mostrar.viajes.itinerarios.cumplidos', [$paquete, $v->slug]) }}"
                                                    target="_blank"><i class="fas fa-file-pdf"></i> Itinerarios
                                                    Cumplidos </a>
                                                <a class="dropdown-item" target="_blank"
                                                    href="{{ route('paquete.viajes.guias', [$paquete, $v->slug]) }}"
                                                    target="_blank"><i class="fas fa-file-pdf"></i> Gastos de la
                                                    Empresa</a>


                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit('{{ $v->slug }}')"
                                            class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <a href="{{-- route('viajes.empresas_transporte.vehiculos', $e) --}}" title="Ver vehículos de la empresa"
                                            class="tabledit-edit-button btn btn-sm btn-primary" style="float: none;">
                                            <i class="glyphicon fas fa-shuttle-van"></i>
                                        </a>
                                        <button type="button" wire:click="deleteConfirm('{{ $v->slug }}')"
                                            class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;">
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-viaje-paquete"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <div class="form-group">
                                    <label for="estado">
                                        Estado del Viaje <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="form-control" wire:model.defer="estado" id="estado">
                                        <option value="">...Seleccione...</option>
                                        <option value="1">PROGRAMANDO</option>
                                        <option value="2">REALIZÁNDOCE</option>
                                        <option value="3">FINALIZADO</option>
                                    </select>
                                    @error('estado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cl-v-p" class="btn btn-rounded btn-danger"
                            wire:loading.attr="disabled" data-dismiss="modal">
                            Cerrar
                        </button>
                        @if ($idViajePaquete)
                            <button type="button" id="upd-v-p" wire:click="saveViaje"
                                wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" id="sav-v-p" wire:click="saveViaje"
                                wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                                Guardar
                            </button>
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
            window.livewire.on('show-modal-viaje-paquete', msg => {
                $('#modal-viaje-paquete').modal('show')
            });
            window.livewire.on('close-modal-pago-servicio', msg => {
                $('#modal-viaje-paquete').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });

        window.addEventListener('swal-confirm-Viaje', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('viajes-admin.viajes.viajes',
                        'deleteViaje',
                        event.detail
                        .id);
                }
            })
        });
    </script>

    @include('common.alerts')
</div>
