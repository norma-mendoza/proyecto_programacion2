<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    $id_sucursal = $_GET['id_cliente'];

    $query = "DELETE FROM clientes WHERE id_cliente=$id_sucursal";

    $result = U_I_D($query);

    if($result){
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Cliente Eliminado...");
                $("#contenido-procesos").load("procesos_varios/clientes/principal.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Cliente no Eliminado...");
                $("#contenido-procesos").load("procesos_varios/clientes/principal.php");
            })
        </script>';
    }
?>