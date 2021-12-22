<!--
Negocios Electrónicos y Desarrollo Web
Proyecto Final: Sitio Web Levetech
Autores:
- Leyva Bejarano Miguel Angel
- Velasco Arciniega Ernesto
Semestre: 2022-1
-->

<?php
include('config/config.php');
include('modelos/Producto.php');
include('controladores/carrito.php');

$ProductoModelo = new Producto();
$productos = $ProductoModelo->obtenerProductos();

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
    <?php include("templates/header.php") ?>

    <!--slider-->
    <div class="contenedor-slider contenedor-ancho ">
        <!--imágenes del slider-->
        <div class="slider fade active-slider ">
            <img src="assets/img/slider/img_mapa.jpg " alt=" " usemap="#componentes">
            <map name="componentes">
            <area shape="rect" coords="310,36,1090,310" href="https://www.cyberpuerta.mx/Computo-Hardware/Monitores/Monitores/Monitor-Curvo-Samsung-LC24F390FHL-LED-23-5-Full-HD-Widescreen-FreeSync-HDMI-Negro.html" target="_blank">
            <area shape="poly" coords="1204,155,1466,12,1756,59,1893,436,1485,477,1180,452,1204,155" href="https://www.cyberpuerta.mx/Computadoras/PC-s-de-Escritorio/Computadora-Gamer-Xtreme-PC-Gaming-CM-91018-AMD-Athlon-300GE-3-40GHz-8GB-1TB-Wi-Fi-Windows-10-Prueba-Negro.html" target="_blank"> 
            <area shape="poly" coords="37,427,128,383,656,430,490,535,37,427" href="https://www.cyberpuerta.mx/Computo-Hardware/Dispositivos-de-Entrada/Teclados/Teclado-Gamer-Vorago-Start-The-Game-RGB-Alambrico-Negro-Espanol.html" target="_blank"> 
            <area shape="poly" coords="772,450,883,400,1144,434,1050,500,772,450" href="https://www.cyberpuerta.mx/Computo-Hardware/Dispositivos-de-Entrada/Mouse/Mouse-Gamer-Logitech-Optico-G203-LightSync-Alambrico-USB-8000DPI-Negro.html" target="_blank"> 
            </map>
        </div>
        <div class="slider fade ">
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
            <span class="dot " onclick="positionSlider(4) "></span>
        </div>
    </div>

    <?php if ($mensaje != "") : ?>

        <div class="alerta alerta-verde" role="alert">
            <?= $mensaje ?>
        </div>

    <?php endif; ?>

    <!-- contenedor Productos-->
    <div class="contenedor-ancho ">
        <div class="grid col-4 med-col-2 peq-col-1 ">

            <?php
            foreach ($productos as $producto) :
                if ($producto['activo'] == 1) :
            ?>
                    <div class="card ">
                        <img class="card-imagen" src="assets/img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
                        <div class="card-contenido ">
                            <p> <?= $producto['descripcion'] ?></p>
                            <h3 class="mi-1 ">$ <?= number_format($producto['precioOferta'], 2) ?></h3>
                            <h5 class="mi-0 texto-gris ">Antes: $ <?= number_format($producto['precio'], 2) ?></h5>
                            <h5 class="mi-0 texto-gris ">Costo de envío: $99.99</h5>
                            <h5 class="mi-0 texto-gris ">Disponibles: <?= $producto['stock'] ?> pz</h5>
                            <h5 class="mi-1 texto-gris ">Puntuación: <?= $producto['puntuacion'] ?></h5>
                            <form action="" method="post">
                                <input type="hidden" name="claveProducto" id="claveProducto" value="<?= openssl_encrypt($producto['claveProducto'], METHOD, KEY) ?>" class="d-none">
                                <input type="hidden" name="nombre" id="nombre" value="<?= openssl_encrypt($producto['descripcion'], METHOD, KEY) ?>" class="d-none">
                                <input type="hidden" name="precio" id="precio" value="<?= openssl_encrypt($producto['precioOferta'], METHOD, KEY) ?>" class="d-none">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?= openssl_encrypt(1, METHOD, KEY) ?>" class="d-none">
                                <input type="hidden" name="imagen" id="imagen" value="<?= openssl_encrypt($producto['imagen'], METHOD, KEY) ?>" class="d-none">

                                <button type="submit" name="btnAccion" value="Agregar" class="boton boton-azul ">
                                    <i class='bx bxs-cart-add md-1'></i>Añadir
                                </button>
                            </form>

                        </div>
                    </div>

            <?php
                endif;
            endforeach;
            ?>

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
                <a href="https://www.asus.com/mx/" target="_blank">
                    <img src="assets/img/marcas/asus.webp" alt="icono_asus">
                </a>
                <a href="https://www.amd.com/es" target="_blank">
                    <img src="assets/img/marcas/amd.webp" alt="Icono_amd">
                </a>
                <a href="https://www.acer.com/ac/es/MX/content/home" target="_blank">
                    <img src="assets/img/marcas/acer.webp" alt="icono_acer">
                </a>
                <a href="https://www.lenovo.com/mx/es/" target="_blank">
                    <img src="assets/img/marcas/lenovo.webp" alt="icono_lenovo">
                </a>
                <a href="https://www.gigabyte.com/mx" target="_blank">
                    <img src="assets/img/marcas/gigabyte.webp" alt="icono_gigabyte">
                </a>
                <a href="https://mx.msi.com/" target="_blank">
                    <img src="assets/img/marcas/msi.webp" alt="icono_msi">
                </a>
                <a href="https://www.logitech.com/es-mx" target="_blank">
                    <img src="assets/img/marcas/logitech.webp" alt="icono_logitech">
                </a>
                <a href="https://www.kingston.com/latam" target="_blank">
                    <img src="assets/img/marcas/kingston.webp" alt="icono_kingston">
                </a>
                <a href="https://www.westerndigital.com/" target="_blank" class="d-peq-none d-med-block d-none">
                    <img src="assets/img/marcas/westerndigital.webp" alt="icono_westerndigital">
                </a>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php include("templates/footer.php") ?>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>
    <script src="assets/js/sliders.js "></script>

</body>

</html>