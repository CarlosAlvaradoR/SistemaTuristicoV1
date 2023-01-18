@extends('layouts/plantilla_landing')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>elements</h3>
                        <p>Pixel perfect design with awesome contents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container box_1170">
            <h3 class="text-heading">Text Sample</h3>
            <div class="comment-form">
                <h4>Datos de la Reserva</h4>
                <div class="form-contact comment_form" action="#" id="commentForm">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control" name="fecha_reserva" id="fecha_reserva" type="date"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control" disabled name="monto_real" id="monto_real" type="text"
                                    placeholder="Monto del Paquete">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="observacion_reserva" id="observacion_reserva" cols="30" rows="3"
                                    placeholder="Ingrese Observación"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <h4>Pago</h4>
                <div class="form-contact comment_form" action="#" id="commentForm">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control" name="pago_reserva" id="pago_reserva" type="text"
                                    placeholder="Ingrese el Monto del Pago en S/.">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control" name="numero_operacion" id="numero_operacion" type="text"
                                    placeholder="Ingrese el Nº de Operación">
                                <h6 class="text-danger">Es obligatorio el Nº de Operación</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="archivo_pago" id="archivo_pago" type="file"
                                    placeholder="Monto del Paquete">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Pago</label>
                                <br>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected>---Seleccione---</option>
                                    <option>YAPE</option>
                                    <option>BCP</option>
                                    <option>PLIN</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sample Area -->
@endsection
