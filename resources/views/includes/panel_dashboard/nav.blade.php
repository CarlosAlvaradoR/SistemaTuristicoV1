<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="blue">
            <a href="/home">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Inicio</span>
            </a>
        </li>

        @if (auth()->user()->getRoleNames()->first() != 'cliente')
            <li class="blue with-sub">
                <span>
                    <i class="fa fa-user"></i>
                    <span class="lbl">Usuarios</span>
                </span>
                <ul>
                    <li><a href="{{ route('mostrar.usuarios') }}"><span class="lbl">Nuevo</span><span
                                class="label label-custom label-pill label-success">new</span></a></li>
                    <li><a href="{{ route('mostrar.roles') }}"><span class="lbl">Roles</span></a></li>
                </ul>
            </li>

            <li class="green">
                <a href="{{ route('personas') }}">
                    <i class="font-icon glyphicon glyphicon-send"></i>
                    <span class="lbl">Personas</span>
                </a>
            </li>

            <li class="blue with-sub">
                <span>
                    <i class="font-icon glyphicon glyphicon-send"></i>
                    <span class="lbl">Paquetes</span>
                </span>
                <ul>
                    <li><a href="{{ route('paquetes.index') }}"><span class="lbl">Ver Paquetes</span><span
                                class="label label-custom label-pill label-success">new</span></a></li>
                    <li><a href="{{ route('paquetes.lugares_atractivos') }}"><span class="lbl">Lugares -
                                Atractivos</span></a></li>
                    <li><a href="{{ route('paquetes.tipos_personal') }}"><span class="lbl">Tipos de
                                Personal</span></a>
                    </li>
                    <li><a href="{{ route('paquetes.tipos_transporte') }}"><span class="lbl">Tipos de
                                Transporte</span></a></li>
                    <li><a href="{{ route('paquetes.tipos_alimentacion') }}"><span class="lbl">Tipos de
                                Alimentación</span></a></li>
                    <li><a href="{{ route('paquetes.tipos_acemilas') }}"><span class="lbl">Tipos de
                                Acémilas</span></a>
                    </li>
                    <li><a href="{{ route('paquetes.tipos_almuerzos') }}"><span class="lbl">Tipos de
                                Almuerzos</span></a>
                    </li>
                    <li><a href="{{ route('paquetes.tipo_paquetes_turisticos') }}"><span class="lbl">Tipos de P.
                                Turísticos</span></a>
                    </li>
                </ul>
            </li>

            <li class="magenta with-sub">
                <span>
                    <i class="fa fa-regular fa-calendar"></i>
                    <span class="lbl">Reservas</span>
                </span>
                <ul>
                    <li><a href="{{ route('reservas.index') }}"><span class="lbl">Lista de Reservas</span><span
                                class="label label-custom label-pill label-success">new</span></a></li>
                    <li><a href="{{ route('solicitudes.all') }}"><span class="lbl">Solicitudes</span></a></li>
                    <li><a href="{{ route('devoluciones.all') }}"><span class="lbl">Devoluciones</span></a></li>
                    <li><a href="{{ route('criterios_medicos.all') }}"><span class="lbl">Criterios
                                Médicos</span></a>
                    </li>
                    <li><a href="{{ route('eventos.postergacion.index') }}"><span class="lbl">Eventos de
                                Postergación</span><span
                                class="label label-custom label-pill label-success">new</span></a>
                    </li>
                    <li><a href="{{ route('tipo.pagos.cuentas') }}"><span class="lbl">Tipo de Pago -
                                Cuentas</span></a>
                    </li>
                    <li><a href="{{ route('consultar.reservas') }}"><span class="lbl">Consultar Reservas</span></a>
                    </li>
                    <li><a href="{{ route('reservas.reportes.generales') }}"><span class="lbl">Reportes</span></a>
                    </li>
                    <li><a href="{{ route('reservas.politicas.de.cumplimiento') }}"><span class="lbl">Política de
                                Cumplimiento de Reserva</span></a></li>
                    <li><a href="{{ route('reservas.comprobantes.entregados') }}"><span
                                class="lbl">Comprobantes</span></a></li>
                </ul>
            </li>

            <li class="green with-sub">
                <span>
                    <i class="fa fa-solid fa-mountain-sun"></i>
                    <span class="lbl">Viajes</span>
                </span>
                <ul>
                    <li><a href="{{ route('viajes.ver_todo') }}"><span class="lbl">Ver Todo</span><span
                                class="label label-custom label-pill label-succes">new</span></a></li>
                    <li><a href="{{ route('viajes.empresas_transporte') }}"><span class="lbl">Empresas</span></a>
                    </li>
                    <li><a href="{{ route('viajes.chofer') }}"><span class="lbl">Chofer</span></a></li>
                    <li><a href="{{ route('viajes.cocinero') }}"><span class="lbl">Cocinero</span></a></li>
                    <li><a href="{{ route('viajes.guia') }}"><span class="lbl">Guía</span></a></li>
                    <li><a href="{{ route('viajes.arriero') }}"><span class="lbl">Arriero</span></a></li>
                    <li><a href="{{ route('viajes.mostrar.asociaciones') }}"><span
                                class="lbl">Asociaciones</span></a>
                    </li>
                    <li><a href="{{ route('viajes.mostrar.hoteles') }}"><span class="lbl">Hoteles</span></a></li>
                    <li><a href="{{ route('viajes.tipos.de.vehiculos') }}"><span class="lbl">Tipos de
                                Vehículo</span></a></li>
                    <li><a href="{{ route('viajes.tipos.de.licencias') }}"><span class="lbl">Tipos de
                                Licencias</span></a></li>

                </ul>
            </li>

            <li class="magenta with-sub">
                <span>
                    <i class="fa fa-solid fa-cart-shopping"></i>
                    <span class="lbl">Pedidos</span>
                </span>
                <ul>
                    <li><a href="{{ route('pedidos.proveedores.index') }}"><span class="lbl">Proveedores</span><span
                                class="label label-custom label-pill label-danger">new</span></a></li>
                    <li><a href="{{ route('pedidos.proveedores.general') }}"><span class="lbl">Pedidos
                                Proveedor</span></a></li>
                    <li><a href="{{ route('mostrar.bancos') }}"><span class="lbl">Bancos</span></a></li>
                    <li><a href="{{ route('mostrar.tipos.de.comprobante') }}"><span class="lbl">Tipos de
                                Comprobante</span></a></li>
                </ul>
            </li>

            <li class="orange-red with-sub">
                <span>
                    <i class="fa fa-vest"></i>
                    <span class="lbl">Equipos</span>
                </span>
                <ul>
                    <li><a href="{{ route('equipos.index') }}"><span class="lbl">Ver Equipos</span><span
                                class="label label-custom label-pill label-succes">new</span></a></li>
                    <li><a href="{{ route('marcas.index') }}"><span class="lbl">Marcas</span></a></li>
                </ul>
            </li>
        @endif




    </ul>

    <!--<section>
        <header class="side-menu-title">Tags</header>
        <ul class="side-menu-list">
            <li>
                <a href="#">
                    <i class="tag-color green"></i>
                    <span class="lbl">Website</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color grey-blue"></i>
                    <span class="lbl">Bugs/Errors</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color red"></i>
                    <span class="lbl">General Problem</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color pink"></i>
                    <span class="lbl">Questions</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color orange"></i>
                    <span class="lbl">Ideas</span>
                </a>
            </li>
        </ul>
    </section>-->
</nav>
