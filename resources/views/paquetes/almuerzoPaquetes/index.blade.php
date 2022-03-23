@extends('layouts/plantilladashboard')

@section('tituloPagina','Tipo de Paquetes')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Tipo de Paquetes</h3>
                        <!--<ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Usuarios</a></li>
                            <li><a href="#">Nuevos</a></li>
                            <li class="active">Registros</li>
                        </ol>-->
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                     <a href="{{ route('formulario.nuevo.tipo.paquete') }}" class="btn btn-primary">Nuevo Tipo</a>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Tipo
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $contador=1;
                                            @endphp
                                            @foreach ($tipos as $tipo)
                                                <tr>
                                                    <td>
                                                        {{$contador++}} 
                                                    </td>
                                                    <td>
                                                        {{$tipo->nombretipo}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('formulario.editar.tipo.paquete', $tipo->idtipopaquete) }}">
                                                            <span class="btn btn-warning btn-sm" >
                                                                <span class="fa fa-pencil-square-o"></span>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('formulario.eliminar.tipo.paquete', $tipo->idtipopaquete) }}" >
                                                            <span class="btn btn-danger btn-sm">
                                                                <span class="fa fa-trash"></span>
                                                            </span>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div><!--.container-fluid-->
@endsection


@section('scripts')
    <!--<script>
            $('#registrarNuevoTipo').submit(function(e){
                e.preventDefault();

                var nombretipo = $('#nombretipo').val();
                var _token = $("input[name=_token]").val();

                $.ajax({
                    url: "{{ route('formulario.guardar.tipo.paquete') }}",
                    type: "POST",
                    data:{
                        nombretipo: nombretipo,
                        _token:_token

                    },
                    success:function(response){
                        if(response){
                            alert(response);
                            $('#registrarNuevoTipo')[0].reset();
                            
                            //toastr.success('El registro se ingreso correctamente.', 'Nuevo Registro', {timeOut:3000});
                            $('#registrarNuevoTipo').DataTable().ajax.reload();
                        }
                    }
            });

        });
    </script>-->
@endsection