<?php
require_once('../models/miembros.model.php');
$miembros = new Miembrosmodel;

switch ($_GET["op"]) {
	
    case 'todos': 
        $datos = array(); 
        $datos = $miembros->todos(); 
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;        
    case 'uno':
        $idmiembros = $_POST["idmiembros"];
        $datos = array();
        $datos = $miembros->uno($idmiembros);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;     
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Email = $_POST["Email"];
        $Telefono = $_POST["Telefono"];
        $datos = array();
        $datos = $miembros->insertar($Nombre, $Apellido, $Email, $Telefono);
        echo json_encode($datos);
        break;        
    case 'actualizar':
        $idmiembros = $_POST["idmiembros"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Email = $_POST["Email"];
        $Telefono = $_POST["Telefono"];        
        $datos = array();
        $datos = $miembros->actualizar($idmiembros, $Nombre, $Apellido, $Email, $Telefono);
        echo json_encode($datos);
        break;        
    case 'eliminar':
        $idmiembros = $_POST["idmiembros"];
        $datos = array();
        $datos = $miembros->eliminar($idmiembros);
        echo json_encode($datos);
        break;
}