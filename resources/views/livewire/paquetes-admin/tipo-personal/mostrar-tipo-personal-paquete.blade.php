<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPersonalTipo">
        Nuevo Tipo de Personal
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalPersonalTipo"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ruta del Paquete</h5>
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

                                        <label for="exampleInputEmail1">
                                            Tipo de Personal
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo_id"
                                            wire:loading.attr="disabled" id="exampleFormControlSelect1">
                                            <option selected>...Seleccione...</option>
                                            @foreach ($tipos as $t)
                                                <option value="{{ $t->id }}">{{ $t->nombre_tipo }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model.defer="cantidad" 
                                           wire:loading.attr="disabled" class="form-control"
                                            id="exampleInputPassword1" />
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:loading.attr="disabled" wire:click="guardarPersonalTipoPaquete" class="btn btn-primary">Guardar
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
                            Tipo de Personal
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
                    @foreach ($personales as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->nombre_tipo }}
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
                                
                                <button class="btn btn-danger btn-sm" title="Quitar Tipo de Personal" 
                                    wire:loading.attr="disabled" wire:click="quitarPersonalTipoPaquetes({{ $lv->id }})">
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
