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
                    <a href="{{--route('paquetes.formulario.nuevo') --}}" class="btn btn-rounded">Nuevo Paquete</a>
                </div>
            </div>
        </div>
    </div>
</header><!--.page-content-header-->

<div class="container-fluid">
    
    <div class="row card-user-grid">
       @livewire('show-paquetes')
        

        
    </div><!--.card-user-grid-->
</div><!--.container-fluid-->
@endsection