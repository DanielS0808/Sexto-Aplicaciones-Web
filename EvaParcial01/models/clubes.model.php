<?php
require_once('../config/config.php');

class Clubesmodel
{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "Select * From `clubes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idClubes) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();        
		$cadena = "SELECT * FROM `clubes` WHERE `idClubes`=$idClubes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
	
    public function insertar($idClubes, $Nombre, $Deporte, $Ubicacion, $Fecha_fundacion) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            #$cadena = "INSERT INTO `clubes` ( `Nombre`, `Deporte`, `Ubicacion`, `Fecha_fundacion`) VALUES ($Nombre, $Deporte, $Ubicacion, $Fecha_fundacion)";
            $cadena = "INSERT INTO `clubes` (`idClubes`, `Nombre`, `Deporte`, `Ubicacion`, `Fecha_fundacion`) VALUES ($idClubes, '$Nombre', '$Deporte', '$Ubicacion', '$Fecha_fundacion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idClubes, $Nombre, $Deporte, $Ubicacion, $Fecha_fundacion) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clubes` SET `Nombre`='$Nombre',`Deporte`='$Deporte',`Ubicacion`='$Ubicacion',`Fecha_fundacion`='$Fecha_fundacion' WHERE `idClubes` = $idClubes";
            if (mysqli_query($con, $cadena)) {
                return $idClubes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idClubes) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clubes` WHERE `idClubes`= $idClubes";            
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}