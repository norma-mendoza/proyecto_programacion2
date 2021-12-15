<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-sucursal.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

//ID para recibido por post

$id_sucursal = $_GET['id-sucursal'];
$query = "SELECT * FROM sucursal WHERE id_empresa='$id_sucursal'";
$data = SelectData($query,'i');
?>
<?php foreach($data AS $result): ?>
<form id="update-sucursal">
    <h3 style="text-align: center;">Editar sucursal</h3>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6">
        <input type="hidden" name="id" value="<?php echo $result['id_empresa'] ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input type="text" name="sucursal" value="<?php echo $result['nombre_empresa'] ?>" class="form-control" placeholder="Empresa" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="text" name="email" value="<?php echo $result['email_empresa'] ?>" class="form-control" placeholder="Correo electrónico" required="on" autocomplete="off" />
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                </div>
                <input type="tel" name="tel_sucursal" max="8" value="<?php echo $result['telefono_empresa'] ?>" class="form-control" placeholder="Telefono" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                </div>
                <textarea type="text" name="direccion" id="direccion" class="form-control" placeholder="Detalles de Producto" required="on" autocomplete="off" ><?php echo $result['direccion_empresa'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="pt-3">
        <button class="btn btn-primary text-white" id="save-proveedor"><i class="fas fa-save"></i> Guardar</button>
        <a class="btn btn-danger text-white sucursal"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<?php endforeach; ?>
<!-- Fin de seguda columna -->