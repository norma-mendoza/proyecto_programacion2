<style>
    td,th {
        text-align: center;
        vertical-align: middle;
    }
</style>
<!-- Modal -->


<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger p-2">
                <h5 class="modal-title text-light" id="exampleModalLabel">Importante!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Los siguientes productos se estan escaseando...</b>
                <table class="table table-resposive-md">

                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Límite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($busca_producto as $result) : ?>
                            <tr>
                                <td><?php echo $cont += 1; ?></td>
                                <td><?php echo $result['producto'] ?></td>
                                <td><?php echo $result['categoria'] ?></td>
                                <td><?php echo $result['stock'] ?> (<?php echo $result['unidad'] ?>)</td>
                                <td><?php echo $result['limite'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
                <div class="text-center">
                  <a href="./procesos_varios/reportes/producto_escasos.php" class="btn btn-info"> Generar Reporte</a>
                  </div>
            </div>

        </div>
    </div>
</div>
