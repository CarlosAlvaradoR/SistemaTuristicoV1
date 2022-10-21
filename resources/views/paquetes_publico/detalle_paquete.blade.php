@extends('layouts/plantilla_landing')


@section('content')
    <h1>{{Auth::user()->name}}</h1>

    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-heading">
                        Pauquete - {{ $paquete->nombre }}
                    </h3>

                </div>
                <div class="col-md-6">
                    <a href="">Ver mis paquetes</a>
                </div>
            </div>

            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <img alt="Bootstrap Image Preview" src="{{ asset('/'.$paquete->imagen_principal) }}" height="550" width="550" />
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <thead>
                                <tr>
                                  
                                       <b> Detalle de los paquetes</b>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Paquete
                                    </td>
                                    <td>
                                        {{$paquete->nombre}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Precio
                                    </td>
                                    <td>
                                        $/. {{$paquete->precio_dolares}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tipo de Paquete
                                    </td>
                                    <td>
                                        @if ($paquete->tipo == 1)
                                            Standar
                                        @else
                                            Personalizado
                                        @endif
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Payment Taken
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Default
                                    </td>
                                </tr>
                                <tr class="table-active">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Approved
                                    </td>
                                </tr>
                                <tr class="table-success">
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        02/04/2012
                                    </td>
                                    <td>
                                        Declined
                                    </td>
                                </tr>
                                <tr class="table-warning">
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        03/04/2012
                                    </td>
                                    <td>
                                        Pending
                                    </td>
                                </tr>
                                <tr class="table-danger">
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        04/04/2012
                                    </td>
                                    <td>
                                        Call in to confirm
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Payment Taken
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Default
                                    </td>
                                </tr>
                                <tr class="table-active">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        01/04/2012
                                    </td>
                                    <td>
                                        Approved
                                    </td>
                                </tr>
                                <tr class="table-success">
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        02/04/2012
                                    </td>
                                    <td>
                                        Declined
                                    </td>
                                </tr>
                                <tr class="table-warning">
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        03/04/2012
                                    </td>
                                    <td>
                                        Pending
                                    </td>
                                </tr>
                                <tr class="table-danger">
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        TB - Monthly
                                    </td>
                                    <td>
                                        04/04/2012
                                    </td>
                                    <td>
                                        Call in to confirm
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('payment.pay', $paquete) }}">
                            <div class="form-group">

                                <label for="fecha_reservacion">
                                    Fecha de reservación
                                </label>
                                <input type="date" name="fecha_reservacion" class="form-control" id="fecha_reservacion" />
                            </div>
                            <div class="form-group">

                                <label for="observacion_paquete">
                                    Observación
                                </label>
                                <textarea class="form-control" name="observacion_paquete" id="observacion_paquete" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Reservar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
