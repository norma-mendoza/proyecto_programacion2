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
            <th>Cliente</th>
            <th>Apellido</th>
         
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DataCategorias as $result) : ?>
            <tr>
                <td><?php echo $cont += 1; ?></td>
                <td><?php echo $result['id_cliente'] ?></td>
                <td><?php echo $result['nombres'] ?></td>
                <td><?php echo $result['apellidos'] ?></td>
               
               
                <td>
                    <a href="" class="btn btn-danger del-cliente" id-cliente="<?php echo $result['id_cliente'] ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>