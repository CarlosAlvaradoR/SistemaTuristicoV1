<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTipoAlimentacionCampoPaquetes">
        Nueva Alimentación Campo
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade"
        id="modalTipoAlimentacionCampoPaquetes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alimentación en campo</h5>
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

                                        <label for="descripcion">
                                            Descripción
                                        </label>
                                        <textarea class="form-control" wire:model.defer="descripcion" wire:loading.attr="disabled" id="descripcion"
                                            rows="3"></textarea>

                                        @error('descripcion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="tipo">
                                            Tipo de Alimentación
                                        </label>
                                        <select class="form-control" wire:model.defer="tipo" id="tipo"
                                            wire:loading.attr="disabled">
                                            <option selected>---Seleccione---</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>

                                        @error('tipo')
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
                    <button type="button" wire:loading.attr="disabled" wire:click="guardarAlimentacionCampo"
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
                            Descripción
                        </th>

                        <th>
                            Tipo Alimentacion
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
                    @foreach ($alimentaciones as $lv)
                        <tr>
                            <td>
                                {{ $cont++ }}
                            </td>
                            <td>
                                {{ $lv->descripcion }}
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
                                
                                <button class="btn btn-danger btn-sm" title="Quitar Tipo de Personal" 
                                    wire:loading.attr="disabled" wire:click="quitarAlimentacionCampo({{ $lv->id }})">
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
