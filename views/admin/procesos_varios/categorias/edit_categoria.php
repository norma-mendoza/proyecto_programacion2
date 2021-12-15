<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-categorias.js"></script>
<script src="../../public/js/js_funciones.js"></script>
<?php
session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";
$id_cate = $_GET['id-cate'];
$query = "SELECT * FROM categorias WHERE id_categoria='$id_cate'";
$data = SelectData($query, 'i');

?>
<?php foreach ($data as $result) : ?>
    <form id="update-categoria" action="" enctype="multipart/form-data">
        <h3 style="text-align: center;">Modificar Categoria</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Categoria</span>
                    </div>
                    <input type="hidden" name="id_categoria" value="<?php echo $result['id_categoria']; ?>" />
                    <input type="text" name="categoria" class="form-control" required="on" value="<?php echo $result['categoria']; ?>" />
                </div>
                <?php if(strlen($result['imagen_categoria'])):?>
                <label for="">Imagen Actual</label>
                    <div class="my-4">
                    <img src="../../public/img/<?php echo $result['imagen_categoria']; ?>" alt="" width="100px">
                    </div>
                <?php endif ?>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Imagen</span>
                    </div>
                    <input type="file" name="imagen" accept="image/png" id="imagen" class="form-control" placeholder="Limite Producto" />
                </div>
                <div>
                    <img src="" width="200px" id="imagenmuestra" alt="">
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary text-white"><i class="fas fa-save"></i> Guardar</button>
            <a class="btn btn-danger text-white categorias"><i class="fas fa-ban"></i> Cancelar</a>
        </div>
    </form>
<?php endforeach; ?>