<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    if($_GET['option'] == 2){
        $stock = $_GET['stock'];
        $id_stock = $_GET['id-stock'];
        $query = "UPDATE `inventarios` SET `stock` = $stock WHERE `inventarios`.`id_inventario` = $id_stock";
        $result = U_I_D($query);

        if($result == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Stock","Stock Actualizado!");
                    $("#contenido-procesos").load("procesos_varios/inventario/principal_stock.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Stock","Error al Actualizar Stock");
                    $("#contenido-procesos").load("procesos_varios/inventario/principal_stock.php");
                }) 
            </script>';
        }
    }else{
        $id_limite = $_GET['id-limite'];
        $query = "DELETE FROM `limite_productos` WHERE `limite_productos`.`id_limite`=$id_limite";
        $result = U_I_D($query);

        if($result == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Limite Eliminado!");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Error al Eliminar Limite");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
                    
                })
            </script>';
        }
    }

?>