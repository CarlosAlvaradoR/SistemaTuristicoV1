<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Boletas de Pago</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Boletas de Pago">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Añadir Boletas de Pago</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">MONTO</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $p)
                                <tr>
                                    <td>
                                        {{$p->descripcion}}
                                    </td>
                                    <td>
                                        {{$p->fecha}}
                                    </td>
                                    <td>
                                        {{$p->monto}}
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

                                <th colspan="4">{{ $total[0]->Monto }}</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Participantes</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <button type="button" title="Quitar de la Lista de Participantes"
                                        class="btn btn-sm btn-rounded btn-danger">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Validation</h5>
                    <div>
                        <fieldset class="form-group has-success">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-success" id="inputSuccess1"
                                    placeholder="Input with success">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-warning">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-warning"
                                    placeholder="Input with warning">
                            </div>
                        </fieldset>
                        <fieldset class="form-group has-danger">
                            <div class="fl-flex-label">
                                <input type="text" class="form-control form-control-danger"
                                    placeholder="Input with danger">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>-->
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

                                    <label for="fecha">
                                        Fecha <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="date" wire:model.defer="fecha" class="form-control"
                                        id="fecha" />
                                    @error('fecha')
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
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" wire:click="guardarPagoBoletasViaje" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->
</div>