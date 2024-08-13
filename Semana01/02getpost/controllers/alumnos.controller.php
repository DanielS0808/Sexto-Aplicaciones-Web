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
}

