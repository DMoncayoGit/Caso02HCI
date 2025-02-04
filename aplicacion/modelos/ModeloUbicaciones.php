<?php

class Ubicacion {

    // Variables

    private $conn;
    private $table_name = "ubicaciones";

    public $codigo_ubicacion;
    public $direccion;
    public $latitud;
    public $longitud;

    //Funcion para un constructor
    public function __construct($db) { $this->conn = $db; }

    //Funcion para obtener una Ubicacion
    public function obtenerUbicacion() {
        $query = "SELECT codigo_ubicacion, direccion, latitud, longitud FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
	  
    //Funcion para agregar una Ubicacion
    public function agregarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud) {
        $query = "INSERT INTO " . $this->table_name . " VALUES (:codigo_ubicacion, :direccion, :latitud, :longitud)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":codigo_ubicacion", $codigo_ubicacion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":latitud", $latitud);
        $stmt->bindParam(":longitud", $longitud);

        return $stmt->execute();
    }

    //Funcion para editar una Ubicacion
    public function editarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud) {
        $query = "UPDATE " . $this->table_name . " " .
                 "SET direccion = :direccion,  latitud = :latitud, longitud = :longitud " .
                 "WHERE codigo_ubicacion = :codigo_ubicacion;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":codigo_ubicacion", $codigo_ubicacion);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":latitud", $latitud);
        $stmt->bindParam(":longitud", $longitud);

        return $stmt->execute();
    }

    //Funcion para eliminar una Ubicacion
    public function eliminarUbicacion($codigo_ubicacion) {
            $query = "DELETE FROM " . $this->table_name . " WHERE codigo_ubicacion = :codigo_ubicacion";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":codigo_ubicacion", $codigo_ubicacion);

            return $stmt->execute();
        }
    }
?>
