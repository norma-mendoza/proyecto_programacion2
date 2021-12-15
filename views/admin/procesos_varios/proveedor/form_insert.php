<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-proveedores.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";


?>
<form id="add-proveedor" enctype="multipart/form-data">
    <h3 style="text-align: center;">Registro de Proveedores</h3>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input type="text" name="nombre_prov" class="form-control" placeholder="Producto" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                </div>
                <textarea type="text" name="direccion_prov" id="descripcion" class="form-control" placeholder="Dirección de proveedor" required="on" autocomplete="off" />
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                </div>
                <input type="tel" name="tel_prov" max="8" class="form-control" placeholder="Telefono" required="on" autocomplete="off" />
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
        <button class="btn btn-primary text-white" id="save-proveedor"><i class="fas fa-save"></i> Guardar</button>
        <a class="btn btn-danger text-white proveedor"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<!-- Fin de seguda columna -->