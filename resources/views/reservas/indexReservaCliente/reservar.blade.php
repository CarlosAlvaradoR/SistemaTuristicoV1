@extends('layouts/plantillalanding')

@section('titulo','Detalles del Paquete')


@section('contenido')

@php
     $rutaImagen="";
    /*foreach ($paquetes as $paquete) {
       $nombrePaquete = $paquete->nombre;
       $rutaImagen="imagen/".$paquete->imagen_principal;
    }*/
@endphp
<div class="overlay">
    <img class="img-fluid" src='{{ asset($rutaImagen) }}' alt="">
</div>

<!--<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>Descripción</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                    <p>Variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                    <div class="single_destination">
                        <h4>Día-01</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                    </div>
                    <div class="single_destination">
                        <h4>Día-02</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                    </div>
                    <div class="single_destination">
                        <h4>Día-03</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                    </div>
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Reserva este paquete</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Nombres">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Cantidad de Participantes">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <textarea name="" id="" cols="30" rows="10"placeholder="Message" ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit">Reservar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-4">
                <span class="badge badge-default">Detalles del Viaje</span>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <span class="badge badge-primary">Usuario:{{Auth::user()->name}}</span>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-md-2">
                <span class="badge badge-default">Label</span>
               <div class="card">
                  <h5 class="card-header">
                     Fechas Disponibles
                  </h5>
                  <div class="card-body">
                     <p class="card-text">
                        12/12/2022
                     </p>
                     <p class="card-text">
                        12/12/2022
                     </p>
                     <p class="card-text">
                        12/12/2022
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
                <span class="badge badge-default">Label</span><br>
                <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" /><br>
                <span class="badge badge-default">Label</span>
            </div>
            <div class="col-md-7">
               <form role="form" method="GET" action="{{ route('pagar') }}">
                  <div class="form-group">
                      
                     <label for="">
                        Fecha de Reserva
                     </label><br>
                     <select class="form-control" id="exampleFormControlSelect1" style="width: 50% !important">
                        <option>12/08/2022</option>
                        <option>13/07/2022</option>
                        <option>14/07/2022</option>
                        <option>4/6/2022</option>
                        <option>5/08/2022</option>
                      </select>
                      
                  </div><br><br>
                  <div class="form-group">
                      
                     <label for="">
                        Cantidad de Participantes
                     </label>
                     <input type="text" class="form-control" id="" />
                  </div>
                  <div class="form-group">
                      
                     <label for="">
                        Cantidad de Participantes
                     </label>
                     <input type="text" class="form-control" id="" />
                     
                     <button type="button" class="form-control btn btn-info">Cotizar</button>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     Reservar
                  </button>
                  <button type="button" class="btn btn-danger">
                     Cancelar
                  </button>
               </form>
            </div>
         </div>
      </div>
    </div>
 </section>
 <!--================ Blog Area end =================-->


@endsection