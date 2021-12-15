<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    if(isset($_GET['delete_cate'])){
        $id_categoria = $_GET['id-cate'];
        $sql = "SELECT * FROM `categorias` WHERE `id_categoria`=$id_categoria";
        $dataCate = SelectData($sql);
        foreach($dataCate AS $result){
            $categoria = $result['categoria'];
            $img_cate = $result['imagen_categoria'];
        }
        $file = "../../../../public/img/".$img_cate; //Ruta completa de
        $carpeta = "../../../../public/img/categoria/".$categoria; //Carpeta a eliminar
        //Eliminamos el archivo y la carpeta
        rmDir_file($carpeta,$file);

        $query = "DELETE FROM `categorias` WHERE `id_categoria`=$id_categoria";

        $result = U_I_D($query);

        if($result == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Categoria Eliminado!");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Error al Eliminar Categoria");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                    
                })
            </script>';
        }
    }



?>