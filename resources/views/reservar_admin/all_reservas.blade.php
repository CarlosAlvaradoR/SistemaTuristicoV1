@extends('layouts/plantilladashboard')


@section('contenido')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <h3>Reservas</h3>
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="#">Paquetes</a></li>
                    <li><a href="#">Reservar</a></li>
                    <li><a href="#">Condiciones</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="card-block">
                        <h5 class="card-title">Opciones</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo de Pago</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Estado</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Lista de Todas las Reservas</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!--<th scope="col">#</th>-->
                                    <th scope="col">DNI</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Paquete</th>
                                    <th scope="col">Fecha de Reserva</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $r)
                                    <tr>
                                        <!--<th scope="row">1</th>-->
                                        <td>{{ $r->dni }}</td>
                                        <td>{{ $r->datos }}</td>
                                        <td>{{ $r->nombre }}</td>
                                        <td>{{ $r->fecha_reserva }}</td>
                                        <td>{{ $r->pago }}</td>
                                        <td>
                                            @if ($r->nombre_estado == 'COMPLETADO')
                                                <span class="label label-success">{{$r->nombre_estado}}</span>
                                            @else
                                                <span class="label label-danger">{{$r->nombre_estado}}</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status"><button
                                                    class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu"><a class="dropdown-item"
                                                        href="{{ route('reservas.eventos.postergacion') }}" title="Lenar Evento de Postergación"><i class="fas fa-calendar-week"></i></a><a class="dropdown-item"
                                                        href="{{ route('reservas.solicitudes.devoluciones')}}" title="Llenar Solicitud de de Devolución"><i class="fa-solid fa-file"></i></a><a class="dropdown-item"
                                                        href="#" title="Añadir Pago restante"><i class="fas fa-money-check-alt"></i></a><a class="dropdown-item"
                                                        href="#" title="Editar Solicitud"><i class="fas fa-file-edit"></i></a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ks-panels-column-section">
                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Validation</h5>
                        <div>
                            <fieldset class="form-group has-success">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-success" id="inputSuccess1"
                                        placeholder="Input with success">
                                </div>
                            </fieldset>
                            <fieldset class="form-group has-warning">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-warning"
                                        placeholder="Input with warning">
                                </div>
                            </fieldset>
                            <fieldset class="form-group has-danger">
                                <div class="fl-flex-label">
                                    <input type="text" class="form-control form-control-danger"
                                        placeholder="Input with danger">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--.container-fluid-->
@endsection
