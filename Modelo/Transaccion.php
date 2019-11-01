<?php
require_once('../Modelo/Conexion.php');
class Transaccion extends conexion{
	
        private $idTransaccion;
        private $TipoTransaccion;
        private $Estado;
        private $Fecha;
        private $Valor;
        private $Vehiculo_idVehiculo;
        private $Inmueble_idInmueble;
        
        
        function getIdTransaccion() {
            return $this->idTransaccion;
        }

        function getTipoTransaccion() {
            return $this->TipoTransaccion;
        }

        function getEstado() {
            return $this->Estado;
        }

        function getFecha() {
            return $this->Fecha;
        }

        function getValor() {
            return $this->Valor;
        }

        function getVehiculo_idVehiculo() {
            return $this->Vehiculo_idVehiculo;
        }

        function getInmueble_idInmueble() {
            return $this->Inmueble_idInmueble;
        }

        function setIdTransaccion($idTransaccion) {
            $this->idTransaccion = $idTransaccion;
        }

        function setTipoTransaccion($TipoTransaccion) {
            $this->TipoTransaccion = $TipoTransaccion;
        }

        function setEstado($Estado) {
            $this->Estado = $Estado;
        }

        function setFecha($Fecha) {
            $this->Fecha = $Fecha;
        }

        function setValor($Valor) {
            $this->Valor = $Valor;
        }

        function setVehiculo_idVehiculo($Vehiculo_idVehiculo) {
            $this->Vehiculo_idVehiculo = $Vehiculo_idVehiculo;
        }

        function setInmueble_idInmueble($Inmueble_idInmueble) {
            $this->Inmueble_idInmueble = $Inmueble_idInmueble;
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
                    $this->idTransaccion = "";
                    $this->TipoTransaccion = "";
                    $this->Estado = "";
                    $this->Fecha = "";
                    $this->Valor = "";
                    $this->Vehiculo_idVehiculo = "";
                    $this->Inmueble_idInmueble = "";
                   
                    
		}
    }

    public function insertar(){
        
    }
    
    public function insertarVehiculo(){
        
        $this->insertRow("INSERT INTO transaccion (idTransaccion,TipoTransaccion,Estado,Fecha,Valor,Vehiculo_idVehiculo) VALUES ('NULL', ?, 'Activo', ?, ?, ?)", array(
                
                  
                    $this->TipoTransaccion,
                    $this->Fecha,
                    $this->Valor,
                    $this->Vehiculo_idVehiculo
            )
        );
        $this->Disconnect();
    }
    
     public function insertarInmueble(){
        
        $this->insertRow("INSERT INTO transaccion  (idTransaccion,TipoTransaccion,Estado,Fecha,Valor,Inmueble_idInmueble)VALUES ('NULL', ?, 'Activo', ?, ?, ?)", array(
                
                  
                    $this->TipoTransaccion,
                    $this->Fecha,
                    $this->Valor,
                    $this->Inmueble_idInmueble
                    
            )
        );
        $this->Disconnect();
    }
    
    
    
    public function editar(){
        $arrInmueble = (array) $this;
        $this->updateRow("UPDATE transaccion SET TipoTransaccion = ?, Estado = ?, Fecha = ?, Valor = ?, Vehiculo_idVehiculo = ?, Inmueble_idInmueble = ? WHERE idTransaccion = ?",array( 
                    $this->TipoTransaccion,
                    $this->Estado,
                    $this->Fecha,
                    $this->Valor,
                    $this->Vehiculo_idVehiculo,
                    $this->Inmueble_idInmueble,
                    $this->idTransaccion
            )
        );
        $this->Disconnect();
    }

    public static function getAll(){
        return Inmueble::buscar("1");
    }
	
    public static function buscarForId($id){
        if ($id > 0){
                $Transaccion = new Transaccion();
                $getrow = $Transaccion->getRow("SELECT * FROM transaccion WHERE idTransaccion =?", array($id));
                $Transaccion->idTransaccion = $getrow['idTransaccion'];
                $Transaccion->TipoTransaccion = $getrow['TipoTransaccion'];
                $Transaccion->Estado = $getrow['Estado'];
                $Transaccion->Fecha = $getrow['Fecha'];
                $Transaccion->Valor = $getrow['Valor'];
                $Transaccion->Vehiculo_idVehiculo = $getrow['Vehiculo_idVehiculo'];
                $Transaccion->Inmueble_idInmueble = $getrow['Inmueble_idInmueble'];
                
               
                $inmueble->Disconnect();
                
                
                return $Transaccion;
        }else{
                return NULL;
        }
        $this->Disconnect();
    }
    
    public static function buscar($query){
        $arrTransaccion = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT * FROM transaccion WHERE ".$query);

        foreach ($getrows as $valor) {
                $Transaccion = new Transaccion();
                $Transaccion->idTransaccion = $valor['idTransaccion'];
                $Transaccion->TipoTransaccion = $valor['TipoTransaccion'];
                $Transaccion->Estado = $valor['Estado'];
                $Transaccion->Fecha = $valor['Fecha'];
                $Transaccion->Valor = $valor['Valor'];
                $Transaccion->Vehiculo_idVehiculo = $valor['Vehiculo_idVehiculo'];
                $Transaccion->Inmueble_idInmueble = $valor['Inmueble_idInmueble'];
               
            array_push($arrTransaccion, $Transaccion);
        }
        $tmp->Disconnect();
        return $arrTransaccion;
    }

    public function eliminar(){
        $arrInmueble = (array) $this;
        $this->updateRow("DELETE FROM transaccion WHERE idTransaccion = ?", array($this->idTransaccion ));
        $this->Disconnect();    
    }

    protected static function selectAll() {
        
    }

    public static function ultimo() {
        
        $arrVehiculo = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT idTransaccion FROM transaccion");
        if (count($getrows) > 0) {
            foreach ($getrows as $valor) {
                $nultimo = $valor['idTransaccion'];
            }
            return $nultimo;
        } else {
            return 1;
        }
    }
    
    public static function Comprador() {
        
        $arrVehiculo = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT idTipoPersona FROM tipopersona where Tipopersona = 'Comprador'");

        foreach ($getrows as $valor) {
            $nultimo = $valor['idTipoPersona'];
        }
        return $nultimo;
    }
    
    public static function Vendedor() {
        
        $arrVehiculo = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT idTipoPersona FROM tipopersona where Tipopersona = 'Vendedor'");

        foreach ($getrows as $valor) {
            $nultimo = $valor['idTipoPersona'];
        }
        return $nultimo;
    }
    
    public static function Testigo() {
        
        $arrVehiculo = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT idTipoPersona FROM tipopersona where Tipopersona = 'Testigo'");

        foreach ($getrows as $valor) {
            $nultimo = $valor['idTipoPersona'];
        }
        return $nultimo;
    }
}

