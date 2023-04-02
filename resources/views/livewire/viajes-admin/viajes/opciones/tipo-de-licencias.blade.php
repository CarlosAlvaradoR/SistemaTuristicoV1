<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Tipos de Licencia</h5>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Buscar Traslado de Viajes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a id="modal-532427" href="#modal-tipo-de-vehiculo" role="button" class="btn btn-rounded"
                                data-toggle="modal">Crear Tipos de Licencia</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">TIPO DE VEHÍCULO</th>
                                <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipoLicencias as $tl)
                                <tr>
                                    <td>
                                        {{ $tl->nombre_tipo }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Edit({{ $tl->id }})"
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
                        {{-- <tfoot>
                            <tr>

                                <th colspan="4">Total</th>

                                <th colspan="2">S/. {{-- $tvotal[0]->Monto }}</th>

                            </tr>

                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!--MODAL --->
    <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false" id="modal-tipo-de-vehiculo"
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
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <label for="nombre_tipo">
                                        Tipo de Licencia <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" wire:model.defer="nombre_tipo" class="form-control"
                                        id="nombre_tipo" />
                                    @error('nombre_tipo')
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
                        @if ($idTipoLicencias)
                            <button type="button" wire:click="saveTipoDeLicencias" class="btn btn-rounded btn-primary">
                                Actualizar
                            </button>
                        @else
                            <button type="button" wire:click="saveTipoDeLicencias" class="btn btn-rounded btn-primary">
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
            window.livewire.on('show-modal', msg => {
                $('#modal-tipo-de-vehiculo').modal('show')
            });
            window.livewire.on('traslados-updated', msg => {
                $('#modal-tipo-de-vehiculo').modal('hide')
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
