<?php

require_once (__DIR__ . '/../Modelo/Persona.php');
//include_once '../clases/equipo_class.php';

if (!empty($_GET['action'])) {
    Persona_controler::main($_GET['action']);
}

class Persona_controler {

    static function main($action) {
        if ($action == "crear") {
            Persona_controler::crear();
        } else if ($action == "editar") {
            Persona_controler::editar();
        } else if ($action == "buscarID") {
            Persona_controler::buscarID(1);
        } else if ($action == "eliminar") {
            Persona_controler::eliminar();
        } else if ($action == "validacion") {
            Persona_controler::validacion();
        } else if ($action == "validacionPregunta") {
            Persona_controler::validacionPregunta();
        } else if ($action == "cerrarSesion") {
            Persona_controler::cerrarSesion();
        } else if ($action == "buscarAll") {
            Persona_controler::buscarAll();
        } else if ($action == "editarP") {
            Persona_controler::editarPersona();
        } else if ($action == "crearP") {
            Persona_controler::insertar();
        } else if ($action == "searchJSON") {
            Persona_controler::buscarJSON($_GET["q"]);
        }
    }

    static public function crear() {
        try {

            $arrayUsuarios = array();
            $arrayUsuarios['documento'] = $_POST['documento'];
            $arrayUsuarios['nombres'] = $_POST['nombres'];
            $arrayUsuarios['apellidos'] = $_POST['apellidos'];
            $arrayUsuarios['fecha'] = $_POST['fecha'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['correo'] = $_POST['correo'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['barrio'] = $_POST['barrio'];
            $arrayUsuarios['contrasena'] = md5($_POST['contrasena']);
            $arrayUsuarios['pregunta'] = $_POST['pregunta'];
            $arrayUsuarios['respuesta'] = $_POST['respuesta'];
            $usuario = new Persona($arrayUsuarios);
            $usuario->insertar();
            header("Location: ../Vista/Insertar_Persona.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Insertar_Persona.php?respuesta=error");
        }
    }

    static public function insertar() {
        try {
            if (Persona::validacion1($_POST['documento'])) {
                header("Location: ../Vista/Persona.php?respuesta=repetido&o=cread");
            } else {
                $arrayUsuarios = array();
                $arrayUsuarios['documento'] = $_POST['documento'];
                $arrayUsuarios['nombres'] = $_POST['nombres'];
                $arrayUsuarios['apellidos'] = $_POST['apellidos'];
                $arrayUsuarios['fecha'] = $_POST['fecha'];
                $arrayUsuarios['telefono'] = $_POST['telefono'];
                $arrayUsuarios['correo'] = $_POST['correo'];
                $arrayUsuarios['direccion'] = $_POST['direccion'];
                $arrayUsuarios['direccion'] = $_POST['direccion'];
                $arrayUsuarios['barrio'] = $_POST['barrio'];
                $arrayUsuarios['ciudad'] = $_POST['Ciudad'];
                var_dump($arrayUsuarios);
                $usuario = new Persona($arrayUsuarios);
                $usuario->insertarP();
                header("Location: ../Vista/Persona.php?respuesta=correcto&o=cread");
            }
        } catch (Exception $e) {
            header("Location: ../Vista/Persona.php?respuesta=error&o=cread");
        }
    }

    static public function editar() {
        try {
            $arrayUsuarios = array();

            $arrayUsuarios['documento'] = $_POST['documento'];
            $arrayUsuarios['contrasena'] = md5($_POST['contrasena']);
            $arrayUsuarios['pregunta'] = $_POST['pregunta'];
            $arrayUsuarios['respuesta'] = $_POST['respuesta'];
            $arrayUsuarios['idPersona'] = $_POST['Id'];

            var_dump($arrayUsuarios);
            $usuario = new Persona($arrayUsuarios);
            $usuario->editar();
            header("Location: ../Vista/login.php?respuesta=correcto&o=modificad");
        } catch (Exception $e) {
            header("Location: ../Vista/login.php?respuesta=error&o=modificad");
        }
    }

    static public function editarPersona() {
        try {
            $arrayUsuarios = array();

            $arrayUsuarios['documento'] = $_POST['documento'];
            $arrayUsuarios['nombres'] = $_POST['nombres'];
            $arrayUsuarios['apellidos'] = $_POST['apellidos'];
            $arrayUsuarios['fecha'] = $_POST['fecha'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['correo'] = $_POST['correo'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['barrio'] = $_POST['barrio'];
            $arrayUsuarios['ciudad'] = $_POST['Ciudad'];
            $arrayUsuarios['idPersona'] = $_POST['Id'];

            var_dump($arrayUsuarios);
            $usuario = new Persona($arrayUsuarios);
            $usuario->actualizar();
            header("Location: ../Vista/Persona.php?respuesta=correcto&o=modificad");
        } catch (Exception $e) {
            header("Location: ../Vista/Persona.php?respuesta=error&o=modificad");
        }
    }

    static public function eliminar() {
        try {
            $arrayCategoria = array();
            $arrayCategoria['idPersona'] = $_GET['id'];
            var_dump($arrayCategoria);
            $categoria = new Persona($arrayCategoria);
            $categoria->eliminar();

            header("Location: ../Vista/Persona.php?respuesta=correcto&o=eliminad");
        } catch (Exception $e) {
            header("Location: ../Vista/Persona.php?respuesta=error&o=eliminad");
        }
    }

    public function buscarID($id) {
        try {
            return Persona::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../InsertarPersona?respuesta=error");
        }
    }

    public function buscarAll() {
        try {
            return Persona::getAll();
        } catch (Exception $e) {
            header("Location: ../InsertarPersona?respuesta=error");
        }
    }

    public function buscar($campo, $parametro) {
        try {
            return usuarios::getAll();
        } catch (Exception $e) {
            header("Location: ../buscarUsu.php?respuesta=error");
        }
    }

    public static function validacion() {
        try {
            $usuario = $_POST['documento'];
            $contrasena = md5($_POST['contrasena']);
            $administrador = new Persona($usuario, $contrasena);
            $value = $administrador->validacion($usuario, $contrasena);
            if ($value == 1) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                echo $_SESSION['usuario'];
                header("Location: ../Vista/index.php?respuesta=correcto");
            } else {
                header("Location: ../Vista/login.php?respuesta=error");
            }
        } catch (Exception $ex) {
            header("Location: ../Vista/login.php?respuesta=error");
        }
    }

    public static function validacionPregunta() {
        try {
            $pregunta = $_POST['pregunta'];
            $respuesta = $_POST['respuesta'];
            $administrador = new Persona();
            $value = $administrador->validacionPregunta($pregunta, $respuesta);

            if ($value != false) {
                header("Location: ../Vista/restablecerDatos.php?respuesta=correcto&Id=$value");
            } else {
                header("Location: ../Vista/restablecerDatos.php?respuesta=error");
            }
        } catch (Exception $ex) {
            header("Location: ../Vista/restablecerDatos.php?respuesta=error");
        }
    }

    public static function cerrarSesion() {
        try {
            session_start();
            if (!empty($_SESSION['usuario'])) {
                session_destroy();
                header("Location: ../Vista/index.php");
            }
        } catch (Exception $ex) {
            header("Location: ../login.php?respuesta=error");
        }
    }

    public static function buscarJSON($datos) {
        try {
            $personas = Persona::buscar("SELECT * FROM persona WHERE nombres LIKE '%" . $datos . "%' ");
            $respuesta = array();
            foreach ($personas as $per) {
                $respuesta[] = array("value" => $per->getIdPersona(), "idPersona" => $per->getIdPersona(), "label" => $per->getNombres() . " " . $per->getApellidos());
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        } catch (Exception $e) {
            header("Location: ../InsertarPersona?respuesta=error");
        }
    }

}

?>
