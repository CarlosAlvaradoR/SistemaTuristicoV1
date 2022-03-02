@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')
    <div class="container-fluid">
        <section class="card card-blue-fill">
            <header class="card-header">
                Formulario de Nuevos Paquetes Turísticos
                <button type="button" class="modal-close">
                    <i class="font-icon-close-2"></i>
                </button>
            </header>
            <div class="card-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form">
                                        <div class="form-group">
                                             
                                            <label for="exampleInputEmail1">
                                                Nombre del Paquete
                                            </label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" />
                                        </div>
                                        <div class="form-group">
                                             
                                            <label for="exampleInputPassword1">
                                                Monto del Paquete
                                            </label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" />
                                        </div>
                                        <div class="form-group">
                                             
                                            <label for="exampleInputPassword1">
                                                Estado del Paquete
                                            </label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" />
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form role="form">
                                        
                                        <div class="form-group">
                                             
                                            <label for="exampleInputFile">
                                                Imagen Principal
                                            </label>
                                            <input type="file" class="form-control-file" id="exampleInputFile" />
                                            <br><br><br>
                                            <hr>
                                            <div>
                                                <button type="button" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    Cancelar
                                                </button>
                                            </div> 
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<section class="card">
            <header class="card-header">
                Panel title
                <button type="button" class="modal-close">
                    <i class="font-icon-close-2"></i>
                </button>
            </header>
            <div class="card-block">
                <p class="card-text">Panel content</p>
            </div>
        </section>-->

        
    </div><!--.container-fluid-->
@endsection