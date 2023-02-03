<div>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Almuerzos de Celebración</h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Almuerzos de Celebración">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Añadir Almuerzo de Celebración</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">MONTO</th>
                                <th scope="col">ASOCIACIÓN</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($almuerzos as $al)
                                <tr>
                                    <td>
                                        {{$al->descripcion}}
                                    </td>
                                    <td>
                                        {{$al->cantidad}}
                                    </td>
                                    <td>
                                        {{$al->monto}}
                                    </td>
                                    <td>
                                        {{$al->nombre}}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                        
                              <th colspan="2">Total</th>
                        
                              <th colspan="4">{{$total[0]->Monto}}</th>
                        
                            </tr>
                        
                          </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-traslado-viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR TRASLADO DE VIAJES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="descripcion">
                                        Descripción <span class="text-danger">(*)</span>
                                    </label>
                                    <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="4"></textarea>
                                    @error('descripcion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="cantidad">
                                        Cantidad <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="number" wire:model.defer="cantidad" class="form-control"
                                        id="cantidad" />
                                    @error('cantidad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="monto" class="form-control"
                                        id="monto" />
                                    @error('monto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="asociacion">
                                        Asociación <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="form-control" id="asociacion" wire:model.defer="asociacion">
                                        <option value="0" selected>...Seleccione...</option>
                                        @foreach ($asociaciones as $a)
                                            <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('asociacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" wire:click="guardarAlmuerzoCelebración" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
</div>