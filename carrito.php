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

</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>

    <h2>Contenido del carrito</h2>
    <table>
        <thead>
            <tr>
                <td>PRODUCTO</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
            </tr>
        </thead>

        <?php if (isset($_SESSION['CARRITO'])){
            foreach($_SESSION['CARRITO'] as $producto): ?>

        <tbody>
            <tr>
                <td><?= $producto['nombre']?></td>
                <td><?= '$ '.$producto['precio']?></td>
                <td><?= $producto['cantidad']?></td>
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