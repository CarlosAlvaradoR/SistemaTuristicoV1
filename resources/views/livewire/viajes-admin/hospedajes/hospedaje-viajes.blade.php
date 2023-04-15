<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Hospedajes</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Almuerzos de Celebración">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Asignar Hospedaje</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fech. In.</th>
                                <th scope="col">Fecha. Fin. </th>
                                <th scope="col">MONTO</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospedajes_ocupados as $ho)
                                <tr>
                                    <td>
                                        {{ $ho->fecha_inicial }}
                                    </td>
                                    <td>
                                        {{ $ho->fecha_final }}
                                    </td>
                                    <td>
                                        {{ $ho->monto }}
                                    </td>
                                    <td>
                                        {{ $ho->nombre }}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            wire:click="Edit({{ $ho->id }})"
                                            class="btn btn-sm btn-rounded btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <th colspan="2">Total</th>

                                <th colspan="4">{{ $total[0]->Monto }}</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-traslado-viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        ASIGNAR HOSPEDAJES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicial">
                                    Fecha de Inicio <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha_inicial" class="form-control"
                                    id="fecha_inicial" />
                                @error('fecha_inicial')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="fecha_final">
                                    Fecha Final <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha_final" class="form-control"
                                    id="fecha_final" />
                                @error('fecha_final')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monto">
                                    Monto <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" wire:model.defer="monto" class="form-control" id="monto" />
                                @error('monto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="hotel">
                                    Hotel <span class="text-danger">(*)</span>
                                    <a href="{{ route('viajes.mostrar.hoteles') }}" target="_blank"
                                        title="Ver Hoteles Registrados" wire:click="render"><i
                                            class="fas fa-exclamation"></i></a>
                                    <button class="btn btn-sm btn-rounded" title="Refrescar" wire:click="render"><i
                                            class="fas fa-sync-alt"></i></button>
                                </label>
                                <select class="form-control" wire:model.defer="hotel" id="hotel">
                                    <option value="0" selected>...Seleccione...</option>
                                    @foreach ($hoteles as $h)
                                        <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        @if ($idHospedaje)
                            <button type="button" wire:click="asignarHospedajes"
                                class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="asignarHospedajes"
                                class="btn btn-rounded btn-primary">
                                Guardar
                            </button>
                        @endif


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
</div>
