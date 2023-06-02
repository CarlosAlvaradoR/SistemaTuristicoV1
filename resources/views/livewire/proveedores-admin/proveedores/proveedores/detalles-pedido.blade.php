<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title with-border"><i class="fas fa-paste"></i> Por favor llene el siguiente
                        formulario para
                        realizar los pedidos a: {{ $proveedor->nombre_proveedor }}</h5>
                    <div class="row">
                        <div class="alert alert-blue-dirty alert-fill alert-close alert-dismissible fade in"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>INFORMACIÓN SOBRE LOS ESTADOS DEL PEDIDO!</strong>
                            <ul>
                                <li>COMPLETADO: Es el estado que se usa cuando un pedido ya se entregó.</li>
                                <li>NO COMPLETADO: Este estado indica que ya se realizó el pedido, pero que aún no se le
                                    hace entrega de este.</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Fecha</label>
                                <input type="date" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="monto">Monto S/.</label>
                                <input type="text" wire:model.defer="monto" wire:loading.attr="disabled"
                                    class="form-control maxlength-custom-message" id="monto"
                                    placeholder="Ingrese Monto del Equipo">
                                @error('monto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="estado_pedido">Estado</label>
                                <select class="form-control" wire:model.defer="estado_pedido"
                                    wire:loading.attr="disabled" id="estado_pedido">
                                    <option value="" selected>...Seleccione...</option>
                                    @foreach ($estado_pedidos as $e)
                                        <option value="{{ $e->id }}">{{ $e->estado }}</option>
                                    @endforeach
                                </select>
                                @error('estado_pedido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="observación_pedido">Observación</label>
                                <textarea class="form-control" wire:model.defer="observación_pedido" wire:loading.attr="disabled"
                                    id="observación_pedido" rows="3"></textarea>
                                @error('observación_pedido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-lg-6">

                            @if ($mostrarEquipos)
                                <button class="btn btn-primary btn-rounded center" wire:click="savePedido"
                                    wire:loading.attr="disabled">Actualizar</button>
                            @else
                                <button class="btn btn-primary btn-rounded center" wire:click="savePedido"
                                    wire:loading.attr="disabled">Guardar</button>
                            @endif

                            <a class="btn btn-success btn-rounded center"
                                href="{{ route('pedidos.proveedores.index') }}"
                                wire:loading.attr="disabled">Finalizar</a>
                            <button class="btn btn-danger btn-rounded center"
                                wire:loading.attr="disabled">Cancelar</button>
                            @if ($idPedido)
                                <a href="{{ route('pedidos.proveedores.general.detalle.componentes', $idPedido) }}">
                                    Llenar componentes ?
                                </a>
                            @endif

                        </div>

                    </div>
                    <br>

                    @if ($mostrarEquipos)
                        <h5 class="card-title with-border"><i class="fas fa-file"></i> Comprobante</h5>
                        <div class="row">
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label" for="numero_de_comprobante">Nº Comprobante</label>
                                    <input type="text" wire:model.defer="numero_de_comprobante"
                                        wire:loading.attr="disabled" class="form-control maxlength-simple"
                                        id="numero_de_comprobante" placeholder="ej: A023-0087">
                                    @error('numero_de_comprobante')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label" for="fecha_de_emision">Fecha Emisión</label>
                                    <input type="datetime-local" wire:model.defer="fecha_de_emision"
                                        wire:loading.attr="disabled" class="form-control maxlength-simple"
                                        id="fecha_de_emision" placeholder="ej:12/12/2023">
                                    @error('fecha_de_emision')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label" for="tipo_de_pago">Tipo de Pago</label>
                                    <select class="form-control" wire:model="tipo_de_pago">
                                        <option value="">...Seleccione...</option>
                                        <option value="AL CONTADO">AL CONTADO</option>
                                        <option value="CRÉDITO">CRÉDITO</option>
                                    </select>
                                    @error('tipo_de_pago')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
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

                            <div class="col-lg-3">
                                @if ($idComprobante)
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
                            <div class="col-lg-3">
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
                                @if ($idComprobante)
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
                        <br>
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
                    @endif

                </div>
            </div>
        </div>


        @if ($mostrarEquipos)
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title"><i class="fab fa-steam-symbol"></i> Lista de Equipos</h5>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Buscar Equipos">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">EQUIPO - Marca</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos as $e)
                                    <tr>
                                        <td>{{ $e->nombre }} - {{ $e->marca }}</td>
                                        <td>{{ $e->stock }}</td>
                                        <td>{{ $e->precio_referencial }}</td>
                                        <td>
                                            <button id="delete" wire:click="añadirAlPedido({{ $e->id }})"
                                                title="Añadir Equipo al Pedido"
                                                data-target="#modal-agregar-equipo-pedido" data-toggle="modal"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title"><i class="fab fa-steam-symbol"></i> Equipos Añadidos al Pedido</h5>

                        <form wire:submit.prevent="guardarEntradaPedido">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" class="form-control" placeholder="Buscar Proveedores">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-rounded" type="submit">Guardar</button>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">EQUIPO</th>
                                        <th scope="col">Cantidad Solicitada</th>
                                        <th scope="col">Cantidad Entrante</th>
                                        <th scope="col">Precio C/U</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos_pedidos as $index => $ep)
                                        <tr>
                                            <td>{{ $ep->nombre }}-{{ $ep->marca }}</td>
                                            <td>{{ $ep->cantidad }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" min="1" max="{{ $ep->cantidad }}"
                                                        autocomplete="off"
                                                        wire:model.defer="equipos_pedidos.{{ $index }}.cantidad_entrante"
                                                        wire:key="ep-{{ $ep->id }}" class="form-control"
                                                        id="cantidad_entrante" placeholder="ej: 3">
                                                    @error('equipos_pedidos.' . $index . '.ep')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                            </td>
                                            <td>{{ $ep->precio_real }}</td>
                                            <td>
                                                {{-- <button id="delete"
                                                    wire:click="entradaEquipoInventario({{ $ep->id }})"
                                                    title="Añadir Equipo al Pedido" class="btn btn-success btn-sm">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button> --}}
                                                <button id="view" title="Editar Detalle del Pedido"
                                                    data-target="#exampleModal" data-toggle="modal"
                                                    wire:click="Edit({{ $ep->id }})"
                                                    wire:loading.attr="disabled" title="Ver Atractivos"
                                                    class="btn btn-warning btn-sm">
                                                    <span class="fa fa-pencil-square-o"></span>
                                                </button>
                                                <button id="view" title="Quitar Equipo del Pedido"
                                                    wire:click="deleteConfirm({{ $ep->id }})"
                                                    wire:loading.attr="disabled" title="Ver Atractivos"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        @endif


    </div>










    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal-agregar-equipo-pedido" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control"
                                        placeholder="Buscar Almuerzos de Celebración">
                                </div>
                            </div>
                        </div>-->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="cantidad">
                                        Cantidad
                                    </label>
                                    <input type="number" autocomplete="off" wire:model.defer="cantidad"
                                        class="form-control" id="cantidad"
                                        placeholder="Ingrese cantidad de Equipo a Pedir" />
                                    @error('cantidad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="monto_del_equipo">
                                        Precio Real
                                    </label>
                                    <input type="text" wire:model.defer="monto_del_equipo" autocomplete="off"
                                        class="form-control" id="monto_del_equipo"
                                        placeholder="Ingrese Monto del Equipo" />
                                    @error('monto_del_equipo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" title="Añadir al Pedido" wire:click="add"
                        class="btn btn-rounded btn-primary">
                        <i class="fas fa-cart-plus"></i>
                        @if ($idDetalleIngreso)
                            Actualizar
                        @else
                            Añadir
                        @endif

                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL-->



    <div class="modal fade" wire:ignore.self id="modal-pago-proveedores" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">AÑADIR PAGOS DEL PEDIDO</h5>
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

                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="savePagos"
                        class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>




    @livewire('administrate-commons.alerts')

    <script>
        window.addEventListener('swal-confirm-detallePedido', event => {
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
                    Livewire.emitTo('proveedores-admin.proveedores.proveedores.detalles-pedido', 'delete',
                        event.detail.id);
                }
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal-agregar-equipo-pedido').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal-agregar-equipo-pedido').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

</div>
