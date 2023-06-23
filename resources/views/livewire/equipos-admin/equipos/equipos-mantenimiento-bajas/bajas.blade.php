<div>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Fecha Inicial
                    </label>
                    <input type="date" wire:model="fecha_inicial" class="form-control" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Fecha Final
                    </label>
                    <input type="date" wire:model="fecha_final" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <br>
        @if ($fecha_inicial && $fecha_final)
            <a target="_blank"
                href="{{ route('reporte.de.baja.de.equipos', [$equipo->id, $fecha_inicial, $fecha_final]) }}"
                title="Imprimir" class="btn btn-primary btn-rounded"><i class="fas fa-file-invoice"></i> Ver Reporte
                por Rangos</a>
        @else
            <a target="_blank" href="{{ route('reporte.de.baja.de.equipos', [$equipo->id]) }}" title="Imprimir"
                class="btn btn-primary btn-rounded"><i class="fas fa-file-invoice"></i> Ver Reporte
                General</a>
        @endif

    </div>
    <div class="col-md-3">
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#modal-bajas">
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
                <th scope="col">Registrado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bajas as $index => $b)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $b->fecha_baja }}</td>
                    <td>{{ $b->motivo_baja }}</td>
                    <td>{{ $b->cantidad }}</td>
                    <td><small>{{ Carbon::parse($b->created_at)->diffForHumans() }}</small></td>
                    <td>
                        <button title="Añadir Stock" class="btn btn-warning btn-sm"
                            wire:click="Edit({{ $b->id }})" wire:loading.attr="disabled">
                            <span class="fa fa-pencil-square-o"></span>
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $bajas->links() }}


    <!-- Modal BAJA DE EQUIPOS-->
    <div wire:ignore.self class="modal fade" id="modal-bajas" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="modal-bajasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-bajasLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="saveBaja">
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
                                    <input type="number" wire:model.defer="cantidad_de_baja" class="form-control"
                                        id="cantidad_de_baja" placeholder="ej: 5">
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
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-danger btn-rounded"
                            data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-rounded">
                            <img wire:loading wire:target="saveBaja"
                                src="{{ asset('dashboard_assets/img/fancybox_loading.gif') }}">
                            @if ($idBajaEquipo)
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal-bajas', msg => {
                $('#modal-bajas').modal('show')
            });
            window.livewire.on('close-modal-bajas', msg => {
                $('#modal-bajas').modal('hide')
            });
        });
    </script>

</div>
