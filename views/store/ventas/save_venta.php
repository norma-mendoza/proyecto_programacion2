<?php
session_start();
//ID de la sesion
$id_vendedor = $_SESSION['id_usuario'];
include '../../../models/conexion.php';
include '../../../models/procesos.php';
include '../../../controllers/procesos.php';

//Validacion segun venta
if (isset($_GET['option'])) {
    $id_sucursal = $_GET['id_sucursal'];
    $dui = $_GET['dui'];
    $fecha_v = date("Y-m-d"); //Fecha

    //Descuento
    $descuento = isset($_GET['descuento']) ? $_GET['descuento'] : '';

    if ($_GET['option'] == 1) {
        $nombres = $_GET['nombres'];
        $apellidos = $_GET['apellidos'];
        $tabla = "clientes";
        $campo = "id_cliente,nombres,apellidos";
        $valores = "'$dui','$nombres','$apellidos'";
        $query = "INSERT INTO $tabla ($campo) VALUES($valores)";
        $insert = U_I_D($query);
    }

    //Insertar en la tabla venta
    $total_pago = 0;
    foreach ($_SESSION['CARRITO'] as $result) {
        $total_pago += $result['PRECIO_V'];
    }
    //Calculando descuento
    if ($descuento != '') {
        $descuento_pago = ($total_pago * $descuento) / 100;
        $total_pago = $total_pago - $descuento_pago;
    }

    $query_venta = "INSERT INTO `ventas` (`fecha_venta`, `total_pago`, `descuento`, `id_cliente`, `id_usuario`) VALUES ('$fecha_v','$total_pago','$descuento',$dui,$id_vendedor)";
    $result = U_I_D($query_venta);

    //Obteniendo ID venta
    $query_client = "SELECT MAX(id_venta) as id FROM `ventas`";
    $result = SelectData($query_client, 'i');
    foreach ($result as $result) {
        $id_venta = $result['id'];
    }
    //Datos a guardar en detalle venta
    foreach ($_SESSION['CARRITO'] as $result) {
        $id_producto = $result['ID'];
        $precio_unitario = $result['PRECIO_V'];
        //Insertar en la tabla venta
        $query_detalle_venta = "INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `id_sucursal`, `precio_unitario`, `cantidad_prod`) VALUES ('$id_venta', '$id_producto', '$id_sucursal', '$precio_unitario', '1')";
        $result = U_I_D($query_detalle_venta);
        //Actualizar inventario
        $query = "UPDATE `inventarios` SET `stock`=`stock` - 1  WHERE id_producto='$id_producto'";
        $result = U_I_D($query);
    }
    //Destruyendo session carrito
    unset($_SESSION['CARRITO']);
}
?>
<?php if ($result) : ?>
    <script>
        $(document).ready(function() {
            alertify.alert("Estado venta", "Productos vendidos");
            $("#contenido-usuario").load("ventas/principal.php");
            event.preventDefault();
            window.open("ventas/reporte_venta.php?dui_client=<?php echo base64_encode($dui) ?>");
        });
    </script>
<?php else : ?>
    <script>
        $(document).ready(function() {
            alertify.alert("Estado venta", "Error al realizar la venta");
            $("#contenido-usuario").load("ventas/principal.php");
            event.preventDefault();
        });
    </script>
<?php endif ?>