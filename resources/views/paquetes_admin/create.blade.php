@extends('layouts/plantilladashboard')
    
@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Paquetes</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li class="active">Crear</li>
                </ol>
            </div>
        </header>
        @livewire('paquetes-admin.crear-paquetes')
        

        

        
    </div><!--.container-fluid-->
@endsection