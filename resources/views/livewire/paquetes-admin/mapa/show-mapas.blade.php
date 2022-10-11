<div>
    {{-- The whole world belongs to you. --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Añadir Ruta
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ruta del Paquete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">Ruta de Imagen</label>
                            <input wire:model.defer="ruta" type="text" class="form-control" id="inputAddress"
                                placeholder="Ingrese ruta de la imagen">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Descripción</label>
                            <input wire:model.defer="descripcion" type="text" class="form-control" id="inputAddress2"
                                placeholder="Ingrese una descripcion">
                        </div>

                    </form>
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
                        <th>#</th>
                        <th>Ruta</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($mapas as $f)
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
                                <a href="{{-- route('editar.itinerario.paquete', $itinerario->idactividaditinerario) --}}">
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                <a action="{{-- route('eliminar.itinerario.paquete', $itinerario->idactividaditinerario) --}}" method="POST" class="formEliminarItinerario">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
