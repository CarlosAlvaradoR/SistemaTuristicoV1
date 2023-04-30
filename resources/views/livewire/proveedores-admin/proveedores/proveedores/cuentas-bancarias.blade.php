<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title"><i class="fas fa-university"></i> Lista de Cuentas Bancarias de -
                        {{ $proveedor->nombre_proveedor }}</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Proveedores">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {{-- <label for="exampleFormControlSelect1">Example select</label> --}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Mostrar 20</option>
                                    <option>Mostrar 20</option>
                                    <option>Mostrar 20</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">CREAR NUEVA CUENTA</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Banco</th>
                                <th scope="col">Nº Cuenta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuentas as $c)
                                <tr>
                                    <td>{{ $c->nombre_banco }}</td>
                                    <td>{{ $c->numero_cuenta }}</td>
                                    <td>{{ $c->estado }}</td>
                                    <td>
                                        <button id="edit" title="Editar Información de Proveedor"
                                            wire:click="Edit()" class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="view" wire:click="mostrarAtractivosDelLugar()"
                                            title="Eliminar Proveedor" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                        <button id="delete" title="Añadir Cuentas Bancarias"
                                            data-target="#exampleModal" data-toggle="modal"
                                            class="btn btn-success btn-sm" wire:click="deleteConfirm()">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                        <button id="view" title="Añadir Pedidos de Proveedor"
                                            data-target="#exampleModal" data-toggle="modal"
                                            wire:click="mostrarAtractivosDelLugar()" title="Ver Atractivos"
                                            class="btn btn-danger btn-sm">
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

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-traslado-viajes"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="saveCuenta">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            {{$title}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="banco">Banco</label>
                                    <select class="form-control" wire:model.defer="banco" id="banco">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($bancos as $b)
                                            <option value="{{ $b->id }}">{{ $b->nombre_banco }}</option>
                                        @endforeach
                                    </select>
                                    @error('banco')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="numero_cuenta">Nº Cuenta</label>
                                    <input type="text" wire:model.defer="numero_cuenta"
                                        class="form-control maxlength-custom-message" id="numero_cuenta"
                                        placeholder="Ingrese Nº de Cuenta Bancaria" maxlength="20">
                                    @error('numero_cuenta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label" for="estado">Estado</label>
                                    <select class="form-control" wire:model.defer="estado" id="estado">
                                        <option value="">---Seleccione---</option>
                                        <option value="1">ACTIVA</option>
                                        <option value="2">NO ACTIVA</option>
                                    </select>
                                    @error('estado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>

                        <button type="submit" class="btn btn-rounded btn-primary">
                            Guardar
                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
    <!-- END MODAL-->

    @livewire('administrate-commons.alerts')

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
</div>
