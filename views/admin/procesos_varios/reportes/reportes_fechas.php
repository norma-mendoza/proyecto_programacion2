<?php
session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$sqlfecha = 'SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres FROM detalle_venta as dv 
INNER JOIN ventas ON ventas.id_venta=dv.id_venta
INNER JOIN producto ON producto.id_producto = dv.id_producto
INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
inner join clientes on clientes.id_cliente= ventas.id_cliente  WHERE fecha_venta BETWEEN "' . $desde . '" AND "' . $hasta . '" ORDER BY id_detalle_v DESC';
$sqlfechaconsulta = SelectData($sqlfecha, "i");

?>
<?php if ($sqlfechaconsulta) : ?>
    <script>
        $(document).ready(function() {
            alertify.alert("Exito", "Reporte generado");
            $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php");
            window.open("procesos_varios/reportes/reportes_nueva_fechas.php?desde=<?php echo base64_encode($desde); ?>&hasta=<?php echo base64_encode($hasta); ?>");
        });
    </script>
<?php else : ?>
    <script>
        $(document).ready(function() {
            alertify.alert("Error", "Error verificar la fecha");
            $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php");
        });
    </script>
<?php endif ?>