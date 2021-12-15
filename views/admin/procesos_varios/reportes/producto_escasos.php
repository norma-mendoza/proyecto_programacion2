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



    $query = "SELECT inventarios.stock as stock,
    producto.nombre_productos as producto,
    producto.unidad_medida as unidad,
    categorias.categoria as categoria,
    categorias.id_categoria as id_categoria,
    limite_productos.limite as limite
    FROM inventarios
    INNER JOIN producto ON inventarios.id_producto=producto.id_producto
    INNER JOIN categorias ON inventarios.id_categoria=categorias.id_categoria
    INNER JOIN limite_productos ON limite_productos.id_producto=inventarios.id_producto WHERE limite_productos.limite >= inventarios.stock";

    $busca_producto = SelectData($query, "i");

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
    <h1>Productos Escasos</h1>

    <table class="table  text-center   table-resposive-md">
        <thead class="thead-dark">
            <tr>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Medidad</th>

                <th>Límite</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($busca_producto as $result) : ?>
                <tr>
                    <td><?php echo $result['producto'] ?></td>
                    <td><?php echo $result['categoria'] ?></td>
                    <td><?php echo $result['stock'] ?> </td>
                    <td><?php echo $result['unidad'] ?></td>
                    <td><?php echo $result['limite'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>



</body>

</html>