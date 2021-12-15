<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de la venta</title>
</head>

<body onload="print()">
    <?php
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
    include '../../../controllers/procesos.php';
    $dui_client = base64_decode($_GET['dui_client']); //enviado de save_venta.php, a travez de GET
    //Obtener id de ultima venta
    $query = "SELECT MAX(id_venta) as id FROM `ventas`";
    $result_venta_id = SelectData($query, "i");

    $id_venta = $result_venta_id[0]['id'];

    $query = "SELECT producto.nombre_productos as producto,COUNT(detalle_venta.id_producto) as cantidad,clientes.nombres as nombres,clientes.apellidos as apellidos,sucursal.nombre_empresa as sucursal,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.descripcion as descripcion,detalle_venta.precio_unitario,ventas.id_venta as id_venta FROM detalle_venta INNER JOIN ventas ON detalle_venta.id_venta=ventas.id_venta INNER JOIN sucursal ON detalle_venta.id_sucursal=sucursal.id_empresa INNER JOIN producto ON detalle_venta.id_producto=producto.id_producto INNER JOIN clientes ON detalle_venta.id_venta=ventas.id_venta WHERE ventas.id_venta=$id_venta AND clientes.id_cliente=$dui_client GROUP BY detalle_venta.id_producto";
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
    <div>
        <h1>Factural de compra cliente</h1>
        <table>
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precios Unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataVenta as $result) : ?>
                    <tr>
                        <td><?php echo $result['producto'] ?></td>
                        <td><?php echo $result['descripcion'] ?></td>
                        <td><?php echo $result['cantidad'] ?></td>
                        <td>$<?php echo round($result['precio_unitario'], 2) ?></td>
                        <td>$<?php echo $result['precio_unitario'] * $result['cantidad'] ?></td>
                    </tr>
                    <?php
                    $nombre_client = $result['nombres'] . " " . $result['apellidos'];
                    $sucursal = $result['sucursal'];
                    $fecha_compra = $result['fecha_venta'];
                    $total_pago = $result['total_pago'];
                    $descuento = $result['descuento'];
                    $num_venta = $result['id_venta'];
                    ?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4"> Descuento:</th>
                    <td><?php echo $descuento ?>%</td>
                </tr>
                <tr>
                    <th colspan="4">Pago total:</th>
                    <td>$<?php echo $total_pago ?></td>
                </tr>
            </tbody>
        </table>
        <section>
            <p>Cliente: <?php echo $nombre_client ?></p>
            <p>Fecha: <?php echo $fecha_compra ?></p>
            <p>Farmacia: <?php echo $sucursal ?></p>
            <p>Número de venta: <?php echo $num_venta ?></p>
        </section>
    </div>
    <br>
    <hr>
    <br>
    <div>
        <h1>Factural de compra farmacia</h1>
        <table>
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precios Unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataVenta as $result) : ?>
                    <tr>
                        <td><?php echo $result['producto'] ?></td>
                        <td><?php echo $result['descripcion'] ?></td>
                        <td><?php echo $result['cantidad'] ?></td>
                        <td>$<?php echo round($result['precio_unitario'], 2) ?></td>
                        <td>$<?php echo $result['precio_unitario'] * $result['cantidad'] ?></td>
                    </tr>
                    <?php
                    $nombre_client = $result['nombres'] . " " . $result['apellidos'];
                    $sucursal = $result['sucursal'];
                    $fecha_compra = $result['fecha_venta'];
                    $total_pago = $result['total_pago'];
                    $descuento = $result['descuento'];
                    $num_venta = $result['id_venta'];
                    ?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4"> Descuento:</th>
                    <td><?php echo $descuento ?>%</td>
                </tr>
                <tr>
                    <th colspan="4">Pago total:</th>
                    <td>$<?php echo $total_pago ?></td>
                </tr>
            </tbody>
        </table>
        <section>
            <p>Cliente: <?php echo $nombre_client ?></p>
            <p>Fecha: <?php echo $fecha_compra ?></p>
            <p>Farmacia: <?php echo $sucursal ?></p>
            <p>Número de venta: <?php echo $num_venta ?></p>
        </section>
    </div>
</body>

</html>