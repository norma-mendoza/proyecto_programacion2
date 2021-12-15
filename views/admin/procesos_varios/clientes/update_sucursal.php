<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    $id = $_POST['id'];
    $sucursal = $_POST['sucursal'];
    $email = $_POST['email'];
    $tel_sucursal = $_POST['tel_sucursal'];
    $direccion = $_POST['direccion'];

    $tabla = "sucursal";
    $campos = "`nombre_empresa`='$sucursal', `email_empresa`='$email', `telefono_empresa`='$tel_sucursal', `direccion_empresa`='$direccion'";
    $sql = "UPDATE $tabla SET $campos WHERE id_empresa='$id'";
    $result = U_I_D($sql);

    if($result){
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal Actualizado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal no Actualizado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }
?>