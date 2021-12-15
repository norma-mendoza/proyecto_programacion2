<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";


    $sucursal = $_POST['sucursal'];
    $email = $_POST['email'];
    $tel_sucursal = $_POST['tel_sucursal'];
    $direccion = $_POST['direccion'];

    $tabla = "sucursal";
    $campos = "`nombre_empresa`, `email_empresa`, `telefono_empresa`, `direccion_empresa`";
    $valores = "'$sucursal','$email','$tel_sucursal','$direccion'";
    $sql = "INSERT INTO $tabla($campos) VALUES($valores)";
    $result = U_I_D($sql);

    if($result){
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal registrado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal no registrado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }
?>