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

                    
                    $clavesProductos = array_column($_SESSION['CARRITO'], "claveProducto"); //Obtenemos un arreglo de claves
        
                    if (in_array($claveProducto, $clavesProductos)){  //El producto está en el carrito?

                        foreach ($_SESSION['CARRITO'] as $index=>$producto){  //Para cada producto del carrito
                            if ($producto['claveProducto'] == $claveProducto){  //Si la clave del producto coincide 
                                $_SESSION['CARRITO'][$index]['cantidad']+=1; //Incrementamos la cantidad
                            }
                        }
                        
                    }else{                                             //Sino agregamos el producto al carrtio

                        $numProductos = count($_SESSION['CARRITO']);  //Contamos cuantos productos hay en el carrito

                        $datos = array(
                            'claveProducto' => $claveProducto,
                            'nombre' => $nombre,
                            'precio' => $precio,
                            'cantidad' => $cantidad,
                            'imagen' => $imagen
                        );
        
                        $_SESSION['CARRITO'][$numProductos] = $datos;   //Agregamos un producto al carrito

                    } 
                }

                $mensaje = "Se agregó correctamente el producto";
            }else{
                $mensaje = "Ocurrió un error al agregar el producto, intenteló más tarde.";
            }

            // Header("Location: index.php");
            break;

        case 'Eliminar':  //Eliminar un producto del carrito
            $claveProducto = openssl_decrypt($_POST['claveProducto'],METHOD,KEY); //Obtenemos la clave a del producto a eliminar

            if (is_numeric($claveProducto)){  //Se valida la clave
                
                foreach ($_SESSION['CARRITO'] as $index=>$producto){  //Para cada producto del carrito
                    if ($producto['claveProducto'] == $claveProducto){  //Si la clave del producto coincide el  producto a eliminar
                        unset($_SESSION['CARRITO'][$index]);  //Eliminamos el producto
                    }
                }

                $mensaje = "Se eliminó correctamente el producto.";

            }else{
                $mensaje = "Ocurrió un error al eliminar el producto, intenteló más tarde.";
            }

            // Header("Location: carrito.php");
            break;
    }

}