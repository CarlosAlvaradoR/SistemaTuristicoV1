<div>
    <div class="row">
        <div class="col-lg-6 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">LISTA DE CLIENTES EN EL VIAJE</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Cliente">
                    </div>
                    <div wire:loading wire:target="Añadir" class="alert alert-primary" role="alert">
                        <a href="#!" class="alert-link">Cargando ...</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participantes as $p)
                                <tr>
                                    <td>
                                        {{ $p->datos }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Añadir({{ $p->id }})"
                                            title="Añadir a la lista de Participantes"
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
                    <h5 class="card-title">PARTICIPANTES EN LA ACTIVIDAD DE ACLIMATACIÓN</h5>
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
                            @foreach ($participantes_actividad as $pa)
                                <tr>
                                    <td>
                                        {{ $pa->datos }}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="Quitar({{$pa->idAsistente}})"
                                            title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
