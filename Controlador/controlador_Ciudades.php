<?php
require_once(__DIR__.'/../Modelo/Ciudad.php');
    if (!empty($_GET['action'])) {
        controlador_Ciudades::main($_GET['action']);
        $action = $_GET['action'];
    }
        class controlador_Ciudades {
	
	static function main($action){
		if ($action == "crear"){
			controlador_Vehiculo::crear();
		}else if ($action == "editar"){
                    controlador_Vehiculo::editar();
		}else if ($action == "buscarID"){
			controlador_Vehiculo::buscarID(1);
		}else if ($action == "eliminar"){
			controlador_Vehiculo::eliminar($_GET['id']);
		}else if ($action == "getCiudades"){
			controlador_Ciudades::buscarCiudades($_GET['dep']);
		}
	}
        
        static public function buscarCiudades($depart){
            $ciudades = Ciudad::buscar("SELECT * FROM ciudad WHERE Departamento_idDepartamento = '".$depart."' ");
            $respuesta = array();
            foreach($ciudades as $ciudad){
                $respuesta[$ciudad->getIdCiudad()] = $ciudad->getCiudad();
            }
            echo json_encode($respuesta);
        }
	
	
	
	
	
	
	static public function buscarID ($id){
		try { 
                    return Ciudad::buscarForId($id);
                } catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error&o=encontrad");
		}
	}
	
	static public function buscarAll (){
		try {
			return Ciudad::getAll();
                        
		} catch (Exception $e) {
			header("Location: ../views/verElementos.php?respuesta=error&o=encontrad");
		}
	}

	public function buscar ($campo, $parametro){
		try {
			return Ciudad::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error&o=encontrad");
		}
	}
        
        static public function eliminar ($id){
		try { 
                        $arrayCiudad = array();
			$arrayCiudad['idCiudad'] = $id;
			var_dump($arrayCiudad);
			$elemento = new elemento ($arrayCiudad);
			$elemento->eliminar();
			
                        header("Location: ../views/verElementos.php?respuesta=correcto&o=eliminad");
		} catch (Exception $e) {
			header("Location: ../views/verElementos.php?respuesta=error&o=eliminad");
		}
	}
        
	
    }
        
?>