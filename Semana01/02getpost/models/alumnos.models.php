<?php
require_once('../config/conexion.php');

class Alumnos {

	public function todos() { //Select * From alumnos
		$con = new ClaseConectar();
		$con = $con->ProcedemientoParaConectar();
		$cadena = "Select * From alumnos";
		$datos = mysqli_query($con, $cadena);
		$con->close();
		return $datos;
	}

	public function uno($idAlumno) { //Select * From alumnos Where id=1
		$con = new ClaseConectar();
		$con = $con->ProcedemientoParaConectar();
		$cadena = "Select * From alumnos Where idAlumno=$idAlumno";
		$datos = mysqli_query($con, $cadena);
		$con->close();
		return $datos;

	}

	public function insertar($idAlumno, $Nombre, $Apellido, $Edad) { //Insert Into alumnos Values ()
		$con = new ClaseConectar();
		$con = $con->ProcedemientoParaConectar();
		$cadena = "Insert Into alumnos(Nombre, Apellido, Edad) Values('$Nombre','$Apellido',$Edad)";				
		$datos = mysqli_query($con, $cadena);
		$con->close();
		return $datos;

	}

	public function actualizar($idAlumno, $Nombre, $Apellido, $Edad) { //Update alumnos Set Where id=1
		$con = new ClaseConectar();
		$con = $con->ProcedemientoParaConectar();
		$cadena = "Update alumnos Set Nombre='$Nombre', Apellido='$Apellido', Edad=$Edad Where idAlumno=$idAlumno";
		$datos = mysqli_query($con, $cadena);
		$con->close();
		return $datos;
	}

	public function eliminar($idAlumno) { //Delete alumnos 
		$con = new ClaseConectar();
		$con = $con->ProcedemientoParaConectar();
		$cadena = "Delete alumnos Where idAlumno=$idAlumno";
		$datos = mysqli_query($con, $cadena);
		$con->close();
		return $datos;
	}
}