<?php
session_start();

$mensaje ="";

if (isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            $claveProducto = openssl_decrypt($_POST['claveProducto'],METHOD,KEY);
            $nombre = openssl_decrypt($_POST['nombre'],METHOD,KEY);
            $precio = openssl_decrypt($_POST['precio'],METHOD,KEY);
            $cantidad = openssl_decrypt($_POST['cantidad'],METHOD,KEY);
            $imagen = openssl_decrypt($_POST['imagen'],METHOD,KEY);

            if (is_numeric($claveProducto) && is_string($nombre) && is_numeric($precio) && is_numeric($cantidad) && is_string($imagen)){
                
                if(!isset($_SESSION['CARRITO'])){  //Si no tiene productos nuestro carrito 

                    $datos = array(
                        'claveProducto' => $claveProducto,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad,
                        'imagen' => $imagen
                    );
  
                    $_SESSION['CARRITO'][0] = $datos;       //Agregamos un primer producto

                }else{                                      //Si tiene productos el carrito
                    
                    $numProductos = count($_SESSION['CARRITO']);  //Contamos cuantos producto hay en el carrito
                    $datos = array(
                        'claveProducto' => $claveProducto,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad,
                        'imagen' => $imagen
                    );
    
                    $_SESSION['CARRITO'][$numProductos] = $datos;   //Agregamos un producto al carrito
                }

                $mensaje = "Se agregó correctamente al carrito el producto: ".$nombre;
            }else{
                $mensaje = "Error al agregar al carrito el producto: ".$nombre;
            }

            
            break;

        case 'Eliminar':
            # code...
            break;
    }

}


