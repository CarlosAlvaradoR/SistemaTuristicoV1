<div>
    <section>
        <div class="container box_1170">
            <div>
                <h3 class="mb-30">Mis compras</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PAQUETE</th>
                            <th scope="col">Fecha Reservada</th>
                            <th scope="col">Estado</th>
                            <th scope="col">MONTO PAGADO (S/.)</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paquetes_comprados as $p)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $p->nombre }}</td>
                                <td>{{ $p->fecha_reserva }}</td>
                                <td>{{ $p->nombre_estado }}</td>
                                <td>{{ $p->pago }}</td>
                                <td>
                                    <button wire:click="addPayment('{{ $p->slug }}')"
                                        class="genric-btn success small circle arrow">Añadir
                                        Pago</button>
                                    <a href="{{ route('reservas.solicitudes.devoluciones', $p->slug) }}" target="_blank"
                                        class="genric-btn success small circle arrow">Solicitar Devolución</a>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <div wire:ignore.self class="modal fade" id="modal_page" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="monto">Monto de Pago (S/.)</label>
                                            <input class="form-control valid" name="monto" id="monto"
                                                type="text" wire:model.defer="monto"
                                                placeholder="Ingrese el Monto de Pago">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="fecha_pago">Fecha de Pago</label>
                                            <input class="form-control valid" name="fecha_pago" id="fecha_pago"
                                                type="date" wire:model.defer="fecha_pago"
                                                placeholder="Ingrese la Fecha de Pago">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="numero_de_operacion">Nº de Operación</label>
                                            <input class="form-control valid" name="numero_de_operacion"
                                                id="numero_de_operacion" type="text"
                                                wire:model.defer="numero_de_operacion"
                                                placeholder="Ingrese el Nº de Operación de la Transferencia">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ruta_archivo_pago">Archivo</label>
                                            <input class="form-control valid" name="ruta_archivo_pago"
                                                id="ruta_archivo_pago" type="file"
                                                wire:model.defer="ruta_archivo_pago"
                                                placeholder="Ingrese el Archivo de Pago Realizado">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Medio de Pago</label>
                                            <input type="text" readonly class="form-control valid"
                                                wire:model="forma_de_pago">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="ruta_archivo_pago" class="font-weight-bold">Seleccione el Medio
                                            de Pago con el
                                            que pagó</label>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Banco - Nº De Cuenta</th>
                                                    <th scope="col">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $cont = 1;
                                                @endphp
                                                @foreach ($tipo_pagos as $tp)
                                                    <tr>
                                                        <th scope="row">{{ $cont++ }}</th>
                                                        <td>[{{ $tp->nombre_tipo_pago }} -
                                                            {{ $tp->numero_cuenta }}]</td>
                                                        <td>
                                                            <button id="view"
                                                                wire:click="select({{ $tp->id }})"
                                                                wire:loading.attr="disabled" title="Seleccionar"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fa fa-mouse-pointer"></i>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="button" wire:click="savePayment" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal', msg => {
                $('#modal_page').modal('show')
            });
            window.livewire.on('close-modal', msg => {
                $('#modal_page').modal('hide')
            });
        });
    </script>
</div>
