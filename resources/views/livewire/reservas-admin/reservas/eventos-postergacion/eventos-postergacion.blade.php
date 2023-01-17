<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Eventos de Postergación</h5>
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" wire:model="search" placeholder="Search">
                    </div>
                    <div wire:loading class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                            @endphp
                            @foreach ($eventos as $e)
                                <tr>
                                    <th scope="row">{{ $cont++ }}</th>
                                    <td>{{ $e->nombre_evento }}</td>
                                    <td>
                                        <button type="button" wire:click="agregarEventoReserva({{ $e->id }})"
                                            class="btn btn-inline btn-success btn-sm">
                                            <!--<i class="fa-sharp fa-solid fa-xmark"></i>-->
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $eventos->links() }}
                </div>
            </div>
        </div>
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Eventos Aceptados</h5>
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <a id="modal-810730" href="#modal-container-810730" role="button" class="btn"
                                    data-toggle="modal">Añadir Evento</a>
                                <a href="{{ route('reservas.index') }}"
                                    class="btn btn-rounded btn-inline btn-success">Finalizar</a>
                                <div class="alert alert-primary" role="alert">
                                    <a href="#" class="alert-link">Desea Llenar una Solicitud ? Llene una aquí.</a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contAcep = 1;
                                @endphp
                                @foreach ($eventos_aceptados as $ea)
                                    <tr>
                                        <th scope="row">{{ $contAcep++ }}</th>
                                        <td>{{ $ea->nombre_evento }}</td>
                                        <td>
                                            <button type="button"
                                                wire:click="quitarEventoReserva({{ $ea->idPostergacion }})"
                                                class="btn btn-inline btn-danger btn-sm">
                                                <i class="fa-sharp fa-solid fa-xmark"></i>
                                                <!--<i class="fa-solid fa-check"></i>-->
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
    </div>

    <!-- MODAL -->
    <div wire:ignore.self class="modal fade" id="modal-container-810730" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Añadir Evento
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_del_evento">Nombre del Evento</label>
                        <input type="text" autofocus wire:model.defer="nombre_del_evento" class="form-control"
                            id="nombre_del_evento">

                        @error('nombre_del_evento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="crearEvento" class="btn btn-primary">
                        Guardar Cambios
                    </button>

                </div>
            </div>

        </div>

    </div>
    <!-- END MODAL-->
</div>
