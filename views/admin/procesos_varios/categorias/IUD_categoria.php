<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    if(isset($_GET['insert_cate'])){
        $categoria = $_GET['categoria'];
        $query = "INSERT INTO categorias (categoria,imagen_categoria) VALUES('$categoria','')";
        $insertCate = U_I_D($query);
        if($insertCate){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Categoria Registrada");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Error al Registrada Categoria");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                })
            </script>';
        }
    }
    //Update Categoria
    if(isset($_POST['categoria'])){
        $categoria = $_POST['categoria'];
        $id_cate = $_POST['id_categoria'];
        $imgFile = $_FILES['imagen']['name'];
        $imgSize = $_FILES['imagen']['size'];
        $tmp_file = $_FILES['imagen']['tmp_name'];

        $carpeta = "categoria/".$categoria."/";
        $path = "../../../../public/img/".$carpeta; //Ruta completa de 
        $imgExpot = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //Obtenemos la extension del file
        $newName = $categoria.".".$imgExpot;

        if($imgSize == 0){
            //Insertar en la tabla
            $img = $carpeta.$newName; //Ruta mas nombre de archivo
            $tabla = "categorias";
            $valores = "categoria='$categoria'";
            $sql_insert_product = "UPDATE $tabla SET $valores WHERE id_categoria=$id_cate";
            $insert_product = U_I_D($sql_insert_product);
            if($insert_product){
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Categoria Actualizado...");
                        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                    })
                </script>';
            }else{
                echo '<script>
                    $(document).ready(function(event){
                        alertify.success("Categoria no registrado...");
                        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                    })
                </script>';
            }
        }else{
            $cargar_img = CargarIMG($tmp_file,$imgSize,$newName,$path);
            //Delete img anterior
            $sql = "SELECT * FROM `categorias` WHERE `id_categoria`=$id_cate";
            $dataCate = SelectData($sql);
            foreach($dataCate AS $result){
                $nombre_categoria = $result['categoria'];
                $img_cate = $result['imagen_categoria'];
            }
            $nombre_cate_anterior = explode("/",$img_cate); //Obtenemos el nombre de categoria para borrar la ruta del campo imagen
            if($nombre_categoria != $nombre_cate_anterior){
                $del_file = "../../../../public/img/".$img_cate; //Ruta completa de
                $del_carpeta = "../../../../public/img/categoria/".$nombre_cate_anterior[1]; //Carpeta a eliminar
                //Eliminamos el archivo y la carpeta
                rmDir_file($del_carpeta,$del_file);
            }
            
            switch($cargar_img){
                case 0:
                    echo '<script>
                        $(document).ready(function(event){
                            alertify.alert("Cargar Imagen","Error datos e Imagen no cargados...");
                            $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                            
                        })
                    </script>';
                break;
                case 1:
                    $img = $carpeta.$newName;
                    $tabla = "categorias";
                    $valores = "categoria='$categoria',imagen_categoria='$img'";
                    $sql_insert_product = "UPDATE $tabla SET $valores WHERE id_categoria=$id_cate";
                    $insert_product = U_I_D($sql_insert_product);
        
                    if($insert_product){
                        echo '<script>
                            $(document).ready(function(event){
                                alertify.success("Categoria Actualizado...");
                                $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                            })
                        </script>';
                    }else{
                        echo '<script>
                            $(document).ready(function(event){
                                alertify.success("Categoria no registrado...");
                                $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                            })
                        </script>';
                    }
                break;
            }
        }
    }
