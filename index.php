<?php
    include('config/config.php');
    include('controladores/carrito.php');
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
    <link rel="shorcut icon" href="assets/img/logotipos/levetech-logo-blanco.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>

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

    <?php if ($mensaje!=""): ?> 

    <div class="contenedor bg-verde">
        <h1><?= $mensaje ?></h1>
    </div>

    <?php endif; ?>

    <!-- contenedor Productos-->
    <div class="contenedor-ancho ">
        <div class="grid col-4 med-col-2 peq-col-1 ">

            <?php foreach($productos as $producto): ?>

            <div class="card ">
                <img class="card-imagen" src="assets/img/productos/<?= $producto['imagen']?>" alt="<?= $producto['nombre'] ?>">
                <div class="card-contenido ">
                    <p> <?= $producto['descripcion'] ?></p>
                    <h3 class="mi-1 ">$ <?= $producto['precioOferta']?></h3>
                    <h5 class="mi-0 texto-gris ">Antes: $ <?= $producto['precio']?></h5>
                    <h5 class="mi-0 texto-gris ">Costo de envío: $99.00</h5>
                    <h5 class="mi-0 texto-gris ">Disponibles: <?= $producto['stock']?> pz</h5>
                    <h5 class="mi-1 texto-gris ">Puntuación: <?= $producto['puntuacion']?></h5>
                    <form action="" method="post">
                        <input type="hidden" name="claveProducto" id="claveProducto" value="<?= openssl_encrypt($producto['claveProducto'],METHOD,KEY)?>"  class="d-none">
                        <input type="hidden" name="nombre" id="nombre" value="<?= openssl_encrypt($producto['descripcion'],METHOD,KEY)?>" class="d-none">
                        <input type="hidden" name="precio" id="precio" value="<?= openssl_encrypt($producto['precio'],METHOD,KEY) ?>"  class="d-none">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?= openssl_encrypt(1,METHOD,KEY)?>" class="d-none">
                        <input type="hidden" name="imagen" id="imagen" value="<?= openssl_encrypt($producto['imagen'],METHOD,KEY) ?>"  class="d-none">
                        
                        <button type="submit"  name="btnAccion" value="Agregar" class="boton boton-azul ">
                            <i class='bx bxs-cart-add md-1' ></i>Añadir
                        </button>
                    </form>
                    
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
                <a href="#" class="d-peq-none d-med-block d-none">
                    <img src="assets/img/marcas/westerndigital.webp" alt="">
                </a>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php include("templates/footer.php")?>

    <!--Jquery JS-->
    <script src="assets/js/jquery-3.5.1.js "></script>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>

    <script src="assets/js/sliders.js "></script>

</body>



</html>