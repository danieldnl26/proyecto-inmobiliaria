<?php
require_once('../Modelo/conexion.php');

class Marca extends conexion{
	
        private $idMarca;
        private $marca;
        
       
        public function getIdMarca() {
            return $this->idMarca;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }

        public function setMarca($marca) {
            $this->marca = $marca;
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
             
             $this->marca= "";
           
         
       
        }
    }

    public function insertar(){
        $this->insertRow("INSERT INTO marca VALUES ('NULL', ?)", array(
            
             $this->marca
            
                
                ));
        $this->Disconnect();
    }
    
    public function editar(){
        $arrCategoria = (array) $this;
        $this->updateRow("UPDATE marca SET Tipo = ? set Nombre = ?  WHERE idcategoria = ?",array( 
             
              $this->Marca,   
              $this->idMarca
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
	
    public static function buscarForId($id){
        if ($id > 0){
        $cat = new Marca();
                $getrow = $cat->getRow("SELECT * FROM marca WHERE idMarca =?", array($id));
                $cat->idcategoria = $getrow['idMarca'];
                $cat->marca = $getrow['Marca'];
                $cat->Disconnect();
                return $cat;
        }else{
                return NULL;
        }
        $this->Disconnect();
    }
    
    public static function buscar($query){
        $arrMarca = array();
        $tmp = new categoria();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Mar = new categoria();
            $Mar->idMarca = $valor['idMarca'];
            $Mar->Nombre = $valor['Marca'];
            array_push($arrMarca, $Mar);
        }
        $tmp->Disconnect();
        return $arrCategoria;
    }
    
     public static function selectAll() {
        $us = new Marca();
        $query = $us->getRows('SELECT * FROM marca');
        $us->Disconnect ();
        return $query;
        
    }
}
?>