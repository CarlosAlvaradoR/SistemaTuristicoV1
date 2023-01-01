@extends('layouts/plantilladashboard')


@section('contenido')
    <header class="page-content-header">
        <div class="container-fluid">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Paquetes Disponibles <small class="text-muted">23 Paquetes</small></h3>
                    </div>
                    <div class="tbl-cell tbl-cell-action">
                        <a href="{{ route('paquetes.create') }}" class="btn btn-rounded">Nuevo Paquete</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--.page-content-header-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-10">

                        <input type="text" class="form-control" wire:keydown.enter="buscar" wire:model.defer="dni"
                            placeholder="Ingrese DNI del cliente">
                    </div>
                    <div class="col-md-2">

                        <button type="button" wire:click="buscar" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="alert alert-primary" role="alert">
                Cliente no encontrado ? <a href="{{ route('paquetes.reservar.crear_cliente') }}" class="alert-link">Crea uno
                    aquí</a>.
            </div>
        </div>
        <br>
        <div class="box-typical box-typical-padding">

            <h5 class="m-t-lg with-border">Cliente Encontrado</h5>

            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleInput">Nombres y Apellidos</label>
                        <input type="text" readonly value="Carlos Emilio Alvarado Robles" class="form-control"
                            id="exampleInput" placeholder="First Name">
                        <!--<small class="text-muted text-danger">We'll never share your email with anyone else.</small> -->
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Email</label>
                        <input type="email" readonly value="calvarador@unasam.edu.pe" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter email" value="mail@mail.com">
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Genero</label>
                        <input readonly type="text" value="Masculino" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </fieldset>
                </div>
            </div>
            <!--.row-->


            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputDisabled">Nacionalidad</label>
                        <input type="email" value="Argentino" class="form-control" id="exampleInputDisabled"
                            placeholder="First Name" disabled>
                    </fieldset>
                </div>
                <div class="col-md-4 col-sm-6">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputDisabled2">Paquete</label>
                        <select id="inputState" class="form-control">
                            <option selected>Seleccione</option>
                            <option>Semana Santa</option>
                            <option>Santa Ana</option>
                            <option>Semana Santa</option>
                            <option>Semana Santa</option>
                            <option>Semana Santa</option>
                            <option>Semana Santa</option>
                            <option>Semana Santa</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-4 col-sm-6">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputError">Viajes</label>
                        <select id="inputState" class="form-control">
                            <option selected>Seleccione</option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                            <option>Semana Santa - 12/12/2022 </option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <!--.row-->

            <div>
                <button class="btn btn-primary">Reservar</button>
            </div>


        </div>
        <!--.box-typical-->

    </div>
    <!--.container-fluid-->
@endsection
