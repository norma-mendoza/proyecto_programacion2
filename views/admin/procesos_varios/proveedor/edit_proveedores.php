<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-proveedores.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

//ID para recibido por post

$id_sucursal = $_GET['id-proveedor'];
$query = "SELECT * FROM proveedor WHERE id_proveedor='$id_sucursal'";
$data = SelectData($query,'i');
?>
<?php foreach($data AS $result): ?>
<form id="update-proveedores" enctype="multipart/form-data">
    <h3 style="text-align: center;">Editar Proveedor</h3>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6">
        <input type="hidden" name="id" value="<?php echo $result['id_proveedor'] ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input type="text" name="proveedor" value="<?php echo $result['nombre_prov'] ?>" class="form-control" placeholder="Empresa" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                </div>
                <textarea type="text" name="direccion" id="direccion" class="form-control" placeholder="Detalles de Producto" required="on" autocomplete="off" ><?php echo $result['direccion_prov'] ?></textarea>
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                </div>
                <input type="tel" name="tel_proveedor" max="8" value="<?php echo $result['telefono_prov'] ?>" class="form-control" placeholder="Telefono" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="d-block">
                    <label for="">Imagen actual:</label>
                </div>
                <img src="../../public/img/<?php echo $result['img_prov'] ?>" alt="producto" width="100px">
                
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Imagen</span>
                </div>
                <input type="file" name="img" id="imagen" max="8" value="<?php echo $result['telefono_prov'] ?>" class="form-control" placeholder="Telefono" autocomplete="off" />
            </div>
            <div>
                <img src="" width="200px" id="imagenmuestra" alt="">
            </div>
        </div>
    </div>
    <div class="pt-3">
        <button class="btn btn-primary text-white" id="save-proveedor"><i class="fas fa-save"></i> Guardar</button>
        <a class="btn btn-danger text-white proveedor"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<?php endforeach; ?>
<!-- Fin de seguda columna -->