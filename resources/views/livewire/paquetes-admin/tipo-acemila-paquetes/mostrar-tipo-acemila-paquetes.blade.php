<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoAcemilaPaquete">
        Nuevas Acémilas
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalTipoAcemilaPaquete"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Tipos de Acémila al Paquete</h5>
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

                                    @if (session()->has('SatisfaccionTipoAcemila'))
                                        
                                        <div class="alert alert-aquamarine alert-fill alert-border-left alert-close alert-dismissible fade in"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            {{ session('SatisfaccionTipoAcemila') }}
                                        </div>
                                    @endif

                                    <div class="form-group">

                                        <label for="tipo">
                                            Tipo de Acémila
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo" id="tipo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($tipos as $t)
                                                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('tipo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cantidad">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model.defer="cantidad" wire:loading.attr="disabled"
                                            class="form-control" id="cantidad">

                                        @error('cantidad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:loading.attr="disabled" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:loading.attr="disabled" wire:click="guardarTipoAcemilaPaquete"
                        class="btn btn-primary">Guardar
                        Cambios</button>
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
                            Tipo
                        </th>

                        <th>
                            Cantidad
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
                    @foreach ($tipos_acemilas as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->nombre }}
                            </td>
                            <td>
                                {{ $lv->cantidad }}
                            </td>
                            <td>
                                <a href="#">
                                    <!---->
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                
                                <button class="btn btn-danger btn-sm" title="Quitar Tipo de Acémila del Paquete" 
                                    wire:loading.attr="disabled" wire:click="quitarTipoAcemilaPaquete({{ $lv->id }})">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
