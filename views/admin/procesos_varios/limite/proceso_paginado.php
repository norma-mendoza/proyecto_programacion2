<?php
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
$query = "SELECT * FROM limite_productos";

if(isset($_GET['like'])){
    $valor = $_GET['valor'];
    $queryLimite = "SELECT producto.nombre_productos,categorias.categoria,limite_productos.id_limite,limite_productos.limite FROM `inventarios` INNER JOIN producto ON producto.id_producto=inventarios.id_producto INNER JOIN categorias ON categorias.id_categoria = inventarios.id_categoria INNER JOIN limite_productos ON limite_productos.id_producto=inventarios.id_producto WHERE producto.nombre_productos LIKE '%$valor%'";
}else{

    $queryLimite = "SELECT producto.nombre_productos,categorias.categoria,limite_productos.id_limite,limite_productos.limite FROM `inventarios` INNER JOIN producto ON producto.id_producto=inventarios.id_producto INNER JOIN categorias ON categorias.id_categoria = inventarios.id_categoria INNER JOIN limite_productos ON limite_productos.id_producto=inventarios.id_producto LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryLimite, "i");
$num_registro = NumReg($query);
$paginas = ceil($num_registro / $registros);



?>