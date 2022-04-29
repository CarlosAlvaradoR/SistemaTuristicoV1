@extends('layouts/plantillalanding')

@section('titulo','Detalles del Paquete')


@section('contenido')

@php
     $rutaImagen="";
    foreach ($paquetes as $paquete) {
       $nombrePaquete = $paquete->nombre;
       $rutaImagen="imagen/".$paquete->imagen_principal;
    }
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
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <!--<img class="img-fluid" src="https://www.peru.travel/Contenido/Atractivo/Imagen/es/15/1.1/Principal/Centro%20Historico%20de%20Trujillo.jpg" 
                        alt="">-->
                </div>
                <div class="blog_details">
                   <h2>Paquete Viaje a Huaraz
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Visita Huaraz</a></li>
                   </ul>
                   <p class="excert">
                    Una estadía que le ofrece las mejores disposiciones, y le ofrece una buena estadía.
                    </p>
                </div>
             </div>

             @php
                 foreach ($cantidadGalerias as $cantidadGaleria) {
                    $totalGalerias=$cantidadGaleria->cantidad;
                 }
                 
             @endphp
             <div class="single-post">
                <!--<div class="feature-img">
                   <img class="img-fluid" src="https://www.peru.travel/Contenido/Atractivo/Imagen/es/15/1.1/Principal/Centro%20Historico%20de%20Trujillo.jpg" 
                        alt="">
                </div>-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel slide" id="carousel-109306">
                               
                                <ol class="carousel-indicators">
                                    @for ($i = 0; $i < $totalGalerias; $i++)
                                       @if ($i == 0)
                                          <li data-slide-to="@php
                                                   echo $i;
                                                @endphp" data-target="#carousel-109306" class="active">
                                          </li>
                                       
                                       @else
                                          <li data-slide-to="@php
                                             echo $i;
                                          @endphp" data-target="#carousel-109306">
                                          </li>    
                                       @endif
                                       
                                    @endfor
                                </ol>
                                <div class="carousel-inner">
                                   @php
                                       $cont=1;
                                   @endphp
                                   @foreach ($galeriaFotos as $galeria)
                                       
                                       @if ($cont==1)
                                          <div class="carousel-item active"> <!-- -->
                                             <img class="d-block w-100" alt="Galería" 
                                                   src="{{ asset('imagen/'.$galeria->imagen) }}" width="300" height="430" />
                                                <div class="carousel-caption">
                                                   
                                                </div>
                                          </div>
                                       @else
                                          <div class="carousel-item"> <!-- { asset('imagen/'.$galeria->imagen) }}-->
                                             <img class="d-block w-100" alt="Galería" 
                                                   src="{{ asset('imagen/'.$galeria->imagen) }}" width="300" height="430"/>
                                                <div class="carousel-caption">
                                                   
                                                </div>
                                          </div>
                                       @endif
                                       @php
                                           $cont++;
                                       @endphp
                                   @endforeach
                                    
                                    
                                </div> <a class="carousel-control-prev" href="#carousel-109306" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-109306" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog_details">
                   <h2>Galería
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Paquete Turístico - Gaería de Fotos</a></li>
                      
                   </ul>
                    <p class="excert">
                    Unas breves fotografías de lo que podrá visualizar en su estadía, por los lugares que le ofrecemos.
                    </p>
                </div>
             </div>



             <div class="single-post">
                <!--<div class="feature-img">
                   <img class="img-fluid" src="https://www.peru.travel/Contenido/Atractivo/Imagen/es/15/1.1/Principal/Centro%20Historico%20de%20Trujillo.jpg" 
                        alt="">
                </div>-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel slide" id="carrucelMapa">
                                <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carrucelMapa">
                                    </li>
                                    <li data-slide-to="1" data-target="#carrucelMapa">
                                    </li>
                                    <li data-slide-to="2" data-target="#carrucelMapa" class="active">
                                    </li>
                                    
                                </ol>
                                <div class="carousel-inner">
                                   @foreach ($mapaReferencias as $mapa)
                                       <div class="carousel-item active">
                                             <img class="d-block w-100" alt="Carousel Bootstrap First" src="{{ asset('imagen/'.$mapa->imagen_ruta) }}" />
                                             <div class="carousel-caption">
                                                   
                                             </div>
                                       </div>
                                   @endforeach
                                    
                                </div> <a class="carousel-control-prev" href="#carrucelMapa" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carrucelMapa" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog_details">
                   <h2>Mapa
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Paquete Turístico - Mapa de Viaje</a></li>
                      
                   </ul>
                   <p class="excert">
                    Durante el viaje usted podrá pasar por estos maravillosos lugares.
                    </p>
                </div>
             </div>




             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle">
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                      <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                   </ul>
                </div>
                <div class="navigation-area">
                   <div class="row">
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         
                         <div class="detials">
                            <!--<p>Prev Post</p>-->
                            <a href="#!">
                               <h4>Almuerzos de Celebración</h4>
                            </a>
                         </div>
                      </div>
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <!--<div class="detials">
                            <p>Next Post</p>
                            <a href="#">
                               <h4>Telescopes 101</h4>
                            </a>
                         </div>-->
                         <!--<div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>-->
                         <div class="thumb">
                            <a href="#!">
                               <img class="img-fluid" src="{{ asset('scriptslanding/img/post/next.png') }}" alt="">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="blog-author">
                <div class="media align-items-center">
                   <img src="https://previews.123rf.com/images/fahrwasser/fahrwasser1805/fahrwasser180500010/101109175-taz%C3%B3n-de-almuerzo-saludable-con-pollo-a-la-parrilla.jpg" alt="">
                   <div class="media-body">
                      @foreach ($almuerzos as $almuerzo)
                        <a href="#">
                           <h4>{{$almuerzo->observacion}}</h4>
                        </a>
                        <br>
                      @endforeach
                   </div>
                </div>
             </div>
             
             <div class="comments-area">
                <h4>Tipos de Transporte</h4>
                
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="https://www.revistaautocrash.com/wp-content/uploads/2016/07/Edicion-38/Pesados/Pesados-buses.jpg" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                                Los tipos de Vehículo que se van a usar son las siguientes:
                                 <div class="media-body">
                                    @foreach ($transportesPaquetes as $transporte)
                                    <a href="#">
                                       <h4>{{$transporte->nombretipo}}</h4>
                                    </a>
                                    @endforeach
                                 </div>
                            </p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>

             <!--<div class="comments-area">
                <h4>05 Comments</h4>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="{{ asset('img/comment/comment_1.png') }}" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            
                         </div>
                      </div>
                   </div>
                </div>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="{{ asset('scriptslanding/img/comment/comment_2.png') }}" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img src="{{ asset('scriptslanding/img/comment/comment_3.png') }}" alt="">
                         </div>
                         <div class="desc">
                            <p class="comment">
                               Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                               Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                  <h5>
                                     <a href="#">Emilly Blunt</a>
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm </p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">reply</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>-->
             <div class="comment-form">
                <h4>Reserva este paquete</h4>
                <form class="form-contact comment_form" action="#" id="commentForm">
                   <!--<div class="row">
                      <div class="col-12">
                         <div class="form-group">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                               placeholder="Write Comment"></textarea>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                         </div>
                      </div>
                      <div class="col-12">
                         <div class="form-group">
                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                         </div>
                      </div>
                   </div>-->
                   <div class="form-group">
                      <button type="submit" class="button button-contactForm btn_1 boxed-btn">Reservar</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <!--<aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                            <div class="input-group-append">
                               <button class="btn" type="button"><i class="ti-search"></i></button>
                            </div>
                         </div>
                      </div>
                      <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                         type="submit">Search</button>
                   </form>
                </aside>-->
                <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title"><i class="fa fa-map"></i> Lugares de Visita</h4>
                   <ul class="list cat-list">
                      <li>
                         @foreach ($lugasresVisita as $lugares)
                         <a href="#" class="d-flex">
                           <p>{{$lugares->descripcion}}</p>
                           
                        </a>  
                         @endforeach
                         
                      </li>
                   </ul>
                </aside>
                <aside class="single_sidebar_widget post_category_widget">
                    <h4 class="widget_title"><i class="fa fa-list"></i> Itinerario</h4>
                    <ul class="list cat-list">
                       <li>
                          @foreach ($itinerarios as $itinerario)
                           <a href="#!" class="d-flex">
                              <p>{{$itinerario->descripcion}}</p>
                           </a>
                          @endforeach
                          
                       </li>
                    </ul>
                </aside>
                
                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title"><i class="fa fa-cheese"></i> Alimentación en el campo</h3>
                    <div class="media post_item">
                       
                       <div class="media-body">
                          @foreach ($alimentacionCampo as $alimentacion)
                              <a href="#!">
                                 <h3>{{$alimentacion->descripcion}}</h3>
                              </a>
                          @endforeach
                          
                          <!--<p>Tipo Nutritiva</p>-->
                       </div>
                    </div>
                </aside>

                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Equipos</h3>
                    <div class="media post_item">
                       
                       <div class="media-body">
                          @foreach ($equipos as $equipo)
                          <a href="#!">
                              <h3>{{$equipo->nombre}}</h3>
                           </a>
                           <p>O{{$equipo->observacion}}</p>    
                          @endforeach
                          
                       </div>
                    </div>
                </aside>
                
                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title"><i class="fa fa-horse"></i> Acémilas</h3>
                    <div class="media post_item">
                       
                       <div class="media-body">
                          
                             @foreach ($acemilas as $acemila)
                                 <a href="#">
                                       <h3>{{$acemila->nombre}}</h3>
                                 </a>
                             @endforeach
                          
                       </div>
                    </div>
                </aside>


                <!--<aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Recent Post</h3>
                   <div class="media post_item">
                      <img src="{ asset('scriptslanding/img/post/post_1.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>From life was you fish...</h3>
                         </a>
                         <p>January 12, 2019</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{ asset('scriptslanding/img/post/post_2.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>The Amazing Hubble</h3>
                         </a>
                         <p>02 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{ asset('scriptslanding/img/post/post_3.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Astronomy Or Astrology</h3>
                         </a>
                         <p>03 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{ asset('scriptslanding/img/post/post_4.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Asteroids telescope</h3>
                         </a>
                         <p>01 Hours ago</p>
                      </div>
                   </div>
                </aside>-->
                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title"><i class="fa fa-bed" aria-hidden="true"></i> Categoría de Hoteles</h3>
                    <div class="media post_item">
                       <!--<img src="{ asset('scriptslanding/img/post/post_1.png') }}" alt="post">-->
                       @foreach ($categoriasHoteles as $categoria)
                           <div class="media-body">
                                 <a href="#">
                                    <h3>- {{$categoria->descripcion}}</h3>
                                 </a>
                                 <!--<p>January 12, 2019</p>-->
                           </div>
                           <br>  
                       @endforeach
                       
                    </div>
                 </aside>
                <!--<aside class="single_sidebar_widget tag_cloud_widget">
                   <h4 class="widget_title">Tag Clouds</h4>
                   <ul class="list">
                      <li>
                         <a href="#">project</a>
                      </li>
                      <li>
                         <a href="#">love</a>
                      </li>
                      <li>
                         <a href="#">technology</a>
                      </li>
                      <li>
                         <a href="#">travel</a>
                      </li>
                      <li>
                         <a href="#">restaurant</a>
                      </li>
                      <li>
                         <a href="#">life style</a>
                      </li>
                      <li>
                         <a href="#">design</a>
                      </li>
                      <li>
                         <a href="#">illustration</a>
                      </li>
                   </ul>
                </aside>-->
                <!--<aside class="single_sidebar_widget instagram_feeds">
                   <h4 class="widget_title">Instagram Feeds</h4>
                   <ul class="instagram_row flex-wrap">
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/img/post/post_5.png') }}" alt="">
                         </a>
                      </li>
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/img/post/post_6.png') }}" alt="">
                         </a>
                      </li>
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/mg/post/post_7.png') }}" alt="">
                         </a>
                      </li>
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/img/post/post_8.png') }}" alt="">
                         </a>
                      </li>
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/img/post/post_9.png') }}" alt="">
                         </a>
                      </li>
                      <li>
                         <a href="#">
                            <img class="img-fluid" src="{{ asset('scriptslanding/img/post/post_10.png') }}" alt="">
                         </a>
                      </li>
                   </ul>
                </aside>-->
                <aside class="single_sidebar_widget newsletter_widget">
                   <h4 class="widget_title">Newsletter</h4>
                   <form action="#">
                      <div class="form-group">
                         <input type="email" class="form-control" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Ingresa tu correo'" placeholder='Ingresa tu email' required>
                      </div>
                      <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                         type="submit">Suscríbete a nuetro Newsletter</button>
                   </form>
                </aside>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--================ Blog Area end =================-->


@endsection