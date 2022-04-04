@extends('layouts/plantilladashboard')

@section('tituloPagina','Paquetes Turísticos')
    
@section('contenido')

<div class="container-fluid">
    <section class="box-typical files-manager">

        <div class="files-manager-panel">
            
            <div class="">
                <header class="files-manager-header">
                    <div class="files-manager-header-left">
                        <button type="button" class="btn btn-rounded"><i class="font-icon-left font-icon-upload-2"></i>Upload file</button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-folder"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-download-2"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-share"></i></button>
                        <button type="button" class="btn-icon"><i class="font-icon font-icon-trash"></i></button>
                    </div>
                    <div class="files-manager-header-right">
                        <div class="views">
                            <button type="button" class="btn-icon view active"><i class="font-icon font-icon-view-grid"></i></button>
                            <button type="button" class="btn-icon view"><i class="font-icon font-icon-view-rows"></i></button>
                        </div>
                        <div class="search">
                            <input type="text" class="form-control form-control-rounded" placeholder="Search"/>
                            <button type="submit" class="btn-icon"><i class="font-icon font-icon-search"></i></button>
                        </div>
                    </div>
                </header><!--.files-manager-header-->

                <div class="files-manager-content">
                    <div class="container-fluid">
                        <br>
                        <form action="{{ route('buscar.clientes.reserva') }}" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <form role="form">
                                        <div class="form-group">
                                             
                                            <label for="dni">
                                                Ingrese DNI
                                            </label>
                                            <input type="text" class="form-control" name="dni" id="dni" />
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-md-4">
                                     <br>
                                    <button type="submit" class="btn btn-success">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-4">
                                <form role="form">
                                    <!--foreach ($cliente as $cliente)-->
                                        <div class="form-group">
                                            <label for="nombres">
                                                Nombres
                                            </label>
                                            <input type="text" value="" class="form-control" id="nombres" />
                                            <div class="form-group">
                                                <label for="apellidos">
                                                    Apellidos
                                                </label>
                                                <input type="text" value="" class="form-control" id="apellidos" />
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">
                                                    Dirección
                                                </label>
                                                <input type="text" class="form-control" id="direccion" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">
                                                    Género
                                                </label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" />
                                            </div>
                                        </div>
                                    <!--endforeach-->
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            DNI
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            Email
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Teléfono
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            Nacionalidad
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Número de Pasaporte
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            Ruta de Pasaporte
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Agregar
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Cancelar
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form role="form">
                                    <div class="form-group">
                                         
                                        <label for="idpaquete">
                                            ID
                                        </label>
                                        <input type="text" class="form-control" id="idpaquete" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="">
                                            Paquete
                                        </label>
                                        <input type="text" class="form-control" id="" />
                                    </div>
                                    <div class="form-group">
                                         
                                        <label for="exampleInputPassword1">
                                            Cantidad
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" />
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Reservar
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Paquete
                                            </th>
                                            <th>
                                                Detalles
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="click" data-valor="valor">
                                            <td>
                                                1
                                            </td>
                                            <td class="boton">
                                                Caminata a Chávin de Hiantar
                                            </td>
                                            <td>
                                                <a href="">Ver</a>
                                            </td>
                                        </tr>
                                        <tr class="click" data-valor="valor">
                                            <td>
                                                1
                                            </td>
                                            <td class="boton">
                                                Caminata a Huaraz
                                            </td>
                                            <td>
                                                <a href="">Ver</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--.files-manager-content-->

                
            </div><!--.files-manager-panel-in-->
        </div><!--.files-manager-panels-->
    </section><!--.files-manager-->
</div><!--.container-fluid-->
    










<!--
http://www.forosdelweb.com/f13/obtener-solo-valor-tr-con-onclick-1004289/
-->
    
@endsection