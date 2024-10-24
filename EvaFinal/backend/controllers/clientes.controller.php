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

require_once('../models/clientes.model.php');
error_reporting(0);

$cliente = new Cliente();

switch ($_GET["op"]) {
    
    case 'todos':
        $datos = array();
        $datos = $cliente->todos();
        $clientes = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $clientes[] = array_map('utf8_encode', $row);
        }
        echo json_encode($clientes);
        break;

    case 'uno':
        if (!isset($_POST["cli_id"])) {
            echo json_encode(["error" => "Cliente ID not specified."]);
            exit();
        }
        $cli_id = intval($_POST["cli_id"]);
        $datos = array();
        $datos = $cliente->uno($cli_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        if (!isset($_POST["cli_cod"]) || !isset($_POST["cli_nom"]) || !isset($_POST["cli_ape"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $cli_cod = $_POST["cli_cod"];
        $cli_nom = $_POST["cli_nom"];
        $cli_ape = $_POST["cli_ape"];
        $cli_dir = $_POST["cli_dir"];
        $cli_cel = $_POST["cli_cel"];
        $cli_ema = $_POST["cli_ema"];
        $datos = $cliente->insertar($cli_cod, $cli_nom, $cli_ape, $cli_dir, $cli_cel, $cli_ema);
        echo json_encode($datos);
        break;

    case 'actualizar': 
        if (!isset($_POST["cli_id"]) || !isset($_POST["cli_cod"]) || !isset($_POST["cli_nom"]) || !isset($_POST["cli_ape"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $cli_id = intval($_POST["cli_id"]);
        $cli_cod = $_POST["cli_cod"];
        $cli_nom = $_POST["cli_nom"];
        $cli_ape = $_POST["cli_ape"];
        $cli_dir = $_POST["cli_dir"];
        $cli_cel = $_POST["cli_cel"];
        $cli_ema = $_POST["cli_ema"];
        $datos = $cliente->actualizar($cli_id, $cli_cod, $cli_nom, $cli_ape, $cli_dir, $cli_cel, $cli_ema);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["cli_id"])) {
            echo json_encode(["error" => "Asistente ID not specified."]);
            exit();
        }
        $cli_id = intval($_POST["cli_id"]);
        $datos = $cliente->eliminar($cli_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
