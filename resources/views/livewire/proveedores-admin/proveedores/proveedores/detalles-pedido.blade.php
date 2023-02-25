<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-paste"></i> Por favor llene el siguiente formulario para
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
                                <button class="btn btn-primary btn-rounded center" wire:click="UpdatePedido"
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
                        </div>

                    </div>


                    <br>
                    <h5 class="card-title"><i class="fas fa-file"></i> Comprobante</h5>
                    <div class="row">
                        <div class="col-lg-2">
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
                        <div class="col-lg-2">
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

                        <div class="col-lg-2">
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
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="validez">Validez</label>
                                {{-- <input type="text" wire:model.defer="validez" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="validez" placeholder="First Name"> --}}


                                <label class="btn">
                                    <input type="radio" wire:model.defer="validez" wire:loading.attr="disabled"
                                        value="1" name="options" id="option1" autocomplete="off"> Válido
                                </label>
                                <label class="btn">
                                    <input type="radio" wire:model.defer="validez" wire:loading.attr="disabled"
                                        value="0" name="options" id="option1" autocomplete="off">
                                    No Válido
                                </label>

                                @error('validez')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>


                        <div class="col-lg-6">
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
                        <div class="col-lg-3">
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
                        <div class="col-lg-3">
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
                        <div class="col-lg-6">

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
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Añadir Pago
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
                                    <th scope="row">1</th>
                                    <td>Monto por Equipos</td>
                                    <td>Fecha de Pago</td>
                                    <td>Nº de Depósito</td>
                                    <td>Nº de Depósito</td>
                                    <td>Nº de Depósito</td>
                                    <td>Nº de Depósito</td>
                                    <td>@mdo</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


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
                                            {{-- <button id="view" title="Añadir Pedidos de Proveedor"
                                            data-target="#exampleModal" data-toggle="modal"
                                            wire:click="mostrarAtractivosDelLugar()" title="Ver Atractivos"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-minus"></i>
                                        </button> --}}
                                            {{-- <button id="delete" title="Dar de baja" class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirm()">
                                        <i class="fas fa-ban"></i>
                                    </button> --}}
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Buscar Proveedores">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">EQUIPO</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Entrante</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos_pedidos as $ep)
                                    <tr>
                                        <td>{{ $ep->nombre }}-{{ $ep->marca }}</td>
                                        <td>{{ $ep->cantidad }}</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" wire:model.defer="cantidad_entrante" class="form-control"
                                                    id="cantidad_entrante" placeholder="ej: 3">
                                            </div>

                                        </td>
                                        <td>{{ $ep->precio_real }}</td>
                                        <td>
                                            <button id="delete" wire:click="entradaEquipoInventario({{ $ep->id }})"
                                                title="Añadir Equipo al Pedido"
                                                
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                            <button id="view" title="Editar Detalle del Pedido"
                                                data-target="#exampleModal" data-toggle="modal"
                                                wire:click="quitarDelPedido({{ $ep->id }})"
                                                title="Ver Atractivos" class="btn btn-warning btn-sm">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </button>
                                            <button id="view" title="Quitar Equipo del Pedido"
                                                wire:click="quitarDelPedido({{ $ep->id }})"
                                                title="Ver Atractivos" class="btn btn-danger btn-sm">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif


    </div>


    <!-- Modal Pagos-->
    <div class="modal fade" wire:ignore.self id="staticBackdrop" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Monto Por Equipos</label>
                                <input type="text" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Fecha de Pago</label>
                                <input type="date" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Nº de Depósito</label>
                                <input type="text" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Archivo de Depósito</label>
                                <input type="file" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="fecha">Validez</label>
                                <input type="text" wire:model.defer="fecha" wire:loading.attr="disabled"
                                    class="form-control maxlength-simple" id="fecha" placeholder="First Name">
                                @error('fecha')
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
                    <button type="button" class="btn btn-rounded btn-primary">Guardar</button>
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
                        ASIGANAR NUEVOS LUGARES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInput">Banco</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Nº Cuenta</label>
                                    <input type="email" class="form-control maxlength-custom-message"
                                        id="exampleInputEmail1" placeholder="Ingrese Nº de Cuenta Bancaria"
                                        maxlength="20">
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputPassword1">Estado</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" wire:loading.attr="disabled" class="btn btn-rounded btn-danger"
                        data-dismiss="modal">
                        Cerrar
                    </button>

                    <button type="button" wire:loading.attr="disabled" class="btn btn-rounded btn-primary">
                        Guardar
                    </button>



                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->


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
                                </div>
                            </div>
                            <!--<div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_de_acemila">
                                        Tipo de Acémilas
                                    </label>
                                    <select class="form-control" wiremodel="tipo_de_acemila" id="tipo_de_acemila">
                                        <option value="0" select>...Seleccione...</option>

                                    </select>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" title="Añadir al Pedido" wire:click="add"
                        class="btn btn-rounded btn-primary">
                        <i class="fas fa-cart-plus"></i> Añadir
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
                $('#modal-agregar-equipo-pedido').modal('show')
            });
            window.livewire.on('fecha-itinerario-guarded', msg => {
                $('#modal-agregar-equipo-pedido').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
