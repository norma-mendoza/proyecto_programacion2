<head>
    <script src="../../public/js/funciones-reportes.js"></script>
</head>


<?php
session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";


$cont = 0;
$pagina = 0;

if (isset($_GET['num'])) {
    $pagina = $_GET['num'];
}
//Definir el numero de registross
if (isset($_GET['n_reg']) || isset($_GET['num'])) {
    $registros = $_GET['num_reg'];
} else {
    $registros = 3;
}

//Definir el inicio a la pagina a mostrar
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registros;
}
$query = "SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres FROM detalle_venta as dv 
INNER JOIN ventas ON ventas.id_venta=dv.id_venta
INNER JOIN producto ON producto.id_producto = dv.id_producto
INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
inner join clientes on clientes.id_cliente= ventas.id_cliente"; //Total de registro para paginado

if (isset($_GET['like'])) {
    $valor = $_GET['valor'];
    $queryCate = "SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres FROM detalle_venta as dv 
INNER JOIN ventas ON ventas.id_venta=dv.id_venta
INNER JOIN producto ON producto.id_producto = dv.id_producto
INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
inner join clientes on clientes.id_cliente= ventas.id_cliente  WHERE nombre_productos LIKE '%$valor%'";
} else {
    $queryCate = "SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa, clientes.nombres FROM detalle_venta as dv 
INNER JOIN ventas ON ventas.id_venta=dv.id_venta
INNER JOIN producto ON producto.id_producto = dv.id_producto
INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal
inner join clientes on clientes.id_cliente= ventas.id_cliente  ORDER BY id_detalle_v LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryCate, "i");
$num_registro = NumReg($query);
$paginas = ceil($num_registro / $registros);


?>
<?php include "select_y_buscador.php" ?>

<?php if ($DataCategorias) : ?>

    <?php include "tabla_productos.php" ?>
    <?php include "boton_next_back.php" ?>
<?php else : ?>
    <div class="alert alert-danger">
        No se encuentran datos
    </div>

<?php endif ?>