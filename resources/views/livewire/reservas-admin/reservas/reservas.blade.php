<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-list"></i> Lista de Todas las Reservas</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" wire:model="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="limp" wire:model="estado_pagos" id="estado_pagos">
                                <option value="">...Est de Pago...</option>
                                <option value="PAGO COMPLETADO">PAGO COMPLETADO</option>
                                <option value="EN PROCESO">EN PROCESO</option>
                                <option value="PENDIENTE DE PAGO">PENDIENTE DE PAGO</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="limp" wire:model="estado_cumplimiento" id="estado_cumplimiento">
                                <option value="">...Est. de Cumplimiento ...</option>
                                <option value="PRÓXIMA A CUMPLIRSE">PRÓXIMA A CUMPLIRSE</option>
                                <option value="EN PROGRAMACIÓN">EN PROGRAMACIÓN</option>
                                <option value="PASADOS DE FECHA">PASADOS DE FECHA</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="limp" wire:model="cant" id="cant">
                                <option value="20">Mostrar 20</option>
                                <option value="50">Mostrar 50</option>
                                <option value="100">Mostrar 100</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button title="Limpiar"wire:click="resetUI" class="btn btn-sm btn-rounded"><i
                                    class="fas fa-trash-restore-alt"></i></button>
                        </div>
                    </div>
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
                    {{ $reservas->links() }}
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            //alert('AAA');
            $("#limpiar").click(function() {
                //$('#limp').val('-1');
                $("#limp option[value='']").attr("selected",true);
                // $("#limp option[value='PAGO COMPLETADO']").attr("selected",true);
                // $("#limp option[value='PAGO COMPLETADO']").attr("selected",true);
                // $("#limp option[value='PAGO COMPLETADO']").attr("selected",true);
            });
        })
    </script>
</div>
