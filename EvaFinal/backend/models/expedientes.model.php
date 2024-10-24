<?php
require_once('../config/config.php');

class Expediente {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        #$sql = "SELECT * FROM expedientes";
        $sql = "SELECT * FROM expedientes INNER JOIN clientes ON expedientes.cli_id=clientes.cli_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function uno($pro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM expedientes WHERE exp_id = $pro_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function insertar($exp_cod, $exp_des, $cli_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO expedientes (exp_cod, exp_des, cli_id) 
                VALUES ('$exp_cod', '$exp_des', '$cli_id')";
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
    
    public function actualizar($exp_id, $exp_cod, $exp_des, $cli_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE expedientes 
                SET exp_cod = '$exp_cod', exp_des = '$exp_des', cli_id = '$cli_id'
                WHERE exp_id = $exp_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $exp_id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    public function eliminar($exp_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM expedientes WHERE exp_id = $exp_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return 1;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    public function obt_clientes() {    
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        #$sql = "SELECT cli_id,CONCAT(cli_nom, ' ', cli_ape) FROM clientes ";  
        $sql = "SELECT cli_id, CONCAT(cli_nom, ' ', cli_ape) As cli_nom FROM clientes";      
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
}
?>
