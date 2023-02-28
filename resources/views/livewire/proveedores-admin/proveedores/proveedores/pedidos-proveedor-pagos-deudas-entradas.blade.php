<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Información de Pedido - {{ $proveedor->nombre_proveedor }}</h5>




                    <h5 class="card-title"><i class="fas fa-file"></i> Comprobante</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="numero_de_comprobante">Nº Comprobante</label>
                                <input type="text" wire:model.defer="numero_de_comprobante"
                                    wire:loading.attr="disabled" class="form-control maxlength-simple"
                                    id="numero_de_comprobante" placeholder="First Name">
                                @error('numero_de_comprobante')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_de_emision">Fecha Emisión</label>
                                <input type="datetime-local" wire:model.defer="fecha_de_emision"
                                    wire:loading.attr="disabled" class="form-control maxlength-simple"
                                    id="fecha_de_emision" placeholder="First Name">
                                @error('fecha_de_emision')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="tipo_comprobante">Tipo de Comprobante</label>
                                <select class="form-control" wire:model.defer="tipo_comprobante"
                                    wire:loading.attr="disabled" id="tipo_comprobante">
                                    <option value="" selected>...Seleccione...</option>
                                    @foreach ($tipo_comprobantes as $tc)
                                        <option value="{{ $tc->id }}">{{ $tc->nombre_tipo }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_comprobante')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="archivo_comprobante">Archivo de Comprobante</label>
                                <input type="file" wire:model.defer="archivo_comprobante"
                                    wire:loading.attr="disabled" class="form-control maxlength-simple"
                                    id="archivo_comprobante" placeholder="First Name">
                                @error('archivo_comprobante')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            @if ($existe_comprobante)
                                <fieldset class="form-group">
                                    <label class="form-label" for="">Ver</label>
                                    <a href="{{ asset('/' . $archivo_comprobante) }}" target="_blank"
                                        class="uploading-list-item-name">
                                        <i class="font-icon font-icon-page"></i>
                                        Comprobante
                                    </a>
                                </fieldset>
                            @endif

                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="validez">Validez</label>
                                {{-- <input type="text" wire:model.defer="validez" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="validez" placeholder="First Name"> --}}


                                <label class="btn btn-sm btn-rounded">
                                    <input type="radio" wire:model.defer="validez" wire:loading.attr="disabled"
                                        value="1" name="options" id="option1" autocomplete="off"> Válido
                                </label>
                                <label class="btn btn-sm btn-rounded">
                                    <input type="radio" wire:model.defer="validez" wire:loading.attr="disabled"
                                        value="0" name="options" id="option1" autocomplete="off">
                                    No Válido
                                </label>

                                @error('validez')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>


                        <div class="col-lg-12">
                            <br>
                            @if ($existe_comprobante)
                                <button class="btn btn-primary btn-rounded center" wire:click="UpdateComprobante"
                                    wire:loading.attr="disabled">Actualizar</button>
                            @else
                                <button class="btn btn-primary btn-rounded center" wire:click="saveComprobante"
                                    wire:loading.attr="disabled">Guardar</button>
                            @endif

                            <a class="btn btn-success btn-rounded center"
                                href="{{ route('pedidos.proveedores.index') }}"
                                wire:loading.attr="disabled">Finalizar</a>
                            <button class="btn btn-danger btn-rounded center"
                                wire:loading.attr="disabled">Cancelar</button>
                        </div>
                    </div>


                    <h5 class="card-title"><i class="fas fa-file"></i> Deudas</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="monto_de_deuda">Monto De Deuda</label>
                                <input type="text" wire:model.defer="monto_de_deuda" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="monto_de_deuda"
                                    placeholder="Ingrese Monto de la Deuda">
                                @error('monto_de_deuda')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="estado_de_deuda">Estado de la Deuda</label>
                                <input type="text" wire:model.defer="estado_de_deuda" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="estado_de_deuda"
                                    placeholder="Ingrese estado de la Deuda">
                                @error('estado_de_deuda')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <br>
                        <div class="col-lg-12">

                            @if ($existe_deuda)
                                <button class="btn btn-primary btn-rounded center" wire:click="UpdateDeuda"
                                    wire:loading.attr="disabled">Actualizar</button>
                            @else
                                <button class="btn btn-primary btn-rounded center" wire:click="saveDeuda"
                                    wire:loading.attr="disabled">Guardar</button>
                            @endif

                            <a class="btn btn-success btn-rounded center"
                                href="{{ route('pedidos.proveedores.index') }}"
                                wire:loading.attr="disabled">Finalizar</a>
                            <button class="btn btn-danger btn-rounded center"
                                wire:loading.attr="disabled">Cancelar</button>
                        </div>

                    </div>

                    <h5 class="card-title"><i class="fas fa-file"></i> Pagos</h5>
                    <!-- Button trigger modal -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-pago-proveedores">
                                Añadir Pago
                            </button>
                        </div>
                    </div>

                    <div style="overflow-x:auto;">
                        <table class="table" id="dtHorizontalExample">
                            <thead>
                                <tr>
                                    <th scope="col">Nº Cuenta</th>
                                    <th scope="col">Monto por Equipos</th>
                                    <th scope="col">Monto por Deudas</th>
                                    <th scope="col">Fecha de Pago</th>
                                    <th scope="col">Nº de Depósito</th>
                                    <th scope="col">Archivo</th>
                                    <th scope="col">Validez</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos_proveedores as $pp)
                                    <tr>
                                        <td>{{ $pp->nombre_banco }}-{{ $pp->numero_cuenta }}</td>
                                        <td>{{ $pp->monto_equipos }}</td>
                                        <td>{{ $pp->monto_deuda }}</td>
                                        <td>{{ $pp->fecha_pago }}</td>
                                        <td>{{ $pp->numero_depósito }}</td>
                                        <td>
                                            <a href="{{ asset('/' . $pp->ruta_archivo) }}" target="_blank"
                                                class="uploading-list-item-name">
                                                <i class="font-icon font-icon-page"></i>
                                                Ver
                                            </a>
                                        </td>
                                        <td>
                                            @if ($pp->validez_pago == 1)
                                                <span class="label label-success">Válido</span>
                                            @else
                                                <span class="label label-danger">No Válido</span>
                                            @endif
                                        </td>
                                        <td>@mdo</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>




        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Información de Pedido - {{ $proveedor->nombre_proveedor }}</h5>




                    <h5 class="card-title"><i class="fas fa-file"></i> Ingreso de Pedido</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_de_ingreso">Fecha de Ingreso <span
                                        class="text-danger">(*)</span></label>
                                <input type="date" wire:model.defer="fecha_de_ingreso"
                                    wire:loading.attr="disabled" class="form-control maxlength-simple"
                                    id="fecha_de_ingreso" placeholder="First Name">
                                @error('fecha_de_ingreso')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="observacion_de_ingreso">Observación del Ingreso del
                                    Pedido</label>
                                <textarea class="form-control" wire:model.defer="observacion_de_ingreso" wire:loading.attr="disabled"
                                    id="observacion_de_ingreso" rows="3"></textarea>
                                @error('observacion_de_ingreso')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>


                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_de_emision">Estado del Pedido</label>
                                @if ($pedido->estado_pedidos_id == 1)
                                    <span class="label label-success">COMPLETADO</span>
                                @else
                                    <span class="label label-danger">NO COMPLETADO</span>
                                @endif
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_de_emision">Estado del Pedido</label>
                                @if ($estado_pedido->estado_pedidos_id == 1)
                                    <button class="btn btn-danger btn-rounded center btn-sm"
                                    wire:click="UpdateStatusPedido"
                                        wire:loading.attr="disabled">
                                        <span class="label label-danger">Cambiar a NO COMPLETADO</span>
                                    </button>
                                @else
                                    <button class="btn btn-success btn-rounded center btn-sm"
                                    wire:click="UpdateStatusPedido"
                                        wire:loading.attr="disabled">
                                        <span class="label label-success">Cambiar a NO COMPLETADO</span>
                                    </button>
                                @endif

                            </fieldset>
                        </div>


                        <div class="col-lg-12">
                            @if ($idIngresoPedidos)
                                <button class="btn btn-primary btn-rounded center" wire:click="guardarIngresoPedidos"
                                    wire:loading.attr="disabled">Actualizar</button>
                            @else
                                <button class="btn btn-primary btn-rounded center"
                                    title="Generar el Ingreso de Pedidos" wire:click="guardarIngresoPedidos"
                                    wire:loading.attr="disabled">Guardar</button>
                            @endif

                            <button class="btn btn-danger btn-rounded center"
                                wire:loading.attr="disabled">Cancelar</button>
                        </div>
                    </div>

                    @if ($mostrarEquipos)
                        <h5 class="card-title"><i class="fas fa-file"></i> Información de los Equipos en Pedido</h5>
                        <!-- Button trigger modal -->

                        {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-pago-proveedores">
                                Añadir Pago - {{ $idPedido }}
                            </button>
                        </div>
                    </div> --}}

                        <div style="overflow-x:auto;">
                            <table class="table table-hover" id="dtHorizontalExample">
                                <thead>
                                    <tr>
                                        <th scope="col">Equipo / Implemento</th>
                                        <th scope="col">Cant. Solicitada</th>
                                        <th scope="col">Cant. Registrada</th>
                                        {{-- <th scope="col">Observación</th> --}}
                                        <th scope="col">Cant. Ingresada</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos_pedidos as $ep)
                                        <tr>
                                            <td>
                                                <small>{{ $ep->nombre }}-{{ $ep->marca }}</small>
                                            </td>
                                            <td>
                                                <small>{{ $ep->cantidad }}</small>
                                            </td>
                                            <td>
                                                <input type="number" wire:model.defer="cantidad_entrante"
                                                    class="form-control" id="cantidad_entrante" autocomplete="off"
                                                    placeholder="ej:3">
                                                @error('cantidad_entrante')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            {{-- <td>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </td> --}}
                                            <td>
                                                <small>{{ $ep->cantidadIngresada }} / {{ $ep->cantidad }}</small>
                                            </td>
                                            <td>
                                                <button id="delete"
                                                    wire:click="entradaEquipoInventario({{ $ep->id }})"
                                                    title="Añadir Equipo al Pedido" class="btn btn-success btn-sm">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif


                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" wire:ignore.self id="modal-pago-proveedores" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="cuenta_proveedor_bancos">Nº de Cuenta</label>
                                <select class="form-control" id="cuenta_proveedor_bancos"
                                    wire:model.defer="cuenta_proveedor_bancos" wire:loading.attr="disabled">
                                    <option value="" selected>...Seleccione...</option>
                                    @foreach ($cuentas_bancarias as $cb)
                                        <option value="{{ $cb->id }}">{{ $cb->numero_cuenta }} -
                                            {{ $cb->nombre_banco }}</option>
                                    @endforeach

                                </select>
                                @error('cuenta_proveedor_bancos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="monto_equipos">Monto Por Equipos</label>
                                <input type="text" wire:model.defer="monto_equipos" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="monto_equipos"
                                    placeholder="First Name">
                                @error('monto_equipos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha_pago">Fecha de Pago</label>
                                <input type="date" wire:model.defer="fecha_pago" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha_pago" placeholder="First Name">
                                @error('fecha_pago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="numero_depósito">Nº de Depósito</label>
                                <input type="text" wire:model.defer="numero_depósito" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="numero_depósito"
                                    placeholder="First Name">
                                @error('numero_depósito')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="archivo_deposito_pago">Archivo de Depósito</label>
                                <input type="file" wire:model.defer="archivo_deposito_pago"
                                    wire:loading.attr="disabled" class="form-control maxlength-simple"
                                    id="archivo_deposito_pago" placeholder="First Name">
                                @error('archivo_deposito_pago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="validez_pago">Validez</label>
                                <label class="btn">
                                    <input type="radio" wire:model.defer="validez_pago"
                                        wire:loading.attr="disabled" value="1" name="option-val-pago"
                                        id="option-val-pago" autocomplete="off"> Válido
                                </label>
                                <label class="btn">
                                    <input type="radio" wire:model.defer="validez_pago"
                                        wire:loading.attr="disabled" value="0" name="option-val-pago"
                                        id="option-val-pago" autocomplete="off">
                                    No Válido
                                </label>
                                @error('validez_pago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-lg-6">

                            @if ($mostrarEquipos)
                                <button class="btn btn-primary btn-rounded center" wire:click="UpdatePedido"
                                    wire:loading.attr="disabled">Actualizar</button>
                            @else
                                <button class="btn btn-primary btn-rounded center" wire:click="savePedido"
                                    wire:loading.attr="disabled">Guardar</button>
                            @endif

                            <button class="btn btn-danger btn-rounded center"
                                wire:loading.attr="disabled">Cancelar</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="savePagos"
                        class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL MONTO-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMontoArriero"
        data-whatever="@fat">
        Open modal for @fat
    </button>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modalMontoArriero" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Añadir Monto y Fecha del Arriero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control"
                                        placeholder="Buscar Almuerzos de Celebración">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="text" autocomplete="off" wire:model.defer="monto"
                                        class="form-control" id="monto" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad de Acémilas
                                    </label>
                                    <input type="number" wire:model.defer="cantidad" autocomplete="off"
                                        class="form-control" id="cantidad" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wire:model="tipo_de_acemila" id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="guardarAcemilasAlquiladas"
                        class="btn btn-rounded btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modalMontoArriero').modal('show')
            });
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modalMontoArriero').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
