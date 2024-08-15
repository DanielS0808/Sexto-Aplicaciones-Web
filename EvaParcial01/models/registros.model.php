<?php
require_once('../config/config.php');

class Registrosmodel
{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "Select * From `registros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idregistros) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();        
		$cadena = "SELECT * FROM `registros` WHERE `idregistros`=$idregistros";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
	
    public function insertar($Estado, $Fecha_Registro, $Clubes_idClubes, $Miembros_idMiembros) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `registros` ( `Estado`, `Fecha_Registro`, `Clubes_idClubes`, `Miembros_idMiembros`) VALUES ($Estado, $Fecha_Registro, $Clubes_idClubes, $Miembros_idMiembros)";
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
    public function actualizar($Estado, $Fecha_Registro, $Clubes_idClubes, $Miembros_idMiembros) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `registros` SET `Estado`='$Estado',`Fecha_Registro`='$Fecha_Registro',`Clubes_idClubes`='$Clubes_idClubes',`Miembros_idMiembros`='$Miembros_idMiembros' WHERE `idregistros` = $idregistros";
            if (mysqli_query($con, $cadena)) {
                return $idProveedores;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idregistros) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `registros` WHERE `idregistros`= $idregistros";            
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