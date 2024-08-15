<?php
require_once("../models/alumnos.models.php");
$alumnos = new Alumnos();

switch ($_GET["op"]) {
	case "todos":
		$datos = $alumnos->todos();
		while($row = mysqli_fetch_assoc($datos)) {
			$todos[] = $row;
		}
		echo json_encode($todos);
		break;
	case "uno":
		$idAlumno = $_POST["idAlumno"];
		$datos = $alumnos->uno($idAlumno);
		$res = mysqli_fetch_assoc($datos);
		echo json_encode($res);
		break;
}

