<div>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha_inicial">
                            Fecha de Salida
                        </label>
                        <input type="date" wire:model="fecha_de_salida" class="form-control" id="fecha_inicial" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha_final">
                            Fecha de Entrada
                        </label>
                        <input type="date" wire:model="fecha_de_entrada" class="form-control" id="fecha_final" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <br>
            @if ($fecha_de_salida && $fecha_de_entrada)
                <a target="_blank"
                    href="{{ route('reporte.de.mantenimiento.de.equipos', [$equipo->id, $fecha_de_salida, $fecha_de_entrada]) }}"
                    title="Imprimir por Rangos" class="btn btn-primary btn-rounded"><i class="fas fa-file-invoice"></i>
                    Ver Reporte por Rango</a>
            @else
                <a target="_blank" href="{{ route('reporte.de.mantenimiento.de.equipos', $equipo->id) }}"
                    title="Imprimir" class="btn btn-primary btn-rounded"><i class="fas fa-file-invoice"></i> Ver Reporte
                    General</a>
            @endif
        </div>
        <div class="col-md-3">
            <br>
            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                data-target="#modal-mantenimiento-bajas">
                Añadir Mantenimiento
            </button>
        </div>
        <div class="col-lg-12" wire:loading wire:target="fecha_de_salida, fecha_de_entrada">
            <img src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}"> Cargando ...
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha de Salida</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Observación</th>
                <th scope="col">Fecha de Entrada</th>
                <th scope="col">Equipos en buen estado</th>
                <th scope="col">Observación de Entrada</th>
                <th scope="col">Registrado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mantenimientos as $index => $m)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $m->fecha_salida_mantenimiento }}</td>
                    <td>{{ $m->cantidad }}</td>
                    <td>{{ $m->observacion }}</td>
                    <td>
                        @if ($m->fecha_entrada_equipo)
                            {{ $m->fecha_entrada_equipo }}
                        @else
                            -
                        @endif

                    </td>
                    <td>
                        @if ($m->cantidad_equipos_arreglados_buen_estado)
                            {{ $m->cantidad_equipos_arreglados_buen_estado }}
                        @else
                            -
                        @endif

                    </td>
                    <td>
                        @if ($m->obsDevolucion)
                            {{ $m->obsDevolucion }}
                        @else
                            -
                        @endif

                    </td>
                    <td>
                        <small class="text-secondary">{{ Carbon::parse($m->created_at)->diffForHumans() }}</small>
                    </td>
                    <td>
                        <button title="Editar Información de Mantenimiento" class="btn btn-warning btn-sm"
                            wire:click="Edit({{ $m->idMantenimiento }}, 1)" wire:loading.attr="disabled">
                            <span class="fa fa-pencil-square-o"></span>
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if (count($mantenimientos) > 0)
        {{ $mantenimientos->links() }}
    @endif




    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-mantenimiento-bajas"
        tabindex="-1" aria-labelledby="modal-stockLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-stockLabel"> {{ $title }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="saveMantenimientoDevoluciones">
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="card-header">Header</div> --}}
                            <div class="col-lg-12">
                                <h5>INF. DE SALIDAS <small class="font-weight-bold">(Se considera la cantidad e
                                        Información adicional cuando los equipos entran en una fase de
                                        mantenimiento.)</small></h5>
                            </div>
                            <div class="col-lg-12">
                                <h6 class="text-primary"><b>CANTIDAD EN STOCK:</b> {{ $cantidad_stock }}</h6>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="fecha_salida_mantenimiento">Fecha de
                                        Salida</label>
                                    <input type="date" wire:model.defer="fecha_salida_mantenimiento"
                                        class="form-control maxlength-simple" id="fecha_salida_mantenimiento"
                                        placeholder="Nombre de Equipo">
                                    @error('fecha_salida_mantenimiento')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="cantidad">Cantidad de Salida</label>
                                    <input type="number" wire:model.defer="cantidad"
                                        class="form-control maxlength-custom-message" id="cantidad" placeholder="ej: 5"
                                        min="0" {{--max="{{ $cantidad_stock }}"--}} maxlength="20">
                                    @error('cantidad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="observacion">Observación</label>
                                    <textarea class="form-control" wire:model.defer="observacion" id="observacion" rows="3"></textarea>
                                    @error('observacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>


                            <div class="col-lg-12">
                                <h5>INF. DE REINCORPORACIÓN <small class="font-weight-bold">(Siempre y cuando el equipo
                                        se reincorpore por
                                        reparación u otra situación.)</small></h5>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="fecha_entrada_equipo">Fecha de
                                        Entrada</label>
                                    <input type="date" wire:model.defer="fecha_entrada_equipo"
                                        class="form-control maxlength-always-show" id="fecha_entrada_equipo"
                                        placeholder="ej: 67.00" maxlength="10">
                                    @error('fecha_entrada_equipo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="cantidad_equipos_arreglados_buen_estado">Cantidad
                                        en
                                        buen estado</label>
                                    <input type="number" wire:model.defer="cantidad_equipos_arreglados_buen_estado"
                                        class="form-control maxlength-custom-message"
                                        id="cantidad_equipos_arreglados_buen_estado" placeholder="ej: 5"
                                        autocomplete="off">
                                    @error('cantidad_equipos_arreglados_buen_estado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="observacion_de_entrada">Observación de
                                        Entradas</label>
                                    <textarea class="form-control" wire:model.defer="observacion_de_entrada" id="observacion_de_entrada" rows="3"></textarea>
                                    @error('observacion_de_entrada')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-danger btn-rounded"
                            data-dismiss="modal">Cerrar</button>

                        <button type="submit" class="btn btn-primary btn-rounded">
                            <img wire:loading wire:target="saveMantenimientoDevoluciones"
                                src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}">
                            @if ($idMantenimiento)
                                Actualizar
                            @else
                                Guardar
                            @endif

                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @livewire('administrate-commons.alerts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal-mantenimiento-bajas').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-mantenimiento-bajas').modal('hide')
            });
        });

        
    </script>

</div>
