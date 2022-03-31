@extends('layouts/plantilladashboard')

@section('tituloPagina','Atractivos Turísticos | Paquete')
    
@section('contenido')
    <div class="container-fluid">
        @php
            $idPaquete=0;
            $nombrePaquete="";
        @endphp
        @foreach ($paquetes as $paquetes)
            @php
                $idPaquete = $paquetes->idpaqueteturistico;
                $nombrePaquete = $paquetes->nombre;
            @endphp 
        @endforeach
                    
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>@php echo $nombrePaquete;  @endphp</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="{{ route('paquetes.activos.galeria') }}">Paquetes</a></li>
                            <li><a href="{{ route('paquetes.detalles', $idPaquete) }}">Detalles</a></li>
                            <li class="active">Atractivos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card "> <!-- //- class="box-typical-full-height"-->
            <div class="card-block">
                <h5 class="with-border m-t-0">Formulario de Nuevos Atractivos</h5>
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
                                     <span class="badge badge-info">ATRACTIVOS DE VISITA</span>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Lugares Atractivos
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $contador=1;
                                                $idPaquete;
                                            @endphp
                                            @foreach ($lugaresAtractivos as $lugares)
                                                <tr>
                                                    <td>
                                                        {{$contador++}}
                                                    </td>
                                                    <td>
                                                        {{$lugares->nombre}} - {{$lugares->descripcion}}
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('guardar.atractivo.paquete') }}" method="POST">
                                                            @csrf
                                                            <input type="text" value="{{$lugares->idatractivoturistico}}" name="idatractivoturistico" hidden>
                                                            <input type="text" value="@php
                                                                echo $idPaquete; @endphp" name="idpaqueteturistico" hidden>
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                            <!--<span class="fa fa-trash"></span>-->
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                     <span class="badge badge-success">LUGARES PROGRAMADOS</span>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Lugar - Atractivos
                                                </th>
                                                
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lugaresPaquete as $lugarPaquete)
                                                <tr>
                                                    <td>
                                                        {{$lugarPaquete->nombre}} - {{$lugarPaquete->descripcion}}
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('eliminar.atractivo.lugar.paquete',$lugarPaquete->idpaquete_visitaatractivos) }}" method="POST" class="formEliminarItinerario">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="text" name="option" value="2" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                             <span class="badge badge-primary">@php
                                                 echo $nombrePaquete. $idPaquete; 
                                             @endphp</span>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <!--  BUTTONS-
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
                        END BUTTONS-->
                   
                </div><!--.row-->

            </div>
        </section>
        
    </div><!--.container-fluid-->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //$('.select2-arrow').select();
        });
    </script>





<script>
    $(function() {
			$('#tags-editor-textarea').tagEditor();
		});
    /*$('#lugar').select2({    
    language: {

        noResults: function() {

        return "No hay resultado";        
        },
        searching: function() {

        return "Buscando..";
        }
    }
    });*/
</script>
@endsection