<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="blue">
            <a href="/home">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Inicio</span>
            </a>
        </li>
        <li class="blue with-sub">
            <span>
                <i class="fa fa-user"></i>
                <span class="lbl">Usuarios</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Nuevo</span><span
                            class="label label-custom label-pill label-succes">new</span></a></li>
                <li><a href="#"><span class="lbl">Permisos</span></a></li>
            </ul>
        </li>

        <li class="blue with-sub">
            <span>
                <i class="fa fa-user"></i>
                <span class="lbl">Usuarios</span>
            </span>
            <ul>
                <li><a href="acemilaAsociaciones.php"><span class="lbl">Organizaciones</span><span
                            class="label label-custom label-pill label-succes">new</span></a></li>
                <li><a href="#"><span class="lbl">Acémilas</span></a></li>
            </ul>
        </li>

        <li class="green">
            <a href="equipos.php">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Equipos</span>
            </a>
        </li>

        <li class="blue">
            <a href="{{ route('paquetes.index') }}">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Paquetes</span>
            </a>
        </li>
        
        <li class="gold with-sub">
            <span>
                <i class="fa fa-regular fa-calendar"></i>
                <span class="lbl">Reservas</span>
            </span>
            <ul>
                <li><a href="{{ route('reservas.index') }}"><span class="lbl">Lista de Reservas</span><span
                            class="label label-custom label-pill label-success">new</span></a></li>
                <li><a href="{{ route('solicitudes.all') }}"><span class="lbl">Solicitudes</span></a></li>
                <li><a href="#"><span class="lbl">Devoluciones (Nuevo)</span></a></li>
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
                <li><a href="{{ route('viajes.empresas_transporte') }}"><span class="lbl">Empresas</span></a></li>
                <li><a href="{{ route('viajes.chofer') }}"><span class="lbl">Chofer</span></a></li>
                <li><a href="#"><span class="lbl">Cocinero</span></a></li>
                <li><a href="#"><span class="lbl">Guía</span></a></li>
                <li><a href="#"><span class="lbl">Arriero</span></a></li>
            </ul>
        </li>

        <li class="magenta with-sub">
            <span>
                <i class="fa fa-solid fa-cart-shopping"></i>
                <span class="lbl">Pedidos</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Proveedores</span><span
                            class="label label-custom label-pill label-danger">new</span></a></li>
                <li><a href="#"><span class="lbl">Pedidos Proveedor</span></a></li>
            </ul>
        </li>

        <li class="orange-red with-sub">
            <span>
                <i class="fa fa-vest"></i>
                <span class="lbl">Equipos</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Ver Todo (Lo Ideal)</span><span
                            class="label label-custom label-pill label-succes">new</span></a></li>
                <li><a href="#"><span class="lbl">Marcas</span></a></li>
            </ul>
        </li>
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
