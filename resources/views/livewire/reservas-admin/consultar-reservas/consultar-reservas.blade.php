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

                    @php
                        use App\Models\Viajes\Participantes;
                    @endphp

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">DNI</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Paquete</th>
                                <th scope="col">Fecha de Reserva</th>
                                <th scope="col">Monto</th>
                                {{-- <th scope="col">Estado</th> --}}
                                <th scope="col">Estado</th>
                                <th scope="col">Estado de Pagos</th>
                                <th scope="col">Estado de Cumplimiento</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $r)
                                <tr>
                                    <td>
                                        <small>{{ $r->dni }}</small>
                                    </td>
                                    <td><small>{{ $r->datos }}</small></td>
                                    <td><small>{{ $r->nombre }}</small></td>
                                    <td>
                                        <small>{{ date('d/m/Y', strtotime($r->fecha_reserva)) }}</small>
                                    </td>
                                    <td><small>{{ $r->pago }}</small></td>
                                    <td>
                                        @switch($r->estado_oficial)
                                            @case('PAGO COMPLETADO')
                                                <span class="label label-success">{{ $r->estado_oficial }}</span>
                                            @break

                                            @case('EN PROCESO')
                                                <span class="label label-secondary">{{ $r->estado_oficial }}</span>
                                            @break

                                            @case('PENDIENTE DE PAGO')
                                                <span class="label label-danger">{{ $r->estado_oficial }}</span>
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td>

                                        @if ($r->aceptado)
                                            <span class="label label-success">{{ $r->aceptado }}</span>
                                        @else
                                            <span class="label label-success">0.00</span>
                                        @endif
                                        @if ($r->no_aceptado)
                                            <span class="label label-danger">{{ $r->no_aceptado }}</span>
                                        @else
                                            <span class="label label-danger">0.00</span>
                                        @endif
                                        @if ($r->en_proceso)
                                            <span class="label label-secondary">{{ $r->en_proceso }}</span>
                                        @else
                                            <span class="label label-secondary">0.00</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $participantes = Participantes::where('reserva_id', $r->idReserva)->get();
                                        @endphp
                                        @if (count($participantes) > 0)
                                            <span class="label label-info">PARTICIPÓ EN UN VIAJE</span>
                                        @else
                                            @switch($r->estado_reserva)
                                                @case('PRÓXIMA A CUMPLIRSE')
                                                    <span class="label label-success">{{ $r->estado_reserva }}</span>
                                                @break

                                                @case('PASADOS DE FECHA')
                                                    <span class="label label-danger">{{ $r->estado_reserva }}</span>
                                                @break

                                                @case('EN PROGRAMACIÓN')
                                                    <span class="label label-primary">{{ $r->estado_reserva }}</span>
                                                @break

                                                @default
                                            @endswitch
                                        @endif


                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ route('reservas.solicitudes.devoluciones', $r->slug) }}"
                                                    title="Llenar Solicitud de de Devolución" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><i class="fas fa-file-alt"></i>
                                                </a>
                                                <a href="{{ route('reservas.pagos_restantes', $r->slug) }}"
                                                    title="Ver Información de Pagos" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('reservas.comprobante', $r->slug) }}" target="_blank"
                                                    title="Ver Comprobante" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-primary"
                                                    style="float: none;"><i class="fas fa-file-invoice"></i>
                                                </a>
                                                <a href="{{ route('paquetes.reservar.condiciones.puntualidad', $r->slug) }}"
                                                    target="_blank"
                                                    title="Ver Condiciones de Puntualidad, Riesgos y Justificaciones Médicas"
                                                    type="button" class="tabledit-delete-button btn btn-sm btn-success"
                                                    style="float: none;"><i class="fas fa-list"></i>
                                                </a>
                                                <a href="{{ route('reservas.editar', $r->slug) }}"
                                                    title="Editar Información de la Reserva" type="button"
                                                    class="tabledit-delete-button btn btn-sm btn-warning"
                                                    style="float: none;"><i class="fas fa-edit"></i>
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
