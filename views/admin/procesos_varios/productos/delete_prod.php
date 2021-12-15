<?php
    session_start(); //Iniciamos la sesion
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    $id_product = $_GET['id_product'];
    $sql = "SELECT * FROM `producto` WHERE `id_producto`=$id_product";
    $dataProduct = SelectData($sql);
    foreach($dataProduct AS $result){
        $nombre = $result['nombre_productos'];
        $img_product = $result['imagen'];
    }
    $file = "../../../../public/img/".$img_product; //Ruta completa de
    $name_product_folder = explode("/",$img_product);
    $carpeta = "../../../../public/img/productos/".$name_product_folder[1]; //Carpeta a eliminar
    //Funcion para eliminar -> Eliminacion solo archivo
    rmDir_file('',$file);
    $query = "DELETE FROM `producto` WHERE `id_producto`=$id_product";

    $result = U_I_D($query);

    if($result == 1){
        echo '<script>
            $(document).ready(function(event){
                alertify.alert("Eliminar Producto","Producto Eliminado!");
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.alert("Eliminar Producto","Error al Eliminar Producto");
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                
            })
        </script>';
    }

?>