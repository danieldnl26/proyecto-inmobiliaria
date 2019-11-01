<?php

require_once '../Modelo/Conexion.php';
require_once '../Modelo/Persona.php';

class Inmueble extends conexion {

    private $idInmueble;
    private $Codigo;
    private $Direccion;
    private $Estratificacion;
    private $Precio;
    private $Ubicacion;
    private $Estado;
    private $Area;
    private $Fotos;
    private $Descripcion;
    private $Persona_idPersona;
    private $Ciudad_idCiudad;
    private $Categoria_idCategoria;
    private $Departamento;
    
    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    
    public function getDepartamento() {
        return $this->Departamento;
    }

    public function setDepartamento($Departamento) {
        $this->Departamento = $Departamento;
    }

    public function getIdInmueble() {
        return $this->idInmueble;
    }

    public function getCodigo() {
        return $this->Codigo;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getEstratificacion() {
        return $this->Estratificacion;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getUbicacion() {
        return $this->Ubicacion;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getArea() {
        return $this->Area;
    }

    public function getFotos() {
        return $this->Fotos;
    }

    public function getPersona_idPersona() {
        return $this->Persona_idPersona;
    }

    public function getCiudad_idCiudad() {
        return $this->Ciudad_idCiudad;
    }

    public function getCategoria_idCategoria() {
        return $this->Categoria_idCategoria;
    }

    public function setIdInmueble($idInmueble) {
        $this->idInmueble = $idInmueble;
    }

    public function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    public function setEstratificacion($Estratificacion) {
        $this->Estratificacion = $Estratificacion;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function setUbicacion($Ubicacion) {
        $this->Ubicacion = $Ubicacion;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setArea($Area) {
        $this->Area = $Area;
    }

    public function setFotos($Fotos) {
        $this->Fotos = $Fotos;
    }

    public function setPersona_idPersona($Persona_idPersona) {
        $this->Persona_idPersona = $Persona_idPersona;
    }

    public function setCiudad_idCiudad($Ciudad_idCiudad) {
        $this->Ciudad_idCiudad = $Ciudad_idCiudad;
    }

    public function seCategoria_idCategoria($Categoria_idCategoria) {
        $this->Categoria_idCategoria = $Categoria_idCategoria;
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
            $this->idInmueble = "";
            $this->Codigo = "";
            $this->Direccion = "";
            $this->Estratificacion = "";
            $this->Precio = "";
            $this->Ubicacion = "";
            $this->Estado = "";
            $this->Area = "";
            $this->Fotos = "";
            $this->Descripcion = "";
            $this->Persona_idPersona = "";
            $this->Ciudad_idCiudad = "";
            $this->Categoria_idCategoria = "";
        }
    }

    public function insertar() {

        $this->insertRow("INSERT INTO inmueble VALUES ('NULL', ?, ?, ?, ?, ?, 'Activo', ?, ?, ?, ?, ?, ?)", array(
            $this->Codigo,
            $this->Direccion,
            $this->Estratificacion,
            $this->Precio,
            $this->Ubicacion,
            $this->Area,
            $this->Fotos,
            $this->Descripcion,
            $this->Persona_idPersona,
            $this->Ciudad_idCiudad,
            $this->Categoria_idCategoria
                )
        );
        $this->Disconnect();
    }

    public function editar() {


        //var_dump($arrInmueble);

        $arrInmueble = (array) $this;
        $this->updateRow("UPDATE `inmueble` SET `Direccion`=?,`Estratificacion`=?,`Precio`=?,`Ubicacion`=?,`Area`=?,`Fotos`=?,`Descripcion`=?,`Persona_idPersona`=?,`Ciudad_idCiudad`=?,`Categoria_idCategoria`=? WHERE  idInmueble = ?", array(
            
            $this->Direccion,
            $this->Estratificacion,
            $this->Precio,
            $this->Ubicacion,
            $this->Area,
            $this->Fotos,
            $this->Descripcion,
            $this->Persona_idPersona,
            $this->Ciudad_idCiudad,
            $this->Categoria_idCategoria,
            $this->idInmueble
                )
        );
        $this->Disconnect();
    }

    public static function getAll() {
        return Inmueble::buscar("1");
    }

    public static function buscarForId($id) {
        if ($id > 0) {
            $inmueble = new Inmueble();

            $getrow = $inmueble->getRow("SELECT `idInmueble`, `Codigo`, `Direccion`, `Estratificacion`, `Precio`, `Ubicacion`, `Estado`, `Area`, `Fotos`, `Descripcion`, `Persona_idPersona`, `Ciudad_idCiudad`, `Categoria_idCategoria`, idDepartamento FROM `inmueble` JOin ciudad On inmueble.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento WHERE idInmueble =? ", array($id));
            $inmueble->idInmueble = $getrow['idInmueble'];
            $inmueble->Codigo = $getrow['Codigo'];
            $inmueble->Direccion = $getrow['Direccion'];
            $inmueble->Estratificacion = $getrow['Estratificacion'];
            $inmueble->Precio = $getrow['Precio'];
            $inmueble->Ubicacion = $getrow['Ubicacion'];
            $inmueble->Estado = $getrow['Estado'];
            $inmueble->Area = $getrow['Area'];
            $inmueble->Fotos = $getrow['Fotos'];
            $inmueble->Descripcion = $getrow['Descripcion'];
            $inmueble->Persona_idPersona = $getrow['Persona_idPersona'];
            $inmueble->Ciudad_idCiudad = $getrow['Ciudad_idCiudad'];
            $inmueble->Categoria_idCategoria = $getrow['Categoria_idCategoria'];
            $inmueble->Departamento = $getrow['idDepartamento'];
            $inmueble->Disconnect();


            return $inmueble;
        } else {
            return NULL;
        }
        $this->Disconnect();
    }

    public static function buscar($query) {
        $arrInmueble = array();
        $tmp = new Inmueble();
        $getrows = $tmp->getRows("SELECT * FROM inmueble WHERE " . $query);

        foreach ($getrows as $valor) {
            $inmueble = new Inmueble();
            $inmueble->idInmueble = $valor['idInmueble'];
            $inmueble->Codigo = $valor['Codigo'];
            $inmueble->Direccion = $valor['Direccion'];
            $inmueble->Estratificacion = $valor['Estratificacion'];
            $inmueble->Precio = $valor['Precio'];
            $inmueble->Ubicacion = $valor['Ubicacion'];
            $inmueble->Estado = $valor['Estado'];
            $inmueble->Area = $valor['Area'];
            $inmueble->Fotos = $valor['Fotos'];
            $inmueble->Decripcion = $valor['Descripcion'];
            $inmueble->Persona_idPersona = $valor['Persona_idPersona'];
            $inmueble->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $inmueble->Categoria_idCategoria = $valor['Categoria_idCategoria'];
            array_push($arrInmueble, $inmueble);
        }
        $tmp->Disconnect();
        return $arrInmueble;
    }

    public function eliminar() {
        $arrInmueble = (array) $this;
        $this->updateRow("DELETE FROM inmueble WHERE idInmueble = ?", array($this->idInmueble));
        $this->Disconnect();
    }
    
    public function editarDueño() {
        //var_dump($arrVehiculo);
        $arrVehiculo = (array) $this;
        $this->updateRow("UPDATE inmueble SET Estado = ?, Persona_idPersona = ? WHERE idInmueble = ?", array(
            
            $this->Estado,
            $this->Persona_idPersona,
            $this->idInmueble
                )
        );
        $this->Disconnect();
    }

    public static function ultimo() {

        $arrInmueble = array();
        $tmp = new Inmueble();
        $getrows = $tmp->getRows("SELECT idInmueble FROM inmueble");
        if (count($getrows) > 0) {
            foreach ($getrows as $valor) {
                $nultimo = $valor['idInmueble'];
            }
            return $nultimo + 1;
        } else {
            return 1;
        }
    }

    protected static function selectAll() {
        
    }

    public static function buscartodo() {

        $arrVehiculo = array();
        $tmp = new Inmueble();
        $getrows = $tmp->getRows("SELECT `idInmueble`, `Codigo`, `Direccion`, `Estratificacion`, `Precio`, `Ubicacion`, `Estado`, `Area`, `Fotos`, `Descripcion`, `Persona_idPersona`, `Ciudad_idCiudad`, `Nombre`, `Departamento` from inmueble JOin ciudad On inmueble.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento JOIN categoria ON inmueble.Categoria_idCategoria=categoria.idCategoria");

        foreach ($getrows as $valor) {
            $inmueble = new Inmueble();
            $inmueble->idInmueble = $valor['idInmueble'];
            $inmueble->Codigo = $valor['Codigo'];
            $inmueble->Direccion = $valor['Direccion'];
            $inmueble->Estratificacion = $valor['Estratificacion'];
            $inmueble->Precio = $valor['Precio'];
            $inmueble->Ubicacion = $valor['Ubicacion'];
            $inmueble->Estado = $valor['Estado'];
            $inmueble->Area = $valor['Area'];
            $inmueble->Fotos = $valor['Fotos'];
            $inmueble->Decripcion = $valor['Descripcion'];
            $inmueble->Persona_idPersona = $valor['Persona_idPersona'];
            $inmueble->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $inmueble->Categoria_idCategoria = $valor['Nombre'];
            $inmueble->Departamento = $valor['Departamento'];
            array_push($arrVehiculo, $inmueble);
        }
        $tmp->Disconnect();
        return $arrVehiculo;
    }

    public static function buscartodoCategoria($categoria) {

        $arrVehiculo = array();
        $tmp = new Inmueble();
        $getrows = $tmp->getRows("SELECT `idInmueble`, `Codigo`, `Direccion`, `Estratificacion`, `Precio`, `Ubicacion`, `Estado`, `Area`, `Fotos`, `Descripcion`, `Persona_idPersona`, `Ciudad_idCiudad`, `Nombre`, `Departamento` from inmueble JOin ciudad On inmueble.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento JOIN categoria ON inmueble.Categoria_idCategoria=categoria.idCategoria where categoria.Nombre='$categoria'");

        foreach ($getrows as $valor) {
            $inmueble = new Inmueble();
            $inmueble->idInmueble = $valor['idInmueble'];
            $inmueble->Codigo = $valor['Codigo'];
            $inmueble->Direccion = $valor['Direccion'];
            $inmueble->Estratificacion = $valor['Estratificacion'];
            $inmueble->Precio = $valor['Precio'];
            $inmueble->Ubicacion = $valor['Ubicacion'];
            $inmueble->Estado = $valor['Estado'];
            $inmueble->Area = $valor['Area'];
            $inmueble->Fotos = $valor['Fotos'];
            $inmueble->Decripcion = $valor['Descripcion'];
            $inmueble->Persona_idPersona = $valor['Persona_idPersona'];
            $inmueble->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $inmueble->Categoria_idCategoria = $valor['Nombre'];
            $inmueble->Departamento = $valor['Departamento'];
            array_push($arrVehiculo, $inmueble);
        }
        $tmp->Disconnect();
        return $arrVehiculo;
    }
}
