<style>
    td,th{
        text-align: center;
        vertical-align: middle;
    }
</style>
<table class="table table-bordered table-resposive-md table-sm table-responsive-sm" >

    <thead>
        <tr>
            <th>N°</th>
            <th>Código Inventario</th>
            <th>Producto</th>
            <th>categoria</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($DataStock AS $result): ?>
        <tr>
            <td><?php echo $cont += 1; ?></td>
            <td><?php echo $result['id_inventario']?></td>
            <td><?php echo $result['nombre_productos']?></td>
            <td><?php echo $result['categoria']?></td>
            <td><?php echo $result['stock']?></td>
            <td><img src="../../public/img/<?php echo $result['imagen']?>" width="70px" alt=""></td>
            <td><a href="" class="btn btn-success edit-stock" id-stock="<?php echo $result['id_inventario']?>">
                <i class="fas fa-edit"></i>
            </a></td>
            <td>
            <?php if($result['estado'] == 1): ?>
                <a href="" class="btn btn-info delete-stock" estado="0" id-stock="<?php echo $result['id_inventario']?>">
                    <i class="fas fa-donate"></i>
                </a>
            <?php else: ?>
                <a href="" class="btn btn-danger delete-stock" estado="1" id-stock="<?php echo $result['id_inventario']?>">
                    <i class="fas fa-handshake-slash"></i>
                </a>
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    
</table>