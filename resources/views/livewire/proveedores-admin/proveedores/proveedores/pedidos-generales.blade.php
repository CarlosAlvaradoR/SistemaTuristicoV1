<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Pedidos realizados a los Proveedores</h5>

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
                                <select class="form-control" id="mostrar" wire:model="mostrar">
                                    <option value="TODO">Mostrar TODOS</option>
                                    <option value="COMPLETADO">Mostrar COMPLETADOS</option>
                                    <option value="NO COMPLETADO">Mostrar NO COMPLETADOS</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" id="mostTwo" wire:model="cant">
                                    <option value="20">Mostrar 20 registros</option>
                                    <option value="50">Mostrar 50 registros</option>
                                    <option value="100">Mostrar 100 registros</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    @php
                        use Illuminate\Support\Facades\DB;
                        DB::statement("SET sql_mode = '' ");
                    @endphp
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Proveedor</th>
                                <th scope="col">RUC</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto de Pedido</th>
                                <th scope="col">Nº Comprobante</th>
                                <th scope="col">Archivo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $p)
                                <tr>
                                    <td>{{ $p->nombre_proveedor }}</td>
                                    <td>{{ $p->ruc }}</td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($p->fecha)) }}
                                    </td>
                                    <td>
                                        S/. {{$p->montoTotal ?? 0}}
                                    </td>
                                    <td>
                                        {{ $p->numero_comprobante }}
                                    </td>
                                    <td>
                                        @if ($p->ruta_archivo)
                                            <a href="{{ route('mostrar.archivo.comprobante', $p->slugArchivoComprobante) }}"
                                                target="_blank" class="uploading-list-item-name">
                                                <i class="font-icon font-icon-page"></i>
                                                Ver Archivo
                                            </a>
                                        @else
                                            Sin archivo
                                        @endif
                                    </td>
                                    <td>
                                        @if ($p->estado == 'COMPLETADO')
                                            <span class="label label-success">{{ $p->estado }}</span>
                                        @else
                                            <span class="label label-danger">{{ $p->estado }}</span>
                                        @endif


                                    </td>
                                    <td>

                                        <a href="{{ route('pedidos.proveedores.general.detalle', [$p->slug, $p->idPedido]) }}"
                                            title="Ver detalle del Pedido" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                {{ $pedidos->links() }}
            </div>
        </div>

    </div>



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
