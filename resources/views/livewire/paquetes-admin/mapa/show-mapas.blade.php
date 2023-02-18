<div>
    {{-- The whole world belongs to you. --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mapa">
        Añadir Ruta {{-- $conta --}}
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-mapa" tabindex="-1"
        aria-labelledby="modal-mapaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-mapaLabel">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="ruta">Añadir Imagen de la Ruta</label>
                                <input type="file" class="form-control-file" wire:model.defer="ruta"
                                    class="form-control" id="ruta">

                                @error('ruta')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea class="form-control" wire:model.defer="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>

                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                
                                @if ($edicion)
                                    <label for="">Mapa Registrado</label>
                                    <img src="{{ asset('/' . $mapa_anterior) }}" width="170" height="170">
                                @endif

                                @if ($ruta)
                                    <label for="">Nuevo Mapa</label>
                                    <img src="{{ $ruta->temporaryUrl() }}" width="170" height="170">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeModal" wire:loading.attr="disabled"
                        >Cerrar</button>
                    @if ($edicion)
                    <button type="button" class="btn btn-primary" wire:loading.attr="disabled"
                    wire:click="Update">Actualizar</button>
                    @else
                     <button type="button" class="btn btn-primary" wire:loading.attr="disabled"
                        wire:click="saveMapa">Guardar Cambios</button>   
                    @endif
                    
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
                                <img src="{{ asset('/' . $f->ruta) }}" class="rounded-circle" width="100"
                                    height="100">
                            </td>
                            <td>
                                {{ $f->descripcion }}
                            </td>
                            <td>
                                <button wire:click="Edit({{$f->id}})" class="btn btn-warning btn-sm">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{ $f->id }})" title="Eliminar Mapa">
                                    <span class="fa fa-trash" ></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: 'success'
            })
        </script>
    @endif

    @if (session('warning'))
        <script>
            Swal.fire({
                title: "{{ session('warning') }}",
                icon: 'warning'
            })
        </script>
    @endif

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal-mapa').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-mapa').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

<script>
    window.addEventListener('swal-confirmMapa', event => {
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
                Livewire.emitTo('paquetes-admin.mapa.show-mapas', 'deleteMapa', event.detail
                    .id);
            }
        })
    });
</script>
</div>


