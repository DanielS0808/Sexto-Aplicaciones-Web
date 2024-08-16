<?php
require_once('../models/clubes.model.php');
$clubes = new Clubesmodel;

switch ($_GET["op"]) {
	
    case 'todos': 
        $datos = array(); 
        $datos = $clubes->todos(); 
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;        
    case 'uno':
        $idClubes = $_POST["idClubes"];
        $datos = array();
        $datos = $clubes->uno($idClubes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;     
    case 'insertar':        
        $Nombre = $_POST["Nombre"];
        $Deporte = $_POST["Deporte"];
        $Ubicacion = $_POST["Ubicacion"];
        $Fecha_fundacion = $_POST["Fecha_fundacion"];
        $datos = array();
        $datos = $clubes->insertar($Nombre, $Deporte, $Ubicacion, $Fecha_fundacion);
        echo json_encode($datos);
        break;        
    case 'actualizar':
        $idClubes = $_POST["idClubes"];
        $Nombre = $_POST["Nombre"];
        $Deporte = $_POST["Deporte"];
        $Ubicacion = $_POST["Ubicacion"];
        $Fecha_fundacion = $_POST["Fecha_fundacion"];        
        $datos = array();
        $datos = $clubes->actualizar($idClubes, $Nombre, $Deporte, $Ubicacion, $Fecha_fundacion);
        echo json_encode($datos);
        break;        
    case 'eliminar':
        $idClubes = $_POST["idClubes"];
        $datos = array();
        $datos = $clubes->eliminar($idClubes);
        echo json_encode($datos);
        break;
}