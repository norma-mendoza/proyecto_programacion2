<?php
session_start();
include '../../../models/conexion.php';
include '../../../models/procesos.php';
include '../../../controllers/procesos.php';
$cont = 0;
?>
<script src="../../public/js/funciones-ventas.js"></script>
<script src="../../public/js/funciones-carrito.js"></script>
<script>
    function muestra_oculta(id) {
        if (document.getElementById) {
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'block') ? 'none' : 'block';
        }
    }
    window.onload = function() {
        muestra_oculta('contenido-icon')
    };
</script>
<style>
    th {
        text-align: center;
        background-color: #212121;
        color: #ff7043;
        font-weight: bold;
    }
    .thead-cart th,.total{
        text-align: center;
        background-color: #28a745;
        color: #f1f1f1;
        font-weight: bold;
    }
    .payment{
        font-size: 22px;
    }

    td {
        text-align: center;
    }
</style>

<div class="container" id="contenido-usuario" style="margin-top: 20px; margin-bottom:40px;">
    <div class="row">
        <div class="col-sm-12 col-md-12">
        <?php if(!isset($_SESSION['CARRITO'])):?>
            <button class="btn btn-success text-white new_venta" disabled style="margin-bottom: 10px;"><i class="fas fa-clipboard-check"></i> Vender</button>
        <?php else: ?>
            <?php if(count($_SESSION['CARRITO']) > 0): ?>
            <button class="btn btn-success text-white new_venta" style="margin-bottom: 10px;"><i class="fas fa-clipboard-check"></i> Vender</button>
            <?php else: ?>
                <button class="btn btn-success text-white new_venta" disabled style="margin-bottom: 10px;"><i class="fas fa-clipboard-check"></i> Vender</button>
            <?php endif; ?>
        <?php endif; ?>
            <div style="margin-top: 10px;margin-bottom: 10px;">
                <div id="view_carrito">
                    <?php if (isset($_SESSION['CARRITO'])) : ?>
                        <?php if (count($_SESSION['CARRITO']) > 0) : ?>
                            <h3 class="text-center my-3">Productos a vender</h3>
                            <table class="table table-hover table-responsive-sm table-responsive-xl">
                                <thead class="thead-cart">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio unitario</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    <?php $total = 0 ?>
                                    <?php foreach ($_SESSION['CARRITO'] as $index => $result) : ?>
                                        <tr>
                                            <td><?php echo $result['ID'] ?></td>
                                            <td><?php echo $result['NOMBRE'] ?></td>
                                            <td><?php echo $result['DESCRIP'] ?></td>
                                            <td>$<?php echo $result['PRECIO_V'] ?></td>
                                            <td><a href="" class="btn btn-danger delete_product" id-carrito="<?php echo $index ?>"><i class="far fa-trash-alt"></i></a></td>
                                            <?php $total += $result['PRECIO_V'] ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    <th class="total" colspan="3">Total</th>
                                    <td class="payment" colspan="2">$ <?php echo $total ?></td>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="alert alert-warning">
                                No hay productos agregados
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="alert alert-warning">
                            No hay productos agregados
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <h3 class="text-center">Productos</h3>
            <?php include "select_y_buscador.php" ?>
            <?php include "proceso_paginado.php" ?>
            <?php if ($DataProducto) : ?>
                <?php include "./tabla_productos.php" ?>
                <?php include "boton_next_back.php"; ?>
            <?php else : ?>
                <div class="alert alert-danger">
                    No se encuentran productos
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>