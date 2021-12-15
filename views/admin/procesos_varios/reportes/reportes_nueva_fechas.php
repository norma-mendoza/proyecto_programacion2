<?php
session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";
$desde = base64_decode($_GET['desde']);
$hasta = base64_decode($_GET['hasta']);
$sqlfecha = 'SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres,clientes.apellidos FROM detalle_venta as dv 
INNER JOIN ventas ON ventas.id_venta=dv.id_venta
INNER JOIN producto ON producto.id_producto = dv.id_producto
INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
inner join clientes on clientes.id_cliente= ventas.id_cliente  WHERE fecha_venta BETWEEN "' . $desde . '" AND "' . $hasta . '" ORDER BY id_detalle_v DESC';
$sqlfechaconsulta = SelectData($sqlfecha, "i");
?>
<style>
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<body onload="window.print()">
    <table class="table table-bordered table-resposive-md table-sm">

        <thead>
            <tr>

                <th>id_venta</th>
                <th>Pre_unit</th>
                <th>Can_prod. </th>
                <th>Fecha_ven</th>
                <th>Total_pago</th>
                <th>Des.</th>
                <th>Producto</th>
                <th>Sucursal</th>
                <th>clientes</th>
                <!--<th colspan="2">Procesos</th>-->
            </tr>
        </thead>
        <tbody>
            <?php $total_ventas = 0; //Contador ?>
            <?php foreach ($sqlfechaconsulta as $result) : ?>
                <tr>

                    <!--<td><?php //echo $cont += 1; 
                            ?></td>-->
                    <td><?php echo $result['id_detalle_v'] ?></td>
                    <td><?php echo $result['precio_unitario'] ?></td>
                    <td><?php echo $result['cantidad_prod'] ?></td>
                    <td><?php echo $result['fecha_venta'] ?></td>
                    <td><?php echo $result['total_pago'] ?></td>
                    <td><?php echo $result['descuento'] . "%" ?></td>
                    <td><?php echo $result['nombre_productos'] ?></td>
                    <td><?php echo $result['nombre_empresa'] ?></td>
                    <td><?php echo $result['nombres']." ".$result['apellidos'] ?></td>
                </tr>
                <?php
                    $total_ventas +=1;
                ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <h3>Total de productos vendidos: <?php echo $total_ventas ?></h3>
</body>