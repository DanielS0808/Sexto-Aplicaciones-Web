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

require_once('../models/conferencias.model.php');
error_reporting(0);

$conferencia = new Conferencia();

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $conferencia->todos();
        $conferencias = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $conferencias[] = array_map('utf8_encode', $row);
        }
        echo json_encode($conferencias);
        break;

    case 'uno':
        if (!isset($_POST["conferencia_id"])) {
            echo json_encode(["error" => "Conferencia ID not specified."]);
            exit();
        }
        $conferencia_id = intval($_POST["conferencia_id"]);
        $datos = array();
        $datos = $conferencia->uno($conferencia_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        if (!isset($_POST["nombre"]) || !isset($_POST["fecha"]) || !isset($_POST["ubicacion"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        $datos = $conferencia->insertar($nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);
        break;

    case 'actualizar': 
        if (!isset($_POST["conferencia_id"]) || !isset($_POST["nombre"]) || !isset($_POST["fecha"]) || !isset($_POST["ubicacion"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $conferencia_id = intval($_POST["conferencia_id"]);
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        $datos = $conferencia->actualizar($conferencia_id, $nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["conferencia_id"])) {
            echo json_encode(["error" => "Conferencia ID not specified."]);
            exit();
        }
        $conferencia_id = intval($_POST["conferencia_id"]);
        $datos = $conferencia->eliminar($conferencia_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
