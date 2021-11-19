<?php
    include('modelos/Producto.php');

    $ProductoModelo = new Producto();
    $productos = $ProductoModelo ->obtenerProductos();

?> 


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/iconLevetech.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <!--header-->
    <header>
        <nav class="nav ">
            <a href="index.html" class="nav-logo nav-enlace">
                <!-- <img src="assets/img/iconLevetech2.png " alt="icono levetech " class=""> -->
                Levetech
            </a>
            <button type="button" class=" nav-toggle ">
                    <i class='bx bx-menu'></i>
            </button>

            <ul class="nav-menu">
                <li class="nav-item ">
                    <a href="index.html" class="nav-menu-enlace ">Inicio</a>
                </li>
                <li class="nav-item ">
                    <a href="# " class="nav-menu-enlace ">Categorias</a>
                </li>
                <li class="nav-item ">
                    <a href="# " class="nav-menu-enlace "> Inicio Sesión</a>
                </li>
                <li class="nav-item ">
                    <a href="# " class="nav-menu-enlace ">Registrar</a>
                </li>
                <li class="nav-item ">
                    <a href="# " class="nav-menu-enlace ">Acerca de</a>
                </li>
            </ul>
        </nav>
    </header>

    <!--slider-->
    <div class="contenedor-slider contenedor-ancho ">
        <!--imágenes del slider-->
        <div class="slider fade active-slider ">
            <img src="assets/img/slider/ofertas_1.jpg " alt=" ">
        </div>
        <div class="slider fade ">
            <img src="assets/img/slider/ofertas_2.jpg " alt=" ">
        </div>
        <div class="slider fade ">
            <img src="assets/img/slider/ofertas_3.jpg " alt=" ">
        </div>
        <!--Direcciones-->
        <div class="direcciones anterior texto-azul ">
            <a class="r-2 " onclick="avanzaSlide(-1) ">&#10094</a>
        </div>
        <div class="direcciones siguiente texto-azul ">
            <a class="r-2 " onclick="avanzaSlide(1) ">&#10095</a>
        </div>
        <!--Puntos-->
        <div class="dots ">
            <span class="dot active-dot " onclick="positionSlider(1) "></span>
            <span class="dot " onclick="positionSlider(2) "></span>
            <span class="dot " onclick="positionSlider(3) "></span>
        </div>
    </div>

    <!-- contenedor Productos-->
    <div class="contenedor-ancho ">
        <div class="grid col-4 med-col-2 peq-col-1 ">

            <?php foreach($productos as $producto): ?>

            <div class="card ">
                <img src="assets/img/productos/<?= $producto['imagen']?>" alt="<?= $producto['descripcion'] ?>">
                <div class="card-contenido ">
                    <p> <?= $producto['descripcionDetallada'] ?></p>
                    <h3 class="mi-1 ">$ <?= $producto['precioOferta']?></h3>
                    <h5 class="mi-0 texto-gris ">Antes: $ <?= $producto['precio']?></h5>
                    <h5 class="mi-0 texto-gris ">Costo de envío: $99.00</h5>
                    <h5 class="mi-0 texto-gris ">Disponibles: <?= $producto['stock']?> pz</h5>
                    <h5 class="mi-1 texto-gris ">Puntuación: <?= $producto['puntuacion']?></h5>
                    <button type="button " class="boton boton-azul ">Añadir</button>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- banner de las marcas-->
    <div class="contenedor-ancho bg-blanco ry-2 mi-0">
        <div class="grid col-2 mi-0 ms-2">
            <div class="texto-centrado span-1 med-span-2 mi-3">
                <h5>Más de 1,000 marcas </h5>
                <p>¡En Levetech encuentras sólo las mejores marcas!</p>
            </div>
            <div class="grid col-4 med-col-3 peq-col-2 span-1 med-span-2">
                <a href="#"><img src="assets/img/marcas/asus.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/amd.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/acer.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/lenovo.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/gigabyte.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/msi.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/logitech.webp" alt=""></a>
                <a href="#"><img src="assets/img/marcas/kingston.webp" alt=""></a>
                <a href="#" class="d-peq-none d-med-block d-none"><img src="assets/img/marcas/westerndigital.webp" alt=""></a>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer class="footer bg-negro ">
        <div class="contenedor-ancho bg-negro texto-blanco texto-centrado ">
            <div class="grid col-2 peq-col-1 ">
                <div class="ry-2 ">
                    &copy; 2021 levetech. Todos los derechos reservados.
                </div>
                <div class="social-media d-flex justificar-contenido-centrado ">
                    <a class="social-media-icon " href="https://www.facebook.com/ " target="_black " rel="noopener noreferrer ">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a class="social-media-icon " href="https://instagram.com/ " target="_black " rel="noopener noreferrer ">
                        <i class='bx bxl-instagram'></i>
                    </a>
                    <a class="social-media-icon " href="https://www.pinterest.com.mx/ " target="_black " rel="noopener noreferrer ">
                        <i class='bx bxl-pinterest-alt'></i>
                    </a>
                    <a class="social-media-icon " href="https://www.twitter.com/ " target="_black " rel="noopener noreferrer ">
                        <i class='bx bxl-twitter'></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="line my-3 "></div>
    </footer>

    <!--Jquery JS-->
    <script src="assets/js/jquery-3.5.1.js "></script>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>

    <script src="assets/js/sliders.js "></script>

</body>



</html>