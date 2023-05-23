@extends('layouts/plantilladashboard')


@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Reservas</a></li>
                    <li><a href="{{ route('reservas.index') }}">Lista de Reservas</a></li>
                    <li class="active">Pagos</li>
                </ol>
            </div>
        </header>
        @livewire('reservas-admin.reservas.pagos.pagos-pendientes',[$reserva->id])
        

    </div>
    <!--.container-fluid-->
@endsection
