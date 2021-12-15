<style>
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<table class="table table-bordered table-resposive-md table-sm table-responsive-sm">

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
        <?php foreach ($DataCategorias as $result) : ?>
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
                <td><?php echo $result['nombres'] ?></td>


                <!--      <td>
                    <a href="" class="btn btn-danger del_producto" id-producto="<? php // echo $result['id_producto'] 
                                                                                ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>-->
            </tr>
        <?php endforeach ?>
    </tbody>

</table>