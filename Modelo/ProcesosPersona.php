<?php

require_once('../Modelo/Conexion.php');

class ProcesosPersona extends conexion {

    private $idProcesosPersona;
    private $Transaccion_idTransaccion;
    private $TipoPersona_idTipoPersona;
    private $Persona_idPersona;

    public function getIdProcesosPersona() {
        return $this->idProcesosPersona;
    }

    public function getTransaccion_idTransaccion() {
        return $this->Transaccion_idTransaccion;
    }

    public function getTipoPersona_idTipoPersona() {
        return $this->TipoPersona_idTipoPersona;
    }

    public function getPersona_idPersona() {
        return $this->Persona_idPersona;
    }

    public function setIdProcesosPersona($idProcesosPersona) {
        $this->idProcesosPersona = $idProcesosPersona;
    }

    public function setTransaccion_idTransaccion($Transaccion_idTransaccion) {
        $this->Transaccion_idTransaccion = $Transaccion_idTransaccion;
    }

    public function setTipoPersona_idTipoPersona($TipoPersona_idTipoPersona) {
        $this->TipoPersona_idTipoPersona = $TipoPersona_idTipoPersona;
    }

    public function setPersona_idPersona($Persona_idPersona) {
        $this->Persona_idPersona = $Persona_idPersona;
    }

    function __destruct() {
        $this->Disconnect();
    }

    public function __construct($user_data = array()) {
        parent::__construct();
        if (count($user_data) >= 1) {
            foreach ($user_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idProcesosPersona = "";
            $this->Transaccion_idTransaccion = "";
            $this->TipoPersona_idTipoPersona = "";
            $this->Persona_idPersona = "";
        }
    }

    public function insertar() {

        $this->insertRow("INSERT INTO procesosPersona VALUES ('NULL', ?, ?, ?)", array(
            $this->Transaccion_idTransaccion,
            $this->TipoPersona_idTipoPersona,
            $this->Persona_idPersona
                )
        );
        $this->Disconnect();
    }

    public function editar() {
        $arrInmueble = (array) $this;
        $this->updateRow("UPDATE ProcesosPersona SET Transaccion_idTransaccion = ?, TipoPersona_idTipoPersona = ?, Persona_idPersona = ? WHERE idPersona_idPersona = ?", array(
            $this->Transaccion_idTransaccion,
            $this->TipoPersona_idTipoPersona,
            $this->Persona_idPersona,
            $this->idProcesosPersona
                )
        );
        $this->Disconnect();
    }

    public static function getAll() {
        return Inmueble::buscar("1");
    }

    public static function buscarForId($id) {
        if ($id > 0) {
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
        } else {
            return NULL;
        }
        $this->Disconnect();
    }

    public static function buscar($query) {
        $arrTransaccion = array();
        $tmp = new Transaccion();
        $getrows = $tmp->getRows("SELECT * FROM transaccion WHERE " . $query);

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

    public function eliminar() {
        $arrInmueble = (array) $this;
        $this->updateRow("DELETE FROM transaccion WHERE idTransaccion = ?", array($this->idTransaccion));
        $this->Disconnect();
    }

    protected static function selectAll() {
        
    }

}
