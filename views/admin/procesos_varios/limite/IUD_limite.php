<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    if($_GET['option'] == 1){
        $limite_product = $_GET['insert_limite'];
        $id_product = $_GET['id_product'];
        $query = "INSERT INTO limite_productos (id_producto,limite) VALUES('$id_product',$limite_product)";
        $insertLimite = U_I_D($query);
        if($insertLimite == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Limite Agregado!");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Error al Agregar Limite");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
                }) 
            </script>';
        }

    }elseif($_GET['option'] == 2){
        $limite_product = $_GET['limite-producto'];
        $id_limite = $_GET['id-limite'];
        $query = "UPDATE `limite_productos` SET `limite` = '$limite_product' WHERE `limite_productos`.`id_limite`=$id_limite";
        $result = U_I_D($query);

        if($result == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Limite Actualizado!");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Limite","Error al Actualizar Limite");
                    $("#contenido-procesos").load("procesos_varios/limite/principal_limite.php");
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