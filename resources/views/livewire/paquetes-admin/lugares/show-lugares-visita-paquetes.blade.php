<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLugares">
        Agregar Lugares
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalLugares" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ruta del Paquete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="badge badge-primary">Lugares disponibles</span>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Lugar
                                        </th>
                                        <th>
                                            Atractivo
                                        </th>
                                        <th>
                                            Descripción
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todoLugares as $t)
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                {{ $t->nombre }}
                                            </td>
                                            <td>
                                                {{ $t->nombre_atractivo }}
                                            </td>
                                            <td>
                                                {{ $t->descripcion }}

                                            </td>
                                            <td>
                                                <a href="#" title="Añadir Lugar" wire:click="agregarLugarPaquete({{$t->id}})">
                                                    <span class="btn btn-success btn-sm">
                                                        <span class="fa fa-plus"></span>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <span class="badge badge-success">Lugares a visitar</span>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Lugar
                                        </th>
                                        <th>
                                            Atractivo
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lugaresVisitar as $lv)
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                {{$lv->nombre}}
                                            </td>
                                            <td>
                                                {{$lv->nombre_atractivo}}
                                            </td>
                                            <td>
                                                <a href="#" title="Quitar Lugar" wire:click="quitarLugarPaquete({{$lv->id}})">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Terminar</button>
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
                            Lugar
                        </th>
                        <th>
                            Atractivo
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
                    @foreach ($lugaresVisitar as $lv)
                    <tr>
                        <td>
                            {{$cont++}}
                        </td>
                        <td>
                            {{$lv->nombre}}
                        </td>
                        <td>
                            {{$lv->nombre_atractivo}}
                        </td>
                        <td>
                            <a href="#" title="Quitar Lugar" wire:click="quitarLugarPaquete({{$lv->id}})">
                                <span class="btn btn-danger btn-sm">
                                    <span class="fa fa-minus"></span>
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    {{-- @foreach ($mapas as $f)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $f->ruta }}
                            </td>
                            <td>
                                {{ $f->descripcion }}
                            </td>
                            <td>
                                <a href="{{-- route('editar.itinerario.paquete', $itinerario->idactividaditinerario) }}">
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                <a action="{{-- route('eliminar.itinerario.paquete', $itinerario->idactividaditinerario) }}" method="POST" class="formEliminarItinerario">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>
        </div>
    </div>
</div>
