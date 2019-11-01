<?php
require_once('conexion.php');

class categoria extends conexion{
	
        private $idCategoria;
        private $Tipo;
        private $Nombre;
	
        public function getIdCategoria() {
            return $this->idCategoria;
        }
        public function getTipo() {
            return $this->Tipo;
        }
        public function getNombre() {
            return $this->Nombre;
        }

        public function setIdCategoria($idCategoria) {  
            $this->idCategoria = $idCategoria;
        }
        public function setTipo($idTipo) {
            $this->idTipo = $idTipo;
        }
        public function setNombre($Nombre) {
            $this->Nombre = $Nombre;
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
            $this->Tipo = "";
            $this->Nombre = "";
        }
    }

    public function insertar(){
        $this->insertRow("INSERT INTO Categoria VALUES ('NULL', ?,?)", array($this->Tipo,$this->Nombre));
        $this->Disconnect();
    }
    
    public function editar(){
        $arrCategoria = (array) $this;
        $this->updateRow("UPDATE Categoria SET Tipo = ? Nombre = ? WHERE idCategoria = ?",array( 
                $this->Tipo,
                $this->Nombre,
                $this->idCategoria,
            )
        );
        $this->Disconnect();
    }

    public function eliminar(){
        $arrCategoria = (array) $this;
        $this->updateRow("DELETE FROM Categoria WHERE idCategoria = ?", array($this->idCategoria));
        $this->Disconnect();    
    }

    public static function getAll(){
        return categoria::buscar("SELECT * FROM Categoria");
    }
	
    public static function buscarForId($id){
        if ($id > 0){
                $cat = new categoria();
                $getrow = $cat->getRow("SELECT * FROM Categoria WHERE idCategoria =?", array($id));
                $cat->idcategoria = $getrow['idCategoria'];
                $cat->Tipo = $getrow['Tipo'];
                $cat->Nombre = $getrow['Nombre'];
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
            $cat->idCategoria = $valor['idCategoria'];
            $cat->Tipo = $valor['Tipo'];
            $cat->Nombre = $valor['Nombre'];
            array_push($arrCategoria, $cat);
        }
        $tmp->Disconnect();
        return $arrCategoria;
    }
    public static function selectAll(){
        $tmp = new categoria();
        $query = $tmp->getRows("SELECT * FROM  Categoria where Tipo='Vehiculo'");
        $tmp->Disconnect();
        return $query;
    }
    public static function selectAllImu(){
        $tmp = new categoria();
        $query = $tmp->getRows("SELECT * FROM  Categoria where Tipo='Inmueble'");
        $tmp->Disconnect();
        return $query;
    }
}
?>
