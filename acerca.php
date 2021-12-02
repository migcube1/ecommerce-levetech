<?php
    include('config/config.php');
    include('controladores/carrito.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de | Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/logotipos/levetech-logo-blanco.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>

    <!--banner-->
    <div class="contenido-ancho banner p-0">
        <div class="banner-img r-5 texto-blanco">
            <h1>Levetech Shop</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    <!-- Cards de Misión y visión -->
    <div class="contenedor ">
        <div class="grid col-2 med-col-1">
            <div class="card bg-dark mx-5">
                <img src="assets/img/acerca/mision.jpg" class="card-img-top" alt="Imagen misión">
                <div class="texto-centrado texto-blanco ms-2">
                    <h1>Misión</h1>
                    <p class="texto-justificado r-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem facere fugiat
                        ducimus, quaerat inventore, laudantium quo illum ullam voluptatibus, sed obcaecati et architecto
                        molestiae at! Maxime voluptatibus soluta deleniti.
                    </p>

                </div>
            </div>
            <div class="card bg-dark mx-5">
                <img src="assets/img/acerca/vision.jpg" class="card-img-top" alt="Imagen visión">
                <div class="texto-centrado texto-blanco ms-2">
                    <h1>Visión</h1>
                    <p class="texto-justificado r-2">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum hic quae aspernatur nobis
                        corporis amet, vero laboriosam animi aut iure sint similique magni deserunt ipsam consequatur in
                        repudiandae expedita? Eius.
                    </p>

                </div>
            </div>
        </div>
    </div>


    <!-- Video-->
    <div class="contenedor texto-centrado justificar-contenido-centrado alieacion-centrado">
        <p>Manteniendo siempre los mejores productos y precios del mercado</p>
        <video class="video" controls>
            <source src="assets/video/promo.mp4" type="video/mp4">
    </div>

    <!--footer-->
    <?php include("templates/footer.php")?>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>



</body>

</html>