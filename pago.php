<?php
include('config/config.php');
include('modelos/Envio.php');
include('modelos/Orden.php');
include('controladores/Carrito.php');

$EnvioModelo = new Envio();
$envios = $EnvioModelo->obtenerEnvios();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago | Levetech Shop</title>

    <!-- ICONS-->
    <link rel="shorcut icon" href="assets/img/logotipos/levetech-logo-blanco.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <!--header-->
    <?php include("templates/header.php") ?>

    <?php if (!empty($_SESSION['CARRITO'])) : ?>
        <!-- si el carrito no esta vacio -->

        <div class="contenedor">
            <!--Formulario-->
            <form class="form" action="" method="post">
                <div class="grid col-2">
                    <!--Datos del personales -->
                    <div class="span-1 peq-span-2">

                        <div class="texto-centrado mi-1">
                            <h3>Datos personales</h3>
                        </div>
                        <hr>

                        <div class="grid col-2 ms-2">
                            <div class="span-2">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="apaterno" class="form-label">Apellido Paterno<label>
                                        <input type="text" name="apaterno" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="amaterno" class="form-label">Apellido Materno</label>
                                <input type="text" name="amaterno" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" name="correo" class="form-input" maxlength="50" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="telefono" class="form-label">Teléfono/Celular</label>
                                <input type="text" name="telefono" class="form-input" maxlength="15" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="NN-NNNN-NNNN" required>
                            </div>

                        </div>

                    </div>

                    <!--Datos del domicilio -->
                    <div class="span-1 peq-span-2">
                        <div class="texto-centrado mi-1">
                            <h3>Domicilio</h3>
                        </div>
                        <hr>

                        <div class="grid col-2 ms-2">
                            <div class="span-2">
                                <label for="calle" class="form-label">Calle</label>
                                <input type="text" name="calle" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="numero" class="form-label">No. exterior</label>
                                <input type="number" name="numero" class="form-input" min="0" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="cp" class="form-label">C.P.</label>
                                <input type="number" name="cp" class="form-input" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="colonia" class="form-label">Colonia</label>
                                <input type="text" name="colonia" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-1 med-span-2">
                                <label for="alcaldia" class="form-label">Municipio/Alcaldia</label>
                                <input type="text" name="alcaldia" class="form-input" maxlength="100" required>
                            </div>

                            <div class="span-2">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" name="estado" class="form-input" maxlength="100" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid col-2">
                    <!--Información de Envío-->
                    <div class="span-2">

                        <div class="texto-centrado mi-1">
                            <h3>Información de Envío</h3>
                        </div>
                        <hr>

                        <div class="grid col-2 ms-2">
                            <div class="span-1 med-span-2">
                                <label for="envio" class="form-label"> Empresa de envio</label>
                                <select name="envio" class="form-select">
                                    <?php foreach ($envios as $envio) : ?>
                                        <option value="<?= $envio['claveEnvio'] ?>">
                                            <?= $envio['medioEnvio'] . ' - $' . $envio['costoEnvio'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="grid col-1">
                    <!--Información de Pago-->
                    <div class="span-1">

                        <div class="texto-centrado mi-1">
                            <h3>Información de Pago</h3>
                        </div>
                        <hr>

                        <div class="grid col-3 ms-2">
                            <div class="span-1 peq-span-3">
                                <label for="numero_tarjeta" class="form-label">Número de tarjeta</label>
                                <input type="text" name="numero_tarjeta" class="form-input" placeholder="NNNN-NNNN-NNNN-NNNN" maxlength="27" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
                            </div>
                            <div class="span-1 peq-span-3">
                                <label for="vencimiento" class="form-label"> Vencimiento</label>
                                <input type="text" name="vencimiento" class="form-input" placeholder="MM/AA" pattern="[0-9]{2}/[0-9]{2}" maxlength="5" required>
                            </div>

                            <div class="span-1 peq-span-3">
                                <label for="codigo_seguridad" class="form-label"> Código de Seguridad</label>
                                <input type="text" name="codigo_seguridad" class="form-input" maxlength="3" required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="grid col-1">
                    <!--Monto Total-->
                    <div class="span-1">

                        <div class="texto-centrado mi-1">
                            <h3>Monto Total</h3>
                        </div>
                        <hr>

                        <?php
                        $total = 0;
                        foreach ($_SESSION['CARRITO'] as $producto) :
                            $total += $producto['cantidad'] * $producto['precio'];
                        endforeach;
                        ?>

                        <div class="span-1 peq-span-3 r-2">
                            <h4 class="mi-1">
                                <strong>Carrito:</strong> $ <?= number_format($total, 2) ?>
                            </h4>
                            <h4 class="mi-1"><strong>Envío: </strong> $ 99.99</h4>
                            <?php $total += 99.99; ?>
                            <h4 class="texto-verde">
                                <strong>Monto Total:</strong> $ <?= number_format($total, 2) ?>
                            </h4>

                            <input class="d-none" type="text" name="monto" class="form-input" value="<?= $total ?>">
                        </div>


                    </div>
                </div>

                <div class="contenedor d-flex justificar-contenido-final">
                    <a type="button" class="boton boton-verde md-1" href="carrito.php">
                        <i class='bx bx-undo md-1'></i> Regresar
                    </a>
                    <?php if (!empty($_SESSION['CARRITO'])) : ?>
                        <button type="submit" class="boton boton-azul" name="btnAccion" value="Pagar">
                            <i class='bx bxl-paypal md-1'></i>Pagar
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>


        <!-- vetana modal -->
        <div id="info-compra" class="compra">
            <div class="compra-contenido bg-azul texto-blanco rx-2 ry-1">
                <a href="#" class="bg-blanco">X</a>
                <h2 class="r-1  mi-1 boton-rojo">Informe de envio</h2>
                <table class="bg-blanco texto-negro info-table">
                    <tbody>
                        <tr>
                            <td class="num-fila-compra rl-1">Cliente</td>
                            <td style="border-right:2px solid #000;"></td>
                            <td class="rl-1">hello</td>
                        </tr>
                        <tr>
                            <td class="num-fila-compra rl-1">Dirección</td>
                            <td style="border-right:2px solid #000;"></td>
                            <td class="rl-1">hello</td>
                        </tr>
                        <tr>
                            <td class="num-fila-compra rl-1">Paqueteria</td>
                            <td style="border-right:2px solid #000;"></td>
                            <td class="rl-1">hello</td>
                        </tr>
                        <tr>
                            <td class="num-fila-compra rl-1">Monto total</td>
                            <td style="border-right:2px solid #000;"></td>
                            <td class="rl-1">hello</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php else :
        Header("Location: index.php");
    endif;
    ?>

    <!--footer-->
    <?php include("templates/footer.php") ?>

    <!-- JS -->
    <script src="assets/js/scripts.js "></script>

</body>

</html>