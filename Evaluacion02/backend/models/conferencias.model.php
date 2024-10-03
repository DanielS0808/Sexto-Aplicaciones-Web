<?php
require_once('../config/config.php');

class Conferencia {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM conferencias";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function uno($conferencia_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM conferencias WHERE conferencia_id = $conferencia_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function insertar($nombre, $fecha, $ubicacion, $descripcion) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO conferencias (nombre, fecha, ubicacion, descripcion) 
                VALUES ('$nombre', '$fecha', '$ubicacion', '$descripcion')";        
        if (mysqli_query($con, $sql)) {
            $id = mysqli_insert_id($con);
            $con->close();
            return $id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
    
    public function actualizar($conferencia_id, $nombre, $fecha, $ubicacion, $descripcion) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE conferencias 
                SET nombre = '$nombre', fecha = '$fecha', ubicacion = '$ubicacion', descripcion = '$descripcion' 
                WHERE conferencia_id = $conferencia_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $conferencia_id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
    
    public function eliminar($conferencia_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM conferencias WHERE conferencia_id = $conferencia_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return 1;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
}
?>
