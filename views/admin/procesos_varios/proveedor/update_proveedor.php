<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    $id = $_POST['id'];

    $imgFile= $_FILES['img']['name'];
    $img_dir = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];

    $proveedor = $_POST['proveedor'];
    $tel_proveedor = $_POST['tel_proveedor'];
    $direccion = $_POST['direccion'];

    $carpeta = "proveedor/".$proveedor."/"; //Ruta de almacenamiento de imagen
    $path = "../../../../public/img/".$carpeta; //Ruta completa de almacenamiento
    $imgExpot = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $newName = $proveedor.".".$imgExpot;
    $cargar_img = CargarIMG($img_dir,$imgSize,$newName,$path);

    if($imgSize == 0){
        $tabla = "proveedor";
        $campos = "`nombre_prov`='$proveedor',`direccion_prov`='$direccion',`telefono_prov`='$tel_proveedor'";
        $sql = "UPDATE $tabla SET $campos WHERE id_proveedor='$id'";
        $result = U_I_D($sql);

        if($result){
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Sucursal Actualizado y imagen no actualizado...");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Sucursal no Actualizado...");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                })
            </script>';
        }
    }else{
        $img = $carpeta.$newName;
        $tabla = "proveedor";
        $campos = "`nombre_prov`='$proveedor',`direccion_prov`='$direccion',`telefono_prov`='$tel_proveedor',`img_prov`='$img'";
        $sql = "UPDATE $tabla SET $campos WHERE id_proveedor='$id'";
        $result = U_I_D($sql);

        if($result){
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Sucursal Actualizado...");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Sucursal no Actualizado...");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                })
            </script>';
        }
    }
?>