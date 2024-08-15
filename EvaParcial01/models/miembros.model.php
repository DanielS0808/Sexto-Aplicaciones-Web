<?php
require_once('../config/config.php');

class Miembrosmodel
{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "Select * From `miembros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idmiembros) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();        
		$cadena = "SELECT * FROM `miembros` WHERE `idmiembros`=$idmiembros";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
	
    public function insertar($Nombre, $Apellido, $Email, $Telefono) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `miembros` ( `Nombre`, `Apellido`, `Email`, `Telefono`) VALUES ($Nombre, $Apellido, $Email, $Telefono)";
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
    public function actualizar($Nombre, $Apellido, $Email, $Telefono) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `miembros` SET `Nombre`='$Nombre',`Apellido`='$Apellido',`Email`='$Email',`Telefono`='$Telefono' WHERE `idmiembros` = $idmiembros";
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
    public function eliminar($idmiembros) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `miembros` WHERE `idmiembros`= $idmiembros";            
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