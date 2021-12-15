<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de la venta</title>
</head>

<body onload="window.print()">
    <?php
    session_start();
    include '../../../../models/conexion.php';
    include '../../../../models/procesos.php';
    include '../../../../controllers/procesos.php';



    $query = "SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres,clientes.apellidos FROM detalle_venta as dv 
    INNER JOIN ventas ON ventas.id_venta=dv.id_venta
    INNER JOIN producto ON producto.id_producto = dv.id_producto
    INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
    inner join clientes on clientes.id_cliente= ventas.id_cliente  ORDER BY id_detalle_v desc";
    $dataVenta = SelectData($query, "i");

    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

        h1,
        h2,
        h3,
        h4,
        p,
        a,
        b {
            font-family: 'Montserrat', sans-serif;
        }

        h1 {
            color: lightblue;
        }

        table {
            text-align: center;
            border: 1px solid #f1f1f1;
        }

        th {
            padding: 8px;
            background: #e8ebf7;
        }
    </style>
    <h1>Ventas Realizadas</h1>

    <table class=" text-center  table table-bordered table-resposive-md table-sm">

        <thead>
            <tr>

                <th>id_venta</th>
                <th>Precio_uni.</th>
                <th>Cantidad_produc. </th>
                <th>Fecha_venta</th>
                <th>Total_pago</th>
                <th>Descuento</th>
                <th>Producto</th>
                <th>Sucursal</th>
                <th>clientes</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_ventas = 0; ?>
            <?php foreach ($dataVenta  as $result) : ?>
                <tr>
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

</html>