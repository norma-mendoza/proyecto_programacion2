<style>
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<table class="table table-bordered table-resposive-md table-sm table-responsive-sm">

    <thead>
        <tr>
            <th>N°</th>
            <th>Código</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Unidad</th>
            <th>Foto</th>
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DataCategorias as $result) : ?>
            <tr>
                <td><?php echo $cont += 1; ?></td>
                <td><?php echo $result['id_producto'] ?></td>
                <td><?php echo $result['nombre_productos'] ?></td>
                <td><?php echo $result['descripcion'] ?></td>
                <td><?php echo $result['precio_compra'] ?></td>
                <td><?php echo $result['precio_venta'] ?></td>
                <td><?php echo $result['unidad_medida'] ?></td>
                <td><img src="../../public/img/<?php echo $result['imagen']?>" width="70px" alt=""></td></td>
                <td><a href="" class="btn btn-success edit_producto" id-producto="<?php echo $result['id_producto'] ?>">
                        <i class="fas fa-edit"></i>
                    </a></td>
                <td>
                    <a href="" class="btn btn-danger del_producto" id-producto="<?php echo $result['id_producto'] ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>