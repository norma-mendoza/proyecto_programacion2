<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-productos.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";
//Consulta a  bd para categoria
$query = "SELECT * FROM categorias";
$datosCategoria = SelectData($query, "i");
//Consulta a bd para proveedore
$query = "SELECT * FROM proveedor";
$datosProveedor = SelectData($query, "i");
//Seleccionar los ID de la tabla producto para insertar un nuevo registro
$queryMax = "SELECT MAX(id_producto) AS max_id FROM producto";
$ultimo_Id = SelectData($queryMax, 'i');
foreach ($ultimo_Id as $result) {
    $max_id_product = $result['max_id'] + 1;
}

?>
<form id="add-product" enctype="multipart/form-data">
    <h3 style="text-align: center;">Registro de Productos</h3>
    <hr>
    <input type="hidden" value="<?php echo $max_id_product ?>" id="id_producto" name="id_producto">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Categoría</span>
                </div>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option value="" selected disabled>Seleccione Categoria</option>
                    <?php foreach ($datosCategoria as $result) : ?>
                        <option value="<?php echo $result['id_categoria'] ?>"><?php echo $result['categoria'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Proveedor</span>
                </div>
                <select class="form-control" name="id_proveedor" id="id_proveedor">
                    <option value="" selected disabled>Seleccione Categoria</option>
                    <?php foreach ($datosProveedor as $result) : ?>
                        <option value="<?php echo $result['id_proveedor'] ?>"><?php echo $result['nombre_prov'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Productos</span>
                </div>
                <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Producto" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripcion</span>
                </div>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Detalles de Producto" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cantidad</span>
                </div>
                <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Productos e inventario" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Unidad de Medida</span>
                </div>
  <select name="unidad_medida" id="unidad_medida" class="form-control" required="on">
                            <option value="" selected disabled>Seleccione la unidad de medida</option>
                            <option value="Gramos">Gramos</option>
                            <option value="miligramos">miligramos</option>
                            <option value="kilogramos">kilogramos</option>
                            <option value="unidad">unidad</option>
                            <option value="Cajas">Cajas</option>
                            <option value="Litros">Litros</option>
                            <option value="Galones">Galones</option>
                              <option value="Mililitro">Mililitro</option>
                            <option value="Onzas">Onzas</option>
                            <option value="Botella">Botella</option>
                            <option value="Lata">Lata</option>
                        </select>
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Compra</span>
                </div>
                <input type="text" name="precio_compra" id="precio_compra" class="form-control" placeholder="$0.00" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Venta</span>
                </div>
                <input type="text" name="precio_venta" id="precio_venta" class="form-control" placeholder="$0.00" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha Vencimiento</span>
                </div>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" placeholder="$0.00" required="on" autocomplete="off" />
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
        <button class="btn btn-primary text-white" id="save-producto"><i class="fas fa-save"></i> Guardar</button>
        <a class="btn btn-danger text-white productos"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<!-- Fin de seguda columna -->