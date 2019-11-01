<?php
require_once('conexion.php');

class Departamento extends conexion{
	
        private $idDepartamento;
        private $Departamento;
    
        public function getIdDepartamento() {
            return $this->idDepartamento;
        }

        public function getDepartamento() {
            return $this->Departamento;
        }

        public function setIdDepartamento($idDepartamento) {
            $this->idDepartamento = $idDepartamento;
        }

        public function setDepartamento($Departamento) {
            $this->Departamento = $Departamento;
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
             $this->idDepartamento = "";
             $this->Departamento = "";
        
         
       
        }
    }

    public function insertar(){
        $this->insertRow("INSERT INTO departamento VALUES ('NULL', ?)", array(
            
             $this->idDepartamento,
             $this->Departamento
                
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
    
    public static function selectAllM(){
        $tmp = new categoria();
        $query = $tmp->getRows('SELECT * FROM  departamento');
        $tmp->Disconnect();
        return $query;
    }
	
    public static function buscarForId($id){
        if ($id > 0){
                $cat = new categoria();
                $getrow = $cat->getRow("SELECT * FROM categoria WHERE idcategoria =?", array($id));
                $cat->idcategoria = $getrow['idcategoria'];
                $cat->nombre = $getrow['nombre'];
                $cat->Disconnect();
                return $cat;
        }else{
                return NULL;
        }
        $this->Disconnect();
    }
    
    public static function buscar($query){
        $arrCategoria = array();
        $tmp = new categoria();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $cat = new categoria();
            $cat->idCategoria = $valor['idcategoria'];
            $cat->Nombre = $valor['Nombre'];
            array_push($arrCategoria, $cat);
        }
        $tmp->Disconnect();
        return $arrCategoria;
    }
    public static function selectAll(){
        $tmp = new categoria();
        $query = $tmp->getRows('SELECT * FROM  departamento');
        $tmp->Disconnect();
        return $query;
    }
}
?>