<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    //Obteniendo info de la imagen
    $imgFile= $_FILES['imagen']['name'];
    $img_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $nombre_prov = $_POST['nombre_prov'];
    $direccion_prov = $_POST['direccion_prov'];
    $tel_prov = $_POST['tel_prov'];
    
    if(strtoupper(substr(PHP_OS,0,3)) == 'WIN'){
        $sistema = "Windows";
    }else{
        $sistema = "Linux";
    }

    $carpeta = "proveedor/".$nombre_prov."/"; //Ruta de almacenamiento de imagen
    $path = "../../../../public/img/".$carpeta; //Ruta completa de almacenamiento
    $imgExpot = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $newName = $nombre_prov.".".$imgExpot;
    $cargar_img = CargarIMG($img_dir,$imgSize,$newName,$path);
    switch($cargar_img){
        case 0:
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Cargar Imagen","Error datos e Imagen no cargados...");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                    
                })
            </script>';
        break;
        case 1:
            $img = $carpeta.$newName;
            $tabla = "proveedor";
            $campos = "`nombre_prov`, `direccion_prov`, `telefono_prov`, `img_prov`";
            $valores = "'$nombre_prov','$direccion_prov','$tel_prov','$img'";
            $sql_insert_product = "INSERT INTO $tabla($campos) VALUES($valores)";
            $insert_product = U_I_D($sql_insert_product);

            if($insert_product){
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Proveedor registrado...");
                        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                    })
                </script>';
            }else{
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Proveedor no registrado...");
                        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                    })
                </script>';
            }
        break;
    }
?>