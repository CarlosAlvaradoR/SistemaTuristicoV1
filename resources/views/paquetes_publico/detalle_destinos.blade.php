@extends('layouts/plantilla_landing')

@section('content')
    <!-- header-end -->
    <div class="overlay">
        <img src="{{ asset('/' . $paquete->imagen_principal) }}" alt="Image" width="1348" height="800">
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info">
                        <h3>Galería</h3>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="carousel slide" id="carousel-207838">
                                        <ol class="carousel-indicators">
                                            <li data-slide-to="0" data-target="#carousel-207838" class="active">
                                            </li>
                                            <li data-slide-to="1" data-target="#carousel-207838">
                                            </li>
                                            <li data-slide-to="2" data-target="#carousel-207838">
                                            </li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" alt="Carousel Bootstrap First"
                                                    src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg" />
                                                <div class="carousel-caption">
                                                    <h4>
                                                        First Thumbnail label
                                                    </h4>
                                                    <p>
                                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec
                                                        id elit non mi porta gravida at eget metus. Nullam id dolor id nibh
                                                        ultricies vehicula ut id elit.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" alt="Carousel Bootstrap Second"
                                                    src="https://www.layoutit.com/img/sports-q-c-1600-500-2.jpg" />
                                                <div class="carousel-caption">
                                                    <h4>
                                                        Second Thumbnail label
                                                    </h4>
                                                    <p>
                                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec
                                                        id elit non mi porta gravida at eget metus. Nullam id dolor id nibh
                                                        ultricies vehicula ut id elit.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" alt="Carousel Bootstrap Third"
                                                    src="https://www.layoutit.com/img/sports-q-c-1600-500-3.jpg" />
                                                <div class="carousel-caption">
                                                    <h4>
                                                        Third Thumbnail label
                                                    </h4>
                                                    <p>
                                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec
                                                        id elit non mi porta gravida at eget metus. Nullam id dolor id nibh
                                                        ultricies vehicula ut id elit.
                                                    </p>
                                                </div>
                                            </div>
                                        </div> <a class="carousel-control-prev" href="#carousel-207838"
                                            data-slide="prev"><span class="carousel-control-prev-icon"></span> <span
                                                class="sr-only">Previous</span></a> <a class="carousel-control-next"
                                            href="#carousel-207838" data-slide="next"><span
                                                class="carousel-control-next-icon"></span> <span
                                                class="sr-only">Next</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="destination_info">
                        <h3>Mapa</h3>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <img alt="Bootstrap Image Preview"
                                        src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="destination_info">
                        <h3>Lugares de Visita</h3>
                        <p>Lugares a Visitar durante los viajes</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Itinerario</h3>
                        <p>Lista de Actividades a Realizar durante los Viajes</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Pagos por Servicio</h3>
                        <p>Lista de Pagos por servicio</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Categoría de Hoteles</h3>
                        <p>Lista de Categoría de Hoteles</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Personal Acompañante</h3>
                        <p>Tipos de Personal Acompañante</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        <dt>
                                            Description lists
                                        </dt>
                                        <dd>
                                            A description list is perfect for defining terms.
                                        </dd>
                                        <dt>
                                            Euismod
                                        </dt>
                                        <dd>
                                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                        </dd>
                                        <dd>
                                            Donec id elit non mi porta gravida at eget metus.
                                        </dd>
                                        <dt>
                                            Malesuada porta
                                        </dt>
                                        <dd>
                                            Etiam porta sem malesuada magna mollis euismod.
                                        </dd>
                                        <dt>
                                            Felis euismod semper eget lacinia
                                        </dt>
                                        <dd>
                                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                            fermentum massa justo sit amet risus.
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Transporte</h3>
                        <p>Tipos de Transporte para los Viajes</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        <dt>
                                            Description lists
                                        </dt>
                                        <dd>
                                            A description list is perfect for defining terms.
                                        </dd>
                                        <dt>
                                            Euismod
                                        </dt>
                                        <dd>
                                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                        </dd>
                                        <dd>
                                            Donec id elit non mi porta gravida at eget metus.
                                        </dd>
                                        <dt>
                                            Malesuada porta
                                        </dt>
                                        <dd>
                                            Etiam porta sem malesuada magna mollis euismod.
                                        </dd>
                                        <dt>
                                            Felis euismod semper eget lacinia
                                        </dt>
                                        <dd>
                                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                            fermentum massa justo sit amet risus.
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Alimentación en campo</h3>
                        <p>Alimentación en el Campo</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        <dt>
                                            Description lists
                                        </dt>
                                        <dd>
                                            A description list is perfect for defining terms.
                                        </dd>
                                        <dt>
                                            Euismod
                                        </dt>
                                        <dd>
                                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                        </dd>
                                        <dd>
                                            Donec id elit non mi porta gravida at eget metus.
                                        </dd>
                                        <dt>
                                            Malesuada porta
                                        </dt>
                                        <dd>
                                            Etiam porta sem malesuada magna mollis euismod.
                                        </dd>
                                        <dt>
                                            Felis euismod semper eget lacinia
                                        </dt>
                                        <dd>
                                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                            fermentum massa justo sit amet risus.
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="destination_info">
                        <h3>Equipos</h3>
                        <p>Lista de Equipos Promedio por Viaje</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Acémilas</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                            anything embarrassing.</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="destination_info">
                        <h3>Almuerzos de Celebración</h3>
                        <p>Tipos de Almuerzo Ofrecidos</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <dl>
                                        <dt>
                                            Description lists
                                        </dt>
                                        <dd>
                                            A description list is perfect for defining terms.
                                        </dd>
                                        <dt>
                                            Euismod
                                        </dt>
                                        <dd>
                                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                        </dd>
                                        <dd>
                                            Donec id elit non mi porta gravida at eget metus.
                                        </dd>
                                        <dt>
                                            Malesuada porta
                                        </dt>
                                        <dd>
                                            Etiam porta sem malesuada magna mollis euismod.
                                        </dd>
                                        <dt>
                                            Felis euismod semper eget lacinia
                                        </dt>
                                        <dd>
                                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                            fermentum massa justo sit amet risus.
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bordered_1px"></div>
                    <div class="contact_join">
                            <!--<h3>Contact for join</h3>-->
                            <form action="#">
                                <div class="row">
                                    <!--<div class="col-lg-6 col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Phone no.">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_input">
                                            <textarea name="" id="" cols="30" rows="10"placeholder="Message"></textarea>
                                        </div>
                                    </div>-->
                                    <div class="col-lg-12">
                                            <a href="{{ route('reservar.formulario.publico', $paquete) }}" class="boxed-btn4">
                                                Reservar
                                            </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- newletter_area_start  -->
    <!--<div class="newletter_area overlay">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="newsletter_text">
                                    <h4>Subscribe Our Newsletter</h4>
                                    <p>Subscribe newsletter to get offers and about
                                        new places to discover.</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mail_form">
                                    <div class="row no-gutters">
                                        <div class="col-lg-9 col-md-8">
                                            <div class="newsletter_field">
                                                <input type="email" placeholder="Your mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="newsletter_btn">
                                                <button class="boxed-btn4 " type="submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    <!-- newletter_area_end  -->
@endsection
