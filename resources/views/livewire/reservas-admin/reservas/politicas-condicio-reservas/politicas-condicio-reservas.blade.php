<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Política de Condición de una Reserva Próxima a Cumplirse</h5>
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>


                    <div wire:loading class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cantidad de Días en las que una reserva se considera próxima a
                                    cumplirse</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp

                            @foreach ($politicas as $index => $politica)
                                <form wire:submit.prevent="guardar">
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control"
                                                    wire:model.defer="politicas.{{ $index }}.cantidad_de_dias"
                                                    wire:key="politicas-{{ $politica['id'] }}">
                                                @error('politicas.' . $loop->index . '.cantidad_de_dias')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-inline btn-success btn-sm">
                                                <!--<i class="fa-sharp fa-solid fa-xmark"></i>-->
                                                <i class="fa-solid fa-check"></i> Actualizar
                                            </button>

                                        </td>
                                    </tr>
                                </form>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- $eventos->links() --}}
                </div>
            </div>
        </div>
    </div>
    @livewire('administrate-commons.alerts')
    <!-- MODAL -->
    <div wire:ignore.self class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_evento_postergacion"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_del_evento">Nombre del Evento <span
                                class="text-danger font-weight-bold">(*)</span></label>
                        <input type="text" autofocus wire:model.defer="nombre_del_evento" class="form-control"
                            id="nombre_del_evento">

                        @error('nombre_del_evento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    @if ($idEvento)
                        <button type="button" wire:click="crearEvento" wire:loading.attr="disabled"
                            class="btn btn-primary">
                            Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="crearEvento" wire:loading.attr="disabled"
                            class="btn btn-primary">
                            Guardar
                        </button>
                    @endif


                </div>
            </div>

        </div>

    </div>
    <!-- END MODAL-->



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_evento_postergacion').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_evento_postergacion').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    <script>
        window.addEventListener('swal-confirmEvento', event => {
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
                    Livewire.emitTo('reservas-admin.reservas.eventos-postergacion.eventos-postergacion',
                        'quitarEventoReserva',
                        event.detail
                        .id);
                }
            })
        });
    </script>


</div>
