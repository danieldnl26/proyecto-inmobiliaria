<?php

require_once(__DIR__ . '/../Modelo/Ciudad.php');
require_once(__DIR__ . '/../Modelo/Transaccion.php');
require_once(__DIR__ . '/../Modelo/ProcesosPersona.php');
require_once(__DIR__ . '/../Modelo/Vehiculo.php');
require_once(__DIR__ . '/../Modelo/Inmueble.php');
if (!empty($_GET['action'])) {
    controlador_Transaccion::main($_GET['action']);
    $action = $_GET['action'];
}

class controlador_Transaccion {

    static function main($action) {
        if ($action == "crearv") {
            controlador_Transaccion::crearv();
        } else if ($action == "creari") {
            controlador_Transaccion::creari();
        } else if ($action == "editar") {
            controlador_Transaccion::editar();
        } else if ($action == "buscarID") {
            controlador_Transaccion::buscarID(1);
        } else if ($action == "eliminar") {
            controlador_Transaccion::eliminar($_GET['id']);
        } else if ($action == "getCiudades") {
            controlador_Transaccion::buscarCiudades($_GET['dep']);
        }
    }

    static public function buscarCiudades($depart) {
        $ciudades = Ciudad::buscar("SELECT * FROM ciudad WHERE Departamento_idDepartamento = '" . $depart . "' ");
        $respuesta = array();
        foreach ($ciudades as $ciudad) {
            $respuesta[$ciudad->getIdCiudad()] = $ciudad->getCiudad();
        }

        echo json_encode($respuesta);
    }

