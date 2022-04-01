@extends('layouts/plantilladashboard')

@section('tituloPagina','Registro de Clientes')
    
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
                            @if ($mensaje = Session::get('succes'))
                                <div class="alert alert-success alert-dismissable">
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4>
                                        MUY BIEN!
                                    </h4>Paquete insertado correctamente
                                </div>
                            @endif
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('paquetes.turisticos.creacion') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">DNI</label>
                                        <input type="text" class="form-control" name="dni" id="dni">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Nombres</label>
                                        <input type="text" class="form-control" name="nombres" id="nombres">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Género</label>
                                        <select id="inputState" name="genero" id="genero" class="form-control">
                                            <option selected>Seleccione...</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Correo</label>
                                        <input type="text" class="form-control" name="correo" id="correo">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Nacionalidad</label>
                                        <select id="inputState" name="idtipousuario" id="idtipousuario" class="form-control">
                                            <option selected>Seleccione...</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Vendedor</option>
                                        </select>
                                    </div>
                                </div>
        
                                <!--  BUTTONS-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <button type="submit" class="btn">
                                                    Aceptar
                                                </button>
                                                
                                            </div>
                                            <div class="col-md-2">
                                                
                                                <button type="button" class="btn btn-danger">
                                                    Cancelar
                                                </button>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END BUTTONS-->
                            </form>
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