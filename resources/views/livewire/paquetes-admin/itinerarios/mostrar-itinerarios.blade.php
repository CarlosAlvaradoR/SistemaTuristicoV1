<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalItinerarios">
        Añadir Itinerario
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalItinerarios" tabindex="-1" aria-labelledby="modalItinerarios"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalItinerarios">Agregar Itinerario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>
                                    Actividad
                                </h3>

                                <div class="form-group">
                                    @error('actividad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="exampleInputEmail1">
                                        Actividad
                                    </label>
                                    <input type="text" wire:model.defer="actividad" class="form-control"
                                        id="exampleInputEmail1" />
                                </div>

                                <h3>
                                    Itinerario
                                </h3>

                                <div class="form-group">
                                    @error('descripcion_itinerario')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="exampleInputEmail1">
                                        Descripción
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion_itinerario" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                                <button type="button" wire:click="guardarActividadItinerario" class="btn btn-primary">
                                    Guardar
                                </button>

                            </div>
                            <div class="col-md-6">

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Actividad
                                            </th>
                                            <th>
                                                Descripcion
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- id, , , actividad_id, paquete_id --}}
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($actividades_itinerarios as $ai)
                                            <tr>
                                                <th scope="row">{{ $cont++ }}</th>
                                                <td>{{ $ai->nombre_actividad }}</td>
                                                <td>{{ $ai->descripcion }}</td>
                                                <td>
                                                    <a href="#" title="Quitar Itinerario"
                                                        wire:click="quitarActividadItinerario({{ $ai->id }})">
                                                        <span class="btn btn-danger btn-sm">
                                                            <span class="fa fa-minus"></span>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="saveMapa" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Actividad
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($actividades_itinerarios as $ai)
                        <tr>
                            <th scope="row">{{ $cont++ }}</th>
                            <td>{{ $ai->nombre_actividad }}</td>
                            <td>{{ $ai->descripcion }}</td>
                            <td>
                                <a href="#" title="Quitar Itinerario"
                                    wire:click="quitarActividadItinerario({{$ai->id}}, {{$ai->id_iti}})">
                                    <span class="btn btn-danger btn-sm">
                                        <span class="fa fa-minus"></span>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
