<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    if(isset($_GET['id-prov'])){
        $id_proveedor = $_GET['id-prov'];
        $sql = "SELECT * FROM `proveedor` WHERE `id_proveedor`=$id_proveedor";
        $dataProv = SelectData($sql);
        foreach($dataProv AS $result){
            $nombre_prov = $result['nombre_prov'];
        }
        $file = "../../../../public/img/proveedor/".$nombre_prov."/".$nombre_prov.".png"; //Ruta completa donde se encuentra la imagen
        $carpeta = "../../../../public/img/proveedor/".$nombre_prov; //Carpeta a eliminar
        //Eliminamos el archivo y la carpeta
        rmDir_file($carpeta,$file);

        $query = "DELETE FROM `proveedor` WHERE `id_proveedor`=$id_proveedor";

        $result = U_I_D($query);

        if($result == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro","Proveedor Eliminado!");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Proveedor","Error al Eliminar Limite");
                    $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
                    
                })
            </script>';
        }
    }



?>