<?php
require_once('../config/config.php');

class Procurador {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM procuradores";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function uno($pro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM procuradores WHERE pro_id = $pro_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function insertar($pro_cod, $pro_nom, $pro_ape, $pro_cel, $pro_ema) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO procuradores (pro_cod, pro_nom, pro_ape, pro_cel, pro_ema) 
                VALUES ('$pro_cod', '$pro_nom', '$pro_ape', '$pro_cel', '$pro_ema')";
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
    
    public function actualizar($pro_id, $pro_cod, $pro_nom, $pro_ape, $pro_cel, $pro_ema) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE procuradores 
                SET pro_cod = '$pro_cod', pro_nom = '$pro_nom', pro_ape = '$pro_ape', pro_cel = '$pro_cel', pro_ema = '$pro_ema'
                WHERE pro_id = $pro_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $pro_id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    public function eliminar($pro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM procuradores WHERE pro_id = $pro_id";
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
