@extends('layouts/plantilladashboard')

@section('tituloPagina','Componentes | Lista de Clientes')
    
@section('contenido')
    <div class="container-fluid">
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Componentes</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Viajes</a></li>
                            <li><a href="{{ route('paquetes.detalles', 2) }}">Registro</a></li>
                            <li class="active">Programación</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">
            
            <div class="col-xl-12">
                <section class="box-typical steps-numeric-block">
                    <div class="steps-numeric-header">
                        <div class="steps-numeric-header-in">
                            <ul>
                                <li><div class="item"><span class=""></span>Lista de Viajes Registrados</div></li>
                            </ul>
                        </div>
                    </div>

                    <div class="steps-numeric-inner">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Viaje
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
                                                    Viajando al Río de Huaraz
                                                </td>
                                                <td>
                                                    <a href="{{ route('index.viajes.control.detalles.admin') }}">Detalles</a>
                                                    <a href="">Quitar</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!--.steps-numeric-block-->
            </div>
        </div><!--.row-->
        
    </div><!--.container-fluid-->



@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
			
	});
    </script>

    <script>
        
    </script>
@endsection