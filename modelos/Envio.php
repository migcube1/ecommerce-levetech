<?php

require_once('config/Conexion.php');

class Envio
{

    /** Conexión a la base de datos */
    private $conexion;

    /**
     * Construye  un objeto de la conexión a la base de datos.
     */
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function obtenerEnvios()
    {

        try {
            $connection = $this->conexion->conectar();      //Realizamos conexión
            $query = 'SELECT * FROM envio';                  //Consulta
            $statement = $connection->prepare($query);     //Preparamos la consulta
            $statement->execute();                          //Ejecutamos la consulta
            $datos = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            print "Error:" . $ex->getMessage() . die();
        }

        return $datos;
    }
}
