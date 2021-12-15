<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        Productos Mas Vendidos
    </title>
    </meta>
    </meta>
    </meta>
</head>

<body onload="print()">
    <?php
    session_start();
    include '../../../../models/conexion.php';
    include '../../../../models/procesos.php';
    include '../../../../controllers/procesos.php';


    $queryproduc_ven = "SELECT id_producto,nombre_productos,(SELECT COUNT(*)FROM detalle_venta WHERE producto.id_producto=detalle_venta.id_producto) as cantidad FROM producto WHERE(SELECT COUNT(*) FROM detalle_venta WHERE producto.id_producto=detalle_venta.id_producto)>2 ORDER BY id_producto ASC ";
    $dataproductos_vendidos = SelectData($queryproduc_ven, "i");

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
    <h1>
        Productos Mas Vendidos
    </h1>
    <table class="text-center ">
        <thead>
            <tr>
                <th>
                    Id_productos
                </th>
                <th>
                    Nombre_producto
                </th>
                <th>
                    Cantidad
                </th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataproductos_vendidos  as $result) : ?>
                <tr>

                    <!--<td><?php //echo $cont += 1; 
                            ?></td>-->
                    <td><?php echo $result['id_producto'] ?></td>
                    <td><?php echo $result['nombre_productos'] ?></td>
                    <td><?php echo $result['cantidad'] ?></td>



                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</body>

</html>