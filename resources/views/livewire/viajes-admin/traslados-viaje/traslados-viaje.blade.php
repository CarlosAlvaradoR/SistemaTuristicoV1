<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">
                        <a  class="btn btn-primary btn-sm btn-rounded" href="{{ route('paquete.viajes', $paquete) }}" title="Volver">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        
                        Lista de Traslados - {{ $paquete->nombre }}
                    </h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Traslado de Viajes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-traslado-viajes" role="button" class="btn btn-rounded"
                                data-toggle="modal">Añadir Traslado de Viajes</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">EMPRESA</th>
                                <th scope="col">VEHÍCULO</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traslados as $t)
                                <tr>
                                    <td>
                                        {{ $t->nombre_empresa }}
                                    </td>
                                    <td>
                                        {{ $t->numero_placa }}
                                    </td>
                                    <td>
                                        {{ $t->descripcion }}
                                    </td>
                                    <td>
                                        {{ $t->fecha }}
                                    </td>
                                    <td>
                                        {{ $t->monto }}

                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit({{ $t->idTraslado }})"
                                            title="Añadir a la lista de Participantes"
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

                                <th colspan="4">Total</th>

                                <th colspan="2">S/. {{ $total[0]->Monto }}</th>

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

                                <label for="fecha_viaje">
                                    Fecha <span class="text-danger">(*)</span>
                                </label>
                                <input type="date" wire:model.defer="fecha" class="form-control" id="fecha_viaje" />
                                @error('fecha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monto">
                                    Monto <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" wire:model.defer="monto" class="form-control" id="monto" />
                                @error('monto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="vehiculo">
                                    Vehículo <span class="text-danger">(*) </span>
                                    <a href="{{ route('viajes.empresas_transporte') }}" target="_blank"
                                        title="Crear Vehículo" class="font-weight-bold"><i
                                            class="fas fa-exclamation"></i></a>
                                    <button class="btn btn-sm btn-rounded" title="Refrescar" wire:click="render"><i
                                            class="fas fa-sync-alt"></i></button>
                                </label>
                                <select wire:model.defer="vehiculo" class="form-control" id="vehiculo">
                                    <option selected value="0">...Seleccione ...</option>
                                    @foreach ($vehiculos as $v)
                                        <option value="{{ $v->id }}">{{ $v->numero_placa }}</option>
                                    @endforeach
                                </select>

                                @error('vehiculo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                        @if ($idTrasladoViaje)
                            <button type="button" wire:click="guardatTrasladoDeLosViajes" class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="guardatTrasladoDeLosViajes"
                                class="btn btn-rounded btn-primary">
                                Guardar
                            </button>
                        @endif


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL-->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-edit', msg => {
                $('#modal-traslado-viajes').modal('show')
            });
            window.livewire.on('traslados-updated', msg => {
                $('#modal-traslado-viajes').modal('hide')
                Swal.fire(
                    'MUY BIEN',
                    msg,
                    'success'
                )
            });
            window.livewire.on('category-updated', msg => {
                $('#modal-empresa-transporte').modal('hide')
            });
        });
    </script>
</div>
