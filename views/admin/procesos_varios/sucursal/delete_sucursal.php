<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    $id_sucursal = $_GET['id_sucursal'];

    $query = "DELETE FROM sucursal WHERE id_empresa=$id_sucursal";

    $result = U_I_D($query);

    if($result){
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal Eliminado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Sucursal no Eliminado...");
                $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
            })
        </script>';
    }
?>