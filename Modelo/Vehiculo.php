<?php

require_once('../Modelo/Conexion.php');
require_once '../Modelo/Persona.php';

class Vehiculo extends conexion {

    private $IdVehiculo;
    private $Codigo;
    private $Placa;
    private $Modelo;
    private $Linea;
    private $Cilindraje;
    private $Seguro;
    private $Precio;
    private $Resistencia;
    private $Color;
    private $Fotos;
    private $Kilometraje;
    private $Servicio;
    private $Traccion;
    private $TipoCombustible;
    private $Estado;
    private $Descripcion;
    private $Categoria_idCategoria;
    private $Ciudad_idCiudad;
    private $Marca_idMarca;
    private $Persona_idPersona;
    private $departamento;

    public function getIdVehiculo() {
        return $this->IdVehiculo;
    }

    public function getCodigo() {
        return $this->Codigo;
    }

    public function getPlaca() {
        return $this->Placa;
    }

    public function getModelo() {
        return $this->Modelo;
    }

    public function getLinea() {
        return $this->Linea;
    }

    public function getCilindraje() {
        return $this->Cilindraje;
    }

    public function getSeguro() {
        return $this->Seguro;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getResistencia() {
        return $this->Resistencia;
    }

    public function getColor() {
        return $this->Color;
    }

    public function getFotos() {
        return $this->Fotos;
    }

    public function getKilometraje() {
        return $this->Kilometraje;
    }

    public function getServicio() {
        return $this->Servicio;
    }

    public function getTraccion() {
        return $this->Traccion;
    }

    public function getTipoCombustible() {
        return $this->TipoCombustible;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function getCategoria_idCategoria() {
        return $this->Categoria_idCategoria;
    }

    public function getCiudad_idCiudad() {
        return $this->Ciudad_idCiudad;
    }

    public function getMarca_idMarca() {
        return $this->Marca_idMarca;
    }

    public function getPersona_idPersona() {
        return $this->Persona_idPersona;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setIdVehiculo($IdVehiculo) {
        $this->IdVehiculo = $IdVehiculo;
    }

    public function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    public function setPlaca($Placa) {
        $this->Placa = $Placa;
    }

    public function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    public function setLinea($Linea) {
        $this->Linea = $Linea;
    }

    public function setCilindraje($Cilindraje) {
        $this->Cilindraje = $Cilindraje;
    }

    public function setSeguro($Seguro) {
        $this->Seguro = $Seguro;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function setResistencia($Resistencia) {
        $this->Resistencia = $Resistencia;
    }

    public function setColor($Color) {
        $this->Color = $Color;
    }

    public function setFotos($Fotos) {
        $this->Fotos = $Fotos;
    }

    public function setKilometraje($Kilometraje) {
        $this->Kilometraje = $Kilometraje;
    }

    public function setServicio($Servicio) {
        $this->Servicio = $Servicio;
    }

    public function setTraccion($Traccion) {
        $this->Traccion = $Traccion;
    }

    public function setTipoCombustible($TipoCombustible) {
        $this->TipoCombustible = $TipoCombustible;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setCategoria_idCategoria($Categoria_idCategoria) {
        $this->Categoria_idCategoria = $Categoria_idCategoria;
    }

    public function setCiudad_idCiudad($Ciudad_idCiudad) {
        $this->Ciudad_idCiudad = $Ciudad_idCiudad;
    }

    public function setMarca_idMarca($Marca_idMarca) {
        $this->Marca_idMarca = $Marca_idMarca;
    }

    public function setPersona_idPersona($Persona_idPersona) {
        $this->Persona_idPersona = $Persona_idPersona;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
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
            $this->IdVehiculo = "";
            $this->Codigo = "";
            $this->Placa = "";
            $this->Modelo = "";
            $this->Linea = "";
            $this->Cilindraje = "";
            $this->Seguro = "";
            $this->Precio = "";
            $this->Resistencia = "";
            $this->Color = "";
            $this->Fotos = "";
            $this->Kilometraje = "";
            $this->Servicio = "";
            $this->Traccion = "";
            $this->TipoCombustible = "";
            $this->Estado = "";
            $this->escripcion = "";
            $this->Categoria_idCategoria = "";
            $this->Ciudad_idCiudad = "";
            $this->Marca_idMarca = "";
            $this->Persona_idPersona = "";
        }
    }

    public function insertar() {
        $this->insertRow("insert into vehiculo VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Activo', ?, ?, ?, ?, ?)", array(
            $this->Codigo,
            $this->Placa,
            $this->Modelo,
            $this->Linea,
            $this->Cilindraje,
            $this->Seguro,
            $this->Precio,
            $this->Resistencia,
            $this->Color,
            $this->Fotos,
            $this->Kilometraje,
            $this->Servicio,
            $this->Traccion,
            $this->TipoCombustible,
            $this->Descripcion,
            $this->Categoria_idCategoria,
            $this->Ciudad_idCiudad,
            $this->Marca_idMarca,
            $this->Persona_idPersona
                )
        );
        $this->Disconnect();
    }

    public function editar() {
        //var_dump($arrVehiculo);
        $arrVehiculo = (array) $this;
        $this->updateRow("UPDATE vehiculo SET  Placa = ?, Modelo = ?, Linea = ?, Cilindraje = ?, Seguro = ?, Precio = ?, Resistencia = ?, Color = ?, Fotos = ?, Kilometraje = ?, Servicio = ?, Traccion = ?, TipoCombustible = ?, Descripcion = ?, Categoria_idCategoria = ?, Ciudad_idCiudad = ?, Marca_idMarca = ?, Persona_idPersona = ? WHERE idVehiculo = ?", array(
            $this->Placa,
            $this->Modelo,
            $this->Linea,
            $this->Cilindraje,
            $this->Seguro,
            $this->Precio,
            $this->Resistencia,
            $this->Color,
            $this->Fotos,
            $this->Kilometraje,
            $this->Servicio,
            $this->Traccion,
            $this->TipoCombustible,
            $this->Descripcion,
            $this->Categoria_idCategoria,
            $this->Ciudad_idCiudad,
            $this->Marca_idMarca,
            $this->Persona_idPersona,
            $this->IdVehiculo
                )
        );
        $this->Disconnect();
    }

    public function editarDueño() {
        //var_dump($arrVehiculo);
        $arrVehiculo = (array) $this;
        $this->updateRow("UPDATE vehiculo SET Estado = ?, Persona_idPersona = ? WHERE idVehiculo = ?", array(
            $this->Estado,
            $this->Persona_idPersona,
            $this->IdVehiculo
                )
        );
        $this->Disconnect();
    }

    public function eliminar() {
        $arrVehiculo = (array) $this;
        $this->updateRow("DELETE FROM vehiculo WHERE idVehiculo = ?", array($this->IdVehiculo));
        $this->Disconnect();
    }

    public static function getAll() {
        return Vehiculo::buscar("1");
    }

    public static function buscarForId($id) {
        if ($id > 0) {
            $Vehiculo = new Vehiculo();
            $getrow = $Vehiculo->getRow("SELECT `idVehiculo`, `Codigo`, `Placa`, `Modelo`, `Linea`, `Cilindraje`, `Seguro`, `Precio`, `Resistencia`, `Color`, `Fotos`, `Kilometraje`, `Servicio`, `Traccion`, `TipoCombustible`, `Estado`, `Descripcion`, `Categoria_idCategoria`, `Ciudad_idCiudad`, `Marca_idMarca`, `Persona_idPersona`, `idDepartamento` from vehiculo JOin ciudad On vehiculo.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento WHERE idVehiculo =? ", array($id));
            $Vehiculo->IdVehiculo = $getrow['idVehiculo'];
            $Vehiculo->Codigo = $getrow['Codigo'];
            $Vehiculo->Placa = $getrow['Placa'];
            $Vehiculo->Modelo = $getrow['Modelo'];
            $Vehiculo->Linea = $getrow['Linea'];
            $Vehiculo->Cilindraje = $getrow['Cilindraje'];
            $Vehiculo->Seguro = $getrow['Seguro'];
            $Vehiculo->Precio = $getrow['Precio'];
            $Vehiculo->Resistencia = $getrow['Resistencia'];
            $Vehiculo->Color = $getrow['Color'];
            $Vehiculo->Fotos = $getrow['Fotos'];
            $Vehiculo->Kilometraje = $getrow['Kilometraje'];
            $Vehiculo->Servicio = $getrow['Servicio'];
            $Vehiculo->Traccion = $getrow['Traccion'];
            $Vehiculo->TipoCombustible = $getrow['TipoCombustible'];
            $Vehiculo->Estado = $getrow['Estado'];
            $Vehiculo->Descripcion = $getrow['Descripcion'];
            $Vehiculo->Categoria_idCategoria = $getrow['Categoria_idCategoria'];
            $Vehiculo->Ciudad_idCiudad = $getrow['Ciudad_idCiudad'];
            $Vehiculo->Marca_idMarca = $getrow['Marca_idMarca'];
            $Vehiculo->Persona_idPersona = $getrow['Persona_idPersona'];
            $Vehiculo->departamento = $getrow['idDepartamento'];
            $Vehiculo->Disconnect();
            return $Vehiculo;
        } else {
            return NULL;
        }
        $this->Disconnect();
    }

    public static function buscar($query) {
        $arrVehiculo = array();
        $tmp = new Vehiculo();
        $getrows = $tmp->getRows("SELECT * FROM vehiculo WHERE " . $query);

        foreach ($getrows as $valor) {
            $Vehiculo = new Vehiculo();
            $Vehiculo->IdVehiculo = $valor['idVehiculo'];
            $Vehiculo->Codigo = $valor['Codigo'];
            $Vehiculo->Placa = $valor['Placa'];
            $Vehiculo->Modelo = $valor['Modelo'];
            $Vehiculo->Linea = $valor['Linea'];
            $Vehiculo->Cilindraje = $valor['Cilindraje'];
            $Vehiculo->Seguro = $valor['Seguro'];
            $Vehiculo->Precio = $valor['Precio'];
            $Vehiculo->Resistencia = $valor['Resistencia'];
            $Vehiculo->Color = $valor['Color'];
            $Vehiculo->Fotos = $valor['Fotos'];
            $Vehiculo->Kilometraje = $valor['Kilometraje'];
            $Vehiculo->Servicio = $valor['Servicio'];
            $Vehiculo->Traccion = $valor['Traccion'];
            $Vehiculo->TipoCombustible = $valor['TipoCombustible'];
            $Vehiculo->Estado = $valor['Estado'];
            $Vehiculo->Descripcion = $valor['Descripcion'];
            $Vehiculo->Categoria_idCategoria = $valor['Categoria_idCategoria'];
            $Vehiculo->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $Vehiculo->Marca_idMarca = $valor['Marca_idMarca'];
            $Vehiculo->Persona_idPersona = $valor['Persona_idPersona'];

            array_push($arrVehiculo, $Vehiculo);
        }
        $tmp->Disconnect();
        return $arrVehiculo;
    }

    public static function ultimo() {

        $arrVehiculo = array();
        $tmp = new Vehiculo();
        $getrows = $tmp->getRows("SELECT idVehiculo FROM vehiculo");
        if (count($getrows) > 0) {
            foreach ($getrows as $valor) {
                $nultimo = $valor['idVehiculo'];
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
        $tmp = new Vehiculo();
        $getrows = $tmp->getRows("SELECT `idVehiculo`, `Codigo`, `Placa`, `Modelo`, `Linea`, `Cilindraje`, `Seguro`, `Precio`, `Resistencia`, `Color`, `Fotos`, `Kilometraje`, `Servicio`, `Traccion`, `TipoCombustible`, `Estado`, `Descripcion`, `Categoria_idCategoria`, `Ciudad_idCiudad`, `Marca`, `Persona_idPersona`, `Departamento` from vehiculo JOin ciudad On vehiculo.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento JOIN marca ON vehiculo.Marca_idMarca = marca.idMarca");

        foreach ($getrows as $valor) {
            $Vehiculo = new Vehiculo();
            $Vehiculo->IdVehiculo = $valor['idVehiculo'];
            $Vehiculo->Codigo = $valor['Codigo'];
            $Vehiculo->Placa = $valor['Placa'];
            $Vehiculo->Modelo = $valor['Modelo'];
            $Vehiculo->Linea = $valor['Linea'];
            $Vehiculo->Cilindraje = $valor['Cilindraje'];
            $Vehiculo->Seguro = $valor['Seguro'];
            $Vehiculo->Precio = $valor['Precio'];
            $Vehiculo->Resistencia = $valor['Resistencia'];
            $Vehiculo->Color = $valor['Color'];
            $Vehiculo->Fotos = $valor['Fotos'];
            $Vehiculo->Kilometraje = $valor['Kilometraje'];
            $Vehiculo->Servicio = $valor['Servicio'];
            $Vehiculo->Traccion = $valor['Traccion'];
            $Vehiculo->TipoCombustible = $valor['TipoCombustible'];
            $Vehiculo->Estado = $valor['Estado'];
            $Vehiculo->Descripcion = $valor['Descripcion'];
            $Vehiculo->Categoria_idCategoria = $valor['Categoria_idCategoria'];
            $Vehiculo->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $Vehiculo->Marca_idMarca = $valor['Marca'];
            $Vehiculo->Persona_idPersona = $valor['Persona_idPersona'];
            $Vehiculo->departamento = $valor['Departamento'];

            array_push($arrVehiculo, $Vehiculo);
        }
        $tmp->Disconnect();
        return $arrVehiculo;
    }
    
    public static function buscartodoCategoria($categoria) {

        $arrVehiculo = array();
        $tmp = new Vehiculo();
        $getrows = $tmp->getRows("SELECT `idVehiculo`, `Codigo`, `Placa`, `Modelo`, `Linea`, `Cilindraje`, `Seguro`, `Precio`, `Resistencia`, `Color`, `Fotos`, `Kilometraje`, `Servicio`, `Traccion`, `TipoCombustible`, `Estado`, `Descripcion`, `Categoria_idCategoria`, `Ciudad_idCiudad`, `Marca`, `Persona_idPersona`, `Departamento` from vehiculo JOin ciudad On vehiculo.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento JOIN marca ON vehiculo.Marca_idMarca = marca.idMarca JOIN categoria ON vehiculo.Categoria_idCategoria=categoria.idCategoria where categoria.Nombre='$categoria'");

        foreach ($getrows as $valor) {
            $Vehiculo = new Vehiculo();
            $Vehiculo->IdVehiculo = $valor['idVehiculo'];
            $Vehiculo->Codigo = $valor['Codigo'];
            $Vehiculo->Placa = $valor['Placa'];
            $Vehiculo->Modelo = $valor['Modelo'];
            $Vehiculo->Linea = $valor['Linea'];
            $Vehiculo->Cilindraje = $valor['Cilindraje'];
            $Vehiculo->Seguro = $valor['Seguro'];
            $Vehiculo->Precio = $valor['Precio'];
            $Vehiculo->Resistencia = $valor['Resistencia'];
            $Vehiculo->Color = $valor['Color'];
            $Vehiculo->Fotos = $valor['Fotos'];
            $Vehiculo->Kilometraje = $valor['Kilometraje'];
            $Vehiculo->Servicio = $valor['Servicio'];
            $Vehiculo->Traccion = $valor['Traccion'];
            $Vehiculo->TipoCombustible = $valor['TipoCombustible'];
            $Vehiculo->Estado = $valor['Estado'];
            $Vehiculo->Descripcion = $valor['Descripcion'];
            $Vehiculo->Categoria_idCategoria = $valor['Categoria_idCategoria'];
            $Vehiculo->Ciudad_idCiudad = $valor['Ciudad_idCiudad'];
            $Vehiculo->Marca_idMarca = $valor['Marca'];
            $Vehiculo->Persona_idPersona = $valor['Persona_idPersona'];
            $Vehiculo->departamento = $valor['Departamento'];

            array_push($arrVehiculo, $Vehiculo);
        }
        $tmp->Disconnect();
        return $arrVehiculo;
    }

    public static function validacion1($placa) {
        $tmp = new Persona();
        $arrObjAdmin = $tmp->getRows("SELECT * FROM vehiculo WHERE Placa='" . $placa . "'");
        $tmp->Disconnect();
        if (count($arrObjAdmin) > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>
