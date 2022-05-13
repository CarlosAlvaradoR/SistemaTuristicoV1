@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

<div class="container-fluid">
    <header class="section-header">
        <div class="tbl">
            <h3>Reservas</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="#">Reservas</a></li>
                <li><a href="#">Formulario</a></li>
                <li class="active">Nuevo</li>
            </ol>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="m-t-lg with-border m-t-0">Cliente</h5>

                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label for="dni">DNI</label>
                            <input type="text" placeholder="ej:70546535" name="dni" class="form-control" id="dni">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombres">
                                Nombres
                            </label>
                            <input type="text" name="nombres"  value="Carlos Emilio" class="form-control" id="nombres"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">
                                Apellidos
                            </label>
                            <input type="text" name="apellidos" value="Alvarado Robles" class="form-control" id="apellidos"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">
                                Dirección
                            </label>
                            <input type="text" name="direccion" value="Las Manzaass" class="form-control" id="direccion"/>        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">
                                Teléfono
                            </label>
                            <input type="text" name="telefono" value="935459929" class="form-control" id="telefono"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="correo">
                                Correo
                            </label>
                            <input type="text" name="correo" value="calarador@unasam.edu.pe" class="form-control" id="correo"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="genero">
                                Género
                            </label>
                            <input type="text" name="genero" value="MASCULINO" class="form-control" id="genero"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nacionalidad">
                                Nacionalidad
                            </label>
                            <input type="text" value="PERUANO" class="form-control" name="nacionalidad" id="nacionalidad"/>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5 class="m-t-lg with-border m-t-0">Condiciones</h5>

                    <div class="form-group">
                        <div class="col-md-3 col-sm-6">
                            <div class="checkbox-bird">
                                <input type="checkbox" id="check-bird-8"/>
                                <label for="check-bird-8">Muerte</label>
                            </div>
                            <div class="checkbox-bird">
                                <input type="checkbox" id="check-bird"/>
                                <label for="check-bird">Caídas</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-lg-6">
                    <h5 class="m-t-lg with-border m-t-0">Riesgos</h5>

                    <div class="form-group">
                        <div class="col-md-3 col-sm-6">
                            <div class="checkbox-bird">
                                <input type="checkbox" id="check-bird-8"/>
                                <label for="check-bird-8">Muerte</label>
                            </div>
                            <div class="checkbox-bird">
                                <input type="checkbox" id="check-bird"/>
                                <label for="check-bird">Caídas</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5 class="m-t-lg with-border m-t-0">Salud</h5>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">    
                                    <label for="">
                                        Nº de Autorización
                                    </label>
                                    <input type="text" class="form-control" id="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputFile">
                                        Justificación Médica
                                    </label>
                                    <input type="file" class="form-control-file" id="exampleInputFile" /> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-lg-8">
                    <h5 class="m-t-lg with-border m-t-0">Pagos</h5>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">    
                                    <label for="">
                                        Paquete
                                    </label>
                                    <input type="text" class="form-control" id="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="monto">
                                        Monto
                                    </label>
                                    <input type="file" class="form-control-file" id="monto" /> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h5 class="m-t-lg with-border m-t-0">Salud</h5>

                    <div class="form-group">
                        <button type="button" class="btn btn-rounded btn-inline">Button rounded</button>
                        <button type="button" class="btn btn-rounded btn-inline" disabled>Button rounded disabled</button>
                        <a href="#" class="btn btn-rounded btn-inline">Link rounded</a>
                        <a href="#" class="btn btn-rounded btn-inline disabled">Link rounded disabled</a>
                    </div>
                </div>
            </div><!--.row-->

            <h5 class="with-border m-t-lg">Lists</h5>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Recent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Weakest</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Strongest</a>
                        </li>
                    </ul>
                </div>
            </div><!--.row-->

            <h5 class="with-border m-t-lg">Dropdown</h5>

            <div class="row">
                <div class="col-lg-6">
                    <div class="btn-group">
                        <button type="button" class="btn btn-inline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-inline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropup
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dropdown">
                        <button class="btn btn-inline dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div><!--.row-->

            <h5 class="with-border m-t-lg">Buttons group</h5>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-default-outline">Left</button>
                            <button type="button" class="btn btn-default-outline">Middle</button>
                            <button type="button" class="btn btn-default-outline">Right</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-default-outline">1</button>
                                <button type="button" class="btn btn-default-outline">2</button>
                                <button type="button" class="btn btn-default-outline">3</button>
                                <button type="button" class="btn btn-default-outline">4</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-default-outline">5</button>
                                <button type="button" class="btn btn-default-outline">6</button>
                                <button type="button" class="btn btn-default-outline">7</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-default-outline">8</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.row-->

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-default-outline">Left</button>
                            <button type="button" class="btn btn-default-outline">Middle</button>
                            <button type="button" class="btn btn-default-outline">Right</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-default-outline">Left</button>
                            <button type="button" class="btn btn-default-outline">Middle</button>
                            <button type="button" class="btn btn-default-outline">Right</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-default-outline">Left</button>
                            <button type="button" class="btn btn-default-outline">Middle</button>
                            <button type="button" class="btn btn-default-outline">Right</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-default-outline">1</button>
                            <button type="button" class="btn btn-default-outline">2</button>

                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default-outline">Action</button>
                            <button type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.row-->

            <h5 class="with-border m-t-lg">Context menu</h5>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="context-menu-one btn btn-primary">Default, right click me</button>
                        <button class="context-menu-submenus btn btn-primary">Submenu, right click me</button>
                    </div>
                </div>
            </div>

            <h5 class="with-border m-t-lg">Ladda buttons</h5>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-inline btn-primary ladda-button" data-style="expand-left"><span class="ladda-label">expand-left</span></button>

                        <button class="btn btn-inline btn-primary ladda-button" data-style="expand-right"><span class="ladda-label">expand-right</span></button>

                        <button class="btn btn-inline btn-primary ladda-button" data-style="expand-up"><span class="ladda-label">expand-up</span></button>

                        <button class="btn btn-inline btn-primary ladda-button" data-style="expand-down"><span class="ladda-label">expand-down</span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-inline btn-info ladda-button" data-style="zoom-in"><span class="ladda-label">zoom-in</span></button>

                        <button class="btn btn-inline btn-info ladda-button" data-style="zoom-out"><span class="ladda-label">zoom-out</span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-inline btn-warning ladda-button" data-style="slide-left"><span class="ladda-label">slide-left</span></button>

                        <button class="btn btn-inline btn-warning ladda-button" data-style="slide-right"><span class="ladda-label">slide-right</span></button>

                        <button class="btn btn-inline btn-warning ladda-button" data-style="slide-up"><span class="ladda-label">slide-up</span></button>

                        <button class="btn btn-inline btn-warning ladda-button" data-style="slide-down"><span class="ladda-label">slide-down</span></button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-inline btn-warning ladda-button" data-style="contract"><span class="ladda-label">contract</span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 progress-demo">
                    <h6>Built-in progress bar</h6>
                    <div class="form-group">
                        <button class="btn btn-inline btn-danger ladda-button" data-style="expand-right"><span class="ladda-label">expand-right</span></button>

                        <button class="btn btn-inline btn-danger ladda-button" data-style="expand-left"><span class="ladda-label">expand-left</span></button>

                        <button class="btn btn-inline btn-danger ladda-button" data-style="contract"><span class="ladda-label">contract</span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Sizes</h6>
                    <div class="form-group">
                        <button class="btn btn-inline btn-primary btn-lg ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">large</span></button>

                        <button class="btn btn-inline btn-primary ladda-button" data-style="expand-right" data-size="xs"><span class="ladda-label">standart</span></button>

                        <button class="btn btn-inline btn-primary btn-sm ladda-button" data-style="expand-right" data-size="s"><span class="ladda-label">small</span></button>
                    </div>
                </div>
            </div>

            <h5 class="with-border m-t-lg">Font Awesome Styled Buttons</h5>

            <div class="row">
                <div class="col-xs-12">
                    <button type="button" class="btn-square-icon">
                        <i class="fa fa-users"></i>
                        Users
                        <span class="label label-pill label-danger">2</span>
                    </button>
                    <a href="#" class="btn-square-icon">
                        <i class="fa fa-calendar"></i>
                        Calendar
                        <span class="label label-pill label-primary">124</span>
                    </a>
                    <button type="button" class="btn-square-icon">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </button>
                    <button type="button" class="btn-square-icon">
                        <i class="fa fa-comment"></i>
                        Comments
                        <span class="label label-pill label-info">5</span>
                    </button>
                    <button type="button" class="btn-square-icon">
                        <i class="fa fa-mail-forward"></i>
                        Messages
                        <span class="label label-pill label-success">11</span>
                    </button>
                    <button type="button" class="btn-square-icon">
                        <i class="fa fa-bell"></i>
                        Alarm
                        <span class="label label-pill label-warning">5</span>
                    </button>
                </div>
                <div class="col-xs-12">
                    <button type="button" class="btn-square-icon btn-square-icon-rounded">
                        <i class="fa fa-users"></i>
                        Users
                        <span class="label label-pill label-danger">2</span>
                    </button>
                    <a href="#" class="btn-square-icon">
                        <i class="fa fa-calendar"></i>
                        Calendar
                        <span class="label label-pill label-primary">124</span>
                    </a>
                    <button type="button" class="btn-square-icon btn-square-icon-rounded">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </button>
                    <button type="button" class="btn-square-icon btn-square-icon-rounded">
                        <i class="fa fa-comment"></i>
                        Comments
                        <span class="label label-pill label-info">5</span>
                    </button>
                    <button type="button" class="btn-square-icon btn-square-icon-rounded">
                        <i class="fa fa-mail-forward"></i>
                        Messages
                        <span class="label label-pill label-success">11</span>
                    </button>
                    <button type="button" class="btn-square-icon btn-square-icon-rounded">
                        <i class="fa fa-bell"></i>
                        Alarm
                        <span class="label label-pill label-warning">5</span>
                    </button>
                </div>
            </div><!--.row-->

        </div>
    </section>
</div><!--.container-fluid-->

<!--
http://www.forosdelweb.com/f13/obtener-solo-valor-tr-con-onclick-1004289/
-->
    
@endsection



@section('scripts')
    <script>
       
    </script>
@endsection