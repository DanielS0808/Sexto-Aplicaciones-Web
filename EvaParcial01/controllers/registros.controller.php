<?php
require_once('../models/registros.model.php');
$registros = new Registrosmodel;

switch ($_GET["op"]) {
	
    case 'todos': 
        $datos = array(); 
        $datos = $registros->todos(); 
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;        
    case 'uno':
        $idregistros = $_POST["idregistros"];
        $datos = array();
        $datos = $registros->uno($idregistros);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;     
    case 'insertar':
        $Estado = $_POST["Estado"];
        $Fecha_Registro = $_POST["Fecha_Registro"];
        $Clubes_idClubes = $_POST["Clubes_idClubes"];
        $Miembros_idMiembros = $_POST["Miembros_idMiembros"];
        $datos = array();
        $datos = $registros->insertar($Estado, $Fecha_Registro, $Clubes_idClubes, $Miembros_idMiembros);
        echo json_encode($datos);
        break;        
    case 'actualizar':
        $idregistros = $_POST["idregistros"];
        $Estado = $_POST["Estado"];
        $Fecha_Registro = $_POST["Fecha_Registro"];
        $Clubes_idClubes = $_POST["Clubes_idClubes"];
        $Miembros_idMiembros = $_POST["Miembros_idMiembros"];        
        $datos = array();
        $datos = $registros->actualizar($idregistros, $Estado, $Fecha_Registro, $Clubes_idClubes, $Miembros_idMiembros);
        echo json_encode($datos);
        break;        
    case 'eliminar':
        $idregistros = $_POST["idregistros"];
        $datos = array();
        $datos = $registros->eliminar($idregistros);
        echo json_encode($datos);
        break;
}