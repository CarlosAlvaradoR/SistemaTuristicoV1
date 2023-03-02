<div>
    <style>
        .loader {
            border: 6px solid #f3f3f3;
            /* Light grey */
            border-top: 6px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="row">
        <div class="col-xxl-12 col-md-12">
            <section class="widget top-tabs">
                <header class="widget-header-dark">EQUIPO: SOGA - MARCA: STEEP</header>
                <div class="widget-tabs-nav bordered">
                    <ul class="tbl-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link green active" data-toggle="tab" href="#wt-1-tab-1" role="tab"
                                aria-expanded="true">
                                <i class="font-icon font-icon-chart-3"></i>
                                EQUIPOS EN MANTENIMIENTO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#wt-1-tab-2" role="tab"
                                aria-expanded="false">
                                <i class="font-icon font-icon-notebook-lines"></i>
                                EQUIPOS DADOS DE BAJA
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#wt-1-tab-3" role="tab" aria-expanded="false">
                            <i class="font-icon font-icon-pin"></i>
                            Event
                        </a>
                    </li> --}}
                    </ul>
                </div>
                <div class="tab-content widget-tabs-content">
                    <div class="tab-pane active" id="wt-1-tab-1" role="tabpanel" aria-expanded="true">

                        <div class="col-md-1">
                            <br>
                            <small class="form-label semibold">F. Salida</small>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_inicial">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" wire:model="fecha_inicial" class="form-control"
                                            id="fecha_inicial" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_final">
                                            Fecha Final
                                        </label>
                                        <input type="date" wire:model="fecha_final" class="form-control"
                                            id="fecha_final" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-mantenimiento-bajas">
                                Añadir Mantenimiento
                            </button>
                        </div>
                        <div class="row">
                            <div style="float: none">
                                <div wire:loading class="loader"></div>
                                <div wire:loading class="alert alert-primary" role="alert">
                                    <a href="#!" class="alert-link">Cargando ...</a>
                                </div>
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
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mantenimientos as $m)
                                    <tr>
                                        <th scope="row">1</th>
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
                                            <button id="delete" title="Añadir Stock" data-target="#modal-stock"
                                                class="btn btn-success btn-sm"
                                                wire:click="Edit({{ $m->idMantenimiento }}, 1)">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $mantenimientos->links() }}
                    </div>
                    <div class="tab-pane" id="wt-1-tab-2" role="tabpanel" aria-expanded="false">
                        <div class="col-md-4">
                            <br>
                            <small class="form-label semibold">F. Baja</small>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte de equipos dados de baja"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                                data-target="#modal-bajas">
                                Agregar Baja
                            </button>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha de Baja</th>
                                    <th scope="col">Motivo de Baja</th>
                                    <th scope="col">Cantidad dado de baja</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bajas as $b)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $b->fecha_baja }}</td>
                                        <td>{{ $b->motivo_baja }}</td>
                                        <td>{{ $b->cantidad }}</td>
                                        <td>@mdo</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $bajas->links() }}
                    </div>
                    {{-- <div class="tab-pane" id="wt-1-tab-3" role="tabpanel" aria-expanded="false">
                    <center>Event</center>
                </div> --}}
                </div>
            </section>

        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade"
        id="modal-mantenimiento-bajas" tabindex="-1" aria-labelledby="modal-stockLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-stockLabel"> {{ $title }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_salida_mantenimiento">Fecha de Salida</label>
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
                                    maxlength="20">
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
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_entrada_equipo">Fecha de Entrada</label>
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
                                <label class="form-label" for="cantidad_equipos_arreglados_buen_estado">Cantidad en
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
                                <label class="form-label" for="observacion_de_entrada">Observación de Entradas</label>
                                <textarea class="form-control" wire:model.defer="observacion_de_entrada" id="observacion_de_entrada" rows="3"></textarea>
                                @error('observacion_de_entrada')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>

                    <button type="button" wire:click="Update" class="btn btn-primary btn-rounded">Actualizar
                    </button>

                    <button type="button" wire:click="saveMantenimientoDevoluciones"
                        class="btn btn-primary btn-rounded">
                        Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal BAJA DE EQUIPOS-->
    <div wire:ignore.self class="modal fade" id="modal-bajas" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="modal-bajasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-bajasLabel">Bajas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_baja">Fecha de Baja</label>
                                <input type="date" wire:model.defer="fecha_baja"
                                    class="form-control maxlength-simple" id="fecha_baja"
                                    placeholder="Nombre de Equipo">
                                @error('fecha_baja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="cantidad_de_baja">Cantidad dada de Baja</label>
                                <input type="number" wire:model.defer="cantidad_de_baja"
                                    class="form-control" id="cantidad_de_baja"
                                    placeholder="ej: 5">
                                @error('cantidad_de_baja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="motivo_baja">Motivo de Baja</label>
                                <textarea class="form-control" wire:model.defer="motivo_baja" id="motivo_baja" rows="3"></textarea>
                                @error('motivo_baja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="saveBaja" class="btn btn-primary btn-rounded">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal-mantenimiento-bajas').modal('show')
            });
            window.livewire.on('close-modal-equipo', msg => {
                $('#modal-equipo').modal('hide')
            });
            window.livewire.on('show-modal-equipo-stock', msg => {
                $('#modal-stock').modal('show')
            });
            window.livewire.on('close-modal-equipo-stock', msg => {
                $('#modal-stock').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            //fecha_inicial
            var fecha = new Date();
            formateada = fecha.toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric'
            });

        });
    </script>


    @include('common.alerts')
</div>
