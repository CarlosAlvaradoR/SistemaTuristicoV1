@extends('layouts/plantillalanding')

@section('titulo','Detalles del Paquete')


@section('contenido')

@php
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
                                             <img class="d-block w-100" alt="Carousel Bootstrap First" src="{{ asset('imagen/'.$galeria->imagen) }}" />
                                                <div class="carousel-caption">
                                                   
                                                </div>
                                          </div>
                                       @else
                                          <div class="carousel-item"> <!-- { asset('imagen/'.$galeria->imagen) }}-->
                                             <img class="d-block w-100" alt="Carousel Bootstrap First" src="{{ asset('imagen/'.$galeria->imagen) }}" />
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
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Carousel Bootstrap First" src="https://ecosistemas.ovacen.com/wp-content/uploads/2018/01/bosque.jpg" />
                                        <div class="carousel-caption">
                                            
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Carousel Bootstrap Second" src="data:image/webp;base64,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" />
                                        <div class="carousel-caption">
                                            
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://s1.eestatic.com/2019/02/19/actualidad/actualidad_377474872_130463278_1024x576.jpg" />
                                        <div class="carousel-caption">
                                            
                                        </div>
                                    </div>
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
                   <h4 class="widget_title">Lugares de Visita</h4>
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
                    <h4 class="widget_title">Itinerario</h4>
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
                    <h3 class="widget_title">Alimentación en el campo</h3>
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
                    <h3 class="widget_title">Acémilas</h3>
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
                      <img src="{{ asset('scriptslanding/img/post/post_1.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>From life was you fish...</h3>
                         </a>
                         <p>January 12, 2019</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{{ asset('scriptslanding/img/post/post_2.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>The Amazing Hubble</h3>
                         </a>
                         <p>02 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{{ asset('scriptslanding/img/post/post_3.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Astronomy Or Astrology</h3>
                         </a>
                         <p>03 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="{{ asset('scriptslanding/img/post/post_4.png') }}" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Asteroids telescope</h3>
                         </a>
                         <p>01 Hours ago</p>
                      </div>
                   </div>
                </aside>-->
                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Categoría de Hoteles</h3>
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
                            onblur="this.placeholder = 'Ingresa tu correo'" placeholder='Enter email' required>
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