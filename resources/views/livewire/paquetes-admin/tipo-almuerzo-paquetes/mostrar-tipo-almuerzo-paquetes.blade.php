<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoAlmuerzoPaquetes">
        Nuevo Almuerzo de celebración
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalTipoAlmuerzoPaquetes"
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

                                    @if (session()->has('SatisfaccionAlmuerzo'))
                                        
                                        <div class="alert alert-aquamarine alert-fill alert-border-left alert-close alert-dismissible fade in"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            {{ session('SatisfaccionAlmuerzo') }}
                                        </div>
                                    @endif

                                    <div class="form-group">

                                        <label for="tipo_de_almuerzo">
                                            Tipo de Almuerzo
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo_de_almuerzo" id="tipo_de_almuerzo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($tipos as $t)
                                                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('tipo_de_almuerzo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="observacion_del_almuerzo">
                                            Observación
                                        </label>
                                        <textarea class="form-control" wire:model.defer="observacion_del_almuerzo" 
                                            wire:loading.attr="disabled" id="observacion_del_almuerzo" rows="3"></textarea>

                                        @error('observacion_del_almuerzo')
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
                    <button type="button" wire:loading.attr="disabled" wire:click="guardarTipoAlmuerzoPaquete"
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
                            Observación
                        </th>

                        <th>
                            Tipo de Almuerzo
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
                    @foreach ($tipos_almuerzos as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->observacion }}
                            </td>
                            <td>
                                {{ $lv->nombre }}
                            </td>
                            <td>
                                <a href="#">
                                    <!---->
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                
                                <button class="btn btn-danger btn-sm" title="Quitar Tipo de Acémila del Paquete" 
                                    wire:loading.attr="disabled" wire:click="quitarTipoAlmuerzoPaquete({{ $lv->id }})">
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
