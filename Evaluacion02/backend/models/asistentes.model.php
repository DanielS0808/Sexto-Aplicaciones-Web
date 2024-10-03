<?php
require_once('../config/config.php');

class Asistente {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM asistentes";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function uno($asistente_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM asistentes WHERE asistente_id = $asistente_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function insertar($nombre, $apellido, $email, $telefono) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO asistentes (nombre, apellido, email, telefono) 
                VALUES ('$nombre', '$apellido', '$email', '$telefono')";
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
    
    public function actualizar($asistente_id, $nombre, $apellido, $email, $telefono) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE asistentes 
                SET nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono' 
                WHERE asistente_id = $asistente_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $asistente_id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
    
    public function eliminar($asistente_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM asistentes WHERE asistente_id = $asistente_id";
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
