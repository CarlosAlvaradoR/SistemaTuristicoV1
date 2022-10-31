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

                <div wire:ignore.self class="modal fade" id="modalCrearPagosPorServicio" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Pago por servicios
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

                                <button wire:click="guardarPagosServiciosPaquete" type="button"
                                    class="btn btn-primary">
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
                        <h1>HOOLA</h1>
                        
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
                                    <a href="#">
                                        <!---->
                                        <span class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </span>
                                    </a>
                                    <button title="Quitar Pago por servicio" wire:click="quitarPagosPorServicio({{$p->id}})" class="btn btn-danger btn-sm">
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
</div>
