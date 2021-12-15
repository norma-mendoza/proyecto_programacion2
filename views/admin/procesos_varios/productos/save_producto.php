<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    //Obteniendo info de la imagen
    $imgFile= $_FILES['imagen']['name'];
    $img_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $id_categoria = $_POST['id_categoria'];

    $queryCate = "SELECT * FROM categorias WHERE id_categoria='$id_categoria'";
    $dataCate = SelectData($queryCate,'i');
    foreach($dataCate AS $result){
        $categoria = $result['categoria'];
    }
    $id_product = $_POST['id_producto'];
    $id_proveedor = $_POST['id_proveedor'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $unidad_medida = $_POST['unidad_medida'];
    $precio_v = $_POST['precio_venta'];
    $precio_c = $_POST['precio_compra'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    
    if(strtoupper(substr(PHP_OS,0,3)) == 'WIN'){
        $sistema = "Windows";
    }else{
        $sistema = "Linux";
    }

    $carpeta = "productos/".$categoria."/"; //Ruta de almacenamiento de imagen
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
            $campos = "`id_producto`, `nombre_productos`, `descripcion`, `precio_compra`, `precio_venta`, `unidad_medida`,`fecha_vencimiento`, `imagen`,`id_proveedor`";
            $valores = "$id_product,'$nombre_producto','$descripcion','$precio_c','$precio_v','$unidad_medida','$fecha_vencimiento','$img',$id_proveedor";
            $sql_insert_product = "INSERT INTO $tabla($campos) VALUES($valores)";
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
            $tabla1 = "inventarios";
            $campos1 = "`id_producto`, `id_categoria`, `stock`,`estado`";
            $valores1 = "$id_product,$id_categoria,$cantidad,'1'";
            $sql_insert_inventario = "INSERT INTO $tabla1($campos1) VALUES($valores1)";
            $insert_inventario = U_I_D($sql_insert_inventario);
            if($insert_inventario){
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Producto registrado en inventario...");
                        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    })
                </script>';
            }else{
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Producto no registrado en inventario...");
                        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    })
                </script>';
            }
        break;
    }
?>