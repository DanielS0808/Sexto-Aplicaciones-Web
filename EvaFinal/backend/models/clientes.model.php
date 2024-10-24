<?php
require_once('../config/config.php');

class Cliente {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM clientes";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function uno($cli_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM clientes WHERE cli_id = $cli_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function insertar($cli_cod, $cli_nom, $cli_ape, $cli_dir, $cli_cel, $cli_ema) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO clientes (cli_cod, cli_nom, cli_ape, cli_dir, cli_cel, cli_ema) 
                VALUES ('$cli_cod', '$cli_nom', '$cli_ape', '$cli_dir', '$cli_cel', '$cli_ema')";
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
    
    public function actualizar($cli_id, $cli_cod, $cli_nom, $cli_ape, $cli_dir, $cli_cel, $cli_ema) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE clientes 
                SET cli_cod = '$cli_cod', cli_nom = '$cli_nom', cli_ape = '$cli_ape', cli_dir = '$cli_dir', cli_cel = '$cli_cel', cli_ema = '$cli_ema'
                WHERE cli_id = $cli_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $cli_id;
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    public function eliminar($cli_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM clientes WHERE cli_id = $cli_id";
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
