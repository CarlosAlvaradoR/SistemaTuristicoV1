<div>
    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" wire:model.defer="search" wire:loading.attr="disabled"
                            wire:keydown.enter="search" placeholder="Ingrese DNI">
                    </div>

                    {{-- <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model.defer="dni"
                        wire:loading.attr="disabled" wire:target="buscar" placeholder=""> --}}
                </div>
                <div class="col-md-2">

                    <button type="button" wire:click="search" wire:loading.attr="disabled" class="btn btn-success">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            {{-- <label for="">CANT: {{ $valor }}</label> --}}
            <br>
            @error('dni')
                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="font-icon font-icon-warning"></i>
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>
    <div wire:loading wire:ignore.self>
        <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in" role="alert">
            <strong>Cargando...</strong>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Reservas Realizadas por el Cliente</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">DNI</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Paquete</th>
                                <th scope="col">Fecha de Reserva</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Estado de Pagos</th>
                                <th scope="col">Estado de Cumplimiento</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $r)
                                <tr>
                                    <!--<th scope="row">1</th>-->
                                    <td>{{ $r->dni }}</td>
                                    <td>{{ $r->datos }}</td>
                                    <td>{{ $r->nombre }}</td>
                                    <td>{{ $r->fecha_reserva }}</td>
                                    <td>{{ $r->pago }}</td>
                                    <td>
                                        @if ($r->nombre_estado == 'COMPLETADO')
                                            <span class="label label-success">{{ $r->nombre_estado }}</span>
                                        @else
                                            <span class="label label-danger">{{ $r->nombre_estado }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($r->aceptado)
                                            <span class="label label-success">{{ $r->aceptado }}</span>
                                        @endif
                                        @if ($r->no_aceptado)
                                            <span class="label label-danger">{{ $r->no_aceptado }}</span>
                                        @endif
                                        @if ($r->en_proceso)
                                            <span class="label label-secondary">{{ $r->en_proceso }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($r->estado_reserva == 'PRÓXIMA A CUMPLIRSE')
                                            <span class="label label-warning">{{ $r->estado_reserva }}</span>
                                        @else
                                            <span class="label label-primary">{{ $r->estado_reserva }}</span>
                                        @endif
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('reservas.solicitudes.devoluciones', $r->slug) }}"
                                                    title="Llenar Solicitud de de Devolución" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fa-solid fa-file"></span>
                                                </a>
                                                <a href="{{ route('reservas.pagos_restantes', $r->slug) }}"
                                                    title="Añadir Pago restante" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-warning"
                                                    style="float: none;"><span class="fas fa-money-check-alt"></span>
                                                </a>
                                                <a type="button" title="Editar Solicitud"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><span class="fas fa-file-edit"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- $solicitudes->links() --}}
                </div>
            </div>
        </div>

    </div>
</div>
