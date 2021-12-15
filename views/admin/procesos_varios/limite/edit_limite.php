<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-limite-productos.js"></script>

<?php 
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    $id_limite = $_GET['id-limite'];
    $query = "SELECT producto.nombre_productos,categorias.categoria,limite_productos.id_limite,limite_productos.limite FROM `inventarios` INNER JOIN producto ON producto.id_producto=inventarios.id_producto INNER JOIN categorias ON categorias.id_categoria = inventarios.id_categoria INNER JOIN limite_productos ON limite_productos.id_producto=inventarios.id_producto WHERE limite_productos.id_limite='$id_limite'";
    $data = SelectData($query,'i');
    
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 style="text-align: center;">Modificar Limite Producto</h3>
        <hr>
        <?php foreach($data AS $result):?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Producto</span>
            </div>
            <input type="hidden" id="id-limite"  value="<?php echo $result['id_limite']; ?>" />
            <input type="text" class="form-control" required="on" disabled value="<?php echo $result['nombre_productos']; ?>" />

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Limite</span>
            </div>
            <input type="text" id="limite-product" class="form-control" placeholder="Limite Producto" required="on" value="<?php echo $result['limite']; ?>" autocomplete="off" />

        </div>
        <?php endforeach; ?>
        <div>
            <a class="btn btn-primary text-white" id="update-limite"><i class="fas fa-save"></i> Guardar</a>
            <a class="btn btn-danger text-white limite"><i class="fas fa-ban"></i> Cancelar</a>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>