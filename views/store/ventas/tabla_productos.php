<table class="table table-bordered table-resposive-md table-resposive-sm table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>Código</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio de venta</th>
            <th>Imagen</th>
            <th colspan="2">Proceso</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DataProducto as $result) : ?>
            <tr>
                <td><?php echo $cont += 1; ?></td>
                <td><?php echo $result['id_producto'] ?></td>
                <td><?php echo $result['nombre_productos'] ?></td>
                <td><?php echo $result['descripcion'] ?></td>
                <td>$<?php echo $result['precio_venta'] ?></td>
                <td><img width="80px" src="../../public/img/<?php echo $result['imagen'] ?>" alt="..."></td>
                <td><a href="#" class="btn btn-primary add_carrito" id-producto="<?php echo $result['id_producto'] ?>"><i class="fas fa-cart-plus"></i></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>