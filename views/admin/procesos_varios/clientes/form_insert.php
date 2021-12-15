<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-sucursal.js"></script>
<script src="../../public/js/js_funciones.js"></script>

<form id="add-sucursal">
    <h3 style="text-align: center;">Registro de Proveedores</h3>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input type="text" name="sucursal" class="form-control" placeholder="Empresa" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="Correo electrónico" required="on" autocomplete="off" />
            </div>
        </div>
        <!-- Fin de Primera columna -->
        <!---Segunda columna --->
        <div class="col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                </div>
                <input type="tel" name="tel_sucursal" max="8" class="form-control" placeholder="Telefono" required="on" autocomplete="off" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                </div>
                <textarea type="text" name="direccion" id="direccion" class="form-control" placeholder="Detalles de Producto" required="on" autocomplete="off" ></textarea>
            </div>
        </div>
    </div>
    <div class="pt-3">
        <button class="btn btn-primary text-white" id="save-proveedor"><i class="fas fa-save"></i> Guardar</button>
        <a class="btn btn-danger text-white sucursal"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>
<!-- Fin de seguda columna -->