<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/asistentes.model.php');
error_reporting(0);

$asistente = new Asistente();

switch ($_GET["op"]) {
    
    case 'todos':
        $datos = array();
        $datos = $asistente->todos();
        $asistentes = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $asistentes[] = array_map('utf8_encode', $row);
        }
        echo json_encode($asistentes);
        break;

    case 'uno':
        if (!isset($_POST["asistente_id"])) {
            echo json_encode(["error" => "Asistente ID not specified."]);
            exit();
        }
        $asistente_id = intval($_POST["asistente_id"]);
        $datos = array();
        $datos = $asistente->uno($asistente_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = $asistente->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;

    case 'actualizar': 
        if (!isset($_POST["asistente_id"]) || !isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $asistente_id = intval($_POST["asistente_id"]);
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = $asistente->actualizar($asistente_id, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["asistente_id"])) {
            echo json_encode(["error" => "Asistente ID not specified."]);
            exit();
        }
        $asistente_id = intval($_POST["asistente_id"]);
        $datos = $asistente->eliminar($asistente_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
