<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-stock.js"></script>

<?php 
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    $id_stock = $_GET['id-stock'];
    $state = $_GET['estado'];
    $query = "UPDATE inventarios SET estado=$state WHERE id_inventario=$id_stock";
    $result = U_I_D($query);
    if($result == 1){
        echo '<script>
            $(document).ready(function(event){
                alertify.alert("Stock","Stock Actualizado!");
                $("#contenido-procesos").load("procesos_varios/inventario/principal_stock.php");
            })
        </script>';
    }else{
        echo '<script>
            $(document).ready(function(event){
                alertify.alert("Stock","Error al Actualizar Stock");
                $("#contenido-procesos").load("procesos_varios/inventario/principal_stock.php");
            }) 
        </script>';
    }
    
?>