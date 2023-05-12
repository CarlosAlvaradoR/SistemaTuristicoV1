<div>
    <!-- Button trigger modal -->
    @if (count($autorizaciones) < 1)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAutorizacionesMedicas">
            Nueva Autorizacion / Expediente Médico
        </button>
    @endif


    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalAutorizacionesMedicas"
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
                            <div class="col-md-12">
                                <form role="form">
                                    <div wire:loading>
                                        <span class="text-info">Procesando</span>
                                    </div>

                                    <div class="form-group">

                                        <label for="detalle_de_archivos">
                                            Detalle de Archivos / Expedientes Necesarios para reservar/comprar paquetes
                                            turísticos <span class="text-danger font-weigth-bold">(*)</span>
                                        </label>
                                        <textarea class="form-control" wire:model.defer="detalle_de_archivos" wire:loading.attr="disabled"
                                            id="detalle_de_archivos" rows="3"></textarea>

                                        @error('detalle_de_archivos')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" wire:click="cerrarModal" class="btn btn-rounded btn-danger"
                        wire:loading.attr="disabled">
                        Cerrar
                    </button>
                    @if ($idAutorizacionesMedicas)
                        <button type="button" wire:loading.attr="disabled" wire:click="saveAutorizacionesMedicas"
                            class="btn btn-rounded btn-primary">Actualizar
                        </button>
                    @else
                        <button type="button" wire:loading.attr="disabled" wire:click="saveAutorizacionesMedicas"
                            class="btn btn-rounded btn-primary">Guardar
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
                        <th>
                            #
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
                    @foreach ($autorizaciones as $a)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $a->detalle_de_archivos }}
                            </td>
                            <td>
                                <button wire:click="Edit({{ $a->id }})" class="btn btn-warning btn-sm">
                                    <span class="fa fa-pencil-square-o"></span>
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{ $a->id }})"
                                    title="Eliminar Autorización Médica">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- $condiciones->links() --}}
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-autorizaciones-medicas', msg => {
                $('#modalAutorizacionesMedicas').modal('show')
            });
            window.livewire.on('close-modal-autorizaciones-medicas', msg => {
                $('#modalAutorizacionesMedicas').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmAutorizacion', event => {
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
                    Livewire.emitTo(
                        'paquetes-admin.autorizaciones-medicas.mostrar-autorizaciones-medicas',
                        'deleteAutorizacionesMedicas',
                        event.detail
                        .id);
                }
            })
        });
        window.addEventListener('swal', event => {

            Swal.fire(
                event.detail.title,
                event.detail.text,
                event.detail.icon
            );
        });
    </script>
</div>
