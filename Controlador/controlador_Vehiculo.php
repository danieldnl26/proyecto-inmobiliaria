<?php

require_once(__DIR__ . '/../Modelo/Vehiculo.php');
if (!empty($_GET['action'])) {
    controlador_Vehiculo::main($_GET['action']);
    $action = $_GET['action'];
}

class controlador_Vehiculo {

    static function main($action) {
        if ($action == "crear") {
            controlador_Vehiculo::crear();
        } else if ($action == "editar") {
            controlador_Vehiculo::editar();
        } else if ($action == "buscarID") {
            controlador_Vehiculo::buscarID(1);
        } else if ($action == "eliminar") {
            controlador_Vehiculo::eliminar();
        }
    }

    static public function crear() {
        try {
            if (Vehiculo::validacion1($_POST['Placa'])) {
                header("Location: ../Vista/HistorialVehiculos.php?respuesta=repetido&o=cread");
            } else {
                $fotos = array();
                if (!empty($_FILES['Foto_1']['tmp_name'])) {
                    $archivo = $_FILES['Foto_1']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_1']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_1']['name'];
                }

                if (!empty($_FILES['Foto_2']['tmp_name'])) {
                    $archivo = $_FILES['Foto_2']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_2']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_2']['name'];
                }

                if (!empty($_FILES['Foto_3']['tmp_name'])) {
                    $archivo = $_FILES['Foto_3']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_3']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_3']['name'];
                }

