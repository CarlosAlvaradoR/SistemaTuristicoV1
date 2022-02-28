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
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">DNI</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Nombres</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Apellidos</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Género</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Dirección</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Teléfono</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Correo</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                    </form>
                </div><!--.row-->

                <h5 class="with-border m-t-lg">Opciones</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                
                                <button type="button" onclick="alert('Botón Aceptar')" class="btn btn-primary">
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
            </div>
        </section>
    </div><!--.container-fluid-->
@endsection