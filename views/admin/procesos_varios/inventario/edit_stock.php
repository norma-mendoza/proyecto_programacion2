<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-stock.js"></script>

<?php 
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    $id_stock = $_GET['id-stock'];
    $query = "SELECT inventarios.id_inventario,inventarios.stock,producto.nombre_productos FROM inventarios INNER JOIN producto ON inventarios.id_producto=producto.id_producto WHERE id_inventario=$id_stock";
    $data = SelectData($query,'i');
    
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 style="text-align: center;">Modificar Stock Producto</h3>
        <hr>
        <?php foreach($data AS $result):?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Producto</span>
            </div>
            <input type="hidden" id="id-stock"  value="<?php echo $result['id_inventario']; ?>" />
            <input type="text" class="form-control" required="on" disabled value="<?php echo $result['nombre_productos']; ?>" />

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Stock</span>
            </div>
            <input type="text" id="stock" class="form-control" placeholder="Stock Producto" required="on" value="<?php echo $result['stock']; ?>" autocomplete="off" />

        </div>
        <?php endforeach; ?>
        <div>
            <a class="btn btn-primary text-white" id="update-stock"><i class="fas fa-save"></i> Guardar</a>
            <a class="btn btn-danger text-white stock"><i class="fas fa-ban"></i> Cancelar</a>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>