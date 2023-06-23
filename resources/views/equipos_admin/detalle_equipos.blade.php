@extends('layouts/plantilladashboard')


@section('contenido')
    
    <header class="section-header">
        <div class="tbl">
            <h3>Equipos</h3>
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="{{ route('equipos.index') }}">Equipos</a></li>
                <li><a href="#">Mantenimiento / Baja</a></li>
                <li class="active">{{$equipo->nombre}}</li>
            </ol>
        </div>
    </header>
    @livewire('equipos-admin.equipos.equipos-mantenimiento-bajas', [$equipo])
    
@endsection
