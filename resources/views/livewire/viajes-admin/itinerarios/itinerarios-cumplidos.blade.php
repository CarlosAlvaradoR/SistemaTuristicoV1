<div>
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Lista de Itinerarios - {Semana Santa}</h5>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Buscar Itinerario">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Actividad</th>
                                <th scope="col">Itinerario</th>
                                <th scope="col">Fecha de Cumplimiento</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itinerarios as $i)
                                <tr>
                                    <td>
                                        {{$i->nombre_actividad}}
                                    </td>
                                    <td>
                                        {{$i->descripcion}}
                                    </td>
                                    <td>
                                        {{$i->fecha_cumplimiento}}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="" title="Marcar Como culminada"
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
        <!--<div class="col-lg-6 ks-panels-column-section">
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
                                {{-- @foreach ($participantes as $p)
                                <tr>
                                    <td>
                                        {{$p->datos}}
                                    </td>
                                    <td>
                                        <button type="button" wire:click="quitarParticipante({{$p->id}})" title="Quitar de la Lista de Participantes"
                                            class="btn btn-sm btn-rounded btn-danger">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach --}}
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>-->
    </div>
</div>
