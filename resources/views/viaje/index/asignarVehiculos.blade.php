@extends('layouts/plantilladashboard')

@section('tituloPagina','Asignar Vehículos al Viaje')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Vehículos de Traslado</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Guías</a></li>
                            <li><a href="#">Listado</a></li>
                            <li class="active">Nuevo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">Lista de Vehículos</h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Guías
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Guías
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </tfoot>
                                <tbody> <!-- tr y td-->
                                    
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="card">
                        
                        <div class="card-block">
                            <h5 class="with-border m-t-0">Vehículos Programados</h5>
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Guías
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Guías
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </tfoot>
                                <tbody> <!-- tr y td-->
                                    
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection