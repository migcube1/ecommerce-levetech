<?php
    include('config/config.php');
    include('controladores/Carrito.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/logotipos/iconLevetech.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/carrito.css">

</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>

    <h2>Contenido del carrito</h2>
    <table class="basket r-2">
        <thead>
            <tr class="head_Basket">
                <th>PRODUCTO</th>
                <th></th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
            </tr>
        </thead>

        <?php if (isset($_SESSION['CARRITO'])){
            foreach($_SESSION['CARRITO'] as $producto): ?>

        <tbody class="content_Basket">
            <tr>
                <td class="img_Producto r-1">
                    <img class="" src="assets/img/productos/<?= $producto['imagen']?>" alt="<?= $producto['nombre'] ?>">
                </td>
                <td class="descripcion_Producto r-1"><?= $producto['nombre']?></td>
                <td class="precio_Producto r-1"><?= '$ '.$producto['precio']?></td>
                <td class="num_Producto r-1" ><?= $producto['cantidad']?></td>
            </tr>
        </tbody>

        <?php endforeach; }?>
    </table>

    
    <!--footer-->
    <?php include("templates/footer.php")?>

    <!--Jquery JS-->
    <script src="assets/js/jquery-3.5.1.js "></script>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>


</body>



</html>