<header>
    <nav class="nav ">
        <a href="index.php" class="nav-logo nav-enlace">
            <img src="assets/img/logotipos/levetech-icon-azul.png " alt="icono levetech" class="md-1"> 
            Levetech Shop
        </a>
        <button type="button" class=" nav-toggle ">
            <i class='bx bx-menu'></i>
        </button>

        <ul class="nav-menu">
            <li class="nav-item ">
                <a href="index.php" class="nav-menu-enlace ">Inicio</a>
            </li>
            <!-- <li class="nav-item ">
                <a href="# " class="nav-menu-enlace ">Categorias</a>
            </li> -->
            <li class="nav-item ">
                <a href="acerca.php" class="nav-menu-enlace ">Acerca de</a>
            </li>

            <li class="nav-item ">
                <a href="carrito.php" class="nav-menu-enlace ">
                    Carrito (<?= empty($_SESSION['CARRITO'])?0:count($_SESSION['CARRITO']) ?>)
                </a>
            </li>
            
        </ul>
    </nav>
</header>