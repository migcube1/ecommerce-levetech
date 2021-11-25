<?php
    include('config/config.php');
    include('controladores/Carrito.php');
    $total = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/logotipos/levetech-logo-blanco.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/carrito.css">

</head>

<body>
    <!--header-->
    <?php include("templates/header.php")?>

    <div class="contenedor" height="300vh">
        <h2>Contenido del carrito</h2>
        <table class="basket r-2">
            <thead class="bg-rojo">
                <tr class="head_Basket">
                    <th class="texto-centrado">PRODUCTO</th>
                    <th class="texto-centrado">DESCRIPCIÓN</th>
                    <th class="texto-centrado">PRECIO</th>
                    <th class="texto-centrado">CANTIDAD</th>
                    <th class="texto-centrado">TOTAL</th>
                    <th class="texto-centrado">ACCIONES</th>
                </tr>
            </thead>

            <?php if ($mensaje!=""): ?>

            <div class="contenedor bg-verde">
                <h1><?= $mensaje ?></h1>
            </div>

            <?php endif; ?>


            <?php if (isset($_SESSION['CARRITO'])){
            foreach($_SESSION['CARRITO'] as $producto): ?>

            <tbody>
                <tr>
                    <td class="img_Producto r-1">
                        <img class="" src="assets/img/productos/<?= $producto['imagen']?>"
                            alt="<?= $producto['nombre'] ?>">
                    </td>
                    <td class="descripcion_Producto r-1"><?= $producto['nombre']?></td>
                    <td class="precio_Producto r-1"> $ <?= number_format($producto['precio'])?></td>
                    <td class="num_Producto r-1"><?= $producto['cantidad']?></td>
                    <td class="num_Producto r-1"> $ <?= number_format($producto['cantidad'] * $producto['precio'],2)?>
                    </td>
                    <td class="num_Producto r-1">
                        <form action="" method="post">
                            <input type="hidden" name="claveProducto" id="claveProducto"
                                value="<?= openssl_encrypt($producto['claveProducto'],METHOD,KEY)?>" class="d-none">
                            <button type="submit" name="btnAccion" value="Eliminar" class="boton boton-rojo">
                                <i class='bx bxs-trash-alt'></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>


            <?php 
                $total+= $producto['cantidad'] * $producto['precio'];
                endforeach; }
            ?>

            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="ry-2 texto-centrado bg-gris">Total a pagar: </td>
                    <td class="ry-2 texto-centrado bg-gris"> 
                        <b> $ <?= number_format($total,2) ?> </b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


    
    <div class="contenedor d-flex justificar-contenido-final">
        <a type="button" class="boton boton-verde md-1" href="index.php">
            <i class='bx bx-undo md-1'></i> Regresar
        </a>
        <?php if (!empty($_SESSION['CARRITO'])): ?>
        <a type="submit" class="boton boton-azul" name="btnAccion" value="Comprar" href="pago.php">
            <i class='bx bxs-cart-alt md-1'></i>Comprar carrito
        </a>
        <?php endif; ?>
    </div>

    <!--footer-->
    <?php include("templates/footer.php")?>

    <!--Jquery JS-->
    <script src="assets/js/jquery-3.5.1.js "></script>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>


</body>



</html>