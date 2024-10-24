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

require_once('../models/expedientes.model.php');
error_reporting(0);

$expediente = new Expediente();

switch ($_GET["op"]) {
    
    case 'todos':
        $datos = array();
        $datos = $expediente->todos();
        $expedientes = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $expedientes[] = array_map('utf8_encode', $row);
        }
        echo json_encode($expedientes);
        break;

    case 'uno':
        if (!isset($_POST["exp_id"])) {
            echo json_encode(["error" => "Expediente ID not specified."]);
            exit();
        }
        $exp_id = intval($_POST["exp_id"]);
        $datos = array();
        $datos = $expediente->uno($exp_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        if (!isset($_POST["exp_cod"]) || !isset($_POST["exp_des"]) || !isset($_POST["cli_id"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $exp_cod = $_POST["exp_cod"];
        $exp_des = $_POST["exp_des"];
        $cli_id  = $_POST["cli_id"];
        $datos = $expediente->insertar($exp_cod, $exp_des, $cli_id);
        echo json_encode($datos);
        break;

    case 'actualizar': 
        if (!isset($_POST["exp_id"]) || !isset($_POST["exp_cod"]) || !isset($_POST["exp_des"]) || !isset($_POST["cli_id"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $exp_id = intval($_POST["exp_id"]);
        $exp_cod = $_POST["exp_cod"];
        $exp_des = $_POST["exp_des"];
        $cli_id = $_POST["cli_id"];;
        $datos = $expediente->actualizar($exp_id, $exp_cod, $exp_des, $cli_id);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["exp_id"])) {
            echo json_encode(["error" => "Asistente ID not specified."]);
            exit();
        }
        $pro_id = intval($_POST["pro_id"]);
        $datos = $expediente->eliminar($pro_id);
        echo json_encode($datos);
        break;
    
    case 'obt_clientes':
        $datos = array();
        $datos = $expediente->obt_clientes();
        $expedientes = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $expedientes[] = array_map('utf8_encode', $row);
        }
        echo json_encode($expedientes);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
