<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalItinerarios">
        Añadir Itinerario
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalItinerarios" tabindex="-1" aria-labelledby="modalItinerarios"
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

                            @if (session()->has('insertado_correctamente'))
                                <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ session('insertado_correctamente') }}
                                </div>
                            @endif

                            <div class="col-md-6">



                                @if ($mostrarNombre)
                                    <div class="form-group">

                                        <label for="actividad">
                                            ACTIVIDAD
                                        </label>
                                        <input type="text" readonly wire:model.defer="nombre_actividadRegistrado"
                                            class="form-control" id="actividad" />
                                    </div>

                                    <div class="form-group">

                                        <label for="itinerario">
                                            Descripción del Itinerario
                                        </label>
                                        <textarea class="form-control" wire:model.defer="descripcion_itinerario" id="itinerario"
                                            rows="3"></textarea>
                                        @error('descripcion_itinerario')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button" wire:click="agregarItinerarioaActividad"
                                        class="btn btn-primary">
                                        Agregar Itinerario
                                    </button>

                                    <button type="button" wire:click="limpiar"
                                        class="btn btn-primary">
                                        Reiniciar
                                    </button>


                                @else
                                    <div class="form-group">

                                        <label for="actividad">
                                            ACTIVIDAD
                                        </label>
                                        <input type="text" wire:model.defer="actividad" class="form-control"
                                            id="actividad" />
                                        @error('actividad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button" wire:click="guardarActividadItinerario"
                                        class="btn btn-primary">
                                        Registrar Actividad
                                    </button>
                                @endif



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
                                                        wire:click="quitarActividadItinerario({{ $ai->idItinerario }})">
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
                                <a href="#!" title="Quitar Itinerario"
                                    wire:click="quitarActividadItinerario({{ $ai->id }}, {{ $ai->idItinerario }})">
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
