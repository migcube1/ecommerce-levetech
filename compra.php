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
    <title>Compra | Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/logotipos/levetech-logo-blanco.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>


    <div class="contenedor">

        <div class="bg-gris">
            Esto es una compra
        </div>
    </div>


    <!--footer-->
    <?php include("templates/footer.php")?>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>
</body>

</html>