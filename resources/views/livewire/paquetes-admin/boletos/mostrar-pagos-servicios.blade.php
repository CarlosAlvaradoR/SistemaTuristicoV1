<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <a id="galeriaPaquete" href="#modalCrearPagosPorServicio" role="button" class="btn"
                    data-toggle="modal">Añadir Pago por servicios</a>

                <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade"
                    id="modalCrearPagosPorServicio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <form wire:submit.prevent="saveGaleria">

                                    @if (session()->has('message'))
                                        <script>
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: "Pago por servicio añadido correctamente",
                                                showConfirmButton: false,
                                                timer: 1700
                                            });
                                        </script>
                                    @endif

                                    @if (session()->has('message2'))
                                        <script>
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: "Pago por servicio eliminado correctamente",
                                                showConfirmButton: false,
                                                timer: 1700
                                            });
                                        </script>
                                    @endif

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Descripcion</label>
                                        <textarea wire:model.defer="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="foto">Monto</label>
                                        <input type="text" placeholder="ej:25.60" wire:model.defer="precio"
                                            class="form-control" id="foto">
                                        @error('precio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="close" wire:click="cerrarModal" class="btn btn-danger"
                                    wire:loading.attr="disabled">
                                    Cerrar
                                </button>
                                @if ($edicion)
                                    <button wire:click="Update" id="update-pago" wire:loading.attr="disabled"
                                        type="button" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                @else
                                    <button wire:click="guardarPagosServiciosPaquete" id="save-pago"
                                        wire:loading.attr="disabled" type="button" class="btn btn-primary">
                                        Guardar
                                    </button>
                                @endif

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
                                #
                            </th>
                            <th>
                                Servicio
                            </th>
                            <th>
                                Monto
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
                        @foreach ($pagos as $p)
                            <tr>
                                <td>
                                    {{ $cont++ }}
                                </td>
                                <td>
                                    {{ $p->descripcion }}
                                </td>
                                <td>
                                    S/. {{ $p->precio }}
                                </td>
                                <td>
                                    <button wire:click="Edit({{ $p->id }})" class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button title="Quitar Pago por servicio"
                                        wire:click="deleteConfirm({{ $p->id }})"
                                        class="btn btn-danger btn-sm">
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
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'MUY BIEN',
                text: "{{ session('success') }}",
                icon: 'success'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: 'error'
            })
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-pago-servicio', msg => {
                $('#modalCrearPagosPorServicio').modal('show')
            });
            window.livewire.on('close-modal-pago-servicio', msg => {
                $('#modalCrearPagosPorServicio').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmTipoPersonal', event => {
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
                    Livewire.emitTo('paquetes-admin.boletos.mostrar-pagos-servicios',
                        'quitarPagosPorServicio',
                        event.detail
                        .id);
                }
            })
        });
    </script>
</div>
