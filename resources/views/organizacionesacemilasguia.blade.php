@extends('layouts/plantilladashboard')

@section('tituloPagina','Permisos de Usuarios')
    
@section('contenido')
<div class="container-fluid">
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>Usuarios</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">Usuarios</a></li>
                        <li><a href="#">Permisos</a></li>
                        <li class="active">Registros</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    
    <!-- USO DE TABS PARA LA ASCIACIONES Y ACÉMILAS -->
    <section class="tabs-section">
        <div class="tabs-section-nav tabs-section-nav-icons">
            <div class="tbl">
                <ul class="nav" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                            <span class="nav-link-in">
                                <i class="font-icon font-icon-cogwheel"></i>
                                Acémilas
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
                            <span class="nav-link-in">
                                <span class="glyphicon glyphicon-music"></span>
                                Organizaciones
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-1-tab-3" role="tab" data-toggle="tab">
                            <span class="nav-link-in">
                                <i class="fa fa-product-hunt"></i>
                                Guía
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div><!--.tabs-section-nav-->

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                
                                <button type="button" onclick="alert('button')" class="btn btn-primary">
                                    Nuevo
                                </button>
                            </div>
                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Payment Taken
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Default
                                    </td>
                                </tr>
                                <tr class="table-active">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Approved
                                    </td>
                                </tr>
                                <tr class="table-success">
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        02/04/2012
                                    </td>
                                    <td>
                                        Declined
                                    </td>
                                </tr>
                                <tr class="table-warning">
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        03/04/2012
                                    </td>
                                    <td>
                                        Pending
                                    </td>
                                </tr>
                                <tr class="table-danger">
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        04/04/2012
                                    </td>
                                    <td>
                                        Call in to confirm
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-2">
                                    
                                    <button type="button" class="btn btn-primary">
                                        Nuevo
                                    </button>
                                </div>
                            </div>
                            <br>    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                            Payment Taken
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                        <td>
                                            01/04/2012
                                        </td>
                                        <td>
                                            Default
                                        </td>
                                    </tr>
                                    <tr class="table-active">
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                        <td>
                                            01/04/2012
                                        </td>
                                        <td>
                                            Approved
                                        </td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                        <td>
                                            02/04/2012
                                        </td>
                                        <td>
                                            Declined
                                        </td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                        <td>
                                            03/04/2012
                                        </td>
                                        <td>
                                            Pending
                                        </td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                        <td>
                                            04/04/2012
                                        </td>
                                        <td>
                                            Call in to confirm
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-3">Tab 3</div><!--.tab-pane-->
            
        </div><!--.tab-content-->
    </section><!--.tabs-section-->
    <!-- TERMINO DE TABS PARA ASPCIACIONES Y ACÉMILAS-->



</div><!--.container-fluid-->  
@endsection