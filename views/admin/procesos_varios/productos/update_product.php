<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    //Obteniendo info de la imagen
    $imgFile= $_FILES['imagen']['name'];
    $img_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $id_product = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $unidad_medida = $_POST['unidad_medida'];
    $fecha_v = $_POST['fecha_v'];
    $precio_v = $_POST['precio_venta'];
    $precio_c = $_POST['precio_compra'];

    //Consulta para buscar el producto
    $query = "SELECT * FROM producto WHERE id_producto=$id_product";
    $dataProduct = SelectData($query, "i");

    foreach($dataProduct AS $result){
        $imagen_last = $result['imagen'];
    }

    $nombre_carpeta_ante = explode("/",$imagen_last);
    $carpeta = "productos/".$nombre_carpeta_ante[1]."/"; //Ruta de almacenamiento de imagen
    $path = "../../../../public/img/".$carpeta; //Ruta completa de almacenamiento
    $imgExpot = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $newName = $nombre_producto.".".$imgExpot;
    $cargar_img = CargarIMG($img_dir,$imgSize,$newName,$path);
    switch($cargar_img){
        case 0:
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Cargar Imagen","Error datos e Imagen no cargados...");
                    $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    
                })
            </script>';
        break;
        case 1:
            $img = $carpeta.$newName;
            $tabla = "producto";
            $valores = "nombre_productos='$nombre_producto',descripcion='$descripcion',precio_compra='$precio_c',precio_venta='$precio_v',unidad_medida='$unidad_medida',fecha_vencimiento='$fecha_v',imagen='$img'";
            $sql_insert_product = "UPDATE $tabla SET $valores WHERE id_producto=$id_product";
            $insert_product = U_I_D($sql_insert_product);

            if($insert_product){
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Producto registrado...");
                        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    })
                </script>';
            }else{
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Producto no registrado...");
                        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    })
                </script>';
            }
        break;
    }
?>