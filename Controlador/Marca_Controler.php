<?php

require_once (__DIR__.'/../Modelo/Marca.php');
//include_once '../clases/equipo_class.php';

if(!empty($_GET['action'])){
   Marca_controler::main($_GET['action']);
}


class Marca_controler {
    
    static function main($action){
		if ($action == "insertar"){
			Marca_controler::insertar();
    }
    
                }
                
                static public function insertar (){
		try {
			$arrayUsuarios = array();
			$arrayUsuarios['marca'] = $_POST['marca'];
			
                        var_dump($arrayUsuarios);
			$usuario = new Marca($arrayUsuarios);
			$usuario->insertar();
			header("Location: ../Vista/RegistroVehiculos.php?respuesta=correcto&o=cread");
		} catch (Exception $e) {
			header("Location: ../Vista/RegistroVehiculos.php?respuesta=error&o=cread");
		}
	}
                
                
                
}
