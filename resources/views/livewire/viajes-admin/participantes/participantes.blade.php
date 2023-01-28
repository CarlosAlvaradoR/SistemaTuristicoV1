<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Reservas</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Fecha de Reserva</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes_reservados as $cr)
                                <tr>
                                    <td>
                                        {{$cr->datos}}
                                    </td>
                                    <td>
                                        {{$cr->fecha_reserva}}
                                    </td>
                                    <td>
                                        <button type="button" title="Añadir a la lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-success">
                                            <i class="fal fa-plus"></i>
                                        </button>
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
                    <h5 class="card-title">Lista de Participantes</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <button type="button" title="Quitar de la Lista de Participantes"
                                        class="btn btn-sm btn-rounded btn-danger">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
