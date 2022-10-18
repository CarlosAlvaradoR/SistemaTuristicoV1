<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <a id="galeriaPaquete" href="#modal-crear-galeriaPaquete" role="button" class="btn"
                    data-toggle="modal">Nueva Fotografía</a>

                <div wire:ignore.self class="modal fade" id="modal-crear-galeriaPaquete" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Crear Galería de Fotos del Paquete
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="saveGaleria" role="form" enctype="multipart/form-data">

                                    @if ($foto)
                                        <img src="{{ $foto->temporaryUrl() }}" width="100" height="100">
                                    @endif

                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label for="exampleInputEmail1">Descripcion</label>
                                        <input type="text" wire:model.defer="descripcion" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">

                                        <label for="foto">Fotografía</label>
                                        <input type="file" wire:model.defer="foto" class="form-control"
                                            id="foto">
                                    </div>
                                    <input hidden type="text" value="{{ $idPaquete }}">
                                </form>
                            </div>
                            <div class="modal-footer">

                                <button wire:click="saveGaleria" type="button" class="btn btn-primary">
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
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
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Fotografía</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cont = 1;
                        @endphp
                        @foreach ($fotos as $f)
                            <tr>
                                <td>
                                    {{ $cont++ }}
                                </td>
                                <td>
                                    {{ $f->descripcion }}
                                </td>
                                <td>
                                    <img src="{{ asset('/'.$f->directorio) }}" width="100" height="100">
                                    {{-- '/'.$f->directorio --}}
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
