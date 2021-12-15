<?php
    //Incluimos el modelo y controlador
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
    include '../../../controllers/procesos.php';
    //Obteniendo info de la imagen
    $imgFile= $_FILES['imagen']['name'];
    $img_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $carpeta = "login/"; //Ruta de almacenamiento de imagen
    $path = "../../../public/img/".$carpeta; //Ruta completa de almacenamiento
    $imgExpot = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $newName = "banner.".$imgExpot;

    if($imgSize == 0){
        echo '<script>
            $(document).ready(function(event){
                alertify.success("Imagen no cargada...");
                $("#capa").load("configuracion/principal.php");
            })
        </script>';
    }else{
        if($imgExpot == 'jpg'){
            $cargar_img = CargarIMG($img_dir,$imgSize,$newName,$path);   
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Imagen principal modificado...");
                    $("#capa").load("configuracion/principal.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.success("Formato no soportado...");
                    $("#capa").load("configuracion/principal.php");
                })
            </script>';
        }
    }

?>