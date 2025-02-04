<?php

class Contacto {

    // Variables

    private $conn;
    private $table_name = "contactos";

    public $identificacion;
    public $nombre;
    public $saludo;
    public $correo;
    public $telefono;
    public $fotografia;

    //Funcion para un constructor
    public function __construct($db) { $this->conn = $db; }

    //Funcion para mostrar un Contacto
    public function mostrarContacto($identificacion) {
        $query = "SELECT identificacion, nombre, saludo, correo, telefono, fotografia FROM " . $this->table_name. " WHERE identificacion = :identificacion";
		$stmt = $this->conn->prepare($query);
        $stmt->bindParam(":identificacion", $identificacion);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    //Funcion para obtener un Contacto
    public function obtenerContacto() {
        $query = "SELECT identificacion, nombre, correo, telefono, saludo, fotografia FROM " . $this->table_name;
        
		$stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
	
    //Funcion para agregar un Contacto
    public function agregarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia ) {
        $query = "INSERT INTO " . $this->table_name . " VALUES (:identificacion, :nombre, :saludo, :correo, :telefono, :fotografia)";
        
		$stmt = $this->conn->prepare($query);
        $stmt->bindParam(":identificacion", $identificacion);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":saludo", $saludo);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":fotografia", $fotografia);

        return $stmt->execute();
    }

    //Funcion para editar un Contacto
    public function editarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia) {
        $query = "UPDATE " . $this->table_name . " " .
                 "SET nombre = :nombre, saludo = :saludo, correo = :correo, telefono = :telefono, fotografia = :fotografia " .
                 "WHERE identificacion = :identificacion;";
        
		$stmt = $this->conn->prepare($query);
        $stmt->bindParam(":identificacion", $identificacion);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":saludo", $saludo);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":fotografia", $fotografia);

        return $stmt->execute();
    }

    //Funcion para eliminar un Contacto
    public function eliminarContacto($identificacion) {
        $query = "DELETE FROM " . $this->table_name . " WHERE identificacion = :identificacion";
        
		$stmt = $this->conn->prepare($query);
        $stmt->bindParam(":identificacion", $identificacion);

        return $stmt->execute();
    }
}
?>
