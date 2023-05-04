<div>
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
            class="btn btn-rounded btn-sm" data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
    </div>
    <div class="col-md-1">
        <br>
        <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento" href="#modal-container-918849" role="button"
            class="btn btn-rounded btn-sm" data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
    </div>
    <div class="col-md-1">
        <br>
        <a id="modal-918849" title="Ver Reporte de equipos dados de baja" href="#modal-container-918849" role="button"
            class="btn btn-rounded btn-sm" data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
    </div>
    <div class="col-md-2">
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
                    <td>
                        <button title="Añadir Stock" class="btn btn-success btn-sm"
                            wire:click="Edit({{ $b->id }})">
                            <i class="fas fa-plus-circle"></i>
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



</div>
