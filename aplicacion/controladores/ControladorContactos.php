<?php

require_once "../configuracion/base_datos.php";
require_once "../modelos/ModeloContactos.php";

class ContactoController {

    // Variables

    private $db;
    private $contacto;

    //Funcion para un constructor
    public function __construct() {
        $this->db = new Database();
        $this->contacto = new Contacto($this->db->getConnection());

    }

    //Funcion para mostrar un Contacto
    public function mostrarContacto($identificacion) { 
        $stmt = $this->contacto->mostrarContacto($identificacion); 
        echo json_encode($stmt); 
    }

    //Funcion para obtener un Contacto
    public function obtenerContacto() {
        $stmt = $this->contacto->obtenerContacto();
        $contacto_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacto_item = array(
                'identificacion' => $row['identificacion'],
                'nombre' => $row['nombre'],
                'correo' => $row['correo'],
                'telefono' => $row['telefono'],
                'saludo' => $row['saludo'],
                'fotografia' => $row['fotografia']
            );
            array_push($contacto_arr, $contacto_item);
        }

        echo json_encode($contacto_arr);
    }
	
    //Funcion para agregar un Contacto
    public function agregarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia) {
        if (empty($identificacion) || empty($nombre) ||  empty($saludo) || empty($correo) || empty($telefono) || empty($fotografia)) { return; }
        $stmt = $this->contacto->agregarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia);
    }

    //Funcion para editar un Contacto
    public function editarContacto() {
        if (isset($_POST['identificacion']) && isset($_POST['nombre']) && isset($_POST['saludo']) 
            && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['fotografia'])) {

            $identificacion = $_POST['identificacion'];
            $nombre = $_POST['nombre'];
            $saludo =   $_POST['saludo'];
            $correo =  $_POST['correo'];
            $telefono =   $_POST['telefono'];
            $fotografia =  $_POST['fotografia'];
            
            $resultado = $this->contacto->editarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia);

        } else { return; }
    }

    //Funcion para eliminar un Contacto
	public function eliminarContacto($identificacion) {
		if (empty($identificacion)) { return; }
		$stmt = $this->contacto->eliminarContacto($identificacion);
	}
        
}

if (isset($_GET['action'])) {
	
    $controller = new ContactoController();

    if ($_GET['action'] == 'mostrarContacto') { $identificacion = $_GET['identificacion'];
                                                $controller->mostrarContacto($identificacion); }

    if ($_GET['action'] == 'obtenerContacto') { $controller->obtenerContacto(); }
	
    if ($_GET['action'] == 'agregarContacto' && isset($_POST['identificacion']) 
		                                     && isset($_POST['nombre'])
                                             && isset($_POST['saludo']) 
											 && isset($_POST['correo'])
                                             && isset($_POST['telefono'])
                                             && isset($_POST['fotografia']) ) {
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $saludo =   $_POST['saludo'];
        $correo =  $_POST['correo'];
        $telefono =   $_POST['telefono'];
        $fotografia =  $_POST['fotografia'];
        $controller->agregarContacto($identificacion, $nombre, $saludo, $correo, $telefono, $fotografia);
    }

    if ($_GET['action'] == 'editarContacto') { $controller->editarContacto(); }
    
    if ($_GET['action'] == 'eliminarContacto' && isset($_GET['identificacion'])) {
        $identificacion = $_GET['identificacion']; 
        $controller->eliminarContacto($identificacion);
    }
      
}
?>
