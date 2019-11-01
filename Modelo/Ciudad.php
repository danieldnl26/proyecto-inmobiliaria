<?php
require_once('conexion.php');

class Ciudad extends conexion{
	
        private $idCiudad;
        private $Ciudad;
         private $Departamento_idDepartamento;
         
         
         
         
         public function getIdCiudad() {
             return $this->idCiudad;
         }

         public function getCiudad() {
             return $this->Ciudad;
         }

         public function getDepartamento_idDepartamento() {
             return $this->Departamento_idDepartamento;
         }

         public function setIdCiudad($idCiudad) {
             $this->idCiudad = $idCiudad;
         }

         public function setCiudad($Ciudad) {
             $this->Ciudad = $Ciudad;
         }

         public function setDepartamento_idDepartamento($Departamento_idDepartamento) {
             $this->Departamento_idDepartamento = $Departamento_idDepartamento;
         }

         
                 
    function __destruct() {
        $this->Disconnect();
    }

    public function __construct($user_data=array()){
        parent::__construct();
        if(count($user_data)>=1){
            foreach ($user_data as $campo=>$valor){
                $this->$campo = $valor;
            }
        }else {
             $this->idCiudad = "";
             $this->Ciudad = "";
            $this->Departamento_idDepartamento = "";
         
       
        }
    }

    public function insertar(){
        $this->insertRow("INSERT INTO ciudad VALUES ('NULL', ?, ?)", array(
            
             $this->Ciudad,
             $this->Departamento_idDepartamento
                
                ));
        $this->Disconnect();
    }
    
    public function editar(){
        $arrCategoria = (array) $this;
        $this->updateRow("UPDATE categoria SET Tipo = ? set Nombre = ?  WHERE idcategoria = ?",array( 
              $this->Tipo,
              $this->Nombre,   
              $this->idCategoria
            )
        );
        $this->Disconnect();
    }

    public function eliminar(){
        $arrCategoria = (array) $this;
        $this->updateRow("DELETE FROM categoria WHERE idcategoria = ?", array($this->idcategoria));
        $this->Disconnect();    
    }

    public static function getAll(){
        return categoria::buscar("SELECT * FROM categoria");
    }
//    public static function BuscarDep($depart){
//        return Ciudad::buscar("SELECT * FROM ciudad WHERE Departamento_idDepartamento = '".$depart."' ");
//    }
    public static function BuscarDep($depart){
        $tmp = new Ciudad();
        $query = $tmp->getRows("SELECT * FROM ciudad WHERE Departamento_idDepartamento = ".$depart." ");
        $tmp->Disconnect();
        return $query;
    }
	
    public static function buscarForId($id){
        if ($id > 0){
                $cat = new Ciudad();
                $getrow = $cat->getRow("SELECT  FROM ciudad WHERE Departamento_idDepartamento =?", array($id));
                $cat->idCiudad = $getrow['idCiudad'];
                $cat->Ciudad = $getrow['Ciudad'];
                $cat->Disconnect();
                return $cat;
        }else{
                return NULL;
        }
        $this->Disconnect();
    }
    
    public static function buscar($query){
        $arrCiudad= array();
        $tmp = new Ciudad();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $cat = new Ciudad();
            $cat->idCiudad = $valor['idCiudad'];
            $cat->Ciudad = $valor['Ciudad'];
            array_push($arrCiudad, $cat);
        }
        $tmp->Disconnect();
        return $arrCiudad;
    }
    public static function selectAll(){
        $tmp = new categoria();
        $query = $tmp->getRows('SELECT * FROM  ciudad');
        $tmp->Disconnect();
        return $query;
    }
}
?>