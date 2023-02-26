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
                            
                            <a href="{{ route('pedidos.proveedores.general.detalle.componentes', $idPedido) }}">
                                Llenar componentes ?
                            </a>
                        </div>

                    </div>




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
