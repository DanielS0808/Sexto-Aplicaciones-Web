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

require_once('../models/procuradores.model.php');
error_reporting(0);

$procurador = new Procurador();

switch ($_GET["op"]) {
    
    case 'todos':
        $datos = array();
        $datos = $procurador->todos();
        $procuradores = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $procuradores[] = array_map('utf8_encode', $row);
        }
        echo json_encode($procuradores);
        break;

    case 'uno':
        if (!isset($_POST["pro_id"])) {
            echo json_encode(["error" => "Procurador ID not specified."]);
            exit();
        }
        $pro_id = intval($_POST["pro_id"]);
        $datos = array();
        $datos = $procurador->uno($pro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        if (!isset($_POST["pro_cod"]) || !isset($_POST["pro_nom"]) || !isset($_POST["pro_ape"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $pro_cod = $_POST["pro_cod"];
        $pro_nom = $_POST["pro_nom"];
        $pro_ape = $_POST["pro_ape"];        
        $pro_cel = $_POST["pro_cel"];
        $pro_ema = $_POST["pro_ema"];
        $datos = $procurador->insertar($pro_cod, $pro_nom, $pro_ape, $pro_cel, $pro_ema);
        echo json_encode($datos);
        break;

    case 'actualizar': 
        if (!isset($_POST["pro_id"]) || !isset($_POST["pro_cod"]) || !isset($_POST["pro_nom"]) || !isset($_POST["pro_ape"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }
        $pro_id = intval($_POST["pro_id"]);
        $pro_cod = $_POST["pro_cod"];
        $pro_nom = $_POST["pro_nom"];
        $pro_ape = $_POST["pro_ape"];
        $pro_dir = $_POST["pro_dir"];
        $pro_cel = $_POST["pro_cel"];
        $pro_ema = $_POST["pro_ema"];
        $datos = $procurador->actualizar($pro_id, $pro_cod, $pro_nom, $pro_ape, $pro_dir, $pro_cel, $pro_ema);
        echo json_encode($datos);
        break;

    case 'eliminar':
        if (!isset($_POST["pro_id"])) {
            echo json_encode(["error" => "Asistente ID not specified."]);
            exit();
        }
        $pro_id = intval($_POST["pro_id"]);
        $datos = $procurador->eliminar($pro_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
