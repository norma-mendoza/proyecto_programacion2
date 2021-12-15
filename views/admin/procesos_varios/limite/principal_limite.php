<head>
    <script src="../../public/js/funciones-navbar.js"></script>
    <script src="../../public/js/funciones-limite-productos.js"></script>
</head>


<?php
session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

include "./proceso_paginado.php";
?>
<?php include "./select_y_buscador.php"; ?>
<?php if ($DataCategorias) : ?>
    <?php include "./tabla_limite.php"; ?>
    <?php include "./boton_next_back.php"; ?>
<?php else : ?>
    <div class="alert alert-danger">
        No se encuentran datos
    </div>
<?php endif ?>