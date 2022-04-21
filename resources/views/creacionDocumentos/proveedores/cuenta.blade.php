@extends('layouts/plantilladashboard')

@section('tituloPagina','Cuenta de Proveedores')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Proveedores</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="">Proveedores</a></li>
                            <!--<li><a href="{ route('paquetes.detalles', 2) }}">Reserva</a></li>-->
                            <li class="active">Cuenta</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Proveedor: Santa Catalina</h5>
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
                                    </h4> <strong>Muy bien!</strong> Atractivo de Visita agregado correctamente.
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                         <span class="badge badge-default">Bancos</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Lista de Bancos
                                                    </th>
                                                    <th>
                                                        Cuenta
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        BCP
                                                    </td>
                                                    <td>

                                                        <input type="text" value="" placeholder="ej: 883373737" class="form-control" id="exampleInputPassword1" />
                                                            
                                                      
                                                    </td>
                                                    <td>
                                                        <a href="#">Añadir</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        BBVA CONTINENTAL
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" placeholder="ej: 627263726363" class="form-control" id="exampleInputPassword1" />
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="#">Añadir</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                         <span class="badge badge-default">Cuentas Registradas</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Banco
                                                    </th>
                                                    <th>
                                                        Cuenta
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        Banco de la Nación
                                                    </td>
                                                    <td>
                                                        7272761726
                                                    </td>
                                                    <td>
                                                        <a href="" title="Quitar Cuenta">Quitar</a>
                                                        <a href="" title="Habilitar Edición">Disabled Habilit</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    
    <script>
        
    </script>
@endsection