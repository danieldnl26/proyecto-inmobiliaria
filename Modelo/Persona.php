<?php

require_once('Conexion.php');

class Persona extends conexion {

    private $idPersona;
    private $documento;
    private $nombres;
    private $apellidos;
    private $fecha;
    private $telefono;
    private $correo;
    private $direccion;
    private $barrio;
    private $contrasena;
    private $pregunta;
    private $respuesta;
    private $ciudad;
    private $departamento;

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getBarrio() {
        return $this->barrio;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setBarrio($barrio) {
        $this->barrio = $barrio;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    function __destruct() {
        $this->Disconnect();
    }

    public function __construct($admin = array()) {
        parent::__construct();
        if (count($admin) >= 1) {
            foreach ($admin as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->documento = "";
            $this->nombres = "";
            $this->apellidos = "";
            $this->fecha = "";
            $this->telefono = "";
            $this->correo = "";
            $this->direccion = "";
            $this->barrio = "";
            $this->contrasena = "";
            $this->pregunta = "";
            $this->respuesta = "";
        }
    }

    public function insertar() {

        $arrpersona = (array) $this;
        $this->insertRow("INSERT INTO persona
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
            $this->documento,
            $this->nombres,
            $this->apellidos,
            $this->fecha,
            $this->telefono,
            $this->correo,
            $this->direccion,
            $this->barrio,
            $this->contrasena,
            $this->pregunta,
            $this->respuesta
                )
        );
        $this->Disconnect();
    }

    public function insertarP() {

        $arrpersona = (array) $this;
        $this->insertRow("INSERT INTO persona (idPersona, Documento, Nombres, Apellidos, Fecha, Telefono, Correo, Direccion, Barrio, Ciudad_idCiudad)
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
            $this->documento,
            $this->nombres,
            $this->apellidos,
            $this->fecha,
            $this->telefono,
            $this->correo,
            $this->direccion,
            $this->barrio,
            $this->ciudad
                )
        );
        $this->Disconnect();
    }

    public function editar() {

        $arrAdministrador = (array) $this;

        //var_dump($arrAdministrador);
        $this->updateRow("UPDATE persona SET Documento = ?, Contrasena = ?,  Pregunta = ?, Respuesta = ? WHERE idPersona = ?", array(
            $this->documento,
            $this->contrasena,
            $this->pregunta,
            $this->respuesta,
            $this->idPersona
                )
        );
        $this->Disconnect();
    }

    public function actualizar() {

        $arrAdministrador = (array) $this;

        //var_dump($arrAdministrador);
        $this->updateRow("UPDATE persona SET Documento = ?, Nombres = ?,  Apellidos = ?, Fecha = ?, Telefono = ?, Correo = ?, Direccion = ?, Barrio = ?,Ciudad_idCiudad = ? WHERE idPersona = ?", array(
            $this->documento,
            $this->nombres,
            $this->apellidos,
            $this->fecha,
            $this->telefono,
            $this->correo,
            $this->direccion,
            $this->barrio,
            $this->ciudad,
            $this->idPersona
                )
        );
        $this->Disconnect();
    }

    public function eliminar() {
        $arrCategoria = (array) $this;
        $this->updateRow("DELETE FROM persona WHERE idPersona = ?", array($this->idPersona));
        $this->Disconnect();
    }

    public static function buscar($query) {
        $arrPersona = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $cat = new Persona();
            $cat->idPersona = $valor['idPersona'];
            $cat->documento = $valor['Documento'];
            $cat->nombres = $valor['Nombres'];
            $cat->apellidos = $valor['Apellidos'];
            $cat->fecha = $valor['Fecha'];
            $cat->telefono = $valor['Telefono'];
            $cat->correo = $valor['Correo'];
            $cat->direccion = $valor['Direccion'];
            $cat->barrio = $valor['Barrio'];
            array_push($arrPersona, $cat);
        }
        $tmp->Disconnect();
        return $arrPersona;
    }

    public static function buscarForId($id) {


        if ($id > 0) {
            $administrador = new Persona();
            $getrow = $administrador->getRow("SELECT `idPersona`, `Documento`, `Nombres`, `Apellidos`, `Fecha`, `Telefono`, `Correo`, `Direccion`, `Barrio`, `Contrasena`, `Pregunta`, `Respuesta`, `Ciudad_idCiudad`, `idDepartamento` FROM `persona`JOin ciudad On persona.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento WHERE idPersona =?", array($id));
            $administrador->idPersona = $getrow['idPersona'];
            $administrador->documento = $getrow['Documento'];
            $administrador->nombres = $getrow['Nombres'];
            $administrador->apellidos = $getrow['Apellidos'];
            $administrador->fecha = $getrow['Fecha'];
            $administrador->telefono = $getrow['Telefono'];
            $administrador->correo = $getrow['Correo'];
            $administrador->direccion = $getrow['Direccion'];
            $administrador->barrio = $getrow['Barrio'];
            $administrador->contrasena = $getrow['Contrasena'];
            $administrador->pregunta = $getrow['Pregunta'];
            $administrador->respuesta = $getrow['Respuesta'];
            $administrador->ciudad = $getrow['Ciudad_idCiudad'];
            $administrador->departamento = $getrow['idDepartamento'];
            $administrador->Disconnect();
            return $administrador;
        } else {
            return NULL;
        }
        $this->Disconnect();
    }

    public static function getAll() {
        return Persona::buscar("SELECT * FROM persona");
    }

    public static function selectAll() {
        $us = new Persona();
        $query = $us->getRows('SELECT * FROM persona');
        $us->Disconnect();
        return $query;
    }

    public static function validacion($usuario, $contrasena) {

        $tmp = new Persona();
        $arrObjAdmin = $tmp->getRows("SELECT * FROM persona WHERE documento='" . $usuario . "' AND contrasena='" . $contrasena . "'");
        $tmp->Disconnect();
        if (count($arrObjAdmin) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function validacionPregunta($pregunta, $respuesta) {
        $tmp = new Persona();
        $arrObjAdmin = $tmp->getRows("SELECT * FROM Persona WHERE pregunta = ? AND respuesta=?", array($pregunta, $respuesta));
        $tmp->Disconnect();
        if (count($arrObjAdmin) > 0) {
            return $arrObjAdmin[0]['idPersona'];
        } else {
            return false;
        }
    }

    public static function validacion1($documento) {
        $tmp = new Persona();
        $arrObjAdmin = $tmp->getRows("SELECT Documento FROM Persona WHERE Documento='" . $documento . "'");
        $tmp->Disconnect();
        if (count($arrObjAdmin) > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>