<div>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Empresas de Transporte</h5>

                    <div class="row">
                        <div class="col-md-10">
                            <br>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a id="modal-918849" href="#modal-empresa-transporte" role="button" class="btn"
                                data-toggle="modal">Nueva Empresa</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">EMPRESA</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $e)
                                <tr>
                                    <td>
                                        {{ $e->nombre_empresa }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit({{ $e->id }})"
                                            class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <a href="{{ route('viajes.empresas_transporte.vehiculos', $e) }}"
                                            title="Ver vehículos de la empresa"
                                            class="tabledit-edit-button btn btn-sm btn-primary" style="float: none;">
                                            <i class="glyphicon fas fa-shuttle-van"></i>
                                        </a>
                                        <button type="button" class="tabledit-delete-button btn btn-sm btn-danger"
                                            style="float: none;">
                                            <span class="glyphicon glyphicon-trash"></span>
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
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-empresa-transporte"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        CREAR EMPRESA DE TRANSPORTES
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <label for="fecha_viaje">
                                        Nombre de Empresa de Tranporte <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="nombre_empresa" class="form-control"
                                        id="nombre_empresa" />
                                    @error('nombre_empresa')
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
                        @if ($idSeleccionado)
                            <button type="button" wire:click="crearEmpresasTransporte"
                                class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="crearEmpresasTransporte"
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
                $('#modal-empresa-transporte').modal('show')
            });
            window.livewire.on('empresa-updated', msg => {
                $('#modal-empresa-transporte').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#modal-empresa-transporte').modal('hide')
            });
        });
    </script>
</div>
