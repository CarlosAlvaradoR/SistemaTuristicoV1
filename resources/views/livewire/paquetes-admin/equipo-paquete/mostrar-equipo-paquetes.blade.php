<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEquiposPaquetes">
        Nuevo Equipo
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalEquiposPaquetes"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Equipos al Paquete</h5>
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

                                    @if (session()->has('Correct'))
                                        
                                        <div class="alert alert-aquamarine alert-fill alert-border-left alert-close alert-dismissible fade in"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            {{ session('Correct') }}
                                        </div>
                                    @endif



                                    <div class="form-group">

                                        <label for="tipo">
                                            Equipo
                                        </label>
                                        <select class="form-control" wire:model.defer="equipo" id="equipo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($equipos as $e)
                                                <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('equipo')
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

                                    <div class="form-group">

                                        <label for="observacion">
                                            Observación
                                        </label>
                                        <textarea class="form-control" wire:model.defer="observacion" wire:loading.attr="disabled" id="observacion"
                                            rows="3"></textarea>

                                        @error('observacion')
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
                    <button type="button" wire:loading.attr="disabled" wire:click="guardarEquipoPaquetes"
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
                            Equipo
                        </th>

                        <th>
                            Cantidad
                        </th>
                        <th>
                            Observacion
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
                    @foreach ($equipo_paquetes as $lv)
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
                                {{ $lv->observacion }}
                            </td>
                            <td>
                                <a href="#">
                                    <!---->
                                    <span class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </span>
                                </a>
                                
                                <button class="btn btn-danger btn-sm" title="Quitar Equipo del Paquete" 
                                    wire:loading.attr="disabled" wire:click="quitarEquipoPaquetes({{ $lv->id }})">
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
