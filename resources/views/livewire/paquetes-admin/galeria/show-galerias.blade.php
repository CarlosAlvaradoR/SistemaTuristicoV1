<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGaleriaPaquete">
        Nueva Fotografría
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalGaleriaPaquete"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <form role="form">

                                    <div class="form-group">
                                        <label for="descripcion_foto">Descripcion</label>
                                        <textarea class="form-control" wire:model.defer="descripcion" id="descripcion_foto" rows="3"></textarea>

                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Fotografía</label>
                                        <input type="file" class="form-control-file" wire:model.defer="foto"
                                            class="form-control" id="foto">

                                        @error('foto')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                @if ($edicion)
                                    <label for="">Imgen Anterior</label>
                                    <img src="{{ asset('/' . $foto_anterior) }}" width="170" height="170">
                                @endif

                                @if ($foto)
                                    <label for="">Nueva Imagen</label>
                                    <img src="{{ $foto->temporaryUrl() }}" width="170" height="170">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-danger" wire:loading.attr="disabled"
                        >Cerrar</button>
                    @if ($edicion)
                        <button type="button" wire:loading.attr="disabled" wire:click="Update"
                            class="btn btn-primary">Actualizar</button>
                    @else
                        <button type="button" wire:loading.attr="disabled" wire:click="saveGaleria"
                            class="btn btn-primary">Guardar
                            </button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table">
                <div wire:loading>
                    <span class="text-info">Procesando</span>
                </div>
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
                                <img src="{{ asset('/' . $f->directorio) }}" class="rounded-circle" width="100"
                                    height="100">
                                {{-- '/'.$f->directorio --}}
                            </td>
                            <td>
                                <a href="#!" wire:click="EditarGaleria({{ $f->id }})">
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                <button type="button" wire:click="deleteConfirm({{ $f->id }})"
                                    class="btn btn-danger btn-sm" title="Eliminar Foto">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



</div>

@livewire('administrate-commons.alerts')

@section('scripts')
    <script>
        window.addEventListener('swal-confirmImage', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('paquetes-admin.galeria.show-galerias', 'deleteGaleria', event.detail
                        .id);
                }
            })
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modalGaleriaPaquete').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modalGaleriaPaquete').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
@endsection
