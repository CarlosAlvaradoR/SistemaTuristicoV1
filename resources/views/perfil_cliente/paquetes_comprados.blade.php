@extends('layouts/plantilla_landing')


@section('content')
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="section-top-border">
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
                                    <a id="modal-418541" href="#modal_page" role="button"
                                        class="genric-btn success small circle arrow" data-toggle="modal">Añadir Pago</a>
                                    {{-- <a href="#" class="">Añadir Pago</a>
                                    <a href="#" class="genric-btn info small circle arrow">Medium</a>
                                    <a href="#" class="genric-btn danger small circle arrow">Medium</a> --}}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="modal fade" id="modal_page" data-backdrop="static" data-keyboard="false" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        AÑADIR PAGOS RESTANTES
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form-contact contact_form" action="google  " method="post"
                                                id="contactForm" novalidate="novalidate">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Monto de Pago (S/.)</label>
                                                            <input class="form-control valid" name="name" id="name"
                                                                type="password" onfocus="this.placeholder = ''"
                                                                onblur="this.placeholder = 'Enter your name'"
                                                                placeholder="Ingrese su Contraseña Actual">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Fecha de Pago</label>
                                                            <input class="form-control valid" name="password" id="name"
                                                                type="date" onfocus="this.placeholder = ''"
                                                                onblur="this.placeholder = 'Enter your name'"
                                                                placeholder="Ingrese la contraseña nueva">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nº de Operación</label>
                                                            <input class="form-control valid" name="name" id="name"
                                                                type="password" onfocus="this.placeholder = ''"
                                                                onblur="this.placeholder = 'Enter your name'"
                                                                placeholder="Repita nuevamente la contraseña Ingresada con anterioridad">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Archivo</label>
                                                            <input class="form-control valid" name="name" id="name"
                                                                type="file" onfocus="this.placeholder = ''"
                                                                onblur="this.placeholder = 'Enter your name'"
                                                                placeholder="Repita nuevamente la contraseña Ingresada con anterioridad">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Medio de Pago</label>
                                                            <div class="search_wrap input_field">
                                                                <select style="display: inline;">
                                                                    <option data-display="...Seleccione...">...Seleccione...</option>
                                                                    <option value="1">Some option</option>
                                                                    <option value="2">Another option</option>
                                                                </select>
                                                            </div>


                                                            {{-- <input class="form-control valid" name="name" id="name"
                                                                type="password" onfocus="this.placeholder = ''"
                                                                onblur="this.placeholder = 'Enter your name'"
                                                                placeholder="Repita nuevamente la contraseña Ingresada con anterioridad"> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cerrar
                                    </button>
                                    <button type="button" class="btn btn-primary">
                                        Guardar
                                    </button>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
