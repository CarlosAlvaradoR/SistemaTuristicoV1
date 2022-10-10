<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <a id="modal-880003" href="#modal-container-880003" role="button" class="btn" data-toggle="modal">Crear
                    Categoría de Hoteles</a>
                <div wire:ignore.self class="modal fade" id="modal-container-880003" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Crear Categoria de Hoteles
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="save">
                                    
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                                        <label for="exampleInputEmail1">Descripcion</label>
                                        <input type="text" wire:model.defer="descripcion" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <input type="text" wire:model.defer="idPaquete" value="{{ $idPaquete }}">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click="save" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Nº
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
                        @php
                            $cont = 1;
                        @endphp
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    {{ $cont++ }}
                                </td>
                                <td>
                                    {{ $categoria->descripcion }}
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
</div>
