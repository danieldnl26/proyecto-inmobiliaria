<?php

require_once(__DIR__ . '/../Modelo/Inmueble.php');
if (!empty($_GET['action'])) {
    inmueble_controller::main($_GET['action']);
    $action = $_GET['action'];
}

class inmueble_controller {

    static function main($action) {
        if ($action == "crear") {
            inmueble_controller::crear();
        } else if ($action == "editar") {
            inmueble_controller::editar();
        } else if ($action == "buscarID") {
            inmueble_controller::buscarID(1);
        } else if ($action == "eliminar") {
            inmueble_controller::eliminar($_GET['id']);
        } else if ($action == "buscarAll") {
            inmueble_controller::buscarAll();
        }
    }

    static public function crear() {
        try {
            $fotos = array();

            if (!empty($_FILES['Foto_1']['tmp_name'])) {
                $archivo = $_FILES['Foto_1']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_1']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_1']['name'];
            }

            if (!empty($_FILES['Foto_2']['tmp_name'])) {
                $archivo = $_FILES['Foto_2']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_2']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_2']['name'];
            }

            if (!empty($_FILES['Foto_3']['tmp_name'])) {
                $archivo = $_FILES['Foto_3']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_3']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_3']['name'];
            }

            if (!empty($_FILES['Foto_4']['tmp_name'])) {
                $archivo = $_FILES['Foto_4']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_4']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_4']['name'];
            }

            if (!empty($_FILES['Foto_5']['tmp_name'])) {
                $archivo = $_FILES['Foto_5']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_5']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_5']['name'];
            }

            if (!empty($_FILES['Foto_6']['tmp_name'])) {
                $archivo = $_FILES['Foto_6']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_6']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_6']['name'];
            }  

            $arrayInmuebles = array();
            $arrayInmuebles['Codigo'] = $_POST['Codigo'];
            $arrayInmuebles['Direccion'] = $_POST['Direccion'];
            $arrayInmuebles['Estratificacion'] = $_POST['Estratificacion'];
            $arrayInmuebles['Precio'] = $_POST['Precio'];
            $arrayInmuebles['Ubicacion'] = $_POST['Ubicacion'];
            //$arrayInmuebles['Estado'] = $_POST['Estado'];
            $arrayInmuebles['Area'] = $_POST['Area'];
            $arrayInmuebles['Fotos'] = implode("=>", $fotos);
            $arrayInmuebles['Descripcion'] = $_POST['Descripcion'];
            $arrayInmuebles['Persona_idPersona'] = $_POST['Persona'];
            $arrayInmuebles['Ciudad_idCiudad'] = $_POST['Ciudad_idCiudad'];
            $arrayInmuebles['Categoria_idCategoria'] = $_POST['Categoria'];
            var_dump($arrayInmuebles);
            $Inmuebles = new Inmueble($arrayInmuebles);
            $Inmuebles->insertar();
            //header("Location: ../Vista/VerInmueble.php?respuesta=correcto&o=cread");
        } catch (Exception $e) {
            //header("Location: ../Vista/VerInmueble.php?respuesta=error&o=cread");
        }
    }

    static public function editar() {
        try {
            $fotose = array();
            if (!empty($_FILES['Foto_1']['name'])) {
                $archivo = $_FILES['Foto_1']['name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_1']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_1']['name'];
            }else {
                $fotose[] = $_POST['Foto_11'];
            }

            if (!empty($_FILES['Foto_2']['name'])) {
                $archivo = $_FILES['Foto_2']['name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_2']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_2']['name'];
            }else {
                $fotose[] = $_POST['Foto_22'];
            }

            if (!empty($_FILES['Foto_3']['name'])) {
                $archivo = $_FILES['Foto_3']['name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_3']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_3']['name'];
            }else {
                $fotose[] = $_POST['Foto_33'];
            }

            if (!empty($_FILES['Foto_4']['name'])) {
                $archivo = $_FILES['Foto_4']['name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_4']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_4']['name'];
            } else {
                $fotose[] = $_POST['Foto_44'];
            }

            if (!empty($_FILES['Foto_5']['name'])) {
                $archivo = $_FILES['Foto_5']['name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_5']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_5']['name'];
            }else {
                $fotose[] = $_POST['Foto_55'];
            }

            if (!empty($_FILES['Foto_6']['tmp_name'])) {
                $archivo = $_FILES['Foto_6']['tmp_name'];
                $destino = "../Vista/ImagenesInmuebles/" . $_FILES['Foto_6']['name'];
                move_uploaded_file($archivo, $destino);
                $fotose[] = $_FILES['Foto_6']['name'];
            }else {
                $fotose[] = $_POST['Foto_66'];
            }

            $arrayInmuebles = array();
            //$arrayInmuebles['Codigo'] = $_POST['Codigo'];
            $arrayInmuebles['Direccion'] = $_POST['Direccion'];
            $arrayInmuebles['Estratificacion'] = $_POST['Estratificacion'];
            $arrayInmuebles['Precio'] = $_POST['Precio'];
            $arrayInmuebles['Ubicacion'] = $_POST['Ubicacion'];
            //$arrayInmuebles['Estado'] = $_POST['Estado'];
            $arrayInmuebles['Area'] = $_POST['Area'];
            $arrayInmuebles['Fotos'] = implode("=>", $fotose);
            $arrayInmuebles['Descripcion'] = $_POST['Descripcion'];
            $arrayInmuebles['Persona_idPersona'] = $_POST['Persona'];
            $arrayInmuebles['Ciudad_idCiudad'] = $_POST['Ciudad'];
            $arrayInmuebles['Categoria_idCategoria'] = $_POST['Categoria'];
            $arrayInmuebles['idInmueble'] = $_POST['id'];
            var_dump($arrayInmuebles);
            $Inmuebles = new Inmueble($arrayInmuebles);

            $Inmuebles->editar();
            header("Location: ../vista/VerInmueble.php?respuesta=correcto&o=modificad");
        } catch (Exception $e) {
            header("Location: ../vista/VerInmueble.php?respuesta=error&o=modificad");
        }
    }

    static public function buscarID($id) {
        try {
            return Inmueble::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function buscarAll() {
        try {
            return Inmueble::getAll();
        } catch (Exception $e) {
            header("Location: ../vista/verInmueble.php?respuesta=error&o=encontrad");
        }
    }

    public function buscar($campo, $parametro) {
        try {
            return Inmueble::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function eliminar() {
        try {
            $arrayInmuebles = array();
            $arrayInmuebles['idInmueble'] = $_GET['id'];
            var_dump($arrayInmuebles);
            $Inmuebles = new Inmueble($arrayInmuebles);
            $Inmuebles->eliminar();
//			header("Location: ../vista/HistorialVehiculos.php");

            header("Location: ../vista/VerInmueble.php?respuesta=correcto&o=eliminad");
        } catch (Exception $e) {
            header("Location: ../vista/VerInmueble.php?respuesta=error&o=eliminad");
        }
    }

}

?>
