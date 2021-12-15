<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-ventas.js"></script>
<script src="../../public/js/funciones-carrito.js"></script>
<?php
session_start();
include '../../../models/conexion.php';
include '../../../models/procesos.php';
include '../../../controllers/procesos.php';
$query = "SELECT * FROM sucursal";
$DataSucursal = SelectData($query,'i');

//Cliente
$query_client = "SELECT * FROM `clientes`";
$dataClient = SelectData($query_client,'i');
?>

<h3 style="text-align: center;">Agregar venta</h3>
<hr>
<form>
    <div class="row">
        <div class="col-md-6">
            <legend>Buscar informacion de cliente*</legend>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cliente*</span>
                </div>
                <select class="form-control" name="id_client" id="id_client">
                    <option value="" selected disabled>Seleccione cliente</option>
                    <?php foreach ($dataClient as $result) : ?>
                        <option value="<?php echo $result['id_cliente'] ?>"><?php echo $result['nombres']." ".$result['apellidos']  ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <legend>Información de la venta*</legend>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Sucursal</span>
                </div>
                <select id="id_sucursal" class="form-control">
                    <option value="" selected disabled>selecionar</option>
                    <?php foreach ($DataSucursal as $result) : ?>
                        <option value="<?php echo $result['id_empresa'] ?>"><?php echo $result['nombre_empresa'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descuento</span>
                </div>
                <input type="number" min="0" id="descuento" class="form-control" required="on" placeholder="0,13,.." />
            </div>
        </div>
    </div>
    <div>
        <a class="btn btn-primary text-white" id="cliente_venta"><i class="fas fa-save"></i> Guardar</a>
        <a class="btn btn-danger text-white ventas"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</form>