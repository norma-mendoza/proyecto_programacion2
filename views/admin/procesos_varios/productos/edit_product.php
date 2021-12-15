<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-productos.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

//Recibimos el ID enviado por get
$id_producto = $_GET['id_product'];
$query = "SELECT * FROM producto WHERE id_producto=$id_producto";
$dataProduct = SelectData($query, "i");

?>

<?php foreach($dataProduct as $result): ?>
<form id="edit-product" enctype="multipart/form-data">
    <h3 style="text-align: center;">Registro de Productos</h3>
    <hr>
    <input type="hidden" value="<?php echo $result['id_producto'] ?>" id="id_producto" name="id_producto">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Productos</span>
                </div>
                <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Producto" required="on" autocomplete="off" value="<?php echo $result['nombre_productos'] ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripcion</span>
                </div>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Detalles de Producto" required="on" autocomplete="off" ><?php echo $result['descripcion'] ?></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha vencimiento</span>
                </div>
                <input type="date" name="fecha_v" id="unidad_medida" class="form-control" required="on" autocomplete="off" value="<?php echo $result['fecha_vencimiento'] ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Unidad de Medida</span>
                </div>
                <input type="text" name="unidad_medida" id="unidad_medida" class="form-control" placeholder="Ml,kg" required="on" autocomplete="off" value="<?php echo $result['unidad_medida'] ?>" />
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Compra</span>
                </div>
                <input type="text" name="precio_compra" id="precio_compra" class="form-control" placeholder="$0.00" required="on" autocomplete="off" value="<?php echo $result['precio_compra'] ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Venta</span>
                </div>
                <input type="text" name="precio_venta" id="precio_venta" class="form-control" placeholder="$0.00" required="on" autocomplete="off" value="<?php echo $result['precio_venta'] ?>" />
            </div>
            <div class="input-group mb-3">
                <div class="d-block">
                    <label for="">Imagen actual:</label>
                </div>
                <img src="../../public/img/<?php echo $result['imagen'] ?>" alt="producto" width="100px">
                
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Imagen</span>
                </div>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>
            <div>
                <img src="" width="200px" id="imagenmuestra" alt="">
            </div>
        </div>
    </div>
    <div class="pt-3">
        <button class="btn btn-primary text-white" id="save-producto"><i class="fas fa-save"></i>Actualizar</button>
        <a class="btn btn-danger text-white productos"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<?php endforeach; ?>
<!-- Fin de seguda columna -->