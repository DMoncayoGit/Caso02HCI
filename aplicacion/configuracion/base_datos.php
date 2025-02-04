<?php

class Database {

    // Propiedades privadas que contienen la configuración de la base de datos
    // private $host     = "localhost"; // Dirección del servidor de base de datos (localhost en este caso)
    // private $db_name  = "xyz_caso01"; // Nombre de la base de datos.
    // private $username = "xyz_caso01";      // Usuario para la conexión a la base de datos (por defecto "root")
    // private $password = "";          // Contraseña para el usuario de la base de datos (por defecto vacío)
    
    private $host     = "localhost"; // Dirección del servidor de base de datos (localhost en este caso)
    private $db_name  = "xyz_caso01hcidm"; // Nombre de la base de datos.
    private $username = "xyz_caso01hcidm";      // Usuario para la conexión a la base de datos (por defecto "root")
    private $password = "casoHCI#2010";          // Contraseña para el usuario de la base de datos (por defecto vacío)
    
	public $conn;                    // Propiedad pública donde se almacenará la conexión a la base de datos

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        
        // Inicializamos la conexión a null antes de intentar crear una nueva conexión
        $this->conn = null;

        // Intentamos establecer la conexión con la base de datos
        try {
            // Creamos una nueva instancia de PDO para la conexión con MySQL
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
            // Configuramos PDO para lanzar excepciones en caso de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        // Si ocurre un error durante la conexión, lo capturamos en el bloque catch
        catch(PDOException $exception) {
            // Mostramos el mensaje de error en caso de fallo en la conexión
            echo "Error de conexión: " . $exception->getMessage();
        }

        // Devolvemos la conexión (o null si hubo un error)
        return $this->conn;
    }


    
}
?>