    static public function crearv() {
        try {

            $tipo = $_POST['TipoTransaccion'];
            $arrayTransaccion = array();
            $arrayTransaccion['TipoTransaccion'] = $_POST['TipoTransaccion'];
            $arrayTransaccion['Fecha'] = $_POST['fecha'];
            $arrayTransaccion['Valor'] = $_POST['valor'];
            $arrayTransaccion['Vehiculo_idVehiculo'] = $_POST['idVehiculo'];
            $Transaccion = new Transaccion($arrayTransaccion);
            $Transaccion->insertarVehiculo();

            if ($tipo == 'Venta') {
                $estado = "Inactivo";
            } elseif ($tipo == "Compra") {
                $estado = "Activo";
            }

            $arrayNuevoD = array();
            $arrayNuevoD['Estado'] = $estado;
            $arrayNuevoD['Persona_idPersona'] = $_POST['idComprador'];
            $arrayNuevoD['IdVehiculo'] = $_POST['idVehiculo'];
            var_dump($arrayNuevoD);
            $NuevoD = new Vehiculo($arrayNuevoD);
            $NuevoD->editarDueño();

            $arrayVendedor = array();
            $arrayVendedor['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayVendedor['TipoPersona_idTipoPersona'] = $Transaccion->Vendedor();
            $arrayVendedor['Persona_idPersona'] = $_POST['idVendedor'];
            var_dump($arrayVendedor);
            $Vendedor = new ProcesosPersona($arrayVendedor);
            $Vendedor->insertar();

            $arrayComprador = array();
            $arrayComprador['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayComprador['TipoPersona_idTipoPersona'] = $Transaccion->Comprador();
            $arrayComprador['Persona_idPersona'] = $_POST['idComprador'];
            var_dump($arrayComprador);
            $Comprador = new ProcesosPersona($arrayComprador);
            $Comprador->insertar();

            $arrayTestigo1 = array();
            $arrayTestigo1['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayTestigo1['TipoPersona_idTipoPersona'] = $Transaccion->Testigo();
            $arrayTestigo1['Persona_idPersona'] = $_POST['testigo1'];
            var_dump($arrayTestigo1);
            $Testigo1 = new ProcesosPersona($arrayTestigo1);
            $Testigo1->insertar();

            $arrayTestigo2 = array();
            $arrayTestigo2['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayTestigo2['TipoPersona_idTipoPersona'] = $Transaccion->Testigo();
            $arrayTestigo2['Persona_idPersona'] = $_POST['testigo2'];
            var_dump($arrayTestigo2);
            $Testigo2 = new ProcesosPersona($arrayTestigo2);
            $Testigo2->insertar();

            header("Location: ../Vista/TransaccionVehiculo.php?respuesta=correcto&o=$tipo");
        } catch (Exception $e) {
            header("Location: ../Vista/TransaccionVehiculo.php?respuesta=error&o=$tipo");
        }
    }

    static public function creari() {
        try {

            $tipo = $_POST['TipoTransaccion'];
            $arrayTransaccion = array();
            $arrayTransaccion['TipoTransaccion'] = $_POST['TipoTransaccion'];
            $arrayTransaccion['Fecha'] = $_POST['fecha'];
            $arrayTransaccion['Valor'] = $_POST['valor'];
            $arrayTransaccion['Inmueble_idInmueble'] = $_POST['idInmueble'];
            var_dump($arrayTransaccion);
            $Transaccion = new Transaccion($arrayTransaccion);
            $Transaccion->insertarInmueble();

            if ($tipo == 'Venta') {
                $estado = "Inactivo";
            } elseif ($tipo == "Compra") {
                $estado = "Activo";
            }

            $arrayNuevoD = array();
            $arrayNuevoD['Estado'] = $estado;
            $arrayNuevoD['Persona_idPersona'] = $_POST['idComprador'];
            $arrayNuevoD['idInmueble'] = $_POST['idInmueble'];
            var_dump($arrayNuevoD);
            $NuevoD = new Inmueble($arrayNuevoD);
            $NuevoD->editarDueño();

            $arrayVendedor = array();
            $arrayVendedor['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayVendedor['TipoPersona_idTipoPersona'] = $Transaccion->Vendedor();
            $arrayVendedor['Persona_idPersona'] = $_POST['idVendedor'];
            var_dump($arrayVendedor);
            $Vendedor = new ProcesosPersona($arrayVendedor);
            $Vendedor->insertar();

            $arrayComprador = array();
            $arrayComprador['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayComprador['TipoPersona_idTipoPersona'] = $Transaccion->Comprador();
            $arrayComprador['Persona_idPersona'] = $_POST['idComprador'];
            var_dump($arrayComprador);
            $Comprador = new ProcesosPersona($arrayComprador);
            $Comprador->insertar();

            $arrayTestigo1 = array();
            $arrayTestigo1['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayTestigo1['TipoPersona_idTipoPersona'] = $Transaccion->Testigo();
            $arrayTestigo1['Persona_idPersona'] = $_POST['testigo1'];
            var_dump($arrayTestigo1);
            $Testigo1 = new ProcesosPersona($arrayTestigo1);
            $Testigo1->insertar();

            $arrayTestigo2 = array();
            $arrayTestigo2['Transaccion_idTransaccion'] = $Transaccion->ultimo();
            $arrayTestigo2['TipoPersona_idTipoPersona'] = $Transaccion->Testigo();
            $arrayTestigo2['Persona_idPersona'] = $_POST['testigo2'];
            var_dump($arrayTestigo2);
            $Testigo2 = new ProcesosPersona($arrayTestigo2);
            $Testigo2->insertar();

            header("Location: ../Vista/TransaccionInmueble.php?respuesta=correcto&o=$tipo");
        } catch (Exception $e) {
            header("Location: ../Vista/TransaccionInmueble.php?respuesta=error&o=$tipo");
        }
    }

    static public function buscarID($id) {
        try {
            return Transaccion::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function buscarAll() {
        try {
            return Transaccion::getAll();
        } catch (Exception $e) {
            header("Location: ../views/verElementos.php?respuesta=error&o=encontrad");
        }
    }

    public function buscar($campo, $parametro) {
        try {
            return Transaccion::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function eliminar($id) {
        try {
            $arrayTransaccion = array();
            $arrayTransaccion['idTransaccion'] = $id;
            var_dump($arrayTransaccion);
            $Transaccion = new Transaccion($arrayTransaccion);
            $Transaccion->eliminar();

            header("Location: ../views/verElementos.php?respuesta=correcto&o=eliminad");
        } catch (Exception $e) {
            header("Location: ../views/verElementos.php?respuesta=error&o=eliminad");
        }
    }

}

?>