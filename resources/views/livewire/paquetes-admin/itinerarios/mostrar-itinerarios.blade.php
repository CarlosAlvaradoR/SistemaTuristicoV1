<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalItinerarios">
        Añadir Itinerario
    </button>

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalItinerarios"
        tabindex="-1" aria-labelledby="modalItinerarios" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalItinerarios">Agregar Itinerario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">

                            @if (session()->has('insertado_correctamente'))
                                <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ session('insertado_correctamente') }}
                                </div>
                            @endif

                            <div class="col-md-6">



                                @if ($mostrarNombre)
                                    <div class="form-group">

                                        <label for="actividad">
                                            ACTIVIDAD
                                        </label>
                                        <input type="text" readonly wire:model.defer="nombre_actividadRegistrado"
                                            class="form-control" id="actividad" />
                                    </div>

                                    <div class="form-group">

                                        <label for="itinerario">
                                            Descripción del Itinerario
                                        </label>
                                        <textarea class="form-control" wire:model.defer="descripcion_itinerario" id="itinerario" rows="3"></textarea>
                                        @error('descripcion_itinerario')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button" wire:click="agregarItinerarioaActividad"
                                        class="btn btn-primary">
                                        Agregar Itinerario
                                    </button>

                                    <button type="button" wire:click="limpiar" class="btn btn-primary">
                                        Reiniciar
                                    </button>
                                @else
                                    <div class="form-group">

                                        <label for="actividad">
                                            ACTIVIDAD
                                        </label>
                                        <input type="text" wire:model.defer="actividad" class="form-control"
                                            id="actividad" />
                                        @error('actividad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button" wire:click="guardarActividadItinerario"
                                        class="btn btn-primary">
                                        Registrar Actividad
                                    </button>
                                @endif



                            </div>

                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Actividad
                                            </th>
                                            <th>
                                                Descripcion del Itinerario
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- id, , , actividad_id, paquete_id --}}
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($actividades_itinerarios as $ai)
                                            <tr>
                                                <th scope="row">{{ $cont++ }}</th>
                                                <td>{{ $ai->nombre_actividad }}</td>
                                                <td>{{ $ai->descripcion }}</td>
                                                <td>
                                                    <button title="Quitar Itinerario" class="btn btn-danger btn-sm"
                                                        wire:click="quitarActividadItinerario({{ $ai->idItinerario }})">
                                                        <span class="fa fa-minus"></span>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Agregar Itinerario
                        </th>
                        <th>
                            #
                        </th>
                        <th>
                            Actividad
                        </th>

                        <th>
                            Descripcion del Itinerario
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                        use App\Models\ItinerarioPaquetes;
                    @endphp

                    @foreach ($actividades as $index => $a)
                        <tr>
                            @php
                                $itinerario = ItinerarioPaquetes::where('actividad_id', $a->id)->get();
                            @endphp

                            <td rowspan="{{ $itinerario->count() + 1 }}">
                                <button wire:click="addItinerarios({{ $a->id }})"
                                    title="Añadir Itinerarios a la Actividad" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                            <td scope="row" rowspan="{{ $itinerario->count() + 1 }}">
                                <b>{{ $index + 1 }}</b>
                            </td>
                            <td rowspan="{{ $itinerario->count() + 1 }}">
                                {{ $a->nombre_actividad }}
                            </td>

                            @if (count($itinerario) == 0)
                                <td rowspan="1">
                                    <span class="label label-danger">Sin Itinerarios Registrados</span>
                                </td>2o
                                <td rowspan="1">
                                    <button wire:click="EditActividad({{ $a->id }})" title="Editar Actividad"
                                        class="btn btn-warning btn-sm">
                                        <span class="fa fa-pencil-square-o"></span>
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        wire:click="deleteConfirmActividad({{ $a->id }})"
                                        title="Eliminar Actividad">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            @endif
                        </tr>

                        @if (count($itinerario) > 0)
                            @foreach ($itinerario as $ai)
                                <tr>
                                    <td>

                                        {{ $ai->descripcion }}
                                        @if (!$ai->descripcion)
                                            <span class="label label-danger">Sin Itinerarios Registrados</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if (!$ai->descripcion)
                                            <button wire:click="EditActividad({{ $ai->actividad_id }})"
                                                title="Editar Actividad" class="btn btn-warning btn-sm">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </button>
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="deleteConfirmActividad({{ $ai->actividad_id }})"
                                                title="Eliminar Actividad">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        @else
                                            <button wire:click="Edit({{ $ai->id }})" title="Editar Itinerario"
                                                class="btn btn-warning btn-sm">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </button>
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="deleteConfirm({{ $ai->id }})"
                                                title="Eliminar Itinerario">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <!-- Button trigger modal -->
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar-itinerario">
        Launch demo modal
    </button>-->

    <!-- Modal -->
    <div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="editar-itinerario"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR INFORMACIÓN DE LA ACTIVIDAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-info alert-border-left alert-close alert-dismissible fade in"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>AVISO!</strong>
                        Editar el Nombre de la Actividad, cambiará en todos los itinerarios que contengan a esta.
                    </div>

                    <div class="form-group">
                        <label for="nombre_de_actividad">NOMBRE DE ACTIVIDAD</label>
                        <input type="text" class="form-control" wire:model.defer="nombre_de_actividad"
                            id="nombre_de_actividad" aria-describedby="emailHelp">
                        @error('nombre_de_actividad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (!$edicionActividad)
                        <div class="form-group">
                            <label for="descripcion_de_itinerario">Descripción del Itinerario</label>
                            <textarea class="form-control" wire:model.defer="descripcion_de_itinerario" id="descripcion_de_itinerario"
                                rows="3"></textarea>
                            @error('descripcion_de_itinerario')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" id="cl-act-iti" class="btn btn-danger" wire:loading.attr="disabled"
                        data-dismiss="modal">Cerrar</button>
                    @if ($edicionActividad)
                        <button type="button" id="update-acti" wire:click="UpdateActividad"
                            wire:loading.attr="disabled" class="btn btn-primary">Actualizar Actividad</button>
                    @else
                        <button type="button" id="update-iti" wire:click="Update" wire:loading.attr="disabled"
                            class="btn btn-primary">Actualizar</button>
                    @endif

                </div>
            </div>
        </div>
    </div>





    @if (session('success'))
        <script>
            Swal.fire({
                title: 'MUY BIEN',
                text: "{{ session('success') }}",
                icon: 'success'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: 'error'
            })
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Lo que llega de CategoriesController
            window.livewire.on('show-modal-editar-itinerario', msg => {
                $('#editar-itinerario').modal('show')
            });
            window.livewire.on('close-modal-editar-itinerario', msg => {
                $('#editar-itinerario').modal('hide')
            });
            window.livewire.on('show-modal-actividades-itinerarios', msg => {
                $('#modalItinerarios').modal('show')
            });
        });
    </script>
    <script>
        window.addEventListener('swal-confirmActividad', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('paquetes-admin.itinerarios.mostrar-itinerarios',
                        'quitarActividadItinerario',
                        event.detail
                        .id);
                }
            })
        });
        window.addEventListener('swal-confirmActividadDelete', event => {
            Swal.fire({
                title: event.detail.title,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('paquetes-admin.itinerarios.mostrar-itinerarios',
                        'quitarActividad',
                        event.detail
                        .id);
                }
            })
        });
        window.addEventListener('swal', event => {

            Swal.fire(
                event.detail.title,
                event.detail.text,
                event.detail.icon
            );
        });
    </script>

</div>
