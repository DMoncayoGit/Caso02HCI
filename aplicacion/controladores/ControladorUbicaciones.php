<?php

require_once "../configuracion/base_datos.php";
require_once "../modelos/ModeloUbicaciones.php";

class UbicacionController {

    // Variables

    private $db;
    private $ubicacion;

    //Funcion para un constructor
    public function __construct() {
        $this->db = new Database();
        $this->ubicacion = new Ubicacion($this->db->getConnection());
    }

    //Funcion para obtener una Ubicacion
    public function obtenerUbicacion() {
        $stmt = $this->ubicacion->obtenerUbicacion();
        $ubicacion_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ubicacion_item = array(
                'codigo_ubicacion' => $row['codigo_ubicacion'],
                'direccion' => $row['direccion'],
                'latitud' => $row['latitud'],
                'longitud' => $row['longitud']
            );
            array_push($ubicacion_arr, $ubicacion_item);
        }

        echo json_encode($ubicacion_arr);
    }
	
    //Funcion para agregar una Ubicacion
    public function agregarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud) {
        if (empty($codigo_ubicacion) || empty($direccion) ||  empty($latitud) || empty($longitud) ) { return; }
        $stmt = $this->ubicacion->agregarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud);
    }

    //Funcion para editar una Ubicacion
    public function editarUbicacion() {
        if (isset($_POST['codigo_ubicacion']) && isset($_POST['direccion']) && isset($_POST['latitud']) && isset($_POST['longitud'])) {
            $codigo_ubicacion = $_POST['codigo_ubicacion'];
            $direccion = $_POST['direccion'];
            $latitud = $_POST['latitud'];
            $longitud = $_POST['longitud'];
            
            $resultado = $this->ubicacion->editarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud);

        } else { return; }
    }

    //Funcion para eliminar una Ubicacion
	public function eliminarUbicacion($codigo_ubicacion) {
		if (empty($codigo_ubicacion)) { return; }
		$stmt = $this->ubicacion->eliminarUbicacion($codigo_ubicacion);
	}
        
}

if (isset($_GET['action'])) {
	
    $controller = new UbicacionController();

    if ($_GET['action'] == 'obtenerUbicacion') { $controller->obtenerUbicacion(); }
	
    if ($_GET['action'] == 'agregarUbicacion' && isset($_POST['codigo_ubicacion']) 
		                                      && isset($_POST['direccion'])
                                              && isset($_POST['latitud']) 
											  && isset($_POST['longitud']) ) {
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $direccion = $_POST['direccion'];
        $latitud =   $_POST['latitud'];
        $longitud =  $_POST['longitud'];
        $controller->agregarUbicacion($codigo_ubicacion, $direccion, $latitud, $longitud);
    }

    if ($_GET['action'] == 'editarUbicacion') { $controller->editarUbicacion(); }
    
    if ($_GET['action'] == 'eliminarUbicacion' && isset($_GET['codigo_ubicacion'])) {
        $codigo_ubicacion = $_GET['codigo_ubicacion']; 
        $controller->eliminarUbicacion($codigo_ubicacion);
    }
      
}
?>
