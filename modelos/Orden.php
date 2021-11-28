<?php

require_once ('config/Conexion.php');

class Orden {

    /** Conexión a la base de datos */
    private $conexion;

    /**
     * Construye  un objeto de la conexión a la base de datos.
     */
    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function realizarOrden($datos){
         
        try {
            $connection = $this->conexion->conectar();      //Realizamos conexión
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $connection->beginTransaction(); //Iniciamos la transacción
            
            //Agregasmos al Cliente
            $query = "INSERT INTO cliente(nombre,apaterno,amaterno,email,telefono) VALUES 
            ('".$datos['nombre']."','".$datos['apaterno']."','".$datos['amaterno']."','".$datos['correo']."','".$datos['telefono']."')";  
            $connection->exec($query);  //Ejecutamos la consulta

            $claveCliente = $connection->lastInsertId(); //Obtenemos la clave del cliente.

            // Agregamos el Domicilio
            if (!empty($claveCliente)){  //Si existe el cliente en la BD
                $query = "INSERT INTO domicilio(calle,numero, cp, colonia, alcaldia, estado, claveCliente) VALUES ('".$datos['calle']."',".$datos['numero'].",".$datos['cp'].",'".$datos['colonia']."','".$datos['alcaldia']."','".$datos['estado']."',".$claveCliente.");";
                $connection->exec($query);  //Ajecutamos la consulta

                $claveDomicilio = $connection->lastInsertId(); //Obtenemos la clave del domicilio

            }
            // Agregamos la orden
            if (!empty($claveDomicilio)){  //Si existe el cliente en la BD
            
                $numeroTarjeta = openssl_encrypt($datos['numeroTarjeta'],METHOD, KEY);
                $vencimiento = openssl_encrypt($datos['vencimiento'],METHOD, KEY);
                $codigoSeguridad = openssl_encrypt($datos['codigoSeguridad'],METHOD, KEY);
         
                $query = "INSERT INTO orden(fechaCompra, montoTotal, numeroTarjeta,vencimiento,codigoSeguridad,claveEnvio,claveCliente,claveDomicilio) VALUES (now(),".$datos['montoTotal'].",'".$numeroTarjeta."','".$vencimiento."','".$codigoSeguridad."',".$datos['claveEnvio'].",".$claveCliente.",".$claveDomicilio.");";
                $connection->exec($query);  //Ejecutamos la consulta
         
            }else{
                $connection->rollback();
                return FALSE;
            }

            $connection->commit();
            return TRUE;
             
        } catch (PDOException $ex) {
            print "Error:" . $ex->getMessage() . die();
            $connection->rollback();
            return FALSE;
        }    
    }

    
}