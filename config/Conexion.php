<?php

/**
 * Clase que representa la conexión a la base de datos.
 */
class Conexion
{

    private $hostname;
    /** Nombre del servidor web*/
    private $database;
    /**  Nombre de la base de datos*/
    private $usuario;
    /** Nombre del usuario*/
    private $password;
    /**  Contraseña del usuario*/
    private static $conexion;
    /**  Conexión estatica de la base de datos*/

    /**
     * Constructor en el que se establece la conexión a la base de datos a una variable para poder
     * utilizarla posterirormente.
     */
    public function __construct()
    {
        $this->hostname = 'localhost';
        $this->database = 'levetech';
        $this->usuario = 'root';
        $this->password = '';
    }

    /**
     * Realiza la conexión a la base de datos.
     */
    public function conectar()
    {

        try {
            if (is_null(self::$conexion)) {
                self::$conexion = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->usuario, $this->password);
            }
            return self::$conexion;
        } catch (PDOException $ex) {
            print "¡Error al conectarse a la base de datos!: " . $ex->getMessage() . "<br/>";
            die();
        }
        return NULL;
    }
}