                if (!empty($_FILES['Foto_4']['tmp_name'])) {
                    $archivo = $_FILES['Foto_4']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_4']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_4']['name'];
                }

                if (!empty($_FILES['Foto_5']['tmp_name'])) {
                    $archivo = $_FILES['Foto_5']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_5']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_5']['name'];
                }

                if (!empty($_FILES['Foto_6']['tmp_name'])) {
                    $archivo = $_FILES['Foto_6']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_6']['name'];
                    move_uploaded_file($archivo, $destino);
                    $fotos[] = $_FILES['Foto_6']['name'];
                }

                $arrayVehiculo = array();
                $arrayVehiculo['Codigo'] = $_POST['Codigo'];
                $arrayVehiculo['Placa'] = $_POST['Placa'];
                $arrayVehiculo['Modelo'] = $_POST['Modelo'];
                $arrayVehiculo['Linea'] = $_POST['Linea'];
                $arrayVehiculo['Cilindraje'] = $_POST['Cilindraje'];
                $arrayVehiculo['Seguro'] = $_POST['Seguro'];
                $arrayVehiculo['Precio'] = $_POST['Precio'];
                $arrayVehiculo['Resistencia'] = $_POST['Resistencia'];
                $arrayVehiculo['Color'] = $_POST['Color'];
                $arrayVehiculo['Fotos'] = implode("=>", $fotos);

                $arrayVehiculo['Kilometraje'] = $_POST['Kilometraje'];
                $arrayVehiculo['Servicio'] = $_POST['Servicio'];
                $arrayVehiculo['Traccion'] = $_POST['Traccion'];
                $arrayVehiculo['TipoCombustible'] = $_POST['TipoCombustible'];
                //$arrayVehiculo['Estado'] = $_POST['Estado'];
                $arrayVehiculo['Descripcion'] = $_POST['Descripcion'];
                $arrayVehiculo['Categoria_idCategoria'] = $_POST['Categoria'];
                $arrayVehiculo['Ciudad_idCiudad'] = $_POST['Ciudad'];
                $arrayVehiculo['Marca_idMarca'] = $_POST['Marca'];
                $arrayVehiculo['Persona_idPersona'] = $_POST['Persona'];

                var_dump($arrayVehiculo);
                $Vehiculo = new Vehiculo($arrayVehiculo);
                $Vehiculo->insertar();
                header("Location: ../Vista/HistorialVehiculos.php?respuesta=correcto&o=cread");
            }
        } catch (Exception $e) {
            header("Location: ../Vista/HistorialVehiculos.php?respuesta=error&o=cread");
        }
    }

    static public function editar() {
        try {

            $fotos = array();
            if (!empty($_FILES['Foto_1']['tmp_name'])) {
                $archivo = $_FILES['Foto_1']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_1']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_1']['name'];
            } else {
                $fotos[] = $_POST['Foto_11'];
            }

            if (!empty($_FILES['Foto_2']['tmp_name'])) {
                $archivo = $_FILES['Foto_2']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_2']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_2']['name'];
            }else {
                $fotos[] = $_POST['Foto_22'];
            }

            if (!empty($_FILES['Foto_3']['tmp_name'])) {
                $archivo = $_FILES['Foto_3']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_3']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_3']['name'];
            }else {
                $fotos[] = $_POST['Foto_33'];
            }

            if (!empty($_FILES['Foto_4']['tmp_name'])) {
                $archivo = $_FILES['Foto_4']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_4']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_4']['name'];
            }else {
                $fotos[] = $_POST['Foto_44'];
            }

            if (!empty($_FILES['Foto_5']['tmp_name'])) {
                $archivo = $_FILES['Foto_5']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_5']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_5']['name'];
            }else {
                $fotos[] = $_POST['Foto_55'];
            }

            if (!empty($_FILES['Foto_6']['tmp_name'])) {
                $archivo = $_FILES['Foto_6']['tmp_name'];
                $destino = "../Vista/imagenesVehiculos/" . $_FILES['Foto_6']['name'];
                move_uploaded_file($archivo, $destino);
                $fotos[] = $_FILES['Foto_6']['name'];
            }else {
                $fotos[] = $_POST['Foto_66'];
            }

            $arrayVehiculo = array();
            //$arrayVehiculo['Codigo'] = $_POST['Codigo'];
            $arrayVehiculo['Placa'] = $_POST['Placa'];
            $arrayVehiculo['Modelo'] = $_POST['Modelo'];
            $arrayVehiculo['Linea'] = $_POST['Linea'];
            $arrayVehiculo['Cilindraje'] = $_POST['Cilindraje'];
            $arrayVehiculo['Seguro'] = $_POST['Seguro'];
            $arrayVehiculo['Precio'] = $_POST['Precio'];
            $arrayVehiculo['Resistencia'] = $_POST['Resistencia'];
            $arrayVehiculo['Color'] = $_POST['Color'];
            $arrayVehiculo['Fotos'] = implode("=>", $fotos);
            $arrayVehiculo['Kilometraje'] = $_POST['Kilometraje'];
            $arrayVehiculo['Servicio'] = $_POST['Servicio'];
            $arrayVehiculo['Traccion'] = $_POST['Traccion'];
            $arrayVehiculo['TipoCombustible'] = $_POST['TipoCombustible'];
            //$arrayVehiculo['Estado'] = $_POST['Estado'];
            $arrayVehiculo['Descripcion'] = $_POST['Descripcion'];
            $arrayVehiculo['Categoria_idCategoria'] = $_POST['Categoria'];
            $arrayVehiculo['Ciudad_idCiudad'] = $_POST['Ciudad'];
            $arrayVehiculo['Marca_idMarca'] = $_POST['Marca'];
            $arrayVehiculo['Persona_idPersona'] = $_POST['Persona'];
            $arrayVehiculo['IdVehiculo'] = $_POST['Id'];
            var_dump($arrayVehiculo);
            $Vehiculo = new Vehiculo($arrayVehiculo);

            $Vehiculo->editar();
            header("Location: ../Vista/HistorialVehiculos.php?respuesta=correcto&o=modificad");
        } catch (Exception $e) {
            header("Location: ../Vista/HistorialVehiculos.php?respuesta=error&o=modificad");
        }
    }

    static public function buscarID($id) {
        try {
            return Vehiculo::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function buscarAll() {
        try {
            return Vehiculo::getAll();
        } catch (Exception $e) {
            header("Location: ../views/verElementos.php?respuesta=error&o=encontrad");
        }
    }

    public function buscar($campo, $parametro) {
        try {
            return elmento::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error&o=encontrad");
        }
    }

    static public function eliminar() {
        try {
            $arrayVehiculo = array();
            $arrayVehiculo['IdVehiculo'] = $_GET['IdVehiculo'];
            var_dump($arrayVehiculo);
            $Vehiculo = new Vehiculo($arrayVehiculo);
            $Vehiculo->eliminar();
//			header("Location: ../vista/HistorialVehiculos.php");

            header("Location: ../Vista/HistorialVehiculos.php?respuesta=correcto&o=eliminad");
        } catch (Exception $e) {
            header("Location: ../Vista/HistorialVehiculos.php?respuesta=error&o=eliminad");
        }
    }

}

?>