<script src="../../public/js/funciones-carrito.js"></script>
<?php
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
    include '../../../controllers/procesos.php';

    //Accion para agregar al carrito
    if($_GET['accion'] == 0){
        $get_id = $_GET['id'];

        $query = "SELECT * FROM producto WHERE id_producto='$get_id'";
        $DataProducto = SelectData($query);

        foreach ($DataProducto as $resultado) {
            $id_producto = $resultado['id_producto'];
            $nombre = $resultado['nombre_productos'];
            $descripcion = $resultado['descripcion'];
            $precio_v = $resultado['precio_venta'];
        }


        if (!isset($_SESSION['CARRITO'])) {
            $product = array(
                'ID' => $id_producto,
                'NOMBRE' => $nombre,
                'DESCRIP' => $descripcion,
                'PRECIO_V' => $precio_v
            );
            $_SESSION['CARRITO'][0] = $product;
        } else {
            $num_product = count($_SESSION['CARRITO']);
            $product = array(
                'ID' => $id_producto,
                'NOMBRE' => $nombre,
                'DESCRIP' => $descripcion,
                'PRECIO_V' => $precio_v
            );
            $_SESSION['CARRITO'][$num_product] = $product;
        }
        echo '<script>
        $(document).ready(function() 
        {
            alertify.notify("Agregado al carrito","success");
            $("#capa").load("ventas/principal.php");
            event.preventDefault();
        });
    </script>';
    }else{
        $id_carrito = $_GET['id_carrito']; //ID para eliminar un producto del carrito
        //Eliminar producto del carrito

        foreach ($_SESSION['CARRITO'] as $index => $result) {
            if ($index == $id_carrito) {
                unset($_SESSION['CARRITO'][$index]); //Elimamos el producto de la sesion
            }
        }
        echo '<script>
        $(document).ready(function() 
        {
            alertify.message("Eliminado");
            $("#capa").load("ventas/principal.php");
            event.preventDefault();
        });
    </script>';
    }
?>