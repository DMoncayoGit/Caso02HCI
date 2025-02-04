<?php

require_once "../configuracion/base_datos.php";
require_once "../modelos/ModeloEventos.php";

class EventoController {

    // Variables

    private $db;
    private $evento;

    //Funcion para un constructor
    public function __construct() {
        $this->db = new Database();
        $this->evento = new Evento($this->db->getConnection());
    }

    //Funcion para obtener un Contacto
    public function obtenerContactos() {
        $stmt = $this->evento->obtenerContactos();
        $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($contactos);
    }

    //Funcion para obtener una Ubicacion
    public function obtenerUbicaciones() {
        $stmt = $this->evento->obtenerUbicaciones();
        $ubicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($ubicaciones);
    }

    //Funcion para mostrar un Evento
	public function mostrarEvento($codigo_evento) { 
	    //try {
            $stmt = $this->evento->mostrarEvento($codigo_evento); 
            /*if (!$stmt) { 
                throw new Exception("Error en obtener Evento del modelo."); 
            } else {
                echo("obtener Evento del modelo. CORRECTO-----");}
                echo json_encode($stmt);
                
        } catch (Exception $e) { 
                    echo("----ERROR  ----");
                    echo json_encode(array("error" => $e->getMessage()));}
          */  
                
            echo json_encode($stmt); 
    }
	
    //Funcion para obtener un Evento
    public function obtenerEvento() {
        $stmt = $this->evento->obtenerEvento();
        $evento_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $evento_item = array(
                'codigo_evento' => $row['codigo_evento'],
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
                'zona' => $row['zona'],
                'ubicacion' => $row['ubicacion'],
                'codigo_ubicacion' => $row['codigo_ubicacion'],
                'tipo' => $row['tipo'],
                'clasificacion' => $row['clasificacion'],
                'invitados' => $row['invitados'],
                'repeticion' => $row['repeticion'],
                'recordatorio' => $row['recordatorio'],
                'identificacion' => $row['identificacion']
                
            );
            array_push($evento_arr, $evento_item);
        }

        echo json_encode($evento_arr);
    }
    
    /*public function obtenerEvento() {
        try {

            $stmt = $this->evento->obtenerEvento();

            if (!$stmt) { 
                throw new Exception("Error en obtener Evento del modelo."); 
            } else {
                echo("obtener Evento del modelo. CORRECTO-----");

                $evento_arr = array();
                
                try {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        //var_dump($row); //

                        $evento_item = array(
                            'codigo_evento' => $row['codigo_evento'],
                            'descripcion' => $row['descripcion'],
                            'fecha' => $row['fecha'],
                            'zona' => $row['zona'],
                            'codigo_ubicacion' => $row['codigo_ubicacion']
                        );
                        array_push($evento_arr, $evento_item);
                        //var_dump($evento_arr); //
                        //var_dump($evento_item); //
                    }

                    //var_dump($evento_arr); //
                    
                    echo json_encode($evento_arr);

                } catch (Exception $e) { 
                    echo("----ERROR  ----");
                    echo json_encode(array("error" => $e->getMessage())); 
                }
            }
            
        } catch (Exception $e) { echo json_encode(array("error" => $e->getMessage())); }
            
    }*/
    
    
    //Funcion para agregar un Evento
    public function agregarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona,$invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion) {
        
        if (empty($codigo_evento) || empty($tipo) ||  empty($descripcion) || empty($clasificacion) ||
            empty($fecha) || empty($zona) ||  empty($invitados) || empty($repeticion) ||
            empty($recordatorio) || empty($identificacion) || empty($codigo_ubicacion) ) { return; }
        
        
        $stmt = $this->evento->agregarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona, $invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion);
        
    }

    //Funcion para editar un Evento
    public function editarEvento() {
        if (isset($_POST['codigo_evento']) && isset($_POST['tipo']) && isset($_POST['descripcion']) && isset($_POST['clasificacion'])
            && isset ($_POST['fecha']) && isset($_POST['zona']) && isset($_POST['invitados']) && isset($_POST['repeticion'])
            && isset ($_POST['recordatorio']) && isset($_POST['identificacion']) && isset($_POST['codigo_ubicacion'])) {
            
            $codigo_evento = $_POST['codigo_evento'];
            $tipo = $_POST['tipo'];
            $descripcion = $_POST['descripcion'];
            $clasificacion = $_POST['clasificacion'];
            $fecha = $_POST['fecha'];
            $zona = $_POST['zona'];
            $invitados = $_POST['invitados'];
            $repeticion = $_POST['repeticion'];
            $recordatorio = $_POST['recordatorio'];
            $identificacion = $_POST['identificacion'];
            $codigo_ubicacion = $_POST['codigo_ubicacion'];
            
            $resultado = $this->evento->editarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona, $invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion);

        } else { return; }
    }

    //Funcion para eliminar un Evento
	public function eliminarEvento($codigo_evento) {
		if (empty($codigo_evento)) { return; }
		$stmt = $this->evento->eliminarEvento($codigo_evento);
	}
        
}

if (isset($_GET['action'])) {
	
    $controller = new EventoController();

    if ($_GET['action'] == 'obtenerContactos') { $controller->obtenerContactos(); }
    
    if ($_GET['action'] == 'obtenerUbicaciones') { $controller->obtenerUbicaciones(); }

    // Mostrar productos
    if ($_GET['action'] == 'mostrarEvento') { $codigo_evento = $_GET['codigo_evento']; 
                                            $controller->mostrarEvento($codigo_evento);}


    if ($_GET['action'] == 'obtenerEvento') { $controller->obtenerEvento(); }
	
    if ($_GET['action'] == 'agregarEvento' && isset($_POST['codigo_evento']) 
		                                   && isset($_POST['tipo'])
                                           && isset($_POST['descripcion']) 
										   && isset($_POST['clasificacion'])
                                           && isset($_POST['fecha'])
                                           && isset($_POST['zona']) 
										   && isset($_POST['invitados'])
                                           && isset($_POST['repeticion'])
                                           && isset($_POST['recordatorio']) 
										   && isset($_POST['identificacion']) 
                                           && isset($_POST['codigo_ubicacion'])) {
        $codigo_evento = $_POST['codigo_evento'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $clasificacion = $_POST['clasificacion'];
        $fecha = $_POST['fecha'];
        $zona = $_POST['zona'];
        $invitados = $_POST['invitados'];
        $repeticion = $_POST['repeticion'];
        $recordatorio = $_POST['recordatorio'];
        $identificacion = $_POST['identificacion'];
        $codigo_ubicacion = $_POST['codigo_ubicacion'];

        $controller->agregarEvento($codigo_evento, $tipo, $descripcion, $clasificacion, $fecha, $zona,
                                   $invitados, $repeticion, $recordatorio, $identificacion, $codigo_ubicacion);
    }

    if ($_GET['action'] == 'editarEvento') { $controller->editarEvento(); }
    
    if ($_GET['action'] == 'eliminarEvento' && isset($_GET['codigo_evento'])) {
        $codigo_evento = $_GET['codigo_evento']; 
        $controller->eliminarEvento($codigo_evento);
    }
      
}
?>
