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
            <th>Empresa</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($DataCategorias as $result) : ?>
            <tr>
                <td><?php echo $cont += 1; ?></td>
                <td><?php echo $result['id_empresa'] ?></td>
                <td><?php echo $result['nombre_empresa'] ?></td>
                <td><?php echo $result['email_empresa'] ?></td>
                <td><?php echo $result['telefono_empresa'] ?></td>
                <td><?php echo $result['direccion_empresa'] ?></td>
                <td><a href="" class="btn btn-success edit-sucursal" id-empresa="<?php echo $result['id_empresa'] ?>">
                        <i class="fas fa-edit"></i>
                    </a></td>
                <td>
                    <a href="" class="btn btn-danger del-sucursal" id-empresa="<?php echo $result['id_empresa'] ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>