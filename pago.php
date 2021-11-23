<?php
    include('config/config.php');


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

    <div class="contenedor">
            <form action="" method="post" class="grid col-3">
            <label for="nombre">Nombre(s)</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)">
            <label for="apaterno">Apellido Paterno</label>
            <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno">
            <label for="">Apellido Materno</label>
            <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno">
            </form>
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