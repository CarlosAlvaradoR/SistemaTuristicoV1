<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Todas los Equipos</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search"
                                    placeholder="Buscar Equipo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Fecha Inicial
                                        </label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Imprimir" href="#modal-container-918849" role="button"
                                class="btn btn-rounded btn-sm" data-toggle="modal"><i
                                    class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte Equipos en Mantenimiento"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a id="modal-918849" title="Ver Reporte de equipos dados de baja"
                                href="#modal-container-918849" role="button" class="btn btn-rounded btn-sm"
                                data-toggle="modal"><i class="fas fa-file-invoice"></i></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal"
                                data-target="#modal-equipo">
                                Nuevo Equipo
                            </button>
                        </div>
                    </div>
                    <div wire:loading class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Equipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $e)
                                <tr>
                                    <td>{{ $e->nombre }}</td>
                                    <td>{{ $e->descripcion }}</td>
                                    <td>{{ $e->stock }}</td>
                                    <td>S/. {{ $e->precio_referencial }}</td>
                                    <td>{{ $e->tipo }}</td>
                                    <td>{{ $e->marca }}</td>
                                    <td>
                                        <button id="edit" title="Editar Equipo"
                                            wire:click="Edit({{ $e->id }})" class="btn btn-warning btn-sm">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </button>
                                        <button id="view"
                                            wire:click="mostrarAtractivosDelLugar({{ $e->id }})"
                                            title="Eliminar Equipo" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                        <button id="delete" title="Añadir Stock" data-target="#modal-stock"
                                            class="btn btn-success btn-sm"
                                            wire:click="addRemoveStock({{ $e->id }}, 1)">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                        <button id="view" title="Remover Stock" data-target="#modal-stock"
                                            class="btn btn-danger btn-sm"
                                            wire:click="addRemoveStock({{ $e->id }}, 2)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <a href="{{ route('equipos.index.bajas.mantenimientos', $e->id) }}"
                                            id="delete" title="Dar de baja" class="btn btn-primary btn-sm">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!--.container-fluid-->



    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-equipo"
        tabindex="-1" aria-labelledby="modal-stockLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-stockLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="nombre_de_equipo">Nombre de Equipo / Implemento</label>
                                <input type="text" wire:model.defer="nombre_de_equipo"
                                    class="form-control maxlength-simple" id="nombre_de_equipo"
                                    placeholder="Nombre de Equipo">
                                @error('nombre_de_equipo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input type="number" wire:model.defer="cantidad"
                                    class="form-control maxlength-custom-message" id="cantidad" placeholder="ej: 5"
                                    maxlength="20">
                                @error('cantidad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="descripcion">Descripción</label>
                                <textarea class="form-control" wire:model.defer="descripcion" id="descripcion" rows="3"></textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="precio_referencial">Precio Referencial</label>
                                <input type="text" wire:model.defer="precio_referencial"
                                    class="form-control maxlength-always-show" id="precio_referencial"
                                    placeholder="ej: 67.00" maxlength="10">
                                @error('precio_referencial')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="tipo">Tipo</label>
                                <select class="form-control" wire:model.defer="tipo" id="tipo">
                                    <option selected>---Seleccione---</option>
                                    <option value="EQUIPO">EQUIPO</option>
                                    <option value="IMPLEMENTO">IMPLEMENTO</option>
                                </select>
                                @error('tipo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label" for="marca">Marca</label>
                                <select class="form-control" wire:model.defer="marca" id="marca">
                                    <option selected value="0">---Seleccione---</option>
                                    @foreach ($marcas as $m)
                                        <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('marca')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                    @if ($edicion)
                        <button type="button" wire:click="Update" class="btn btn-primary btn-rounded">Actualizar
                        </button>
                    @else
                        <button type="button" wire:click="saveEquipo" class="btn btn-primary btn-rounded">
                            Guardar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modal-stock"
        tabindex="-1" aria-labelledby="modal-stockLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-stockLabel">{{ $title2 }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label" for="cantidad_entrante">Ingrese Catidad a Añadir</label>
                                <input type="number" wire:model.defer="cantidad_entrante"
                                    class="form-control maxlength-simple" id="cantidad_entrante" autocomplete="off"
                                    placeholder="Cantidad">
                                @error('cantidad_entrante')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closed" class="btn btn-danger btn-rounded">Cerrar</button>

                    @if ($opcion == 1)
                        <button type="button" wire:click="addRemove"
                            class="btn btn-primary btn-rounded">Agregar</button>
                    @else
                        <button type="button" wire:click="addRemove"
                            class="btn btn-primary btn-rounded">Quitar</button>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal-equipo', msg => {
                $('#modal-equipo').modal('show')
            });
            window.livewire.on('close-modal-equipo', msg => {
                $('#modal-equipo').modal('hide')
            });
            window.livewire.on('show-modal-equipo-stock', msg => {
                $('#modal-stock').modal('show')
            });
            window.livewire.on('close-modal-equipo-stock', msg => {
                $('#modal-stock').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    @include('common.alerts')
</div>
