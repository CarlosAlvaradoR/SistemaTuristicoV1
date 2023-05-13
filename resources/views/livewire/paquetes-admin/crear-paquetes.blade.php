<div>
    <section class="card card-blue-fill">
        <header class="card-header">
            Formulario de Nuevos Paquetes Turísticos
            <button type="button" class="modal-close">
                <i class="font-icon-close-2"></i>
            </button>
        </header>
        <div class="card-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('PaqueteSucces'))
                            <div class="alert alert-success alert-fill alert-close alert-dismissible fade in"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('PaqueteSucces') }}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{-- route('paquetes.turisticos.creacion') --}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="nombre">
                                            Nombre del Paquete
                                        </label>
                                        <input type="text" wire:model.defer="nombre" name="nombre"
                                            class="form-control" id="nombre" />
                                        @error('nombre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="precio">
                                            Monto del Paquete en S/.
                                        </label>
                                        <input type="text" wire:model.defer="precio"
                                            placeholder="Ingrese precio en soles peruanos" name="precio"
                                            class="form-control" id="precio" />
                                        @error('precio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="precio_dolares">
                                            Monto del Paquete en $/.
                                        </label>
                                        <input type="text" wire:model.defer="precio_en_dolares"
                                            placeholder="Ingrese precio en dólares" name="precio" class="form-control"
                                            id="precio_dolares" />
                                        @error('precio_en_dolares')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="estado">
                                            Estado del Paquete
                                        </label>
                                        <select id="estado" wire:model.defer="estado" name="estado" id="estado"
                                            class="form-control">
                                            <option selected>Seleccione...</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                        @error('estado')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--<input type="text" name="estado" class="form-control" id="estado" />-->
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="idtipopaquete">
                                            Tipo de Paquete
                                        </label>

                                        <select wire:model.defer="tipo_de_paquete" name="idtipopaquete"
                                            class="form-control">
                                            <option value="">...Seleccione...</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach

                                        </select>
                                        @error('tipo_de_paquete')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="visibilidad">
                                            Visibilidad - {{ $visibilidad }}
                                        </label>

                                        <select wire:model="visibilidad" name="visibilidad" id="visibilidad"
                                            class="form-control">
                                            <option value="">...Seleccione...</option>
                                            <option value="PUBLICO">PUBLICO</option>
                                            <option value="PRIVADO">PRIVADO</option>

                                        </select>
                                        @error('visibilidad')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="imagen_principal">
                                            Imagen Principal
                                        </label>
                                        <input type="file" wire:model.defer="imagen_principal"
                                            name="imagen_principal" class="form-control-file" id="imagen_principal"
                                            accept="image/*" />
                                        @error('imagen_principal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div wire:loading wire:target="imagen_principal">
                                            <span class="text-primary">Cargando Imagen ...</span>
                                        </div>

                                        <br><br>

                                        <hr>
                                        <div>
                                            <button type="button" wire:click="crearPaquete"
                                                wire:loading.attr="disabled" class="btn btn-primary">
                                                Guardar
                                            </button>

                                            <button class="btn btn-danger" type="reset">Cancelar</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
