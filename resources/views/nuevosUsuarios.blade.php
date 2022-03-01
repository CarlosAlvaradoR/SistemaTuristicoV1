@extends('layouts/plantilladashboard')

@section('tituloPagina','Usuarios')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Usuarios</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Usuarios</a></li>
                            <li><a href="#">Nuevos</a></li>
                            <li class="active">Registros</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card box-typical-full-height">
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Registro</h5>
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($mensaje = Session::get('succes'))
                                <div class="alert alert-dismissable alert-success">
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4>
                                        ÉXITO!
                                    </h4> <strong>Muy bien!</strong> Usuario agregado correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('usuarios.create') }}" method="POST">
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
                                <label for="inputZip">Tipo de Usuario</label>
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
                </div><!--.row-->

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection