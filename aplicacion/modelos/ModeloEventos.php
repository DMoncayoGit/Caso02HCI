<?php

class Evento {

    // Variables

    private $conn;
    private $table_name = "eventos";
    private $table2_name = "ubicaciones";
    private $table3_name = "contactos";

    public $codigo_evento;
    public $tipo;
    public $descripcion;
    public $clasificacion;
    public $fecha;
    public $zona;
    public $invitados;
    public $repeticion;
    public $recordatorio;
    public $identificacion;
    public $codigo_ubicacion;

    //Funcion para un constructor
    public function __construct($db) { $this->conn = $db; }

    //Funcion para obtener un Contacto
    public function obtenerContactos() {
        $query = "SELECT identificacion, nombre FROM " . $this->table3_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    //Funcion para obtener una Ubicacion
    public function obtenerUbicaciones() {
        $query = "SELECT codigo_ubicacion, direccion FROM " . $this->table2_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Funcion para mostrar un Evento
	public function mostrarEvento($codigo_evento) {
	    //try {
            $query = "SELECT codigo_evento, CASE 
                                            WHEN tipo = 'C' THEN 'Conferencia'
                                            WHEN tipo = 'S' THEN 'Seminario'
                                            WHEN tipo = 'T' THEN 'Taller'
                                            END AS tipo, descripcion, 
                                            CASE 
                                            WHEN clasificacion = '1' THEN 'Corporativos'
                                            WHEN clasificacion = '2' THEN 'Recaudaci車n de Fondos'
                                            WHEN clasificacion = '3' THEN 'Espectáculos'
                                            WHEN clasificacion = '4' THEN 'Deportivos'
                                            WHEN clasificacion = '5' THEN 'Sociales'
                                            WHEN clasificacion = '6' THEN 'Otro'
                                            END AS clasificacion,
                                            fecha, zona, invitados,
                                            CASE 
                                                WHEN repeticion = 'N' THEN 'No'
                                                WHEN repeticion = 'S' THEN 'Si'
                                            END AS repeticion,
                                            CASE 
                                                WHEN recordatorio = 'N' THEN 'No'
                                                WHEN recordatorio = 'S' THEN 'Si'
                                            END AS recordatorio, 
                                            (SELECT nombre FROM . $this->table3_name WHERE eventos.identificacion = contactos.identificacion) AS identificacion, 
                                            (SELECT direccion FROM . $this->table2_name WHERE eventos.codigo_ubicacion = ubicaciones.codigo_ubicacion) AS codigo_ubicacion 
                                            FROM " . $this->table_name . " WHERE codigo_evento = :codigo_evento";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":codigo_evento", $codigo_evento);
            $stmt->execute();
            
            //echo "Consulta de VER EVENTO ejecutada correctamente.--------"; 
            
        //} catch (PDOException $e) { echo "Error ejecutando la consulta de VER EVENTO " . $e->getMessage() . "<br>"; }
        
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Funcion para obtener un Evento
    public function obtenerEvento() {
        //try {
            $query = "SELECT codigo_evento, descripcion, fecha, zona, codigo_ubicacion, (SELECT direccion FROM . $this->table2_name WHERE eventos.codigo_ubicacion = ubicaciones.codigo_ubicacion) AS ubicacion, tipo, clasificacion, invitados, repeticion, recordatorio, identificacion FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
            
        //    echo "Consulta de OBTENER EVENTO ejecutada correctamente.--------"; 
            
            
        //} catch (PDOException $e) { echo "Error ejecutando la consulta de OBTENER EVENTO " . $e->getMessage() . "<br>"; }
        
        return $stmt;
    }
	      
    //Funcion para agregar un Evento
    public function agregarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona,
                                    $invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion) {
        
        $query = "INSERT INTO " . $this->table_name . " VALUES (:codigo_evento, :tipo, :descripcion, :clasificacion, :fecha, :zona, " . 
                                                                " :invitados, :repeticion, :recordatorio, :identificacion, :codigo_ubicacion )";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":codigo_evento", $codigo_evento);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":clasificacion", $clasificacion);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":zona", $zona);
        $stmt->bindParam(":invitados", $invitados);
        $stmt->bindParam(":repeticion", $repeticion);
        $stmt->bindParam(":recordatorio", $recordatorio);
        $stmt->bindParam(":identificacion", $identificacion);
        $stmt->bindParam(":codigo_ubicacion", $codigo_ubicacion);

        return $stmt->execute();
    }

    //Funcion para editar un Evento
    public function editarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona,
                                   $invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion) {
               
        $query = "UPDATE " . $this->table_name . " " .
                 "SET tipo = :tipo, descripcion = :descripcion, clasificacion = :clasificacion, fecha = :fecha, zona = :zona,
                      invitados = :invitados, repeticion = :repeticion, recordatorio = :recordatorio, identificacion = :identificacion, codigo_ubicacion = :codigo_ubicacion " .
                 "WHERE codigo_evento = :codigo_evento;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":codigo_evento", $codigo_evento);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":clasificacion", $clasificacion);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":zona", $zona);
        $stmt->bindParam(":invitados", $invitados);
        $stmt->bindParam(":repeticion", $repeticion);
        $stmt->bindParam(":recordatorio", $recordatorio);
        $stmt->bindParam(":identificacion", $identificacion);
        $stmt->bindParam(":codigo_ubicacion", $codigo_ubicacion);
        
        return $stmt->execute();
    }

    //Funcion para eliminar un Evento
    public function eliminarEvento($codigo_evento) {
        $query = "DELETE FROM " . $this->table_name . " WHERE codigo_evento = :codigo_evento";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":codigo_evento", $codigo_evento);

        return $stmt->execute();
    }
}
?>
